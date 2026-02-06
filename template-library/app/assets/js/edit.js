(() => {
  const bindEditorActions = () => {
    const saveButton = document.querySelector("[data-editor-save]");
    const uploadInput = document.querySelector("[data-editor-upload]");
    const status = document.querySelector("[data-editor-status]");

    if (saveButton) {
      saveButton.addEventListener("click", () => {
        if (status) {
          status.textContent = "Saved draft locally";
        }
      });
    }

    if (uploadInput) {
      uploadInput.addEventListener("change", (event) => {
        const fileName = event.target.files?.[0]?.name;
        if (status) {
          status.textContent = fileName
            ? `Selected ${fileName}`
            : "No file selected";
        }
      });
    }
  };

  document.addEventListener("DOMContentLoaded", bindEditorActions);
})();
