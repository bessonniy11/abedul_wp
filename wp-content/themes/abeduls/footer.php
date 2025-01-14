<?php
$selected_language = isset($_COOKIE['selected_language']) ? $_COOKIE['selected_language'] : 'ru'; // По умолчанию 'ru'
if ($selected_language == 'ru') {

    $name_header_in_o_t = 'header_individual_order_text';
    $name_header_se_t = 'header_services_text';
    $name_header_ca_t = 'header_career_text';
    $name_header_co_t = 'header_contacts_text';
    $name_header_fa_t = 'header_factory_text';
    

} else if ($selected_language == 'en') {
    $name_header_in_o_t = 'header_en_individual_order_text';
    $name_header_se_t = 'header_en_services_text';
    $name_header_ca_t = 'header_en_career_text';
    $name_header_co_t = 'header_en_contacts_text';
    $name_header_fa_t = 'header_en_factory_text';

} 
else if ($selected_language == 'zh') { 
    $name_header_in_o_t = 'header_zh_individual_order_text';
    $name_header_se_t = 'header_zh_services_text';
    $name_header_ca_t = 'header_zh_career_text';
    $name_header_co_t = 'header_zh_contacts_text';
    $name_header_fa_t = 'header_zh_factory_text';

}

$text_1 = !empty(carbon_get_theme_option($name_header_in_o_t)) ? carbon_get_theme_option($name_header_in_o_t) : '';
$text_2 = !empty(carbon_get_theme_option($name_header_se_t)) ? carbon_get_theme_option($name_header_se_t) : '';
$text_3 = !empty(carbon_get_theme_option($name_header_ca_t)) ? carbon_get_theme_option($name_header_ca_t) : '';
$text_4 = !empty(carbon_get_theme_option($name_header_co_t)) ? carbon_get_theme_option($name_header_co_t) : '';
$text_5 = !empty(carbon_get_theme_option($name_header_fa_t)) ? carbon_get_theme_option($name_header_fa_t) : '';

$texts =[$text_1, $text_2, $text_3, $text_4, $text_5]; 

?>


<footer class="footer">
    <div class="footer__container">
        <div class="footer-top">
            <div class="footer-top-item" data-spollers="860,max">
                <div class="footer-top-item__title" data-spoller>
                    <span>
                        <?php
                            if ($selected_language == 'ru') { echo 'Контакты';} 
                            else if ($selected_language == 'en') { echo 'Contacts'; } 
                            else if ($selected_language == 'zh') { echo '联络人';}
                        ?>
                    </span>
                    <span class="arrow-down"></span>
                </div>

                <div class="footer-top-wrapper">
                    <?php
                        // Получаем страницу с шаблоном 'page-contacts.php'
                        $page_contacts = get_posts([
                            'post_type' => 'page',
                            'posts_per_page' => 1, // Получаем одну страницу
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'page-contacts.php' // Шаблон страницы контактов
                        ]);
                        if (!empty($page_contacts)) {
                            $contacts_page = $page_contacts[0]; 
                            $contact_items = carbon_get_post_meta($contacts_page->ID, 'contacts');
                            foreach ($contact_items as $contacts) {
                                if (!empty($contacts['contact_items'])) {
                                    foreach ($contacts['contact_items'] as $contact) {
                                        echo ' 
                                            <a href="" class="footer-item">
                                                <span class="footer-item-m">'. esc_html($contact['contact_address']) .'</span>
                                                <span class="footer-item-s">'. esc_html($contact['contact_title']) .'</span>
                                            </a> 
                                        ';

                                    }
                                }
                            }
                        }
                    ?>
                </div>

            </div>
            <div class="footer-top-item" data-spollers="860,max">
                <div class="footer-top-item__title" data-spoller>
                    <span>
                        <?php
                            if ($selected_language == 'ru') { echo 'Каталог';} 
                            else if ($selected_language == 'en') { echo 'Catalog'; } 
                            else if ($selected_language == 'zh') { echo '目录';}
                        ?>
                    </span>
                    <span class="arrow-down"></span>
                </div>
                <div class="footer-top-wrapper">
                    <?php
                        // Получаем все записи категорий
                        $categories = get_posts([
                            'post_type' => 'category_group',
                            'posts_per_page' => -1, // Все категории
                        ]);
                        // Проходим по всем категориям
                        foreach ($categories as $category) {
                            // Получаем значение поля category_slug для каждой категории
                            $category_slug = get_the_title($category->ID);
                            // Проверяем, есть ли значение в поле category_slug
                            if ($category_slug) {
                                echo '<a href="" class="footer-item">';
                                    echo '<span class="footer-item-m">' . esc_html($category_slug) . '</span>';
                                echo '</a>';
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="footer-top-item" data-spollers="860,max">
                <div class="footer-top-item__title" data-spoller>
                    <span>
                        <?php
                            if ($selected_language == 'ru') { echo 'Информация';} 
                            else if ($selected_language == 'en') { echo 'Information'; } 
                            else if ($selected_language == 'zh') { echo '资料';}
                        ?>
                    </span>
                    <span class="arrow-down"></span>
                </div>
                <div class="footer-top-wrapper">
                    <?php
                        foreach ($texts as $text){
                            echo '<a href="" class="footer-item"> 
                                <span class="footer-item-m">'. esc_html($text) .'</span>
                            </a>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <a href="#order-a-call-popup" class="btn btn-blue btn-discuss-project popup-link">
            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/phone-white.svg" alt="phone">
            <span>Обсудить проект</span>
        </a>

        <div class="footer-bottom">
            <div class="footer-bottom-item">
                <a href="" class="footer-bottom-item-logo">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/logo-0.svg" alt="logo">
                </a>
            </div>
            <div class="footer-bottom-item">
                <a href="">Пользовательское соглашение</a>
                <a href="">Политика конфиденциальности</a>
            </div>
            <div class="footer-bottom-item">
                <div>OOO «ЧЖУН МИ ПО ИНТЕЛЛЕКТУАЛЬНОМУ ОСНАЩЕНИЮ</div>
                <div>г. Москва ул.Дубнинская д. 83, 8-й этаж  №819-820-821</div>
            </div>
        </div>
    </div>
</footer>

<div class="popups">
    <div class="popup video-popup" id="video-popup">
        <div class="popup__content">
            <div class="popup-close-trigger">
                <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/close-white.svg" alt="close">
            </div>
            <video id="videoPlayer" controls playsinline muted autoplay>
                <source id="videoSource" src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="video-controls">
                <div class="prev" id="prevButton">
                    <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/player/prev.svg" alt="prev">
                </div>
                <div class="play" id="playButton">
                    <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/player/pause.svg" alt="play">
                </div>
                <div class="next" id="nextButton">
                    <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/player/next.svg" alt="next">
                </div>
            </div>
            <a href="" target="_blank" class="btn btn-orange video-tiktok-link">
                View in tiktok
            </a>
        </div>
    </div>

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

            <div class="popup-subtitle">
                Киоск типа INGSCREEN K
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

    <div class="popup question-popup" id="question-popup">
        <div class="popup__content">
            <div class="question-wrapper">
                <div class="popup-close-trigger">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/close.svg" alt="close">
                </div>
                <div class="question-popup__title">
                    <div class="block-title">
                        faQ
                    </div>
                </div>
                <div class="question-items">
                    <div class="question-item">
                        <div class="question-item__title">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-brief.svg" alt="arrow-right-brief">
                            <span>What is Bossjob?</span>
                        </div>
                        <div class="question-item__subtitle">
                            Bossjob is a chat-first, AI-powered hiring platform for professionals.
                            We eliminate the lengthy hiring process by providing speedy communications between
                            talents and bosses through precise talent matching and direct chat.
                        </div>
                    </div>
                    <div class="question-item">
                        <div class="question-item__title">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-brief.svg" alt="arrow-right-brief">
                            <span>What is “Chat and Apply”?</span>
                        </div>
                        <div class="question-item__subtitle">
                            With Bossjob, applying for a job is as easy as starting a chat with an employer.
                            By simply clicking <span class="bold">“Chat and Apply”.</span> you will be able to
                            show interest in a
                            job position and directly ask questions about the job offer and company information.
                        </div>
                    </div>
                    <div class="question-item">
                        <div class="question-item__title">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-brief.svg" alt="arrow-right-brief">
                            <span>How to Apply for a Job?</span>
                        </div>
                        <div class="question-item__images">
                            <div class="question-item-img">
                                <span>Click <span class="bold">“Chat and Apply”.</span></span>
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/q-1.png" alt="question-item-img">
                            </div>
                            <div class="question-item-img">
                                <span>
                                    <span class="bold">Sign Up</span> for a Bossjob account using an Email
                                    Address or Phone Number.
                                </span>
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/q-2.png" alt="question-item-img">
                            </div>
                            <div class="question-item-img exeption-horizontal">
                                <span>
                                    <span class="bold">Start a chat</span> with Origin’s Hiring Manager and
                                    secure an interview slot.
                                </span>
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/q-3.png" alt="question-item-img">
                            </div>
                        </div>
                    </div>
                    <div class="question-item">
                        <div class="question-item__title">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-brief.svg" alt="arrow-right-brief">
                            <span>How to Sign Up?</span>
                        </div>
                        <div class="question-item__images">
                            <div class="question-item-img">
                                <span>
                                    Connect your <span class="bold">Email</span> or
                                    <span class="bold">Phone Number</span> to create
                                    an account.
                                </span>
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/q-4.png" alt="question-item-img">
                            </div>
                            <div class="question-item-img">
                                <span>
                                    Tell us your <span class="bold">Job Preferences</span> and desired <span
                                        class="bold">Work Arrangements.</span>
                                </span>
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/q-5.png" alt="question-item-img">
                            </div>
                            <div class="question-item-img">
                                <span>
                                    Update your relevant <span class="bold">Work Experience</span> and <span
                                        class="bold">start applying!</span>
                                </span>
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/q-6.png" alt="question-item-img">
                            </div>
                        </div>
                    </div>
                    <div class="question-item">
                        <div class="question-item__title">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/icons/arrow-right-brief.svg" alt="arrow-right-brief">
                            <span>How to secure an Interview with Origin Teahouse?</span>
                        </div>
                        <div class="question-item__images">
                            <div class="question-item-img exeption-vertical">
                                <span>
                                    Chat with the hiring manager to know more about the interview and hiring
                                    process.
                                </span>
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/q-7.png" alt="question-item-img">
                            </div>
                            <div class="question-item-img">
                                <span>
                                    Accept an interview invite from the hiring manager.
                                </span>
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/q-8.png" alt="question-item-img">
                            </div>
                            <div class="question-item-img">
                                <span>
                                    Show up virtually or in person (on-site) for an interview with Origin!
                                </span>
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/img/q-9.png" alt="question-item-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-button--wrapper">
                <a href="mailto:hello@bossjob.com?cc=aubrey@bossjob.com,bernie@bossjob.com&subject=I%20Have%20Some%20Questions%20about%20Hvala%20on%20Bossjob"
                    target="_blank" class="question-button">
                    <span class="question-button__title">
                        Got More Questions?
                    </span>
                    <span class="question-button__info">
                        Email us at <span class="bold">hello@bossjob.com</span> for more information.
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
</div>

<?php wp_footer(); ?>
</body>

</html>