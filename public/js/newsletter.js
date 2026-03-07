const model = document.querySelector('.model');
const modelCloseBtn = document.querySelector('.model-close-btn');
const modelCloseOverlay = document.querySelector('.model-close-overlay');

if(model && modelCloseBtn && modelCloseOverlay){

    const modelCloseFunc = () => {
        model.classList.add('closed');
    };

    modelCloseOverlay.addEventListener('click', modelCloseFunc);
    modelCloseBtn.addEventListener('click', modelCloseFunc);
}


//Ha nem kell tényleges feliratkozás!
const newsletterForm = document.querySelector(".newsletter form");

newsletterForm.addEventListener("submit", (e) => {
    e.preventDefault();
    document.querySelector(".model").classList.add("closed");
    document.querySelector(".overlay").classList.remove("active");
});