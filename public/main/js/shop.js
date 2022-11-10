(function(t) {
    t(document).ready(function() {
        h()
    }),
    t(window).resize(function() {
        h()
    }),
    t(window).scroll(function() {
        h()
    });
    function h() {
        jQuery(document).height() > jQuery(window).height() && (jQuery(window).width() > 1199 && jQuery(".menu-bar").hasClass("sticky_header") && jQuery(this).scrollTop() > 600 ? (jQuery(".menu-bar").addClass("fixed"),
        jQuery(".header_1 .full-header .myaccount").insertAfter(".header_1 .menu-bar .topmenu")) : jQuery(".menu-bar").removeClass("fixed"))
    }
    var f = "ttwishlistList";
    t(document).ready(function() {
        a.init(),
        a.closeQuickViewPopup()
    }),
    t(document).on("click", function(e) {
        var r = t(".quick-view")
          , o = t("#slidedown-cart")
          , n = t(".site-header_cart_link")
          , s = t("#email-modal .modal-window");
        !r.is(e.target) && r.has(e.target).length === 0 && !o.is(e.target) && o.has(e.target).length === 0 && !n.is(e.target) && n.has(e.target).length === 0 && !s.is(e.target) && s.has(e.target).length === 0 && a.closeQuickViewPopup(),
        !r.is(e.target) && r.has(e.target).length === 0 && !o.is(e.target) && o.has(e.target).length === 0 && !n.is(e.target) && n.has(e.target).length === 0 && !s.is(e.target) && s.has(e.target).length === 0 && (a.closeDropdownCart(),
        a.closeEmailModalWindow())
    });
    var a = {
        KidsTimeout: null,
        isSidebarAjaxClick: !1,
        init: function() {
            this.initQuickView(),
            this.initAddToCart(),
            this.initAddToCarts(),
            this.initModal(),
            this.initShortcode(),
            this.producteffect(),
            this.productAccordion(),
            this.productCompact(),
            this.initProductAddToCart(),
            this.initDropDownCart(),
            this.initWishlist(),
            this.initcompare(),
            this.initProductMoreview(),
            this.initSidebar(),
            this.initColorSwatchGrid(),
            this.initInfiniteScrolling()
        },
        initColorSwatchGrid: function() {
            jQuery(".item-swatch li label").click(function() {
                var e = jQuery(this).parent().find(".hidden img").attr("src");
                return jQuery(this).closest(".product-wrapper").find(".featured-image").attr({
                    src: e
                }),
                !1
            })
        },
        initWishlist: function() {
            a.updateWishlistButtons(),
            a.initWishlistButtons()
        },
        initWishlistButtons: function() {
            if (t(".add-in-wishlist-js").length == 0)
                return !1;
            t(".add-in-wishlist-js").each(function() {
                t(this).unbind(),
                t(this).click(function(e) {
                    e.preventDefault();
                    try {
                        var r = t(this).attr("href");
                        if (t.cookie(f) == null)
                            var o = r;
                        else if (t.cookie(f).indexOf(r) == -1)
                            var o = t.cookie(f) + "__" + r;
                        t.cookie(f, o, {
                            expires: 14,
                            path: "/"
                        }),
                        jQuery(".default-wishbutton-" + r).find("i").addClass("mdi-spin mdi-refresh").removeClass("mdi-heart-outline"),
                        t(this).closest(".product-information").length > 0 ? setTimeout(function() {
                            jQuery(".loadding-wishbutton-" + r).remove(),
                            jQuery(".added-wishbutton-" + r).show(),
                            jQuery(".default-wishbutton-" + r).remove()
                        }, 2e3) : (jQuery(".loadding-wishbutton-" + r).show(),
                        jQuery(".default-wishbutton-" + r).remove(),
                        setTimeout(function() {
                            jQuery(".loadding-wishbutton-" + r).remove(),
                            jQuery(".added-wishbutton-" + r).show()
                        }, 2e3)),
                        t(this).unbind()
                    } catch (n) {}
                })
            })
        },
        updateWishlistButtons: function() {
            try {
                if (t.cookie(f) != null && t.cookie(f) != "__" && t.cookie(f) != "")
                    for (var e = String(t.cookie(f)).split("__"), r = 0; r < e.length; r++)
                        e[r] != "" && (jQuery(".added-wishbutton-" + e[r]).show(),
                        jQuery(".default-wishbutton-" + e[r]).remove(),
                        jQuery(".loadding-wishbutton-" + e[r]).remove())
            } catch (o) {}
        },
        initcompare: function() {
            a.initcompareButtons()
        },
        initcompareButtons: function() {
            var e = ".add-in-compare-js"
              , r = ".js-remove-compare"
              , o = t(".compare-count")
              , n = t(".max_compare")
              , s = JSON.parse(localStorage.getItem("localCompare")) || [];
            function d(l) {
                var u = t(l).data("comparehandle")
                  , p = ""
                  , m = t.inArray(u, s) !== -1;
                m ? (s.splice(s.indexOf(u), 1),
                p = "Item removed to the comparison list!",
                jQuery("#modalCompare1").modal(),
                n.text(p)) : s.length === 3 ? (p = "Maximum products to compare. Limit is 3!",
                jQuery("#modalCompare1").modal(),
                n.text(p)) : (s.push(u),
                p = "Item added to the comparison list!",
                jQuery("#modalCompare1").modal(),
                n.text(p)),
                localStorage.setItem("localCompare", JSON.stringify(s)),
                o.text(s.length)
            }
            function c() {
                t(e).each(function() {
                    var l = t(this).data("comparehandle")
                      , u = t.inArray(l, s) !== -1 ? "added" : "";
                    t(this).removeClass("added").addClass(u)
                }),
                o.text(s.length)
            }
            t(document).on("click", e, function(l) {
                l.preventDefault(),
                d(this),
                c()
            }),
            t(document).on("click", r, function() {
                var l = $(this).data("comparehandle");
                s.splice(s.indexOf(l), 1),
                localStorage.setItem("localCompare", JSON.stringify(s)),
                c()
            }),
            c()
        },
        productCompact: function() {
            $(".product-design-compact .tt-scroll").length > 0 && $(".product-design-compact .tt-scroll").nanoScroller({
                paneClass: "tt-scroll-pane",
                sliderClass: "tt-scroll-slider",
                contentClass: "tt-scroll-content",
                preventPageScrolling: !1
            })
        },
        initShortcode: function() {
            t(".tt-toggle").toggle(function() {
                t(this).addClass("active")
            }, function() {
                t(this).removeClass("active")
            }),
            t(".tt-toggle").click(function() {
                t(this).next(".tt-toggle-content").slideToggle()
            }),
            t(".tt-toggle-frame-set").each(function() {
                var e = t(this)
                  , r = e.find(".tt-toggle-accordion");
                r.click(function() {
                    return t(this).next().is(":hidden") && (e.find(".tt-toggle-accordion").removeClass("active").next().slideUp(),
                    t(this).toggleClass("active").next().slideDown()),
                    !1
                }),
                e.find(".tt-toggle-accordion:first").addClass("active"),
                e.find(".tt-toggle-accordion:first").next().slideDown()
            })
        },
        productAccordion: function() {
            var e = $(".tabs-layout-accordion")
              , r = 300
              , o = window.location.hash
              , n = window.location.href;
            o.toLowerCase().indexOf("comment-") >= 0 || o === "#reviews" || o === "#tab-reviews" || n.indexOf("comment-page-") > 0 || n.indexOf("cpage=") > 0 ? e.find(".tab-title-reviews").addClass("active") : (e.find(".tt-accordion-title").first().addClass("active"),
            e.find(".tt-Tabs-panel").first().addClass("active")),
            e.on("click", ".tt-accordion-title", function(s) {
                s.preventDefault();
                var d = $(this)
                  , c = d.siblings(".tt-Tabs-panel");
                d.hasClass("active") ? (d.removeClass("active"),
                c.stop().slideUp(r)) : (e.find(".tt-accordion-title").removeClass("active"),
                e.find(".tt-Tabs-panel").slideUp(),
                d.addClass("active"),
                c.stop().slideDown(r)),
                $(window).resize(),
                setTimeout(function() {
                    $(window).resize()
                }, r)
            })
        },
        producteffect: function() {
            $(".product-wrapper").on("mouseover", function() {
                var e = t(this).parents(".shopify-section")
                  , r = $(e).attr("id")
                  , o = t(this).parents(".shopify-section .product-layouts.item-row")
                  , n = o.data("id");
                n && (n = n.match(/\d+/g));
                var s = t(this).parents(".collection_template .products-grid-view .product-layouts")
                  , d = t(s).data("id");
                if (d && (d = d,
                d = d.match(/\d+/g)),
                n)
                    var c = t("#" + r + ".shopify-section #product-" + n + " .product-wrapper");
                else
                    var c = t("#product-" + d + " .product-wrapper");
                c.hasClass("imgloaded") || (c.addClass("loading"),
                setTimeout(function() {
                    c.removeClass("loading")
                }, 1e3)),
                c.addClass("imgloaded")
            })
        },
        initProductMoreview: function() {
            t("body:not(.rtl) .design_1 .product-wrapper-owlslider .product-single__thumbs.horizontal_bottom").slick({
                autoplay: !1,
                autoplaySpeed: 1500,
                arrows: !0,
                prevArrow: '<button type="button btn" class="slick-prev"><i class="mdi mdi-chevron-left"></i></button>',
                nextArrow: '<button type="button btn" class="slick-next"><i class="mdi mdi-chevron-right"></i></button>',
                centerMode: !0,
                slidesToShow: window.number_of_thumb,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1201,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }]
            }),
            t("body:not(.rtl) .slider-newproduct .product-wrapper .product-thumb .product-single__thumbs").slick({
                autoplay: !0,
                autoplaySpeed: 1500,
                arrows: !0,
                prevArrow: '<button type="button btn" class="slick-prev"><i class="mdi mdi-chevron-left"></i></button>',
                nextArrow: '<button type="button btn" class="slick-next"><i class="mdi mdi-chevron-right"></i></button>',
                centerMode: !0,
                slidesToShow: 2,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1260,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }]
            }),
            t("body.rtl .slider-newproduct .product-wrapper .product-thumb .product-single__thumbs").slick({
                autoplay: !0,
                autoplaySpeed: 1500,
                arrows: !0,
                prevArrow: '<button type="button btn" class="slick-prev"><i class="mdi mdi-chevron-left"></i></button>',
                nextArrow: '<button type="button btn" class="slick-next"><i class="mdi mdi-chevron-right"></i></button>',
                centerMode: !0,
                slidesToShow: 2,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1260,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }]
            }),
            t("body.rtl .design_1 .product-wrapper-owlslider .product-single__thumbs.horizontal_bottom").slick({
                autoplay: !1,
                autoplaySpeed: 1500,
                arrows: !0,
                rtl: !0,
                prevArrow: '<button type="button btn" class="slick-prev"><i class="mdi mdi-chevron-left"></i></button>',
                nextArrow: '<button type="button btn" class="slick-next"><i class="mdi mdi-chevron-right"></i></button>',
                centerMode: !0,
                slidesToShow: window.number_of_thumb,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }]
            }),
            t(".design_1 .product-wrapper-owlslider .product-single__thumbs.vertical_left,.design_1 .product-wrapper-owlslider .product-single__thumbs.vertical_right").slick({
                autoplay: !1,
                autoplaySpeed: 1500,
                arrows: !0,
                prevArrow: '<button type="button btn" class="slick-prev"><i class="mdi mdi-chevron-left"></i></button>',
                nextArrow: '<button type="button btn" class="slick-next"><i class="mdi mdi-chevron-right"></i></button>',
                centerMode: !0,
                vertical: !0,
                slidesToShow: window.number_of_thumb,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }]
            }),
            t(".design_4.product-design-compact .product-wrapper-owlslider .product-single__thumbs.horizontal_bottom").slick({
                autoplay: !1,
                autoplaySpeed: 1500,
                arrows: !0,
                prevArrow: '<button type="button btn" class="slick-prev"><i class="mdi mdi-chevron-left"></i></button>',
                nextArrow: '<button type="button btn" class="slick-next"><i class="mdi mdi-chevron-right"></i></button>',
                centerMode: !0,
                slidesToShow: window.number_of_thumb_2,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }]
            }),
            t(".design_4.product-design-compact .product-wrapper-owlslider .product-single__thumbs.vertical_left,.design_4.product-design-compact .product-wrapper-owlslider .product-single__thumbs.vertical_right").slick({
                autoplay: !1,
                autoplaySpeed: 1500,
                arrows: !0,
                prevArrow: '<button type="button btn" class="slick-prev"><i class="mdi mdi-chevron-left"></i></button>',
                nextArrow: '<button type="button btn" class="slick-next"><i class="mdi mdi-chevron-right"></i></button>',
                centerMode: !0,
                vertical: !0,
                slidesToShow: window.number_of_thumb_2,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }]
            })
        },
        showModal: function(e) {
            t(e).fadeIn(500),
            a.KidsTimeout = setTimeout(function() {
                t(e).fadeOut(500)
            }, 5e3)
        },
        showModalCart: function(e) {
            t(e).fadeIn(500)
        },
        checkItemsInDropdownCart: function() {
            t("#slidedown-cart .mini-products-list").children().length > 0 ? (t("#slidedown-cart .no-items").hide(),
            t("#slidedown-cart .has-items").show()) : (t("#slidedown-cart .has-items").hide(),
            t("#slidedown-cart .no-items").show()),
            t("#Sticky-slidedown-cart .mini-products-list").children().length > 0 ? (t("#Sticky-slidedown-cart .no-items").hide(),
            t("#Sticky-slidedown-cart .has-items").show()) : (t("#Sticky-slidedown-cart .has-items").hide(),
            t("#Sticky-slidedown-cart .no-items").show())
        },
        initModal: function() {
            t(".continue-shopping").click(function() {
                clearTimeout(a.KidsTimeout),
                t(".ajax-success-modal").fadeOut(500)
            }),
            t(".close-modal,.modal .overlay").click(function() {
                clearTimeout(a.KidsTimeout),
                t(".ajax-success-modal").fadeOut(500)
            })
        },
        initDropDownCart: function() {
            t(".site-header .site-header_cart_link").on("click", function(e) {
                e.preventDefault(),
                t("#Sticky-slidedown-cart").is(":visible") ? t("#Sticky-slidedown-cart").slideToggle("fast") : t("#Sticky-slidedown-cart").slideDown("fast"),
                t(this).toggleClass("active"),
                t("body").removeClass("myaccount_active"),
                t("body").removeClass("currency-open"),
                t("body").removeClass("language-open"),
                t("body").toggleClass("cart_active"),
                jQuery(".language.flag-dropdown-menu").slideUp("fast"),
                jQuery(".currencies.flag-dropdown-menu").slideUp("fast"),
                jQuery(".customer_account").slideUp("fast")
            }),
            a.checkItemsInDropdownCart(),
            t("#slidedown-cart .no-items a").click(function() {
                t("#slidedown-cart").slideUp("fast")
            }),
            t("#slidedown-cart .btn-remove").click(function(e) {
                e.preventDefault();
                var r = t(this).parents(".item").attr("id");
                r = r.match(/\d+/g),
                Shopify.removeItem(r, function(o) {
                    a.doUpdateDropdownCart(o)
                })
            }),
            t("#Sticky-slidedown-cart .no-items a").click(function() {
                t("#Sticky-slidedown-cart").slideUp("fast")
            }),
            t("#Sticky-slidedown-cart .btn-remove").click(function(e) {
                e.preventDefault();
                var r = t(this).parents(".item").attr("id");
                r = r.match(/\d+/g),
                Shopify.removeItem(r, function(o) {
                    a.doUpdateDropdownCart(o)
                })
            })
        },
        closeDropdownCart: function() {
            t(".site-header:not(.header_2) #slidedown-cart").is(":visible") && t(".site-header:not(.header_2) #slidedown-cart").slideUp("fast")
        },
        initProductAddToCart: function() {
            t("#AddToCart").length > 0 && t("#AddToCart").click(function(e) {
                if (e.preventDefault(),
                t(this).attr("disabled") != "disabled") {
                    var r = t("#AddToCartForm select[name=id]").val();
                    r || (r = t("#AddToCartForm input[name=id]").val());
                    var o = t("#AddToCartForm input[name=quantity]").val();
                    o || (o = 1);
                    var n = t("#productPhotoImg").attr("src")
                      , s = t(".product-single__title").text()
                      , d = t(".product-single__price #productPrice").text();
                    console.log(d),
                    a.doAjaxAddToCart(r, o, n, s, d)
                }
                return !1
            })
        },
        initAddToCart: function() {
            t(".add-cart-btn").length > 0 && t(".add-cart-btn").click(function(e) {
                if (e.preventDefault(),
                t(this).attr("disabled") != "disabled") {
                    var r = t(this).parents(".item-row")
                      , o = t(r).data("id");
                    if (o = o.match(/\d+/g),
                    !window.ajax_cart)
                        t("form.cart-form-" + o).submit();
                    else {
                        var n = t(".cart-form-" + o + " select[name=id]").val();
                        n || (n = t(".cart-form-" + o + " input[name=id]").val());
                        var s = t(".cart-form-" + o + " select[name=quantity]").val();
                        s || (s = 1),
                        console.log(s);
                        var d = t(r).find(".featured-image").attr("src")
                          , c = t(r).find(".grid-link__title").text()
                          , l = t(r).find(".grid-view-item__meta").html();
                        a.doAjaxAddToCart(n, s, d, c, l)
                    }
                }
                return !1
            })
        },
        initAddToCarts: function() {
            t(".add-cart-btns").length > 0 && t(".add-cart-btns").click(function(e) {
                if (e.preventDefault(),
                t(this).attr("disabled") != "disabled") {
                    var r = t(this).parents(".item-row")
                      , o = t(r).attr("id");
                    if (o = o.match(/\d+/g),
                    !window.ajax_cart)
                        t("form.cart-form-" + o).submit();
                    else {
                        var n = t(".cart-form-" + o + " select[name=id]").val();
                        n || (n = t(".cart-form-" + o + " input[name=id]").val());
                        var s = t(".cart-form-" + o + " select[name=quantity]").val();
                        s || (s = 1),
                        console.log(s);
                        var d = t(r).find(".featured-image").attr("src")
                          , c = t(r).find(".grid-link__title").text()
                          , l = t(r).find(".grid-view-item__meta").html();
                        a.doAjaxAddToCart(n, s, d, c, l)
                    }
                }
                return !1
            })
        },
        showLoading: function() {
            t(".loading-modal").show()
        },
        hideLoading: function() {
            t(".loading-modal").hide()
        },
        doAjaxAddToCart: function(e, r, o, n, s) {
            t.ajax({
                type: "post",
                url: "/cart/add.js",
                data: "quantity=" + r + "&id=" + e,
                dataType: "json",
                beforeSend: function() {
                    a.showLoading()
                },
                success: function(d) {
                    a.hideLoading(),
                    a.showModalCart(".ajax-success-modal"),
                    t(".ajax-success-modal").find(".ajax-product-image").attr("src", o),
                    t(".ajax-success-modal").find(".added-to-wishlist").hide(),
                    t(".ajax-success-modal").find(".added-to-cart").show(),
                    t(".ajax-success-modal").find(".ajax-product-title").text(n),
                    t(".ajax-success-modal").find(".ajax_price").html(s),
                    a.updateDropdownCart()
                },
                error: function(d, c) {
                    a.hideLoading(),
                    t(".ajax-error-message").text(t.parseJSON(d.responseText).description),
                    a.showModalCart(".ajax-error-modal")
                }
            })
        },
        initQuickView: function() {
            t(".quick-view-text").click(function() {
                a.showLoading(),
                t(".quick-view").addClass("open-in");
                var e = t(this).data("id");
                return Shopify.getProduct(e, function(r) {
                    var o = jQuery(".quick-view .quick-shop-modal-bg");
                    t(".quick-view").hasClass("open-in") && (o.show(),
                    setTimeout(function() {
                        jQuery(".quick-view .quick-shop-modal-bg").hide()
                    }, 2e3));
                    var n = t("#quickview-template").html();
                    t(".quick-view").html(n);
                    var s = t(".quick-view");
                    a.loadQuickViewSlider(r, s);
                    var d = r.description.replace(/(<([^>]+)>)/ig, "");
                    if (d = d.split(" ").splice(0, 40).join(" ") + "...",
                    s.find(".product-title a").text(r.title),
                    s.find(".product-title a").attr("href", r.url),
                    s.find(".product-inventory span").length > 0) {
                        var c = r.variants[0]
                          , l = s.find(".product-inventory span");
                        c.available ? c.inventory_management != null ? (l.text(window.in_stock),
                        l.addClass("in_stock"),
                        jQuery(".qty-box-set").css("display", "inline-block")) : (l.text(window.many_in_stock),
                        l.addClass("many_in_stock"),
                        jQuery(".qty-box-set").css("display", "inline-block")) : (l.text(window.out_of_stock),
                        l.addClass("out_of_stock"),
                        jQuery(".qty-box-set").css("display", "none"))
                    }
                    s.find(".product-description").html(d),
                    s.find(".price").html(Shopify.formatMoney(r.price, window.money_format)),
                    s.find(".money").html(Shopify.formatMoney(r.price, window.money_format)),
                    s.find(".product-item").attr("id", "product-" + r.id),
                    s.find(".variants").attr("id", "product-actions-" + r.id),
                    s.find(".variants select").attr("id", "product-select-" + r.id),
                    r.compare_at_price > r.price ? (s.find(".compare-price").html(Shopify.formatMoney(r.compare_at_price_max, window.money_format)).show(),
                    s.find(".price").addClass("on-sale")) : (s.find(".compare-price").html(""),
                    s.find(".price").removeClass("on-sale")),
                    r.available ? (s.find(".total-price .price").html(Shopify.formatMoney(r.price, window.money_format)),
                    a.createQuickViewVariants(r, s)) : (s.find("select, input, .total-price, .dec, .inc, .variants label").remove(),
                    s.find(".add-to-cart-btn").text("Unavailable").addClass("disabled").attr("disabled", "disabled")),
                    $(".quick-view .qtyplus").on("click", function(u) {
                        u.preventDefault();
                        var p = jQuery(this).parents(".qty-box-set").find(".quantity")
                          , m = parseInt(jQuery(this).parents(".qty-box-set").find(".quantity").val());
                        isNaN(m) ? jQuery(this).parents(".qty-box-set").find(".quantity").val(1) : jQuery(this).parents(".qty-box-set").find(".quantity").val(m + 1)
                    }),
                    $(".quick-view .qtyminus").on("click", function(u) {
                        u.preventDefault();
                        var p = jQuery(this).parents(".qty-box-set").find(".quantity")
                          , m = parseInt(jQuery(this).parents(".qty-box-set").find(".quantity").val());
                        !isNaN(m) && m > 1 ? jQuery(this).closest(".qty-box-set").find(".quantity").val(m - 1) : jQuery(this).closest(".qty-box-set").find(".quantity").val(1)
                    }),
                    a.initQuickviewAddToCart(),
                    a.hideLoading(),
                    t(".quick-view").fadeIn(500)
                }),
                !1
            }),
            t(".quick-view .overlay, .close-window").on("click", function() {
                return a.closeQuickViewPopup(),
                t(".quick-view").removeClass("open-in"),
                t(".quick-view").removeClass("option-loader"),
                !1
            })
        },
        initQuickviewAddToCart: function() {
            t(".quick-view .add-to-cart-btn").length > 0 && t(".quick-view .add-to-cart-btn").click(function() {
                var e = t(".quick-view select[name=id]").val();
                e || (e = t(".quick-view input[name=id]").val());
                var r = t(".quick-view input[name=quantity]").val();
                r || (r = 1);
                var o = t(".quick-view .product-title a").html()
                  , n = t(".quick-view .quickview-featured-image img").attr("src")
                  , s = t(".quick-view .product-price__price").html();
                a.doAjaxAddToCart(e, r, n, o, s),
                a.closeQuickViewPopup(),
                t(".quick-view").removeClass("open-in"),
                t(".quick-view").removeClass("option-loader")
            })
        },
        updateDropdownCart: function() {
            Shopify.getCart(function(e) {
                a.doUpdateDropdownCart(e)
            })
        },
        doUpdateDropdownCart: function(e) {
            var r = '<li class="item" id="cart-item-{ID}"><a href="{URL}" title="{TITLE}" class="product-image"><img src="{IMAGE}" alt="{TITLE}"></a><div class="product-details"><a href="javascript:void(0)" title="Remove This Item" class="btn-remove"><span class="mdi mdi-close"></span></a><p class="product-name"><a href="{URL}">{TITLE}</a></p><div class="cart-collateral">{QUANTITY} x <span class="price">{PRICE}</span></div></div></li>';
            if (t("#CartCount .cart-products-count").text(e.item_count),
            t("#CartCount_sticky .cart-products-count").text(e.item_count),
            t("#minicart_total span.money").html(Shopify.formatMoney(e.total_price, window.money_format)),
            t("#slidedown-cart .summary .price").html(Shopify.formatMoney(e.total_price, window.money_format)),
            t("#slidedown-cart .mini-products-list").html(""),
            t("#Sticky-slidedown-cart .summary .price").html(Shopify.formatMoney(e.total_price, window.money_format)),
            t("#Sticky-slidedown-cart .mini-products-list").html(""),
            t(".ajax-success-modal").find(".ajax_item_total").html(e.item_count),
            e.item_count > 0) {
                for (var o = 0; o < e.items.length; o++) {
                    var n = r;
                    n = n.replace(/\{ID\}/g, e.items[o].id),
                    n = n.replace(/\{URL\}/g, e.items[o].url),
                    n = n.replace(/\{TITLE\}/g, e.items[o].title),
                    n = n.replace(/\{QUANTITY\}/g, e.items[o].quantity),
                    n = n.replace(/\{IMAGE\}/g, Shopify.resizeImage(e.items[o].image, "small")),
                    n = n.replace(/\{PRICE\}/g, Shopify.formatMoney(e.items[o].price, window.money_format)),
                    t("#slidedown-cart .mini-products-list").append(n),
                    t("#Sticky-slidedown-cart .mini-products-list").append(n)
                }
                t("#slidedown-cart .btn-remove").click(function(s) {
                    s.preventDefault();
                    var d = t(this).parents(".item").attr("id");
                    d = d.match(/\d+/g),
                    Shopify.removeItem(d, function(c) {
                        a.doUpdateDropdownCart(c)
                    })
                }),
                t("#Sticky-slidedown-cart .btn-remove").click(function(s) {
                    s.preventDefault();
                    var d = t(this).parents(".item").attr("id");
                    d = d.match(/\d+/g),
                    Shopify.removeItem(d, function(c) {
                        a.doUpdateDropdownCart(c)
                    })
                }),
                a.checkNeedToConvertCurrency() && (Currency.convertAll(window.shop_currency, jQuery(".currencies li.active .currencies-a").val(), "#slidedown-cart span.money", "money_format"),
                Currency.convertAll(window.shop_currency, jQuery(".currencies li.active .currencies-a").val(), "#Sticky-slidedown-cart span.money", "money_format"),
                Currency.convertAll(window.shop_currency, jQuery(".currencies li.active .currencies-a").val(), "span.money", "money_format"),
                Currency.convertAll(window.shop_currency, jQuery(".currencies li.active .currencies-a").val(), "#minicart_total span.money", "money_format"))
            }
            a.checkItemsInDropdownCart()
        },
        checkNeedToConvertCurrency: function() {
            return window.show_multiple_currencies && Currency.currentCurrency != shopCurrency
        },
        loadQuickViewSlider: function(e, r) {
            var o = Shopify.resizeImage(e.featured_image, "large");
            if (r.find(".quickview-featured-image").append('<img src="' + o + '" title="' + e.title + '"/>'),
            e.images.length > 1) {
                var n = r.find(".more-view-wrapper ul");
                for (i in e.images) {
                    var s = Shopify.resizeImage(e.images[i], "large")
                      , d = Shopify.resizeImage(e.images[i], "small")
                      , c = '<li><a href="javascript:void(0)" data-image="' + s + '"><img src="' + d + '"  /></a></li>';
                    n.append(c),
                    $("li").first().find("a").addClass("active")
                }
                n.css("max-height", "100px"),
                $("body.rtl").length > 0 ? (n.hasClass("quickview-more-views-owlslider"),
                a.initQuickViewMoreviewRtl(n)) : (n.hasClass("quickview-more-views-owlslider"),
                a.initQuickViewMoreview(n)),
                n.find("a").click(function() {
                    var l = r.find(".quickview-featured-image img");
                    t(this).addClass("active");
                    var u = r.find(".quickview-featured-image div");
                    l.attr("src") != t(this).attr("data-image") && (l.attr("src", t(this).attr("data-image")),
                    u.show(),
                    t("a").removeClass("active"),
                    t(this).addClass("active"),
                    l.load(function(p) {
                        u.hide(),
                        t(this).unbind("load"),
                        u.hide()
                    }))
                })
            } else
                r.find(".more-view-wrapper").remove();
            t(".quick-view .overlay, .close-window").on("click", function() {
                return a.closeQuickViewPopup(),
                t(".quick-view").removeClass("open-in"),
                t(".quick-view").removeClass("option-loader"),
                !1
            })
        },
        closeEmailModalWindow: function() {
            t("#email-modal").length > 0 && t("#email-modal").is(":visible") && t("#email-modal .modal-window").fadeOut(600, function() {
                t("#email-modal .modal-overlay").fadeOut(600, function() {
                    t("#email-modal").hide(),
                    t.cookie("emailSubcribeModal", "closed", {
                        expires: 1,
                        path: "/"
                    })
                })
            })
        },
        initQuickViewMoreview: function(e) {
            e && (e.owlCarousel({
                nav: !0,
                items: 3,
                loop: !1,
                rtl: !1,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1199: {
                        items: 3
                    }
                },
                dots: !1
            }),
            setTimeout(function() {
                $(e).css("visibility", "visible")
            }, 500)),
            t(".quick-view .overlay, .close-window").on("click", function() {
                return a.closeQuickViewPopup(),
                t(".quick-view").removeClass("open-in"),
                t(".quick-view").removeClass("option-loader"),
                !1
            })
        },
        initQuickViewMoreviewRtl: function(e) {
            e && (e.owlCarousel({
                nav: !0,
                items: 3,
                loop: !1,
                rtl: !0,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1199: {
                        items: 3
                    }
                },
                dots: !1
            }),
            setTimeout(function() {
                $(e).css("visibility", "visible")
            }, 500)),
            t(".quick-view .overlay, .close-window").on("click", function() {
                return a.closeQuickViewPopup(),
                t(".quick-view").removeClass("open-in"),
                t(".quick-view").removeClass("option-loader"),
                !1
            })
        },
        convertToSlug: function(e) {
            return e.toLowerCase().replace(/[^a-z0-9 -]/g, "").replace(/\s+/g, "-").replace(/-+/g, "-")
        },
        createQuickViewVariants: function(e, r) {
            if (e.variants.length > 1) {
                for (var o = 0; o < e.variants.length; o++) {
                    var n = e.variants[o]
                      , s = '<option value="' + n.id + '">' + n.title + "</option>";
                    r.find("form.variants > select").append(s)
                }
                new Shopify.OptionSelectors("product-select-" + e.id,{
                    product: e,
                    onVariantSelected: selectCallbackQuickview
                }),
                e.options.length == 1 && t(".selector-wrapper:eq(0)").prepend("<label>" + e.options[0].name + "</label>"),
                r.find("form.variants .selector-wrapper label").each(function(c, l) {
                    t(this).html(e.options[c].name)
                })
            } else {
                r.find("form.variants > select").remove();
                var d = '<input type="hidden" name="id" value="' + e.variants[0].id + '">';
                r.find("form.variants").append(d)
            }
            Currency.convertAll(window.shop_currency, jQuery(".currencies li.active .currencies-a").val(), "span.money", "money_format")
        },
        closeQuickViewPopup: function() {
            t(".quick-view").fadeOut(500)
        },
        initSidebar: function() {
            t(".collection_sidebar").length > 0 && (a.sidebarParams(),
            a.sidebarMapEvents(),
            a.sidebarMapClear(),
            a.sidebarMapClearAll(),
            a.initSortby(),
            a.sidebarMapPaging())
        },
        sidebarMapView: function() {
            t(".view-mode a.active").removeClass("active"),
            t(this).addClass("active"),
            jQuery(".products-grid-view  > .product-list .product-thumb").attr("class", "product-thumb col-xs-5 col-sm-5 col-md-3"),
            jQuery(".products-grid-view > .product-list .product-description").attr("class", "product-description col-xs-7 col-sm-7 col-md-9"),
            jQuery(".products-grid-view > div.grid-item").each(function() {
                var e = jQuery(this).find(".grid-item.product-grid .product-wrapper .product-thumb .fade_img");
                jQuery(this).find(".grid-item.product-grid .product-wrapper .product-description .flip-countdown.simple-countdown").appendTo(e)
            }),
            jQuery(".products-grid-view > div.grid-item.product-list").each(function() {
                var e = jQuery(this).find(".product-wrapper .product-description .product-description-wrap");
                jQuery(this).find(".grid-view-item__title").prependTo(e)
            }),
            jQuery(".products-grid-view > div.grid-item ").each(function() {
                var e = jQuery(this).find(".product-description");
                jQuery(this).find(".main_btn_wrapper").appendTo(e)
            }),
            jQuery(".products-grid-view > div.grid-item ").each(function() {
                var e = jQuery(this).find(".btn_wrapper");
                jQuery(this).find(".grid-view-item__meta").insertBefore(e)
            }),
            jQuery(".products-grid-view > div.grid-item ").each(function() {
                var e = jQuery(this).find(".product-desc");
                jQuery(this).find(".grid-view-item__title").insertBefore(e)
            }),
            jQuery(".products-grid-view > div.grid-item.product-list").each(function() {
                var e = jQuery(this).find(".product-description .h4.grid-view-item__title");
                jQuery(this).find(".product-description .spr-badges").insertAfter(e)
            }),
            jQuery(".products-grid-view > div.grid-item.product-grid").each(function() {
                var e = jQuery(this).find(".product-description .product-description-wrap .product-desc");
                jQuery(this).find(".product-description .spr-badges").insertBefore(e)
            }),
            jQuery(".products-grid-view > .product-grid .product-thumb").attr("class", "product-thumb col-xs-12 padding_0"),
            jQuery(".products-grid-view > .product-grid .product-description").attr("class", "product-description col-xs-12"),
            jQuery(".products-grid-view > div.grid-item").addClass("product-grid"),
            jQuery("#list-view").on("click", function() {
                jQuery(".products-grid-view > div.grid-item ").removeClass("product-grid"),
                jQuery(".products-grid-view > div.grid-item ").addClass("product-list"),
                jQuery("#grid-view").removeClass("active"),
                jQuery("#list-view").addClass("active"),
                jQuery(".products-grid-view > .product-list .product-thumb").attr("class", "product-thumb col-xs-5 col-sm-5 col-md-3"),
                jQuery(".products-grid-view > .product-list .product-description").attr("class", "product-description col-xs-7 col-sm-7 col-md-9"),
                jQuery(".products-grid-view > div.grid-item ").each(function() {
                    var r = jQuery(this).find(".product-description .main_btn_wrapper");
                    jQuery(this).find(".btn_wrapper").appendTo(r)
                }),
                jQuery(".products-grid-view > div.grid-item.product-list").each(function() {
                    var r = jQuery(this).find(".product-wrapper .product-description .product-description-wrap");
                    jQuery(this).find(".grid-view-item__title").prependTo(r)
                }),
                jQuery(".products-grid-view > div.grid-item ").each(function() {
                    var r = jQuery(this).find(".main_btn_wrapper");
                    jQuery(this).find(".grid-view-item__meta").prependTo(r)
                }),
                jQuery(".products-grid-view > div.grid-item ").each(function() {
                    var r = jQuery(this).find(".product-description");
                    jQuery(this).find(".main_btn_wrapper").appendTo(r)
                }),
                jQuery(".products-grid-view > div.grid-item ").each(function() {
                    var r = jQuery(this).find(".product-desc");
                    jQuery(this).find(".grid-view-item__title").insertBefore(r)
                }),
                jQuery(".products-grid-view > div.grid-item.product-list").each(function() {
                    var r = jQuery(this).find(".product-description .h4.grid-view-item__title");
                    jQuery(this).find(".product-description .spr-badges").insertAfter(r)
                }),
                jQuery(".products-grid-view > div.grid-item ").each(function() {
                    var r = jQuery(this).find(".main_btn_wrapper");
                    jQuery(this).find(".btn_wrapper").appendTo(r)
                }),
                localStorage.setItem("display", "list");
                var e = t(".filter-show  button span").text();
                Shopify.queryParams.view = e
            }),
            jQuery("#grid-view").on("click", function() {
                jQuery("#list-view").removeClass("active"),
                jQuery("#grid-view").addClass("active"),
                jQuery(".products-grid-view > div.grid-item ").removeClass("product-list"),
                jQuery(".products-grid-view > div.grid-item ").addClass("product-grid"),
                jQuery(".products-grid-view > .product-grid .product-thumb").attr("class", "product-thumb col-xs-12 padding_0"),
                jQuery(".products-grid-view > .product-grid .product-description").attr("class", "product-description col-xs-12"),
                localStorage.setItem("display", "grid"),
                jQuery(".products-grid-view > div.grid-item:not(.style5) ").each(function() {
                    var r = jQuery(this).find(".product-thumb");
                    jQuery(this).find(".btn_wrapper").appendTo(r)
                }),
                jQuery(".products-grid-view > div.grid-item").each(function() {
                    var r = jQuery(this).find(".product-thumb .fade_img");
                    jQuery(this).find(".product-description .flip-countdown.simple-countdown").appendTo(r)
                }),
                jQuery(".products-grid-view > div.grid-item ").each(function() {
                    var r = jQuery(this).find(".grid-view-item__meta");
                    jQuery(this).find(".grid-view-item__title").insertBefore(r)
                }),
                jQuery(".products-grid-view > div.grid-item.product-grid").each(function() {
                    var r = jQuery(this).find(".product-description .product-description-wrap .product-desc");
                    jQuery(this).find(".product-description .spr-badges").insertBefore(r)
                });
                var e = t(".filter-show  button span").text();
                Shopify.queryParams.view = e
            }),
            jQuery(window).width() < 992 && (jQuery(".sidebar .widget > h4").addClass("toggle"),
            jQuery(".sidebar .widget ").children(":nth-child(2)").css("display", "none"),
            jQuery(".sidebar .widget.active").children(":nth-child(2)").css("display", "block"),
            jQuery(".sidebar .widget > h4.toggle").unbind("click"),
            jQuery(".sidebar .widget > h4.toggle").on("click", function() {
                jQuery(this).parent().toggleClass("active").children(":nth-child(2)").slideToggle("fast")
            })),
            localStorage.getItem("display") == "grid" ? jQuery("#grid-view").trigger("click") : jQuery("#list-view").trigger("click"),
            countDownIni(".flip-countdown")
        },
        sidebarMapSorting: function(e) {
            t(".filter-sortby a").click(function(r) {
                if (!t(this).parent().hasClass("active")) {
                    Shopify.queryParams.sort_by = t(this).attr("href"),
                    a.sidebarAjaxClick();
                    var o = t(this).text();
                    t(".filter-sortby  button span").text(o),
                    t(".filter-sortby li.active").removeClass("active"),
                    t(this).parent().addClass("active")
                }
                r.preventDefault()
            })
        },
        sidebarMapShow: function() {
            t(".filter-show a").click(function(e) {
                if (!t(this).parent().hasClass("active")) {
                    var r = t(this).attr("href");
                    Shopify.queryParams.view = r,
                    a.sidebarAjaxClick(),
                    t(".filter-show .btn span").text(r),
                    t(".filter-show li.active").removeClass("active"),
                    t(this).parent().addClass("active")
                }
                e.preventDefault()
            })
        },
        initSortby: function() {
            if (Shopify.queryParams.sort_by) {
                var e = Shopify.queryParams.sort_by
                  , r = t(".filter-sortby a[href='" + e + "']").text();
                t(".filter-sortby  button span").text(r),
                t(".filter-sortby li.active").removeClass("active"),
                t(".filter-sortby a[href='" + e + "']").parent().addClass("active")
            }
        },
        sidebarMapPaging: function() {
            t(".pagination-custom a").click(function(e) {
                var r = t(this).attr("href").match(/page=\d+/g);
                if (r && (Shopify.queryParams.page = parseInt(r[0].match(/\d+/g)),
                Shopify.queryParams.page)) {
                    var o = a.sidebarCreateUrl();
                    a.isSidebarAjaxClick = !0,
                    History.pushState({
                        param: Shopify.queryParams
                    }, o, o),
                    a.sidebarGetContent(o),
                    t("body,html").animate({
                        scrollTop: 500
                    }, 600)
                }
                e.preventDefault()
            })
        },
        sidebarMapTagEvents: function() {
            jQuery(window).width() < 992 && (jQuery(".sidebar .widget > h4").addClass("toggle"),
            jQuery(".sidebar .widget ").children(":nth-child(2)").css("display", "none"),
            jQuery(".sidebar .widget.active").children(":nth-child(2)").css("display", "block"),
            jQuery(".sidebar .widget > h4.toggle").unbind("click"),
            jQuery(".sidebar .widget > h4.toggle").on("click", function() {
                jQuery(this).parent().toggleClass("active").children(":nth-child(2)").slideToggle("fast")
            })),
            jQuery(window).width() < 992 && (jQuery(".sidebar-block .widget > h4").addClass("toggle"),
            jQuery(".sidebar-block .widget ").children(":nth-child(2)").css("display", "none"),
            jQuery(".sidebar-block .widget.active").children(":nth-child(2)").css("display", "block"),
            jQuery(".sidebar-block .widget > h4.toggle").unbind("click"),
            jQuery(".sidebar-block .widget > h4.toggle").on("click", function() {
                jQuery(this).parent().toggleClass("active").children(":nth-child(2)").slideToggle("fast")
            })),
            t('.sidebar-tag a:not(".clear"), .sidebar-tag label').click(function(e) {
                t(this).addClass("active");
                var r = [];
                if (Shopify.queryParams.constraint && (r = Shopify.queryParams.constraint.split("+")),
                !window.enable_sidebar_multiple_choice && !t(this).prev().is(":checked")) {
                    var o = t(this).parents(".sidebar-tag").find("input:checked");
                    if (o.length > 0) {
                        var s = o.val();
                        if (s) {
                            var n = r.indexOf(s);
                            n >= 0 && r.splice(n, 1)
                        }
                    }
                }
                var s = t(this).prev().val();
                if (s) {
                    var n = r.indexOf(s);
                    n >= 0 ? r.splice(n, 1) : r.push(s)
                }
                r.length ? Shopify.queryParams.constraint = r.join("+") : delete Shopify.queryParams.constraint,
                a.sidebarAjaxClick(),
                e.preventDefault()
            })
        },
        sidebarInitToggle: function() {
            t(".sidebar-tag").length > 0 && t(".sidebar-tag .widget span").click(function() {
                var e = t(this).parents(".widget");
                e.hasClass("click") ? e.removeClass("click") : e.addClass("click"),
                t(this).parents(".sidebar-tag").find(".widget-content").slideToggle()
            })
        },
        sidebarMapClearAll: function() {
            t(".refined-widgets a.clear-all").click(function(e) {
                delete Shopify.queryParams.constraint,
                delete Shopify.queryParams.q,
                a.sidebarAjaxClick(),
                e.preventDefault()
            })
        },
        sidebarMapClear: function() {
            t(".sidebar-tag").each(function() {
                var e = t(this);
                e.find("input:checked").length > 0 && e.find(".clear").show().click(function(r) {
                    var o = [];
                    Shopify.queryParams.constraint && (o = Shopify.queryParams.constraint.split("+")),
                    e.find("input:checked").each(function() {
                        var n = t(this)
                          , s = n.val();
                        if (s) {
                            var d = o.indexOf(s);
                            d >= 0 && o.splice(d, 1)
                        }
                    }),
                    o.length ? Shopify.queryParams.constraint = o.join("+") : delete Shopify.queryParams.constraint,
                    a.sidebarAjaxClick(),
                    r.preventDefault()
                })
            })
        },
        sidebarMapEvents: function() {
            a.sidebarMapTagEvents(),
            a.sidebarMapView(),
            a.sidebarMapSorting(),
            a.sidebarMapShow()
        },
        reActivateSidebar: function() {
            if (t(".sidebar-tag .active").removeClass("active"),
            t(".sidebar-tag input:checked").attr("checked", !1),
            Shopify.queryParams.view) {
                t(".view-mode .active").removeClass("active");
                var e = Shopify.queryParams.view;
                e.indexOf("list") >= 0 ? (t(".view-mode .list").addClass("active"),
                e = e.replace("list", "")) : t(".view-mode .grid").addClass("active"),
                t(".filter-show  button span").text(e),
                t(".filter-show li.active").removeClass("active"),
                t(".filter-show a[href='" + e + "']").parent().addClass("active")
            }
            a.initSortby()
        },
        sidebarMapData: function(e) {
            var r = t(".col-main .products-grid-view")
              , o = t(e).find(".col-main .products-grid-view");
            if (r.replaceWith(o),
            a.checkNeedToConvertCurrency() && Currency.convertAll(window.shop_currency, jQuery(".currencies li.active .currencies-a").val(), "span.money", "money_format"),
            t(".refined-widgets").replaceWith(t(e).find(".refined-widgets")),
            t(".sidebar .refined-widgets").replaceWith(t(e).find(".sidebar .refined-widgets")),
            t(".filter-toggle-wrap .refined-widgets").replaceWith(t(e).find(".filter-toggle-wrap .refined-widgets")),
            t(".sidebar .sidebar-block").replaceWith(t(e).find(".sidebar .sidebar-block")),
            t(".filter-toggle-wrap .sidebar-block").replaceWith(t(e).find(".filter-toggle-wrap .sidebar-block")),
            countDownIni(".flip-countdown"),
            t(".pagination-wrap").length > 0 ? t(".pagination-wrap").replaceWith(t(e).find(".pagination-wrap")) : t(t(e).find(".pagination-wrap")).insertAfter(".col-main"),
            localStorage.getItem("display") == "grid" ? jQuery("#grid-view").trigger("click") : jQuery("#list-view").trigger("click"),
            a.initInfiniteScrolling(),
            $(".spr-badges").length > 0)
                return window.SPR.registerCallbacks(),
                window.SPR.initRatingHandler(),
                window.SPR.initDomEls(),
                window.SPR.loadProducts(),
                window.SPR.loadBadges()
        },
        sidebarCreateUrl: function(e) {
            var r = t.param(Shopify.queryParams).replace(/%2B/g, "+");
            return e ? (location.href = e + "?" + r,
            r != "" ? e + "?" + r : e) : location.pathname + "?" + r
        },
        sidebarAjaxClick: function(e) {
            delete Shopify.queryParams.page;
            var r = a.sidebarCreateUrl(e);
            a.isSidebarAjaxClick = !0,
            History.pushState({
                param: Shopify.queryParams
            }, r, r),
            a.sidebarGetContent(r)
        },
        sidebarGetContent: function(e) {
            $.ajax({
                type: "get",
                url: e,
                beforeSend: function() {
                    a.showLoading()
                },
                success: function(r) {
                    a.sidebarMapData(r),
                    a.sidebarMapTagEvents(),
                    a.sidebarMapClear(),
                    a.sidebarMapClearAll(),
                    a.hideLoading(),
                    a.initQuickView(),
                    a.initAddToCart(),
                    a.initAddToCarts(),
                    a.initWishlist(),
                    a.sidebarMapPaging(),
                    countDownIni(".flip-countdown");
                    var o = $(".shop_masonry");
                    o.length > 0 && (o.imagesLoaded(function() {
                        o.masonry({
                            itemSelector: ".ms-item",
                            columnWidth: ".ms-item",
                            percentPosition: !0
                        })
                    }),
                    a.initInfiniteScrolling())
                },
                error: function(r, o) {
                    a.hideLoading(),
                    t(".loading-modal").hide(),
                    t(".ajax-error-message").text($.parseJSON(r.responseText).description),
                    a.showModal(".ajax-error-modal")
                }
            })
        },
        sidebarParams: function() {
            if (Shopify.queryParams = {},
            location.search.length)
                for (var e, r = 0, o = location.search.substr(1).split("&"); r < o.length; r++)
                    e = o[r].split("="),
                    e.length > 1 && (Shopify.queryParams[decodeURIComponent(e[0])] = decodeURIComponent(e[1]))
        },
        initInfiniteScrolling: function() {
            var e = !1;
            t(".infinite-scrolling").length > 0 && t(".infinite-scrolling a.next").click(function(r) {
                r.preventDefault(),
                t(this).hasClass("disabled") || a.doInfiniteScrolling()
            })
        },
        doInfiniteScrolling: function() {
            var e = $(".col-main .products-grid-view");
            if (e) {
                var r = $(".infinite-scrolling a.next").first();
                $.ajax({
                    type: "GET",
                    url: r.attr("href"),
                    beforeSend: function() {
                        a.showLoading(),
                        $(".loading-modal").show(),
                        tt_is_loading = !0
                    },
                    success: function(o) {
                        a.hideLoading();
                        var n = $(".products-grid-view")
                          , s = $(o).find(".col-main .products-grid-view");
                        if (tt_is_loading = !1,
                        $(o).find(".infinite-scrolling").length > 0 ? r.attr("href", $(o).find(".infinite-scrolling a.next").attr("href")) : (r.removeClass("next"),
                        r.hide(),
                        r.next().show()),
                        s.length && (e.append(s.children()),
                        a.initQuickView(),
                        a.initAddToCart(),
                        a.initAddToCarts(),
                        a.initWishlist(),
                        countDownIni(".flip-countdown"),
                        localStorage.getItem("display") == "grid" ? jQuery("#grid-view").trigger("click") : jQuery("#list-view").trigger("click"),
                        window.show_multiple_currencies && window.shop_currency != jQuery(".currencies li.active .currencies-a").val() && Currency.convertAll(window.shop_currency, jQuery(".currencies li.active .currencies-a").val(), "span.money", "money_format"),
                        a.initColorSwatchGrid(),
                        $(".spr-badges").length > 0))
                            return window.SPR.registerCallbacks(),
                            window.SPR.initRatingHandler(),
                            window.SPR.initDomEls(),
                            window.SPR.loadProducts(),
                            window.SPR.loadBadges()
                    },
                    error: function(o, n) {
                        a.hideLoading(),
                        $(".loading-modal").hide(),
                        $(".ajax-error-message").text($.parseJSON(o.responseText).description),
                        a.showModal(".ajax-error-modal")
                    },
                    dataType: "html"
                })
            }
        }
    }
}
)(jQuery);
//# sourceMappingURL=/s/files/1/0088/1026/6724/t/2/assets/shop.js.map?v=110387567544861487141614941367
