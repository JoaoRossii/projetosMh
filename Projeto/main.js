
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

   