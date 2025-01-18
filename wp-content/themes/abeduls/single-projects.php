<?php
/* Template Name: Project */

$subtitle = carbon_get_post_meta(get_the_ID(), 'project_subtitle');
$gallery = carbon_get_post_meta(get_the_ID(), 'project_gallery');
$text_block = carbon_get_post_meta(get_the_ID(), 'project_text_block');
$products_title = carbon_get_post_meta(get_the_ID(), 'products_title');
$breadcrumbs_main = carbon_get_post_meta(get_the_ID(), 'breadcrumbs_main');
$breadcrumbs_all_projects = carbon_get_post_meta(get_the_ID(), 'breadcrumbs_all_projects');
$breadcrumbs_all_projects_link = carbon_get_post_meta(get_the_ID(), 'breadcrumbs_all_projects_link');

get_header(); ?>

<main class="page projects-page">

    <div class="projects-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs-link"><?php echo esc_html($breadcrumbs_main); ?> / </a></li>
                <li class="breadcrumbs-item"><a href="/<?php echo esc_html($breadcrumbs_all_projects_link); ?>" class="breadcrumbs-link"><?php echo esc_html($breadcrumbs_all_projects); ?> / </a></li>
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
                <?php
                $project_products = carbon_get_the_post_meta('project_related_products');
                ?>
                <?php
                if (!empty($project_products)) :
                    foreach ($project_products as $product) :
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
        </div>

    </div>
</main>

<?php get_footer(); ?>