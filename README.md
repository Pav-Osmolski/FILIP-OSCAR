# Filip Oscar

A responsive, dependency-free music website for Filip Oscar. The public entry point
remains `index.php`, so the site can stay on its existing PHP/Apache hosting.

## Run locally

Use PHP 8.3 or newer:

```sh
php -S 127.0.0.1:8765
```

Open http://127.0.0.1:8765. No package installation or build is required.
The development server does not apply Apache's `.htaccess` rules.

## Edit the site

- `index.php`: content, biography, navigation, metadata, artwork, and outbound links.
- `lib/css/site.css`: responsive layout, typography, colours, and reduced-motion rules.
- `lib/js/site.js`: visitor-triggered Bandcamp, Spotify, and YouTube players.
- `lib/img/` and `lib/fonts/`: the original artwork and locally hosted typewriter font.

The page works without JavaScript. Biography sections use native HTML disclosures.
With JavaScript enabled, visitors may load and close third-party players.
The players are not contacted until a visitor loads one. Direct service links remain
available if playback is blocked or JavaScript is disabled.

The old compiled CSS, jQuery, ripple, and scrolling scripts remain as historical
assets, but the page no longer loads them. Update the new source files directly:
asset URLs use modification times for cache invalidation.
The obsolete Universal Analytics tag has been removed; no replacement tracking
identifier was supplied.

## Hosting and release

1. Back up the current deployment and preview this branch on staging.
2. Deploy the repository files together, including the new CSS and JavaScript.
3. Remove the retired `gzip.php` endpoint from the deployed directory.
4. Serve the site over HTTPS with PHP 8.3+ and Apache 2.4.
5. Check redirects, compression, caching, media playback, and the contact link.

`.htaccess` preserves the production domain and album shortcut redirects.
Compression is handled by Apache `mod_deflate`; `php.ini` disables the previous
duplicate PHP compression layer. Shared hosts may require the PHP setting in
their control panel. If hosting is behind an HTTPS-terminating proxy, check the
host's HTTPS detection before enabling redirects to avoid a redirect loop.

Optional Apache modules: `mod_rewrite`, `mod_alias`, `mod_mime`,
`mod_deflate`, `mod_expires`, and `mod_headers`.
No domain, release date, upcoming events, or discography claims should be inferred
from this refresh: album names and identifiers are preserved from the original site.

## Verification

```sh
php -l index.php
node --check lib/js/site.js
```

The refresh was checked in a Chromium-based browser at 320, 390, 768, and 1440px.
Checks covered horizontal overflow, image loading, no initial third-party requests,
keyboard player loading/closing and focus restoration, image clicks, external-link
attributes, navigation anchors, biography disclosures, reduced motion, and operation
with JavaScript disabled. Third-party iframe responses were mocked for these
interaction checks: live playback and production Apache configuration must also
be checked on staging.
