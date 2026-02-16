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

/*const login = document.getElementById('loginbox');
const register = document.getElementById('registerbox');

const showRegister = document.getElementById('showRegister');
const showLogin = document.getElementById('showLogin');

showRegister.addEventListener('click', (e) => {
    e.preventDefault(); 
    login.style.display = 'none';
    register.style.display = 'block';
});

showLogin.addEventListener('click', (e) => {
    e.preventDefault();
    register.style.display = 'none';
    login.style.display = 'block';
});*/