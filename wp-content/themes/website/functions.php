<?php 

function webwebsite_assets() {
    // Подключение стилей
    wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
    wp_enqueue_style('maincss', get_template_directory_uri() . '/assets/css/style.css');

    // Подключение скриптов
    wp_enqueue_script('forms-validator', get_template_directory_uri() . '/assets/js/forms-validator.js', array(), null, true);
    wp_enqueue_script('popup', get_template_directory_uri() . '/assets/js/popup.js', array(), null, true);
    wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('intlTelInput', get_template_directory_uri() . '/assets/js/intlTelInput.min.js', array(), null, true);
    wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), null, true);
}

add_action( 'wp_enqueue_scripts', 'webwebsite_assets');

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');

show_admin_bar(false);
