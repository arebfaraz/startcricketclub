// Template Name: Cricket Pulse
// Template URL: https://techpedia.co.uk/template/cricket-pulse
// Description:  Cricket Pulse - Sports Club Html Template
// Version: 1.0.0

(function (window, document, $, undefined) {
    "use strict";
    var Init = {
        i: function (e) {
            Init.s();
            Init.methods();
        },
        s: function (e) {
            (this._window = $(window)),
                (this._document = $(document)),
                (this._body = $("body")),
                (this._html = $("html"));
        },
        methods: function (e) {
            Init.w();
            Init.BackToTop();
            Init.preloader();
            Init.hamburgerMenu();
            Init.videoPlay();
            Init.initializeSlick();
            Init.formValidation();
            Init.contactForm();
        },

        w: function (e) {
            this._window.on("load", Init.l).on("scroll", Init.res);
        },

        BackToTop: function () {
            var btn = $("#backto-top");
            $(window).on("scroll", function () {
                if ($(window).scrollTop() > 300) {
                    btn.addClass("show");
                } else {
                    btn.removeClass("show");
                }
            });
            btn.on("click", function (e) {
                e.preventDefault();
                $("html, body").animate(
                    {
                        scrollTop: 0,
                    },
                    "300"
                );
            });
        },

        preloader: function () {
            setTimeout(function () {
                $("#preloader").hide("slow");
            }, 2000);
        },

        hamburgerMenu: function () {
            if ($(".hamburger-menu").length) {
                $(".hamburger-menu").on("click", function () {
                    $(".bar").toggleClass("animate");
                    $(".mobile-navar").toggleClass("active");
                    return false;
                });
                $(".has-children").on("click", function () {
                    $(this).children("ul").slideToggle("slow", "swing");
                    $(".icon-arrow").toggleClass("open");
                });
            }
        },

        videoPlay: function () {
            var $videoSrc;
            $(".play-button").click(function () {
                $videoSrc = $(this).data("src");
                $("#video").attr("src", $videoSrc);
            });
            $(".btn-close").click(function () {
                $("#video").attr("src", " ");
            });
        },

        initializeSlick: function (e) {
            if ($(".result-slider").length) {
                $(".result-slider").slick({
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false,
                    // centerMode: true,
                    dots: true,
                    centerPadding: "60px",
                    cssEase: "linear",
                    autoplay: false,
                    autoplaySpeed: 2000,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 1,
                            },
                        },
                        {
                            breakpoint: 575,
                            settings: {
                                arrows: false,
                                slidesToShow: 1,
                            },
                        },
                    ],
                });
            }
            if ($(".team-slider").length) {
                $(".team-slider").slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                    centerMode: true,
                    centerPadding: "0",
                    autoplay: true,
                    autoplaySpeed: 2000,
                    responsive: [
                        {
                            breakpoint: 1399,
                            settings: {
                                slidesToShow: 3,
                            },
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                            },
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                            },
                        },
                    ],
                });
            }
            if ($(".brands-logo").length) {
                $(".brands-logo").slick({
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 4,
                            },
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                arrows: false,
                                slidesToShow: 3,
                            },
                        },
                        {
                            breakpoint: 490,
                            settings: {
                                arrows: false,
                                slidesToShow: 2,
                            },
                        },
                    ],
                });
            }

            if ($(".testimonials-slider").length) {
                $(".testimonials-slider").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                    autoplay: false,
                    autoplaySpeed: 2000,
                    vertical: true,
                    verticalSwiping: true,
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                vertical: false,
                                verticalSwiping: false,
                            },
                        },
                    ],
                });
            }
        },

        formValidation: function () {
            if ($(".form-validator").length) {
                $(".form-validator").validate();
            }
        },

        contactForm: function () {
            $(".contact-form").on("submit", function (e) {
                e.preventDefault();
                if ($(".contact-form").valid()) {
                    var _self = $(this);
                    _self
                        .closest("div")
                        .find('button[type="submit"]')
                        .attr("disabled", "disabled");
                    var data = $(this).serialize();
                    $.ajax({
                        url: "./assets/mail/contact.php",
                        type: "post",
                        dataType: "json",
                        data: data,
                        success: function (data) {
                            $(".contact-form").trigger("reset");
                            _self
                                .find('button[type="submit"]')
                                .removeAttr("disabled");
                            if (data.success) {
                                document.getElementById("message").innerHTML =
                                    "<h5 class='text-success mt-3 mb-2'>Email Sent Successfully</h5>";
                            } else {
                                document.getElementById("message").innerHTML =
                                    "<h5 class='text-danger mt-3 mb-2'>There is an error</h5>";
                            }
                            $("#message").show("slow");
                            $("#message").slideDown("slow");
                            setTimeout(function () {
                                $("#message").slideUp("hide");
                                $("#message").hide("slow");
                            }, 3000);
                        },
                    });
                } else {
                    return false;
                }
            });
        },
    };
    Init.i();
})(window, document, jQuery);
