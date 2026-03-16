const mentettlabelcsoport = document.querySelectorAll('.input-group');

mentettlabelcsoport.forEach(g => {
    const i = g.querySelector('input');

    i.addEventListener('focus', () => {
        g.classList.add("active");
    });

    i.addEventListener('blur', () => {
        if(i.value === ''){
            g.classList.remove('active');
        }
    });
});