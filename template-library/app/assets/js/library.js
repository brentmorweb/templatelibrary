(() => {
  const filterCards = (query, cards, onUpdate) => {
    const normalizedQuery = query.trim().toLowerCase();
    const hasQuery = normalizedQuery.length > 0;

    cards.forEach((card) => {
      const searchable = card.getAttribute("data-search") || "";
      const isMatch = searchable.toLowerCase().includes(normalizedQuery);
      const cardLink = card.closest(".tl-template-card-link");

      if (!cardLink) {
        return;
      }

      cardLink.dataset.filterHidden = String(hasQuery && !isMatch);
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

  document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector("[data-library-search]");
    const pagination = document.querySelector("[data-library-pagination]");
    const list = document.querySelector("[data-template-list]");
    const cards = Array.from(document.querySelectorAll("[data-library-card]"));

    if (!searchInput || !pagination || !list) {
      return;
    }

    const paginationApi = initPagination(pagination, list);

    if (!paginationApi) {
      return;
    }

    const updatePagination = () => paginationApi.renderPage(1);

    searchInput.addEventListener("input", (event) => {
      filterCards(event.target.value, cards, updatePagination);
    });
  });
})();
