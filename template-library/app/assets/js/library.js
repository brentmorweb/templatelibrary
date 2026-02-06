(() => {
  const filterCards = (query) => {
    const cards = document.querySelectorAll("[data-library-card]");
    const normalizedQuery = query.trim().toLowerCase();

    cards.forEach((card) => {
      const searchable = card.getAttribute("data-search") || "";
      const isMatch = searchable.toLowerCase().includes(normalizedQuery);
      card.hidden = normalizedQuery.length > 0 && !isMatch;
    });
  };

  document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector("[data-library-search]");

    if (!searchInput) {
      return;
    }

    searchInput.addEventListener("input", (event) => {
      filterCards(event.target.value);
    });
  });
})();
