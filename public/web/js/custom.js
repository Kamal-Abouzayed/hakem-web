$(window).on("load", function () {
    $("body").removeClass("no-trans");
});

//menu
$(".open-menu-icon").on("click", function () {
    $(".main-menu").toggleClass("open");
    $("html, body").toggleClass("open-menu");
});

$(".close-menu-icon,.responsive-menu a[href*='#']:not([href='#'])").on("click", function () {
    $(".main-menu").removeClass("open");
    $("html, body").removeClass("open-menu");
});
$(function () {
    var $wins = $(window); // or $box parent container
    var $boxs = $(".inner-main-menu,.open-menu-icon");
    $wins.on("click.Bst", function (event) {
        if (
            $boxs.has(event.target).length === 0 && //checks if descendants of $box was clicked
            !$boxs.is(event.target) //checks if the $box itself was clicked
        ) {
            $(".main-menu").removeClass("open");
            $("html, body").removeClass("open-menu");

        }
    });
});


//tooltip
tippy('.tooltip-link', {
    arrow: true,
    placement: 'bottom',

});

