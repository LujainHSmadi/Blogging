/**************************** real state slider*************************************/
$(function () {
    $("#aniimated-thumbnials").lightGallery({
        thumbnail: true,
    });
    // Card's slider
    var $carousel = $(".slider-for");

    $carousel.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        adaptiveHeight: true,
        asNavFor: ".slider-nav",
    });
    $(".slider-nav").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: ".slider-for",
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        variableWidth: true,
    });
});
/**************************** testamonial home slider*************************************/

$(document).ready(function () {
    $("#mainSlider").lightSlider({
        item: 1,
        loop: false,
        slideMove: 1,
        easing: "cubic-bezier(0.25, 0, 0.25, 1)",
        speed: 600,
        pager: false,
        control: true,
        auto: true,
        prevHtml: '<i class="fa-solid fa-angle-left"></i>',
        nextHtml: '<i class="fa-solid fa-angle-right"></i>',
    });
    $(".testemonialSlider").lightSlider({
        item: 1,
    });

    $(".topBottom svg").click(function () {
        $(this).toggleClass("show");
    });
});

$(document).ready(function () {
    $(".checkboxTab label").click(function () {
        $(".checkboxTab label").removeClass("show");
        $(this).addClass("show");
    });
});

// $(function () {
//     $("#slider").slick({
//         autoplay: true,
//         speed: 1000,
//         arrows: false,
//         dots:true,
//         asNavFor: "#thumbnail_slider",
//     });
//     $("#thumbnail_slider").slick({
//         slidesToShow: 3,
//         speed: 1000,
//         asNavFor: "#slider",
//     });
// });

jQuery(function () {
    jQuery("#slider").slick({
        autoplay: true,
        speed: 1000,
        arrows: false,
        asNavFor: "#thumbnail_slider",
    });
    jQuery("#thumbnail_slider").slick({
        slidesToShow: 3,
        speed: 1000,
        asNavFor: "#slider",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 760,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });
});

// adding class active for account sidbar links
jQuery(function ($) {
    var path = window.location.href;
    // because the 'href' property of the DOM element is the absolute path
    jQuery(".userMenu ul li a").each(function () {
        if (this.href === path) {
            jQuery(this).addClass("active");
        }
    });
});

jQuery(".counter").each(function () {
    jQuery(this)
        .prop("Counter", 0)
        .animate(
            {
                Counter: jQuery(this).attr("data-target"),
            },
            {
                //chnage count up speed here
                duration: 4000,
                easing: "swing",
                step: function (now) {
                    jQuery(this).text(Math.ceil(now));
                },
            }
        );
});
