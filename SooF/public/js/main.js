const carousel = document.querySelector("[data-target='carousel']");
const cards = carousel.querySelectorAll("[data-target='card']");
const leftButton = document.querySelector("[data-action='slideLeft']");
const rightButton = document.querySelector("[data-action='slideRight']");

const carouselWidth = carousel.offsetWidth;
const cardStyle = window.getComputedStyle(cards[0]); // Get the style of the first card
const cardMarginRight = Number(cardStyle.marginRight.match(/\d+/)[0]);
const cardWidth = cards[0].offsetWidth + cardMarginRight; // Width of a card including margin
const visibleCards = Math.floor(carouselWidth / cardWidth); // Number of fully visible cards

const cardCount = cards.length;
let offset = 0;
const maxX = -((cardCount - visibleCards) * cardWidth);

leftButton.addEventListener("click", function () {
  if (offset !== 0) {
    offset += cardWidth;
    carousel.style.transform = `translateX(${offset}px)`;
  }
});

rightButton.addEventListener("click", function () {
  if (offset !== maxX) {
    offset -= cardWidth;
    carousel.style.transform = `translateX(${offset}px)`;
  }
});