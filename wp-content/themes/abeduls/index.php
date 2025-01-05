<?php get_header(); ?>

<main class="page services-page">

    <div class="services-page__container">


        <div class="block-title">
            Главная
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