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

const forgotBtn = document.getElementById("forgotBtn");
const modal = document.getElementById("forgotModal");
const closeBtn = document.getElementById("closeForgot");

const sendBtn = document.getElementById("sendForgot");
const emailInput = document.getElementById("forgotEmail");
const msg = document.getElementById("forgotMsg");

forgotBtn.addEventListener("click", () => {
    modal.style.display = "flex";
});

closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
    msg.innerText = "";
    emailInput.value = "";
});

window.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
    }
});

sendBtn.addEventListener("click", () => {
    if (!emailInput.value) {
        msg.style.color = "red";
        msg.innerText = "Adj meg egy email címet!";
        return;
    }

    msg.style.color = "green";
    msg.innerText = "Elküldtük a jelszó visszaállító linket a megadott email címre";

    setTimeout(() => {
        modal.style.display = "none";
        emailInput.value = "";
        msg.innerText = "";
    }, 3500);
});