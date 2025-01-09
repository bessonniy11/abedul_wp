<?php
/* Template Name: Индивидуальный  заказ */

get_header(); ?>
<main class="page individual-page">

    <div class="individual-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current">Индивидуальный заказ</li>
            </ul>
        </nav>

        <div class="block-title">
            Индивидуальный заказ
        </div>

        <div class="individual-page__wrapper">
            <div class="individual-page__content">
                <div class="individual-page-images">
                    <div class="individual-page-image ibg">
                        <img src="<?php echo get_template_directory_uri(); ?>/layout/img/individual/01.png" alt="individual-img">
                    </div>
                    <div class="individual-page-image ibg">
                        <img src="<?php echo get_template_directory_uri(); ?>/layout/img/individual/02.png" alt="individual-img">
                    </div>
                    <div class="individual-page-image ibg">
                        <img src="<?php echo get_template_directory_uri(); ?>/layout/img/individual/03.png" alt="individual-img">
                    </div>
                </div>

                <div class="individual-page-items">
                    <!-- Структура элемента individual-page-item такая:
                    1. тайтл (название шага)
                    3. текст
                    5. фотографии (необязательный блок)
                -->
                    <div class="individual-page-item">
                        <div class="individual-page-item__texts">
                            <div class="individual-page-item__title">
                                Шаг 1: Формирование технического задания
                            </div>
                            <div class="individual-page-item__text">
                                Наши инженеры проводят подробное обсуждение заказа, с целью детализации требований к оборудованию,
                                его функциональному назначению, внешнему виду и соответствию среде.
                                <br><br>
                                Конкретизируют требования к программному обеспечению, технические стандарты и так далее.
                                Перед началом проектирования, дискуссия может быть  организована один и более раз в различных
                                форматах: личные встречи с инженерами, видеоконференции,  переписка по электронной почте.
                            </div>
                        </div>
                    </div>

                    <div class="individual-page-item">
                        <div class="individual-page-item__texts">
                            <div class="individual-page-item__title">
                                Шаг 2: Проектирование
                            </div>
                            <div class="individual-page-item__text">
                                Проектирование  включает в себя разработку чертежей, функциональный дизайн и  выбор брендов
                                и моделей комплектующих. Мы предоставляем клиенту детальные чертежи и сопутствующие
                                технические характеристики. После предоставления клиентом обратной связи, мы вносим
                                изменения и запрашиваем окончательное подтверждение к реализации проекта.
                            </div>
                        </div>
                    </div>

                    <div class="individual-page-item">
                        <div class="individual-page-item__texts">
                            <div class="individual-page-item__title">
                                Шаг 3: Самплинг (изготовление образцов)
                            </div>
                            <div class="individual-page-item__text">
                                Обычно производство образцов занимает 15-20 дней. По готовности образцов оборудования,
                                завод производит их внутреннее тестирование. После достижения установленных стандартов
                                образцы передаются клиенту.
                            </div>
                        </div>
                        <div class="individual-page-item__images">
                            <div class="individual-page-item__image ibg">
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/img/individual/04.png" alt="individual-img">
                            </div>
                            <div class="individual-page-item__image ibg">
                                <img src="<?php echo get_template_directory_uri(); ?>/layout/img/individual/05.png" alt="individual-img">
                            </div>
                        </div>
                    </div>

                    <div class="individual-page-item">
                        <div class="individual-page-item__texts">
                            <div class="individual-page-item__title">
                                Шаг 4: Доставка образцов клиенту и их тестирование
                            </div>
                            <div class="individual-page-item__text">
                                Основываясь на требованиях клиента, наша компания подбирает наиболее быстрый способ доставки.
                                После тестирования образцов, клиент может принять решение о производстве в данной вариации
                                или запросить дополнительную модификацию.
                            </div>
                        </div>
                    </div>

                    <div class="individual-page-item">
                        <div class="individual-page-item__texts">
                            <div class="individual-page-item__title">
                                Шаг 5: Реализация производства
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="individual-page__form">
                <div class="individual-page__content form-wrapper">
                    <div class="individual-page-title">Связаться с нами</div>
                    <div class="individual-page-subtitle">
                        <span>Готовы сделать заказ или хотите узнать больше?</span>
                        <span>Отправьте заявку на обратный звонок!</span>
                    </div>

                    <form class="helper-form__form form" id="contact-form">
                        <div style="display: none;" class="form-item" aria-required="true" field-name="firstName">
                            <input type="text" name="page" value="Заявка со страницы индивидуального заказа" class="form-item-input">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <div class="form-item" aria-required="true" field-name="firstName">
                            <input placeholder="Ваше имя" type="text" name="name" class="form-item-input">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <div class="form-item" aria-required="true" field-name="phone">
                            <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input
                                class="form-item-input form-item-input-phone">
                            <span class="form-item-confirm-check"></span>
                        </div>

                        <button class="btn btn-blue">
                            Отправить заявку
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
    </div>
</main>


<?php get_footer(); ?>