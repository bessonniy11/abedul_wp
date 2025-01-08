<?php get_header(); ?>

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
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-right-a.svg" alt="arrow-right">
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
                        <div class="swiper-slide">
                            <div class="main-top-slider-item ibg">
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/main-img-items/01.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="main-top-slider-item ibg">
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/main-img-items/02.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="main-top-slider-pagination"></div>
                    <!-- <div class="main-top-slider-l">влево</div>
                    <div class="main-top-slider-r">вправо</div> -->

                    <div class="main-top-slider-info">
                        <div class="main-top-slider-title">
                            Китайский завод-производитель <br class="mob"> интерактивного оборудования Abedul
                        </div>
                        <div class="main-top-slider-subtitle">
                            <span class="pc">
                                Независимый дизайн продукции, исследования и разработки, а также
                                производственные мощности, профессиональную команду по исследованиям,
                                разработкам и производству, систему управления качеством и полный процесс обслуживания.
                            </span>
                            <span class="mob">
                                Независимый дизайн продукции, исследования и разработки
                            </span>
                        </div>

                        <a href="" class="btn btn-white main-top-slider-btn">
                            Подробнее
                        </a>
                    </div>
                </div>
                <div class="main-top-images">
                    <div class="main-top-image ibg">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/04.png" alt="">
                        <div class="main-top-image-text">
                            Киоск типа INGSCREEN K
                        </div>
                    </div>
                    <div class="main-top-image ibg">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/05.png" alt="">
                        <div class="main-top-image-text">
                            Киоск типа INGSCREEN K
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-page-info-items">
                <div class="main-page-info-item">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/main-page-info-items/01.svg" alt="page-info-icon">
                    <span>Поставка IT-оборудования под ключ</span>
                </div>
                <div class="main-page-info-item">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/main-page-info-items/02.svg" alt="page-info-icon">
                    <span>Оборудование для любой специфики деятельности</span>
                </div>
                <div class="main-page-info-item">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/main-page-info-items/03.svg" alt="page-info-icon">
                    <span>Честное управление, взаимовыгодное сотрудничество, ориентация на клиента</span>
                </div>
            </div>

            <div class="products">
                <div class="block-title">Популярные товары</div>

                <div class="products-items">
                    <!-- Карточка товара -->
                    <div class="product-item">
                        <div class="product-slider swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/02.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/06.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/02.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/06.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/02.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/06.png" alt="Product Image 1"></div>
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
                                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/05.png" alt="Product Image 1">
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
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/04.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/06.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/06.png" alt="Product Image 1"></div>
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
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/02.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/01.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/06.png" alt="Product Image 1"></div>
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
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/04.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/01.png" alt="Product Image 1"></div>
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
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/03.png" alt="Product Image 2"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/01.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/03.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/04.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/05.png" alt="Product Image 1"></div>
                                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/06.png" alt="Product Image 1"></div>
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
                    <div class="block-title">Нам доверяют</div>
                    <a href="" class="main-page-clients-top__link arrow-link">
                        <span>Все проекты</span>
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-right-blue.svg" alt="arrow-right">
                    </a>
                </div>
                <div class="main-page-clients-items swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="main-page-clients-item">
                                <div class="main-page-clients-item__slider swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="main-page-clients-item-slide ibg">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/burger-king.png" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="main-page-clients-item-slide ibg">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/02.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-page-clients-item__slider-controls">
                                        <div class="control-left">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-left-blue.svg" alt="arrow-left">
                                        </div>
                                        <div class="control-right">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/perekrestok.png" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="main-page-clients-item-slide ibg">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/05.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-page-clients-item__slider-controls">
                                        <div class="control-left">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-left-blue.svg" alt="arrow-left">
                                        </div>
                                        <div class="control-right">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/burger-king.png" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="main-page-clients-item-slide ibg">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/products/06.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-page-clients-item__slider-controls">
                                        <div class="control-left">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-left-blue.svg" alt="arrow-left">
                                        </div>
                                        <div class="control-right">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/arrow-right-blue.svg" alt="arrow-right">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>