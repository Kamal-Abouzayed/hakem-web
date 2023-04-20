$(function () {
  $(".pagin-div").slice(0, 4).show();
  var show_divs = $(".pagin-div");
  if (show_divs.length < 5) {
      $(".more-btn").fadeOut();
  } else {
      $(".more-btn").fadeIn();
  }

  $(".more-btn button").on('click', function () {
      $(".pagin-div:hidden").slice(0, 2).slideDown();
      var hidden_divs = $(".grid-item:hidden");
      if (hidden_divs.length == 0) {
          $(".more-btn").fadeOut();
      }
      $('html,body').animate({
          scrollTop: $(this).offset().top
      }, 1500);
  });
});

  //works
  $('.works-slider').slick({
    dots: true,
    lazyLoad: 'progressive',
    arrows: false,
    autoplay: true,
    infinite: false,
    rtl: ($("html").attr("dir")) == "rtl" ? true : false,

  });


  $('.works-slider-details').slick({
    dots: true,
    lazyLoad: 'progressive',
    arrows: false,
    autoplay: true,
    infinite: false,
    rtl: ($("html").attr("dir")) == "rtl" ? true : false,
    slidesToShow: 3,
    responsive: [{
        breakpoint: 1400,
        settings: {
          slidesToShow: 2.5,
        }
      },

      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        }
      },
      {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
      }
    }]


  });


  $('.works-similar').slick({
    dots: false,
    lazyLoad: 'progressive',
    arrows: false,
    autoplay: true,
    infinite: false,
    rtl: ($("html").attr("dir")) == "rtl" ? true : false,
    slidesToShow:5,
    responsive: [{
        breakpoint: 1400,
        settings: {
          slidesToShow:4,
        }
      },

      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
        }
      },

      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        }
      },
      {
      breakpoint: 576,
      settings: {
        slidesToShow: 3,
      }
    },
    {
        breakpoint: 430,
        settings: {
          slidesToShow: 2,
        }
      }]


  });


  $('.works-services').slick({
    dots: true,
    lazyLoad: 'progressive',
    arrows: false,
    autoplay: true,
    infinite: true,
    rtl: ($("html").attr("dir")) == "rtl" ? true : false,
    slidesToShow: 4,
    centerMode: true,
    centerPadding :0,
    autoplaySpeed:1000,
    responsive: [{
        breakpoint: 1400,
        settings: {
          slidesToShow: 4,
        }
      },

      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
        }
      },
      {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
      }
    },
      {
        breakpoint: 450,
        settings: {
          slidesToShow: 1,
          infinite: false,

        }

    }]


  });

  $('.works-details-pg,.works-pg ').lightGallery({
    selector: '.main-works-img',
    thumbnail: false,
    animateThumb: false,
    showThumbByDefault: false,
    hideControlOnEnd: true,
    loop: false,
    slideEndAnimatoin: false,
    download: false,
    flipVertical: false,
    flipHorizontal: false,
    rotate: false,
    actualSize: false,
    share: false,
  });

