// document.addEventListener('DOMContentLoaded', function () {
//     const carousel = document.querySelector('#card-carousel .container .row .col-12');
//     const cards = document.querySelectorAll('.card-carousel');
//     const leftArrow = document.querySelector('.button-arrow-left');
//     const rightArrow = document.querySelector('.button-arrow-right');

//     let currentIndex = 0;

//     function updateCarousel() {
//         const cardWidth = cards[0].offsetWidth + 10; // Menghitung margin (me-2)
//         carousel.style.transform = `translateX(${-currentIndex * cardWidth}px)`;
//     }

//     function moveToNext() {
//         currentIndex = (currentIndex + 1) % cards.length;
//         updateCarousel();
//     }

//     function moveToPrev() {
//         currentIndex = (currentIndex === 0) ? cards.length - 1 : currentIndex - 1;
//         updateCarousel();
//     }

//     leftArrow.addEventListener('click', moveToPrev);
//     rightArrow.addEventListener('click', moveToNext);

//     // Initial update
//     updateCarousel();
// });
