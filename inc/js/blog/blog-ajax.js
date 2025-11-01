document.addEventListener("DOMContentLoaded", function() {
  const container = document.querySelector("#blog-posts-section");
  if (!container) return;

  const ajaxUrl = container.dataset.ajaxUrl;
  const sortItems = document.querySelectorAll(".sort-item");
  const postsContainer = document.querySelector("#blog-posts");

  sortItems.forEach(item => {
    item.addEventListener("click", function() {
      sortItems.forEach(i => i.classList.remove("active"));
      this.classList.add("active");

      const sortType = this.dataset.sort;
      postsContainer.innerHTML = '<div class="loading">در حال بارگذاری...</div>';

      fetch(ajaxUrl, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
          action: "mytube_sort_posts",
          sort: sortType
        })
      })
      .then(res => res.text())
      .then(data => postsContainer.innerHTML = data)
      .catch(err => {
        console.error(err);
        postsContainer.innerHTML = "<p>خطا در دریافت داده‌ها.</p>";
      });
    });
  });
});
