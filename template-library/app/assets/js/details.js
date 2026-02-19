(() => {
  const bindCopyButton = () => {
    const copyButton = document.querySelector("[data-copy-template]");

    if (!copyButton) {
      return;
    }

    const copyLabel = copyButton.querySelector("[data-copy-label]");

    copyButton.addEventListener("click", async () => {
      const templateBlock =
        document.querySelector(".tl-code-panel:not([hidden])") || document.querySelector("[data-template-output]");

      if (!templateBlock) {
        return;
      }

      try {
        await navigator.clipboard.writeText(templateBlock.textContent || "");
        copyButton.setAttribute("data-copied", "true");
        if (copyLabel) {
          copyLabel.textContent = "Copied";
          window.setTimeout(() => {
            copyButton.removeAttribute("data-copied");
            copyLabel.textContent = "Copy";
          }, 1600);
        }
      } catch (error) {
        copyButton.setAttribute("data-copied", "false");
        if (copyLabel) {
          copyLabel.textContent = "Copy failed";
        }
      }
    });
  };

  document.addEventListener("DOMContentLoaded", bindCopyButton);
})();
