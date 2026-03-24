let track = document.querySelector('.slider-track');
let slides = document.querySelectorAll('.slider-item');

let current = 0;

let nextBtn = document.querySelector('.slider-btn.next');
let prevBtn = document.querySelector('.slider-btn.prev');

// Csak akkor fut, ha az oldal tartalmaz slidert (nem minden oldalon van)
if (track && nextBtn && prevBtn && slides.length > 0) {
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
}