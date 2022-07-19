<?php

/**
 * Template for displaying search forms in Fancy Lab
 *
 * @package Fancy Lab
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Wyszukaj produkt &hellip;', 'placeholder', 'twentysixteen'); ?>" value="<?php echo get_search_query(); ?>" name="s"/>
       <button aria-label="Wyszukaj produkt" type="submit" class="search-submit"><i class="bi bi-search"></i></button>
   <?php if(class_exists('WooCommerce')) : ?>
       <input type="hidden" value="product" name="post_type" id="posty_type">
    <?php endif; ?>
</form>