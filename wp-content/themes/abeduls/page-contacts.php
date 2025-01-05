<?php
/* Template Name: Контакты */

get_header(); ?>

<main class="page contacts-page">

    <div class="contacts-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current">Контакты</li>
            </ul>
        </nav>

        <div class="block-title">
            Контакты
        </div>

        <div class="contacts-wrapper">
            <div class="contacts-content">
                <div class="contacts-content__item">
                    <div class="contacts-item">
                        <div class="contacts-item__title">Адрес главного офиса в Москве</div>
                        <a href="https://yandex.ru/maps/213/moscow/house/dubninskaya_ulitsa_83/Z04YcwJmSkYDQFtvfXR4cnhlZA==/?ll=37.556335%2C55.893460&z=17.06" target="_blank" class="contacts-item__text">
                            г. Москва ул.Дубнинская д. 83, 8-й этаж №819-820-821
                        </a>
                    </div>
                    <div class="contacts-item">
                        <div class="contacts-item__title">Телефон менеджера в России</div>
                        <a href="tel:+79999574589" target="_blank" class="contacts-item__text accent">
                            +7 999-957-45-89
                        </a>
                    </div>
                    <div class="contacts-item">
                        <div class="contacts-item__title">Почта</div>
                        <a href="mailto:info_abedul@mail.ru" target="_blank" class="contacts-item__text accent">
                            info_abedul@mail.ru
                        </a>
                    </div>
                </div>

                <div class="contacts-content__item">
                    <div class="contacts-item">
                        <div class="contacts-item__title">Адрес фабрики в Китае</div>
                        <a href="https://yandex.ru/maps/geo/5855684007/?ll=124.774477%2C48.275370&z=9.72" target="_blank" class="contacts-item__text">
                            г. Шэньчжэнь Районы Гуанмин
                        </a>
                    </div>
                    <div class="contacts-item">
                        <div class="contacts-item__title">Телефон менеджера в Китае</div>
                        <a href="tel:+8618645050994" target="_blank" class="contacts-item__text accent">
                            +86-18645050994 (WeChat)
                        </a>
                    </div>
                    <div class="contacts-item">
                        <div class="contacts-item__title">Почта</div>
                        <a href="mailto:info_abedul@mail.ru" target="_blank" class="contacts-item__text accent">
                            whz_0309@163.com
                        </a>
                    </div>
                </div>
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
                <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/check.svg" alt="check">
                <div class="form-sending__title">
                    Спасибо за обращение!
                </div>
                <div class="form-sending__subtitle">
                    Мы свяжемся с Вами в ближайшее время
                </div>
            </div>
        </div>

        <div class="helper-form">
            <img loading="lazy" class="happy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/happy-women.png" alt="happy">

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
                    <img loading="lazy" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/check.svg" alt="check">
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