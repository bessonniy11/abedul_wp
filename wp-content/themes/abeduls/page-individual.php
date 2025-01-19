<?php
/* Template Name: Individual order */
$breadcrumbs_main = carbon_get_post_meta(get_the_ID(), 'breadcrumbs_main');
get_header(); ?>
<main class="page individual-page">

    <div class="individual-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs-link"><?php echo esc_html($breadcrumbs_main); ?> / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current"><?php echo esc_html(carbon_get_the_post_meta('individual_title')); ?></li>
            </ul>
        </nav>

        <div class="block-title">
            <?php echo esc_html(carbon_get_the_post_meta('individual_title')); ?>
        </div>

        <div class="individual-page__wrapper">
            <div class="individual-page__content">
                <!-- Общая галерея -->
                <div class="individual-page-images">
                    <?php
                    $general_gallery = carbon_get_the_post_meta('general_gallery');
                    if (!empty($general_gallery)) {
                        foreach ($general_gallery as $image_id) {
                            $image_url = wp_get_attachment_image_url($image_id, 'full');
                            if ($image_url) {
                                echo '<div class="individual-page-image ibg">';
                                echo '<img src="' . esc_url($image_url) . '" alt="individual-img">';
                                echo '</div>';
                            }
                        }
                    }
                    ?>
                </div>

                <!-- Шаги индивидуального заказа -->
                <div class="individual-page-items">
                    <?php
                    $steps = carbon_get_the_post_meta('steps');
                    if (!empty($steps)) {
                        foreach ($steps as $step) {
                            $step_title = $step['step_title'] ?? '';
                            $step_description = $step['step_description'] ?? '';
                            $step_gallery = $step['step_gallery'] ?? [];

                            echo '<div class="individual-page-item">';

                            // Тексты
                            echo '<div class="individual-page-item__texts">';
                            if (!empty($step_title)) {
                                echo '<div class="individual-page-item__title">' . esc_html($step_title) . '</div>';
                            }
                            if (!empty($step_description)) {
                                echo '<div class="individual-page-item__text">' . nl2br(esc_html($step_description)) . '</div>';
                            }
                            echo '</div>';

                            // Галерея для шага
                            if (!empty($step_gallery)) {
                                echo '<div class="individual-page-item__images">';
                                foreach ($step_gallery as $image_id) {
                                    $image_url = wp_get_attachment_image_url($image_id, 'full');
                                    if ($image_url) {
                                        echo '<div class="individual-page-item__image ibg">';
                                        echo '<img src="' . esc_url($image_url) . '" alt="step-image">';
                                        echo '</div>';
                                    }
                                }
                                echo '</div>';
                            }

                            echo '</div>'; // Закрываем individual-page-item
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="individual-page__form">
                <?php
                // Получение ID записи типа "forms"
                $form_id = get_posts([
                    'post_type' => 'forms',
                    'numberposts' => 1,
                    'fields' => 'ids', // Получаем только ID
                ]);

                if (!empty($form_id)) {
                    $form_id = $form_id[0]; // Берём ID первой записи
                    $form_title = carbon_get_post_meta($form_id, 'custom_order_request_form_popup_title'); // Заголовок формы

                    // Тексты для подзаголовков
                    $form_subtitle_line_1 = carbon_get_post_meta($form_id, 'custom_order_request_form_subtitle_line_1');
                    $form_subtitle_line_2 = carbon_get_post_meta($form_id, 'custom_order_request_form_subtitle_line_2');

                    $form_name_title = carbon_get_post_meta($form_id, 'custom_order_request_form_name_title');
                    $form_phone_title = carbon_get_post_meta($form_id, 'custom_order_request_form_phone_title');
                    $form_button_text = carbon_get_post_meta($form_id, 'custom_order_request_form_button_text');

                    // Тексты для "Спасибо за обращение"
                    $form_sending_title = carbon_get_post_meta($form_id, 'custom_order_request_form_sending_title');
                    $form_sending_subtitle = carbon_get_post_meta($form_id, 'custom_order_request_form_sending_subtitle');
                }
                ?>
                <div class="individual-page__content form-wrapper">
                    <div class="individual-page-title">
                        <?php echo esc_html($form_title); ?>
                    </div>

                    <div class="individual-page-subtitle">
                        <span><?php echo esc_html($form_subtitle_line_1); ?></span>
                        <span><?php echo esc_html($form_subtitle_line_2); ?></span>
                    </div>

                    <form class="helper-form__form form" id="contact-form">
                        <div style="display: none;" class="form-item" aria-required="true" field-name="page">
                            <input type="text" name="page"
                                value="Заявка со страницы индивидуального заказа / Application from the individual order page / 从个人订单页面申请"
                                class="form-item-input">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <div class="form-item" aria-required="true" field-name="firstName">
                            <input placeholder="<?php echo esc_html($form_name_title); ?>" type="text" name="name" class="form-item-input">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <div class="form-item" aria-required="true" field-name="phone">
                            <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input
                                class="form-item-input form-item-input-phone">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <button class="btn btn-blue">
                            <?php echo esc_html($form_button_text); ?>
                        </button>
                    </form>

                    <div class="loader"></div>
                    <div class="form-sending">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/check.svg" alt="check">
                        <div class="form-sending__title">
                            <?php echo esc_html($form_sending_title); ?>
                        </div>
                        <div class="form-sending__subtitle">
                            <?php echo esc_html($form_sending_subtitle); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>