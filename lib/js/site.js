"use strict";

// Match the poster's tile origin to the surrounding section. Both inherit one
// animation phase, so resizing or closing the player cannot desynchronise them.
(() => {
  const watch = document.querySelector(".watch");
  const poster = watch?.querySelector(".video-poster");
  if (!poster) return;
  function alignRavens() {
    if (!poster.isConnected) return;
    const sectionRect = watch.getBoundingClientRect();
    const posterRect = poster.getBoundingClientRect();
    poster.style.setProperty("--raven-offset-x", (sectionRect.left - posterRect.left) + "px");
    poster.style.setProperty("--raven-offset-y", (sectionRect.top - posterRect.top) + "px");
  }
  const observer = new ResizeObserver(alignRavens);
  observer.observe(watch);
  observer.observe(poster);
  watch.querySelector(".video-embed").addEventListener("ripple-resume", alignRavens);
  document.fonts.ready.then(alignRavens);
  alignRavens();
})();

// Third-party players are created only after a visitor explicitly loads one.
const players = {
  bandcamp: {
    src: "https://bandcamp.com/EmbeddedPlayer/album=4244401088/size=large/bgcol=ffffff/linkcol=ab3046/minimal=true/transparent=true/",
    title: "The Way is Golden by Filip Oscar — Bandcamp player",
    allow: "autoplay"
  },
  spotify: {
    src: "https://open.spotify.com/embed/album/7FG9Tcb7yg01Fbi3TdHgT2",
    title: "The Way is Golden by Filip Oscar — Spotify player",
    allow: "autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
  },
  youtube: {
    src: "https://www.youtube-nocookie.com/embed/videoseries?list=PLAYHD6mbuOHFRHa666l_Jh58TTEkiO9pN",
    title: "Filip Oscar performances — YouTube playlist",
    allow: "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
  }
};

document.querySelectorAll(".js-only").forEach(element => { element.hidden = false; });

document.querySelectorAll(".media-embed").forEach(container => {
  const trigger = container.querySelector(".embed-trigger");
  const config = players[container.dataset.provider];
  if (!trigger || !config) return;

  trigger.hidden = false;
  const fallback = container.querySelector(".video-fallback");
  if (fallback) fallback.hidden = true;

  trigger.addEventListener("click", () => {
    container.dispatchEvent(new Event("ripple-suspend"));
    const originalContent = Array.from(container.childNodes);
    const iframe = document.createElement("iframe");
    iframe.src = config.src;
    iframe.title = config.title;
    iframe.allow = config.allow;
    iframe.allowFullscreen = true;
    iframe.referrerPolicy = "strict-origin-when-cross-origin";

    const close = document.createElement("button");
    close.type = "button";
    close.className = "unload-player";
    close.textContent = "Close player ×";
    close.setAttribute("aria-label", "Close " + container.dataset.provider + " player");
    close.addEventListener("click", () => {
      container.replaceChildren(...originalContent);
      container.classList.remove("loaded-embed");
      container.dispatchEvent(new Event("ripple-resume"));
      trigger.focus();
    });

    container.replaceChildren(iframe, close);
    container.classList.add("loaded-embed");
    close.focus();
  });
});

// Keep native details/summary semantics and progressively enhance their motion.
(() => {
  const reducedMotion = matchMedia("(prefers-reduced-motion: reduce)");
  document.querySelectorAll(".bio details").forEach(details => {
    const summary = details.querySelector("summary");
    if (!summary || !Element.prototype.animate) return;
    const content = document.createElement("div");
    content.className = "details-content";
    while (summary.nextSibling) content.append(summary.nextSibling);
    details.append(content);
    let animation = null;
    let expanded = details.open;

    function settle() {
      if (animation) animation.cancel();
      animation = null;
      details.open = expanded;
      content.style.height = "";
    }

    summary.addEventListener("click", event => {
      event.preventDefault();
      const height = details.open ? content.getBoundingClientRect().height : 0;
      expanded = !expanded;
      if (reducedMotion.matches) { settle(); return; }
      if (animation) animation.cancel();
      details.open = true;
      content.style.height = height + "px";
      const nextAnimation = content.animate(
        [{ height: height + "px" }, { height: (expanded ? content.scrollHeight : 0) + "px" }],
        { duration: 250, easing: "ease", fill: "forwards" }
      );
      animation = nextAnimation;
      nextAnimation.onfinish = () => {
        if (animation === nextAnimation) settle();
      };
    });
    reducedMotion.addEventListener("change", () => {
      if (reducedMotion.matches) settle();
    });
  });
})();
