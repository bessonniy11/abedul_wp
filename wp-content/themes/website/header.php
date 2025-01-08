<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <title>Abedul</title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Handlee:wght@400;&display=swap" rel="stylesheet"> 
    -->

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.typekit.net/jby8qxe.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.0.1/build/css/intlTelInput.css">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>  /assets/img/favicon.svg">
    <!-- 
    
    
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/style.css?ver=4">

    -->

    <?php wp_head(); ?>

</head>

<body class="preload lock">
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <div id="overlay" class="overlay"></div>

    <div class="wrapper">

        <header class="header">
            <div class="header-top">
                <div class="header__container">
                    <a href="" class="header-contacts-item header-contacts-item-location">
                        <div class="location-icon">
                            <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/location.svg" alt="location">
                        </div>
                        <span>г. Москва ул.Дубнинская д. 83, 8-й этаж №819-820-821 </span>
                    </a>
                    <div class="header-top-l">
                        <div class="header-language">
                            <div class="custom-select">
                                <div class="selected-option">
                                    <span class=lang-value>RU</span>
                                    <div class="lang-arrow">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-down.svg" alt="arrow-down">
                                    </div>
                                </div>
                                <ul class="options">
                                    <li data-lang="en">EN</li>
                                    <li data-lang="zh">中文</li>
                                </ul>
                            </div>
                        </div>
                        <a href="#order-a-call-popup" class="header-contacts-item phone-item popup-link">
                            <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/phone.svg" alt="phone">
                            <span>Обсудить проект</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-center">
                <div class="header-center__container">
                    <a href="" class="header-logo">
                        <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/logo-0.svg" alt="logo">
                    </a>
                    <div class="header-center-info">
                        Производитель <br> интерактивного <br> обрудования
                    </div>
                    <div class="header-search-input-wrapper" data-da=".header-mobile-container,860,0">
                        <div class="header-search-input">
                            <input class="header-search-input__input" type="text" placeholder="Искать продукцию">
                            <img loading="lazy" class="header-search-input__search" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/search.svg" alt="search">
                            <div class="header-search-input__close"></div>
                        </div>
                        <div class="header-search-result"></div>
                    </div>
                    <div class="header-center-contacts">
                        <a href="" class="header-contacts-item">
                            <span>info_abedul@mail.ru</span>
                        </a>
                        <a href="" class="header-contacts-item">
                            <span>+7 999-957-45-89</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="header__container">
                    <div class="header-logo">
                        <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/logo-0.svg" alt="logo">
                    </div>
                    <div class="header-scroll-items" data-da=".menu__mobile,960,2">

                        <div class="header-item catalog-item" data-spollers>
                            <div class="catalog-item-elem">
                                <div class="header-item-icon">
                                    <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/catalog-item-icon.svg" alt="catalog-item-icon">
                                </div>
                                <span>Каталог</span>
                                <div class="header-item-icon header-item-icon-arrow-down">
                                    <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-down-white.svg" alt="arrow-down">
                                </div>
                            </div>

                            <div class="catalog-mobile-trigger"></div>

                            <div class="catalog-container-wrapper" id="catalog-container-wrapper">
                                <div id="catalog-container" class="catalog-container">
                                <?php 
                                $catalogItems = get_field('catalog_Items');
                                foreach ($catalogItems as $item):
                                    
                                ?>
                                    <div class="catalog-item-group">
                                        <!-- Заголовок группы с иконкой -->
                                        <div class="catalog-item-group__title-wrapper">
                                            <div class="catalog-item-group__title">
                                                <img src="<?php echo esc_url($item['catalog_item_icon']); ?>" alt="<?php echo esc_attr($item['catalog_item_title']); ?>">
                                            </div>
                                        </div>

                                        <!-- Контент группы -->
                                        <div class="catalog-item-group__content">
                                            <div class="catalog-item-group-title">
                                                <?php echo esc_html($item['catalog_item_title']); ?>
                                            </div>

                                            <div class="catalog-item-group-elems">
                                                <?php foreach ($item['catalog_item_elements'] as $element): ?>
                                                    <div class="catalog-item-group-elem">
                                                        <span><?php echo esc_html($element['catalog_item_element_name']); ?></span>
                                                        <?php if (!empty($element['catalog_item_element_extra'])): ?>
                                                            <span class="catalog-item-group-elem-extra">
                                                                <?php echo esc_html($element['catalog_item_element_extra']); ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach; ?>


                                </div>
                            </div>
                        </div>

                        <a href="" class="header-item">Индивидуальный заказ</a>
                        <a href="" class="header-item">Услуги</a>
                        <a href="" class="header-item">Карьера</a>
                        <a href="" class="header-item">Контакты</a>
                        <a href="" class="header-item">Наша фабрика</a>
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
                        <div class="header-logo">
                            <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/logo-0.svg" alt="logo">
                        </div>

                        <div class="header-search">
                            <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/search-black.svg" alt="search">
                        </div>
                    </div>
                </div>
            </div>
        </header>