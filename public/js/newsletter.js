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

        const emailInput = newsletterForm.querySelector("input[name='email']");
        const email = emailInput.value;

        const csrf = document.querySelector('meta[name="csrf-token"]').content;

        try {

            const response = await fetch("/newsletter", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf,
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    email: email
                })
            });

            if (response.ok) {

                document.querySelector(".model").classList.add("closed");
                localStorage.setItem("modalClosed", "true");
                document.querySelector(".overlay").classList.remove("active");

                emailInput.value = "";
            }

        } catch (error) {
            console.error("Hiba történt:", error);
        }

    });

}