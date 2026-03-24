const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.select');
    const nyilacska = dropdown.querySelector('.nyilacska');
    const menu = dropdown.querySelector('.menu');
    const options = dropdown.querySelectorAll('.menu li');
    const selected = dropdown.querySelector('.selected');


    select.addEventListener('click', () => {
        select.classList.toggle('select-clicked');
        nyilacska.classList.toggle('nyilacska-rotate');
        menu.classList.toggle('menu-open');
    });

    options.forEach(option =>{
        option.addEventListener('click', ()=>{
            selected.innerText = option.innerText;
            select.classList.remove('select-cliked');
            nyilacska.classList.remove('nyilacska-rotate');
            menu.classList.remove('menu-open');

            options.forEach(option => {
                option.classList.remove('active');
            });
            option.classList.add('active');
        });
    });
});

const mobilscroll = document.querySelector('.mobilscroll');
const navRight = document.querySelector('.nav-right');

mobilscroll.addEventListener('click', () => {
    mobilscroll.classList.toggle('active');
    navRight.classList.toggle('active');
});