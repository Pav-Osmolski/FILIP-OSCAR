"use strict";

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
      trigger.focus();
    });

    container.replaceChildren(iframe, close);
    container.classList.add("loaded-embed");
    close.focus();
  });
});
