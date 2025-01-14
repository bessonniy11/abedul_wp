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
        ]);
    // данные для страницы Все проекты
    Container::make('post_meta', 'Все проекты - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-projects.php') // Указываем шаблон
        ->add_fields([
            Field::make('text', 'all_projects_title', 'Заголовок страницы')
                ->set_help_text('Заголовок для страницы со списком всех проектов'),
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
    // Настройки хедера
    Container::make('theme_options', 'Настройки хедера - RU')
        ->add_fields([

            Field::make('separator', 'data_address'),
            // Блок "Адрес"
            Field::make('image', 'header_address_icon', 'Иконка возле адреса')
                ->set_help_text('Загрузите иконку для адреса.'),
            Field::make('text', 'header_address_title', 'Адрес пердприятия')
                ->set_help_text('Введите адреса, производства".'),
            Field::make('text', 'header_address_link', 'Ссылка')
                ->set_help_text('Введите URL, куда переведет человека после клика на адресс.'),

            
            Field::make('separator', 'contacts'),
            // Блок "Контакты"
            Field::make('image', 'header_contact_icon', 'Иконка для контакта')
                ->set_help_text('Загрузите иконку для контакта, например, для телефона или email.'),
            Field::make('text', 'header_contact_text', 'Текст для контакта')
                ->set_help_text('Введите текст для контакта, например, "Связаться".'),

            Field::make('text', 'header_email', 'Email')
                ->set_help_text('Введите email для отображения в хедере.'),
            Field::make('text', 'header_phone', 'Номер телефона')
                ->set_help_text('Введите номер телефона для отображения в хедере.'),
            

            Field::make('separator', 'logo'),
            // Логотип
            Field::make('image', 'header_logo', 'Логотип')
                ->set_help_text('Загрузите логотип для отображения в хедере.'),

            // Текст рядом с логотипом
            Field::make('textarea', 'header_logo_text', 'Текст возле логотипа')
                ->set_help_text('Введите текст, который будет отображаться рядом с логотипом.'),


            Field::make('separator', 'input_search'),
            // Строка ввода (текст внутри и иконка)
            Field::make('text', 'header_input_text', 'Текст в строке ввода')
                ->set_help_text('Введите текст, который будет отображаться в строке ввода (например, "Поиск").'),
            Field::make('image', 'header_input_icon', 'Иконка для строки ввода')
                ->set_help_text('Загрузите иконку для строки ввода (например, иконка поиска).'),

            // Блок названий страниц с ссылками
            Field::make('separator', 'individual_order'),
            // Индивидуальный заказ
            Field::make('text', 'header_individual_order_text', 'Индивидуальный заказ')
                ->set_help_text('Введите текст для раздела "Индивидуальный заказ".'),
            Field::make('text', 'header_individual_order_link', 'Ссылка на индивидуальный заказ')
                ->set_help_text('Введите ссылку на страницу "Индивидуальный заказ".'),

            Field::make('separator', 'services'),
            //Услуги
            Field::make('text', 'header_services_text', 'Услуги')
                ->set_help_text('Введите текст для раздела "Услуги".'),
            Field::make('text', 'header_services_link', 'Ссылка на услуги')
                ->set_help_text('Введите ссылку на страницу "Услуги".'),

            Field::make('separator', 'career'),
            //Карьера
            Field::make('text', 'header_career_text', 'Карьера')
                ->set_help_text('Введите текст для раздела "Карьера".'),
            Field::make('text', 'header_career_link', 'Ссылка на карьеру')
                ->set_help_text('Введите ссылку на страницу "Карьера".'),

            Field::make('separator', 'contacts_page'),
            //Контакты
            Field::make('text', 'header_contacts_text', 'Контакты')
                ->set_help_text('Введите текст для раздела "Контакты".'),
            Field::make('text', 'header_contacts_link', 'Ссылка на контакты')
                ->set_help_text('Введите ссылку на страницу "Контакты".'),

            Field::make('separator', 'our_factory'),
            //Наша фабрика
            Field::make('text', 'header_factory_text', 'Наша фабрика')
                ->set_help_text('Введите текст для раздела "Наша фабрика".'),
            Field::make('text', 'header_factory_link', 'Ссылка на нашу фабрику')
                ->set_help_text('Введите ссылку на страницу "Наша фабрика".'),

        ]);
    // Настройки хедера - en
    Container::make('theme_options', 'Настройки хедера - EN')
        ->add_fields([

            Field::make('separator', 'data_address_en'),
            // Блок "Адрес"
            Field::make('image', 'header_en_address_icon', 'Иконка возле адреса')
                ->set_help_text('Загрузите иконку для адреса.'),
            Field::make('text', 'header_en_address_title', 'Адрес пердприятия')
                ->set_help_text('Введите адреса, производства".'),
            Field::make('text', 'header_en_address_link', 'Ссылка')
                ->set_help_text('Введите URL, куда переведет человека после клика на адресс.'),

            
            Field::make('separator', 'contacts_en'),
            // Блок "Контакты"
            Field::make('image', 'header_en_contact_icon', 'Иконка для контакта')
                ->set_help_text('Загрузите иконку для контакта, например, для телефона или email.'),
            Field::make('text', 'header_en_contact_text', 'Текст для контакта')
                ->set_help_text('Введите текст для контакта, например, "Связаться".'),

            Field::make('text', 'header_en_email', 'Email')
                ->set_help_text('Введите email для отображения в хедере.'),
            Field::make('text', 'header_en_phone', 'Номер телефона')
                ->set_help_text('Введите номер телефона для отображения в хедере.'),
            

            Field::make('separator', 'logo_en'),
            // Логотип
            Field::make('image', 'header_en_logo', 'Логотип')
                ->set_help_text('Загрузите логотип для отображения в хедере.'),

            // Текст рядом с логотипом
            Field::make('textarea', 'header_en_logo_text', 'Текст возле логотипа')
                ->set_help_text('Введите текст, который будет отображаться рядом с логотипом.'),


            Field::make('separator', 'input_search_en'),
            // Строка ввода (текст внутри и иконка)
            Field::make('text', 'header_en_input_text', 'Текст в строке ввода')
                ->set_help_text('Введите текст, который будет отображаться в строке ввода (например, "Поиск").'),
            Field::make('image', 'header_en_input_icon', 'Иконка для строки ввода')
                ->set_help_text('Загрузите иконку для строки ввода (например, иконка поиска).'),

            // Блок названий страниц с ссылками
            Field::make('separator', 'individual_order_en'),
            // Индивидуальный заказ
            Field::make('text', 'header_en_individual_order_text', 'Индивидуальный заказ')
                ->set_help_text('Введите текст для раздела "Индивидуальный заказ".'),
            Field::make('text', 'header_en_individual_order_link', 'Ссылка на индивидуальный заказ')
                ->set_help_text('Введите ссылку на страницу "Индивидуальный заказ".'),

            Field::make('separator', 'services_en'),
            //Услуги
            Field::make('text', 'header_en_services_text', 'Услуги')
                ->set_help_text('Введите текст для раздела "Услуги".'),
            Field::make('text', 'header_en_services_link', 'Ссылка на услуги')
                ->set_help_text('Введите ссылку на страницу "Услуги".'),

            Field::make('separator', 'career_en'),
            //Карьера
            Field::make('text', 'header_en_career_text', 'Карьера')
                ->set_help_text('Введите текст для раздела "Карьера".'),
            Field::make('text', 'header_en_career_link', 'Ссылка на карьеру')
                ->set_help_text('Введите ссылку на страницу "Карьера".'),

            Field::make('separator', 'contacts_page_en'),
            //Контакты
            Field::make('text', 'header_en_contacts_text', 'Контакты')
                ->set_help_text('Введите текст для раздела "Контакты".'),
            Field::make('text', 'header_en_contacts_link', 'Ссылка на контакты')
                ->set_help_text('Введите ссылку на страницу "Контакты".'),

            Field::make('separator', 'our_factory_en'),
            //Наша фабрика
            Field::make('text', 'header_en_factory_text', 'Наша фабрика')
                ->set_help_text('Введите текст для раздела "Наша фабрика".'),
            Field::make('text', 'header_en_factory_link', 'Ссылка на нашу фабрику')
                ->set_help_text('Введите ссылку на страницу "Наша фабрика".'),

        ]);
    // Настройки хедера - zh
    Container::make('theme_options', 'Настройки хедера - ZH')
        ->add_fields([

            Field::make('separator', 'data_address_zh'),
            // Блок "Адрес"
            Field::make('image', 'header_zh_address_icon', 'Иконка возле адреса')
                ->set_help_text('Загрузите иконку для адреса.'),
            Field::make('text', 'header_zh_address_title', 'Адрес пердприятия')
                ->set_help_text('Введите адреса, производства".'),
            Field::make('text', 'header_zh_address_link', 'Ссылка')
                ->set_help_text('Введите URL, куда переведет человека после клика на адресс.'),

            
            Field::make('separator', 'contacts_zh'),
            // Блок "Контакты"
            Field::make('image', 'header_zh_contact_icon', 'Иконка для контакта')
                ->set_help_text('Загрузите иконку для контакта, например, для телефона или email.'),
            Field::make('text', 'header_zh_contact_text', 'Текст для контакта')
                ->set_help_text('Введите текст для контакта, например, "Связаться".'),

            Field::make('text', 'header_zh_email', 'Email')
                ->set_help_text('Введите email для отображения в хедере.'),
            Field::make('text', 'header_zh_phone', 'Номер телефона')
                ->set_help_text('Введите номер телефона для отображения в хедере.'),
            

            Field::make('separator', 'logo_zh'),
            // Логотип
            Field::make('image', 'header_zh_logo', 'Логотип')
                ->set_help_text('Загрузите логотип для отображения в хедере.'),

            // Текст рядом с логотипом
            Field::make('rich_text', 'header_zh_logo_text', 'Текст возле логотипа')
                ->set_help_text('Введите текст, который будет отображаться рядом с логотипом.'),


            Field::make('separator', 'input_search_zh'),
            // Строка ввода (текст внутри и иконка)
            Field::make('text', 'header_zh_input_text', 'Текст в строке ввода')
                ->set_help_text('Введите текст, который будет отображаться в строке ввода (например, "Поиск").'),
            Field::make('image', 'header_zh_input_icon', 'Иконка для строки ввода')
                ->set_help_text('Загрузите иконку для строки ввода (например, иконка поиска).'),

            // Блок названий страниц с ссылками
            Field::make('separator', 'individual_order_zh'),
            // Индивидуальный заказ
            Field::make('text', 'header_zh_individual_order_text', 'Индивидуальный заказ')
                ->set_help_text('Введите текст для раздела "Индивидуальный заказ".'),
            Field::make('text', 'header_zh_individual_order_link', 'Ссылка на индивидуальный заказ')
                ->set_help_text('Введите ссылку на страницу "Индивидуальный заказ".'),

            Field::make('separator', 'services_zh'),
            //Услуги
            Field::make('text', 'header_zh_services_text', 'Услуги')
                ->set_help_text('Введите текст для раздела "Услуги".'),
            Field::make('text', 'header_zh_services_link', 'Ссылка на услуги')
                ->set_help_text('Введите ссылку на страницу "Услуги".'),

            Field::make('separator', 'career_zh'),
            //Карьера
            Field::make('text', 'header_zh_career_text', 'Карьера')
                ->set_help_text('Введите текст для раздела "Карьера".'),
            Field::make('text', 'header_zh_career_link', 'Ссылка на карьеру')
                ->set_help_text('Введите ссылку на страницу "Карьера".'),

            Field::make('separator', 'contacts_page_zh'),
            //Контакты
            Field::make('text', 'header_zh_contacts_text', 'Контакты')
                ->set_help_text('Введите текст для раздела "Контакты".'),
            Field::make('text', 'header_zh_contacts_link', 'Ссылка на контакты')
                ->set_help_text('Введите ссылку на страницу "Контакты".'),

            Field::make('separator', 'our_factory_zh'),
            //Наша фабрика
            Field::make('text', 'header_zh_factory_text', 'Наша фабрика')
                ->set_help_text('Введите текст для раздела "Наша фабрика".'),
            Field::make('text', 'header_zh_factory_link', 'Ссылка на нашу фабрику')
                ->set_help_text('Введите ссылку на страницу "Наша фабрика".'),

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


function register_theme_menus() {
    register_nav_menus(array(
        'main-menu' => __('Main Menu')
    ));
    // меню для английского языка
    register_nav_menus(array(
        'header-menu-en' => __('Header Menu for EN')
    ));
    // меню для китайского языка
    register_nav_menus(array(
        'header-menu-en' => __('Header Menu for ZH')
    ));
}
add_action('init', 'register_theme_menus');