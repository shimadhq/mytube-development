jQuery(document).ready(function($) {
  const firstItem = $('.category-item').first();
  firstItem.addClass('active');
  const defaultCatID = firstItem.data('cat');


  $('.category-item').on('click', function() {
    const catID = $(this).data('cat');

    $('.category-item').removeClass('active');
    $(this).addClass('active');

    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'filter_single_category_posts',
        cat_id: catID
      },
      beforeSend: function() {
        $('#single-blog-posts-wrapper').html('<p>در حال بارگذاری...</p>');
      },
      success: function(response) {
        $('#single-blog-posts-wrapper').html(response);
      }
    });
  });
});