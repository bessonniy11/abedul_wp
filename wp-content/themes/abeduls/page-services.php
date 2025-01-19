<?php
/* Template Name: Services */
$breadcrumbs_main = carbon_get_post_meta(get_the_ID(), 'breadcrumbs_main');
get_header(); ?>

<main class="page services-page">

    <div class="services-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs-link"><?php echo esc_html($breadcrumbs_main); ?> / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current"><?php echo esc_html(carbon_get_the_post_meta('services_page_title')); ?></li>
            </ul>
        </nav>

        <div class="block-title">
            <?php echo esc_html(carbon_get_the_post_meta('services_page_title')); ?>
        </div>

        <?php
        $service_items = carbon_get_the_post_meta('service_items');

        if ($service_items) :
        ?>
            <div class="service-items">
                <?php foreach ($service_items as $item) : ?>
                    <div class="service-item <?php echo !empty($item['gallery']) ? 'service-item-with-images' : ''; ?>">
                        <div class="service-item-texts">
                            <div class="service-item__title">
                                <span><?php echo esc_html($item['title']); ?></span>
                                <div class="service-item__text-icon mob">
                                    <?php if (!empty($item['icon'])) : ?>
                                        <img src="<?php echo wp_get_attachment_image_url($item['icon'], 'full'); ?>" alt="service-icon">
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($item['gallery'])) : ?>
                                    <div class="service-item__text-icon pc">
                                        <?php if (!empty($item['icon'])) : ?>
                                            <img src="<?php echo wp_get_attachment_image_url($item['icon'], 'full'); ?>" alt="service-icon">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="service-item__text">
                                <div class="service-item__text-icon pc <?php echo !empty($item['gallery']) ? 'hidden' : ''; ?>">
                                    <?php if (!empty($item['icon'])) : ?>
                                        <img src="<?php echo wp_get_attachment_image_url($item['icon'], 'full'); ?>" alt="service-icon">
                                    <?php endif; ?>
                                </div>
                                <div class="service-item__text-text">
                                    <?php echo wp_kses_post($item['description']); ?>
                                </div>
                            </div>
                            <?php if (!empty($item['subtitle'])) : ?>
                                <div class="service-item__suibtitle">
                                    <?php echo esc_html($item['subtitle']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($item['gallery'])) : ?>
                            <div class="service-item-images">
                                <?php foreach ($item['gallery'] as $image_id) : ?>
                                    <div class="service-item-image">
                                        <img src="<?php echo wp_get_attachment_image_url($image_id, 'full'); ?>" alt="services-item-img">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


        <div class="service-questions">
            <div class="block-title">
                <?php echo esc_html(carbon_get_the_post_meta('service_questions_title')); ?>
            </div>
            <div class="service-questions-content">
                <?php
                $questions = carbon_get_the_post_meta('service_questions');
                if (!empty($questions)):
                    foreach ($questions as $question): ?>
                        <div class="service-question" data-spollers>
                            <div class="service-question__title" data-spoller>
                                <span><?php echo esc_html($question['question']); ?></span>
                                <span class="visual-plus"></span>
                            </div>
                            <div class="service-question__content">
                                <?php echo wp_kses_post($question['answer']); ?>
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>

        <div class="main-page-form form-wrapper">

            <?php
            // Получаем ID записи типа "forms"
            $form_id = get_posts([
                'post_type' => 'forms',
                'numberposts' => 1,
                'fields' => 'ids',
            ]);

            if (!empty($form_id)) {
                $form_id = $form_id[0]; // Берём ID первой записи

                // Получаем значения мета-полей
                $form_title = carbon_get_post_meta($form_id, 'main_form_title');
                $form_subtitle = carbon_get_post_meta($form_id, 'main_form_subtitle');
                $form_name_title = carbon_get_post_meta($form_id, 'main_form_form_name_title');
                $form_phone_title = carbon_get_post_meta($form_id, 'main_form_form_phone_title');
                $form_button_text = carbon_get_post_meta($form_id, 'main_form_button_text');
                $sending_title = carbon_get_post_meta($form_id, 'main_form_sending_title');
                $sending_subtitle = carbon_get_post_meta($form_id, 'main_form_sending_subtitle');
            }
            ?>

            <div class="main-page-form__title">
                <?php echo esc_html($form_title); ?>
            </div>
            <div class="main-page-form__subtitle">
                <?php echo esc_html($form_subtitle); ?>
            </div>

            <form class="main-page-form__form form" id="contact-form">
                <div style="display: none;" class="form-item" aria-required="true" field-name="nameProduct">
                    <label class="form-item-label">
                        <span class="form-item-label-value"></span>
                        <span class="required-item">*</span>
                    </label>
                    <input type="text" name="form-type"
                        value="Заявка с формы Консультация со страницы 'Услуги' / Request from the Consultation form from the 'Services' page / 通过 “服务 ”页面的咨询表提出申请"
                        class="form-item-input request_a_call">
                    <span class="form-item-confirm-check"></span>
                </div>
                <div class="form-item white" aria-required="true" field-name="firstName">
                    <input placeholder="<?php echo esc_html($form_name_title); ?>" type="text" name="name" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item white" aria-required="true" field-name="phone">
                    <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input
                        class="form-item-input form-item-input-phone">
                    <span class="form-item-confirm-check"></span>
                </div>

                <button class="btn btn-form-white">
                    <?php echo esc_html($form_button_text); ?>
                </button>
            </form>

            <div class="loader"></div>
            <div class="form-sending">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/check.svg" alt="check">
                <div class="form-sending__title">
                    <?php echo esc_html($sending_title); ?>
                </div>
                <div class="form-sending__subtitle">
                    <?php echo esc_html($sending_subtitle); ?>
                </div>
            </div>
        </div>

        <div class="helper-form">
            <img loading="lazy" class="happy" src="<?php echo get_template_directory_uri(); ?>/layout/img/happy-women.png" alt="happy">

            <div class="helper-form__content form-wrapper">
                <?php
                // Получаем ID записи типа "forms"
                $form_id = get_posts([
                    'post_type' => 'forms',
                    'numberposts' => 1,
                    'fields' => 'ids',
                ]);

                if (!empty($form_id)) {
                    $form_id = $form_id[0]; // Берём ID первой записи

                    // Получаем значения мета-полей
                    $form_title = carbon_get_post_meta($form_id, 'helper_form_title');
                    $form_subtitle = carbon_get_post_meta($form_id, 'helper_form_subtitle');
                    $name_title = carbon_get_post_meta($form_id, 'helper_form_form_name_title');
                    $phone_title = carbon_get_post_meta($form_id, 'helper_form_form_phone_title');
                    $button_text = carbon_get_post_meta($form_id, 'helper_form_button_text');
                    $sending_title = carbon_get_post_meta($form_id, 'helper_form_sending_title');
                    $sending_subtitle = carbon_get_post_meta($form_id, 'helper_form_sending_subtitle');
                }
                ?>

                <div class="block-title">
                    <?php echo esc_html($form_title); ?>
                </div>
                <div class="block-subtitle">
                    <?php echo esc_html($form_subtitle); ?>
                </div>

                <form class="helper-form__form form" id="contact-form">
                    <div style="display: none;" class="form-item" aria-required="true" field-name="nameProduct">
                        <label class="form-item-label">
                            <span class="form-item-label-value"></span>
                            <span class="required-item">*</span>
                        </label>
                        <input type="text" name="form-type"
                            value="Заявка с формы Консультация со страницы 'Услуги' / Request from the Consultation form from the 'Services' page / 通过 “服务 ”页面的咨询表提出申请"
                            class="form-item-input request_a_call">
                        <span class="form-item-confirm-check"></span>
                    </div>
                    <div class="form-item white" aria-required="true" field-name="firstName">
                        <input placeholder="<?php echo esc_attr($name_title); ?>" type="text" name="name" class="form-item-input">
                        <span class="form-item-confirm-check"></span>
                    </div>

                    <div class="form-item white" aria-required="true" field-name="phone">
                        <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input
                            class="form-item-input form-item-input-phone">
                        <span class="form-item-confirm-check"></span>
                    </div>

                    <button class="btn btn-blue">
                        <?php echo esc_html($button_text); ?>
                    </button>
                </form>

                <div class="loader"></div>
                <div class="form-sending">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/check.svg" alt="check">
                    <div class="form-sending__title">
                        <?php echo esc_html($sending_title); ?>
                    </div>
                    <div class="form-sending__subtitle">
                        <?php echo esc_html($sending_subtitle); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>