AOS.init({
    duration: 700,
    offset: ($(window).height() * .25),

});


$(function () {
    $("body,.table-responsive .table").niceScroll({
        cursorcolor: "#000", // change cursor color in hex
        scrollspeed: 200, // scrolling speed
        cursorwidth: "7px", // cursor width in pixel (you can also write "5px")
        cursorborder: "none", // css definition for cursor border
        cursorborderradius: "10px", // border radius in pixel for cursor
        cursoropacitymax: .5, // change opacity when cursor is active (scrollabar "visible" state), range from 1 to 0
        mousescrollstep: 50, // scrolling speed with mouse wheel (pixel)
        zindex: 999,
        touchbehavior: true, // DEPRECATED!! use "emulatetouch"
        emulatetouch: true, // enable cursor-drag scrolling like touch devices in desktop computer

    });

    $('.nav-item').click(function () {
        setTimeout(() => {
            $("body").getNiceScroll().resize();
        }, 1000);
    });
    
});



$('.big-menu a[href*="#"]:not([href="#"]),.responsive-menu a[href*="#"]:not([href="#"])').click(function () {
    var target = $(this.hash);
    $('html,body').stop().animate({
        scrollTop: target.offset().top - 100
    }, 1100);
});
if (location.hash) {
    var id = $(location.hash);
}
// $(window).load(function () {
//     if (location.hash) {
//         $('html,body').animate({
//             scrollTop: id.offset().top - 100
//         }, 600)
//     };
// });