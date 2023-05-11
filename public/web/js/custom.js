// Aos
// AOS.init();

setTimeout(() => {
  $(".loading").fadeOut(1000);
}, 2000);

window.onload = function () {
  setTimeout(() => {
    $(".header-pages").addClass("active");
  }, 300);
};

lightGallery(document.getElementById("lightgallery"), {
  thumbnail: true,
  selector: ".image-item",
});

$(".click-dropdown-mune").click(function (e1) {
  e1.preventDefault();
  $(".dropdowm-language-mune").slideToggle();
});

$(".language p").click(function (e1) {
  e1.preventDefault();
  $(".dropdowm-language").slideToggle();
});

$(".click-element-mune").click(function (e) {
  e.preventDefault();
  $(this).next().slideToggle();
  $(".click-element1").next().slideUp();
});


//silder-index
if ($("#slider-1").length) {
  $("#slider-1").owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    items: 1,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
    rtl: true,
    autoplay: true,
    dots: true,
    dotsData: true,
    smartSpeed: 2000,
    responsiveClass: true,
    responsive: {
      1400: {
        item: 1,
      },
    },
  });
}
//silder-index
if ($("#slider-article").length) {
  $("#slider-article").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    items: 1,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
    rtl: true,
    autoplay: false,
    dots: true,
    smartSpeed: 2000,
    responsiveClass: true,
    responsive: {
      1400: {
        item: 1,
      },
    },
  });
}
//silder-index
if ($("#slider-advice").length) {
  $("#slider-advice").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    items: 1,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
    rtl: true,
    autoplay: false,
    dots: true,
    smartSpeed: 2000,
    responsiveClass: true,
    responsive: {
      1400: {
        item: 1,
      },
    },
  });
}

//silder-categories
if ($("#slider-categories").length) {
  $("#slider-categories").owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    items: 2,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    rtl: true,
    autoplay: true,
    dots: false,
    smartSpeed: 2000,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 2,
      },
    },
  });
}

//silder-departments
if ($("#slider-clinet").length) {
  $("#slider-clinet").owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    items: 4,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    rtl: true,
    autoplay: true,
    dots: false,
    smartSpeed: 2500,

    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 4,
      },
    },
  });
}

$(".remove_mune").click(function () {
  $("#menu-div").removeClass("active");
  $(".bg_menu").removeClass("active");
});

$(".remove_mune1").click(function () {
  $("#menu-div1").removeClass("active");
  $(".bg_menu1").removeClass("active");
});

function open() {
  $(".navicon").addClass("is-active");
//   $("#menu-div").addClass("active");
//   $("#times-ican").addClass("active");.
  $(".bg_menu1").addClass("active");
  $("#menu-div1").addClass("active");
//   $(".bg_menu").addClass("active");
  // $(".bg_menu1").addClass("active");
}

function close() {
  $(".navicon").removeClass("is-active");
  $("#menu-div").removeClass("active");
  $("#menu-div1").removeClass("active");
  $("#times-ican").removeClass("active");
  $(".bg_menu").removeClass("active");
  $(".bg_menu1").removeClass("active");
  $(".dropdowm-language").slideUp();
  $(".dropdowm-language-mune").slideUp();
  $(".dropdowm-element").slideUp();
  $(".dropdowm-element-mune").slideUp();

  $(".remove-mune").click(function () {
    $("#menu-div").removeClass("active");
    $(".bg_menu").removeClass("active");
    $(".times-ican").removeClass("active");
  });

}

$("#times-ican").click(function () {
  if ($(this).hasClass("active")) {
    close();
  } else {
    open();
  }
});

$(".remove-mune").click(function () {
  $("#menu-div").removeClass("active");
  $(".bg_menu").removeClass("active");
  $(".times-ican").removeClass("active");
  $(".navicon").removeClass("is-active");
});

$(".remove-mune1").click(function () {
  $("#menu-div1").removeClass("active");
  $(".bg_menu1").removeClass("active");
  $(".navicon").removeClass("is-active");
});

$("#menu-e").click(function(e){
  e.preventDefault();
  $(".bg_menu1").addClass("active");
  $("#menu-div1").addClass("active");

})

$("#menu-div a").click(function () {
  e.preventDefault();

});

var $winl = $(window); // or $box parent container
var $boxl = $(
  "#menu-div, #times-ican , .click-dropdown , #menu-e , .menu , .dropdowm-language ,.click-element , .language p ,.dropdowm-element , .click-element1  , .click-element1-mune , .click-element-mune , .dropdowm-element-mune"
);
$winl.on("click.Bst", function (event) {
  if (
    $boxl.has(event.target).length === 0 && //checks if descendants of $box was clicked
    !$boxl.is(event.target) //checks if the $box itself was clicked
  ) {
    close();
  }
});

// upload file ==============

$("#upload-file").change(function (e) {
    $("#file-text").text(e.target.files[0].name);
});

if ($("#btn-show").length) {
  let btnClick = document.querySelector("#btn-show"),
    formOrder = document.querySelector(".order-services"),
    textBtn = document.querySelector("#btn-show div");
  btnClick.addEventListener("click", function () {
    if (btnClick.classList.contains("active")) {
      btnClick.classList.remove("active");
      formOrder.classList.remove("active");
      textBtn.textContent = "طلب الخدمة  ";
    } else {
      btnClick.classList.add("active");
      formOrder.classList.add("active");
      textBtn.textContent = "إلغاء طلب الخدمة ";
    }
  });
}

$(".click-dropdown").click(function (e) {
  e.preventDefault();
  $(".dropdowm-language").slideToggle();
});

$(function () {
  var header = $("header");
  var headers = $(".top-par").offset().top;
  var menu = $(".top-par");
  var hieghtThreshold = $("#app").offset().top;
  var hieghtThreshold_end = $("#app").offset().top + $("#app").height();

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll > (headers * 1) / 2) {
      header.removeClass("active");
    } else {
      header.addClass("active");
    }
    if (scroll >= hieghtThreshold && scroll <= hieghtThreshold_end) {
      menu.addClass("active");
    } else {
      menu.removeClass("active");
    }
  });
});

// counter

if ($(".counter").length) {
  var a = 0;
  $(window).scroll(function () {
    var oTop = $(".counter-box").offset().top - window.innerHeight;
    if (a == 0 && $(window).scrollTop() > oTop) {
      $(".counter").each(function () {
        var $this = $(this),
          countTo = $this.attr("data-number");
        $({
          countNum: $this.text(),
        }).animate(
          {
            countNum: countTo,
          },

          {
            duration: 2550,
            easing: "swing",
            step: function () {
              //$this.text(Math.ceil(this.countNum));
              $this.text(Math.ceil(this.countNum).toLocaleString("en"));
            },
            complete: function () {
              $this.text(Math.ceil(this.countNum).toLocaleString("en"));
              //alert('finished');
            },
          }
        );
      });
      a = 1;
    }
  });

  const animationDuration = 4000;

  const frameDuration = 1000 / 60;

  const totalFrames = Math.round(animationDuration / frameDuration);

  const easeOutQuad = (t) => t * (2 - t);

  const animateCountUp = (el) => {
    let frame = 0;
    const countTo = parseInt(el.innerHTML, 10);

    const counter = setInterval(() => {
      frame++;

      const progress = easeOutQuad(frame / totalFrames);

      const currentCount = Math.round(countTo * progress);

      if (parseInt(el.innerHTML, 10) !== currentCount) {
        el.innerHTML = currentCount;
      }

      if (frame === totalFrames) {
        clearInterval(counter);
      }
    }, frameDuration);
  };

  const countupEls = document.querySelectorAll(".timer");
  countupEls.forEach(animateCountUp);

  $(".animated-progress span").each(function () {
    $(this).animate(
      {
        width: $(this).attr("data-progress") + "%",
      },
      2100
    );
    $(this).text($(this).attr("data-progress") + "%");
  });
}
// ----------------------
