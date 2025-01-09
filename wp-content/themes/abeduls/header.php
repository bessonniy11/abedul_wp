<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Abedul</title>
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

        <header class="header">
            <div class="header-top">
                <div class="header__container">
                    <a href="" class="header-contacts-item header-contacts-item-location">
                        <div class="location-icon">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/location.svg" alt="location">
                        </div>
                        <span>г. Москва ул.Дубнинская д. 83, 8-й этаж №819-820-821 </span>
                    </a>
                    <div class="header-top-l">
                        <div class="header-language">
                            <div class="custom-select">
                                <div class="selected-option">
                                    <span class=lang-value>RU</span>
                                    <div class="lang-arrow">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-down.svg" alt="arrow-down">
                                    </div>
                                </div>
                                <ul class="options">
                                    <li data-lang="en">EN</li>
                                    <li data-lang="zh">中文</li>
                                </ul>
                            </div>
                        </div>
                        <a href="#order-a-call-popup" class="header-contacts-item phone-item popup-link">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/phone.svg" alt="phone">
                            <span>Обсудить проект</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-center">
                <div class="header-center__container">
                    <a href="" class="header-logo">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/logo-0.svg" alt="logo">
                    </a>
                    <div class="header-center-info">
                        Производитель <br> интерактивного <br> обрудования
                    </div>
                    <div class="header-search-input-wrapper" data-da=".header-mobile-container,860,0">
                        <div class="header-search-input">
                            <input class="header-search-input__input" type="text" placeholder="Искать продукцию">
                            <img loading="lazy" class="header-search-input__search" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/search.svg"
                                alt="search">
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
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/logo-0.svg" alt="logo">
                    </div>
                    <div class="header-scroll-items" data-da=".menu__mobile,960,2">
                        <div class="header-item catalog-item" data-spollers>
                            <div class="catalog-item-elem">
                                <div class="header-item-icon">
                                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/catalog-item-icon.svg" alt="catalog-item-icon">
                                </div>
                                <span>Каталог</span>
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
                                            $icon = carbon_get_the_post_meta('category_icon');
                                            $subcategories = carbon_get_the_post_meta('subcategories');
                                        ?>
                                            <div class="catalog-item-group">
                                                <div class="catalog-item-group__title-wrapper">
                                                    <div class="catalog-item-group__title">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/layout/img/catalog-icons/01.svg" alt="">
                                                    </div>
                                                </div>
                                                <div class="catalog-item-group__content">
                                                    <div class="catalog-item-group-title">
                                                        <?php the_title(); ?>
                                                    </div>
                                                    <?php if (!empty($subcategories)) : ?>
                                                        <div class="catalog-item-group-elems">
                                                            <?php foreach ($subcategories as $sub) : ?>
                                                                <a href="" class="catalog-item-group-elem">
                                                                    <span><?php echo esc_html($sub['subcategory_title']); ?></span>
                                                                    <div></div>
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
                        <a href="/individual" class="header-item <?php echo is_page('individual') ? 'active' : ''; ?>">Индивидуальный заказ</a>
                        <a href="/services" class="header-item <?php echo is_page('services') ? 'active' : ''; ?>">Услуги</a>
                        <a href="/career" class="header-item <?php echo is_page('career') ? 'active' : ''; ?>">Карьера</a>
                        <a href="/contacts" class="header-item <?php echo is_page('contacts') ? 'active' : ''; ?>">Контакты</a>
                        <a href="/fabric" class="header-item <?php echo is_page('fabric') ? 'active' : ''; ?>">Наша фабрика</a>
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
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/logo-0.svg" alt="logo">
                        </div>

                        <div class="header-search">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/search-black.svg" alt="search">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="menu__mobile">
        </div>