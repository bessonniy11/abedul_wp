<?php
// Получение ID записи типа "header"
$header_id = get_posts([
    'post_type' => 'header',
    'numberposts' => 1,
    'fields' => 'ids', // Получаем только ID
]);

if (!empty($header_id)) {
    $header_id = $header_id[0]; // Берём ID первой записи
    $header_menu_items = carbon_get_post_meta($header_id, 'header_menu_items');
    $footer_contacts_title = carbon_get_post_meta($header_id, 'footer_contacts_title');
    $footer_catalog_title = carbon_get_post_meta($header_id, 'footer_catalog_title');
    $footer_pages_title = carbon_get_post_meta($header_id, 'footer_pages_title');
    $header_project_button_text = carbon_get_post_meta($header_id, 'header_project_button_text');
    $header_logo = carbon_get_post_meta($header_id, 'header_logo');
    $footer_user_agreement = carbon_get_post_meta($header_id, 'footer_user_agreement');
    $footer_privacy_policy = carbon_get_post_meta($header_id, 'footer_privacy_policy');
    $footer_legal_entity = carbon_get_post_meta($header_id, 'footer_legal_entity');
    $header_location = carbon_get_post_meta($header_id, 'header_location');
}
?>

<footer class="footer">
    <div class="footer__container">
        <div class="footer-top">
            <div class="footer-top-item" data-spollers="860,max">
                <div class="footer-top-item__title" data-spoller>
                    <span><?php echo esc_html($footer_contacts_title); ?></span>
                    <span class="arrow-down"></span>
                </div>
                <div class="footer-top-wrapper">
                    <?php if (!empty($header_id)): ?>
                        <?php
                        $footer_contacts = carbon_get_post_meta($header_id, 'footer_contacts');
                        if (!empty($footer_contacts)):
                        ?>
                            <?php foreach ($footer_contacts as $contact): ?>
                                <a href="<?php echo !empty($contact['contact_link']) ? esc_url($contact['contact_link']) : '#'; ?>" class="footer-item">
                                    <span class="footer-item-m"><?php echo esc_html($contact['contact_title']); ?></span>
                                    <span class="footer-item-s"><?php echo esc_html($contact['contact_subtitle']); ?></span>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer-top-item" data-spollers="860,max">
                <div class="footer-top-item__title" data-spoller>
                    <span><?php echo esc_html($footer_catalog_title); ?></span>
                    <span class="arrow-down"></span>
                </div>

                <?php
                $query = new WP_Query(array(
                    'post_type' => 'category_group',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                ));

                if ($query->have_posts()) : ?>
                    <div class="footer-top-wrapper">
                        <?php while ($query->have_posts()) : $query->the_post();
                            $icon_id = carbon_get_the_post_meta('category_icon');
                            $category_slug = carbon_get_the_post_meta('category_slug');
                            $icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'full') : ''; // Получаем URL изображения
                            $subcategories = carbon_get_the_post_meta('subcategories');
                        ?>

                            <a href="/catalog/<?php echo esc_html($category_slug) ?>" class="footer-item">
                                <span class="footer-item-m"><?php the_title(); ?></span>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif;

                wp_reset_postdata();
                ?>
                <!-- <div class="footer-top-wrapper">
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Реклама и бизнес</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Образование</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Интерактивный музей</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Рестораны и общепит</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Салоны красоты и парикмахерские</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Вокзалы и аэропорты</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Рестораны и общепит</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Автосалоны</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Медицина</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Ритейл и сфера продаж</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Производственные предприятия</span>
                    </a>
                    <a href="" class="footer-item">
                        <span class="footer-item-m">Государственные компании</span>
                    </a>
                </div> -->
            </div>
            <div class="footer-top-item" data-spollers="860,max">
                <div class="footer-top-item__title" data-spoller>
                    <span><?php echo esc_html($footer_pages_title); ?></span>
                    <span class="arrow-down"></span>
                </div>
                <div class="footer-top-wrapper">
                    <?php if (!empty($header_menu_items)): ?>
                        <?php foreach ($header_menu_items as $menu_item): ?>
                            <a href="<?php echo esc_url($menu_item['menu_item_link']); ?>" class="footer-item">
                                <span class="footer-item-m"><?php echo esc_html($menu_item['menu_item_label']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <a href="#order-a-call-popup" class="btn btn-blue btn-discuss-project popup-link">
            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/phone-white.svg" alt="phone">
            <span><?php echo esc_html($header_project_button_text); ?></span>
        </a>

        <div class="footer-bottom">
            <div class="footer-bottom-item">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-bottom-item-logo">
                    <img loading="lazy" src="<?php echo esc_url($header_logo); ?>" alt="logo">
                </a>
            </div>
            <div class="footer-bottom-item">
                <a href="#user-agreement" class="popup-link"><?php echo esc_html($footer_user_agreement); ?></a>
                <a href="#privacy-policy" class="popup-link"><?php echo esc_html($footer_privacy_policy); ?></a>
            </div>
            <div class="footer-bottom-item">
                <div><?php echo esc_html($footer_legal_entity); ?></div>
                <div><?php echo esc_html($header_location); ?></div>
            </div>
        </div>
    </div>
</footer>

<div class="popups">
    <div class="popup order-popup order-a-call-popup" id="order-a-call-popup">
        <?php
        // Получение ID записи типа "forms"
        $form_id = get_posts([
            'post_type' => 'forms',
            'numberposts' => 1,
            'fields' => 'ids', // Получаем только ID
        ]);

        if (!empty($form_id)) {
            $form_id = $form_id[0]; // Берём ID первой записи
            $form_title = carbon_get_post_meta($form_id, 'request_a_call_form_popup_title');  // Получаем заголовок формы
            $form_name_title = carbon_get_post_meta($form_id, 'request_a_call_form_name_title');
            $form_phone_title = carbon_get_post_meta($form_id, 'request_a_call_form_phone_title');
            $form_checkbox_label = carbon_get_post_meta($form_id, 'request_a_call_form_checkbox_label');
            $form_button_text = carbon_get_post_meta($form_id, 'request_a_call_form_button_text');
        }
        ?>

        <div class="popup__content">
            <div class="popup-close popup-close-trigger">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/close-blue.svg" alt="close">
            </div>

            <div class="popup-title">
                <?php echo esc_html($form_title); ?>
            </div>

            <form class="form form-popup">
                <div style="display: none;" class="form-item" aria-required="true" field-name="nameProduct">
                    <label class="form-item-label">
                        <span class="form-item-label-value"></span>
                        <span class="required-item">*</span>
                    </label>
                    <input type="text" name="form-type"
                        value="Заявка с формы 'заказать обратный звонок' / Request from the 'order a callback' form / 通过 “订购回电 ”表单提出申请 "
                        class="form-item-input request_a_call">
                    <span class="form-item-confirm-check"></span>
                </div>
                <div class="form-item" aria-required="true" field-name="firstName">
                    <label class="form-item-label">
                        <span class="form-item-label-value">
                            <?php echo esc_html($form_name_title); ?>
                        </span>
                        <span class="required-item">*</span>
                    </label>
                    <input
                        placeholder="<?php echo esc_html($form_name_title); ?>"
                        type="text" name="name" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="true" field-name="phone">
                    <label class="form-item-label">
                        <span class="form-item-label-value">
                            <?php echo esc_html($form_phone_title); ?>
                        </span>
                        <span class="required-item">*</span>
                    </label>
                    <input
                        placeholder="(999) 999-99-99"
                        name="phone" type="tel" data-tel-input class="form-item-input form-item-input-phone">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item form-item-checkbox transparent" aria-required="true">
                    <label class="custom-checkbox">
                        <input type="checkbox" class="">
                        <span class="checkmark">
                            <span class="checkmark-check"></span>
                        </span>
                        <div class="custom-checkbox-label">
                            <?php echo esc_html($form_checkbox_label); ?>
                        </div>
                    </label>
                </div>

                <button class="btn btn-blue">
                    <?php echo esc_html($form_button_text); ?>
                </button>
            </form>
        </div>
    </div>

    <div class="popup order-popup order-send-popup" id="order-send-popup">
        <div class="popup__content">
            <?php
            // Получаем ID записи типа "forms"
            $form_id = get_posts([
                'post_type' => 'forms',
                'numberposts' => 1,
                'fields' => 'ids',
            ]);

            if (!empty($form_id)) {
                $form_id = $form_id[0]; // Берём ID первой записи

                $form_title = carbon_get_post_meta($form_id, 'product_request_form_title');
                $form_name_title = carbon_get_post_meta($form_id, 'product_request_form_name_title');
                $form_phone_title = carbon_get_post_meta($form_id, 'product_request_form_phone_title');
                $form_checkbox_label = carbon_get_post_meta($form_id, 'product_request_form_checkbox_label');
                $form_button_text = carbon_get_post_meta($form_id, 'product_request_form_button_text');
            }
            ?>
            <div class="popup-close popup-close-trigger">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/close-blue.svg" alt="close">
            </div>

            <div class="popup-title">
                <?php echo esc_html($form_title); ?>
            </div>

            <div class="popup-subtitle"></div> <!-- JS будет автоматически добавлять название товара -->

            <form class="form form-popup">
                <div style="display: none;" class="form-item" aria-required="true" field-name="nameProduct">
                    <input placeholder="" type="text" name="product-name" class="form-item-input name-product">
                    <span class="form-item-confirm-check"></span>
                </div>
                <div class="form-item" aria-required="true" field-name="firstName">
                    <label class="form-item-label">
                        <span class="form-item-label-value"><?php echo esc_html($form_name_title); ?></span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="<?php echo esc_html($form_name_title); ?>" type="text" name="name" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="true" field-name="phone">
                    <label class="form-item-label">
                        <span class="form-item-label-value"><?php echo esc_html($form_phone_title); ?></span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input
                        class="form-item-input form-item-input-phone">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item form-item-checkbox transparent" aria-required="true">
                    <label class="custom-checkbox">
                        <input type="checkbox" class="">
                        <span class="checkmark">
                            <span class="checkmark-check"></span>
                        </span>
                        <div class="custom-checkbox-label"><?php echo esc_html($form_checkbox_label); ?></div>
                    </label>
                </div>

                <button class="btn btn-blue">
                    <?php echo esc_html($form_button_text); ?>
                </button>
            </form>
        </div>
    </div>

    <div class="popup confirm-send-form" id="order-a-call-popup">
        <div class="popup__content">
            <?php
            // Получаем данные из мета-полей
            $form_id = get_posts([
                'post_type' => 'forms',
                'numberposts' => 1,
                'fields' => 'ids',
            ]);

            if (!empty($form_id)) {
                $form_id = $form_id[0];

                $popup_title = carbon_get_post_meta($form_id, 'confirm_popup_title');
                $popup_subtitle = carbon_get_post_meta($form_id, 'confirm_popup_subtitle');
                $popup_button_text = carbon_get_post_meta($form_id, 'confirm_popup_button_text');
            }
            ?>
            <div class="popup-close popup-close-trigger">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/close-blue.svg" alt="close">
            </div>

            <img loading="lazy" class="popup-check-icon" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/check.svg" alt="check">

            <div class="popup-title">
                <?php echo esc_html($popup_title); ?>
            </div>

            <div class="popup-subtitle">
                <?php echo esc_html($popup_subtitle); ?>
            </div>

            <button class="btn btn-blue popup-close-trigger">
                <?php echo esc_html($popup_button_text); ?>
            </button>
        </div>
    </div>

    <div class="popup order-popup order-send-popup career-popup" id="career-popup">
        <div class="popup__content">
            <?php
            // Получаем данные из мета-полей
            $form_id = get_posts([
                'post_type' => 'forms',
                'numberposts' => 1,
                'fields' => 'ids',
            ]);

            if (!empty($form_id)) {
                $form_id = $form_id[0];

                $form_title = carbon_get_post_meta($form_id, 'career_form_title');
                $form_name_title = carbon_get_post_meta($form_id, 'career_form_name_title');
                $form_phone_title = carbon_get_post_meta($form_id, 'career_form_phone_title');
                $form_position_title = carbon_get_post_meta($form_id, 'career_form_position_title');
                $form_email_title = carbon_get_post_meta($form_id, 'career_form_email_title');
                $form_file_title = carbon_get_post_meta($form_id, 'career_form_file_title');
                $form_cover_letter_title = carbon_get_post_meta($form_id, 'career_form_cover_letter_title');
                $form_checkbox_label = carbon_get_post_meta($form_id, 'career_form_checkbox_label');
                $form_button_text = carbon_get_post_meta($form_id, 'career_form_button_text');
            }
            ?>
            <div class="popup-close popup-close-trigger">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/close-blue.svg" alt="close">
            </div>

            <div class="popup-title">
                <?php echo esc_html($form_title); ?>
            </div>

            <form class="form form-popup">
                <div style="display: none;" class="form-item" aria-required="true" field-name="nameProduct">
                    <label class="form-item-label">
                        <span class="form-item-label-value"></span>
                        <span class="required-item">*</span>
                    </label>
                    <input type="text" name="form-type"
                        value="Заявка с формы 'Резюме' / Application from the 'Resume' form / 从 “简历 ”表中申请 "
                        class="form-item-input request_a_call">
                    <span class="form-item-confirm-check"></span>
                </div>
                <div class="form-item" aria-required="true" field-name="firstName">
                    <label class="form-item-label">
                        <span class="form-item-label-value"><?php echo esc_html($form_name_title); ?></span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="<?php echo esc_html($form_name_title); ?>" type="text" name="name" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="true" field-name="phone">
                    <label class="form-item-label">
                        <span class="form-item-label-value"><?php echo esc_html($form_phone_title); ?></span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input class="form-item-input form-item-input-phone">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="true" field-name="position">
                    <label class="form-item-label">
                        <span class="form-item-label-value"><?php echo esc_html($form_position_title); ?></span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="<?php echo esc_html($form_position_title); ?>" type="text" name="position" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="false" field-name="email">
                    <label class="form-item-label">
                        <span class="form-item-label-value"><?php echo esc_html($form_email_title); ?></span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="<?php echo esc_html($form_email_title); ?>" type="text" name="email" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="false" field-name="file">
                    <label class="form-item-label">
                        <span class="form-item-label-value"><?php echo esc_html($form_file_title); ?></span>
                    </label>
                    <input type="file" name="file" class="form-item-input form-item-input-file">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item form-item-textarea" aria-required="false" field-name="coverLetter">
                    <label class="form-item-label">
                        <span class="form-item-label-value"><?php echo esc_html($form_cover_letter_title); ?></span>
                    </label>
                    <textarea rows="3" name="coverLetter" class="form-item-input scroll-style"></textarea>
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item form-item-checkbox transparent" aria-required="true">
                    <label class="custom-checkbox">
                        <input type="checkbox" class="">
                        <span class="checkmark"><span class="checkmark-check"></span></span>
                        <div class="custom-checkbox-label"><?php echo esc_html($form_checkbox_label); ?></div>
                    </label>
                </div>

                <button class="btn btn-blue">
                    <?php echo esc_html($form_button_text); ?>
                </button>
            </form>
        </div>
    </div>

</div>
</div>

<?php wp_footer(); ?>
</body>

</html>