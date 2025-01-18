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