<?php
/* Template Name: Карьера */

get_header();

// Получаем данные
$career_page_title = carbon_get_the_post_meta('career_page_title');
$career_subtitle = carbon_get_the_post_meta('career_subtitle');
$career_items = carbon_get_the_post_meta('career_items');
$career_button_text = carbon_get_the_post_meta('career_button_text');
$career_button_text = $career_button_text ?: 'Отправить резюме';
?>

<main class="page career-page">

    <div class="career-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current">
                    <?php echo esc_html($career_page_title); ?>
                </li>
            </ul>
        </nav>

        <div class="block-title">
            <?php echo esc_html($career_page_title); ?>
        </div>
        <?php if ($career_subtitle): ?>
            <div class="career-subtitle">
                <?php echo esc_html($career_subtitle); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($career_items)): ?>
            <div class="career-items">
                <?php foreach ($career_items as $item): ?>
                    <div class="career-item" data-spollers>
                        <div class="career-item__top" data-spoller>
                            <div class="career-item-tilte-item">
                                <div class="career-item-tilte-item-main">
                                    <?php echo esc_html($item['title']); ?>
                                </div>
                                <div class="career-item-tilte-item-low">
                                    <?php echo esc_html($item['subtitle']); ?>
                                </div>
                                <span class="career-item-price-item mob">
                                    <?php echo esc_html($item['salary']); ?>
                                </span>
                            </div>
                            <div class="career-item-price-item">
                                <span class="pc"><?php echo esc_html($item['salary']); ?></span>
                                <span class="visual-plus"></span>
                            </div>
                        </div>
                        <div class="career-item-content">
                            <div class="career-info">
                                <?php echo wp_kses_post($item['description']); ?>
                            </div>

                            <?php if (!empty($item['offers'])): ?>
                                <div class="career-list-wrapper">
                                    <div class="career-list-title">
                                        <?php echo esc_html($item['offers_title'] ?: 'Что мы предлагаем:'); ?>
                                    </div>
                                    <ul class="career-list">
                                        <?php foreach ($item['offers'] as $offer): ?>
                                            <li>
                                                <img src="<?php echo esc_url(get_template_directory_uri() . '/layout/img/icons/minus.svg'); ?>" alt="minus">
                                                <span><?php echo esc_html($offer['offer']); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($item['responsibilities'])): ?>
                                <div class="career-list-wrapper">
                                    <div class="career-list-title">
                                        <?php echo esc_html($item['responsibilities_title'] ?: 'Обязанности:'); ?>
                                    </div>
                                    <ul class="career-list">
                                        <?php foreach ($item['responsibilities'] as $responsibility): ?>
                                            <li>
                                                <img src="<?php echo esc_url(get_template_directory_uri() . '/layout/img/icons/minus.svg'); ?>" alt="minus">
                                                <span><?php echo esc_html($responsibility['responsibility']); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($item['requirements'])): ?>
                                <div class="career-list-wrapper">
                                    <div class="career-list-title">
                                        <?php echo esc_html($item['requirements_title'] ?: 'Требования:'); ?>
                                    </div>
                                    <ul class="career-list">
                                        <?php foreach ($item['requirements'] as $requirement): ?>
                                            <li>
                                                <img src="<?php echo esc_url(get_template_directory_uri() . '/layout/img/icons/minus.svg'); ?>" alt="minus">
                                                <span><?php echo esc_html($requirement['requirement']); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <a href="#career-popup" class="btn btn-blue popup-link"><?php echo esc_html($career_button_text); ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

</main>

<?php get_footer(); ?>