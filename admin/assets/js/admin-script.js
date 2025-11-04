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
    // دکمه انتخاب تصویر
    $('.upload-logo-button').on('click', function (e) {
        e.preventDefault();

        const button = $(this);
        const targetInput = $(button.data('target'));

        // اگر مدیا قبلاً باز شده، همون رو دوباره استفاده می‌کنیم
        let file_frame = wp.media({
            title: 'انتخاب تصویر لوگو',
            button: {
                text: 'استفاده از این تصویر'
            },
            multiple: false
        });

        file_frame.on('select', function () {
            let attachment = file_frame.state().get('selection').first().toJSON();
            targetInput.val(attachment.url); // آدرس فایل در input قرار می‌گیره
        });

        file_frame.open();
    });
});

