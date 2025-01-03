<?php
// Регистрация кастомного типа записи "Товары"
function abedul_register_product_post_type() {
    $labels = array(
        'name'               => 'Товары',
        'singular_name'      => 'Товар',
        'menu_name'          => 'Товары',
        'name_admin_bar'     => 'Товар',
        'add_new'            => 'Добавить новый',
        'add_new_item'       => 'Добавить новый товар',
        'new_item'           => 'Новый товар',
        'edit_item'          => 'Редактировать товар',
        'view_item'          => 'Просмотр товара',
        'all_items'          => 'Все товары',
        'search_items'       => 'Искать товары',
        'not_found'          => 'Товары не найдены.',
        'not_found_in_trash' => 'В корзине товаров не найдено.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array('title', 'editor', 'thumbnail'), // Поля "Название", "Описание" и "Миниатюра"
        'show_in_rest'       => true, // Для поддержки редактора Гутенберг
    );

    register_post_type('product', $args);
}
add_action('init', 'abedul_register_product_post_type');