(() => {
  const THUMBNAIL_MODAL_ID = "template-thumbnail-modal";

  const ensureThumbnailModal = () => {
    let modal = document.getElementById(THUMBNAIL_MODAL_ID);
    if (modal) {
      return modal;
    }

    modal = document.createElement("dialog");
    modal.id = THUMBNAIL_MODAL_ID;
    modal.className = "tl-image-modal";
    modal.setAttribute("aria-label", "Full-size template preview");
    modal.innerHTML = `
      <form method="dialog" class="tl-image-modal__scrim" data-modal-close>
        <button type="submit" class="tl-image-modal__close" aria-label="Close full-size preview">×</button>
      </form>
      <div class="tl-image-modal__content" role="document">
        <img src="" alt="" data-modal-image>
      </div>
    `;

    modal.addEventListener("click", (event) => {
      if (event.target === modal || event.target.closest("[data-modal-close]")) {
        modal.close();
      }
    });

    document.body.appendChild(modal);
    return modal;
  };

  const bindThumbnailModal = (thumbnail, image, title) => {
    if (!thumbnail || !image?.src) {
      return;
    }

    thumbnail.setAttribute("role", "button");
    thumbnail.tabIndex = 0;
    thumbnail.setAttribute("aria-label", `Open full-size preview for ${title}`);

    const openModal = () => {
      const modal = ensureThumbnailModal();
      const modalImage = modal.querySelector("[data-modal-image]");
      if (!modalImage) {
        return;
      }

      modalImage.src = image.src;
      modalImage.alt = `${title} full-size preview`;

      if (typeof modal.showModal === "function") {
        modal.showModal();
      }
    };

    thumbnail.addEventListener("click", openModal);
    thumbnail.addEventListener("keydown", (event) => {
      if (event.key === "Enter" || event.key === " ") {
        event.preventDefault();
        openModal();
      }
    });
  };

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

    const tabGroup = document.querySelector("[data-tab-group='template-details-code']");
    if (tabGroup) {
      const isPublished = String(template.status || "").toLowerCase() === "published";
      const codeByTab = {
        php: codeMap.html,
        css: codeMap.css,
        js: codeMap.js,
      };

      const tabs = Array.from(tabGroup.querySelectorAll(".tl-tab[data-tab]"));
      const panels = Array.from(tabGroup.querySelectorAll("[data-tab-panel]"));

      tabs.forEach((tab) => {
        const key = tab.getAttribute("data-tab") || "";
        const isEmpty = (codeByTab[key] || "").trim() === "";
        tab.hidden = isPublished && isEmpty;
      });

      panels.forEach((panel) => {
        const key = panel.getAttribute("data-tab-panel") || "";
        const isEmpty = (codeByTab[key] || "").trim() === "";
        panel.hidden = isPublished && isEmpty;
      });

      const visibleTabs = tabs.filter((tab) => !tab.hidden);
      const activeTab = tabs.find((tab) => tab.classList.contains("is-active") && !tab.hidden);
      const nextTab = activeTab || visibleTabs[0] || null;

      tabs.forEach((tab) => tab.classList.toggle("is-active", tab === nextTab));
      panels.forEach((panel) => {
        const isActivePanel = nextTab
          ? panel.getAttribute("data-tab-panel") === nextTab.getAttribute("data-tab")
          : false;
        panel.hidden = !isActivePanel;
      });
    }

    Object.entries(codeMap).forEach(([key, value]) => {
      const target = document.querySelector(`[data-template-code=\"${key}\"]`);
      if (target) {
        target.textContent = value;
      }
    });

    const description = document.querySelector("[data-template-description]");
    if (description) {
      const text = typeof template.description === "string" ? template.description.trim() : "";
      description.textContent = text || "—";
    }

    const status = document.querySelector("[data-template-status]");
    if (status) {
      status.textContent = template.status || "draft";
    }

    const demoLink = document.querySelector("[data-template-demo-link]");
    if (demoLink) {
      const demoUrl = typeof template.demo_url === "string" ? template.demo_url.trim() : "";
      if (demoUrl) {
        demoLink.href = demoUrl;
        demoLink.removeAttribute("aria-disabled");
      } else {
        demoLink.href = "#";
        demoLink.setAttribute("aria-disabled", "true");
      }
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
        bindThumbnailModal(thumbnail, image, title);
      } else {
        thumbnail.textContent = "Preview";
        thumbnail.removeAttribute("role");
        thumbnail.removeAttribute("tabindex");
        thumbnail.removeAttribute("aria-label");
      }
    }

    const updated = document.querySelector("[data-template-updated]");
    if (updated) {
      updated.textContent = "";
    }

    const updatedBy = document.querySelector("[data-template-updated-by]");
    if (updatedBy) {
      updatedBy.textContent = "";
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
