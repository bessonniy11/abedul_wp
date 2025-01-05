<?php
/* Template Name: Услуги */

get_header(); ?>

<main class="page services-page">

    <div class="services-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current">Услуги</li>
            </ul>
        </nav>

        <div class="block-title">
            Услуги
        </div>


        <div class="service-questions">
            <div class="block-title">
                Часто задаваемые вопросы:
            </div>
            <div class="service-questions-content">
                <div class="service-question" data-spollers>
                    <div class="service-question__title" data-spoller>
                        <span>Сколько времени требуется на изготовление оборудования?</span>
                        <span class="visual-plus"></span>
                    </div>
                    <div class="service-question__content">
                        Производственный цикл менее чем из 50 стандартных единиц оборудования не превышает десяти дней
                    </div>
                </div>
                <div class="service-question" data-spollers>
                    <div class="service-question__title" data-spoller>
                        <span>Взимается ли плата за предоставление специальных образцов по индивидуальному заказу?</span>
                        <span class="visual-plus"></span>
                    </div>
                    <div class="service-question__content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et vitae qui
                        iure temporibus nihil ullam dolorem voluptates alias reiciendis!
                    </div>
                </div>
                <div class="service-question" data-spollers>
                    <div class="service-question__title" data-spoller>
                        <span>Сколько времени занимает доставка с китайского завода в Москву?</span>
                        <span class="visual-plus"></span>
                    </div>
                    <div class="service-question__content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et vitae qui
                        iure temporibus nihil ullam dolorem voluptates alias reiciendis!
                    </div>
                </div>
                <div class="service-question" data-spollers>
                    <div class="service-question__title" data-spoller>
                        <span>Существуют ли какие-либо требования к количеству для индивидуального производства?</span>
                        <span class="visual-plus"></span>
                    </div>
                    <div class="service-question__content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et vitae qui
                        iure temporibus nihil ullam dolorem voluptates alias reiciendis!
                    </div>
                </div>
                <div class="service-question" data-spollers>
                    <div class="service-question__title" data-spoller>
                        <span>Каков маршрут движения?</span>
                        <span class="visual-plus"></span>
                    </div>
                    <div class="service-question__content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et vitae qui
                        iure temporibus nihil ullam dolorem voluptates alias reiciendis!
                    </div>
                </div>
                <div class="service-question" data-spollers>
                    <div class="service-question__title" data-spoller>
                        <span>Что включает в себя стоимость доставки до Москвы?</span>
                        <span class="visual-plus"></span>
                    </div>
                    <div class="service-question__content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et vitae qui
                        iure temporibus nihil ullam dolorem voluptates alias reiciendis!
                    </div>
                </div>
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


<?php get_footer(); ?>