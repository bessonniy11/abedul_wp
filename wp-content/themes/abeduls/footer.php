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
        <div class="popup__content">
            <div class="popup-close popup-close-trigger">
                <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/close-blue.svg" alt="close">
            </div>

            <div class="popup-title">
                Заказать звонок
            </div>

            <form class="form form-popup">
                <div class="form-item" aria-required="true" field-name="firstName">
                    <label class="form-item-label">
                        <span class="form-item-label-value">Ваше имя</span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="Ваше имя" type="text" name="name" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="true" field-name="phone">
                    <label class="form-item-label">
                        <span class="form-item-label-value">Телефон</span>
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
                        <div class="custom-checkbox-label">Я даю согласие на обработку персональных данных</div>
                    </label>
                </div>

                <button class="btn btn-blue">
                    Заказать
                </button>
            </form>
        </div>
    </div>

    <div class="popup order-popup order-send-popup" id="order-send-popup">
        <div class="popup__content">
            <div class="popup-close popup-close-trigger">
                <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/close-blue.svg" alt="close">
            </div>

            <div class="popup-title">
                Оформить заявку
            </div>

            <div class="popup-subtitle"></div>

            <form class="form form-popup">
                <div style="display: none;" class="form-item" aria-required="true" field-name="nameProduct">
                    <label class="form-item-label">
                        <span class="form-item-label-value"></span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="" type="text" name="name-product" class="form-item-input name-product">
                    <span class="form-item-confirm-check"></span>
                </div>
                <div class="form-item" aria-required="true" field-name="firstName">
                    <label class="form-item-label">
                        <span class="form-item-label-value">Ваше имя</span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="Ваше имя" type="text" name="name" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="true" field-name="phone">
                    <label class="form-item-label">
                        <span class="form-item-label-value">Телефон</span>
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
                        <div class="custom-checkbox-label">Я даю согласие на обработку персональных данных</div>
                    </label>
                </div>

                <button class="btn btn-blue">
                    Заказать
                </button>
            </form>
        </div>
    </div>

    <div class="popup confirm-send-form" id="order-a-call-popup">
        <div class="popup__content">
            <div class="popup-close popup-close-trigger">
                <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/close-blue.svg" alt="close">
            </div>

            <img loading="lazy" class="popup-check-icon" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/check.svg" alt="check">

            <div class="popup-title">
                Спасибо за заявку
            </div>

            <div class="popup-subtitle">
                Мы свяжемся с Вами в ближайшее время
            </div>

            <button class="btn btn-blue popup-close-trigger">
                ОК
            </button>
        </div>
    </div>

    <div class="popup order-popup order-send-popup career-popup" id="career-popup">
        <div class="popup__content">
            <div class="popup-close popup-close-trigger">
                <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/close-blue.svg" alt="close">
            </div>

            <div class="popup-title">
                Отправить резюме
            </div>

            <form class="form form-popup">
                <div class="form-item" aria-required="true" field-name="firstName">
                    <label class="form-item-label">
                        <span class="form-item-label-value">Ваше имя</span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="Ваше имя" type="text" name="name" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="true" field-name="phone">
                    <label class="form-item-label">
                        <span class="form-item-label-value">Телефон</span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input
                        class="form-item-input form-item-input-phone">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="true" field-name="position">
                    <label class="form-item-label">
                        <span class="form-item-label-value">Желаемая должность</span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="Ваше имя" type="text" name="position" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="false" field-name="email">
                    <label class="form-item-label">
                        <span class="form-item-label-value">Email</span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="Ваше имя" type="text" name="email" class="form-item-input">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item" aria-required="false" field-name="file">
                    <label class="form-item-label">
                        <span class="form-item-label-value">Резюме</span>
                        <span class="required-item">*</span>
                    </label>
                    <input placeholder="Ваше имя" type="file" name="file" class="form-item-input form-item-input-file">
                    <span class="form-item-confirm-check"></span>
                </div>

                <div class="form-item form-item-textarea" aria-required="false" field-name="coverLetter">
                    <label class="form-item-label">
                        <span class="form-item-label-value">Сопроводительное письмо</span>
                        <span class="required-item">*</span>
                    </label>
                    <textarea rows="3" name="coverLetter" id="coverLetter" class="form-item-input scroll-style"></textarea>
                    <span class="form-item-confirm-check"></span>
                </div>


                <div class="form-item form-item-checkbox transparent" aria-required="true">
                    <label class="custom-checkbox">
                        <input type="checkbox" class="">
                        <span class="checkmark">
                            <span class="checkmark-check"></span>
                        </span>
                        <div class="custom-checkbox-label">Я даю согласие на обработку персональных данных</div>
                    </label>
                </div>

                <button class="btn btn-blue">
                    Заказать
                </button>
            </form>
        </div>
    </div>

</div>
</div>

<?php wp_footer(); ?>
</body>

</html>