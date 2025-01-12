<?php
/* Template Name: Контакты */

get_header();
$cordinateX = carbon_get_post_meta(get_the_ID(), 'coordinate_x');
$cordinateY = carbon_get_post_meta(get_the_ID(), 'coordinate_y');
$logo_map = carbon_get_post_meta(get_the_ID(), 'logo_map');
echo '<script>
    let cordinateX =' . $cordinateX . ';
    let cordinateY =' . $cordinateY . ';
    let logo_map ="' . esc_url(wp_get_attachment_url($logo_map)) . '";
</script>';
?>

<main class="page contacts-page">

    <div class="contacts-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current"><?php echo esc_html(carbon_get_the_post_meta('contacts_main_title')); ?></li>
            </ul>
        </nav>

        <div class="block-title">
            <?php echo esc_html(carbon_get_the_post_meta('contacts_main_title')); ?>
        </div>

        <div class="contacts-wrapper">
            <div class="contacts-content">
                <?php
                $contacts = carbon_get_the_post_meta('contacts');
                if (!empty($contacts)) {
                    foreach ($contacts as $contact_group) {
                        echo '<div class="contacts-content__item">';
                        if (!empty($contact_group['contact_items'])) {
                            foreach ($contact_group['contact_items'] as $contact_item) {
                                $title = $contact_item['contact_title'] ?? '';
                                $address = $contact_item['contact_address'] ?? '';
                                $url = $contact_item['contact_url'] ?? '#';

                                echo '<div class="contacts-item">';
                                echo '<div class="contacts-item__title">' . esc_html($title) . '</div>';
                                echo '<a href="' . esc_url($url) . '" target="_blank" class="contacts-item__text">';
                                echo esc_html($address);
                                echo '</a>';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="contacts-map" id="map"></div>
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


<script src="https://api-maps.yandex.ru/2.1/?apikey=63d5c4af-e3ce-4c0c-af9b-2d525989468c&lang=ru_RU" type="text/javascript"></script>


<?php get_footer(); ?>