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

  ready(() => {
    document.querySelectorAll("[data-nav-trigger]").forEach((trigger) => {
      const targetId = trigger.getAttribute("data-nav-trigger");
      const target = targetId ? document.getElementById(targetId) : null;
      toggleVisibility(trigger, target);
    });
  });
})();
