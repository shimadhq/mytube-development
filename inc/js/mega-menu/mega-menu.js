document.addEventListener("DOMContentLoaded", function() {
  const columns = document.querySelectorAll('.subcategory-column');

  columns.forEach(column => {
    const subcat = column.dataset.subcat;
    if (!subcat) return;

    const submenu = document.querySelector(`.submenu-level[data-subcat="${subcat}"]`);
    if (!submenu) return;

    // تابع ساده برای نمایش/پنهان کردن
    const toggleSubmenu = (show) => {
      if (show) {
        submenu.classList.add('active');
      } else {
        submenu.classList.remove('active');
      }
    };

    // وقتی موس روی ستون یا روی خود submenu است
    const enterHandler = () => toggleSubmenu(true);

    const leaveHandler = (event) => {
      // بررسی می‌کنیم که موس نه روی ستون و نه روی submenu باشد
      const related = event.relatedTarget;
      if (!column.contains(related) && !submenu.contains(related)) {
        toggleSubmenu(false);
      }
    };

    // رویدادها برای ستون
    column.addEventListener('mouseenter', enterHandler);
    column.addEventListener('mouseleave', leaveHandler);

    // رویدادها برای submenu
    submenu.addEventListener('mouseenter', enterHandler);
    submenu.addEventListener('mouseleave', leaveHandler);
  });
});
