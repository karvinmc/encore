import $ from "jquery";
import "./bootstrap";
import "slick-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

window.$ = window.jQuery = $;

$(function () {
  $(".concert-cards").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    arrows: true,
    prevArrow:
      "<button type='button' class='prev absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-sky-600 hover:bg-sky-500 transition-colors text-white lg:text-2xl px-4 py-2 lg:px-5 rounded cursor-pointer'>‹</button>",
    nextArrow:
      "<button type='button' class='next absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-sky-600 hover:bg-sky-500 transition-colors text-white lg:text-2xl px-4 py-2 lg:px-5 rounded cursor-pointer'>›</button>",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});
