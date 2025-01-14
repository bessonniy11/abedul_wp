<!DOCTYPE html>
<html lang="ru">

<?php
$selected_language = isset($_COOKIE['selected_language']) ? $_COOKIE['selected_language'] : 'ru'; // По умолчанию 'ru'
if ($selected_language == 'ru') {
    $name_header_address_icon = 'header_address_icon';
    $name_header_address_title = 'header_address_title';
    $name_header_contact_icon = 'header_contact_icon';
    $name_header_contact_text = 'header_contact_text';

    $name_header_logo = 'header_logo';
    $name_header_logo_text = 'header_logo_text';
    $name_header_input_text = 'header_input_text';
    $name_header_input_icon = 'header_input_icon';
    $name_header_email = 'header_email';
    $name_header_phone = 'header_phone';

    $name_header_in_o_t = 'header_individual_order_text';
    $name_header_in_o_l = 'header_individual_order_link';
    $name_header_se_t = 'header_services_text';
    $name_header_se_l = 'header_services_link';
    $name_header_ca_t = 'header_career_text';
    $name_header_ca_l = 'header_career_link';
    $name_header_co_t = 'header_contacts_text';
    $name_header_co_l = 'header_contacts_link';
    $name_header_fa_t = 'header_factory_text';
    $name_header_fa_l = 'header_factory_link';

} else if ($selected_language == 'en') {
    $name_header_address_icon = 'header_en_address_icon';
    $name_header_address_title = 'header_en_address_title';
    $name_header_contact_icon = 'header_en_contact_icon';
    $name_header_contact_text = 'header_en_contact_text';

    $name_header_logo = 'header_en_logo';
    $name_header_logo_text = 'header_en_logo_text';
    $name_header_input_text = 'header_en_input_text';
    $name_header_input_icon = 'header_en_input_icon';
    $name_header_email = 'header_en_email';
    $name_header_phone = 'header_en_phone';

    $name_header_in_o_t = 'header_en_individual_order_text';
    $name_header_in_o_l = 'header_en_individual_order_link';
    $name_header_se_t = 'header_en_services_text';
    $name_header_se_l = 'header_en_services_link';
    $name_header_ca_t = 'header_en_career_text';
    $name_header_ca_l = 'header_en_career_link';
    $name_header_co_t = 'header_en_contacts_text';
    $name_header_co_l = 'header_en_contacts_link';
    $name_header_fa_t = 'header_en_factory_text';
    $name_header_fa_l = 'header_en_factory_link';
} 
else if ($selected_language == 'zh') { 
    $name_header_address_icon = 'header_zh_address_icon';
    $name_header_address_title = 'header_zh_address_title';
    $name_header_contact_icon = 'header_zh_contact_icon';
    $name_header_contact_text = 'header_zh_contact_text';

    $name_header_logo = 'header_zh_logo';
    $name_header_logo_text = 'header_zh_logo_text';
    $name_header_input_text = 'header_zh_input_text';
    $name_header_input_icon = 'header_zh_input_icon';
    $name_header_email = 'header_zh_email';
    $name_header_phone = 'header_zh_phone';

    $name_header_in_o_t = 'header_zh_individual_order_text';
    $name_header_in_o_l = 'header_zh_individual_order_link';
    $name_header_se_t = 'header_zh_services_text';
    $name_header_se_l = 'header_zh_services_link';
    $name_header_ca_t = 'header_zh_career_text';
    $name_header_ca_l = 'header_zh_career_link';
    $name_header_co_t = 'header_zh_contacts_text';
    $name_header_co_l = 'header_zh_contacts_link';
    $name_header_fa_t = 'header_zh_factory_text';
    $name_header_fa_l = 'header_zh_factory_link';
}

?>

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
            <?php
                // иконка + название адреса 
                $header_address_icon = '';
                $header_address_title = '';
                if (!empty(carbon_get_theme_option($name_header_address_icon))) {
                    $header_address_icon = carbon_get_theme_option($name_header_address_icon);
                    $header_address_icon = wp_get_attachment_image_url($header_address_icon, 'full');
                }  
                if (!empty(carbon_get_theme_option($name_header_address_title))) {
                    $header_address_title = carbon_get_theme_option($name_header_address_title);
                }
                // Контакты с верху 
                $header_contact_icon = '';
                $header_contact_text = '';
                if (!empty(carbon_get_theme_option($name_header_contact_icon))) {
                    $header_contact_icon = carbon_get_theme_option($name_header_contact_icon);
                    $header_contact_icon = wp_get_attachment_image_url($header_contact_icon, 'full');
                }
                if (!empty(carbon_get_theme_option($name_header_contact_text))) {
                    $header_contact_text = carbon_get_theme_option($name_header_contact_text);
                }
            ?>

            <div class="header-top">
                <div class="header__container">
                    <a href="" class="header-contacts-item header-contacts-item-location">
                        <div class="location-icon">
                            <?php echo '<img loading="lazy" src="'. $header_address_icon .'" alt="location">'; ?>       
                        </div>
                        <span><?php echo esc_html($header_address_title) ?></span> 
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
                            <?php echo '<img loading="lazy" src="'. $header_contact_icon .'" alt="phone">'; ?> 
                            <span><?php echo esc_html($header_contact_text) ?></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="header-center">
                <?php
                    // лого 
                    $header_logo = "";
                    if (!empty(carbon_get_theme_option($name_header_logo))) {
                        $header_logo = carbon_get_theme_option($name_header_logo);
                        $header_logo = wp_get_attachment_image_url($header_logo, 'full');
                    }
                    // текст возле лого 
                    $header_logo_text = "";
                    if (!empty(carbon_get_theme_option($name_header_logo_text))) {
                        $header_logo_text = carbon_get_theme_option($name_header_logo_text);
                    }
                    // строка ввода 
                    $header_input_text = "";
                    $header_input_icon = "";
                    if (!empty(carbon_get_theme_option($name_header_input_text))) {
                        $header_input_text = carbon_get_theme_option($name_header_input_text);
                    }
                    if (!empty(carbon_get_theme_option($name_header_input_icon))) {
                        $header_input_icon = carbon_get_theme_option($name_header_input_icon);
                        $header_input_icon = wp_get_attachment_image_url($header_input_icon, 'full');
                    }
                    // Контакты
                    $header_email = "";
                    $header_phone = "";
                    if (!empty(carbon_get_theme_option($name_header_email))) {
                        $header_email = carbon_get_theme_option($name_header_email);
                    }
                    if (!empty(carbon_get_theme_option($name_header_phone))) {
                        $header_phone = carbon_get_theme_option($name_header_phone);
                    }
                
                ?>
                <div class="header-center__container">
                    <a href="" class="header-logo">
                        <?php echo '<img loading="lazy" src="'. $header_logo .'" alt="logo">' ?>
                    </a>
                    <div class="header-center-info">
                        <?php echo esc_html($header_logo_text) ?>
                    </div>
                    <div class="header-search-input-wrapper" data-da=".header-mobile-container,860,0">
                        <div class="header-search-input">
                            <?php echo '<input class="header-search-input__input" type="text" placeholder="'. esc_html($header_input_text) .'">'; ?>
                            <?php echo '<img loading="lazy" class="header-search-input__search" src="'. $header_input_icon .'" alt="search">'; ?>
                            <div class="header-search-input__close"></div>
                        </div>
                        <div class="header-search-result"></div>
                    </div>
                    <div class="header-center-contacts">
                        <a href="" class="header-contacts-item">
                            <span><?php echo esc_html($header_email) ?></span>
                        </a>
                        <a href="" class="header-contacts-item">
                            <span><?php echo esc_html($header_phone) ?></span>
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
                                <span>
                                    <?php
                                        if ($selected_language == 'ru') {
                                            echo 'Каталог';
                                        } else if ($selected_language == 'en') {
                                            echo 'Catalog';
                                        }  else if ($selected_language == 'zh') {
                                            echo '目录';
                                        }
                                    ?>
                                </span>
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
                                                                    <span> <?php echo esc_html($sub['subcategory_title']); ?> </span>
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
                        <?php
                            $text_1 = !empty(carbon_get_theme_option($name_header_in_o_t)) ? carbon_get_theme_option($name_header_in_o_t) : '';
                            $link_1 = !empty(carbon_get_theme_option($name_header_in_o_l)) ? carbon_get_theme_option($name_header_in_o_l) : '';
                            
                            $text_2 = !empty(carbon_get_theme_option($name_header_se_t)) ? carbon_get_theme_option($name_header_se_t) : '';
                            $link_2 = !empty(carbon_get_theme_option($name_header_se_l)) ? carbon_get_theme_option($name_header_se_l) : '';
                            
                            $text_3 = !empty(carbon_get_theme_option($name_header_ca_t)) ? carbon_get_theme_option($name_header_ca_t) : '';
                            $link_3 = !empty(carbon_get_theme_option($name_header_ca_l)) ? carbon_get_theme_option($name_header_ca_l) : '';
                            
                            $text_4 = !empty(carbon_get_theme_option($name_header_co_t)) ? carbon_get_theme_option($name_header_co_t) : '';
                            $link_4 = !empty(carbon_get_theme_option($name_header_co_l)) ? carbon_get_theme_option($name_header_co_l) : '';
                            
                            $text_5 = !empty(carbon_get_theme_option($name_header_fa_t)) ? carbon_get_theme_option($name_header_fa_t) : '';
                            $link_5 = !empty(carbon_get_theme_option($name_header_fa_l)) ? carbon_get_theme_option($name_header_fa_l) : '';
                            $menu_items = [
                                'individual' => ['link' => $link_1, 'text' => $text_1],
                                'services'   => ['link' => $link_2, 'text' => $text_2],
                                'career'     => ['link' => $link_3, 'text' => $text_3],
                                'contacts'   => ['link' => $link_4, 'text' => $text_4],
                                'fabric'     => ['link' => $link_5, 'text' => $text_5],
                            ];
                            foreach ($menu_items as $page => $item) {
                                echo '<a href="' . esc_html($item['link']) . '" class="header-item ' . (is_page($page) ? 'active' : '') . '">' . esc_html($item['text']) . '</a>';
                            }
                        ?>
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