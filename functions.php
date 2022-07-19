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

// custom field for register form ----------------------------------------------------------------------------------------------------------------------------
function wooc_extra_register_fields()
{ ?>
  <p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e('First name', 'woocommerce'); ?><span class="required">*</span></label>
    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
  </p>
  <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e('Last name', 'woocommerce'); ?><span class="required">*</span></label>
    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>" />
  </p>
  <p class="form-row form-row-wide">
    <label for="reg_billing_phone"><?php _e('Phone', 'woocommerce'); ?></label>
    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e($_POST['billing_phone']); ?>" />
  </p>
  <p class="form-row form-row-first">
    <label for="reg_billing_address_1"><?php _e('Ulica', 'woocommerce'); ?></label>
    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_address_1" id="reg_billing_address_1" value="<?php esc_attr_e($_POST['billing_address_1']); ?>" />
  </p>
  <p class="form-row form-row-last">
    <label for="reg_billing_address_2"><?php _e('Nr domu/lokalu', 'woocommerce'); ?></label>
    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_address_2" id="reg_billing_address_2" value="<?php esc_attr_e($_POST['billing_address_2']); ?>" />
  </p>
  <div class="clear"></div>
  <?php
}
add_action('woocommerce_register_form', 'wooc_extra_register_fields');


function wooc_validate_extra_register_fields($username, $email, $validation_errors)
{
  if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
    $validation_errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
  }
  if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
    $validation_errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));
  }
  return $validation_errors;
}
add_action('woocommerce_register_post', 'wooc_validate_extra_register_fields', 15, 3);




function wooc_save_extra_register_fields($customer_id)
{
  if (isset($_POST['billing_phone'])) {
    // Phone input filed which is used in WooCommerce
    update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
  }
  if (isset($_POST['billing_first_name'])) {
    //First name field which is by default
    update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
    // First name field which is used in WooCommerce
    update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
  }
  if (isset($_POST['billing_last_name'])) {
    // Last name field which is by default
    update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
    // Last name field which is used in WooCommerce
    update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
  }
  if (isset($_POST['billing_address_1'])) {
    // Last name field which is by default
    update_user_meta($customer_id, 'address_1', sanitize_text_field($_POST['billing_address_1']));
    // Last name field which is used in WooCommerce
    update_user_meta($customer_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
  }
  if (isset($_POST['billing_address_2'])) {
    // Last name field which is by default
    update_user_meta($customer_id, 'address_2', sanitize_text_field($_POST['billing_address_2']));
    // Last name field which is used in WooCommerce
    update_user_meta($customer_id, 'billing_address_2', sanitize_text_field($_POST['billing_address_2']));
  }
}
add_action('woocommerce_created_customer', 'wooc_save_extra_register_fields');