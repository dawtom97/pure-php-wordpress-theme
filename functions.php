<?php

function lemonPower_scripts()
{
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array('jquery'), '5.2.0', true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '5.2.0', 'all');
    wp_enqueue_style('bootstrap-icons', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
    wp_enqueue_style('lemonPower-main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('lemonPower-style', get_stylesheet_uri(), array(), '1.0', 'all');
    //JS
    wp_enqueue_script('cherry-lab-js', get_template_directory_uri() . '/js/script.js', array('jquery'), 1.1, true);
    //Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700');
    //JS Swiper
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'));
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
}
add_action('wp_enqueue_scripts', 'lemonPower_scripts');


function lemonPower_config()
{
    register_nav_menus(
        array(
            'lemonPower_mainMenu' => 'LemonPower Main Menu',
            'lemonPower_footerMenu' => 'LemonPower Footer Menu',
            'lemonPower_userMenu' => 'LemonPower User Menu',
            'lemonPower_regulationsMenu' => 'LemonPower Regulations Menu',
            'lemonPower_footerUserMenu' => 'LemonPower Footer User Menu',
            'lemonPower_footerSalesMenu' => 'LemonPower Footer Sales Menu'
        )
    );
    add_theme_support('custom-logo', array(
        'height' => 55,
        'width' => 130,
        'flex_height' => true,
        'flex-width' => true,
    ));
    add_theme_support( 'woocommerce', array (
        'thumbnail_image_width' => 255,
        'single_image_width' => 255,
        'product_grid' => array(
            'default_rows' => 10,
            'min_rows' => 5,
            'max_rows' => 10,
            'default_columns' => 2,
            'min_columns' => 2,
            'max_columns' => 2
        )
    ) );
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    add_theme_support('post-thumbnails');
    add_image_size('lemonPower-blog',280,300, array('center','center'));
}
add_action('after_setup_theme', 'lemonPower_config', 0);


// WC Modifications
require get_template_directory() . '/inc/wc-modifications.php';


if( function_exists('acf_add_options_page') ) {
    acf_add_options_page([
        'page_title' => __('Opcje sklepu'),
        'menu_title' => __('Opcje sklepu'),
        'menu_slug' => 'producents',
        'icon_url' => 'dashicons-admin-site',
    ]);
}