let track = document.querySelector('.slider-track');
let slides = document.querySelectorAll('.slider-item');

let current = 0;

let nextBtn = document.querySelector('.slider-btn.next');
let prevBtn = document.querySelector('.slider-btn.prev');

function showSlide() {
    track.style.transform = 'translateX(-' + (current * 100) + '%)';
}

nextBtn.addEventListener('click', function() {
    current++;
    if (current >= slides.length) current = 0; 
    showSlide();
});

prevBtn.addEventListener('click', function() {
    current--;
    if (current < 0) current = slides.length - 1;
    showSlide();
});