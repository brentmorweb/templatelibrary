(() => {
  const selectors = {
    filtersForm: "[data-library-filters]",
    searchInput: "[data-library-search]",
    list: "[data-template-list]",
    pagination: "[data-library-pagination]",
    cardLinks: ".tl-template-card-link",
  };

  const sorterMap = {
    recent: (a, b) => Number(a.dataset.updatedDays || 0) - Number(b.dataset.updatedDays || 0),
    updated: (a, b) => Number(a.dataset.updatedDays || 0) - Number(b.dataset.updatedDays || 0),
    popular: (a, b) => Number(b.dataset.usage || 0) - Number(a.dataset.usage || 0),
    name_asc: (a, b) => getCardName(a).localeCompare(getCardName(b)),
    name_desc: (a, b) => getCardName(b).localeCompare(getCardName(a)),
    created_desc: (a, b) => Number(a.dataset.createdDays || 0) - Number(b.dataset.createdDays || 0),
    created_asc: (a, b) => Number(b.dataset.createdDays || 0) - Number(a.dataset.createdDays || 0),
  };

  const getCardName = (cardLink) =>
    (cardLink.querySelector(".tl-template-card strong")?.textContent || "").trim().toLowerCase();

  const readFilters = (form) => {
    const formData = new FormData(form);
    return {
      query: String(formData.get("q") || "").trim().toLowerCase(),
      sort: String(formData.get("sort") || "recent"),
    };
  };

  const updateSearchVisibility = (cardLinks, query) => {
    const hasQuery = query.length > 0;

    cardLinks.forEach((link) => {
      const searchable = (link.querySelector("[data-library-card]")?.dataset.search || "").toLowerCase();
      const matches = !hasQuery || searchable.includes(query);
      link.dataset.filterHidden = String(!matches);
    });
  };

  const sortList = (list, cardLinks, sortKey) => {
    const sorter = sorterMap[sortKey] || sorterMap.recent;
    [...cardLinks].sort(sorter).forEach((link) => list.appendChild(link));
  };

  const createPageButton = ({ label, action, page, isActive = false, isDisabled = false }) => {
    const button = document.createElement("button");
    button.type = "button";
    button.className = `tl-page-btn${isActive ? " is-active" : ""}`;
    button.textContent = label;
    button.dataset.action = action;
    if (page) {
      button.dataset.page = String(page);
    }
    button.disabled = isDisabled;
    button.setAttribute("aria-disabled", String(isDisabled));
    return button;
  };

  const initPagination = (pagination, allCardLinks, pageSize) => {
    const state = { page: 1 };

    const getVisibleLinks = () => allCardLinks.filter((link) => link.dataset.filterHidden !== "true");

    const render = (targetPage = state.page) => {
      const visibleLinks = getVisibleLinks();
      const totalPages = Math.max(1, Math.ceil(visibleLinks.length / pageSize));
      state.page = Math.min(Math.max(1, targetPage), totalPages);

      allCardLinks.forEach((link) => {
        link.hidden = link.dataset.filterHidden === "true";
      });

      if (visibleLinks.length > 0) {
        const startIndex = (state.page - 1) * pageSize;
        const endIndex = startIndex + pageSize;

        visibleLinks.forEach((link, index) => {
          link.hidden = index < startIndex || index >= endIndex;
        });
      }

      pagination.innerHTML = "";
      pagination.appendChild(
        createPageButton({ label: "Previous", action: "prev", isDisabled: state.page <= 1 })
      );

      for (let page = 1; page <= totalPages; page += 1) {
        pagination.appendChild(
          createPageButton({
            label: String(page),
            action: "page",
            page,
            isActive: page === state.page,
          })
        );
      }

      pagination.appendChild(
        createPageButton({ label: "Next ›", action: "next", isDisabled: state.page >= totalPages })
      );

      pagination.hidden = totalPages <= 1;
    };

    pagination.addEventListener("click", (event) => {
      const button = event.target.closest("button");
      if (!button || button.disabled) {
        return;
      }

      if (button.dataset.action === "prev") {
        render(state.page - 1);
        return;
      }

      if (button.dataset.action === "next") {
        render(state.page + 1);
        return;
      }

      render(Number(button.dataset.page || "1"));
    });

    return { render };
  };

  document.addEventListener("DOMContentLoaded", () => {
    const filterForm = document.querySelector(selectors.filtersForm);
    const list = document.querySelector(selectors.list);
    const pagination = document.querySelector(selectors.pagination);

    if (!filterForm || !list || !pagination) {
      return;
    }

    const cardLinks = Array.from(list.querySelectorAll(selectors.cardLinks));
    const pageSize = Math.max(1, Number(pagination.dataset.pageSize) || 2);
    const paginationApi = initPagination(pagination, cardLinks, pageSize);

    const syncView = () => {
      const filters = readFilters(filterForm);
      sortList(list, cardLinks, filters.sort);
      updateSearchVisibility(cardLinks, filters.query);
      paginationApi.render(1);
    };

    filterForm.addEventListener("submit", (event) => event.preventDefault());
    filterForm.addEventListener("input", syncView);
    filterForm.addEventListener("change", syncView);

    syncView();
  });
})();
