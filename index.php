<?php
declare(strict_types=1);

function asset_version(string $path): string
{
    $modified = filemtime(__DIR__ . '/' . $path);
    return htmlspecialchars($path . '?v=' . $modified, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filip Oscar | Music, films &amp; a little hello</title>
    <meta name="description" content="The music of Filip Oscar, an English singer-songwriter and multi-instrumentalist. Listen to The Way is Golden, watch performances, and get in touch.">
    <meta name="color-scheme" content="light">
    <meta name="theme-color" content="#f5f0e8">
    <link rel="canonical" href="https://www.filiposcar.com/">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <meta property="og:locale" content="en_GB">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Filip Oscar | Music, films &amp; a little hello">
    <meta property="og:description" content="Songs, sounds and stories. Explore the music of Filip Oscar.">
    <meta property="og:url" content="https://www.filiposcar.com/">
    <meta property="og:site_name" content="Filip Oscar">
    <meta property="og:image" content="https://www.filiposcar.com/lib/img/album_thewayisgolden.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Filip Oscar">
    <meta name="twitter:description" content="Songs, sounds and stories. Explore the music of Filip Oscar.">
    <meta name="twitter:image" content="https://www.filiposcar.com/lib/img/album_thewayisgolden.jpg">
    <link rel="preload" href="lib/fonts/MonospaceTypewriter-webfont.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="<?= asset_version('lib/css/site.css') ?>">
    <script defer src="<?= asset_version('lib/js/ripples.js') ?>"></script>
    <script defer src="<?= asset_version('lib/js/site.js') ?>"></script>
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>
    <header class="site-header">
        <a class="wordmark" href="#filiposcar" aria-label="Filip Oscar home">FO</a>
        <nav aria-label="Main navigation"><a href="#listen">Listen</a><a href="#watch">Watch</a><a href="#bio">Hello</a><a href="#contact">Contact ↗</a></nav>
    </header>
    <main id="main">
        <section class="hero section-wrap" id="filiposcar" aria-labelledby="hero-title">
            <div class="hero-copy"><p class="eyebrow">Independent music · London</p><h1 id="hero-title">FILIP<br>OSCAR</h1><p class="hero-description">Guitar strings, ivory keys<br>and technological bleeps.</p><a class="button button-dark" href="#listen">Find your next listen <span aria-hidden="true">↘</span></a></div>
            <figure class="hero-art"><div class="ripple-art" data-ripple><img src="lib/img/filiposcar_big.jpg" alt="Filip Oscar artwork: a dark, glowing red sphere against a soft pink background" width="1024" height="1024" fetchpriority="high"></div><figcaption><span>Songs. Sounds. Stories.</span><span aria-hidden="true">01 / FO</span></figcaption></figure>
        </section>
        <section class="listen section-wrap" id="listen" aria-labelledby="listen-title">
            <div class="section-heading"><p class="eyebrow">01 / Listen</p><p>A little world to get lost in.</p></div>
            <div class="album-grid">
                <div class="album-art media-embed ripple-art" data-provider="bandcamp" data-ripple><img src="lib/img/album_thewayisgolden.jpg" alt="Cover artwork for The Way is Golden by Filip Oscar" width="1000" height="1000" loading="lazy"><button class="embed-trigger" type="button" hidden><span class="play-icon" aria-hidden="true">▶</span><span>Load Bandcamp player</span></button></div>
                <div class="album-copy"><p class="eyebrow">Featured album</p><h2 id="listen-title">The Way<br>is Golden.</h2><p class="lead">An invitation to press play.<br>Stay for a song. Stay for the whole thing.</p>
                    <div class="link-row"><a class="button button-dark" href="https://filiposcar.bandcamp.com/album/the-way-is-golden" target="_blank" rel="noopener noreferrer">Listen on Bandcamp <span aria-hidden="true">↗</span></a><a class="text-link" href="https://open.spotify.com/album/7FG9Tcb7yg01Fbi3TdHgT2" target="_blank" rel="noopener noreferrer">Spotify <span aria-hidden="true">↗</span></a></div>
                    <div class="spotify-embed media-embed" data-provider="spotify"><button class="embed-trigger compact-trigger" type="button" hidden>Load Spotify player <span aria-hidden="true">+</span></button></div>
                    <p class="embed-note js-only" hidden>Players connect to Bandcamp or Spotify when you load them.</p>
                    <div class="more-music"><p class="eyebrow">More from Filip Oscar</p><a class="" href="https://filiposcar.bandcamp.com/album/raven-white" target="_blank" rel="noopener noreferrer">Raven White <span aria-hidden="true">↗</span></a><a class="" href="https://filiposcar.bandcamp.com/album/brokenness-trio" target="_blank" rel="noopener noreferrer">Brokenness Trio <span aria-hidden="true">↗</span></a></div>
                </div>
            </div>
        </section>
        <section class="watch" id="watch" aria-labelledby="watch-title"><div class="section-wrap">
            <div class="section-heading"><p class="eyebrow">02 / Watch</p><a class="" href="https://www.youtube.com/c/FILIPOSCAR" target="_blank" rel="noopener noreferrer">Visit the YouTube channel <span aria-hidden="true">↗</span></a></div><h2 id="watch-title">Music in motion.</h2>
            <div class="video-embed media-embed" data-provider="youtube"><div class="video-poster"><img src="lib/img/ravenwhite.jpg" alt="" width="1024" height="1024" loading="lazy"><div><p class="eyebrow">Filip Oscar / Performances</p><a class="button button-light video-fallback" href="https://www.youtube.com/playlist?list=PLAYHD6mbuOHFRHa666l_Jh58TTEkiO9pN" target="_blank" rel="noopener noreferrer">Watch on YouTube <span aria-hidden="true">↗</span></a><button class="embed-trigger" type="button" hidden><span class="play-icon" aria-hidden="true">▶</span><span>Load performances</span></button></div></div></div>
            <p class="embed-note js-only" hidden>Loading the video connects to YouTube.</p>
        </div></section>
        <section class="bio section-wrap" id="bio" aria-labelledby="bio-title">
            <div class="section-heading"><p class="eyebrow">03 / Hello</p><p>The person behind the sounds.</p></div>
            <div class="bio-grid"><figure class="portrait"><img src="lib/img/eatingtheguitar.jpg" alt="Filip Oscar in his natural habitat, posing with an acoustic guitar" width="1920" height="885" loading="lazy"><figcaption>A perfectly normal relationship with a guitar.</figcaption></figure>
                <div class="bio-copy"><h2 id="bio-title">A little<br>introduction.</h2><p class="lead">Pawel “Filip Oscar” Osmolski is an English singer-songwriter and self-taught multi-instrumentalist.</p><p>From classical and jazz piano to impressionistic indie folk, his music follows a love of guitar strings, synthetic ivory keys and technological bleeps.</p>
                    <details><summary>The slightly longer version <span aria-hidden="true">+</span></summary><p>At the height of his musical diversity, before all brain cells started to implode and otherwise shout mean words at each other “Classical is better than Country! Take that you infernal collection of cells!”. FILIP OSCAR was born out of constraint, a severe case of playing far too many vintage computer games and listening to the robot voice on Fitter Happier.</p>
<p>It was a slow evolution, a bit like if someone annoyingly crept behind you every day, a third eye would suddenly pop into existence at the back of your head. Handy that! His lust for guitar strings, synthetic ivory keys and technological bleeps, meant that all other interests were departed, drifting away on a mossy boat until they unloaded on a pitifully small island.</p>
<p>What does this all mean? A very honest and logical question! The long answer would involve an angry undressing accompanied by some excessively detailed charts. The short answer is much simpler. You would be a wiser and better person to visit him on <a href="https://filiposcar.bandcamp.com/album/the-way-is-golden" title="Listen to Filip Oscar on Bandcamp" target="_blank" rel="noopener noreferrer">Bandcamp</a>, or one of those impossibly large virtual musical libraries. <a href="https://bit.ly/FilipOscarSpotify" title="Listen to Filip Oscar on Spotify" target="_blank" rel="noopener">Spotify</a>, <a href="https://bit.ly/FilipOscarApple" title="Listen to Filip Oscar on Apple Music" target="_blank" rel="noopener">Apple Music</a> and the like.</p>
<p>You may also follow him on <a href="https://bit.ly/FilipOscarSoundCloud" title="Listen to Filip Oscar on SoundCloud" target="_blank" rel="noopener">SoundCloud</a> to hear the occasional sneak preview or work in progress. It's a bit like receiving a sampler pack of tea with lots of different flavours.</p></details>
                    <details><summary>A brief history lesson <span aria-hidden="true">+</span></summary><p>Pawel "Filip Oscar" Osmolski is an English singer-songwriter and musician. Filip was born May 12, 1983 in Newbury Park, London, where he grew up in a musical family. Filip is a self-taught multi-instrumentalist, and his love for music started with classical and jazz piano.</p>
<p>His pre-teen years were spent composing piano works and learning music by Frédéric Chopin, Ludwig van Beethoven and Scott Joplin. As a teenager he jumped into the 90's rock and grunge scene, finding inspiration through Thom Yorke, Jeff Buckley, Patrick Duff, Chris Cornell, Trent Reznor and earlier bands like Joy Division, Pixies, The Smiths and R.E.M. He eventually found his footing as a singer-songwriter, focusing on writing impressionistic indie folk music with just his voice and acoustic guitar.</p>
<p>Filip is a modest man with a great deal of sensitivity, usually introducing new songs personally to his closest friends first, and infrequently performing at open mic gigs under different names. He has been writing for many years and has managed to build up a huge portfolio of music.</p>
<p>Filip is an avid fan of Doctor Who, with Capaldi being his favourite Doctor. He's also a fan of Westworld, Battlestar Galactica, Star Trek: TNG, Adventure Time, video gaming, Dark Souls in particular, Derren Brown, Louis Theroux, Peter Serafinowicz and Chris Morris.</p></details>
                </div>
            </div>
        </section>
        <section class="contact" id="contact" aria-labelledby="contact-title"><div class="section-wrap"><p class="eyebrow">04 / Contact</p><h2 id="contact-title">Say hello<span>.</span></h2><a class="email-link" href="mailto:hello@filiposcar.com">hello@filiposcar.com <span aria-hidden="true">↗</span></a>
            <div class="social-links" aria-label="Social links"><a class="" href="https://www.facebook.com/FilipOscarOfficial" target="_blank" rel="noopener noreferrer">Facebook <span aria-hidden="true">↗</span></a><a class="" href="https://www.youtube.com/c/FILIPOSCAR" target="_blank" rel="noopener noreferrer">YouTube <span aria-hidden="true">↗</span></a><a class="" href="https://twitter.com/Filip_Oscar" target="_blank" rel="noopener noreferrer">X / Twitter <span aria-hidden="true">↗</span></a><a class="" href="https://instagram.com/captainstarpaw/" target="_blank" rel="noopener noreferrer">Instagram <span aria-hidden="true">↗</span></a><a class="" href="https://bit.ly/FilipOscarSoundCloud" target="_blank" rel="noopener noreferrer">SoundCloud <span aria-hidden="true">↗</span></a></div>
        </div></section>
    </main>
    <footer class="site-footer section-wrap"><p>© <?= date('Y') ?> Filip Oscar</p><a href="#filiposcar">Back to the beginning ↑</a></footer>
</body>
</html>
