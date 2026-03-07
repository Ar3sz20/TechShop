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