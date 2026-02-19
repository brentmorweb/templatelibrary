(() => {
  const selectors = {
    app: ".tl-app[data-page=\"library\"]",
    filtersForm: "[data-library-filters]",
    searchInput: "[data-library-search]",
    list: "[data-template-list]",
    cardLinks: ".tl-template-card-link",
    rowAction: "[data-library-action]",
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

      if (isAuthenticated) {
        actions.innerHTML = `
          <button class="tl-btn tl-btn--ghost tl-btn--sm" type="button" data-library-action="edit" data-href="template-edit.php?id=${escapeAttr(templateId)}">Edit</button>
          <button class="tl-btn tl-btn--danger tl-btn--sm" type="button" data-library-action="delete" data-template-id="${escapeAttr(templateId)}">Delete</button>
        `;
      }

      if (!actions.innerHTML.trim()) {
        return;
      }

      body.appendChild(actions);
    });
  };

  const bindActionInterception = (list) => {
    list.addEventListener("click", (event) => {
      const action = event.target.closest(selectors.rowAction);
      if (!action) {
        return;
      }

      event.preventDefault();
      event.stopPropagation();

      if (action.tagName === "A") {
        const href = action.getAttribute("href");
        if (href) {
          window.location.href = href;
        }
        return;
      }

      if (action.tagName === "BUTTON") {
        const href = action.getAttribute("data-href");
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
    cardLinks.forEach((link) => {
      const searchable = (link.querySelector("[data-library-card]")?.dataset.search || "").toLowerCase();
      const matches = query.length === 0 || searchable.includes(query);
      link.dataset.filterHidden = String(!matches);
    });
  };

  const sortList = (list, cardLinks, sortKey) => {
    const sorter = sorterMap[sortKey] || sorterMap.recent;
    [...cardLinks].sort(sorter).forEach((link) => list.appendChild(link));
  };

  document.addEventListener("DOMContentLoaded", () => {
    const app = document.querySelector(selectors.app);
    const filterForm = document.querySelector(selectors.filtersForm);
    const list = document.querySelector(selectors.list);
    if (!app || !filterForm || !list) {
      return;
    }

    const isAuthenticated = app.dataset.authenticated === "true";
    const deleteEndpoint = app.dataset.deleteEndpoint || "";

    const getCardLinks = () => Array.from(list.querySelectorAll(selectors.cardLinks));
    addCardActions(getCardLinks(), isAuthenticated);

    const syncView = () => {
      const filters = readFilters(filterForm);
      const cardLinks = getCardLinks();
      sortList(list, cardLinks, filters.sort);
      updateSearchVisibility(cardLinks, filters.query);
      cardLinks.forEach((link) => {
        link.hidden = link.dataset.filterHidden === "true";
      });
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
