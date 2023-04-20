  //loading
  $(window).on("load", function () {
    $(".loading").addClass("active");

    setTimeout(() => {
      $(".loading").fadeOut("slow")
    }, 500);

    const scroll = new LocomotiveScroll({
      el: document.querySelector('[data-scroll-container]'),
      smooth: true,
      reloadOnContextChange: true,
      getDirection: true,
      smartphone: {
        smooth: true,
      },
      tablet: {
        smooth: true,
      },
    });
    $(".main-menu").on("click", function () {
      scroll.start();
    });

    $(".open-menu-icon").on("click", function () {
      scroll.stop();
    });
    $(".close-menu-icon").on("click", function () {
      scroll.start();
    });

  });

  $('.main-slider-content').slick({
    dots: false,
    autoplay: false,
    autoplaySpeed: 5000,
    infinite: true,
    rtl: ($("html").attr("dir")) == "rtl" ? true : false,
  });

  // Wrap every letter in a span
  var textWrapper = document.querySelector('.loader-text');
  textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span>$&</span>");

  anime.timeline({
      loop: true
    })
    .add({
      targets: '.loader-text span',
      translateX: [40, 0],
      translateZ: 0,
      opacity: [0, 1],
      easing: "easeOutExpo",
      duration: 1000,
      color: '#4d4d4f',
      delay: (el, i) => 500 + 50 * i
    }).add({
      targets: '.loader-text span',
      translateX: [0, -30],
      opacity: [1, 0],
      easing: "easeInExpo",
      duration: 1000,
      color: '#009ADE',
      delay: (el, i) => 200 + 50 * i
    });