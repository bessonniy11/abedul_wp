<?php
/* Template Name: Проект */

$subtitle = carbon_get_post_meta(get_the_ID(), 'project_subtitle');
$gallery = carbon_get_post_meta(get_the_ID(), 'project_gallery');
$text_block = carbon_get_post_meta(get_the_ID(), 'project_text_block');
$products_title = carbon_get_post_meta(get_the_ID(), 'products_title');

get_header(); ?>

<main class="page projects-page">

    <div class="projects-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                <li class="breadcrumbs-item"><a href="/projects" class="breadcrumbs-link">Все проекты / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current"><?php the_title(); ?></li>
            </ul>
        </nav>

        <div class="block-title">
            <?php the_title(); ?>
        </div>

        <div class="project-photo-items">
            <?php foreach ($gallery as $item):
                $img_url = wp_get_attachment_image_url($item['gallery_image'], 'full');
                $img_title = $item['gallery_title'];
                $img_link = $item['gallery_link'];
            ?>
                <a href="<?php echo esc_url($img_link); ?>" target="_blank" class="project-photo-item">
                    <div class="project-photo-item__img ibg">
                        <img loading="lazy" src="<?php echo esc_url($img_url); ?>" alt="project-img">
                    </div>
                    <div class="project-photo-item__title">
                        <?php echo esc_html($img_title); ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="project-text-block">
            <?php echo wp_kses_post(wpautop($text_block)); ?>
        </div>

        <div class="products">
            <div class="block-title"><?php echo esc_html($products_title); ?></div>

            <div class="products-items">
                <!-- Карточка товара -->
                <div class="product-item">
                    <div class="product-slider swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/03.png" alt="Product Image 1"></div>
                            <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/04.png" alt="Product Image 1"></div>
                            <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/layout/img/products/05.png" alt="Product Image 1"></div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                        <p class="product-description">Сенсорный стол</p>
                        <p class="product-article">Артикул 89776</p>
                        <div class="product-buttons">
                            <a href="product.php" class="btn btn-blue">Подробнее</a>
                            <a href="#order-send-popup"
                                class="btn btn-white order-product-btn popup-link">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>