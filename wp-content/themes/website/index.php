<?php /*
Template Name: main
*/
?>

<?php get_header(); ?>
        <div class="menu__mobile">
        </div>

        <main class="page">

            <div class="main-page main-page__container">
                <div class="side-bar" id="sideBarContainer">
                    <?php
                        $items = get_field('catalog_Items');
                        if ( !empty($items) ) {
                            foreach ($items as $item) {
                                echo ' <div class="side-bar-item"> ';
                                // Заголовок с иконкой стрелки
                                echo '
                                    <div class="side-bar-item__content">
                                        <span>' . esc_html($item['catalog_item_title']) . '</span>
                                        <img src="http://abedul/wp-content/uploads/2025/01/arrow-right-a.svg" alt="arrow-right">
                                    </div>

                                    <div class="side-bar-item__subcontent">
                                        <div class="subcontent-elems">
                                ';
                                // Проверка на наличие подэлементов
                                if (!empty($item['catalog_item_elements'])) {
                                    foreach ($item['catalog_item_elements'] as $element) {
                                        echo '
                                            <div class="side-bar-item">
                                                <div class="side-bar-item__content">
                                                    <span>' . esc_html($element['catalog_item_element_name']) . '</span>
                                                </div>
                                            </div>
                                        ';
                                    }
                                }
                                echo '  
                                        </div>
                                    </div>
                                </div>

                                ';
                            }
                        } else {
                            echo '<p>Контент не загружен...</p>';
                        }

                    ?>
                </div>


                <div class="main-page-content">
                    <div class="main-page-content-top">
                        <div class="main-top-slider swiper-container">
                        <?php 
                            $main_page_content_top = get_field('main_page_content_top');
                            if ( !empty($main_page_content_top) ) {
                                if($main_page_content_top['card_main_top_1']) {
                                    $card_main_top_1 = $main_page_content_top['card_main_top_1'];
                                    $title_main_card_1 = $card_main_top_1['title_main_card_1'];
                                    $description_main_card_1 = $card_main_top_1['description_main_card_1'];
                                    $imge_main_card_11 = $card_main_top_1['imge_main_card_11'];
                                    $imge_main_card_12 = $card_main_top_1['imge_main_card_12'];
                        
                        ?>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="main-top-slider-item ibg">
                                        <img loading="lazy" src="<?php echo esc_url($imge_main_card_11) ?>" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="main-top-slider-item ibg">
                                        <img loading="lazy" src="<?php echo esc_url($imge_main_card_12) ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="main-top-slider-pagination"></div>
                            <div class="main-top-slider-info">
                                <div class="main-top-slider-title">
                                    <?php echo esc_html($title_main_card_1); ?>
                                </div>
                                <div class="main-top-slider-subtitle">
                                    <span class="pc">
                                    <?php echo esc_html($description_main_card_1); ?>
                                    </span>
                                    <span class="mob">
                                        Независимый дизайн продукции, исследования и разработки
                                    </span>
                                </div>
                                <a href="" class="btn btn-white main-top-slider-btn">
                                    Подробнее
                                </a>
                            </div>
                        <?php
                                
                            } else {
                                echo '<p>Контент не загружен...</p>';
                            }
                        } else {
                                echo '<p>Контент не загружен...</p>';
                            }
                        
                        ?>
                        </div>
                        <?php
                            $main_page_content_top = get_field('main_page_content_top');
                            if (!empty($main_page_content_top)){
                                $card_main_top_2 = $main_page_content_top['card_main_top_2'];
                                $card_main_top_3 = $main_page_content_top['card_main_top_3'];
                                if ($card_main_top_2 && $card_main_top_3){
                                    //--------------------------------------------------------
                                    $imge_card_2 = $card_main_top_2['imge_card_2'];
                                    $title_main_card_2 = $card_main_top_2['title_main_card_2'];
                                    //---------------------------------------------------------
                                    $imge_card_3 = $card_main_top_3['imge_card_3'];
                                    $title_main_card_3 = $card_main_top_3['title_main_card_3'];

                        ?>
                        <div class="main-top-images">
                            <div class="main-top-image ibg">
                                <img loading="lazy" src="<?php echo esc_url($imge_card_2) ?>" alt="">
                                <div class="main-top-image-text">
                                    <?php echo esc_html($title_main_card_2); ?>
                                </div>
                            </div>
                            <div class="main-top-image ibg">
                                <img loading="lazy" src="<?php echo esc_url($imge_card_3) ?>" alt="">
                                <div class="main-top-image-text">
                                    <?php echo esc_html($title_main_card_3); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                                } else {
                                    echo '<p>Контент не загружен...</p>';
                                }
                            } else {
                                echo '<p>Контент не загружен...</p>';
                            }
                        
                        ?>
                    </div>

                    <div class="main-page-info-items">
                        <?php 
                            $main_page_info_items = get_field('main_page_info_items');
                            if (!empty($main_page_content_top)){
                                $item_icons_1 = $main_page_info_items['item_icons_1'];
                                $item_icons_2 = $main_page_info_items['item_icons_2'];
                                $item_icons_3 = $main_page_info_items['item_icons_3'];
                                //-----------------------------------------------------------
                                if ($item_icons_1 && $item_icons_2 && $item_icons_3) {
                                    $icon_imge_1 = $item_icons_1['icon_imge_1'];
                                    $description_icon_1 = $item_icons_1['description_icon_1'];
                                    // -------------------------------------------------------
                                    $icon_imge_2 = $item_icons_2['icon_imge_2'];
                                    $description_icon_2 = $item_icons_2['description_icon_2'];
                                    // -------------------------------------------------------
                                    $icon_imge_3 = $item_icons_3['icon_imge_3'];
                                    $description_icon_3 = $item_icons_3['description_icon_3'];
                        ?>

                        <div class="main-page-info-item">
                            <img loading="lazy" src="<?php echo esc_url($icon_imge_1) ?>" alt="page-info-icon">
                            <span><?php echo esc_html($description_icon_1); ?></span>
                        </div>
                        <div class="main-page-info-item">
                            <img loading="lazy" src="<?php echo esc_url($icon_imge_2) ?>" alt="page-info-icon">
                            <span><?php echo esc_html($description_icon_2); ?></span>
                        </div>
                        <div class="main-page-info-item">
                            <img loading="lazy" src="<?php echo esc_url($icon_imge_3) ?>" alt="page-info-icon">
                            <span><?php echo esc_html($description_icon_3); ?></span>
                        </div>
                        <?php
                                } else {
                                    echo '<p>Контент не загружен...</p>';
                                }
                            } else{
                                echo '<p>Контент не загружен...</p>';
                            }
                        ?>

                    </div>

                    <div class="products">
                        <div class="block-title"> <?php 
                                $block_title_products = get_field('block_title_products');
                                if (!empty($block_title_products)){ 
                                    echo esc_html($block_title_products); 
                                } else {
                                    echo '<p>Контент не загружен...</p>';
                                }
                            ?> </div>
                        <div class="products-items">
                        <?php
                            if( have_rows('products') ){
                                $num = 0;
                                while( have_rows('products') && $num < 6 ): the_row();
                                    $num ++;
                                    // Извлекаем данные из полей внутри повторителя
                                    $name_product = get_sub_field('name_product');  // Название продукта
                                    $description_product = get_sub_field('description_product');  // Описание продукта
                                    $article_product = get_sub_field('article_product');  // Артикул продукта
                                    
                                    // Получаем изображения из полей imge_product_1 - imge_product_5
                                    $images = [];
                                    for ($i = 1; $i <= 5; $i++) {
                                        $image_field = get_sub_field("imge_product_$i");
                                        if ($image_field) {
                                            $images[] = $image_field;  // Сохраняем URL изображения
                                        }
                                    }
                        ?>
                                <div class="product-item">
                                    <div class="product-slider swiper">
                                        <div class="swiper-wrapper">
                        <?php
                                            foreach ($images as $image_url) {
                                                echo '<div class="swiper-slide"><img src="' . esc_url($image_url) . '" alt="Product Image"></div>';
                                            }
                        ?>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><?php echo esc_html($name_product); ?></h3>
                                        <p class="product-description"><?php echo esc_html($description_product); ?></p>
                                        <p class="product-article">Артикул <?php echo esc_html($article_product); ?></p>
                                        <div class="product-buttons">
                                            <a href="product.php" class="btn btn-blue">Подробнее</a>
                                            <a href="#order-send-popup" class="btn btn-white order-product-btn popup-link">Заказать</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                                endwhile;

                            } else {
                                echo 'Товары не добавлены..';
                            }
                        ?>
                        </div>
                    </div>
                    <div class="main-page-clients">
                        <div class="main-page-clients-top">
                            <div class="block-title"> <?php 
                                $block_title = get_field('block_title');
                                if (!empty($block_title)){ 
                                    echo esc_html($block_title); 
                                } else {
                                    echo '<p>Контент не загружен...</p>';
                                }
                            ?> </div>
                            <a href="" class="main-page-clients-top__link arrow-link">
                                <span>Все проекты</span>
                                <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                                        <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/products/burger-king.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="main-page-clients-item-slide ibg">
                                                        <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/products/02.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-page-clients-item__slider-controls">
                                                <div class="control-left">
                                                    <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-left-blue.svg" alt="arrow-left">
                                                </div>
                                                <div class="control-right">
                                                    <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                                <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                                        <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/products/perekrestok.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="main-page-clients-item-slide ibg">
                                                        <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/products/05.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-page-clients-item__slider-controls">
                                                <div class="control-left">
                                                    <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-left-blue.svg" alt="arrow-left">
                                                </div>
                                                <div class="control-right">
                                                    <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                                <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                                        <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/products/burger-king.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="main-page-clients-item-slide ibg">
                                                        <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/products/06.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-page-clients-item__slider-controls">
                                                <div class="control-left">
                                                    <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-left-blue.svg" alt="arrow-left">
                                                </div>
                                                <div class="control-right">
                                                    <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-right-blue.svg" alt="arrow-right">
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
                                                <img loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/arrow-right-blue.svg" alt="arrow-right">
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
                    Предложим варианты, подходящие под различные бюджеты, а также консультацию опытных специалистов для оптимизации затрат
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
                        <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input class="form-item-input form-item-input-phone">
                        <span class="form-item-confirm-check"></span>
                    </div>

                    <button class="btn btn-form-white">
                        Получить консультацию
                    </button>

                </form>

                <div class="loader"></div>
                <div class="form-sending">
                    <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri() ?>  /assets/img/icons/check.svg" alt="check">
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