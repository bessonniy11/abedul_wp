<?php
/* Template Name: Контакты */

get_header(); 
$cordinateX = carbon_get_post_meta(get_the_ID(), 'coordinate_x');
$cordinateY = carbon_get_post_meta(get_the_ID(), 'coordinate_y');
$logo_map = carbon_get_post_meta(get_the_ID(), 'logo_map');
echo '<script>
    let cordinateX ='. $cordinateX .';
    let cordinateY ='. $cordinateY .';
    let logo_map ="'. esc_url(wp_get_attachment_url($logo_map)) .'";
</script>';

?>

<main class="page contacts-page">

    <div class="contacts-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current">Контакты</li>
            </ul>
        </nav>

        <?php
            // Заголовок
            $factory_main_title = carbon_get_post_meta(get_the_ID(), 'factory_main_title');
            if (!empty($factory_main_title)) {
                echo '<div class="block-title">' . esc_html($factory_main_title) . '</div>';
            }
            // Блок (контакты + карта)
            echo '<div class="contacts-wrapper">';
                // Контакты 
                $contacts = carbon_get_post_meta(get_the_ID(), 'contacts');
                if (!empty($contacts)) {
                    echo '<div class="contacts-content">';
                        // цикл по созданию блоков контактов 
                        foreach ($contacts as $contact_items) {
                            echo '<div class="contacts-content__item">';
                                // цикл по заполнению блоков контактов 
                                foreach ($contact_items['contact_items'] as $contact) {
                                    echo '<div class="contacts-item">';
                                        // Заголовок контакта 
                                        $contact_title = $contact['contact_title'];
                                        if (!empty($contact_title)) {
                                            echo '<div class="contacts-item__title">'. esc_html($contact_title) .'</div>';
                                        }
                                        // контакт (текст )
                                        $contact_address = $contact['contact_address'];
                                        if (!empty($contact_address)) {
                                            // ссылка для контакта
                                            $contact_url = $contact['contact_url'];
                                            if (!empty($contact_url)) {
                                                echo '<a href="'. esc_html($contact_title) .'" target="_blank" class="contacts-item__text">'. esc_html($contact_address) .'</a>';
                                            } else {
                                                echo '<a href="" target="_blank" class="contacts-item__text">'. esc_html($contact_address) .'</a>';
                                            }
                                        }
                                    echo '</div>';
                                }
                            echo '</div>';
                        }
                    echo '</div>';
                }

                echo '<div class="contacts-map" id="map"></div>';
            echo '</div>';

        ?>

        

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