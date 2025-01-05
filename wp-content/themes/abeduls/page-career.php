<?php
/* Template Name: Карьера */

get_header(); ?>
<main class="page career-page">

    <div class="career-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current">Карьера</li>
            </ul>
        </nav>

        <div class="block-title">
            Карьера
        </div>
        <div class="career-subtitle">
            Мы создаем качественную технику для нужд наших городов — присоединяйтесь!
        </div>

        <div class="career-items">
            <div class="career-item" data-spollers>
                <div class="career-item__top" data-spoller>
                    <div class="career-item-tilte-item">
                        <div class="career-item-tilte-item-main">Менеджер по продажам</div>
                        <div class="career-item-tilte-item-low">Москва / 3-4 года / Полный день</div>
                        <span class="career-item-price-item mob">от 120 000 рублей</span>
                    </div>
                    <div class="career-item-price-item">
                        <span class="pc">от 120 000 рублей</span>
                        <span class="visual-plus"></span>
                    </div>
                </div>
                <div class="career-item-content">

                    <div class="career-info">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat, voluptatibus.
                    </div>

                    <div class="career-list-wrapper">
                        <div class="career-list-title">
                            Что мы предлагаем:
                        </div>
                        <ul class="career-list">
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>офис класса В, расположенный в пяти минутах от метро «Преображенская площадь»;</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>современное комфортное рабочее место;</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>молодой дружный коллектив;</span>
                            </li>
                        </ul>
                    </div>

                    <div class="career-list-wrapper">
                        <div class="career-list-title">
                            Обязанности:
                        </div>
                        <ul class="career-list">
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>Выполнять план продаж продукции при стратегии компании</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>Искать клиентов, выявление потребности и создавать контакты</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>Заключить контракт и предлагать сервис</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>Держать связи с клиентами</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>Командировки в СНГ</span>
                            </li>
                        </ul>
                    </div>

                    <div class="career-list-wrapper">
                        <div class="career-list-title">
                            Требования:
                        </div>
                        <ul class="career-list">
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>Образование: Выше образование (университет)</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>
                                    Опыт работы: не меньше 5 лет в маргетинге и продаже, в том три года с
                                    государственными организациями
                                </span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>Знать Китайский Язык или иметь опыт работы в организации КНР</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>Иметь знакомство с ИТ России, опыт продаж в электронной продукции</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>Знать оборудование видеоконференций и интеллектуальной техники</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/static/img/icons/minus.svg" alt="minus">
                                <span>Уметь держать отношение с коллегами и клиентами</span>
                            </li>
                        </ul>
                    </div>

                    <a href="#career-popup" class="btn btn-blue popup-link">
                        Отправить резюме
                    </a>

                </div>
            </div>
        </div>

    </div>
</main>


<?php get_footer(); ?>