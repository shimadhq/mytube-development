jQuery(document).ready(function($){
    // باز/بسته کردن زیرمنو
    $('.mytube-tabs-vertical .has-submenu').click(function(e){
        e.preventDefault();
        $(this).children('.submenu').slideToggle(); // باز/بسته شدن زیرمنو
        $(this).toggleClass('open'); // اضافه کردن کلاس برای فلش
    });

    // نمایش محتوای زیرمنو
    $('.mytube-tabs-vertical .submenu li').click(function(e){
        e.stopPropagation(); // جلوگیری از کلیک روی parent
        var subtabId = $(this).data('subtab');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        $(this).closest('.mytube-tab-content').find('.subtab-content').hide();
        $('#' + subtabId).show();
    });

    // تغییر تب اصلی
    $('.mytube-tabs-vertical li[data-tab]').click(function(){
        var tabId = $(this).data('tab');

        $('.mytube-tabs-vertical li').removeClass('active');
        $(this).addClass('active');

        $('.mytube-tab-content').removeClass('active').hide();
        $('#' + tabId).addClass('active').show();
    });
});

jQuery(document).ready(function ($) {
    var mediaUploader;

    $('.upload-logo-button').on('click', function (e) {
        e.preventDefault();
        var targetInput = $($(this).data('target'));

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        // Creating upload
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'انتخاب یا آپلود تصویر لوگو',
            button: {
                text: 'استفاده از این تصویر'
            },
            multiple: false
        });

        // When an image has been chosen
        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            targetInput.val(attachment.url);
        });

        mediaUploader.open();
    });
});

