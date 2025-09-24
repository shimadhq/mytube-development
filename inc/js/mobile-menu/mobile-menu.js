document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("mobileMenuToggle");
    const mobileMenu = document.getElementById("mobileMenu");

    toggleBtn.addEventListener("click", function (e) {
        e.preventDefault();
        mobileMenu.classList.toggle("active");
    });
});