<?php
/* Template Name: Главная */
get_header(); ?>

<main class="page services-page">

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
                    $category_url = site_url('/catalog/' . $slug); // Формируем URL категории
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
                    <div class="main-top-image ibg">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/products/04.png" alt="">
                        <div class="main-top-image-text">
                            Киоск типа INGSCREEN K
                        </div>
                    </div>
                    <div class="main-top-image ibg">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/products/05.png" alt="">
                        <div class="main-top-image-text">
                            Киоск типа INGSCREEN K
                        </div>
                    </div>
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

            <div class="products">
                <div class="block-title">
                    <?php echo esc_html(carbon_get_the_post_meta('popular_products_title')); ?>
                </div>

                <div class="products-items">
                    <!-- Карточка товара -->
                    <div class="product-item">
                        <div class="product-slider swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/02.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/06.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/02.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/06.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/02.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/06.png" alt="Product Image 1"></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                            <p class="product-description">Сенсорный стол</p>
                            <p class="product-article">Артикул 89776</p>
                            <div class="product-buttons">
                                <a href="product.php" class="btn btn-blue">Подробнее</a>
                                <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link">Заказать</a>
                            </div>
                        </div>
                    </div>
                    <!-- Повторяем карточку для остальных товаров -->
                    <div class="product-item">
                        <div class="product-slider swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/products/05.png" alt="Product Image 1">
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                            <p class="product-description">Сенсорный стол</p>
                            <p class="product-article">Артикул 89776</p>
                            <div class="product-buttons">
                                <a href="product.php" class="btn btn-blue">Подробнее</a>
                                <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link">Заказать</a>
                            </div>
                        </div>
                    </div>
                    <!-- Карточка товара -->
                    <div class="product-item">
                        <div class="product-slider swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/04.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/06.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/06.png" alt="Product Image 1"></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                            <p class="product-description">Сенсорный стол</p>
                            <p class="product-article">Артикул 89776</p>
                            <div class="product-buttons">
                                <a href="product.php" class="btn btn-blue">Подробнее</a>
                                <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link">Заказать</a>
                            </div>
                        </div>
                    </div>
                    <!-- Карточка товара -->
                    <div class="product-item">
                        <div class="product-slider swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/02.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/01.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/06.png" alt="Product Image 1"></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                            <p class="product-description">Сенсорный стол</p>
                            <p class="product-article">Артикул 89776</p>
                            <div class="product-buttons">
                                <a href="product.php" class="btn btn-blue">Подробнее</a>
                                <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link">Заказать</a>
                            </div>
                        </div>
                    </div>
                    <!-- Карточка товара -->
                    <div class="product-item">
                        <div class="product-slider swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/04.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/01.png" alt="Product Image 1"></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                            <p class="product-description">Сенсорный стол</p>
                            <p class="product-article">Артикул 89776</p>
                            <div class="product-buttons">
                                <a href="product.php" class="btn btn-blue">Подробнее</a>
                                <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link">Заказать</a>
                            </div>
                        </div>
                    </div>
                    <!-- Карточка товара -->
                    <div class="product-item">
                        <div class="product-slider swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/03.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/01.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/06.png" alt="Product Image 1"></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                            <p class="product-description">Сенсорный стол</p>
                            <p class="product-article">Артикул 89776</p>
                            <div class="product-buttons">
                                <a href="product.php" class="btn btn-blue">Подробнее</a>
                                <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link">Заказать</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                                <div class="main-page-clients-item__elem">Киоск типа INGSCREEN K x6</div>
                                                <div class="main-page-clients-item__elem">Телевизор большого размера x2</div>
                                                <div class="main-page-clients-item__elem">ЖК-ВИДЕОСТЕНА x34</div>
                                            </div>
                                            <a href="/projects/<?php echo esc_html($main_slug); ?>" class="main-page-clients-item__link arrow-link">
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
                    <p>Проекты не найдены.</p>
                <?php endif;
                wp_reset_postdata(); ?>
                <!-- <div class="main-page-clients-items swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="main-page-clients-item">
                                <div class="main-page-clients-item__slider swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="main-page-clients-item-slide ibg">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/products/burger-king.png" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="main-page-clients-item-slide ibg">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/products/02.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-page-clients-item__slider-controls">
                                        <div class="control-left">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-left-blue.svg" alt="arrow-left">
                                        </div>
                                        <div class="control-right">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-blue.svg" alt="arrow-right">
                                        </div>
                                    </div>
                                </div>
                                <div class="main-page-clients-item__content">
                                    <div class="main-page-clients-item__title">Burger King</div>
                                    <div class="main-page-clients-item__subtitle">
                                        Полная комплектация оборудованием 12 точек по всей Москве
                                    </div>
                                    <div class="main-page-clients-item__elems">
                                        <div class="main-page-clients-item__elem">Киоск типа INGSCREEN K x6</div>
                                        <div class="main-page-clients-item__elem">Телевизор большого размера x2</div>
                                        <div class="main-page-clients-item__elem">ЖК-ВИДЕОСТЕНА x34</div>
                                    </div>
                                    <a href="" class="main-page-clients-item__link arrow-link">
                                        <span>Смотреть всю подборку</span>
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-blue.svg" alt="arrow-right">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="main-page-clients-item">
                                <div class="main-page-clients-item__slider swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="main-page-clients-item-slide ibg">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/products/perekrestok.png" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="main-page-clients-item-slide ibg">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/products/05.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-page-clients-item__slider-controls">
                                        <div class="control-left">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-left-blue.svg" alt="arrow-left">
                                        </div>
                                        <div class="control-right">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-blue.svg" alt="arrow-right">
                                        </div>
                                    </div>
                                </div>
                                <div class="main-page-clients-item__content">
                                    <div class="main-page-clients-item__title">Перекресток Супермаркет</div>
                                    <div class="main-page-clients-item__subtitle">
                                        Под ключ подготовили открытие новой точки в зоне касс самообслуживания
                                    </div>
                                    <a href="" class="main-page-clients-item__link arrow-link">
                                        <span>Смотреть всю подборку</span>
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-blue.svg" alt="arrow-right">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="main-page-clients-item">
                                <div class="main-page-clients-item__slider swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="main-page-clients-item-slide ibg">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/products/burger-king.png" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="main-page-clients-item-slide ibg">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/products/06.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-page-clients-item__slider-controls">
                                        <div class="control-left">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-left-blue.svg" alt="arrow-left">
                                        </div>
                                        <div class="control-right">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-blue.svg" alt="arrow-right">
                                        </div>
                                    </div>
                                </div>
                                <div class="main-page-clients-item__content">
                                    <div class="main-page-clients-item__title">Burger King</div>
                                    <div class="main-page-clients-item__subtitle">
                                        Полная комплектация оборудованием 12 точек по всей Москве
                                    </div>
                                    <div class="main-page-clients-item__elems">
                                        <div class="main-page-clients-item__elem">Киоск типа INGSCREEN K x6</div>
                                        <div class="main-page-clients-item__elem">Телевизор большого размера x2</div>
                                        <div class="main-page-clients-item__elem">ЖК-ВИДЕОСТЕНА x34</div>
                                    </div>
                                    <a href="" class="main-page-clients-item__link arrow-link">
                                        <span>Смотреть всю подборку</span>
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-blue.svg" alt="arrow-right">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>