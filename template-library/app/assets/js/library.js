(() => {
  const selectors = {
    app: ".tl-app[data-page=\"library\"]",
    filtersForm: "[data-library-filters]",
    searchInput: "[data-library-search]",
    list: "[data-template-list]",
    pagination: "[data-library-pagination]",
    cardLinks: ".tl-template-card-link",
    rowAction: "[data-library-action]",
  };

  const MIN_SEARCH_CHARACTERS = 3;

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


  const escapeAttr = (value) => String(value || "").replace(/"/g, "&quot;");

  const addCardActions = (cardLinks, isAuthenticated) => {
    cardLinks.forEach((link) => {
      if (link.querySelector(".tl-template-card__actions")) {
        return;
      }

      const card = link.querySelector(".tl-template-card");
      const body = card?.querySelector(".tl-template-card__body");
      if (!card || !body) {
        return;
      }

      const templateId = link.dataset.templateId || "";
      const actions = document.createElement("div");
      actions.className = "tl-template-card__actions";
      actions.innerHTML = `
        <a class="tl-btn tl-btn--ghost tl-btn--sm" href="template-edit.php?id=${escapeAttr(templateId)}" data-library-action="edit">Edit</a>
        ${
          isAuthenticated
            ? `<button class="tl-btn tl-btn--danger tl-btn--sm" type="button" data-library-action="delete" data-template-id="${escapeAttr(templateId)}">Delete</button>`
            : ""
        }
      `;

      body.appendChild(actions);
    });
  };

  const bindActionInterception = (list) => {
    list.addEventListener("click", (event) => {
      const action = event.target.closest(selectors.rowAction);
      if (!action) {
        return;
      }

      event.stopPropagation();

      if (action.tagName === "A") {
        event.preventDefault();
        const href = action.getAttribute("href");
        if (href) {
          window.location.href = href;
        }
      }
    });
  };

  const bindDeleteActions = (list, { isAuthenticated, deleteEndpoint, onAfterDelete }) => {
    if (!isAuthenticated || !deleteEndpoint) {
      return;
    }

    list.addEventListener("click", async (event) => {
      const button = event.target.closest('button[data-library-action="delete"]');
      if (!button) {
        return;
      }

      event.preventDefault();
      event.stopPropagation();

      const templateId = button.dataset.templateId || "";
      if (!templateId) {
        return;
      }

      const confirmed = window.confirm("Delete this template?");
      if (!confirmed) {
        return;
      }

      button.disabled = true;
      const originalLabel = button.textContent;
      button.textContent = "Deleting...";

      try {
        const response = await fetch(deleteEndpoint, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          credentials: "same-origin",
          body: JSON.stringify({ id: templateId, action: "delete" }),
        });

        if (!response.ok) {
          throw new Error(`Delete failed (${response.status})`);
        }

        const cardLink = button.closest(selectors.cardLinks);
        cardLink?.remove();
        onAfterDelete();
      } catch (error) {
        window.alert("Unable to delete template right now.");
        button.disabled = false;
        button.textContent = originalLabel || "Delete";
      }
    });
  };

  const readFilters = (form) => {
    const formData = new FormData(form);
    return {
      query: String(formData.get("q") || "").trim().toLowerCase(),
      sort: String(formData.get("sort") || "recent"),
    };
  };

  const updateSearchVisibility = (cardLinks, query) => {
    const hasQuery = query.length >= MIN_SEARCH_CHARACTERS;

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

  const initPagination = (pagination, getAllCardLinks, pageSize) => {
    const state = { page: 1 };

    const getVisibleLinks = () => getAllCardLinks().filter((link) => link.dataset.filterHidden !== "true");

    const render = (targetPage = state.page) => {
      const visibleLinks = getVisibleLinks();
      const totalPages = Math.max(1, Math.ceil(visibleLinks.length / pageSize));
      state.page = Math.min(Math.max(1, targetPage), totalPages);

      getAllCardLinks().forEach((link) => {
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
    const app = document.querySelector(selectors.app);
    const filterForm = document.querySelector(selectors.filtersForm);
    const list = document.querySelector(selectors.list);
    const pagination = document.querySelector(selectors.pagination);

    if (!app || !filterForm || !list || !pagination) {
      return;
    }

    const isAuthenticated = app.dataset.authenticated === "true";
    const deleteEndpoint = app.dataset.deleteEndpoint || "";

    const getCardLinks = () => Array.from(list.querySelectorAll(selectors.cardLinks));
    addCardActions(getCardLinks(), isAuthenticated);

    const pageSize = Math.max(1, Number(pagination.dataset.pageSize) || 2);
    const paginationApi = initPagination(pagination, getCardLinks, pageSize);

    const syncView = () => {
      const filters = readFilters(filterForm);
      const cardLinks = getCardLinks();
      sortList(list, cardLinks, filters.sort);
      updateSearchVisibility(cardLinks, filters.query);
      paginationApi.render(1);
    };

    filterForm.addEventListener("submit", (event) => event.preventDefault());
    filterForm.addEventListener("input", syncView);
    filterForm.addEventListener("change", syncView);

    bindActionInterception(list);

    bindDeleteActions(list, {
      isAuthenticated,
      deleteEndpoint,
      onAfterDelete: syncView,
    });

    syncView();
  });
})();
