<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;


//echo $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$salePercentage = round((intval($product->sale_price) / intval($product->regular_price)) * 100 - 100);
?>

<article class=" homeMain__productCard">

<a class="cartButton" href="<?php echo do_shortcode("[add_to_cart_url id=$product->id] ") ?>">
  <i class="bi bi-basket2"></i>
</a>

<a href="<?php echo get_permalink($product->id) ?>">
  <img src="<?php echo get_the_post_thumbnail_url($product->id) ?>" alt="<?php echo $product->name; ?>" />
  <div class="homeMain__productInfo">
	<h3><?php echo $product->name ?></h3>
	<?php if($product->sale_price):?>
		<span class="discountInfo"><?php echo $salePercentage ?>%</span>
	   <p><span class="regularPrice"><?php echo $product->regular_price ?> zł</span><?php echo $product->sale_price ?> zł</p>
	<?php else:?>
		<p><?php echo $product->regular_price ?> zł</p>
	<?php endif; ?>
  </div>
</a>


</article>
