(function($) {
    "use strict";

    $(document).ready(function() {

        // ______________ RESPONSIVE MENU
        $('#navigation').superfish({
            delay: 300,
            animation: {
                opacity: 'show',
                height: 'show'
            },
            speed: 'fast',
            dropShadows: false
        });

        $(function() {
            $('#navigation').slicknav({
                label: "",
                closedSymbol: "&#8594;",
                openedSymbol: "&#8595;"
            });
        });

        // ______________ FIXED MENU AT SCROLL

        var nav = $('.header');
        if ($(window).width() > 767) {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 200) {
                    nav.addClass("f-nav fadeindown");
                } else {
                    nav.removeClass("f-nav fadeindown");
                }
            });
        }

        // ______________ MODAL LOGIN
        $('input').blur(function() {
            if ($(this).val())
                $(this).addClass('used');
            else
                $(this).removeClass('used');
        });

        // ______________ RIPPLE EFFECT
        $(function() {
            $('.ripple').materialripple();
        });

        // ______________ MATERIAL DESIGN FORM
        $(function() {
            $('form.material').materialForm();
        });

        // ______________ ANIMATE EFFECTS
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false
        });
        wow.init();

        // ______________ BACK TO TOP BUTTON
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('#back-to-top').fadeIn('slow');
            } else {
                $('#back-to-top').fadeOut('slow');
            }
        });
        $('#back-to-top').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });


    });

})(jQuery);

(function($) {
    "use strict";

    $(window).load(function() {
        // ______________ WORDS ROTATOR ON HERO
        $(".introcaption").css({
            opacity: "1"
        });
        $("#js-rotating").Morphext({
            animation: "flipInX",
            separator: ",",
            speed: 2500
        });
    });

    $(document).ready(function() {
        // ______________ DOMAIN SEARCH SHOW/HIDE
        $("#showdomainsearch").click(function() {
            $(".domainform").slideToggle("slow");
        });

        // ______________ TESTIMONIALS CAROUSEL
        $("#testimonials-carousel").owlCarousel({
            items: 3,
            autoPlay: 5000,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 2]
        });
    });

})(jQuery);

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap',
        scrollwheel: false,
        draggable: false,
        styles: [{
            "featureType": "road",
            "stylers": [{
                "hue": "#5e00ff"
            }, {
                "saturation": -79
            }]
        }, {
            "featureType": "poi",
            "stylers": [{
                "saturation": -78
            }, {
                "hue": "#6600ff"
            }, {
                "lightness": -47
            }, {
                "visibility": "off"
            }]
        }, {
            "featureType": "road.local",
            "stylers": [{
                "lightness": 22
            }]
        }, {
            "featureType": "landscape",
            "stylers": [{
                "hue": "#6600ff"
            }, {
                "saturation": -11
            }]
        }, {}, {}, {
            "featureType": "water",
            "stylers": [{
                "saturation": -65
            }, {
                "hue": "#1900ff"
            }, {
                "lightness": 8
            }]
        }, {
            "featureType": "road.local",
            "stylers": [{
                "weight": 1.3
            }, {
                "lightness": 30
            }]
        }, {
            "featureType": "transit",
            "stylers": [{
                "visibility": "simplified"
            }, {
                "hue": "#5e00ff"
            }, {
                "saturation": -16
            }]
        }, {
            "featureType": "transit.line",
            "stylers": [{
                "saturation": -72
            }]
        }, {}]
    };

    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);

    // Multiple Markers
    var markers = [
        ['CloudStuffs', 28.554219, 77.2490094],
    ];

    // Info Window Content
    var infoWindowContent = [
        ['<div class="info_content">' +
            '<h5>CloudStuffs</h5>' +
            '<p>406, Sant Nagar, East of Kailash, New Delhi 110065</p>' + '</div>'
        ]
    ];

    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(),
        marker, i;

    // Loop through our array of markers & place each one on the map
    for (i = 0; i < markers.length; i++) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });

        // Allow each marker to have an info window
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(16);
        google.maps.event.removeListener(boundsListener);
    });

}

(function($) {
    "use strict";

    window.odometerOptions = {
        format: 'd'
    };

    jQuery(document).ready(function() {

        $('.odometer').waypoint(function() {
            setTimeout(function() {
                $('#odometer1.odometer').html(510);
            }, 500);
            setTimeout(function() {
                $('#odometer2.odometer').html(81825);
            }, 1000);
            setTimeout(function() {
                $('#odometer3.odometer').html(920);
            }, 1500);
            setTimeout(function() {
                $('#odometer4.odometer').html(8000);
            }, 2000);
            setTimeout(function() {
                $('#odometer5.odometer').html(5001);
            }, 2500);
            setTimeout(function() {
                $('#odometer6.odometer').html(392);
            }, 3000);
        }, {
            offset: 800,
            triggerOnce: true
        });
    });
})(jQuery);


window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3aRAljOWwQhZGIljxSjPO0c8K4VGj9NU";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");