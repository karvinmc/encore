import $ from "jquery";
import "./bootstrap";
import "slick-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

window.$ = window.jQuery = $;

// Concerts carousel
$(".concerts-card").slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3,
});
