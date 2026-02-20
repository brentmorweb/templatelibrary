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
    document.querySelectorAll("[data-tab-group]").forEach((group, groupIndex) => {
      const tabs = Array.from(group.querySelectorAll(".tl-tab"));
      const panels = Array.from(group.querySelectorAll("[data-tab-panel]"));

      if (!tabs.length || !panels.length) {
        return;
      }

      tabs.forEach((tab, tabIndex) => {
        const tabKey = tab.getAttribute("data-tab");
        const panel = panels.find((item) => item.getAttribute("data-tab-panel") === tabKey);

        tab.setAttribute("role", "tab");
        tab.id ||= `tab-${groupIndex}-${tabKey ?? tabIndex}`;

        if (panel) {
          panel.setAttribute("role", "tabpanel");
          panel.id ||= `tabpanel-${groupIndex}-${tabKey ?? tabIndex}`;
          tab.setAttribute("aria-controls", panel.id);
          panel.setAttribute("aria-labelledby", tab.id);
        }
      });

      const setActive = (tab, shouldFocus = false) => {
        const tabKey = tab.getAttribute("data-tab");

        tabs.forEach((item) => {
          const isActive = item === tab;
          item.classList.toggle("is-active", isActive);
          item.setAttribute("aria-selected", String(isActive));
          item.tabIndex = isActive ? 0 : -1;
        });

        panels.forEach((panel) => {
          const isMatch = panel.getAttribute("data-tab-panel") === tabKey;
          panel.hidden = !isMatch;
        });

        if (shouldFocus) {
          tab.focus();
        }
      };

      tabs.forEach((tab, index) => {
        tab.addEventListener("click", () => setActive(tab));
        tab.addEventListener("keydown", (event) => {
          if (!["ArrowRight", "ArrowLeft", "Home", "End"].includes(event.key)) {
            return;
          }

          event.preventDefault();

          if (event.key === "Home") {
            setActive(tabs[0], true);
            return;
          }

          if (event.key === "End") {
            setActive(tabs[tabs.length - 1], true);
            return;
          }

          const direction = event.key === "ArrowRight" ? 1 : -1;
          const nextIndex = (index + direction + tabs.length) % tabs.length;
          setActive(tabs[nextIndex], true);
        });
      });

      const activeTab = tabs.find((tab) => tab.classList.contains("is-active")) ?? tabs[0];
      setActive(activeTab);
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
