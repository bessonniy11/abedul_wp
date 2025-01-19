<?php
/* Template Name: Contacts */
$breadcrumbs_main = carbon_get_post_meta(get_the_ID(), 'breadcrumbs_main');
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
                <li class="breadcrumbs-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs-link"><?php echo esc_html($breadcrumbs_main); ?> / </a></li>
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
                        value="Заявка с формы Консультация со страницы 'Контакты' / Request from the Consultation form from the 'Contacts' page / 通过 “联系我们 ”页面的咨询表提出申请"
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
                            value="Заявка с формы Консультация со страницы 'Контакты' / Request from the Consultation form from the 'Contacts' page / 通过 “联系我们 ”页面的咨询表提出申请"
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


<script src="https://api-maps.yandex.ru/2.1/?apikey=63d5c4af-e3ce-4c0c-af9b-2d525989468c&lang=ru_RU" type="text/javascript"></script>


<?php get_footer(); ?>