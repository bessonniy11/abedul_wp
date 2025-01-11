<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Abedul - проект Burger King</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <link rel="shortcut icon" href="img/favicon.svg">
    <link rel="stylesheet" href="https://use.typekit.net/jby8qxe.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Handlee:wght@400;&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;&display=swap"
        rel="stylesheet">
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
                            <img loading="lazy" class="header-search-input__search" src="img/icons/search.svg"
                                alt="search">
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
                        <a href="/individual.php" class="header-item">Индивидуальный заказ</a>
                        <a href="/services.php" class="header-item">Услуги</a>
                        <a href="/career.php" class="header-item">Карьера</a>
                        <a href="/contacts.php" class="header-item">Контакты</a>
                        <a href="/fabric.php" class="header-item">Наша фабрика</a>
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

        <main class="page projects-page">

            <div class="projects-page__container">
                <nav class="breadcrumbs">
                    <ul class="breadcrumbs-list">
                        <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                        <li class="breadcrumbs-item"><a href="/projects.php" class="breadcrumbs-link">Все проекты / </a></li>
                        <li class="breadcrumbs-item breadcrumbs-current">Burger King</li>
                    </ul>
                </nav>

                <div class="block-title">
                    Burger King
                </div>

                <div class="project-photo-items">
                    <a href="" class="project-photo-item">
                        <div class="project-photo-item__img ibg">
                            <img loading="lazy" src="img/products/01.png" alt="project-img">
                        </div>
                        <div class="project-photo-item__title">
                            Киоск типа INGSCREEN K
                        </div>
                    </a>
                    <a href="" class="project-photo-item">
                        <div class="project-photo-item__img ibg">
                            <img loading="lazy" src="img/products/02.png" alt="project-img">
                        </div>
                        <div class="project-photo-item__title">
                            Киоск типа INGSCREEN K
                        </div>
                    </a>
                    <a href="" class="project-photo-item">
                        <div class="project-photo-item__img ibg">
                            <img loading="lazy" src="img/products/03.png" alt="project-img">
                        </div>
                        <div class="project-photo-item__title">
                            Киоск типа INGSCREEN K
                        </div>
                    </a>
                    <a href="" class="project-photo-item">
                        <div class="project-photo-item__img ibg">
                            <img loading="lazy" src="img/products/04.png" alt="project-img">
                        </div>
                        <div class="project-photo-item__title">
                            Киоск типа INGSCREEN K
                        </div>
                    </a>
                </div>

                <div class="project-text-block">
                    А у нас новый реализованный проект! Теперь наши оборудования есть в колледже электроники и информатики (МИЭТ).
                    <br><br>
                    В рамках проекта были установлены:
                    <br><br>
                    - 10 рельсовых систем
                    <br>
                    - 12 интерактивных панелей
                    <br>
                    - 12 OPS
                    <br>
                    - 1 мобильная стойка
                    <br>
                    - 2 камеры Elmo
                    <br><br>
                    Теперь процесс обучения станет более увлекательным и результативным.
                    <br><br>
                    Желаем приятного и долгосрочного использования!
                </div>

                <div class="products">
                    <div class="block-title">В проекте использовали</div>

                    <div class="products-items">
                        <!-- Карточка товара -->
                        <div class="product-item">
                            <div class="product-slider swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img src="img/products/02.png" alt="Product Image 2">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/03.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/04.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/05.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/06.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/02.png" alt="Product Image 2">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/03.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/04.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/05.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/06.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/02.png" alt="Product Image 2">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/03.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/04.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/05.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/06.png" alt="Product Image 1">
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                                <p class="product-description">Сенсорный стол</p>
                                <p class="product-article">Артикул 89776</p>
                                <div class="product-buttons">
                                    <a href="product.php" class="btn btn-blue">Подробнее</a>
                                    <a href="#order-send-popup"
                                        class="btn btn-white order-product-btn popup-link">Заказать</a>
                                </div>
                            </div>
                        </div>
                        <!-- Повторяем карточку для остальных товаров -->
                        <div class="product-item">
                            <div class="product-slider swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img loading="lazy" src="img/products/05.png" alt="Product Image 1">
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                                <p class="product-description">Сенсорный стол</p>
                                <p class="product-article">Артикул 89776</p>
                                <div class="product-buttons">
                                    <a href="product.php" class="btn btn-blue">Подробнее</a>
                                    <a href="#order-send-popup"
                                        class="btn btn-white order-product-btn popup-link">Заказать</a>
                                </div>
                            </div>
                        </div>
                        <!-- Карточка товара -->
                        <div class="product-item">
                            <div class="product-slider swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img src="img/products/04.png" alt="Product Image 2">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/06.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/03.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/04.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/05.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/06.png" alt="Product Image 1">
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                                <p class="product-description">Сенсорный стол</p>
                                <p class="product-article">Артикул 89776</p>
                                <div class="product-buttons">
                                    <a href="product.php" class="btn btn-blue">Подробнее</a>
                                    <a href="#order-send-popup"
                                        class="btn btn-white order-product-btn popup-link">Заказать</a>
                                </div>
                            </div>
                        </div>
                        <!-- Карточка товара -->
                        <div class="product-item">
                            <div class="product-slider swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img src="img/products/02.png" alt="Product Image 2">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/01.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/03.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/04.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/05.png" alt="Product Image 1">
                                    </div>
                                    <div class="swiper-slide"><img src="img/products/06.png" alt="Product Image 1">
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Киоск типа INGSCREEN K</h3>
                                <p class="product-description">Сенсорный стол</p>
                                <p class="product-article">Артикул 89776</p>
                                <div class="product-buttons">
                                    <a href="product.php" class="btn btn-blue">Подробнее</a>
                                    <a href="#order-send-popup"
                                        class="btn btn-white order-product-btn popup-link">Заказать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="footer">
            <div class="footer__container">
                <div class="footer-top">
                    <div class="footer-top-item" data-spollers="860,max">
                        <div class="footer-top-item__title" data-spoller>
                            <span>Контакты</span>
                            <span class="arrow-down"></span>
                        </div>
                        <div class="footer-top-wrapper">
                            <a href="" class="footer-item">
                                <span class="footer-item-m">г. Москва ул.Дубнинская д. 83, <br> 8-й этаж
                                    №819-820-821</span>
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
                    <div class="footer-top-item" data-spollers="860,max">
                        <div class="footer-top-item__title" data-spoller>
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
                    <div class="footer-top-item" data-spollers="860,max">
                        <div class="footer-top-item__title" data-spoller>
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

            <div class="popup order-popup order-send-popup career-popup" id="career-popup">
                <div class="popup__content">
                    <div class="popup-close popup-close-trigger">
                        <img loading="lazy" loading="lazy" src="img/icons/close-blue.svg" alt="close">
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

                        <div class="form-item" aria-required="true" field-name="file">
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