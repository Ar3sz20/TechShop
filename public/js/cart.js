document.addEventListener("DOMContentLoaded", function () {
    const openBtn = document.getElementById("openCheckout");
    const modal = document.getElementById("checkoutModal");
    const closeBtn = document.getElementById("closeCheckout");

    openBtn?.addEventListener("click", () => {
        modal.style.display = "flex";
    });

    closeBtn?.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
});