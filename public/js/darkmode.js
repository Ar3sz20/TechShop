const toggleBtn = document.getElementById("theme-toggle");

const sunIcon = '<span class="material-icons">light_mode</span>';
const moonIcon = '<span class="material-icons">dark_mode</span>';

if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark-mode");
    toggleBtn.innerHTML = sunIcon;
} else {
    toggleBtn.innerHTML = moonIcon;
}

toggleBtn.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
        toggleBtn.innerHTML = sunIcon;
    } else {
        localStorage.setItem("theme", "light");
        toggleBtn.innerHTML = moonIcon;
    }
});