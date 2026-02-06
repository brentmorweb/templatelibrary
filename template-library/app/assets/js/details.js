(() => {
  const bindCopyButton = () => {
    const copyButton = document.querySelector("[data-copy-template]");
    const templateBlock = document.querySelector("[data-template-output]");

    if (!copyButton || !templateBlock) {
      return;
    }

    copyButton.addEventListener("click", async () => {
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
