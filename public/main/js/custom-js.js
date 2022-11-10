$(document).ready(function() {
    jQuery(".filter-toggle").on("click", function(t) {
        t.preventDefault(),
        jQuery(this).toggleClass("active"),
        jQuery(".filter-toggle-wrap").slideToggle("is-visible")
    });
    var r = jQuery(this).find(".full_width .sorting_wrapper");
    jQuery(this).find(".filter-toggle").insertBefore(r),
    jQuery("#column-right").insertAfter("#content"),
    jQuery(".header_style_1 #shopify-section-TT-mega_menu").insertBefore(".header_style_1 .topmenu"),
    jQuery(".header_style_2 #shopify-section-TT-mega_menu").insertBefore(".header_style_2 .header-middle"),
    jQuery("#content .tt-flexslider").prependTo(".site-inner .main-content"),
    jQuery(".tt-flexslider, .ttcmssub-banner2").wrapAll('<div class="wrap"><div class="container"><div class="slider-wrap col-sm-9"></div></div></div>'),
    jQuery(".slider-newproduct .product-wrapper").each(function() {
        var t = jQuery(this).find(".product-description .product-description-wrap");
        jQuery(this).find(".btn_wrapper").appendTo(t);
        var t = jQuery(this).find(".product-description .product-description-wrap .btn_wrapper");
        jQuery(this).find(".flip-countdown.simple-countdown").insertBefore(t);
        var t = jQuery(this).find(".product-description .product-description-wrap");
        jQuery(this).find(".grid-view-item__title").prependTo(t);
        var t = jQuery(this).find(".product-description .flip-countdown.simple-countdown");
        jQuery(this).find(".ttqtyprogress").insertBefore(t);
        var i = jQuery(this).find(".product-description .product-description-wrap");
        jQuery(this).find(".product-thumb .spr-badge").prependTo(i)
    }),
    $("body:not(.template-index) .site-header .toggle_menu").hasClass("current-close") && $(".tt-mega_menu").slideUp("2000"),
    $(".toggle_menu").click(function() {
        $(this).hasClass("default-open") && $(window).width() < 992 ? $(this).hasClass("current-close") ? ($(this).addClass("current-open"),
        $("body").addClass("menu-current-open"),
        $(this).removeClass("current-close"),
        $(".tt-mega_menu").slideToggle("2000")) : ($(this).removeClass("default-open"),
        $(this).addClass("current-open"),
        $("body").addClass("menu-current-open"),
        $(this).removeClass("current-close"),
        $(".tt-mega_menu").slideToggle("2000")) : $(this).hasClass("default-open") ? $(this).hasClass("current-close") ? ($(this).addClass("current-open"),
        $("body").addClass("menu-current-open"),
        $(this).removeClass("current-close"),
        $(".tt-mega_menu").slideToggle("2000")) : $(this).hasClass("current-open") && ($(this).addClass("current-close"),
        $(this).removeClass("current-open"),
        $("body").removeClass("menu-current-open"),
        $(".tt-mega_menu").slideToggle("2000")) : $(this).hasClass("current-open") ? ($(this).addClass("current-close"),
        $("body").removeClass("menu-current-open"),
        $(this).removeClass("current-open"),
        $(".tt-mega_menu").slideToggle("2000")) : ($(this).addClass("current-open"),
        $(this).removeClass("current-close"),
        $("body").addClass("menu-current-open"),
        $(".tt-mega_menu").slideToggle("2000")),
        $(this).hasClass("default-open") && !$(".sticky_header").hasClass("fixed") && ($(this).addClass("current-close"),
        $(this).removeClass("default-open"),
        $(".tt-mega_menu").slideToggle("2000")),
        $(this).hasClass("default-open") && $(".sticky_header").hasClass("fixed") && ($(this).addClass("current-open"),
        $("body").addClass("menu-current-open"),
        $(this).removeClass("default-open"),
        $(".tt-mega_menu").slideDown("2000"))
    }),
    jQuery(".header_1 .wrapper-wrap").hasClass("logo_center") && jQuery("body").addClass("logo_center");
    var a = $(window).width();
    $(".slider-content-main-wrap").css("width", a),
    $(".site-header").hasClass("header_transaparent") && $("body.template-index").addClass("header_transaparent");
    var s = jQuery(".popup_overlay");
    jQuery("#popup_toggle").click(function() {
        jQuery("body").addClass("popup-toggle"),
        s.css("display", "block")
    }),
    s.click(function(t) {
        e = t || window.event,
        e.target == this && (jQuery(s).css("display", "none"),
        jQuery("body").removeClass("popup-toggle"))
    }),
    jQuery(".popup_close").click(function() {
        s.css("display", "none"),
        jQuery("body").removeClass("popup-toggle")
    });
    function p(t) {
        var i = document.getElementById("popupVid")
          , d = i.getElementsByTagName("iframe")[0].contentWindow;
        func = t == "hide" ? "pauseVideo" : "playVideo",
        d.postMessage('{"event":"command","func":"' + func + '","args":""}', "*")
    }
    jQuery("#popup_toggle").click(function() {
        s.css("visibility", "visible").css("opacity", "1")
    }),
    s.click(function(t) {
        e = t || window.event,
        e.target == this && (jQuery(s).css("visibility", "hidden").css("opacity", "0"),
        p("hide"))
    }),
    jQuery(".popup_close").click(function() {
        s.css("visibility", "hidden").css("opacity", "0"),
        p("hide")
    }),
    $(".fixed .mini-cart-wrap").perfectScrollbar();
    var g = jQuery(".product-single__thumbs .slick-active.slick-current").find(".product-single__thumb").data("id");
    jQuery(".product-lightbox-btn").hasClass(g) && jQuery(".product-lightbox-btn." + g).show(),
    jQuery(".filter-left").on("click", function(t) {
        t.preventDefault(),
        jQuery(this).toggleClass("active"),
        jQuery(".off-canvas.position-left").toggleClass("is-open"),
        jQuery(".js-off-canvas-overlay.is-overlay-fixed").toggleClass("is-visible is-closable")
    }),
    jQuery(".is-overlay-fixed").on("click", function(t) {
        t.preventDefault(),
        jQuery(".filter-left").trigger("click"),
        jQuery(".filter-right").trigger("click")
    }),
    jQuery(".filter-right").on("click", function(t) {
        t.preventDefault(),
        jQuery(this).toggleClass("active"),
        jQuery(".off-canvas.position-right").toggleClass("is-open"),
        jQuery(".js-off-canvas-overlay.is-overlay-fixed").toggleClass("is-visible is-closable")
    }),
    $(".product-360-button a").magnificPopup({
        type: "inline",
        mainClass: "mfp-fade",
        removalDelay: 160,
        disableOn: !1,
        preloader: !1,
        fixedContentPos: !1,
        callbacks: {
            open: function() {
                $(window).resize()
            }
        }
    }),
    countDownIni(".flip-countdown,.js-flip-countdown"),
    $(".popup-video").magnificPopup({
        disableOn: 300,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: !1,
        fixedContentPos: !1
    }),
    ($("a.product-lightbox-btn").length > 0 || $("a.product-video-popup").length > 0) && $(".product-single__photos .gallery,.design_2 .product-img").magnificPopup({
        delegate: "a",
        type: "image",
        tLoading: '<div class="please-wait dark"><span></span><span></span><span></span></div>',
        removalDelay: 300,
        closeOnContentClick: !0,
        gallery: {
            enabled: !0,
            navigateByImgClick: !1,
            preload: [0, 1]
        },
        image: {
            verticalFit: !1,
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        },
        callbacks: {
            beforeOpen: function() {
                var t = $(".product-video-popup").attr("href");
                if (t) {
                    this.st.mainClass = "has-product-video";
                    var i = $.magnificPopup.instance;
                    i.items.push({
                        src: t,
                        type: "iframe"
                    }),
                    i.updateItemHTML()
                }
            },
            open: function() {}
        }
    }),
    $(".design_3 .product-img,.design_5 .pro_img").magnificPopup({
        delegate: "a",
        type: "image",
        tLoading: '<div class="please-wait dark"><span></span><span></span><span></span></div>',
        removalDelay: 300,
        closeOnContentClick: !0,
        gallery: {
            enabled: !0,
            navigateByImgClick: !1,
            preload: [0, 1]
        },
        image: {
            verticalFit: !1,
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        },
        callbacks: {
            beforeOpen: function() {
                var t = $(".product-video-popup").attr("href");
                if (t) {
                    this.st.mainClass = "has-product-video";
                    var i = $.magnificPopup.instance;
                    i.items.push({
                        src: t,
                        type: "iframe"
                    }),
                    i.updateItemHTML()
                }
            },
            open: function() {}
        }
    }),
    $("body").on("click", ".product-lightbox-btn", function(t) {
        $(".product-wrapper-owlslider").find(".owl-item.active a").click(),
        t.preventDefault()
    }),
    jQuery(".fullscreen_header_toggle").on("click", function(t) {
        t.preventDefault(),
        jQuery(this).toggleClass("active"),
        jQuery(".fullscreen_header").toggleClass("nav-open"),
        jQuery("body").toggleClass("fullnav-open header_2")
    }),
    jQuery(".leftmenu_header").length > 0 && (jQuery(".leftmenu_header_fixed.leftmenu_header").length > 0 && (jQuery(".leftmenu_header_fixed.leftmenu_header").hasClass("menu_left") && jQuery("body").addClass("menu_left"),
    jQuery(".leftmenu_header_fixed.leftmenu_header").hasClass("menu_right") && jQuery("body").addClass("menu_right")),
    jQuery(".leftmenu_header").on("click", function(t) {
        t.preventDefault(),
        jQuery(this).toggleClass("active"),
        jQuery("body").toggleClass("nav-open")
    })),
    $(".qtyplus").on("click", function(t) {
        t.preventDefault();
        var i = jQuery(this).parents(".qty-box-set").find(".quantity")
          , d = parseInt(jQuery(this).parents(".qty-box-set").find(".quantity").val());
        isNaN(d) ? jQuery(this).parents(".qty-box-set").find(".quantity").val(1) : jQuery(this).parents(".qty-box-set").find(".quantity").val(d + 1)
    }),
    $(".qtyminus").on("click", function(t) {
        t.preventDefault();
        var i = jQuery(this).parents(".qty-box-set").find(".quantity")
          , d = parseInt(jQuery(this).parents(".qty-box-set").find(".quantity").val());
        !isNaN(d) && d > 1 ? jQuery(this).parents(".qty-box-set").find(".quantity").val(d - 1) : jQuery(this).parents(".qty-box-set").find(".quantity").val(1)
    }),
    $("#navToggle").on("click", function(t) {
        jQuery(this).next(".Site-navigation").slideToggle(500)
    }),
    $(".menu_toggle_wrap #navToggle").on("click", function(t) {
        jQuery(this).parent().next(".Site-navigation").slideToggle(500)
    }),
    jQuery("#GotoTop").on("click", function() {
        return jQuery("html, body").animate({
            scrollTop: 0
        }, "1000"),
        !1
    }),
    jQuery(".site-header__search.search-full .serach_icon").on("click", function(t) {
        t.preventDefault(),
        jQuery(this).toggleClass("active"),
        jQuery("body").toggleClass("search_full_active"),
        jQuery(".full-search-wrapper").addClass("search-overlap"),
        jQuery(".search-bar > input").focus()
    }),
    jQuery(".site-header__search.search-full .close-search").on("click", function() {
        jQuery(".site-header__search.search-full .serach_icon").removeClass("active"),
        jQuery(".full-search-wrapper").removeClass("search-overlap"),
        jQuery("body").removeClass("search_full_active")
    }),
    jQuery(".site-header__search:not(.search-full) .serach_icon").on("click", function() {
        jQuery(".search_wrapper").slideToggle("fast"),
        jQuery(".search-bar > input").focus(),
        jQuery(this).toggleClass("active"),
        jQuery(".customer_account").slideUp("fast"),
        jQuery("body").removeClass("currency-open"),
        jQuery("body").removeClass("language-open"),
        jQuery("body").removeClass("myaccount_active"),
        jQuery("#slidedown-cart").slideUp("fast"),
        jQuery("#Sticky-slidedown-cart").slideUp("fast")
    }),
    jQuery(".myaccount  .dropdown-toggle").on("click", function(t) {
        t.preventDefault(),
        jQuery(".customer_account").slideToggle("fast"),
        jQuery(".site-header__search:not(.search-full) .serach_icon").removeClass("active"),
        jQuery("body").removeClass("search_full_active"),
        jQuery(".site-header_cart_link").removeClass("active"),
        jQuery(".site-header .search_wrapper").slideUp("fast"),
        jQuery("body").toggleClass("myaccount_active"),
        jQuery("body").removeClass("cart_active"),
        jQuery("body").removeClass("currency-open"),
        jQuery("body").removeClass("language-open"),
        jQuery("#slidedown-cart").slideUp("fast"),
        jQuery("#Sticky-slidedown-cart").slideUp("fast"),
        jQuery(".header_1 .language.flag-dropdown-menu").slideUp("fast"),
        jQuery(".header_1 .currencies.flag-dropdown-menu").slideUp("fast")
    }),
    $(".header_currency .currency_wrapper.dropdown-toggle").on("click", function(t) {
        t.preventDefault(),
        jQuery(".customer_account").stop(),
        jQuery(".currencies.flag-dropdown-menu").slideToggle("fast"),
        $(this).toggleClass("active"),
        jQuery("body").toggleClass("currency-open"),
        jQuery("body").removeClass("language-open"),
        jQuery("body").removeClass("myaccount_active"),
        jQuery("body").removeClass("cart_active"),
        jQuery(".language.flag-dropdown-menu").slideUp("fast"),
        jQuery("#slidedown-cart").slideUp("fast"),
        jQuery("#Sticky-slidedown-cart").slideUp("fast"),
        jQuery(".customer_account").slideUp("fast"),
        $(".header_language .language-block .language_wrapper.dropdown-toggle").removeClass("active")
    }),
    $(".header_language .language-block .language_wrapper.dropdown-toggle").on("click", function(t) {
        t.preventDefault(),
        jQuery(".customer_account").stop(),
        jQuery(".language.flag-dropdown-menu").slideToggle("fast"),
        $(this).toggleClass("active"),
        jQuery("body").toggleClass("language-open"),
        jQuery("body").removeClass("currency-open"),
        jQuery("body").removeClass("myaccount_active"),
        jQuery("body").removeClass("cart_active"),
        jQuery(".currencies.flag-dropdown-menu").slideUp("fast"),
        jQuery("#slidedown-cart").slideUp("fast"),
        jQuery("#Sticky-slidedown-cart").slideUp("fast"),
        jQuery(".customer_account").slideUp("fast"),
        $(".header_currency .currency_wrapper.dropdown-toggle").removeClass("active")
    });
    var l = jQuery(".slider-newproduct").data("col");
    jQuery("body:not(.rtl)").hasClass("left_sidebar") ? $("body.left_sidebar:not(.rtl) .slider-newproduct").owlCarousel({
        items: l,
        nav: !0,
        autoplay: !0,
        autoplaySpeed: 1500,
        dots: !1,
        responsive: {
            100: {
                items: 1
            },
            543: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 2
            },
            1600: {
                items: 2
            },
            1700: {
                items: l
            }
        }
    }) : $("body:not(.rtl.left_sidebar) .slider-newproduct").owlCarousel({
        items: l,
        nav: !0,
        dots: !1,
        autoplay: !0,
        autoplaySpeed: 1500,
        responsive: {
            100: {
                items: 1
            },
            543: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 2
            },
            1600: {
                items: 2
            },
            1700: {
                items: l
            }
        }
    }),
    jQuery("body.rtl.left_sidebar").hasClass("left_sidebar") ? $("body.rtl.left_sidebar .slider-newproduct").owlCarousel({
        items: l,
        nav: !0,
        dots: !1,
        autoplay: !0,
        autoplaySpeed: 1500,
        rtl: !0,
        responsive: {
            100: {
                items: 1
            },
            543: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 2
            },
            1600: {
                items: 2
            },
            1700: {
                items: l
            }
        }
    }) : $("body.rtl:not(.left_sidebar) .slider-newproduct").owlCarousel({
        items: l,
        nav: !0,
        dots: !1,
        autoplay: !0,
        autoplaySpeed: 1500,
        rtl: !0,
        responsive: {
            100: {
                items: 1
            },
            543: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 2
            },
            1600: {
                items: 2
            },
            1700: {
                items: l
            }
        }
    }),
    $(".slider-newproduct-wrap").each(function() {
        $(this).find(".owl-nav").hasClass("disabled") ? $(this).find(".customNavigation").hide() : $(this).find(".customNavigation").show()
    }),
    $(".slider-newproduct-wrap .customNavigation .next").click(function() {
        var t = $(this).closest(".slider-newproduct-wrap");
        $(t).find(".slider-newproduct").trigger("next.owl")
    }),
    $(".slider-newproduct-wrap .customNavigation .prev").click(function() {
        var t = $(this).closest(".slider-newproduct-wrap");
        $(t).find(".slider-newproduct").trigger("prev.owl")
    }),
    $(".mobile-nav__sublist-trigger").on("click", function(t) {
        t.preventDefault();
        var i = $(this);
        i.toggleClass("is-active"),
        i.parent().find(".tt_sub_menu_wrap").slideToggle(200)
    }),
    $(".slider-newproduct .product-wrapper").each(function() {
        var t = $(this).find(".product-description .progress")
          , i = $(this).find(".quantity")
          , d = $(this).find(".progress-bar")
          , y = t
          , c = d
          , u = i.html()
          , n = parseInt(c.css("width"))
          , o = parseInt(y.css("width"))
          , f = n + parseInt(u);
        f > o && (f = o);
        var h = f / o * 100;
        c.animate({
            width: h + "%"
        }, 100)
    })
}),
jQuery(window).scroll(function() {
    if (jQuery(document).height() > jQuery(window).height()) {
        var r = jQuery(window).scrollTop();
        r > 100 ? jQuery("#GotoTop").fadeIn() : jQuery("#GotoTop").fadeOut()
    }
});
function responsiveMenu() {
    jQuery(window).width() < 992 ? (jQuery(".Site-navigation").insertAfter(".nav-toggle"),
    jQuery(".sub-nav__dropdown").css("display", "none")) : jQuery(".Site-navigation").appendTo(".menu_wrapper"),
    jQuery(window).width() < 992 ? ($("#shopify-section-TT-mega_menu").appendTo(".menu-bar .ttresponsive_menu"),
    $("#accessibleNav").appendTo("#tt-megamenu .tt_menus_ul"),
    $(".header-top-right").appendTo("#tt-megamenu .tt_menus_ul"),
    $(".header_1 .header-right-cms").appendTo("#tt-megamenu .tt_menus_ul"),
    $(".header_2 #ttcmsheaderservices").appendTo("#tt-megamenu .tt_menus_ul")) : ($(".header_style_2 #shopify-section-TT-mega_menu").insertBefore(".header_style_2 .header-middle"),
    $("#tt-megamenu .tt_menus_ul .header-right-cms").insertBefore(".full-header .header-middle"),
    $("#tt-megamenu .tt_menus_ul #accessibleNav").appendTo(".topmenu"),
    $("#tt-megamenu .tt_menus_ul .header-top-right").insertAfter("#top .header-top-left"),
    $(".header_style_2 #tt-megamenu .tt_menus_ul #ttcmsheaderservices").insertAfter(".header_2 .myaccount"))
}
jQuery(document).ready(function() {
    responsiveMenu(),
    jQuery(".product-write-review").on("click", function(r) {
        r.preventDefault(),
        $("a[href='#tab-2']").trigger("click"),
        jQuery("html, body").animate({
            scrollTop: jQuery(".product_tab_wrapper").offset().top - 150
        }, 1e3)
    })
}),
jQuery(document).load(function() {}),
jQuery(window).resize(function() {
    responsiveMenu();
    var r = $(window).width();
    $(".slider-content-main-wrap").css("width", r)
});
function footerToggle() {
    if (jQuery(window).width() < 992 ? jQuery(".header-right").appendTo(".ttresponsive_menu") : jQuery(".ttresponsive_menu .header-right").insertAfter(".header-left"),
    jQuery(window).width() < 992)
        $(".left-sidebar-menu").length > 0 ? (jQuery(".left-sidebar-menu").appendTo(".ttresponsive_menu"),
        jQuery(".header-right").appendTo(".ttresponsive_menu"),
        jQuery(".ttresponsive_menu h4.widget-title").unbind("click"),
        jQuery(".ttresponsive_menu  h4.widget-title").on("click", function() {
            jQuery(this).parent().toggleClass("active").children(":nth-child(2)").slideToggle("fast")
        })) : (jQuery("nav#menu .nav-menu-wrapper").appendTo(".ttresponsive_menu"),
        jQuery(".nav-menu-wrapper h4.widget-title").unbind("click"),
        jQuery(".nav-menu-wrapper h4.widget-title").on("click", function() {
            jQuery(this).parent().toggleClass("active").children(":nth-child(2)").slideToggle("fast")
        })),
        jQuery("#column-left").insertAfter("#content"),
        jQuery(".site-footer").hasClass("fixed_footer") && jQuery(".page-wrapper").css("margin-bottom", "0px"),
        jQuery(".left-sidebar.sidebar").insertAfter(".collection_wrapper, .content-wrapper"),
        jQuery(".sidebar .sidebar-block").insertAfter(".filter-wrapper"),
        jQuery(".both_sidebar .sidebar#column-left .collection_sidebar").insertAfter(".filter-wrapper"),
        jQuery(".site-footer .footer-column h5").addClass("toggle"),
        jQuery(".site-footer .footer-column").children(":nth-child(2)").css("display", "none"),
        jQuery(".site-footer .footer-column.active").children(":nth-child(2)").css("display", "block"),
        jQuery(".site-footer .footer-column h5.toggle").unbind("click"),
        jQuery(".site-footer .footer-column h5.toggle").on("click", function() {
            jQuery(this).parent().toggleClass("active").children(":nth-child(2)").slideToggle("fast")
        }),
        jQuery(".site-footer .widget h5").addClass("toggle"),
        jQuery(".site-footer .widget").children(":nth-child(2)").css("display", "none"),
        jQuery(".site-footer .widget.active").children(":nth-child(2)").css("display", "block"),
        jQuery(".site-footer .widget h5.toggle").unbind("click"),
        jQuery(".site-footer .widget h5.toggle").on("click", function() {
            jQuery(this).parent().toggleClass("active").children(":nth-child(2)").slideToggle("fast")
        }),
        jQuery(".sidebar .widget > h4").addClass("toggle"),
        jQuery(".sidebar .widget ").children(":nth-child(2)").css("display", "none"),
        jQuery(".sidebar .widget.active").children(":nth-child(2)").css("display", "block"),
        jQuery(".sidebar .widget > h4.toggle").unbind("click"),
        jQuery(".sidebar .widget > h4.toggle").on("click", function() {
            jQuery(this).parent().toggleClass("active").children(":nth-child(2)").slideToggle("fast")
        }),
        jQuery(".sidebar-block .widget > h4").addClass("toggle"),
        jQuery(".sidebar-block .widget ").children(":nth-child(2)").css("display", "none"),
        jQuery(".sidebar-block .widget.active").children(":nth-child(2)").css("display", "block"),
        jQuery(".sidebar-block .widget > h4.toggle").unbind("click"),
        jQuery(".sidebar-block .widget > h4.toggle").on("click", function() {
            jQuery(this).parent().toggleClass("active").children(":nth-child(2)").slideToggle("fast")
        });
    else {
        if ($(".left-sidebar-menu").length > 0 ? jQuery("#accessibleNav").appendTo(".nav-menu-wrapper .navbar-collapse") : jQuery(".ttresponsive_menu .nav-menu-wrapper").appendTo("nav#menu"),
        jQuery(".left-sidebar-menu").appendTo("#shopify-section-left-col-menu"),
        jQuery("#column-left").insertBefore("#content"),
        jQuery(".sidebar .sidebar-block").insertAfter("#shopify-section-left-col-menu"),
        jQuery(".both_sidebar .sidebar#column-left .sidebar-block").prependTo(".collection_sidebar"),
        jQuery(".section-header .sidebar-block").prependTo(".collection_sidebar"),
        jQuery(".site-footer").hasClass("fixed_footer")) {
            var r = jQuery(".site-footer.fixed_footer").height();
            jQuery(".page-wrapper").css("margin-bottom", r + "px")
        }
        jQuery(".left-sidebar.sidebar").insertBefore(".collection_wrapper, .content-wrapper"),
        jQuery(".sidebar .widget > h4").unbind("click"),
        jQuery(".sidebar .widget > h4").removeClass("toggle"),
        jQuery(".sidebar .widget").children(":nth-child(2)").css("display", "block"),
        jQuery(".site-footer .footer-column h5").unbind("click"),
        jQuery(".site-footer .footer-column h5").removeClass("toggle"),
        jQuery(".site-footer .footer-column").children(":nth-child(2)").css("display", "block"),
        jQuery(".site-footer .widget h5").unbind("click"),
        jQuery(".site-footer .widget h5").removeClass("toggle"),
        jQuery(".site-footer .widget").children(":nth-child(2)").css("display", "block")
    }
}
jQuery(document).ready(function() {
    footerToggle()
}),
jQuery(window).load(function() {
    var r = $(".design_4 .product-wrapper-owlslider").height();
    $(".design_4 .product-information-inner.tt-scroll").css("min-height", r + "px")
}),
jQuery(window).resize(function() {
    footerToggle();
    var r = $(".design_4 .product-wrapper-owlslider").height();
    $(".design_4 .product-information-inner.tt-scroll").css("min-height", r + "px")
});
function splitStr(r, a) {
    return r.split(a)
}
function countDownIni(r) {
    $(r).each(function() {
        var a = $(this), s;
        a.attr("data-promoperiod") ? s = new Date().getTime() + parseInt(a.attr("data-promoperiod"), 10) : a.attr("data-countdown") && (s = a.attr("data-countdown")),
        Date.parse(s) - Date.parse(new Date) > 0 && ($(this).addClass("countdown-block"),
        $(this).parent().addClass("countdown-enable"),
        console.log(),
        a.countdown(s, function(p) {
            a.html(p.strftime('<span><span class="left-txt">LEFT</span><span>%D</span><span class="time-txt">days</span></span><span><span>%H</span><span class="time-txt">hours</span></span><span><span>%M</span><span class="time-txt">min</span></span><span><span class="second">%S</span><span class="time-txt">sec</span></span>'))
        }))
    })
}
function countDownProductIni(r) {
    var a = ["days", "hours", "minutes", "seconds"], s = $(r), p, g = _.template('<div class="time <%= label %>"><span class="count curr top"><%= curr %></span><span class="count next top"><%= next %></span><span class="count next bottom"><%= next %></span><span class="count curr bottom"><%= curr %></span><span class="label"><%= label.length < 6 ? label : label.substr(0, 3)  %></span></div>'), l = "00:00:00:00", t = "00:00:00:00";
    s.attr("data-promoperiod") && (p = new Date().getTime() + parseInt(s.attr("data-promoperiod"), 10)),
    s.attr("data-countdown") && (p = s.attr("data-countdown"));
    function i(c) {
        var u = c.split(":")
          , n = {};
        return a.forEach(function(o, f) {
            n[o] = u[f]
        }),
        n
    }
    function d(c, u) {
        var n = [];
        return a.forEach(function(o) {
            c[o] !== u[o] && n.push(o)
        }),
        n
    }
    var y = i(l);
    a.forEach(function(c, u) {
        s.append(g({
            curr: y[c],
            next: y[c],
            label: c
        }))
    }),
    s.countdown(p, function(c) {
        var u = c.strftime("%D:%H:%M:%S"), n;
        u !== t && (l = t,
        t = u,
        n = {
            curr: i(l),
            next: i(t)
        },
        d(n.curr, n.next).forEach(function(o) {
            var f = ".%s".replace(/%s/, o)
              , h = s.find(f);
            h.removeClass("flip"),
            h.find(".curr").text(n.curr[o]),
            h.find(".next").text(n.next[o]),
            _.delay(function(m) {
                m.addClass("flip")
            }, 50, h)
        }))
    })
}
function hb_animated_contents() {
    $(".hb-animate-element:in-viewport").each(function(r) {
        var a = $(this);
        a.hasClass("hb-in-viewport") || setTimeout(function() {
            a.addClass("hb-in-viewport")
        }, 180 * r)
    })
}
$(window).scroll(function() {
    hb_animated_contents()
}),
$(window).load(function() {
    hb_animated_contents()
});
function sidebarsticky() {
    $(document).width() >= 992 && $(document).width() <= 1199 ? jQuery(".left_sidebar #left-column,#column-left,.content-left,.content-right,.right_sidebar #right-column,#column-right,.content-left,.collection_right,.collection_left,.both_sidebar #right-column, .no_sidebar .left-sidebar.sidebar,.no_sidebar .right-sidebar.sidebar").theiaStickySidebar({
        additionalMarginBottom: 30,
        additionalMarginTop: 30
    }) : $(document).width() >= 1200 && jQuery(".left_sidebar #left-column,#column-left,.content-left,.content-right,.right_sidebar #right-column,#column-right,.content-left ,.collection_right,.collection_left,.both_sidebar #right-column,.no_sidebar .left-sidebar.sidebar,.no_sidebar .right-sidebar.sidebar").theiaStickySidebar({
        additionalMarginBottom: 30,
        additionalMarginTop: 130
    })
}
jQuery(window).resize(function() {
    sidebarsticky()
}),
jQuery(document).ready(function() {
    sidebarsticky()
});
//# sourceMappingURL=/s/files/1/0088/1026/6724/t/2/assets/custom-js.js.map?v=43131818372703098591615203866
