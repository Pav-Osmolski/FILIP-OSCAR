<?php
    if ( extension_loaded( 'zlib' ) && ini_get( 'zlib.output_compression' ) == 0 ) {
        if ( ob_get_level() > 0 ) {
            ob_end_clean();
        }
        ob_start( 'ob_gzhandler' );
    }
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-GB" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-GB" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-GB" prefix="og: http://ogp.me/ns#">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <title>Filip Oscar | The Way is Golden</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="description" content="Listen to the incredible new album The Way is Golden by Filip Oscar."/>
        <meta property="og:locale" content="en_GB"/>
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="Filip Oscar | The Way is Golden"/>
        <meta property="og:description" content="Listen to the incredible new album The Way is Golden by Filip Oscar."/>
        <meta property="og:url" content="https://www.filiposcar.com/"/>
        <meta property="og:site_name" content="Filip Oscar | The Way is Golden"/>
        <meta property="og:image" content="https://www.filiposcar.com/lib/img/header.jpg"/>
        <meta property="og:image:width" content="500"/>
        <meta property="og:image:height" content="500"/>
        <meta property="og:image:type" content="image/jpeg"/>
        <meta name="color-scheme" content="light">
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:title" content="Filip Oscar | The Way is Golden"/>
        <meta name="twitter:description" content="Listen to the incredible new album The Way is Golden by Filip Oscar."/>
        <meta name="twitter:image" content="https://www.filiposcar.com/lib/img/header.jpg"/>
        <meta name="twitter:site" content="@Filip_Oscar"/>
        <link href="https://www.filiposcar.com/favicon.ico" rel="icon" type="image/x-icon"/>
        <link href="https://www.filiposcar.com/" rel="canonical"/>
        <link href="https://www.filiposcar.com/lib/img/header.jpg" rel="image_src"/>
        <link rel="preload" as="font" crossorigin type="font/woff2" href="lib/fonts/MonospaceTypewriter-webfont.woff2">
        <link rel="preload" as="font" crossorigin type="font/woff2" href="lib/fonts/fontawesome-webfont.woff2?v=4.4.0">
        <link rel="preload" as="style" onload="this.rel = 'stylesheet'" href="lib/css/compiled.min.css?v=<?= filemtime( 'lib/css/compiled.min.css' ); ?>" />
        <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="lib/css/compiled.min.css?v=<?= filemtime( 'lib/css/compiled.min.css' ); ?>" rel="stylesheet" type="text/css" />
        <noscript>
          <link rel="stylesheet" href="lib/css/compiled.min.css?v=<?= filemtime( 'lib/css/compiled.min.css' ); ?>" id="filip_oscar-compiled-css" media="all" type="text/css">
        </noscript>
        <!--<link rel='stylesheet' id='filip_oscar-style-css' href='lib/css/style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='filip_oscar-responsive-css' href='lib/css/responsive.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='filip_oscar-font-awesome-custom-css' href='lib/css/font-awesome-custom.min.css' type='text/css' media='all' />-->
        <link href="https://www.filiposcar.com/" rel="shortlink"/>
    </head>
    <body class="home page smooth-fonts" style="opacity:0">
        <div class="max-wrap wrap center cf">
            <div class="fixed-header all-ease">
                <div id="ripple" class="header-content rel all-ease">
                    <p>
                        <a href="#listen" title="Listen to the incredible new album The Way is Golden by Filip Oscar">Listen</a>
                        <a href="#watch" title="Watch Filip Oscar on YouTube">Watch</a>
                        <a href="#bio" title="Filip Oscar is an English singer-songwriter and musician">Hello</a>
                        <a href="#contact" title="Get in touch with Filip Oscar">Contact</a>
                    </p>
                    <div class="nav-close all-ease">
                        <i class="fa fa-times-circle">
                        </i>
                    </div>
                </div>
            </div>
            <div class="fixed-header-toggle all-ease">
                <div class="toggle-content rel all-ease">
                    <div class="nav-open all-ease">
                        <i class="fa fa-bars">
                        </i>
                    </div>
                </div>
            </div>
            <div id="filiposcar" class="fullscreen background parallax" data-diff="100" data-img-height="1024" data-img-width="1024" style="background-image:url('/lib/img/filiposcar_big.jpg');">
                <div class="content-a header">
                    <div class="content-b">
                        <h1>FI<span class="light">LIP OSC</span>AR</h1>
                    </div>
                </div>
            </div>
            <div class="background parallax shadow" data-diff="100" data-img-height="1400" data-img-width="1400" id="listen" style="background-image:url('/lib/img/secretlife-aligned.jpg');">
                <div class="content-a header raven">
                    <div class="content-b">
                        <h2>
                            <a class="color-ease" href="/twig" target="_blank">Listen to The Way is Golden</a>
                        </h2>
                        <div class="responsive all-ease">
                            <div class="spotify">
                                <iframe loading="lazy" title="Spotify audio player to hear music by FILIP OSCAR" src="https://open.spotify.com/embed?uri=spotify:album:7FG9Tcb7yg01Fbi3TdHgT2&theme=white" width="100%" height="359" frameborder="0" allowtransparency="true"></iframe>
                            </div>
                            <div class="video_outer">
                                <div class="video_placeholder">
                                    <div class="video_image_container">
                                        <img loading="lazy" alt="Cover artwork for The Way is Golden album by Filip Oscar" data-video="https://bandcamp.com/EmbeddedPlayer/album=4244401088/size=large/bgcol=ffffff/linkcol=DF3A5B/minimal=true/transparent=true/autoplay=1" src="/lib/img/album_thewayisgolden.jpg">
                                            <div class="playbutton">
                                                <i class="fa fa-volume-up all-ease">
                                                </i>
                                            </div>
                                    </div>
                                </div>
                                <div class="player">
                                </div>
                                <div class="close all-ease">
                                    <i class="fa fa-times-circle">
                                    </i>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background parallax shadow" data-diff="100" data-img-height="1024" data-img-width="1024" id="watch" style="background-image:url('/lib/img/ravenwhite.jpg');">
                <div class="content-a header raven video">
                    <div class="content-b">
                        <h2>
                            <a class="color-ease" href="https://www.youtube.com/c/FILIPOSCAR" target="_blank" rel="noreferrer">Watch Filip Oscar on YouTube</a>
                        </h2>
                        <div class="responsive wider all-ease">
                            <div class="responsive-video video-container">
                                <iframe loading="lazy" title="YouTube video player to watch musical performances by FILIP OSCAR" width="1280" height="720" src="https://www.youtube.com/embed?listType=playlist&list=PLAYHD6mbuOHFRHa666l_Jh58TTEkiO9pN&amp;controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background parallax shadow" data-diff="100" data-img-height="1024" data-img-width="1024" id="bio" style="background-image:url('/lib/img/raven.jpg');">
                <div class="content-a header raven bio">
                    <div class="content-b">
                        <h2>Introducing Filip Oscar</h2>
                        <p>At the height of his musical diversity, before all brain cells started to implode and otherwise shout mean words at each other “Classical is better than Country! Take that you infernal collection of cells!”. FILIP OSCAR was born out of constraint, a severe case of playing far too many vintage computer games and listening to the robot voice on Fitter Happier.</p>
                        <p>It was a slow evolution, a bit like if someone annoyingly crept behind you every day, a third eye would suddenly pop into existence at the back of your head. Handy that! His lust for guitar strings, synthetic ivory keys and technological bleeps, meant that all other interests were departed, drifting away on a mossy boat until they unloaded on a pitifully small island.</p>
                        <p>What does this all mean? A very honest and logical question! The long answer would involve an angry undressing accompanied by some excessively detailed charts. The short answer is much simpler. You would be a wiser and better person to visit him on <a class="color-ease" href="/twig" title="Listen to Filip Oscar on Bandcamp" target="_blank">Bandcamp</a>, or one of those impossibly large virtual musical libraries. <a class="color-ease" href="http://bit.ly/FilipOscarSpotify" title="Listen to Filip Oscar on Spotify" target="_blank" rel="noopener">Spotify</a>, <a class="color-ease" href="http://bit.ly/FilipOscarApple" title="Listen to Filip Oscar on Apple Music" target="_blank" rel="noopener">Apple Music</a> and the like.</p>
                        <p>You may also follow him on <a class="color-ease" href="http://bit.ly/FilipOscarSoundCloud" title="Listen to Filip Oscar on SoundCloud" target="_blank" rel="noopener">SoundCloud</a> to hear the occasional sneak preview or work in progress. It's a bit like receiving a sampler pack of tea with lots of different flavours.</p>
                        <div class="img_container">
                            <img loading="lazy" alt="Filip Oscar in his natural habitat" src="/lib/img/eatingtheguitar.jpg">
                        </div>
                        <h2>A brief history lesson</h2>
                        <p>Pawel "Filip Oscar" Osmolski is an English singer-songwriter and musician. Filip was born May 12, 1983 in Newbury Park, London, where he grew up in a musical family. Filip is a self-taught multi-instrumentalist, and his love for music started with classical and jazz piano.</p>
                        <p>His pre-teen years were spent composing piano works and learning music by Frédéric Chopin, Ludwig van Beethoven and Scott Joplin. As a teenager he jumped into the 90's rock and grunge scene, finding inspiration through Thom Yorke, Jeff Buckley, Patrick Duff, Chris Cornell, Trent Reznor and earlier bands like Joy Division, Pixies, The Smiths and R.E.M. He eventually found his footing as a singer-songwriter, focusing on writing impressionistic indie folk music with just his voice and acoustic guitar.</p>
                        <p>Filip is a modest man with a great deal of sensitivity, usually introducing new songs personally to his closest friends first, and infrequently performing at open mic gigs under different names. He has been writing for the past 15 years and has managed to build up a huge portfolio of music.</p>
                        <p>Filip is an avid fan of Doctor Who, with Capaldi being his favourite Doctor. He's also a fan of Westworld, Battlestar Galactica, Star Trek: TNG, Adventure Time, video gaming, Dark Souls in particular, Derren Brown, Louis Theroux, Peter Serafinowicz and Chris Morris.</p>
                    </div>
                </div>
            </div>
            <div class="fullscreen background parallax" data-diff="100" data-img-height="1024" data-img-width="1024" id="contact" style="background-image:url('/lib/img/filip.jpg');">
                <div class="content-a header raven contact">
                    <div class="content-b">
                        <h2>Contact Filip Oscar</h2>
                        <div class="contact-info cf">
                            <div class="social-link cf">
                                <a class="color-ease" href="https://www.facebook.com/FilipOscarOfficial" target="_blank" rel="noreferrer" title="Follow Filip Oscar on Facebook">
                                    <i class="fa fa-facebook">
                                    </i>
                                </a>
                            </div>
                            <div class="social-link cf">
                                <a class="color-ease" href="https://www.youtube.com/c/FILIPOSCAR" target="_blank" rel="noreferrer" title="Subscribe to Filip Oscar on YouTube">
                                    <i class="fa fa-youtube">
                                    </i>
                                </a>
                            </div>
                            <div class="social-link cf">
                                <a class="color-ease" href="https://twitter.com/Filip_Oscar" target="_blank" rel="noreferrer" title="Follow Filip Oscar on Twitter">
                                    <i class="fa fa-twitter">
                                    </i>
                                </a>
                            </div>
                            <div class="social-link cf">
                                <a class="color-ease" href="https://instagram.com/captainstarpaw/" target="_blank" rel="noreferrer" title="Follow Filip Oscar on Instagram">
                                    <i class="fa fa-instagram">
                                    </i>
                                </a>
                            </div>
                            <div class="social-link cf">
                                <a class="color-ease" href="mailto:hello@filiposcar.com" target="_blank" title="Email Filip Oscar">
                                    <i class="fa fa-envelope">
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<script src='lib/js/jquery/jquery.min.js?v=20181221'></script>-->
        <script defer src="lib/js/compiled.min.js?v=<?= filemtime( 'lib/js/compiled.min.js' ); ?>"></script>
        <!--<script src='lib/js/scripts.min.js'></script>-->
        <!--<script defer>jQuery(document).ready(function(i){i("#filiposcar").ripples({dropRadius:50,peturbance:0.01,resolution:256})});</script> -->
        <script>
            (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g.indexOf('//') === 0 ? 'https:' + g : g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-66212540-1', 'auto');
        ga('send', 'pageview');
        </script>
    </body>
</html>