(() => {
  const ready = (callback) => {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", callback);
    } else {
      callback();
    }
  };

  const toggleVisibility = (trigger, target) => {
    if (!trigger || !target) {
      return;
    }

    trigger.addEventListener("click", () => {
      const isHidden = target.getAttribute("data-hidden") === "true";
      target.setAttribute("data-hidden", String(!isHidden));
      target.hidden = !target.hidden;
      trigger.setAttribute("aria-expanded", String(isHidden));
    });
  };

  const bindTabGroups = () => {
    document.querySelectorAll("[data-tab-group]").forEach((group) => {
      const tabs = Array.from(group.querySelectorAll(".tl-tab"));
      const panels = Array.from(group.querySelectorAll("[data-tab-panel]"));

      if (!tabs.length || !panels.length) {
        return;
      }

      const setActive = (tab) => {
        const tabKey = tab.getAttribute("data-tab");

        tabs.forEach((item) => item.classList.toggle("is-active", item === tab));
        panels.forEach((panel) => {
          const isMatch = panel.getAttribute("data-tab-panel") === tabKey;
          panel.hidden = !isMatch;
        });
      };

      tabs.forEach((tab) => {
        tab.addEventListener("click", () => setActive(tab));
      });
    });
  };

  ready(() => {
    document.querySelectorAll("[data-nav-trigger]").forEach((trigger) => {
      const targetId = trigger.getAttribute("data-nav-trigger");
      const target = targetId ? document.getElementById(targetId) : null;
      toggleVisibility(trigger, target);
    });

    bindTabGroups();
  });
})();
