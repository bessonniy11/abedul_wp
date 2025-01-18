<!DOCTYPE html>
<html lang="<?php echo esc_attr(pll_current_language()); ?>">


<head>
    <title>Abedul - <?php wp_title(); ?></title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/layout/img/favicon.svg">
    <link rel="stylesheet" href="https://use.typekit.net/jby8qxe.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body class="preload lock">
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <div id="overlay" class="overlay"></div>
    <div class="wrapper">

        <?php
        // Получение ID записи типа "header"
        $header_id = get_posts([
            'post_type' => 'header',
            'numberposts' => 1,
            'fields' => 'ids', // Получаем только ID
        ]);

        if (!empty($header_id)) {
            $header_id = $header_id[0]; // Берём ID первой записи
            $header_location = carbon_get_post_meta($header_id, 'header_location');
            $header_location_link = carbon_get_post_meta($header_id, 'header_location_link');
            $header_email = carbon_get_post_meta($header_id, 'header_email');
            $header_phone = carbon_get_post_meta($header_id, 'header_phone');
            $header_project_button_text = carbon_get_post_meta($header_id, 'header_project_button_text');
            $header_near_logo_text = carbon_get_post_meta($header_id, 'header_near_logo_text');
            $header_search_text = carbon_get_post_meta($header_id, 'header_search_text');
            $header_logo = carbon_get_post_meta($header_id, 'header_logo');
            $header_catalog_text = carbon_get_post_meta($header_id, 'header_catalog_text');
            $header_menu_items = carbon_get_post_meta($header_id, 'header_menu_items');
        }
        ?>

        <header class="header">
            <div class="header-top">
                <div class="header__container">
                    <a href="<?php echo $header_location_link; ?>" target="_blank" class="header-contacts-item header-contacts-item-location">
                        <div class="location-icon">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/location.svg" alt="location">
                        </div>
                        <span><?php echo esc_html($header_location); ?></span>
                    </a>
                    <div class="header-top-l">
                        <div class="header-language" data-da=".header-scroll-items,960,9">
                            <?php
                            if (function_exists('pll_the_languages')) {
                                $languages = pll_the_languages(array(
                                    'dropdown' => 1,
                                    'force_home' => 0,  // Убираем принудительный переход на главную
                                ));
                            }

                            $current_language = function_exists('pll_current_language') ? pll_current_language() : 'en'; // По умолчанию 'en'
                            ?>
                            <script>
                                let currentLanguage = "<?php echo $current_language; ?>";
                                // console.log("Current language:", currentLanguage);
                                const langSelectItem = document.getElementById('lang_choice_1');
                                const langSelectOptions = langSelectItem.querySelectorAll('option');

                                langSelectOptions.forEach((langSelectOption) => {
                                    // Расшифровываем значение
                                    let decodedValue = decodeURIComponent(langSelectOption.value);
                                    // console.log('Decoded value:', decodedValue);

                                    // Замена в зависимости от языка
                                    if (langSelectOption.lang === "en-US") {
                                        decodedValue = decodedValue.replace('category_group', 'catalog');
                                    } else if (langSelectOption.lang === "ru-RU") {
                                        decodedValue = decodedValue.replace('category_group', 'каталог');
                                    }

                                    // Присваиваем изменённое значение обратно
                                    langSelectOption.value = decodedValue;
                                    // console.log('Updated value for', langSelectOption.lang, ':', langSelectOption.value);
                                });

                                // Проверяем текущий URL
                                const currentURL = window.location.pathname;
                                // Если текущий путь равен "/all-projects/" (или его вариациям)
                                if (currentURL === "/all-projects/" || currentURL === "/all-projects") {
                                    // Определяем целевую страницу в зависимости от языка
                                    let redirectURL = "/";
                                    if (currentLanguage === "en") {
                                        redirectURL = "/projects/"; // Английская версия
                                    } else if (currentLanguage === "ru") {
                                        redirectURL = "/проекты/"; // Русская версия
                                    }

                                    // Выполняем перенаправление
                                    window.location.href = redirectURL;
                                }

                                // Если текущий путь равен "/all-projects/" (или его вариациям)
                                if (currentURL === "/products/" || currentURL === "/products") {
                                    // Определяем целевую страницу в зависимости от языка
                                    let redirectURL = "/";
                                    if (currentLanguage === "en") {
                                        redirectURL = "/catalog/"; // Английская версия
                                    } else if (currentLanguage === "ru") {
                                        redirectURL = "/каталог/"; // Русская версия
                                    }

                                    // Выполняем перенаправление
                                    window.location.href = redirectURL;
                                }
                            </script>
                        </div>

                        <style>
                            .pll-switcher-select {
                                cursor: pointer !important;
                                outline: none !important;
                            }
                        </style>
                        <a href="#order-a-call-popup" class="header-contacts-item phone-item popup-link">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/phone.svg" alt="phone">
                            <span><?php echo esc_html($header_project_button_text); ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-center">
                <div class="header-center__container">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo">
                        <img loading="lazy" src="<?php echo esc_url($header_logo); ?>" alt="logo">
                    </a>
                    <?php if ($header_near_logo_text): ?>
                        <div class="header-center-info">
                            <?php echo esc_html($header_near_logo_text); ?>
                        </div>
                    <?php endif; ?>

                    <div class="header-search-input-wrapper" data-da=".header-mobile-container,860,0">
                        <div class="header-search-input">
                            <input class="header-search-input__input" type="text" placeholder="<?php echo esc_html($header_search_text); ?>">
                            <img loading="lazy" class="header-search-input__search" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/search.svg"
                                alt="search">
                            <div class="header-search-input__close"></div>
                        </div>
                        <div class="header-search-result"></div>
                    </div>
                    <div class="header-center-contacts">
                        <a href="mailto:<?php echo esc_html($header_email); ?>" class="header-contacts-item">
                            <span><?php echo esc_html($header_email); ?></span>
                        </a>
                        <a href="tel:<?php echo esc_html($header_phone); ?>" class="header-contacts-item">
                            <span><?php echo esc_html($header_phone); ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="header__container">
                    <div class="header-logo">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/logo-0.svg" alt="logo">
                    </div>
                    <div class="header-scroll-items" data-da=".menu__mobile,960,2">
                        <div class="header-item catalog-item" data-spollers>
                            <div class="catalog-item-elem">
                                <div class="header-item-icon">
                                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/catalog-item-icon.svg" alt="catalog-item-icon">
                                </div>
                                <span><?php echo esc_html($header_catalog_text); ?></span>
                                <div class="header-item-icon header-item-icon-arrow-down">
                                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-down-white.svg" alt="arrow-down">
                                </div>
                            </div>

                            <div class="catalog-mobile-trigger"></div>

                            <div class="catalog-container-wrapper" id="catalog-container-wrapper">
                                <?php
                                $query = new WP_Query(array(
                                    'post_type' => 'category_group',
                                    'posts_per_page' => -1,
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC',
                                ));

                                if ($query->have_posts()) : ?>
                                    <div id="catalog-container" class="catalog-container">
                                        <?php while ($query->have_posts()) : $query->the_post();
                                            $icon_id = carbon_get_the_post_meta('category_icon');
                                            $category_slug = carbon_get_the_post_meta('category_slug');
                                            $icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'full') : ''; // Получаем URL изображения
                                            $subcategories = carbon_get_the_post_meta('subcategories');
                                            // Получаем текущий язык
                                            $current_language = pll_current_language();
                                            // Определяем slug для текущего языка
                                            $catalog_slug = ($current_language === 'ru') ? 'каталог' : 'catalog';
                                        ?>
                                            <div class="catalog-item-group">
                                                <div class="catalog-item-group__title-wrapper">
                                                    <div class="catalog-item-group__title">
                                                        <?php if ($icon_url): // Проверяем, существует ли изображение 
                                                        ?>
                                                            <img src="<?php echo esc_url($icon_url); ?>" alt="category-icon">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="catalog-item-group__content">
                                                    <a href="<?php echo esc_url('/' . $catalog_slug . '/' . esc_html($category_slug)); ?>" class="catalog-item-group-title">
                                                        <?php the_title(); ?>
                                                    </a>
                                                    <?php if (!empty($subcategories)) : ?>
                                                        <div class="catalog-item-group-elems">
                                                            <?php foreach ($subcategories as $sub) : ?>
                                                                <a href="<?php echo esc_url('/' . $catalog_slug . '/' . esc_html($category_slug) . '/' . esc_html($sub['subcategory_slug'])); ?>" class="catalog-item-group-elem">
                                                                    <span><?php echo esc_html($sub['subcategory_title']); ?></span>
                                                                    <?php if (!empty($sub['subcategory_extra'])): ?>
                                                                        <div class="catalog-item-group-elem-extra">
                                                                            <?php echo esc_html($sub['subcategory_extra']); ?>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </a>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif;

                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                        <?php foreach ($header_menu_items as $menu_item): ?>
                            <?php
                            // Получаем текущий URL
                            $current_url = $_SERVER['REQUEST_URI']; // Относительный путь из адресной строки, включая языковой префикс
                            $current_slug = trim(parse_url($current_url, PHP_URL_PATH), '/'); // Удаляем слеши и оставляем только путь
                            $current_slug = urldecode($current_slug); // Декодируем URL для работы с кириллицей

                            // Получаем slug из ссылки меню
                            $menu_slug = trim(parse_url($menu_item['menu_item_link'], PHP_URL_PATH), '/'); // Удаляем слеши и оставляем только путь
                            $menu_slug = urldecode($menu_slug); // Декодируем URL для работы с кириллицей

                            // Сравниваем slug текущего URL и меню
                            $is_active = ($current_slug === $menu_slug);
                            ?>
                            <a href="<?php echo esc_url($menu_item['menu_item_link']); ?>"
                                class="header-item <?php echo $is_active ? 'active' : ''; ?>">
                                <?php echo esc_html($menu_item['menu_item_label']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="header-scroll">
                <div class="header-mobile">
                    <div class="header__container header-mobile-container">
                        <div class="icon-menu-wrapper">
                            <div class="header__icon icon-menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo">
                            <img loading="lazy" src="<?php echo esc_url($header_logo); ?>" alt="logo">
                        </a>

                        <div class="header-search">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/search-black.svg" alt="search">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="menu__mobile">
        </div>