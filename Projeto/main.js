
        const body = document.querySelector("body");

const nightModeToggle = document.querySelector('.night');


nightModeToggle.addEventListener('click', () => {
    body.classList.toggle('dark');


    localStorage.setItem('nightMode', body.classList.contains('dark') ? 'true' : 'false');
});

const nightMode = localStorage.getItem('nightMode');

if (nightMode === 'true') {
    body.classList.add('dark');
};

    let slideIndex = 0;

    function showSlide(index) {
        const slides = document.querySelectorAll('.carousel-item');
        if (index >= slides.length) {
            slideIndex = 0;
        } else if (index < 0) {
            slideIndex = slides.length - 1;
        }
        const offset = -slideIndex * 100;
        document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
    }

    function nextSlide() {
        slideIndex++;
        showSlide(slideIndex);
    }

    function prevSlide() {
        slideIndex--;
        showSlide(slideIndex);
    }

    setInterval(nextSlide, 3000); 


 
   