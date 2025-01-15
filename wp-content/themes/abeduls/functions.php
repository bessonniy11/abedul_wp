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
    wp_enqueue_script('xlsx', get_template_directory_uri() . '/layout/js/xlsx.min.js', array(), null, true);
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
            Field::make('text', 'popular_products_title', 'Заголовок блока "Популярные товары"'),
            Field::make('text', 'we_are_trusted_title', 'Заголовок блока "Нам доверяют"'),
            Field::make('text', 'all_projects_link_text', 'Текст ссылки (все проекты)'),
            Field::make('text', 'all_projects_link', 'Ссылка (все проекты)'),
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
    // данные для Настройки проекта
    Container::make('post_meta', 'Настройки проекта')
        ->where('post_type', '=', 'projects')
        ->add_fields([
            Field::make('text', 'project_slug', 'Slug проекта')
                ->set_help_text('Введите уникальный slug для проекта (например, "burger-king").'),
            Field::make('text', 'project_subtitle', 'Второй заголовок'),

            Field::make('image', 'project_main_image', 'Главное фото')
                ->set_help_text('Добавьте главное фото проекта'),

            Field::make('complex', 'project_gallery', 'Галерея проекта')
                ->add_fields([
                    Field::make('image', 'gallery_image', 'Фото')
                        ->set_help_text('Добавьте изображение'),
                    Field::make('text', 'gallery_title', 'Заголовок фото'),
                    Field::make('text', 'gallery_link', 'Cсылка на товар'),
                ])
                ->set_layout('tabbed-horizontal'),

            Field::make('rich_text', 'project_text_block', 'Текстовый блок'),

            Field::make('text', 'products_title', 'Заголовок блока продуктов')
                ->set_help_text('Например: "В проекте использовали"'),
            Field::make('text', 'project_see_more_btn', 'Текст ссылки смотреть всю подборку')
                ->set_help_text('Например: "Смотреть всю подборку"'),
        ]);
    // данные для страницы Все проекты
    Container::make('post_meta', 'Все проекты - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-projects.php') // Указываем шаблон
        ->add_fields([
            Field::make('text', 'all_projects_title', 'Заголовок страницы')
                ->set_help_text('Заголовок для страницы со списком всех проектов'),
        ]);
    // данные для страницы Каталог
    Container::make('post_meta', 'Каталог - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-catalog.php') // Указываем шаблон
        ->add_fields([
            Field::make('text', 'catalog_page_title', 'Заголовок страницы')
                ->set_help_text('Заголовок для страницы Каталог'),
            Field::make('text', 'main_breadcrumb', 'Первая часть хлебных крошек')
                ->set_help_text('Текст для первой части хлебных крошек, например "Главная"'),
            Field::make('text', 'second_breadcrumb', 'Вторая часть хлебных крошек')
                ->set_help_text('Текст для второй части хлебных крошек, например "Каталог"'),
            Field::make('text', 'filter_block_title', 'Текст "Фильтр по параметрам"')
                ->set_help_text('Заголовок блока с фильтром, например "Фильтр по параметрам"'),
            Field::make('text', 'search_placeholder', 'Текст-подсказка к поиску')
                ->set_help_text('Текст-подсказка к поиску, например "Поиск"'),
            Field::make('text', 'products_empty_text', 'Текст-подсказка если товары отсутсвуют')
                ->set_help_text('Текст-подсказка если товары отсутсвуют, например "Товары отсутсвуют"'),
            // заголовки фильтров
            Field::make('text', 'catalog_resolution_title', 'Заголововк фильтра разрешение')
                ->set_help_text('Заголововк фильтра Разрешение, например "Разрешение"'),
            Field::make('text', 'catalog_os_title', 'Заголововк фильтра Операционная система')
                ->set_help_text('Заголововк фильтра Операционная система, например "Операционная система"'),
            Field::make('text', 'catalog_screen_diagonal_title', 'Заголововк фильтра Диагональ')
                ->set_help_text('Заголововк фильтра Диагональ, например "Диагональ"'),
            Field::make('text', 'catalog_brightness_level_title', 'Заголововк фильтра Яркость')
                ->set_help_text('Заголововк фильтра Яркость, например "Яркость"'),
            Field::make('text', 'catalog_display_technology_title', 'Заголововк фильтра Технология дисплея')
                ->set_help_text('Заголововк фильтра Технология дисплея, например "Технология дисплея"'),
            // кнопки фильтров
            Field::make('text', 'filter_save_filter', 'Текст кнопки "Применить фильтры"')
                ->set_help_text('Введите текст кнопки "Применить фильтры"'),
            Field::make('text', 'filter_remove_filter', 'Текст кнопки "Сбросить" (фильтры)')
                ->set_help_text('Введите текст кнопки "Сбросить" (фильтры)'),
        ]);

    // Индивидуальный заказ - настройки страницы
    Container::make('post_meta', 'Индивидуальный заказ - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-individual.php')
        ->add_fields([
            // Заголовок перед общей галереей
            Field::make('text', 'individual_title', 'Главный заголовок перед галереей')
                ->set_help_text('Введите заголовок, который будет отображаться перед общей галереей'),

            // Группа фотографий для общего раздела
            Field::make('media_gallery', 'general_gallery', 'Общая галерея')
                ->set_type(['image'])
                ->set_help_text('Загрузите фотографии для общей галереи'),

            // Комплексное поле для шагов
            Field::make('complex', 'steps', 'Шаги индивидуального заказа')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'step_title', 'Заголовок шага')
                        ->set_help_text('Введите заголовок шага, например "Шаг 1"'),

                    Field::make('textarea', 'step_description', 'Описание шага')
                        ->set_help_text('Введите описание шага'),

                    Field::make(
                        'media_gallery',
                        'step_gallery',
                        'Галерея для шага'
                    )
                        ->set_type(['image'])
                        ->set_help_text('Загрузите фотографии для данного шага'),
                ])
                ->set_help_text('Добавьте шаги индивидуального заказа'),
        ]);

    // Фабрика
    Container::make('post_meta', 'Фабрика - содержимое страницы')
        ->where('post_type', '=', 'page') // Применяем только к страницам
        ->where('post_template', '=', 'page-fabric.php') // Применяем только к шаблону "page-factory.php"
        ->add_fields([
            // Главный заголовок
            Field::make('text', 'factory_main_title', 'Главный заголовок')
                ->set_help_text('Введите главный заголовок для страницы фабрики'),
            // Описание под заголовком
            Field::make('textarea', 'factory_subtitle', 'Под заголовок')
                ->set_help_text('Введите описание под заголовком'),
            // описание над видео 
            Field::make('textarea', 'video_section_description', 'Общее описание для всех блоков видео')
                ->set_help_text('Введите общее описание, которое будет отображаться перед всеми блоками с видео'),
            // видео с тайтелом
            Field::make(
                'complex',
                'video_blocks',
                'Блок с видео'
            )
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'video_block_title', 'Заголовок видео')
                        ->set_help_text('Введите заголовок блока с видео'),
                    Field::make('file', 'video_file', 'Видео')
                        ->set_type('video') // Ограничиваем загрузку только видеофайлом
                        ->set_help_text('Загрузите видео для этого блока'),
                    Field::make('image', 'video_cover_url', 'Обложка видео')
                        ->set_help_text('Загрузите обложку для видео'),
                ]),
            // Блок с изображениями и текстом
            Field::make('complex', 'image_text_blocks', 'Блоки с заголовком, изображением, блоками иконок')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    // заголовок 
                    Field::make('text', 'image_text_block_title', 'Заголовок блока с изображениями и текстом')
                        ->set_help_text('Введите заголовок для блока'),
                    // изображение блока 
                    Field::make('image', 'image_text_block_image', 'Изображение блока')
                        ->set_help_text('Загрузите изображение для этого блока'),
                    // блок с иконками 
                    Field::make('complex', 'icon_image_block', 'Иконки и изображения с описанием')
                        ->add_fields([
                            Field::make('image', 'icon', 'Иконка')
                                ->set_help_text('Загрузите иконку для этого элемента'),
                            Field::make(
                                'textarea',
                                'icon_image_description',
                                'Описание'
                            )
                                ->set_help_text('Введите описание для этого элемента'),
                        ])
                        ->set_layout('tabbed-horizontal'),
                ]),
            // Дополнительные блоки с изображениями и текстом (фотки с описанием)
            Field::make('complex', 'image_description_blocks', 'Блоки с изображениями и описанием')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('image', 'image', 'Изображение')
                        ->set_help_text('Загрузите изображение для блока'),
                    Field::make('textarea', 'image_description', 'Описание изображения')
                        ->set_help_text('Введите описание для изображения'),
                ]),
        ]);
    // Контакты
    Container::make('post_meta', 'Контакты - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-contacts.php')
        ->add_fields([
            // Главный заголовок
            Field::make('text', 'contacts_main_title', 'Главный заголовок')
                ->set_help_text('Введите главный заголовок для страницы контактов'),
            // Блок с контактами для России
            Field::make('complex', 'contacts', 'Контакты')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    // поаторитель для каждого контакта
                    Field::make('complex', 'contact_items', 'Элементы контакта')
                        ->set_layout('tabbed-horizontal')
                        ->add_fields([
                            // Адрес
                            Field::make('text', 'contact_title', 'Заголовок')
                                ->set_help_text('Введите заголовок'),

                            Field::make('text', 'contact_address', 'Контакт')
                                ->set_help_text('Введите адрес'),

                            Field::make('text', 'contact_url', 'Ссылка')
                                ->set_help_text('Введите ссылку'),
                        ]),
                ]),

            // Изображение логотипа на карте
            Field::make('image', 'logo_map', 'Логотип на карте')
                ->set_help_text('Загрузите логотип, который отобразится на карте'),

            // Поля для координат (x, y)
            Field::make('text', 'coordinate_x', 'Координата X')
                ->set_help_text('Введите координаты X для отображения на карте'),
            Field::make('text', 'coordinate_y', 'Координата Y')
                ->set_help_text('Введите координаты Y для отображения на карте')

        ]);
    // данные для товара
    Container::make('post_meta', 'Характеристики товара')
        ->where('post_type', '=', 'product') // Применяется только к записям типа "Товар"
        ->add_fields([
            Field::make(
                'text',
                'product_name',
                'Название'
            )
                ->set_help_text(
                    'Введите название товара, например, "Киоск типа INGSCREEN K". <br>
                    Enter the product name, e.g. “INGSCREEN K type kiosk”. <br>
                    輸入產品名稱，例如「INGSCREEN K type kiosk」。'
                ),

            Field::make(
                'text',
                'product_screen_resolution',
                'Разрешение экрана'
            )
                ->set_help_text('Введите разрешение экрана, например "1280x720" или "1920x1080"'),

            Field::make(
                'text',
                'product_operation_system',
                'Операционная система'
            )
                ->set_default_value('без операционной системы')
                ->set_help_text('Введите операционную систему, например "Аndroid" или "без операционной системы"'),

            Field::make(
                'text',
                'product_screen_diagonal',
                'Диагональ'
            )
                ->set_help_text('Введите диагональ экрана, например "19 дюймов" или "30 дюймов"'),

            Field::make(
                'text',
                'product_screen_brightness',
                'Яркость'
            )
                ->set_help_text('Введите яркость экрана, например "200 нит" или "250 нит"'),

            Field::make(
                'text',
                'product_display_technology',
                'Технология дисплея'
            )
                ->set_help_text('Введите технологию дисплея, например "Amoled" или "OLED"'),

            Field::make('association', 'product_category', 'Категория')
                ->set_types([
                    [
                        'type'      => 'post',
                        'post_type' => 'category_group', // Укажите тип записи для категорий
                    ],
                ])
                ->set_help_text('Выберите основную категорию для этого товара.'),

            Field::make('select', 'product_subcategory', 'Подкатегория')
                ->set_options(function () {
                    // Получаем все категории и их подкатегории
                    $categories = get_posts([
                        'post_type'      => 'category_group',
                        'posts_per_page' => -1,
                    ]);

                    $options = [];
                    $added_slugs = []; // Для проверки уникальности подкатегорий

                    if ($categories) {
                        foreach ($categories as $category) {
                            $subcategories = carbon_get_post_meta($category->ID, 'subcategories');
                            if ($subcategories) {
                                foreach ($subcategories as $subcategory) {
                                    $slug = $subcategory['subcategory_slug'];
                                    // Проверяем уникальность подкатегории по slug
                                    if (!in_array($slug, $added_slugs, true)) {
                                        $options[$subcategory['subcategory_slug']] = $slug;
                                        $added_slugs[] = $slug;
                                    }
                                }
                            }
                        }
                    }

                    return $options;
                })
                ->set_help_text('Выберите подкатегорию для этого товара.'),


            Field::make(
                'text',
                'product_sku',
                'Артикул (SKU)'
            )
                ->set_help_text('Введите уникальный артикул товара. Если не указан, будет сгенерирован автоматически.'),

            Field::make(
                'text',
                'product_artikul_name',
                'Название "Артикул"'
            )
                ->set_help_text('Название "Артикул", которое будет отображаться перед самим значением артикула'),

            Field::make(
                'text',
                'product_download_attributes_btn',
                'Текст кнопки для скачивания характеристик товара'
            )
                ->set_help_text('Введите текст ссылки на скачивание характеристик, например "Скачать характеристики товара"'),

            Field::make(
                'text',
                'product_shot_description',
                'Короткое описание товара'
            )
                ->set_help_text('Введите короткое описание товара, например "Сенсорный стол"'),

            Field::make('rich_text', 'product_main_description', 'Главное описание')
                ->set_help_text('Введите главное описание товара (будет отображаться справа от фото)')
                ->set_rows(5),

            Field::make(
                'text',
                'product_description_title',
                'Заголовок блока Описание'
            )
                ->set_help_text('Введите заголовок блока "Описание"'),


            Field::make('rich_text', 'product_description', 'Описание')
                ->set_help_text('Введите описание товара')
                ->set_rows(5),

            Field::make(
                'text',
                'product_attributes_title',
                'Заголовок блока Характеристики'
            )
                ->set_help_text('Введите заголовок блока "Характеристики"'),

            Field::make(
                'text',
                'product_attributes_subtitle',
                'Подзаголовок блока Общие параметры'
            )
                ->set_help_text('Введите подзаголовка блока "Общие параметры"'),


            Field::make('complex', 'product_attributes', 'Характеристики')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'attribute_name', 'Название атрибута'),
                    Field::make('text', 'attribute_value', 'Значение атрибута'),
                    Field::make('checkbox', 'attribute_for_description', 'Выводить этот атрибут ещё и после главного описания'),
                ])
                ->set_help_text('Добавьте характеристики товара, такие как "Цвет", "Размер" и т.д.'),

            Field::make(
                'text',
                'product_payment_description_title',
                'Заголовок блока Оплата'
            )
                ->set_help_text('Введите заголовок блока "Оплата"'),

            Field::make('rich_text', 'product_payment_description', 'Оплата')
                ->set_help_text('Текст блока "оплата"')
                ->set_rows(5),

            Field::make(
                'text',
                'product_certificate_title',
                'Заголовок блока Сертификаты'
            )
                ->set_help_text('Введите заголовок блока "Сертификаты"'),

            Field::make('media_gallery', 'product_certificates', 'Галерея сертификатов')
                ->set_type(['image'])
                ->set_help_text('Загрузите сертификат'),

            Field::make('complex', 'product_gallery', 'Галерея изображений / видео')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('select', 'type', 'Тип элемента')
                        ->set_options([
                            'image' => 'Изображение',
                            'video' => 'Видео',
                        ])
                        ->set_help_text('Выберите тип элемента: изображение или видео'),

                    Field::make('image', 'image', 'Изображение')
                        ->set_help_text('Загрузите изображение')
                        ->set_conditional_logic([
                            [
                                'field' => 'type',
                                'value' => 'image',
                                'compare' => '=',
                            ],
                        ]),

                    Field::make('file', 'video', 'Видео (mp4)')
                        ->set_type(['video'])
                        ->set_help_text('Загрузите видео в формате mp4')
                        ->set_conditional_logic([
                            [
                                'field' => 'type',
                                'value' => 'video',
                                'compare' => '=',
                            ],
                        ]),

                    Field::make('image', 'video_preview', 'Превью для видео')
                        ->set_help_text('Загрузите изображение-превью для видео')
                        ->set_conditional_logic([
                            [
                                'field' => 'type',
                                'value' => 'video',
                                'compare' => '=',
                            ],
                        ]),

                    Field::make('text', 'alt_text', 'Альтернативный текст')
                        ->set_help_text('Введите альтернативный текст для изображения или видео'),
                ])
                ->set_help_text('Добавьте изображения или видео с возможностью указания превью и упорядочивания элементов'),

            Field::make('checkbox', 'product_featured', 'Популярные товары')
                ->set_option_value('yes')
                ->set_help_text('Отметьте, если товар должен отображаться на главной странице в блоке "Популярные товары".'),

            Field::make('checkbox', 'product_in_main_slider', 'Выводить рядом с главным слайдером')
                ->set_option_value('yes')
                ->set_help_text(
                    'Отметьте, если товар должен отображаться на главной странице рядос с главным слайдером
                    (не рекомендуется выводить больше двух)'
                ),

            Field::make(
                'text',
                'product_opportunities_title',
                'Заголовок блока Возможности'
            )
                ->set_help_text('Введите заголовок блока "Возможности"'),

            Field::make('media_gallery', 'product_opportunities_gallery', 'Галерея изображений для блока "Возможности"')
                ->set_type(['image'])
                ->set_help_text('Загрузите изображения для блока "Возможности"'),

            Field::make('complex', 'product_additional_blocks', 'Дополнительные блоки')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('rich_text', 'product_additional_block_text', 'Текстовое описание доп. блока'),
                    Field::make('image', 'product_additional_block_text_image', 'Добавьте фото')
                        ->set_help_text('Добавьте фото блока'),
                ])
                ->set_help_text('Если нужно добавьте дополнительные блоки товара с описанием и фото'),
            Field::make(
                'text',
                'product_related_products_title',
                'Заголовок блока "Сопутствующие товары"'
            )
                ->set_help_text('Введите заголовок блока "Сопутствующие товары"'),

            Field::make('association', 'product_related_products', 'Сопутствующие товары')
                ->set_types([
                    [
                        'type'      => 'post',
                        'post_type' => 'product', // Укажите тип записи для товаров
                    ],
                ])
                ->set_help_text('Выберите сопутствующие товары для отображения на странице этого товара'),

            Field::make(
                'text',
                'product_read_more_btn',
                'Текст кнопки "Подробнее"'
            )
                ->set_default_value('Подробнее')
                ->set_help_text('Введите текст кнопки "Подробнее"'),

            Field::make(
                'text',
                'product_order_btn',
                'Текст кнопки "Заказать"'
            )
                ->set_default_value('Заказать')
                ->set_help_text('Введите текст кнопки "Заказать"'),

        ]);
});

add_action('init', function () {
    add_rewrite_rule(
        '^projects/([^/]+)/?$',
        'index.php?post_type=projects&name=$matches[1]',
        'top'
    );
    register_post_type('projects', [
        'labels' => [
            'name' => 'Проекты',
            'singular_name' => 'Проект',
            'add_new' => 'Добавить новый проект',
            'add_new_item' => 'Добавить новый проект',
            'edit_item' => 'Редактировать проект',
            'new_item' => 'Новый проект',
            'view_item' => 'Просмотреть проект',
            'search_items' => 'Найти проект',
            'not_found' => 'Проекты не найдены',
            'not_found_in_trash' => 'Проекты в корзине не найдены',
        ],
        'public' => true,
        'rewrite' => [
            'slug' => 'all-projects', // Здесь задаём slug
            'with_front' => false,   // Убираем префикс /blog, если есть
        ],
        'supports' => ['title'],
        'has_archive' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
    ]);
});

// Регистрация кастомного типа записи "Товар"
add_action('init', function () {
    add_rewrite_rule(
        '^products/([^/]+)/?$',
        'index.php?post_type=product&name=$matches[1]',
        'top'
    );
    register_post_type('product', [
        'labels' => [
            'name' => 'Товары',
            'singular_name' => 'Товар',
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый товар',
            'edit_item' => 'Редактировать товар',
            'new_item' => 'Новый товар',
            'view_item' => 'Просмотреть товар',
            'search_items' => 'Поиск товаров',
            'not_found' => 'Товары не найдены',
            'not_found_in_trash' => 'Товары не найдены в корзине',
            'all_items' => 'Все товары',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'products'], // ЧПУ
        'supports' => ['title'], // Включаем стандартные поля
        'menu_icon' => 'dashicons-cart', // Иконка в админке
    ]);
});

add_action('carbon_fields_post_meta_container_saved', function ($post_id) {
    if (get_post_type($post_id) !== 'product') {
        return;
    }

    // Получаем выбранные категории
    $selected_categories = carbon_get_post_meta($post_id, 'product_category');
    $categories_data = [];

    if ($selected_categories) {
        foreach ($selected_categories as $category) {
            $categories_data[] = [
                'title' => get_the_title($category['id']),
                'slug'  => get_post_field('post_name', $category['id']),
            ];
        }
    }

    // Сохраняем массив объектов категорий
    update_post_meta($post_id, '_product_categories', $categories_data);

    // Получаем slug выбранной подкатегории
    $subcategory_slug = carbon_get_post_meta($post_id, 'product_subcategory');
    update_post_meta($post_id, '_product_subcategory_slug', $subcategory_slug);
});

add_action('save_post', function ($post_id) {
    // Проверяем, что это тип записи "product"
    if (get_post_type($post_id) !== 'product') {
        return;
    }

    // Получаем текущее название и slug
    $post_title = get_the_title($post_id);
    $post_slug = get_post_field('post_name', $post_id);

    // Проверяем, нужно ли обновлять slug
    if (!empty($post_slug) && strpos($post_slug, '%') === false) {
        // Если slug уже существует, и он не содержит символов `%`, то оставляем его
        return;
    }

    // Генерируем slug на основе названия
    $new_slug = generate_slug_from_title($post_title);

    // Проверяем уникальность slug
    $unique_slug = wp_unique_post_slug($new_slug, $post_id, 'publish', 'product', null);

    // Обновляем slug в базе данных
    wp_update_post([
        'ID'        => $post_id,
        'post_name' => $unique_slug,
    ]);
});

// Функция для генерации slug из названия
function generate_slug_from_title($title)
{
    // Транслитерация кириллицы в латиницу
    $cyrillic = [
        'а',
        'б',
        'в',
        'г',
        'д',
        'е',
        'ё',
        'ж',
        'з',
        'и',
        'й',
        'к',
        'л',
        'м',
        'н',
        'о',
        'п',
        'р',
        'с',
        'т',
        'у',
        'ф',
        'х',
        'ц',
        'ч',
        'ш',
        'щ',
        'ъ',
        'ы',
        'ь',
        'э',
        'ю',
        'я',
        'А',
        'Б',
        'В',
        'Г',
        'Д',
        'Е',
        'Ё',
        'Ж',
        'З',
        'И',
        'Й',
        'К',
        'Л',
        'М',
        'Н',
        'О',
        'П',
        'Р',
        'С',
        'Т',
        'У',
        'Ф',
        'Х',
        'Ц',
        'Ч',
        'Ш',
        'Щ',
        'Ъ',
        'Ы',
        'Ь',
        'Э',
        'Ю',
        'Я'
    ];

    $latin = [
        'a',
        'b',
        'v',
        'g',
        'd',
        'e',
        'e',
        'zh',
        'z',
        'i',
        'y',
        'k',
        'l',
        'm',
        'n',
        'o',
        'p',
        'r',
        's',
        't',
        'u',
        'f',
        'kh',
        'ts',
        'ch',
        'sh',
        'shch',
        '',
        'y',
        '',
        'e',
        'yu',
        'ya',
        'A',
        'B',
        'V',
        'G',
        'D',
        'E',
        'E',
        'Zh',
        'Z',
        'I',
        'Y',
        'K',
        'L',
        'M',
        'N',
        'O',
        'P',
        'R',
        'S',
        'T',
        'U',
        'F',
        'Kh',
        'Ts',
        'Ch',
        'Sh',
        'Shch',
        '',
        'Y',
        '',
        'E',
        'Yu',
        'Ya'
    ];

    // Заменяем кириллицу на латиницу
    $slug = str_replace($cyrillic, $latin, $title);

    // Удаляем спецсимволы, переводим в нижний регистр
    $slug = strtolower($slug);
    $slug = remove_accents($slug); // WordPress функция для обработки символов с диакритикой
    $slug = preg_replace('/[^a-z0-9\-]/', '-', $slug); // Разрешаем только латиницу, цифры, дефисы
    $slug = preg_replace('/-+/', '-', $slug); // Убираем множественные дефисы
    $slug = trim($slug, '-'); // Убираем дефисы в начале и конце строки

    return $slug ?: 'product'; // Если slug пустой, возвращаем значение по умолчанию
}

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

function abedul_register_query_vars($vars)
{
    $vars[] = 'category_group';
    $vars[] = 'subcategory_slug';
    return $vars;
}
add_filter('query_vars', 'abedul_register_query_vars');

function abedul_register_rewrite_rules()
{
    add_rewrite_rule(
        '^catalog/([^/]+)/?$',
        'index.php?pagename=page-catalog&category_group=$matches[1]',
        'top'
    );

    add_rewrite_rule(
        '^catalog/([^/]+)/([^/]+)/?$',
        'index.php?pagename=page-catalog&category_group=$matches[1]&subcategory_slug=$matches[2]',
        'top'
    );
}
add_action('init', 'abedul_register_rewrite_rules');

function abedul_template_redirect()
{
    $category_slug = get_query_var('category_group');
    $subcategory_slug = get_query_var('subcategory_slug');

    if ($category_slug || $subcategory_slug) {
        set_query_var('category_slug', $category_slug);
        set_query_var('subcategory_slug', $subcategory_slug);

        include(get_template_directory() . '/page-catalog.php');
        exit;
    }
}
add_action('template_redirect', 'abedul_template_redirect');


// Хук для генерации уникального SKU
add_action('carbon_fields_post_meta_container_saved', function ($post_id) {
    $post_type = get_post_type($post_id);

    // Проверяем, что это запись типа product
    if ($post_type !== 'product') {
        return;
    }

    // Получаем текущее значение SKU
    $sku = carbon_get_post_meta($post_id, 'product_sku');

    // Если SKU пустой или не уникален, генерируем новый
    if (empty($sku) || !is_unique_sku($sku, $post_id)) {
        $new_sku = generate_unique_sku($post_id);
        carbon_set_post_meta($post_id, 'product_sku', $new_sku);
    }
});

// Функция проверки уникальности SKU
function is_unique_sku($sku, $current_post_id = null)
{
    $args = [
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'meta_query'     => [
            [
                'key'   => 'product_sku',
                'value' => $sku,
            ]
        ]
    ];

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
            // Если найден SKU, но это не текущий пост, значит, он не уникален
            if ($post->ID !== $current_post_id) {
                return false;
            }
        }
    }

    return true;
}

// Функция генерации уникального SKU
function generate_unique_sku($post_id)
{
    $prefix = 'SKU'; // Префикс для SKU, можно поменять на другой
    $unique_id = strtoupper(uniqid($prefix));

    // Проверяем уникальность сгенерированного SKU
    while (!is_unique_sku($unique_id, $post_id)) {
        $unique_id = strtoupper(uniqid($prefix));
    }

    return $unique_id;
}

function my_filter_products()
{
    // Убедитесь, что это запрос от WordPress
    if (!defined('ABSPATH')) {
        exit;
    }

    // Получаем текущую страницу из запроса
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

    // Получаем данные из запроса
    $filters = $_POST;

    // Базовые параметры WP_Query
    $args = [
        'post_type'      => 'product',
        'posts_per_page' => 6, // Количество товаров на странице
        'paged'          => $paged,
    ];

    // Применяем фильтры
    $meta_query = [
        'relation' => 'AND',
    ];

    // Фильтр по названию товара (поиск)
    if (!empty($filters['product_name'])) {
        $args['s'] = sanitize_text_field($filters['product_name']);
    }

    // Фильтр по категории
    if (!empty($filters['category_slug'])) {
        $category_id = null;
        $categories = get_posts([
            'post_type'      => 'category_group',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'meta_query'     => [
                [
                    'key'     => 'category_slug',
                    'value'   => sanitize_text_field($filters['category_slug']),
                    'compare' => '=',
                ],
            ],
        ]);

        if (! empty($categories)) {
            $category_id = $categories[0];
        }

        if ($category_id) {
            $meta_query[] = [
                'key'     => 'product_category',
                'value'   => 'post:category_group:' . $category_id,
                'compare' => 'LIKE',
            ];
        }
    }

    // Фильтр по подкатегории
    if (!empty($filters['subcategory_slug'])) {
        $meta_query[] = [
            'key'     => 'product_subcategory',
            'value'   => sanitize_text_field($filters['subcategory_slug']),
            'compare' => '=',
        ];
    }

    // Фильтр по разрешению экрана
    if (!empty($filters['resolution'])) {
        $meta_query[] = [
            'key'     => 'product_screen_resolution',
            'value'   => $filters['resolution'],
            'compare' => 'IN',
        ];
    }

    // Добавляем фильтр по операционной системе
    if (!empty($filters['os'])) {
        $meta_query[] = [
            'key'     => 'product_operation_system',
            'value'   => $filters['os'],
            'compare' => 'IN',
        ];
    }

    // Добавляем фильтр по диагонали экрана
    if (!empty($filters['screen_diagonal'])) {
        $meta_query[] = [
            'key'     => 'product_screen_diagonal',
            'value'   => $filters['screen_diagonal'],
            'compare' => 'IN',
        ];
    }

    // Добавляем фильтр по уровню яркости
    if (!empty($filters['brightness_level'])) {
        $meta_query[] = [
            'key'     => 'product_screen_brightness',
            'value'   => $filters['brightness_level'],
            'compare' => 'IN',
        ];
    }

    // Добавляем фильтр по технологии дисплея
    if (!empty($filters['display_technology'])) {
        $meta_query[] = [
            'key'     => 'product_display_technology',
            'value'   => $filters['display_technology'],
            'compare' => 'IN',
        ];
    }

    // Добавляем meta_query в $args, если оно не пустое
    if (count($meta_query) > 1) {
        $args['meta_query'] = $meta_query;
    }

    // Создаем WP_Query
    $query = new WP_Query($args);

    // Получаем общее количество страниц
    $total_pages = $query->max_num_pages;

    // Генерируем HTML для ответа
    $html = '';
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Получение данных о товаре
            $product_name = carbon_get_the_post_meta('product_name');
            $product_shot_description = carbon_get_the_post_meta('product_shot_description');
            $product_main_description = carbon_get_the_post_meta('product_main_description');
            $product_sku = carbon_get_the_post_meta('product_sku');
            $product_artikul_name = carbon_get_the_post_meta('product_artikul_name');
            $product_gallery = carbon_get_the_post_meta('product_gallery');
            $product_read_more_btn = carbon_get_the_post_meta('product_read_more_btn') ?: 'Подробнее';
            $product_order_btn = carbon_get_the_post_meta('product_order_btn') ?: 'Заказать';

            // Генерация карточки товара
            $html .= '<div class="product-item">';
            $html .= '<div class="product-slider swiper">';
            $html .= '<div class="swiper-wrapper">';

            if (!empty($product_gallery)) {
                foreach ($product_gallery as $gallery_item) {
                    if ($gallery_item['type'] === 'image') {
                        $html .= '<a data-fslightbox="' . esc_html($product_name) . '" href="' . wp_get_attachment_image_url($gallery_item['image'], 'full') . '" class="swiper-slide">';
                        $html .= '<img src="' . wp_get_attachment_image_url($gallery_item['image'], 'full') . '" alt="' . esc_attr($gallery_item['alt_text']) . '">';
                        $html .= '</a>';
                    } elseif ($gallery_item['type'] === 'video') {
                        $html .= '<a data-fslightbox="' . esc_html($product_name) . '" href="' . wp_get_attachment_url($gallery_item['video']) . '" class="swiper-slide">';
                        $html .= '<img src="' . wp_get_attachment_image_url($gallery_item['video_preview'], 'full') . '" alt="' . esc_attr($gallery_item['alt_text']) . '">';
                        $html .= '<img loading="lazy" class="play" src="' . get_template_directory_uri() . '/layout/img/icons/play.svg" alt="play">';
                        $html .= '</a>';
                    }
                }
            }

            $html .= '</div>';
            $html .= '<div class="swiper-pagination"></div>';
            $html .= '</div>';
            $html .= '<div class="product-info">';
            $html .= '<h3 class="product-title">' . esc_html($product_name) . '</h3>';
            $html .= '<p class="product-description">' . esc_html($product_shot_description) . '</p>';

            if (!empty($product_sku)) {
                $html .= '<p class="product-article">' . esc_html($product_artikul_name) . ' ' . esc_html($product_sku) . '</p>';
            }

            if (!empty($product_main_description)) {
                $html .= '<p class="product-description product-description-text">' . esc_html($product_main_description) . '</p>';
            }

            $html .= '<div class="product-buttons">';
            $html .= '<a href="' . get_the_permalink() . '" class="btn btn-blue">' . esc_html($product_read_more_btn) . '</a>';
            $html .= '<a href="#order-send-popup" class="btn btn-white order-product-btn popup-link" ' .
                'data-product-name="' . esc_attr($product_name) . '">' .
                esc_html($product_order_btn) . '</a>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
    } else {
        $html = '<p>' . $filters['products_empty_text'] . '</p>';
    }

    wp_reset_postdata();

    // Отправляем ответ
    wp_send_json(['html' => $html, 'total_pages' => $total_pages]);
    wp_die();
}
add_action('wp_ajax_my_filter_products', 'my_filter_products');
add_action('wp_ajax_nopriv_my_filter_products', 'my_filter_products');
