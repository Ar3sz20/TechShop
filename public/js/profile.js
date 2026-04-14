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

document.addEventListener('DOMContentLoaded', function () {

    const types = {
        Smartproduct: [
            { value: "Phone", text: "Telefonok" },
            { value: "Laptop", text: "Laptopok" }
        ],
        Gaming: [
            { value: "Console", text: "Konzolok" },
            { value: "HandholdConsole", text: "Kézi konzolok" },
            { value: "VR", text: "VR eszközök" },
            { value: "Controller", text: "Kontrollerek" }
        ],
        Components: [
            { value: "GPU", text: "Grafikus kártyák" },
            { value: "CPU", text: "Processzorok" },
            { value: "Storage", text: "Tárhelyek" },
            { value: "RAM", text: "Memória" }
        ],
        Accessories: [
            { value: "Mouse", text: "Egerek" },
            { value: "Keyboard", text: "Billentyűzetek" },
            { value: "Charger", text: "Töltők" },
            { value: "Webcam", text: "Web kamerák" },
            { value: "Mousepad", text: "Egérpadok" }
        ],
        Household: [
            { value: "Television", text: "Televíziók" },
            { value: "WashingMachine", text: "Mosógépek" },
            { value: "Refrigerator", text: "Hűtőszekrények" },
            { value: "Oven", text: "Sütők" },
            { value: "VacuumCleaner", text: "Porszívók" }
        ],
        Audio: [
            { value: "Headphone", text: "Fejhallgatók" },
            { value: "Earphone", text: "Fülhallgatók" },
            { value: "Speaker", text: "Hangszórók" }
        ]
    };

    const categorySelect = document.getElementById('category');
    const typeSelect = document.getElementById('type');

    if (!categorySelect || !typeSelect) return;

    categorySelect.addEventListener('change', function () {
        const selected = this.value;

        typeSelect.innerHTML = '<option value="">-- Válassz típust --</option>';

        if (types[selected]) {
            types[selected].forEach(type => {
                const option = document.createElement('option');
                option.value = type.value;
                option.textContent = type.text;
                typeSelect.appendChild(option);
            });
        }
    });

});