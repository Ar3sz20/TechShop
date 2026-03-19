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


// Newsletter feliratkozás
const newsletterForm = document.querySelector(".newsletter form");

if (newsletterForm) {
    newsletterForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const csrf = document.querySelector('meta[name="csrf-token"]').content;
        const formData = new FormData(newsletterForm);

        try {
            const response = await fetch("/newsletter", {
                method: "POST",
                headers: { "X-CSRF-TOKEN": csrf },
                body: formData
            });

            if (response.ok) {
                document.querySelector(".model").classList.add("closed");
                localStorage.setItem("modalClosed", "true");
                document.querySelector(".overlay").classList.remove("active");
                newsletterForm.reset();
            } else {
                const text = await response.text();
                console.error("Server hiba:", text);
            }

        } catch (error) {
            console.error("Fetch hiba:", error);
        }
    });
}