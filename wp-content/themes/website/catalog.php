<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Catalog Abedul</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <link rel="shortcut icon" href="img/favicon.svg">
    <link rel="stylesheet" href="https://use.typekit.net/jby8qxe.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Handlee:wght@400;&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.0.1/build/css/intlTelInput.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/style.css?ver=4">
</head>

<body class="preload lock">
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <div id="overlay" class="overlay"></div>

    <div class="wrapper">

        <header class="header">
            <div class="header-top">
                <div class="header__container">
                    <a href="" class="header-contacts-item header-contacts-item-location">
                        <div class="location-icon">
                            <img loading="lazy" src="img/icons/location.svg" alt="location">
                        </div>
                        <span>г. Москва ул.Дубнинская д. 83, 8-й этаж №819-820-821 </span>
                    </a>
                    <div class="header-top-l">
                        <div class="header-language">
                            <div class="custom-select">
                                <div class="selected-option">
                                    <span class=lang-value>RU</span>
                                    <div class="lang-arrow">
                                        <img loading="lazy" src="img/icons/arrow-down.svg" alt="arrow-down">
                                    </div>
                                </div>
                                <ul class="options">
                                    <li data-lang="en">EN</li>
                                    <li data-lang="zh">中文</li>
                                </ul>
                            </div>
                        </div>
                        <a href="#order-a-call-popup" class="header-contacts-item phone-item popup-link">
                            <img loading="lazy" src="img/icons/phone.svg" alt="phone">
                            <span>Обсудить проект</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-center">
                <div class="header-center__container">
                    <a href="" class="header-logo">
                        <img loading="lazy" src="img/logo-0.svg" alt="logo">
                    </a>
                    <div class="header-center-info">
                        Производитель <br> интерактивного <br> обрудования
                    </div>
                    <div class="header-search-input-wrapper" data-da=".header-mobile-container,860,0">
                        <div class="header-search-input">
                            <input class="header-search-input__input" type="text" placeholder="Искать продукцию">
                            <img loading="lazy" class="header-search-input__search" src="img/icons/search.svg" alt="search">
                            <div class="header-search-input__close"></div>
                        </div>
                        <div class="header-search-result"></div>
                    </div>
                    <div class="header-center-contacts">
                        <a href="" class="header-contacts-item">
                            <span>info_abedul@mail.ru</span>
                        </a>
                        <a href="" class="header-contacts-item">
                            <span>+7 999-957-45-89</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="header__container">
                    <div class="header-logo">
                        <img loading="lazy" src="img/logo-0.svg" alt="logo">
                    </div>
                    <div class="header-scroll-items" data-da=".menu__mobile,960,2">
                        <div class="header-item catalog-item" data-spollers>
                            <div class="catalog-item-elem">
                                <div class="header-item-icon">
                                    <img loading="lazy" src="img/icons/catalog-item-icon.svg" alt="catalog-item-icon">
                                </div>
                                <span>Каталог</span>
                                <div class="header-item-icon header-item-icon-arrow-down">
                                    <img loading="lazy" src="img/icons/arrow-down-white.svg" alt="arrow-down">
                                </div>
                            </div>

                            <div class="catalog-mobile-trigger"></div>

                            <div class="catalog-container-wrapper" id="catalog-container-wrapper">
                                <div id="catalog-container" class="catalog-container"></div>
                            </div>
                        </div>
                        <a href="" class="header-item">Индивидуальный заказ</a>
                        <a href="" class="header-item">Услуги</a>
                        <a href="" class="header-item">Карьера</a>
                        <a href="" class="header-item">Контакты</a>
                        <a href="" class="header-item">Наша фабрика</a>
                    </div>
                </div>
            </div>
            <div class="header-scroll">
                <div class="header-mobile">
                    <div class="header__container header-mobile-container">
                        <div class="icon-menu-wrapper">
                            <div class="header__icon icon-menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="header-logo">
                            <img loading="lazy" src="img/logo-0.svg" alt="logo">
                        </div>

                        <div class="header-search">
                            <img loading="lazy" src="img/icons/search-black.svg" alt="search">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="menu__mobile">
        </div>

        <main class="page catalog-page">
            <div class="page__container">
                <nav class="breadcrumbs">
                    <ul class="breadcrumbs-list">
                        <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                        <li class="breadcrumbs-item breadcrumbs-current">Каталог</li>
                    </ul>
                </nav>

                <div class="category">
                    <div class="block-title"></div>
                </div>

                <div class="catalog">
                    <!-- Сайдбар фильтрации -->
                    <aside class="catalog-sidebar">
                        <div class="catalog-sidebar-title-wrapper">
                            <div class="catalog-sidebar-title">
                                <div class="catalog-sidebar-title__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.395 14.5H20.606L16.395 19.5H20.606" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M21 9.5L18.5 4.5L16 9.5" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.4189 8.66199H20.5809" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 19.5H3" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 14.5H3" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 9.5H3" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 4.5H3" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <span>Фильтр по параметрам</span>
                            </div>
                            <div class="catalog-sidebar-filter-form">

                            </div>
                        </div>

                        <form class="filter-form" data-da=".catalog-sidebar-filter-form,860,0">
                            <div class="filter-group">
                                <label class="filter-group-label" for="resolution">
                                    <span>Разрешение</span>
                                    <div class="filter-group-title-arrow"></div>
                                </label>
                                <div id="resolution" class="checkbox-list">
                                    <!-- Чекбоксы будут добавлены динамически -->
                                </div>
                            </div>
                            <div class="filter-group">
                                <label class="filter-group-label" for="os">
                                    <span>Операционная система</span>
                                    <div class="filter-group-title-arrow"></div>
                                </label>
                                <div id="os" class="checkbox-list">
                                    <!-- Чекбоксы будут добавлены динамически -->
                                </div>
                            </div>
                            <div class="filter-group">
                                <label class="filter-group-label" for="diagonal">
                                    <span>Диагональ</span>
                                    <div class="filter-group-title-arrow"></div>
                                </label>
                                <div id="diagonal" class="checkbox-list">
                                    <!-- Чекбоксы будут добавлены динамически -->
                                </div>
                            </div>
                            <div class="filter-group">
                                <label class="filter-group-label" for="brightness">
                                    <span>Яркость</span>
                                    <div class="filter-group-title-arrow"></div>
                                </label>
                                <div id="brightness" class="checkbox-list">
                                    <!-- Чекбоксы будут добавлены динамически -->
                                </div>
                            </div>
                            <div class="filter-group">
                                <label class="filter-group-label" for="displayTechnology">
                                    <span>Технология дисплея</span>
                                    <div class="filter-group-title-arrow"></div>
                                </label>
                                <div id="displayTechnology" class="checkbox-list">
                                    <!-- Чекбоксы будут добавлены динамически -->
                                </div>
                            </div>
                            <div class="filter-form__buttons">
                                <button type="submit" class="btn btn-blue">Применить фильтры</button>
                                <button class="btn btn-white">Сбросить</button>
                            </div>
                        </form>
                    </aside>

                    <!-- Список товаров -->
                    <section class="products">
                        <div class="products-top-panel">
                            <div class="search-input-wrapper">
                                <div class="header-search-input">
                                    <input class="header-search-input__input catalog-search-input" type="text" placeholder="Поиск">
                                    <img loading="lazy" class="header-search-input__search" src="img/icons/search.svg" alt="search">
                                    <div class="header-search-input__close"></div>
                                </div>
                            </div>
                            <div class="view-types">
                                <div class="view-type active" data-view="grid">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 5.96667L1.5 1.5L5.96667 1.5V5.96667H1.5ZM0 1C0 0.447716 0.447715 0 1 0L6.46667 0C7.01895 0 7.46667 0.447715 7.46667 1V6.46667C7.46667 7.01895 7.01895 7.46667 6.46667 7.46667H1C0.447716 7.46667 0 7.01895 0 6.46667L0 1ZM10.0333 5.96667V1.5L14.5 1.5V5.96667H10.0333ZM8.53333 1C8.53333 0.447716 8.98105 0 9.53333 0L15 0C15.5523 0 16 0.447715 16 1V6.46667C16 7.01895 15.5523 7.46667 15 7.46667H9.53333C8.98105 7.46667 8.53333 7.01895 8.53333 6.46667V1ZM10.0333 10.0333V14.5H14.5V10.0333H10.0333ZM9.53333 8.53333C8.98105 8.53333 8.53333 8.98105 8.53333 9.53333V15C8.53333 15.5523 8.98105 16 9.53333 16H15C15.5523 16 16 15.5523 16 15V9.53333C16 8.98105 15.5523 8.53333 15 8.53333H9.53333ZM1.5 14.5L1.5 10.0333H5.96667V14.5H1.5ZM0 9.53333C0 8.98105 0.447715 8.53333 1 8.53333H6.46667C7.01895 8.53333 7.46667 8.98105 7.46667 9.53333V15C7.46667 15.5523 7.01895 16 6.46667 16H1C0.447716 16 0 15.5523 0 15L0 9.53333Z" fill="#797979" />
                                    </svg>
                                </div>
                                <div class="view-type" data-view="list">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 5.5L1.5 1.5L14.5 1.5V5.5H1.5ZM0 1C0 0.447715 0.447715 0 1 0L15 0C15.5523 0 16 0.447715 16 1V6C16 6.55228 15.5523 7 15 7H1C0.447715 7 0 6.55228 0 6L0 1ZM1.5 14.5L1.5 10.5H14.5V14.5H1.5ZM0 10C0 9.44771 0.447715 9 1 9H15C15.5523 9 16 9.44772 16 10V15C16 15.5523 15.5523 16 15 16H1C0.447715 16 0 15.5523 0 15L0 10Z" fill="#797979" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="products-items list">
                            <!-- Карточки товаров будут генерироваться динамически -->
                        </div>
                        <!-- Пагинация -->
                        <div class="pagination">
                            <button class="pagination-btn active">1</button>
                            <button class="pagination-btn">2</button>
                            <button class="pagination-btn">3</button>
                        </div>
                    </section>


                </div>

        </main>

        <footer class="footer">
            <div class="footer__container">
                <div class="footer-top">
                    <div class="footer-top-item">
                        <div class="footer-top-item__title">
                            <span>Контакты</span>
                            <span class="arrow-down"></span>
                        </div>
                        <div class="footer-top-wrapper">
                            <a href="" class="footer-item">
                                <span class="footer-item-m">г. Москва ул.Дубнинская д. 83, <br> 8-й этаж №819-820-821</span>
                                <span class="footer-item-s">Пн-Пт: 09:30 - 18:30</span>
                            </a>
                            <a href="" class="footer-item">
                                <span class="footer-item-m">+7 999-579-91-89</span>
                                <span class="footer-item-s">Консультация</span>
                            </a>
                            <a href="" class="footer-item">
                                <span class="footer-item-m">info_abedul@mail.ru</span>
                                <span class="footer-item-s">Консультация</span>
                            </a>
                            <a href="" class="footer-item">
                                <span class="footer-item-m">г. Шэньчжэнь Районы Гуанмин</span>
                                <span class="footer-item-s">Адрес фабрики в Китае</span>
                            </a>
                            <a href="" class="footer-item">
                                <span class="footer-item-m">+86-18645050994</span>
                                <span class="footer-item-s">Менеджер Ван (WeCha)</span>
                            </a>
                            <a href="" class="footer-item">
                                <span class="footer-item-m">whz_0309@163.com</span>
                                <span class="footer-item-s">Консультация</span>
                            </a>
                        </div>
                    </div>
                    <div class="footer-top-item">
                        <div class="footer-top-item__title">
                            <span>Каталог</span>
                            <span class="arrow-down"></span>
                        </div>
                        <div class="footer-top-wrapper">
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
                        </div>
                    </div>
                    <div class="footer-top-item">
                        <div class="footer-top-item__title">
                            <span>Информация</span>
                            <span class="arrow-down"></span>
                        </div>
                        <div class="footer-top-wrapper">
                            <a href="" class="footer-item">
                                <span class="footer-item-m">Индивидуальный заказ</span>
                            </a>
                            <a href="" class="footer-item">
                                <span class="footer-item-m">Услуги</span>
                            </a>
                            <a href="" class="footer-item">
                                <span class="footer-item-m">Карьера</span>
                            </a>
                            <a href="" class="footer-item">
                                <span class="footer-item-m">О компании</span>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="#order-a-call-popup" class="btn btn-blue btn-discuss-project popup-link">
                    <img loading="lazy" src="img/icons/phone-white.svg" alt="phone">
                    <span>Обсудить проект</span>
                </a>

                <div class="footer-bottom">
                    <div class="footer-bottom-item">
                        <a href="" class="footer-bottom-item-logo">
                            <img loading="lazy" src="img/logo-0.svg" alt="logo">
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
                        <img loading="lazy" loading="lazy" src="img/icons/close-white.svg" alt="close">
                    </div>
                    <video id="videoPlayer" controls playsinline muted autoplay>
                        <source id="videoSource" src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="video-controls">
                        <div class="prev" id="prevButton">
                            <img loading="lazy" loading="lazy" src="img/icons/player/prev.svg" alt="prev">
                        </div>
                        <div class="play" id="playButton">
                            <img loading="lazy" loading="lazy" src="img/icons/player/pause.svg" alt="play">
                        </div>
                        <div class="next" id="nextButton">
                            <img loading="lazy" loading="lazy" src="img/icons/player/next.svg" alt="next">
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
                        <img loading="lazy" loading="lazy" src="img/icons/close-blue.svg" alt="close">
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
                            <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input class="form-item-input form-item-input-phone">
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
                        <img loading="lazy" loading="lazy" src="img/icons/close-blue.svg" alt="close">
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
                            <input placeholder="(999) 999-99-99" name="phone" type="tel" data-tel-input class="form-item-input form-item-input-phone">
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
                        <img loading="lazy" loading="lazy" src="img/icons/close-blue.svg" alt="close">
                    </div>

                    <img loading="lazy" class="popup-check-icon" loading="lazy" src="img/icons/check.svg" alt="check">

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
                            <img loading="lazy" src="img/icons/close.svg" alt="close">
                        </div>
                        <div class="question-popup__title">
                            <div class="block-title">
                                faQ
                            </div>
                        </div>
                        <div class="question-items">
                            <div class="question-item">
                                <div class="question-item__title">
                                    <img loading="lazy" src="img/icons/arrow-right-brief.svg" alt="arrow-right-brief">
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
                                    <img loading="lazy" src="img/icons/arrow-right-brief.svg" alt="arrow-right-brief">
                                    <span>What is “Chat and Apply”?</span>
                                </div>
                                <div class="question-item__subtitle">
                                    With Bossjob, applying for a job is as easy as starting a chat with an employer.
                                    By simply clicking <span class="bold">“Chat and Apply”.</span> you will be able to show interest in a
                                    job position and directly ask questions about the job offer and company information.
                                </div>
                            </div>
                            <div class="question-item">
                                <div class="question-item__title">
                                    <img loading="lazy" src="img/icons/arrow-right-brief.svg" alt="arrow-right-brief">
                                    <span>How to Apply for a Job?</span>
                                </div>
                                <div class="question-item__images">
                                    <div class="question-item-img">
                                        <span>Click <span class="bold">“Chat and Apply”.</span></span>
                                        <img loading="lazy" src="img/q-1.png" alt="question-item-img">
                                    </div>
                                    <div class="question-item-img">
                                        <span>
                                            <span class="bold">Sign Up</span> for a Bossjob account using an Email Address or Phone Number.
                                        </span>
                                        <img loading="lazy" src="img/q-2.png" alt="question-item-img">
                                    </div>
                                    <div class="question-item-img exeption-horizontal">
                                        <span>
                                            <span class="bold">Start a chat</span> with Origin’s Hiring Manager and secure an interview slot.
                                        </span>
                                        <img loading="lazy" src="img/q-3.png" alt="question-item-img">
                                    </div>
                                </div>
                            </div>
                            <div class="question-item">
                                <div class="question-item__title">
                                    <img loading="lazy" src="img/icons/arrow-right-brief.svg" alt="arrow-right-brief">
                                    <span>How to Sign Up?</span>
                                </div>
                                <div class="question-item__images">
                                    <div class="question-item-img">
                                        <span>
                                            Connect your <span class="bold">Email</span> or
                                            <span class="bold">Phone Number</span> to create
                                            an account.
                                        </span>
                                        <img loading="lazy" src="img/q-4.png" alt="question-item-img">
                                    </div>
                                    <div class="question-item-img">
                                        <span>
                                            Tell us your <span class="bold">Job Preferences</span> and desired <span class="bold">Work Arrangements.</span>
                                        </span>
                                        <img loading="lazy" src="img/q-5.png" alt="question-item-img">
                                    </div>
                                    <div class="question-item-img">
                                        <span>
                                            Update your relevant <span class="bold">Work Experience</span> and <span class="bold">start applying!</span>
                                        </span>
                                        <img loading="lazy" src="img/q-6.png" alt="question-item-img">
                                    </div>
                                </div>
                            </div>
                            <div class="question-item">
                                <div class="question-item__title">
                                    <img loading="lazy" src="img/icons/arrow-right-brief.svg" alt="arrow-right-brief">
                                    <span>How to secure an Interview with Origin Teahouse?</span>
                                </div>
                                <div class="question-item__images">
                                    <div class="question-item-img exeption-vertical">
                                        <span>
                                            Chat with the hiring manager to know more about the interview and hiring process.
                                        </span>
                                        <img loading="lazy" src="img/q-7.png" alt="question-item-img">
                                    </div>
                                    <div class="question-item-img">
                                        <span>
                                            Accept an interview invite from the hiring manager.
                                        </span>
                                        <img loading="lazy" src="img/q-8.png" alt="question-item-img">
                                    </div>
                                    <div class="question-item-img">
                                        <span>
                                            Show up virtually or in person (on-site) for an interview with Origin!
                                        </span>
                                        <img loading="lazy" src="img/q-9.png" alt="question-item-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="question-button--wrapper">
                        <a href="mailto:hello@bossjob.com?cc=aubrey@bossjob.com,bernie@bossjob.com&subject=I%20Have%20Some%20Questions%20about%20Hvala%20on%20Bossjob" target="_blank" class="question-button">
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

    <script src="js/fslightbox.js"></script>
    <script src="js/forms-validator.js"></script>
    <script src="js/popup.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/intlTelInput.min.js"></script>
    <script src="js/app.js"></script>

</body>

</html>