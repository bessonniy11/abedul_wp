<?php


function website_assets()
{
    wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/layout/static/css/swiper-bundle.min.css');
    wp_enqueue_style('intlTelInput', get_template_directory_uri() . '/layout/static/css/intlTelInput.css');
    wp_enqueue_style('maincss', get_template_directory_uri() . '/layout/static/css/style.css');

    wp_enqueue_script('forms-validator', get_template_directory_uri() . '/layout/static/js/forms-validator.js', array(), null, true);
    wp_enqueue_script('popup', get_template_directory_uri() . '/layout/static/js/popup.js', array(), null, true);
    wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/layout/static/js/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('fslightbox', get_template_directory_uri() . '/layout/static/js/fslightbox.js', array(), null, true);
    wp_enqueue_script('intlTelInput', get_template_directory_uri() . '/layout/static/js/intlTelInput.min.js', array(), null, true);
    wp_enqueue_script('app', get_template_directory_uri() . '/layout/static/js/app.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'website_assets');

show_admin_bar(false);


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
});

add_action('carbon_fields_register_fields', function () {
    Container::make('post_meta', 'Настройки страницы')
        ->where('post_type', '=', 'page') // Применяем только к страницам
        ->where('post_id', '=', 10) // Замените 10 на ID вашей страницы "Услуги"
        ->add_fields([
            Field::make('text', 'services_page_title', 'Заголовок страницы'),
            Field::make('complex', 'service_items', 'Список услуг')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'title', 'Заголовок'),
                    Field::make('image', 'icon', 'Иконка'),
                    Field::make('textarea', 'description', 'Описание'),
                    Field::make('text', 'subtitle', 'Дополнительный текст'),
                    Field::make('media_gallery', 'gallery', 'Галерея изображений')->set_type(['image']),
                ]),
            Field::make('text', 'service_questions_title', 'Заголовок блока "Часто задаваемые вопросы"'),
            Field::make('complex', 'service_questions', 'Часто задаваемые вопросы')
                ->set_layout('tabbed-horizontal') // Удобный вертикальный интерфейс
                ->add_fields([
                    Field::make('text', 'question', 'Вопрос'),
                    Field::make('textarea', 'answer', 'Ответ'),
                ]),
        ]);
});
