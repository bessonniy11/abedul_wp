<?php
/* Template Name: Каталог */
$category_slug = get_query_var('category_slug');
$subcategory_slug = get_query_var('subcategory_slug');
// Получаем ID страницы "Каталог" по её пути
$catalog_page = get_page_by_path('catalog');
$catalog_page_id = $catalog_page ? $catalog_page->ID : null;

// Загружаем мета-поля с использованием ID страницы "Каталог"
$catalog_page_title = carbon_get_post_meta($catalog_page_id, 'catalog_page_title');
$main_breadcrumb = carbon_get_post_meta($catalog_page_id, 'main_breadcrumb');
$second_breadcrumb = carbon_get_post_meta($catalog_page_id, 'second_breadcrumb');
$filter_block_title = carbon_get_post_meta($catalog_page_id, 'filter_block_title');
$search_placeholder = carbon_get_post_meta($catalog_page_id, 'search_placeholder');
$products_empty_text = carbon_get_post_meta($catalog_page_id, 'products_empty_text');
// заголовки фильтров
$catalog_resolution_title = carbon_get_post_meta($catalog_page_id, 'catalog_resolution_title');
$catalog_os_title = carbon_get_post_meta($catalog_page_id, 'catalog_os_title');
$catalog_screen_diagonal_title = carbon_get_post_meta($catalog_page_id, 'catalog_screen_diagonal_title');
$catalog_brightness_level_title = carbon_get_post_meta($catalog_page_id, 'catalog_brightness_level_title');
$catalog_display_technology_title = carbon_get_post_meta($catalog_page_id, 'catalog_display_technology_title');

// кнопки фильтров
$filter_save_filter = carbon_get_post_meta($catalog_page_id, 'filter_save_filter');
$filter_remove_filter = carbon_get_post_meta($catalog_page_id, 'filter_remove_filter');
get_header(); ?>

<main class="page catalog-page">
    <div class="page__container">
        <?php
        $meta_query = [
            'relation' => 'AND',
        ];

        // Фильтр по категории
        if (!empty($category_slug)) {
            $category_id = null;
            $categories = get_posts([
                'post_type'      => 'category_group',
                'posts_per_page' => -1,
                'fields'         => 'ids',
                'meta_query'     => [
                    [
                        'key'     => 'category_slug',
                        'value'   => $category_slug,
                        'compare' => '=',
                    ],
                ],
            ]);

            if (!empty($categories)) {
                $category_id = $categories[0];
            }

            if ($category_id) {
                $meta_query[] = [
                    'key'     => 'product_category',
                    'value'   => 'post:category_group:' . $category_id,
                    'compare' => 'LIKE',
                ];
            }
        }

        // Фильтр по подкатегории
        if (!empty($subcategory_slug)) {
            $meta_query[] = [
                'key'     => 'product_subcategory',
                'value'   => $subcategory_slug,
                'compare' => '=',
            ];
        }

        $args = [
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'meta_query'     => $meta_query,
        ];

        if (empty($category_slug) && empty($subcategory_slug)) {
            unset($args['meta_query']);
        }

        // Запрос товаров
        $query = new WP_Query($args);

        // Массивы для хранения уникальных значений характеристик
        $screen_resolutions = array();
        $os_systems = array();
        $screen_diagonals = array();
        $brightness_levels = array();
        $display_technologies = array();

        // Проход по всем товарам
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                // Получаем значения характеристик товара
                $screen_resolution = carbon_get_post_meta(get_the_ID(), 'product_screen_resolution');
                $os_system = carbon_get_post_meta(get_the_ID(), 'product_operation_system');
                $screen_diagonal = carbon_get_post_meta(get_the_ID(), 'product_screen_diagonal');
                $screen_brightness = carbon_get_post_meta(get_the_ID(), 'product_screen_brightness');
                $display_technology = carbon_get_post_meta(get_the_ID(), 'product_display_technology');

                // Добавляем уникальные значения в массивы
                if ($screen_resolution) {
                    $screen_resolutions[] = $screen_resolution;
                }
                if ($os_system) {
                    $os_systems[] = $os_system;
                }
                if ($screen_diagonal) {
                    $screen_diagonals[] = $screen_diagonal;
                }
                if ($screen_brightness) {
                    $brightness_levels[] = $screen_brightness;
                }
                if ($display_technology) {
                    $display_technologies[] = $display_technology;
                }
            }
            // Убираем дубли
            $screen_resolutions = array_unique($screen_resolutions);
            $os_systems = array_unique($os_systems);
            $screen_diagonals = array_unique($screen_diagonals);
            $brightness_levels = array_unique($brightness_levels);
            $display_technologies = array_unique($display_technologies);
        }

        // Восстанавливаем глобальный пост
        wp_reset_postdata();
        ?>

        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link"><?php echo esc_html($main_breadcrumb); ?> / </a></li>
                <li class="breadcrumbs-item"><a href="/catalog" class="breadcrumbs-link"><?php echo esc_html($second_breadcrumb); ?> / </a></li>
                <?php
                // Получение названия категории
                if (!empty($category_slug)) {
                    $category_name = '';
                    $categories = get_posts([
                        'post_type'      => 'category_group',
                        'posts_per_page' => 1,
                        'meta_query'     => [
                            [
                                'key'     => 'category_slug',
                                'value'   => $category_slug,
                                'compare' => '=',
                            ],
                        ],
                    ]);

                    if (!empty($categories)) {
                        $category_name = get_the_title($categories[0]); // Получаем название категории
                    }
                ?>
                    <li class="breadcrumbs-item">
                        <a href="/catalog/<?php echo esc_html($category_slug); ?>" class="breadcrumbs-link">
                            <?php echo esc_html($category_name); ?> /
                        </a>
                    </li>
                <?php } ?>

                <?php
                // Получение названия подкатегории
                if (!empty($subcategory_slug) && !empty($categories)) {
                    $subcategory_name = '';
                    $subcategories = carbon_get_post_meta($categories[0]->ID, 'subcategories'); // Получаем подкатегории

                    if (!empty($subcategories)) {
                        foreach ($subcategories as $subcategory) {
                            if ($subcategory['subcategory_slug'] === $subcategory_slug) {
                                $subcategory_name = $subcategory['subcategory_title']; // Название подкатегории
                                break;
                            }
                        }
                    }
                ?>
                    <li class="breadcrumbs-item">
                        <span class="breadcrumbs-link">
                            <?php echo esc_html($subcategory_name); ?>
                        </span>
                    </li>
                <?php } ?>
            </ul>
        </nav>

        <div class="catalog">
            <!-- Сайдбар фильтрации -->
            <aside class="catalog-sidebar">
                <div class="catalog-sidebar-title-wrapper">
                    <div class="catalog-sidebar-title">
                        <div class="catalog-sidebar-title__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.395 14.5H20.606L16.395 19.5H20.606" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 9.5L18.5 4.5L16 9.5" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.4189 8.66199H20.5809" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 19.5H3" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 14.5H3" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 9.5H3" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 4.5H3" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span><?php echo esc_html($filter_block_title); ?></span>
                    </div>
                    <div class="catalog-sidebar-filter-form"></div>
                </div>

                <form class="filter-form" method="POST" data-da=".catalog-sidebar-filter-form,860,0" data-spollers="860,max">
                    <input type="hidden" name="category_slug" value="<?php echo esc_attr($category_slug); ?>">
                    <input type="hidden" name="subcategory_slug" value="<?php echo esc_attr($subcategory_slug); ?>">
                    <input type="hidden" name="products_empty_text" value="<?php echo esc_html($products_empty_text); ?>">
                    <div class="filter-group">
                        <label class="filter-group-label" for="resolution" data-spoller>
                            <span><?php echo esc_html($catalog_resolution_title); ?></span>
                            <div class="filter-group-title-arrow"></div>
                        </label>
                        <div id="resolution" class="checkbox-list">
                            <?php foreach ($screen_resolutions as $resolution): ?>
                                <div class="form-item form-item-checkbox blue-checkbox transparent" aria-required="true">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="resolution[]" value="<?php echo esc_attr($resolution); ?>">
                                        <span class="checkmark blue-checkbox">
                                            <span class="checkmark-check"></span>
                                        </span>
                                        <div class="custom-checkbox-label blue-checkbox"><?php echo esc_html($resolution); ?></div>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="filter-group">
                        <label class="filter-group-label" for="os" data-spoller>
                            <span><?php echo esc_html($catalog_os_title); ?></span>
                            <div class="filter-group-title-arrow"></div>
                        </label>
                        <div id="os" class="checkbox-list">
                            <?php foreach ($os_systems as $os): ?>
                                <div class="form-item form-item-checkbox blue-checkbox transparent" aria-required="true">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="os[]" value="<?php echo esc_attr($os); ?>">
                                        <span class="checkmark blue-checkbox">
                                            <span class="checkmark-check"></span>
                                        </span>
                                        <div class="custom-checkbox-label blue-checkbox"><?php echo esc_html($os); ?></div>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="filter-group">
                        <label class="filter-group-label" for="diagonal" data-spoller>
                            <span><?php echo esc_html($catalog_screen_diagonal_title); ?></span>
                            <div class="filter-group-title-arrow"></div>
                        </label>
                        <div id="diagonal" class="checkbox-list">
                            <?php foreach ($screen_diagonals as $screen_diagonal): ?>
                                <div class="form-item form-item-checkbox blue-checkbox transparent" aria-required="true">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="screen_diagonal[]" value="<?php echo esc_attr($screen_diagonal); ?>">
                                        <span class="checkmark blue-checkbox">
                                            <span class="checkmark-check"></span>
                                        </span>
                                        <div class="custom-checkbox-label blue-checkbox"><?php echo esc_html($screen_diagonal); ?></div>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="filter-group">
                        <label class="filter-group-label" for="brightness" data-spoller>
                            <span><?php echo esc_html($catalog_brightness_level_title); ?></span>
                            <div class="filter-group-title-arrow"></div>
                        </label>
                        <div id="brightness" class="checkbox-list">
                            <?php foreach ($brightness_levels as $brightness_level): ?>
                                <div class="form-item form-item-checkbox blue-checkbox transparent" aria-required="true">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="brightness_level[]" value="<?php echo esc_attr($brightness_level); ?>">
                                        <span class="checkmark blue-checkbox">
                                            <span class="checkmark-check"></span>
                                        </span>
                                        <div class="custom-checkbox-label blue-checkbox"><?php echo esc_html($brightness_level); ?></div>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="filter-group">
                        <label class="filter-group-label" for="displayTechnology" data-spoller>
                            <span><?php echo esc_html($catalog_display_technology_title); ?></span>
                            <div class="filter-group-title-arrow"></div>
                        </label>
                        <div id="displayTechnology" class="checkbox-list">
                            <?php foreach ($display_technologies as $display_technology): ?>
                                <div class="form-item form-item-checkbox blue-checkbox transparent" aria-required="true">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="display_technology[]" value="<?php echo esc_attr($display_technology); ?>">
                                        <span class="checkmark blue-checkbox">
                                            <span class="checkmark-check"></span>
                                        </span>
                                        <div class="custom-checkbox-label blue-checkbox"><?php echo esc_html($display_technology); ?></div>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="filter-form__buttons">
                        <!-- <button type="submit" class="btn btn-blue" onclick="window.location.href='?';"><?php echo esc_html($filter_save_filter); ?></button> -->
                        <button class="btn btn-white btn-clear-filter"><?php echo esc_html($filter_remove_filter); ?></button>
                    </div>
                </form>
            </aside>

            <!-- Список товаров -->
            <section class="products">
                <div class="products-top-panel">
                    <div class="search-input-wrapper">
                        <div class="header-search-input">
                            <input class="header-search-input__input catalog-search-input" type="text" placeholder="<?php echo esc_html($search_placeholder); ?>">
                            <img loading="lazy" class="header-search-input__search" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/search.svg" alt="search">
                            <div class="header-search-input__close"></div>
                        </div>
                    </div>
                    <div class="view-types">
                        <div class="view-type active" data-view="grid">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 5.96667L1.5 1.5L5.96667 1.5V5.96667H1.5ZM0 1C0 0.447716 0.447715 0 1 0L6.46667 0C7.01895 0 7.46667 0.447715 7.46667 1V6.46667C7.46667 7.01895 7.01895 7.46667 6.46667 7.46667H1C0.447716 7.46667 0 7.01895 0 6.46667L0 1ZM10.0333 5.96667V1.5L14.5 1.5V5.96667H10.0333ZM8.53333 1C8.53333 0.447716 8.98105 0 9.53333 0L15 0C15.5523 0 16 0.447715 16 1V6.46667C16 7.01895 15.5523 7.46667 15 7.46667H9.53333C8.98105 7.46667 8.53333 7.01895 8.53333 6.46667V1ZM10.0333 10.0333V14.5H14.5V10.0333H10.0333ZM9.53333 8.53333C8.98105 8.53333 8.53333 8.98105 8.53333 9.53333V15C8.53333 15.5523 8.98105 16 9.53333 16H15C15.5523 16 16 15.5523 16 15V9.53333C16 8.98105 15.5523 8.53333 15 8.53333H9.53333ZM1.5 14.5L1.5 10.0333H5.96667V14.5H1.5ZM0 9.53333C0 8.98105 0.447715 8.53333 1 8.53333H6.46667C7.01895 8.53333 7.46667 8.98105 7.46667 9.53333V15C7.46667 15.5523 7.01895 16 6.46667 16H1C0.447716 16 0 15.5523 0 15L0 9.53333Z" fill="#797979" />
                            </svg>
                        </div>
                        <div class="view-type" data-view="list">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 5.5L1.5 1.5L14.5 1.5V5.5H1.5ZM0 1C0 0.447715 0.447715 0 1 0L15 0C15.5523 0 16 0.447715 16 1V6C16 6.55228 15.5523 7 15 7H1C0.447715 7 0 6.55228 0 6L0 1ZM1.5 14.5L1.5 10.5H14.5V14.5H1.5ZM0 10C0 9.44771 0.447715 9 1 9H15C15.5523 9 16 9.44772 16 10V15C16 15.5523 15.5523 16 15 16H1C0.447715 16 0 15.5523 0 15L0 10Z" fill="#797979" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="products-items list">
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
                                                    <a data-fslightbox="<?php echo esc_html($product_name); ?>" href="<?php echo wp_get_attachment_image_url($gallery_item['image'], 'full'); ?>" class="swiper-slide">
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
                                        <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link"
                                            data-product-name="<?php echo esc_attr($product_name); ?>">
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
                        <p><?php echo esc_html($products_empty_text); ?></p>
                    <?php endif; ?>
                </div>
            </section>
        </div>
</main>

<?php get_footer(); ?>