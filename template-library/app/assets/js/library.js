(() => {
  const normalize = (value) => value.trim().toLowerCase();

  const getActiveFilters = () => {
    const filters = {};
    document.querySelectorAll("[data-library-filter]").forEach((select) => {
      const key = select.getAttribute("data-library-filter");
      const rawValue = select.value;
      const optionValue = select.selectedOptions[0]?.dataset.filterValue ?? rawValue;
      const normalized = normalize(optionValue);
      if (normalized && normalized !== "all") {
        filters[key] = normalized;
      }
    });
    return filters;
  };

  const filterCards = () => {
    const cards = document.querySelectorAll("[data-library-card]");
    const query = normalize(document.querySelector("[data-library-search]")?.value ?? "");
    const filters = getActiveFilters();

    cards.forEach((card) => {
      const searchable = card.getAttribute("data-search") || "";
      const normalizedSearchable = normalize(searchable);
      const matchesQuery = query.length === 0 || normalizedSearchable.includes(query);
      const matchesFilters = Object.entries(filters).every(([key, value]) => {
        const attribute = normalize(card.getAttribute(`data-${key}`) || "");
        return attribute === value;
      });

      card.hidden = !(matchesQuery && matchesFilters);
    });
  };

  document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector("[data-library-search]");

    if (!searchInput) {
      return;
    }

    searchInput.addEventListener("input", filterCards);
    document.querySelectorAll("[data-library-filter]").forEach((select) => {
      select.addEventListener("change", filterCards);
    });
  });
})();
