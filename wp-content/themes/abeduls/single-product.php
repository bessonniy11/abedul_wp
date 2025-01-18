<?php
/* Template Name: Продукт */

$product_name = carbon_get_the_post_meta('product_name');
$product_sku = carbon_get_the_post_meta('product_sku');
$product_screen_resolution = carbon_get_the_post_meta('product_screen_resolution');
$product_artikul_name = carbon_get_the_post_meta('product_artikul_name');
$product_download_attributes_btn = carbon_get_the_post_meta('product_download_attributes_btn');
$product_main_description = carbon_get_the_post_meta('product_main_description');
$product_shot_description = carbon_get_the_post_meta('product_shot_description');
$product_gallery = carbon_get_the_post_meta('product_gallery');
// Получаем характеристики продукта
$product_attributes = carbon_get_the_post_meta('product_attributes');


$product_description_title = carbon_get_the_post_meta('product_description_title');
$product_description = carbon_get_the_post_meta('product_description');
$product_attributes_title = carbon_get_the_post_meta('product_attributes_title');
$product_attributes_subtitle = carbon_get_the_post_meta('product_attributes_subtitle');
$product_payment_description_title = carbon_get_the_post_meta('product_payment_description_title');
$product_payment_description = carbon_get_the_post_meta('product_payment_description');
$product_certificate_title = carbon_get_the_post_meta('product_certificate_title');
$product_certificates = carbon_get_the_post_meta('product_certificates');


$product_opportunities_title = carbon_get_the_post_meta('product_opportunities_title');
$product_opportunities_gallery = carbon_get_the_post_meta('product_opportunities_gallery');

$product_additional_blocks = carbon_get_the_post_meta('product_additional_blocks');

$product_related_products_title = carbon_get_the_post_meta('product_related_products_title');
$product_related_products = carbon_get_the_post_meta('product_related_products');

// кнопки
$product_read_more_btn = carbon_get_the_post_meta('product_read_more_btn') ?: 'Подробнее';
$product_order_btn = carbon_get_the_post_meta('product_order_btn') ?: 'Заказать';

$breadcrumbs_main = carbon_get_post_meta(get_the_ID(), 'breadcrumbs_main') ?: 'Главная';
$breadcrumbs_catalog = carbon_get_post_meta(get_the_ID(), 'breadcrumbs_catalog') ?: 'Каталог';

// Получаем текущий язык
$current_language = pll_current_language();
// Определяем slug для текущего языка
$catalog_slug = ($current_language === 'ru') ? 'каталог' : 'catalog';

get_header(); ?>

<main class="page product-page">
    <div class="page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs-link"><?php echo esc_html($breadcrumbs_main); ?> / </a></li>
                <li class="breadcrumbs-item"><a href="/<?php echo esc_html($catalog_slug); ?>" class="breadcrumbs-link"><?php echo esc_html($breadcrumbs_catalog); ?> / </a></li>
            </ul>
        </nav>

        <div class="block-title">
            <?php echo esc_html($product_name); ?>
        </div>

        <div class="product-top">
            <div class="product-slider">
                <div class="product-slider__thumbnails">
                    <button class="product-slider__thumb-nav product-slider__thumb-nav--up">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-top.svg" alt="arrow-top">
                    </button>
                    <div class="product-slider__thumb-container">
                        <div class="swiper-container product-slider__thumbs">
                            <!-- max5 -->
                            <div class="swiper-wrapper <?php echo count($product_gallery) < 5 ? 'max5' : ''; ?>">
                                <?php if (!empty($product_gallery)) : ?>
                                    <?php foreach ($product_gallery as $gallery_item) : ?>
                                        <div class="swiper-slide">
                                            <div class="thumb-img">
                                                <?php if ($gallery_item['type'] === 'image') : ?>
                                                    <img loading="lazy" src="<?php echo wp_get_attachment_image_url($gallery_item['image'], 'full'); ?>"
                                                        alt="<?php echo esc_attr($gallery_item['alt_text']); ?>" class="product-slider__thumb">
                                                <?php elseif ($gallery_item['type'] === 'video') : ?>
                                                    <img loading="lazy" src="<?php echo wp_get_attachment_image_url($gallery_item['video_preview'], 'full'); ?>"
                                                        alt="<?php echo esc_attr($gallery_item['alt_text']); ?>" class="product-slider__thumb">
                                                    <img loading="lazy" class="play" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/play.svg" alt="play">
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <button class="product-slider__thumb-nav product-slider__thumb-nav--down">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-down.svg" alt="arrow-down">
                    </button>
                </div>

                <div class="product-slider__main">
                    <div class="swiper product-slider-main">
                        <div class="swiper-wrapper">
                            <?php if (!empty($product_gallery)) : ?>
                                <?php foreach ($product_gallery as $gallery_item) : ?>
                                    <div class="swiper-slide">
                                        <?php if ($gallery_item['type'] === 'image') : ?>
                                            <a data-fslightbox="<?php echo esc_html($product_name); ?>" href="<?php echo wp_get_attachment_image_url($gallery_item['image'], 'full'); ?>">
                                                <img src="<?php echo wp_get_attachment_image_url($gallery_item['image'], 'full'); ?>"
                                                    alt="<?php echo esc_attr($gallery_item['alt_text']); ?>" class="product-img">
                                            </a>
                                        <?php elseif ($gallery_item['type'] === 'video') : ?>
                                            <a data-fslightbox="<?php echo esc_html($product_name); ?>" href="<?php echo wp_get_attachment_url($gallery_item['video']); ?>">
                                                <img src="<?php echo wp_get_attachment_image_url($gallery_item['video_preview'], 'full'); ?>"
                                                    alt="<?php echo esc_attr($gallery_item['alt_text']); ?>" class="product-img">
                                                <img loading="lazy" class="play" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/play.svg" alt="play">
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-slider-main-controls">
                <div class="control-left">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-left-blue.svg" alt="arrow-left">
                </div>
                <div class="control-right">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-blue.svg" alt="arrow-right">
                </div>
            </div>

            <div class="product-main-info">
                <div class="product-main-info__title block-title"><?php echo esc_html($product_name); ?></div>
                <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link"
                    data-product-name="<?php echo esc_html($product_name); ?>">
                    <?php echo esc_html($product_order_btn); ?>
                </a>
                <a href="" class="product-main-info__download">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/excel.svg" alt="excel">
                    <span><?php echo esc_html($product_download_attributes_btn); ?></span>
                </a>
                <div class="product-main-info__article">
                    <?php echo esc_html($product_artikul_name); ?> <?php echo esc_html($product_sku); ?>
                </div>
                <div class="product-main-info__text">
                    <?php echo wp_kses_post(nl2br($product_main_description)); ?>
                </div>
                <div class="product-main-info__items">
                    <?php
                    // Проверяем, есть ли характеристики и проходим по ним
                    if (!empty($product_attributes)) :
                        foreach ($product_attributes as $attribute) :
                            // Проверяем, установлена ли галочка для вывода характеристики
                            if (!empty($attribute['attribute_for_description'])) :
                    ?>
                                <div class="product-main-info__item">
                                    <div class="product-main-info__item-title"><?php echo esc_html($attribute['attribute_name']); ?></div>
                                    <div class="product-main-info__item-text"><?php echo esc_html($attribute['attribute_value']); ?></div>
                                </div>
                    <?php
                            endif;
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <div class="product-descriptions">
            <div class="tabs">
                <button class="tab-link active" data-tab="description">
                    <?php echo esc_html($product_description_title); ?>
                </button>
                <button class="tab-link" data-tab="specifications">
                    <span><?php echo esc_html($product_attributes_title); ?></span>
                </button>
                <button class="tab-link" data-tab="payment">
                    <?php echo esc_html($product_payment_description_title); ?>
                </button>
                <?php if (!empty($product_certificates)) : ?>
                    <button class="tab-link" data-tab="certificates">
                        <?php echo esc_html($product_certificate_title); ?>
                    </button>
                <?php endif; ?>
            </div>

            <div class="tab-content">
                <!-- Описание -->
                <div class="tab-pane description active">
                    <?php echo wp_kses_post(nl2br($product_description)); ?>
                </div>

                <!-- Технические характеристики -->
                <div class="tab-pane specifications">
                    <h3><span><?php echo esc_html($product_attributes_subtitle); ?></span></h3>
                    <ul class="spec-list">
                        <?php
                        // Проверяем, есть ли характеристики и проходим по ним
                        if (!empty($product_attributes)) :
                            foreach ($product_attributes as $attribute) :
                        ?>
                                <li>
                                    <div class="spec-name"><?php echo esc_html($attribute['attribute_name']); ?></div>
                                    <div class="spec-value"><?php echo esc_html($attribute['attribute_value']); ?></div>
                                </li>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>

                <!-- Оплата -->
                <div class="tab-pane payment">
                    <?php echo wp_kses_post(nl2br($product_payment_description)); ?>
                </div>

                <!-- Сертификаты -->
                <?php if (!empty($product_certificates)) : ?>
                    <div class="tab-pane certificates">
                        <?php foreach ($product_certificates as $product_certificate) : ?>
                            <a data-fslightbox="certificate" href="<?php echo wp_get_attachment_image_url($product_certificate, 'full'); ?>" class="certificate">
                                <img loading="lazy" src="<?php echo wp_get_attachment_image_url($product_certificate, 'full'); ?>" alt="certificate-img">
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="opportunities">
            <div class="block-title">
                <?php echo esc_html($product_opportunities_title); ?>
            </div>

            <?php if (!empty($product_opportunities_gallery)) : ?>
                <div class="opportunities-icons">
                    <?php foreach ($product_opportunities_gallery as $product_opportunities_item) : ?>
                        <img loading="lazy" src="<?php echo wp_get_attachment_image_url($product_opportunities_item, 'full'); ?>" alt="opportunities-img">
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="opportunities-items">
                <?php
                // Проверяем, есть ли блоки
                if (!empty($product_additional_blocks)) :
                    foreach ($product_additional_blocks as $block) :
                        // Получаем текст и изображение
                        $block_text = $block['product_additional_block_text'] ?? '';
                        $block_image = $block['product_additional_block_text_image'] ?? '';
                ?>
                        <div class="opportunities-item">
                            <div class="opportunities-item__content">
                                <!-- Вывод текста блока -->
                                <div class="opportunities-item__content-text">
                                    <?php echo wp_kses_post(nl2br($block_text)); ?>
                                </div>
                            </div>
                            <!-- Если есть изображение, выводим его -->
                            <?php if (!empty($block_image)) : ?>
                                <div class="opportunities-item__img">
                                    <img loading="lazy" src="<?php echo esc_url(wp_get_attachment_image_url($block_image, 'full')); ?>" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <div class="products">
            <div class="block-title"><?php echo esc_html($product_related_products_title); ?></div>

            <div class="products-items">
                <?php
                if (!empty($product_related_products)) :
                    foreach ($product_related_products as $product) :
                        // Получаем данные сопутствующего товара по его ID
                        $product_name = carbon_get_post_meta($product['id'], 'product_name');
                        $product_sku = carbon_get_post_meta($product['id'], 'product_sku');
                        $product_screen_resolution = carbon_get_post_meta($product['id'], 'product_screen_resolution');
                        $product_artikul_name = carbon_get_post_meta($product['id'], 'product_artikul_name');
                        $product_main_description = carbon_get_post_meta($product['id'], 'product_main_description');
                        $product_shot_description = carbon_get_post_meta($product['id'], 'product_shot_description');
                        $product_gallery = carbon_get_post_meta($product['id'], 'product_gallery');
                        $product_read_more_btn = carbon_get_post_meta($product['id'], 'product_read_more_btn') ?: 'Подробнее';
                        $product_order_btn = carbon_get_post_meta($product['id'], 'product_order_btn') ?: 'Заказать';

                        // Получаем ссылку и миниатюру для товара
                        $product_permalink = get_permalink($product['id']);
                        $product_thumbnail = get_the_post_thumbnail_url($product['id'], 'medium');
                ?>
                        <!-- Карточка товара -->
                        <div class="product-item">
                            <div class="product-slider swiper">
                                <div class="swiper-wrapper">
                                    <?php if (!empty($product_gallery)) : ?>
                                        <?php foreach ($product_gallery as $gallery_item) : ?>
                                            <?php if ($gallery_item['type'] === 'image') : ?>
                                                <a data-fslightbox="<?php echo esc_html($product_name); ?>" href="<?php echo wp_get_attachment_image_url($gallery_item['image'], 'full'); ?>" class="swiper-slide">
                                                    <img src="<?php echo wp_get_attachment_image_url($gallery_item['image'], 'full'); ?>"
                                                        alt="<?php echo esc_attr($gallery_item['alt_text']); ?>">
                                                </a>
                                            <?php elseif ($gallery_item['type'] === 'video') : ?>
                                                <a data-fslightbox="<?php echo esc_html($product_name); ?>" href="<?php echo wp_get_attachment_url($gallery_item['video']); ?>" class="swiper-slide">
                                                    <img src="<?php echo wp_get_attachment_image_url($gallery_item['video_preview'], 'full'); ?>"
                                                        alt="<?php echo esc_attr($gallery_item['alt_text']); ?>">
                                                    <img class="play" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/play.svg" alt="play">
                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title"><?php echo esc_html($product_name); ?></h3>
                                <p class="product-description"><?php echo esc_html($product_shot_description); ?></p>
                                <?php if (!empty($product_sku)) : ?>
                                    <p class="product-article"><?php echo esc_html($product_artikul_name); ?> <?php echo esc_html($product_sku); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($product_main_description)) : ?>
                                    <p class="product-description product-description-text"><?php echo esc_html($product_main_description); ?></p>
                                <?php endif; ?>
                                <div class="product-buttons">
                                    <a href="<?php echo $product_permalink ?>" class="btn btn-blue"><?php echo esc_html($product_read_more_btn); ?></a>
                                    <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link"
                                        data-product-name="<?php echo esc_attr($product_name); ?>">
                                        <?php echo esc_html($product_order_btn); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                else :
                    ?>
                    <p></p>
                <?php endif; ?>
            </div>

            <div class="helper-form">
                <img loading="lazy" class="happy" src="<?php echo get_template_directory_uri(); ?>/layout/img/happy-women.png" alt="happy">

                <div class="helper-form__content form-wrapper">
                    <div class="block-title">Поможем подобрать</div>
                    <div class="block-subtitle">
                        Предложим варианты, подходящие под различные бюджеты,
                        а также консультацию опытных специалистов для оптимизации затрат
                    </div>

                    <form class="helper-form__form form" id="contact-form">
                        <div class="form-item white" aria-required="true" field-name="firstName">
                            <input placeholder="Ваше имя" type="text" name="name" class="form-item-input">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <div class="form-item white" aria-required="true" field-name="phone">
                            <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input
                                class="form-item-input form-item-input-phone">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <button class="btn btn-blue">
                            Получить консультацию
                        </button>

                    </form>

                    <div class="loader"></div>
                    <div class="form-sending">
                        <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/check.svg" alt="check">
                        <div class="form-sending__title">
                            Спасибо за обращение!
                        </div>
                        <div class="form-sending__subtitle">
                            Мы свяжемся с Вами в ближайшее время
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-page-form form-wrapper">

            <div class="main-page-form__title">
                Не нашли, что искали?
            </div>
            <div class="main-page-form__subtitle">
                Предложим варианты, подходящие под различные бюджеты, а также консультацию опытных специалистов для
                оптимизации затрат
            </div>

            <form class="main-page-form__form form" id="contact-form">
                <div class="form-item white" aria-required="true" field-name="firstName">
                    <!-- <label class="form-item-label">
                            <span class="form-item-label-value">Ваше имя</span>
                            <span class="required-item">*</span>
                        </label> -->
                    <input placeholder="Ваше имя" type="text" name="name" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item white" aria-required="true" field-name="phone">
                    <!-- <label class="form-item-label">
                            <span class="form-item-label-value">Телефон</span>
                            <span class="required-item">*</span>
                        </label> -->
                    <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input
                        class="form-item-input form-item-input-phone">
                    <span class="form-item-confirm-check"></span>
                </div>

                <button class="btn btn-form-white">
                    Получить консультацию
                </button>

            </form>

            <div class="loader"></div>
            <div class="form-sending">
                <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/check.svg" alt="check">
                <div class="form-sending__title">
                    Спасибо за обращение!
                </div>
                <div class="form-sending__subtitle">
                    Мы свяжемся с Вами в ближайшее время
                </div>
            </div>
        </div>


</main>

<?php get_footer(); ?>