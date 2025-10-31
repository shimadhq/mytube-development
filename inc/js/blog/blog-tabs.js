document.querySelectorAll('.blog-tabs li').forEach(tab => {
  tab.addEventListener('click', () => {
    document.querySelectorAll('.blog-tabs li').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');

    const category = tab.dataset.cat;
    fetch(`${mytube_ajax.ajax_url}?action=filter_blog_posts&cat=${category}`)
      .then(res => res.text())
      .then(html => {
        document.getElementById('blog-posts').innerHTML = html;
      });
  });
});