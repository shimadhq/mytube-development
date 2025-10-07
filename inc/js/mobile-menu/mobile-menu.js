document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("mobileMenuToggle");
    const mobileMenu = document.getElementById("mobileMenu");

    // باز/بسته کردن کل منوی موبایل
    if (toggleBtn && mobileMenu) {
        toggleBtn.addEventListener("click", function (e) {
            e.preventDefault();
            mobileMenu.classList.toggle("active");
        });
    }

    // اکاردئون زیرمنوها
    if (mobileMenu) {
        mobileMenu.querySelectorAll('.menu-item-has-children > .menu-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // جلوگیری از باز شدن لینک

                const li = link.closest('li.menu-item-has-children');
                if (!li) return;

                // اگر میخوای فقط یک زیرمنو همزمان باز باشه:
                // mobileMenu.querySelectorAll('li.menu-item-has-children.open').forEach(openLi => {
                //     if (openLi !== li) openLi.classList.remove('open');
                // });

                li.classList.toggle('open'); // باز/بسته کردن زیرمنو
            });
        });
    }
});
