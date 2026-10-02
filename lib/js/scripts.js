(function($) {

    // Smooth scroll
    $(function() {
        $('a[href*=\\#]:not([href=\\#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 500);
                    return false;
                }
            }
        });
    });

    /* detect touch */
    if ("ontouchstart" in window) {
        document.documentElement.className = document.documentElement.className + " touch";
    }
    if (!$("html").hasClass("touch")) {
        /* background fix */
        $(".parallax").css("background-attachment", "fixed");
    }

    /* fix vertical when not overflow
    call fullscreenFix() if .fullscreen content changes */
    function fullscreenFix() {
        var h = $('body').height();
        // set .fullscreen height
        $(".content-b").each(function(i) {
            if ($(this).innerHeight() <= h) {
                $(this).closest(".fullscreen").addClass("not-overflow");
            }
        });
    }
    $(window).resize(fullscreenFix);
    fullscreenFix();

    /* resize background images */
    function backgroundResize() {
        var windowH = $(window).height();
        $(".background").each(function(i) {
            var path = $(this);
            // variables
            var contW = path.width();
            var contH = path.height();
            var imgW = path.attr("data-img-width");
            var imgH = path.attr("data-img-height");
            var ratio = imgW / imgH;
            // overflowing difference
            var diff = parseFloat(path.attr("data-diff"));
            diff = diff ? diff : 0;
            // remaining height to have fullscreen image only on parallax
            var remainingH = 0;
            if (path.hasClass("parallax") && !$("html").hasClass("touch")) {
                var maxH = contH > windowH ? contH : windowH;
                remainingH = windowH - contH;
            }
            // set img values depending on cont
            imgH = contH + remainingH + diff;
            imgW = imgH * ratio;
            // fix when too large
            if (contW > imgW) {
                imgW = contW;
                imgH = imgW / ratio;
            }
            //
            path.data("resized-imgW", imgW);
            path.data("resized-imgH", imgH);
            path.css("background-size", imgW + "px " + imgH + "px");
        });
    }
    $(window).resize(backgroundResize);
    $(window).focus(backgroundResize);
    backgroundResize();

    /* set parallax background-position */
    function parallaxPosition(e) {
        var heightWindow = $(window).height();
        var topWindow = $(window).scrollTop();
        var bottomWindow = topWindow + heightWindow;
        var currentWindow = (topWindow + bottomWindow) / 2;
        $(".parallax").each(function(i) {
            var path = $(this);
            var height = path.height();
            var top = path.offset().top;
            var bottom = top + height;
            // only when in range
            if (bottomWindow > top && topWindow < bottom) {
                var imgW = path.data("resized-imgW");
                var imgH = path.data("resized-imgH");
                // min when image touch top of window
                var min = 0;
                // max when image touch bottom of window
                var max = -imgH + heightWindow;
                // overflow changes parallax
                var overflowH = height < heightWindow ? imgH - height : imgH - heightWindow; // fix height on overflow
                top = top - overflowH;
                bottom = bottom + overflowH;
                // value with linear interpolation
                var value = min + (max - min) * (currentWindow - top) / (bottom - top);
                // set background-position
                var orizontalPosition = path.attr("data-oriz-pos");
                orizontalPosition = orizontalPosition ? orizontalPosition : "50%";
                $(this).css("background-position", orizontalPosition + " " + value + "px");
            }
        });
    }
    if (!$("html").hasClass("touch")) {
        $(window).resize(parallaxPosition);
        //$(window).focus(parallaxPosition);
        $(window).scroll(parallaxPosition);
        parallaxPosition();
    }

    $('.fixed-header .nav-close').click(function() {
        $('.fixed-header').css({
            top: '-100px'
        });
        $('.fixed-header-toggle').css({
            top: '0'
        });
    });

    $('.fixed-header-toggle .nav-open').click(function() {
        $('.fixed-header').css({
            top: '0'
        });
        $('.fixed-header-toggle').css({
            top: '-50px'
        });
    });

    var waitForFinalEvent = (function() {
        var timers = {};
        return function(callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "Don't call this twice without a uniqueId";
            }
            if (timers[uniqueId]) {
                clearTimeout(timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
        };
    })();

    jQuery(document).ready(function($) {

        $('.playbutton,img').click(function() {
            var video = '<div class="bandcamp-container"><iframe class="bandcamp" src="' + $('img').attr('data-video') + '"></iframe><i class="loading fa fa-circle-o-notch fa-spin"></i></div>';
            $('.video_image_container').fadeOut(600, function() {
                //bandcampListener();
                $('.video_placeholder').hide();
                $('.player').html(video);

                bandcampResize();

                $('.close').show();
            });;
        });

        $('.close').click(function() {
            $('.video_placeholder').fadeIn();
            $('.video_image_container').fadeIn();
            $('.player').empty();
            $('.close').hide();
        });

        // -- BANDCAMP -- //

        // bandcamp force a square
        var bandcampResize = function() {
            var bc_player = $('.bandcamp, .bandcamp-container').width();
            $('.bandcamp, .bandcamp-container').css({
                'height': bc_player + 'px'
            });
        };
        bandcampResize();

        // re-run one window resize

        $(window).resize(function() {
            waitForFinalEvent(function() {
                bandcampResize();
            }, 100);
        });
        // end bandcamp

        var bandcampListener = function() {
            // Add a listener for the window's load event
            window.addEventListener('load', onWindowLoad, false);

            function onWindowLoad(event) {
                //use a loop to continue checking the iframe for the 'play' button
                checkForTrue(isIframeButtonLoaded, iFrameButtonLoaded);
            }

            function checkForTrue(func, callback) {
                setTimeout(function() {
                    if (func()) {
                        callback(iFrameButton());
                    } else {
                        checkForTrue(func, callback);
                    };
                }, 1000);
            }

            //finds the 'play' button within the iframe
            function iFrameButton() {
                //window.frames[0].document.getElementsByTagName('div')[1]; // this also works
                return window.frames[0].document.getElementsByTagName('button')[5];
            }

            //simple boolean condition to check for the iframe button
            function isIframeButtonLoaded() {
                return (iFrameButton() != null);
            }

            //once the button is loaded, click it
            function iFrameButtonLoaded(iFrameButton) {
                iFrameButton.click();
            }
        };

    }); //]]>

})(jQuery);