import $ from "jquery";
import "./bootstrap";
import "slick-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

window.$ = window.jQuery = $;

// Concerts carousel - home
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

// Ticket selector - book.blade.php
function collectSelectedTickets() {
  const selected = [];
  document.querySelectorAll(".ticket-card").forEach((card) => {
    const section = card.dataset.ticketType;
    const price = parseInt(card.dataset.price);
    const quantity = parseInt(card.querySelector(".quantity").textContent);

    if (quantity > 0) {
      selected.push({ section, price, quantity });
    }
  });

  // Save to hidden input field
  document.getElementById("selected-tickets").value = JSON.stringify(selected);
}

function updateTotals() {
  const cards = document.querySelectorAll(".ticket-card");
  let total = 0;
  let totalQuantity = 0;

  cards.forEach((card) => {
    const price = parseInt(card.dataset.price);
    const quantity = parseInt(card.querySelector(".quantity").textContent);
    total += price * quantity;
    totalQuantity += quantity;
  });

  const formatIDR = (num) => "IDR " + num.toLocaleString("id-ID");

  document.getElementById("total").textContent = formatIDR(total);

  const priceSummary = document.getElementById("price-summary");
  const checkoutSection = document.getElementById("checkout-section");

  if (totalQuantity > 0) {
    priceSummary.classList.remove("hidden");
    priceSummary.classList.add("flex");
    checkoutSection.classList.remove("hidden");
    checkoutSection.classList.add("flex");
  } else {
    priceSummary.classList.add("hidden");
    priceSummary.classList.remove("flex");
    checkoutSection.classList.add("hidden");
    checkoutSection.classList.remove("flex");
  }
}

// Attach event listeners to buttons
document.querySelectorAll(".ticket-card").forEach((card) => {
  const incrementBtn = card.querySelector(".increment");
  const decrementBtn = card.querySelector(".decrement");
  const quantitySpan = card.querySelector(".quantity");

  incrementBtn.addEventListener("click", () => {
    let quantity = parseInt(quantitySpan.textContent);
    quantity++;
    quantitySpan.textContent = quantity;
    updateTotals();
  });

  decrementBtn.addEventListener("click", () => {
    let quantity = parseInt(quantitySpan.textContent);
    if (quantity > 0) quantity--;
    quantitySpan.textContent = quantity;
    updateTotals();
  });
});

document.getElementById("booking-form").addEventListener("submit", function (e) {
  collectSelectedTickets();
});

updateTotals();
