<?php
/* Template Name: Индивидуальный  заказ */

get_header(); ?>
<main class="page individual-page">

    <div class="individual-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
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
                <div class="individual-page__content form-wrapper">
                    <div class="individual-page-title">Связаться с нами</div>
                    <div class="individual-page-subtitle">
                        <span>Готовы сделать заказ или хотите узнать больше?</span>
                        <span>Отправьте заявку на обратный звонок!</span>
                    </div>

                    <form class="helper-form__form form" id="contact-form">
                        <div style="display: none;" class="form-item" aria-required="true" field-name="firstName">
                            <input type="text" name="page" value="Заявка со страницы индивидуального заказа" class="form-item-input">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <div class="form-item" aria-required="true" field-name="firstName">
                            <input placeholder="Ваше имя" type="text" name="name" class="form-item-input">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <div class="form-item" aria-required="true" field-name="phone">
                            <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input
                                class="form-item-input form-item-input-phone">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <button class="btn btn-blue">
                            Отправить заявку
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
    </div>
</main>


<?php get_footer(); ?>