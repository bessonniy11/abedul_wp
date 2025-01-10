<?php


function website_assets()
{
    wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/layout/css/swiper-bundle.min.css');
    wp_enqueue_style('intlTelInput', get_template_directory_uri() . '/layout/css/intlTelInput.css');
    wp_enqueue_style('maincss', get_template_directory_uri() . '/layout/css/style.css');

    wp_enqueue_script('forms-validator', get_template_directory_uri() . '/layout/js/forms-validator.js', array(), null, true);
    wp_enqueue_script('popup', get_template_directory_uri() . '/layout/js/popup.js', array(), null, true);
    wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/layout/js/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('fslightbox', get_template_directory_uri() . '/layout/js/fslightbox.js', array(), null, true);
    wp_enqueue_script('intlTelInput', get_template_directory_uri() . '/layout/js/intlTelInput.min.js', array(), null, true);
    wp_enqueue_script('app', get_template_directory_uri() . '/layout/js/app.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'website_assets');

show_admin_bar(false);


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
});

add_action('carbon_fields_register_fields', function () {

    // данные для категорий и подкатегорий
    Container::make('post_meta', 'Настройки категории')
        ->where('post_type', '=', 'category_group') // Применяем только к "Категории"
        ->add_fields([
            Field::make('image', 'category_icon', 'Иконка категории')
                ->set_help_text('Загрузите иконку для отображения'),

            Field::make('text', 'category_slug', 'Slug категории')
                ->set_help_text('Введите уникальный slug категории (например, "reklama").'),

            Field::make('complex', 'subcategories', 'Подкатегории')
                ->add_fields([
                    Field::make('text', 'subcategory_title', 'Название подкатегории'),
                    Field::make('image', 'subcategory_icon', 'Иконка подкатегории'),
                    Field::make('text', 'subcategory_slug', 'Slug подкатегории')
                        ->set_help_text('Введите уникальный slug подкатегории (например, "monitors").'),
                    Field::make('text', 'subcategory_extra', 'Дополнительное поле')
                        ->set_help_text('Это поле можно оставить пустым'),
                ])
                ->set_layout('tabbed-horizontal')
                ->set_help_text('Добавьте список подкатегорий и их атрибутов.'),
        ]);
    // данные для страницы Главная
    Container::make('post_meta', 'Настройки главной страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'index.php') // Только для страницы с шаблоном Главная
        ->add_fields([
            Field::make('complex', 'main_slider', 'Слайдер')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make(
                        'image',
                        'slide_image',
                        'Изображение слайда'
                    )
                        ->set_help_text('Загрузите изображение для слайда'),
                    Field::make('textarea', 'slide_title', 'Заголовок слайда')
                        ->set_rows(2)
                        ->set_help_text('Введите заголовок для слайда'),
                    Field::make('textarea', 'slide_subtitle', 'Подзаголовок слайда')
                        ->set_rows(3)
                        ->set_help_text('Введите подзаголовок для слайда'),
                    Field::make('text', 'slide_button_text', 'Текст кнопки')
                        ->set_default_value('Подробнее')
                        ->set_help_text('Введите текст кнопки'),
                    Field::make('text', 'slide_button_link', 'Ссылка кнопки')
                        ->set_help_text('Укажите URL-адрес, на который будет вести кнопка'),
                ]),
            Field::make('complex', 'main_page_info_items', 'Информационные элементы')
                ->set_layout('tabbed-horizontal') // Удобный интерфейс
                ->add_fields([
                    Field::make('image', 'info_icon', 'Иконка')
                        ->set_help_text('Загрузите иконку для элемента'),
                    Field::make('text', 'info_text', 'Текст элемента')
                        ->set_help_text('Введите текст для информационного элемента'),
                ]),
        ]);

    // данные для страницы Услуги
    Container::make('post_meta', 'Настройки страницы')
        ->where('post_type', '=', 'page') // Применяем только к страницам
        ->where('post_template', '=', 'page-services.php')
        ->add_fields([
            Field::make('text', 'services_page_title', 'Заголовок страницы'),
            Field::make(
                'complex',
                'service_items',
                'Список услуг'
            )
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'title', 'Заголовок'),
                    Field::make('image', 'icon', 'Иконка'),
                    Field::make('textarea', 'description', 'Описание'),
                    Field::make(
                        'text',
                        'subtitle',
                        'Дополнительный текст'
                    ),
                    Field::make('media_gallery', 'gallery', 'Галерея изображений')->set_type(['image']),
                ]),
            Field::make('text', 'service_questions_title', 'Заголовок блока "Часто задаваемые вопросы"'),
            Field::make('complex', 'service_questions', 'Часто задаваемые вопросы')
                ->set_layout('tabbed-horizontal') // Удобный вертикальный интерфейс
                ->add_fields([
                    Field::make(
                        'text',
                        'question',
                        'Вопрос'
                    ),
                    Field::make('textarea', 'answer', 'Ответ'),
                ]),
        ]);


    // данные для страницы Карьера
    Container::make('post_meta', 'Карьера - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-career.php') // Указываем шаблон
        ->add_fields([
            Field::make('text', 'career_page_title', 'Заголовок страницы'),
            // Поле для подзаголовка
            Field::make('text', 'career_subtitle', 'Подзаголовок'),

            // Поле для текста кнопки
            Field::make('text', 'career_button_text', 'Текст кнопки "Отправить резюме"'),

            // Поле для списка вакансий
            Field::make('complex', 'career_items', 'Список вакансий')
                ->set_layout('tabbed-horizontal') // Удобный интерфейс
                ->add_fields([
                    Field::make('text', 'title', 'Заголовок вакансии'),
                    Field::make('text', 'subtitle', 'Подзаголовок'),
                    Field::make('text', 'salary', 'Зарплата'),
                    Field::make('textarea', 'description', 'Описание'),

                    // Поля для подзаголовков списков
                    Field::make('text', 'offers_title', 'Заголовок секции "Что мы предлагаем"')
                        ->set_default_value('Что мы предлагаем:'),
                    Field::make('text', 'responsibilities_title', 'Заголовок секции "Обязанности"')
                        ->set_default_value('Обязанности:'),
                    Field::make('text', 'requirements_title', 'Заголовок секции "Требования"')
                        ->set_default_value('Требования:'),

                    Field::make('complex', 'offers', 'Что мы предлагаем')
                        ->add_fields([
                            Field::make('text', 'offer', 'Предложение'),
                        ]),
                    Field::make('complex', 'responsibilities', 'Обязанности')
                        ->add_fields([
                            Field::make('text', 'responsibility', 'Обязанность'),
                        ]),
                    Field::make('complex', 'requirements', 'Требования')
                        ->add_fields([
                            Field::make('text', 'requirement', 'Требование'),
                        ]),
                ]),
        ]);
});


function abedul_register_product_post_type()
{
    $labels = array(
        'name'               => 'Товары',
        'singular_name'      => 'Товар',
        'menu_name'          => 'Товары',
        'name_admin_bar'     => 'Товар',
        'add_new'            => 'Добавить новый',
        'add_new_item'       => 'Добавить новый товар',
        'new_item'           => 'Новый товар',
        'edit_item'          => 'Редактировать товар',
        'view_item'          => 'Просмотр товара',
        'all_items'          => 'Все товары',
        'search_items'       => 'Искать товары',
        'not_found'          => 'Товары не найдены.',
        'not_found_in_trash' => 'В корзине товаров не найдено.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array('title', 'editor', 'thumbnail'), // Поля "Название", "Описание" и "Миниатюра"
        'show_in_rest'       => true, // Для поддержки редактора Гутенберг
    );

    register_post_type('product', $args);
}
add_action('init', 'abedul_register_product_post_type');

function abedul_register_category_post_type()
{
    $labels = array(
        'name'               => 'Категории',
        'singular_name'      => 'Категория',
        'menu_name'          => 'Категории',
        'name_admin_bar'     => 'Категория',
        'add_new'            => 'Добавить новую',
        'add_new_item'       => 'Добавить новую категорию',
        'new_item'           => 'Новая категория',
        'edit_item'          => 'Редактировать категорию',
        'view_item'          => 'Просмотр категории',
        'all_items'          => 'Все категории',
        'search_items'       => 'Искать категории',
        'not_found'          => 'Категории не найдены.',
        'not_found_in_trash' => 'В корзине категорий не найдено.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'menu_icon'          => 'dashicons-category',
        'supports'           => array('title', 'editor', 'thumbnail'), // Поля "Название", "Описание" и "Миниатюра"
        'hierarchical'       => true, // Для возможности вложенности (родитель/потомок)
        'show_in_rest'       => true, // Для редактора Гутенберг
    );

    register_post_type('category_group', $args);
}
add_action('init', 'abedul_register_category_post_type');
