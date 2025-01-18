<?php
/* Template Name: Наша фабрика */
// Получаем данные полей
$factory_main_title = carbon_get_the_post_meta('factory_main_title');
$factory_subtitle = carbon_get_the_post_meta('factory_subtitle');
$video_section_description = carbon_get_the_post_meta('video_section_description');
$video_blocks = carbon_get_the_post_meta('video_blocks');
$image_text_blocks = carbon_get_the_post_meta('image_text_blocks');
$image_description_blocks = carbon_get_the_post_meta('image_description_blocks');
$breadcrumbs_main = carbon_get_post_meta(get_the_ID(), 'breadcrumbs_main');
get_header(); ?>

<main class="page fabric-page">

    <div class="fabric-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs-link"><?php echo esc_html($breadcrumbs_main); ?> / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current"><?= esc_html($factory_main_title); ?></li>
            </ul>
        </nav>

        <div class="block-title">
            <?= esc_html($factory_main_title); ?>
        </div>

        <?php
        // описание под заголовком
        $factory_subtitle = carbon_get_post_meta(get_the_ID(), 'factory_subtitle');
        if (!empty($factory_subtitle)) {
            echo '<div class="fabric-page__text">' . wp_kses_post($factory_subtitle) . '</div>';
        }
        // описание для блока (вилео + описание)
        $video_section_description = carbon_get_post_meta(get_the_ID(), 'video_section_description');
        if (!empty($video_section_description)) {
            echo '<div class="fabric-page__text accent">' . wp_kses_post($video_section_description) . '</div>';
        }
        // видео для блока (вилео + описание)
        $video_blocks = carbon_get_post_meta(get_the_ID(), 'video_blocks');
        if (!empty($video_blocks)) {
            echo '<div class="fabric-page__videos">';
            foreach ($video_blocks as $block) {
                $video_url = $block['video_file'];
                $video_cover_url = $block['video_cover_url'];
                echo '<a data-fslightbox="fabric-video" href="' . esc_url(wp_get_attachment_url($video_url)) . '" class="fabric-video ibg">';
                echo '<img loading="lazy" class="fabric-video-img" src="' . esc_url(wp_get_attachment_url($video_cover_url)) . '" alt="fabric-video">';
                echo '<img loading="lazy" class="play" src="' . get_template_directory_uri() . '/layout/img/icons/play.svg" alt="play">';
                echo '<div class="fabric-video-title">' . esc_html($block['video_block_title']) . '</div>';
                echo '</a>';
            }
            echo '</div>';
        }
        // второй блок (заголовок + изображение + блок иконок (иконка + описание))
        $image_text_blocks = carbon_get_post_meta(get_the_ID(), 'image_text_blocks');
        if (!empty($image_text_blocks)) {
            foreach ($image_text_blocks as $image_text_block) {
                $title = $image_text_block['image_text_block_title'];
                echo '<div class="fabric-page__info">';
                // заголовок 
                if (!empty($title)) {
                    echo '<div class="block-title">' . $title . '</div>';
                }
                // блок изображение + иконки с описанием 
                echo '<div class="fabric-page__info-content">';
                $img = $image_text_block['image_text_block_image'];
                if (!empty($img)) {
                    echo '<img src="' . esc_url(wp_get_attachment_url($img))  . '" alt="fabric-image">';
                }
                // блок иконки с описанием
                $icon_image_block = $image_text_block['icon_image_block'];
                if (!empty($icon_image_block)) {
                    echo '<div class="info-content-items">';
                    foreach ($icon_image_block as $icon_block) {
                        echo '<div class="info-content-item">';
                        $icon = $icon_block['icon'];
                        if (!empty($icon)) {
                            echo '<div class="info-content-item__icon">';
                            echo '<img src="' . esc_url(wp_get_attachment_url($icon)) . '" alt="fabric-icon">';
                            echo '</div>';
                        }
                        $icon_image_description = $icon_block['icon_image_description'];
                        if (!empty($icon_image_description)) {
                            echo '<div class="info-content-item__text">' . wp_kses_post($icon_image_description) . '</div>';
                        }
                        echo '</div>';
                    }
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
            }
        }
        ?>

        <?php if (!empty($image_description_blocks)): ?>
            <div class="fabric-page__images">
                <?php foreach ($image_description_blocks as $desc_block): ?>
                    <a data-fslightbox="fabric-img" href="<?= esc_url(wp_get_attachment_url($desc_block['image'])); ?>" class="fabric-page-image">
                        <div class="fabric-page-image__img ibg">
                            <img loading="lazy" src="<?= esc_url(wp_get_attachment_url($desc_block['image'])); ?>" alt="fabric-image">
                        </div>
                        <div class="fabric-page-image__title">
                            <?= esc_html($desc_block['image_description']); ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="main-page-form form-wrapper">

            <div class="main-page-form__title">
                Не нашли, что искали?
            </div>
            <div class="main-page-form__subtitle">
                Предложим варианты, подходящие под различные бюджеты, а также консультацию опытных специалистов
                для
                оптимизации затрат
            </div>

            <form class="main-page-form__form form" id="contact-form">
                <div class="form-item white" aria-required="true" field-name="firstName">
                    <input placeholder="Ваше имя" type="text" name="name" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item white" aria-required="true" field-name="phone">
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
</main>

<?php get_footer(); ?>