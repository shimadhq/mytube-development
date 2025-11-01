document.addEventListener('DOMContentLoaded', () => {
  const tabsContainer = document.querySelector('.single-blog-tabs');
  const postsContainer = document.getElementById('blog-posts');

  if (!tabsContainer) return;

  tabsContainer.addEventListener('click', (e) => {
    const tab = e.target.closest('li.blog-tab');
    if (!tab) return;

    // حذف active از همه تب‌ها
    tabsContainer.querySelectorAll('li.blog-tab').forEach(t => t.classList.remove('active'));

    // اضافه کردن active به تب انتخاب‌شده
    tab.classList.add('active');

    // گرفتن ID دسته
    const category = tab.dataset.cat;

    // ارسال درخواست AJAX به وردپرس
    fetch(`${mytube_ajax.ajax_url}?action=filter_blog_posts&cat=${category}`)
      .then(res => res.text())
      .then(html => {
        postsContainer.innerHTML = html;
      })
      .catch(err => console.error('خطا در دریافت پست‌ها:', err));
  });
});