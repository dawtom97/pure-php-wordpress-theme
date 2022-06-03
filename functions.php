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
            'lemonPower_footerMenu' => 'LemonPower Footer Menu'
        )
    );
}
add_action('after_setup_theme', 'lemonPower_config', 0);
