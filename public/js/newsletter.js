const model = document.querySelector('.model');
const modelCloseBtn = document.querySelector('.model-close-btn');
const modelCloseOverlay = document.querySelector('.model-close-overlay');

if (localStorage.getItem("modalClosed") === "true") {
    if (model) model.classList.add("closed");
}

if (model && modelCloseBtn && modelCloseOverlay) {

    const modelCloseFunc = () => {
        model.classList.add('closed');
        localStorage.setItem("modalClosed", "true");

    };

    modelCloseOverlay.addEventListener('click', modelCloseFunc);
    modelCloseBtn.addEventListener('click', modelCloseFunc);
}


//Ha nem kell tényleges feliratkozás!
const newsletterForm = document.querySelector(".newsletter form");

if (newsletterForm) {
    newsletterForm.addEventListener("submit", (e) => {
        e.preventDefault();
        document.querySelector(".model").classList.add("closed");
        localStorage.setItem("modalClosed", "true");
        document.querySelector(".overlay").classList.remove("active");

    })
};