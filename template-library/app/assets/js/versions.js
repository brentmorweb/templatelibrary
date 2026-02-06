(() => {
  const bindVersionList = () => {
    const rows = document.querySelectorAll("[data-version-row]");
    const output = document.querySelector("[data-version-details]");

    if (!rows.length || !output) {
      return;
    }

    rows.forEach((row) => {
      row.addEventListener("click", () => {
        const version = row.getAttribute("data-version");
        const note = row.getAttribute("data-version-note");
        output.textContent = version
          ? `Viewing ${version}${note ? `: ${note}` : ""}`
          : "Select a version to view details";
      });
    });
  };

  document.addEventListener("DOMContentLoaded", bindVersionList);
})();
