<?php
/* Template Name: Main */
get_header(); ?>

<main class="page">

    <div class="main-page main-page__container">
        <?php
        $query = new WP_Query(array(
            'post_type' => 'category_group',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ));

        if ($query->have_posts()) : ?>
            <div class="side-bar" id="sideBarContainer">
                <?php while ($query->have_posts()) : $query->the_post();
                    $icon = carbon_get_the_post_meta('category_icon');
                    $slug = carbon_get_the_post_meta('category_slug');
                    $subcategories = carbon_get_the_post_meta('subcategories');
                    // Определяем slug для текущего языка
                    if ($current_language === 'ru') {
                        $catalog_slug = 'каталог';
                    } elseif ($current_language === 'zh') {
                        $catalog_slug = 'catalog-zh'; // Пример перевода "каталог" на китайский (можете заменить на нужное слово)
                    } else {
                        $catalog_slug = 'catalog'; // По умолчанию английский
                    }

                    // Формируем URL категории
                    $category_url = site_url('/' . $catalog_slug . '/' . $slug);
                ?>
                    <div class="side-bar-item">
                        <div class="side-bar-item__content">
                            <span><?php the_title(); ?></span>
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-a.svg" alt="arrow-right">
                        </div>
                        <?php if (!empty($subcategories)): ?>
                            <div class="side-bar-item__subcontent">
                                <div class="subcontent-elems">
                                    <?php foreach ($subcategories as $sub):
                                        $subcategory_url = $category_url . '/' . $sub['subcategory_slug']; // Формируем URL подкатегории
                                    ?>
                                        <a href="<?php echo esc_url($subcategory_url); ?>" class="side-bar-item">
                                            <div class="side-bar-item__content">
                                                <?php if (!empty($sub['subcategory_icon'])): ?>
                                                    <img src="<?php echo esc_url(wp_get_attachment_url($sub['subcategory_icon'])); ?>" alt="<?php echo esc_html($sub['subcategory_title']); ?>">
                                                <?php endif; ?>
                                                <span><?php echo esc_html($sub['subcategory_title']); ?></span>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>

        <div class="main-page-content">

            <div class="main-page-content-top">
                <div class="main-top-slider swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        $slider_items = carbon_get_the_post_meta('main_slider');
                        if (!empty($slider_items)) :
                            foreach ($slider_items as $slide) :
                                $slide_image = wp_get_attachment_image_url($slide['slide_image'], 'full');
                                $slide_title = $slide['slide_title'];
                                $slide_subtitle = $slide['slide_subtitle'];
                                $slide_button_text = $slide['slide_button_text'];
                                $slide_button_link = $slide['slide_button_link'];
                        ?>
                                <div class="swiper-slide">
                                    <div class="main-top-slider-item ibg">
                                        <?php if ($slide_image) : ?>
                                            <img loading="lazy" src="<?php echo esc_url($slide_image); ?>" alt="">
                                        <?php endif; ?>
                                        <div class="main-top-slider-info">
                                            <?php if ($slide_title) : ?>
                                                <div class="main-top-slider-title"><?php echo esc_html($slide_title); ?></div>
                                            <?php endif; ?>
                                            <?php if ($slide_subtitle) : ?>
                                                <div class="main-top-slider-subtitle">
                                                    <span><?php echo esc_html($slide_subtitle); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($slide_button_text && $slide_button_link) : ?>
                                                <a href="/<?php echo esc_html($slide_button_link); ?>" class="btn btn-white main-top-slider-btn">
                                                    <?php echo esc_html($slide_button_text); ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <div class="main-top-slider-pagination"></div>
                </div>

                <div class="main-top-images">
                    <?php
                    // Создаем WP_Query для популярных товаров
                    $query = new WP_Query([
                        'post_type'      => 'product',
                        'posts_per_page' => -1, // Выводим все товары, можно ограничить, например, 8
                        'meta_query'     => [
                            [
                                'key'     => 'product_in_main_slider', // Поле Carbon Fields
                                'value'   => 'yes',             // Проверяем значение чекбокса
                                'compare' => '=',
                            ],
                        ],
                    ]);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            // Получаем данные товара
                            $product_name = carbon_get_the_post_meta('product_name');
                            $product_sku = carbon_get_the_post_meta('product_sku');
                            $product_main_description = carbon_get_the_post_meta('product_main_description');
                            $product_gallery = carbon_get_the_post_meta('product_gallery');
                            $product_read_more_btn = carbon_get_the_post_meta('product_read_more_btn') ?: 'Подробнее';
                            $product_order_btn = carbon_get_the_post_meta('product_order_btn') ?: 'Заказать';
                    ?>
                            <?php if (!empty($product_gallery)) {
                                // Ищем первое изображение
                                foreach ($product_gallery as $gallery_item) {
                                    if ($gallery_item['type'] === 'image' && !empty($gallery_item['image'])) {
                                        $first_image_url = wp_get_attachment_image_url($gallery_item['image'], 'full'); // Получаем URL первого изображения
                                        break; // Прерываем цикл после нахождения первого изображения
                                    }
                                }
                            }
                            ?>
                            <!-- Карточка товара -->
                            <a href="<?php the_permalink(); ?>" class="main-top-image ibg">
                                <?php if (isset($first_image_url)) : ?>
                                    <img loading="lazy" src="<?php echo esc_url($first_image_url); ?>" alt="<?php echo esc_attr($product_name); ?>">
                                <?php endif; ?>
                                <div class="main-top-image-text">
                                    <?php echo esc_html($product_name); ?>
                                </div>
                            </a>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <p></p>
                    <?php endif; ?>
                </div>
            </div>

            <?php
            $info_items = carbon_get_the_post_meta('main_page_info_items');
            if (!empty($info_items)) :
            ?>

                <div class="main-page-info-items">
                    <?php

                    foreach ($info_items as $item) :
                        $info_icon = wp_get_attachment_image_url($item['info_icon'], 'full');
                        $info_text = $item['info_text'];
                    ?>
                        <div class="main-page-info-item">
                            <?php if ($info_icon) : ?>
                                <img loading="lazy" src="<?php echo esc_url($info_icon); ?>" alt="page-info-icon">
                            <?php endif; ?>
                            <span><?php echo esc_html($info_text); ?></span>
                        </div>
                    <?php
                    endforeach;
                    ?>

                </div>

            <?php endif; ?>

            <?php
            // Создаем WP_Query для популярных товаров
            $query = new WP_Query([
                'post_type'      => 'product',
                'posts_per_page' => -1, // Выводим все товары, можно ограничить, например, 8
                'meta_query'     => [
                    [
                        'key'     => 'product_featured', // Поле Carbon Fields
                        'value'   => 'yes',             // Проверяем значение чекбокса
                        'compare' => '=',
                    ],
                ],
            ]);
            if ($query->have_posts()) :
            ?>
                <div class="products">
                    <div class="block-title">
                        <?php echo esc_html(carbon_get_the_post_meta('popular_products_title')); ?>
                    </div>

                    <div class="products-items">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                // Получаем данные товара
                                $product_name = carbon_get_the_post_meta('product_name');
                                $product_sku = carbon_get_the_post_meta('product_sku');
                                $product_screen_resolution = carbon_get_the_post_meta('product_screen_resolution');
                                $product_artikul_name = carbon_get_the_post_meta('product_artikul_name');
                                $product_main_description = carbon_get_the_post_meta('product_main_description');
                                $product_shot_description = carbon_get_the_post_meta('product_shot_description');
                                $product_gallery = carbon_get_the_post_meta('product_gallery');
                                $product_read_more_btn = carbon_get_the_post_meta('product_read_more_btn') ?: 'Подробнее';
                                $product_order_btn = carbon_get_the_post_meta('product_order_btn') ?: 'Заказать';
                        ?>
                                <!-- Карточка товара -->
                                <div class="product-item">
                                    <div class="product-slider swiper">
                                        <div class="swiper-wrapper">
                                            <?php if (!empty($product_gallery)) : ?>
                                                <?php foreach ($product_gallery as $gallery_item) : ?>
                                                    <?php if ($gallery_item['type'] === 'image') : ?>
                                                        <a data-fslightbox="<?php echo esc_html($product_name); ?>" href="<?php echo wp_get_attachment_image_url($gallery_item['image'], 'full'); ?>" class="swiper-slide ibg ibg-ibg_contain">
                                                            <img src="<?php echo wp_get_attachment_image_url($gallery_item['image'], 'full'); ?>"
                                                                alt="<?php echo esc_attr($gallery_item['alt_text']); ?>">
                                                        </a>
                                                    <?php elseif ($gallery_item['type'] === 'video') : ?>
                                                        <a data-fslightbox="<?php echo esc_html($product_name); ?>" href="<?php echo wp_get_attachment_url($gallery_item['video']); ?>" class="swiper-slide">
                                                            <img src="<?php echo wp_get_attachment_image_url($gallery_item['video_preview'], 'full'); ?>"
                                                                alt="<?php echo esc_attr($gallery_item['alt_text']); ?>">
                                                            <img loading="lazy" class="play" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/play.svg" alt="play">
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
                                            <a href="<?php the_permalink(); ?>" class="btn btn-blue"><?php echo esc_html($product_read_more_btn); ?></a>
                                            <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link" data-product-name="<?php echo esc_html($product_name); ?>">
                                                <?php echo esc_html($product_order_btn); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            ?>
                            <p><?php echo esc_html(carbon_get_the_post_meta('products_empty_text')); ?></p>
                        <?php endif; ?>
                    </div>

                </div>

            <?php endif; ?>

            <div class="main-page-clients">
                <div class="main-page-clients-top">
                    <div class="block-title">
                        <?php echo esc_html(carbon_get_the_post_meta('we_are_trusted_title')); ?>
                    </div>
                    <a href="/<?php echo esc_html(carbon_get_the_post_meta('all_projects_link')); ?>" class="main-page-clients-top__link arrow-link">
                        <span><?php echo esc_html(carbon_get_the_post_meta('all_projects_link_text')); ?></span>
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-blue.svg" alt="arrow-right">
                    </a>
                </div>
                <?php
                // Получаем проекты
                $projects = new WP_Query([
                    'post_type' => 'projects',
                    'posts_per_page' => -1, // Все проекты
                ]);

                if ($projects->have_posts()) : ?>
                    <div class="main-page-clients-items swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            while ($projects->have_posts()) : $projects->the_post();
                                $main_image = carbon_get_post_meta(get_the_ID(), 'project_main_image');
                                $main_slug = carbon_get_post_meta(get_the_ID(), 'project_slug');
                                $project_subtitle = carbon_get_post_meta(get_the_ID(), 'project_subtitle');
                                $main_image_url = $main_image ? wp_get_attachment_image_url($main_image, 'medium') : '';
                                $project_gallery = carbon_get_post_meta(get_the_ID(), 'project_gallery');
                                $project_see_more_btn = carbon_get_post_meta(get_the_ID(), 'project_see_more_btn');
                                // Получаем ссылку project
                                $project_permalink = get_permalink(get_the_ID());
                            ?>
                                <div class="swiper-slide">
                                    <div class="main-page-clients-item">
                                        <div class="main-page-clients-item__slider swiper-container">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="main-page-clients-item-slide ibg">
                                                        <img loading="lazy" src="<?php echo esc_url($main_image_url); ?>" alt="">
                                                    </div>
                                                </div>
                                                <?php if (!empty($project_gallery)): ?>
                                                    <?php foreach ($project_gallery as $item): ?>
                                                        <?php $img_url = wp_get_attachment_image_url($item['gallery_image'], 'full'); ?>
                                                        <div class="swiper-slide">
                                                            <div class="main-page-clients-item-slide ibg">
                                                                <img loading="lazy" src="<?php echo $img_url; ?>" alt="">
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (count($project_gallery) > 1): ?>
                                                <div class="main-page-clients-item__slider-controls">
                                                    <div class="control-left">
                                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-left-blue.svg" alt="arrow-left">
                                                    </div>
                                                    <div class="control-right">
                                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-blue.svg" alt="arrow-right">
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="main-page-clients-item__content">
                                            <div class="main-page-clients-item__title"><?php the_title(); ?></div>
                                            <div class="main-page-clients-item__subtitle">
                                                <?php echo $project_subtitle; ?>
                                            </div>
                                            <div class="main-page-clients-item__elems">
                                                <?php
                                                $project_products = carbon_get_the_post_meta('project_related_products');
                                                ?>
                                                <?php
                                                if (!empty($project_products)) :
                                                    foreach ($project_products as $product) :
                                                        // Получаем данные сопутствующего товара по его ID
                                                        $product_name = carbon_get_post_meta($product['id'], 'product_name');
                                                        // Получаем ссылку и миниатюру для товара
                                                        $product_permalink = get_permalink($product['id']);
                                                ?>
                                                        <a href="<?php echo esc_html($product_permalink); ?>" target="_blank" class="main-page-clients-item__elem">
                                                            <?php echo esc_html($product_name); ?>
                                                        </a>
                                                    <?php
                                                    endforeach;
                                                    wp_reset_postdata();
                                                else :
                                                    ?>
                                                    <p></p>
                                                <?php endif; ?>
                                            </div>
                                            <a href="<?php echo esc_html($project_permalink); ?>" class="main-page-clients-item__link arrow-link">
                                                <span><?php echo esc_html($project_see_more_btn); ?></span>
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-blue.svg" alt="arrow-right">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <p><?php echo esc_html(carbon_get_the_post_meta('projects_empty_text')); ?></p>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>