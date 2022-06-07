<?php

function lemonPower_wc_modify()
{
    // add_action('woocommerce_before_main_content','lemonPower_open_container_row',5);
    // function lemonPower_open_container_row() {
    //     echo '<div class="container shop-content"><div class="row">';
    // }
    // add_action('woocommerce_after_main_content','lemonPower_close_container_row',5);
    // function lemonPower_close_container_row() {
    //     echo '</div></div>';
    // }

    // remove_action('woocommerce_sidebar','woocommerce_get_sidebar');

    // add_action('woocommerce_before_main_content','woocommerce_get_sidebar',6);

    // add_filter('woocommerce_show_page_title', 'lemonPower_remove_shop_title');
    // function lemonPower_remove_shop_title($val) {
    //     $val = false;
    //     return $val;
    // }


    // Add product short description inside product card
    add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);
}

add_action('wp','lemonPower_wc_modify');