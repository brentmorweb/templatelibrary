(() => {
  const filterCards = (filters, cards, onUpdate) => {
    const normalizedQuery = filters.query.trim().toLowerCase();
    const hasQuery = normalizedQuery.length > 0;

    cards.forEach((card) => {
      const searchable = card.getAttribute("data-search") || "";
      const isMatch = searchable.toLowerCase().includes(normalizedQuery);
      const cardLink = card.closest(".tl-template-card-link");

      if (!cardLink) {
        return;
      }

      const matchesQuery = !hasQuery || isMatch;

      cardLink.dataset.filterHidden = String(!matchesQuery);
    });

    onUpdate();
  };

  const initPagination = (pagination, list) => {
    if (!pagination || !list) {
      return;
    }

    const cardLinks = Array.from(list.querySelectorAll(".tl-template-card-link"));
    const pageSize = Math.max(1, Number(pagination.dataset.pageSize) || 2);
    const state = {
      page: 1,
      totalPages: 1,
    };

    const getFilteredLinks = () =>
      cardLinks.filter((link) => link.dataset.filterHidden !== "true");

    const buildButton = ({ label, action, page, isActive = false, isDisabled = false }) => {
      const button = document.createElement("button");
      button.className = `tl-page-btn${isActive ? " is-active" : ""}`;
      button.type = "button";
      button.textContent = label;
      button.dataset.action = action;

      if (page) {
        button.dataset.page = String(page);
      }

      button.disabled = isDisabled;
      button.setAttribute("aria-disabled", String(isDisabled));

      return button;
    };

    const renderPagination = () => {
      const filteredLinks = getFilteredLinks();
      state.totalPages = Math.max(1, Math.ceil(filteredLinks.length / pageSize));
      state.page = Math.min(state.page, state.totalPages);

      pagination.innerHTML = "";

      pagination.appendChild(
        buildButton({
          label: "Previous",
          action: "prev",
          isDisabled: state.page <= 1,
        })
      );

      for (let page = 1; page <= state.totalPages; page += 1) {
        pagination.appendChild(
          buildButton({
            label: String(page),
            action: "page",
            page,
            isActive: page === state.page,
          })
        );
      }

      pagination.appendChild(
        buildButton({
          label: "Next ›",
          action: "next",
          isDisabled: state.page >= state.totalPages,
        })
      );

      pagination.hidden = state.totalPages <= 1;
    };

    const renderPage = (page = state.page) => {
      const filteredLinks = getFilteredLinks();
      state.totalPages = Math.max(1, Math.ceil(filteredLinks.length / pageSize));
      state.page = Math.min(Math.max(1, page), state.totalPages);

      cardLinks.forEach((link) => {
        link.hidden = link.dataset.filterHidden === "true";
      });

      if (filteredLinks.length === 0) {
        renderPagination();
        return;
      }

      const startIndex = (state.page - 1) * pageSize;
      const endIndex = startIndex + pageSize;

      filteredLinks.forEach((link, index) => {
        link.hidden = index < startIndex || index >= endIndex;
      });

      renderPagination();
    };

    pagination.addEventListener("click", (event) => {
      const button = event.target.closest("button");
      if (!button || button.disabled) {
        return;
      }

      const action = button.dataset.action;
      if (action === "prev") {
        renderPage(state.page - 1);
        return;
      }

      if (action === "next") {
        renderPage(state.page + 1);
        return;
      }

      const page = Number(button.dataset.page || "1");
      renderPage(page);
    });

    renderPage(1);

    return {
      renderPage,
    };
  };

  const getCardName = (cardLink) => {
    const name =
      cardLink.querySelector(".tl-template-card strong")?.textContent || "";
    return name.trim().toLowerCase();
  };

  const sortCards = (cards, sort) => {
    if (!sort || sort === "recent") {
      return cards.sort((a, b) => {
        const updatedA = Number(a.dataset.updatedDays || "0");
        const updatedB = Number(b.dataset.updatedDays || "0");
        return updatedA - updatedB;
      });
    }

    if (sort === "popular") {
      return cards.sort((a, b) => {
        const usageA = Number(a.dataset.usage || "0");
        const usageB = Number(b.dataset.usage || "0");
        return usageB - usageA;
      });
    }

    if (sort === "updated") {
      return cards.sort((a, b) => {
        const updatedA = Number(a.dataset.updatedDays || "0");
        const updatedB = Number(b.dataset.updatedDays || "0");
        return updatedA - updatedB;
      });
    }

    if (sort === "name_asc") {
      return cards.sort((a, b) => getCardName(a).localeCompare(getCardName(b)));
    }

    if (sort === "name_desc") {
      return cards.sort((a, b) => getCardName(b).localeCompare(getCardName(a)));
    }

    if (sort === "created_desc") {
      return cards.sort((a, b) => {
        const createdA = Number(a.dataset.createdDays || "0");
        const createdB = Number(b.dataset.createdDays || "0");
        return createdA - createdB;
      });
    }

    if (sort === "created_asc") {
      return cards.sort((a, b) => {
        const createdA = Number(a.dataset.createdDays || "0");
        const createdB = Number(b.dataset.createdDays || "0");
        return createdB - createdA;
      });
    }

    return cards;
  };

  const readFilters = (form) => {
    const formData = new FormData(form);
    return {
      query: String(formData.get("q") || ""),
      sort: String(formData.get("sort") || "recent"),
    };
  };

  document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector("[data-library-search]");
    const pagination = document.querySelector("[data-library-pagination]");
    const list = document.querySelector("[data-template-list]");
    const cards = Array.from(document.querySelectorAll("[data-library-card]"));
    const filterForm = document.querySelector("[data-library-filters]");

    if (!searchInput || !pagination || !list || !filterForm) {
      return;
    }

    const paginationApi = initPagination(pagination, list);

    if (!paginationApi) {
      return;
    }

    const updatePagination = () => paginationApi.renderPage(1);
    const cardLinks = Array.from(list.querySelectorAll(".tl-template-card-link"));
    const renderSortedCards = (sortValue) => {
      const sorted = sortCards([...cardLinks], sortValue);
      sorted.forEach((link) => list.appendChild(link));
    };

    const handleFilterChange = () => {
      const filters = readFilters(filterForm);
      renderSortedCards(filters.sort);
      filterCards(filters, cards, updatePagination);
    };

    filterForm.addEventListener("submit", (event) => {
      event.preventDefault();
    });

    filterForm.addEventListener("input", handleFilterChange);
    filterForm.addEventListener("change", handleFilterChange);

    searchInput.addEventListener("input", () => {
      handleFilterChange();
    });

    handleFilterChange();
  });
})();
