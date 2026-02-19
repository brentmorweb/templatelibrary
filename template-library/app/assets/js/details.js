(() => {
  const formatDate = (value) => {
    if (!value) {
      return "—";
    }

    const date = new Date(value);
    if (Number.isNaN(date.getTime())) {
      return "—";
    }

    return date.toLocaleDateString(undefined, {
      year: "numeric",
      month: "short",
      day: "numeric",
    });
  };

  const populateTemplate = (template) => {
    const title = template.title || template.name || "Untitled Template";
    document.querySelectorAll("[data-template-title]").forEach((el) => {
      el.textContent = title;
    });

    const code = template.code || {};
    const codeMap = {
      html: code.html || "",
      css: code.css || "",
      js: code.js || "",
    };

    Object.entries(codeMap).forEach(([key, value]) => {
      const target = document.querySelector(`[data-template-code=\"${key}\"]`);
      if (target) {
        target.textContent = value;
      }
    });

    const status = document.querySelector("[data-template-status]");
    if (status) {
      status.textContent = template.status || "draft";
    }

    const thumbnail = document.querySelector("[data-template-thumbnail]");
    if (thumbnail) {
      const thumbnailUrl = template.thumbnail_url || "";
      if (thumbnailUrl) {
        thumbnail.innerHTML = "";
        const image = document.createElement("img");
        image.src = thumbnailUrl;
        image.alt = `${title} thumbnail`;
        image.loading = "lazy";
        thumbnail.appendChild(image);
      } else {
        thumbnail.textContent = "Preview";
      }
    }

    const updated = document.querySelector("[data-template-updated]");
    if (updated) {
      updated.textContent = formatDate(template.updated_at || template.created_at || null);
    }

    const updatedBy = document.querySelector("[data-template-updated-by]");
    if (updatedBy) {
      updatedBy.textContent = template.updated_by || template.author || template.created_by || "—";
    }

    const created = document.querySelector("[data-template-created]");
    if (created) {
      created.textContent = formatDate(template.created_at || null);
    }

    const createdBy = document.querySelector("[data-template-created-by]");
    if (createdBy) {
      createdBy.textContent = template.created_by || template.author || "—";
    }
  };

  const fetchTemplate = async () => {
    const app = document.querySelector(".tl-app[data-page='template-details']");
    if (!app) {
      return;
    }

    const endpoint = app.dataset.templateEndpoint;
    const templateId = app.dataset.templateId;

    if (!endpoint || !templateId) {
      return;
    }

    try {
      const response = await fetch(`${endpoint}?id=${encodeURIComponent(templateId)}`, {
        credentials: "same-origin",
      });
      const payload = await response.json();
      if (!response.ok || !payload.template) {
        throw new Error("Unable to load template.");
      }

      populateTemplate(payload.template);
    } catch (error) {
      // leave existing UI fallback content
    }
  };

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

  document.addEventListener("DOMContentLoaded", () => {
    bindCopyButton();
    fetchTemplate();
  });
})();
