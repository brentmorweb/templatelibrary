(() => {
  const bindCopyButton = () => {
    const copyButton = document.querySelector("[data-copy-template]");

    if (!copyButton) {
      return;
    }

    copyButton.addEventListener("click", async () => {
      const container = copyButton.closest(".tl-card") || document;
      const templateBlock =
        container.querySelector(".tl-code-panel:not([hidden])") ||
        container.querySelector("[data-template-output]");

      if (!templateBlock) {
        return;
      }

      try {
        await navigator.clipboard.writeText(templateBlock.textContent || "");
        copyButton.setAttribute("data-copied", "true");
        copyButton.textContent = "Copied";
      } catch (error) {
        copyButton.setAttribute("data-copied", "false");
        copyButton.textContent = "Copy failed";
      }
    });
  };

  document.addEventListener("DOMContentLoaded", bindCopyButton);
})();
