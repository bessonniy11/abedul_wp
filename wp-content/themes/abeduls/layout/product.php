<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Abedul</title>
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

        <main class="page product-page">
            <div class="page__container">
                <nav class="breadcrumbs">
                    <ul class="breadcrumbs-list">
                        <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
                        <li class="breadcrumbs-item"><a href="/catalog" class="breadcrumbs-link">Каталог / </a></li>
                        <li class="breadcrumbs-item"><a href="/catalog/education"
                                class="breadcrumbs-link">Образование/</a></li>
                        <li class="breadcrumbs-item"><a href="/catalog/education/mobile-panels"
                                class="breadcrumbs-link">Мобильные интерактивные панели / </a></li>
                        <li class="breadcrumbs-item breadcrumbs-current">Киоск типа INGSCREEN K</li>
                    </ul>
                </nav>

                <div class="block-title">
                    Киоск типа INGSCREEN K
                </div>

                <div class="product-top">
                    <div class="product-slider">
                        <div class="product-slider__thumbnails">
                            <button class="product-slider__thumb-nav product-slider__thumb-nav--up">
                                <img loading="lazy" src="img/icons/arrow-top.svg" alt="arrow-top">
                            </button>
                            <div class="product-slider__thumb-container">
                                <div class="swiper-container product-slider__thumbs">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="thumb-img">
                                                <img loading="lazy" src="img/products/02.png" alt="Thumbnail 2"
                                                    class="product-slider__thumb">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="thumb-img">
                                                <img loading="lazy" src="img/products/03.png" alt="Thumbnail 3"
                                                    class="product-slider__thumb">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="thumb-img">
                                                <img loading="lazy" src="img/products/07.png" alt="Thumbnail 1"
                                                    class="product-slider__thumb">
                                                <img loading="lazy" class="play" src="img/icons/play.svg" alt="play">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="thumb-img">
                                                <img loading="lazy" src="img/products/04.png" alt="Thumbnail 4"
                                                    class="product-slider__thumb">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="thumb-img">
                                                <img loading="lazy" src="img/products/01.png" alt="Thumbnail 1"
                                                    class="product-slider__thumb">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="thumb-img">
                                                <img loading="lazy" src="img/products/02.png" alt="Thumbnail 2"
                                                    class="product-slider__thumb">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="thumb-img">
                                                <img loading="lazy" src="img/products/03.png" alt="Thumbnail 3"
                                                    class="product-slider__thumb">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="thumb-img">
                                                <img loading="lazy" src="img/products/04.png" alt="Thumbnail 4"
                                                    class="product-slider__thumb">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="product-slider__thumb-nav product-slider__thumb-nav--down">
                                <img loading="lazy" src="img/icons/arrow-down.svg" alt="arrow-down">
                            </button>
                        </div>

                        <div class="product-slider__main">
                            <div class="swiper product-slider-main">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a data-fslightbox="product" href="img/products/02.png">
                                            <img loading="lazy" class="product-img" src="img/products/02.png"
                                                alt="Product 1">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a data-fslightbox="product" href="img/products/03.png">
                                            <img loading="lazy" class="product-img" src="img/products/03.png"
                                                alt="Product 1">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a data-fslightbox="product" href="img/products/07.mp4">
                                            <img loading="lazy" class="product-img" src="img/products/07.png"
                                                alt="Product 1">
                                            <img loading="lazy" class="play" src="img/icons/play.svg" alt="play">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a data-fslightbox="product" href="img/products/04.png">
                                            <img loading="lazy" class="product-img" src="img/products/04.png"
                                                alt="Product 1">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a data-fslightbox="product" href="img/products/01.png">
                                            <img loading="lazy" class="product-img" src="img/products/01.png"
                                                alt="Product 1">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a data-fslightbox="product" href="img/products/02.png">
                                            <img loading="lazy" class="product-img" src="img/products/02.png"
                                                alt="Product 1">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a data-fslightbox="product" href="img/products/03.png">
                                            <img loading="lazy" class="product-img" src="img/products/03.png"
                                                alt="Product 1">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a data-fslightbox="product" href="img/products/04.png">
                                            <img loading="lazy" class="product-img" src="img/products/04.png"
                                                alt="Product 1">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a data-fslightbox="product" href="img/products/05.png">
                                            <img loading="lazy" class="product-img" src="img/products/05.png"
                                                alt="Product 1">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-slider-main-controls">
                        <div class="control-left">
                            <img loading="lazy" src="img/icons/arrow-left-blue.svg" alt="arrow-left">
                        </div>
                        <div class="control-right">
                            <img loading="lazy" src="img/icons/arrow-right-blue.svg" alt="arrow-right">
                        </div>
                    </div>

                    <div class="product-main-info">
                        <div class="product-main-info__title block-title">Киоск типа INGSCREEN K</div>
                        <a href="files/product-characteristics.xlsx" class="product-main-info__download">
                            <img loading="lazy" src="img/icons/excel.svg" alt="excel">
                            <span>Скачать характеристики товара</span>
                        </a>
                        <div class="product-main-info__article">Артикул 89776</div>
                        <div class="product-main-info__text">
                            Мобильная интерактивная панель — это не просто устройство, это ваше персональное окно в мир
                            возможностей. 
                            <br><br>
                            Мобильная панель MOBISCREEN является уникальным сочетанием передового дизайна и
                            инновационных технологий.
                            Ее подвижная конструкция позволяет легко интегрировать устройство в любое пространство, будь
                            то гостиная,
                            спальня или открытое пространство. Этот сенсорный экран объединяет функциональность
                            планшетного ПК и телевизора,
                            обеспечивая максимальную портативность и удобство использования.
                            <br><br>
                            Совместимость с приложениями Android делает ее идеальным компаньоном для развлечений, работы
                            и обучения.
                        </div>
                        <div class="product-main-info__items">
                            <div class="product-main-info__item">
                                <div class="product-main-info__item-title">Размер</div>
                                <div class="product-main-info__item-text">735*430*1400 мм;</div>
                            </div>
                            <div class="product-main-info__item">
                                <div class="product-main-info__item-title">Память</div>
                                <div class="product-main-info__item-text">ОЗУ: 8 ГБ, DDR4; ПЗУ: 128 ГБ;</div>
                            </div>
                            <div class="product-main-info__item">
                                <div class="product-main-info__item-title">Версия ОС</div>
                                <div class="product-main-info__item-text">Android 12.0;</div>
                            </div>
                            <div class="product-main-info__item">
                                <div class="product-main-info__item-title">Количество касаний</div>
                                <div class="product-main-info__item-text">10 касаний;</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-descriptions">
                    <div class="tabs">
                        <button class="tab-link active" data-tab="description">Описание</button>
                        <button class="tab-link" data-tab="specifications">
                            <span class="pc">Технические характеристики</span>
                            <span class="mob">Характеристики</span>
                        </button>
                        <button class="tab-link" data-tab="payment">Оплата</button>
                        <button class="tab-link" data-tab="certificates">Сертификаты</button>
                    </div>

                    <div class="tab-content">
                        <!-- Описание -->
                        <div class="tab-pane description active">
                            Устройство ABEDUL touch завоевала широкое признание и хорошую репутацию на рынке
                            благодаря своему высокому качеству, стильному внешнему виду и практичным функциям
                            и широко используется в различных отраслях промышленности.
                            <br><br>
                            Такие как:
                            <br><br>
                            - интерактивное обучение в детских садах, школах, университетах, учебных заведениях.
                            <br>
                            - собраниях компаний
                            <br>
                            - административных учреждениях
                            <br>
                            - и других обменах встречами и других местах.
                            <br><br>
                            Можно установить систему WINDOWS и другие операционные системы.Продукт имеет программное
                            обеспечение для написания приложений и пользователей.
                            При необходимости можно установить другие программы.
                        </div>

                        <!-- Технические характеристики -->
                        <div class="tab-pane specifications">
                            <h3>Общие параметры</h3>
                            <ul class="spec-list">
                                <li>
                                    <span class="spec-name">Размер (2 вариации)</span>
                                    <span class="spec-value">1469*1062*38 / 1469*1062*38</span>
                                </li>
                                <li>
                                    <span class="spec-name">Visual Ratio</span>
                                    <span class="spec-value">16:9</span>
                                </li>
                                <li>
                                    <span class="spec-name">Pixel pitch</span>
                                    <span class="spec-value">0.372×0.372mm / 0.4296×0.4296mm / 0.4935×0.4935mm</span>
                                </li>
                                <li>
                                    <span class="spec-name">Frequency</span>
                                    <span class="spec-value">60Hz</span>
                                </li>
                                <li>
                                    <span class="spec-name">Display Colors</span>
                                    <span class="spec-value">1.07B (10bit)</span>
                                </li>
                                <li>
                                    <span class="spec-name">Color saturability</span>
                                    <span class="spec-value">72% / 68%</span>
                                </li>
                                <li>
                                    <span class="spec-name">Touch Points</span>
                                    <span class="spec-value">20 Points Touch</span>
                                </li>
                                <!-- Добавьте остальные характеристики здесь -->
                            </ul>
                        </div>

                        <!-- Оплата -->
                        <div class="tab-pane payment">
                            Для вашего удобства мы предлагаем несколько форм оплаты
                            <br><br>
                            Юридическим лицам
                            <br><br>
                            - При оформлении доставки, оплата производится в рублях на расчетный счет в течение 3-х
                            рабочих дней с момента получения заказчиком договора на оплату. Товар отгружаем после
                            зачисления денег на р/с. Работаем с НДС 20%.
                            <br>
                            - При оформлении самовывоза, товар отгружаем сразу после оплаты.
                            <br><br>
                            Физическим лицам
                            <br><br>
                            - Наличными после доставки товара на объект.
                            <br>
                            - В нашем офисе банковской картой или наличными.
                        </div>

                        <!-- Сертификаты -->
                        <div class="tab-pane certificates">
                            <a data-fslightbox="certificate" href="img/products/certificate1.png" class="certificate">
                                <img loading="lazy" src="img/products/certificate1.png" alt="Сертификат 1">
                            </a>
                            <a data-fslightbox="certificate" href="img/products/certificate2.png" class="certificate">
                                <img loading="lazy" src="img/products/certificate2.png" alt="Сертификат 2">
                            </a>
                            <!-- Добавьте другие сертификаты по мере необходимости -->
                        </div>
                    </div>
                </div>

                <div class="opportunities">
                    <div class="block-title">
                        Возможности
                    </div>

                    <div class="opportunities-icons">
                        <img loading="lazy" src="img/opportunities-icons/windows.svg" alt="windows">
                        <img loading="lazy" src="img/opportunities-icons/android.svg" alt="android">
                        <img loading="lazy" src="img/opportunities-icons/full-hd.svg" alt="full-hd">
                        <img loading="lazy" src="img/opportunities-icons/4k.svg" alt="4k">
                        <img loading="lazy" src="img/opportunities-icons/24-hours.svg" alt="24-hours">
                        <img loading="lazy" src="img/opportunities-icons/wi-fi.svg" alt="wi-fi">
                    </div>

                    <div class="opportunities-items">
                        <div class="opportunities-item">
                            <div class="opportunities-item__content">
                                <div class="opportunities-item__content-title">
                                    Киоск типа ING Screen K
                                </div>
                                <ul class="opportunities-item__content-text">
                                    <li>Стекло класса А+</li>
                                    <li>Разрешение FULL HD, 1920*1080P</li>
                                    <li>10 точеку ИК-прикосновения</li>
                                    <li>Встроенный компьютер с операционной системой windows</li>
                                    <li>7*24 часа работы без закрытия</li>
                                    <li>Высокая яркость</li>
                                    <li>USB, HDMI, порт Ethernet LAN-RJ45 10M/100M</li>
                                </ul>
                            </div>
                            <div class="opportunities-item__img">
                                <img loading="lazy" src="img/products/01/01.png" alt="">
                            </div>
                        </div>
                        <div class="opportunities-item">
                            <div class="opportunities-item__content">
                                <div class="opportunities-item__content-title">
                                    Киоск типа ING Screen K
                                </div>
                                <ul class="opportunities-item__content-text">
                                    <li>Стекло класса А+</li>
                                    <li>Разрешение FULL HD, 1920*1080P</li>
                                    <li>10 точеку ИК-прикосновения</li>
                                    <li>Встроенный компьютер с операционной системой windows</li>
                                    <li>7*24 часа работы без закрытия</li>
                                    <li>Высокая яркость</li>
                                    <li>USB, HDMI, порт Ethernet LAN-RJ45 10M/100M</li>
                                </ul>
                            </div>
                            <div class="opportunities-item__img">
                                <img loading="lazy" src="img/products/01/02.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="products">
                    <div class="block-title">Сопутствующие товары</div>

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

                <div class="helper-form">
                    <img loading="lazy" class="happy" src="img/happy-women.png" alt="happy">

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
                            <img loading="lazy" loading="lazy" src="img/icons/check.svg" alt="check">
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

            <div class="main-page-form form-wrapper">

                <div class="main-page-form__title">
                    Не нашли, что искали?
                </div>
                <div class="main-page-form__subtitle">
                    Предложим варианты, подходящие под различные бюджеты, а также консультацию опытных специалистов для
                    оптимизации затрат
                </div>

                <form class="main-page-form__form form" id="contact-form">
                    <div class="form-item white" aria-required="true" field-name="firstName">
                        <!-- <label class="form-item-label">
                            <span class="form-item-label-value">Ваше имя</span>
                            <span class="required-item">*</span>
                        </label> -->
                        <input placeholder="Ваше имя" type="text" name="name" class="form-item-input">
                        <span class="form-item-confirm-check"></span>
                    </div>

                    <div class="form-item white" aria-required="true" field-name="phone">
                        <!-- <label class="form-item-label">
                            <span class="form-item-label-value">Телефон</span>
                            <span class="required-item">*</span>
                        </label> -->
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
                    <img loading="lazy" loading="lazy" src="img/icons/check.svg" alt="check">
                    <div class="form-sending__title">
                        Спасибо за обращение!
                    </div>
                    <div class="form-sending__subtitle">
                        Мы свяжемся с Вами в ближайшее время
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
                                    By simply clicking <span class="bold">“Chat and Apply”.</span> you will be able to
                                    show interest in a
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
                                            <span class="bold">Sign Up</span> for a Bossjob account using an Email
                                            Address or Phone Number.
                                        </span>
                                        <img loading="lazy" src="img/q-2.png" alt="question-item-img">
                                    </div>
                                    <div class="question-item-img exeption-horizontal">
                                        <span>
                                            <span class="bold">Start a chat</span> with Origin’s Hiring Manager and
                                            secure an interview slot.
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
                                            Tell us your <span class="bold">Job Preferences</span> and desired <span
                                                class="bold">Work Arrangements.</span>
                                        </span>
                                        <img loading="lazy" src="img/q-5.png" alt="question-item-img">
                                    </div>
                                    <div class="question-item-img">
                                        <span>
                                            Update your relevant <span class="bold">Work Experience</span> and <span
                                                class="bold">start applying!</span>
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
                                            Chat with the hiring manager to know more about the interview and hiring
                                            process.
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

    <script src="js/fslightbox.js"></script>
    <script src="js/forms-validator.js"></script>
    <script src="js/popup.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/intlTelInput.min.js"></script>
    <script src="js/app.js"></script>

</body>

</html>