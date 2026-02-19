(() => {
  const bindEditorActions = () => {
    const appRoot = document.querySelector(".tl-app[data-page='template-edit']");
    const form = document.querySelector("[data-template-form]");
    const uploadInput = document.querySelector("[data-editor-upload]");
    const status = document.querySelector("[data-editor-status]");
    const saveButtons = Array.from(document.querySelectorAll("[data-editor-save]"));

    if (form && appRoot) {
      form.addEventListener("submit", async (event) => {
        event.preventDefault();

        const saveEndpoint = appRoot.dataset.saveEndpoint;
        if (!saveEndpoint) {
          return;
        }

        if (status) {
          status.textContent = "Saving…";
        }

        saveButtons.forEach((button) => {
          button.disabled = true;
        });

        try {
          const response = await fetch(saveEndpoint, {
            method: "POST",
            body: new FormData(form),
          });

          const payload = await response.json();
          if (!response.ok || !payload.template?.id) {
            throw new Error(payload.error || "Unable to save template.");
          }

          if (status) {
            status.textContent = "Saved";
          }

          window.location.href = `template.php?id=${encodeURIComponent(payload.template.id)}`;
        } catch (error) {
          if (status) {
            status.textContent = error instanceof Error ? error.message : "Unable to save template.";
          }
        } finally {
          saveButtons.forEach((button) => {
            button.disabled = false;
          });
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
