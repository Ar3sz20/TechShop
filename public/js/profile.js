document.addEventListener('DOMContentLoaded', () => {
    const menuLinks = document.querySelectorAll('.profile-menu-link[data-section]');
    const sections = document.querySelectorAll('.account-section');

    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            const target = link.dataset.section;

            sections.forEach(sec => sec.style.display = 'none');
            const activeSection = document.getElementById(target);
            if(activeSection) activeSection.style.display = 'block';

            menuLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const alert = document.getElementById("success-alert");

    if (alert) {
        setTimeout(() => {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = "0";

            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 3000);
    }
});