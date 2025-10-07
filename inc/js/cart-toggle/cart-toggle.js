document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("cartToggle");
    const cartWrapper = document.getElementById("cartWrapper");

    console.log(toggleBtn, cartWrapper); // بررسی اینکه المنت پیدا می‌شود یا نه

    if (toggleBtn && cartWrapper) {
        toggleBtn.addEventListener("click", function (e) {
            e.preventDefault();
            console.log("clicked"); // بررسی اینکه handler اجرا می‌شود
            cartWrapper.classList.toggle("active");
        });
    }
});