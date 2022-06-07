<?php
/*
Template name: Homepage
 */
get_header();
?>

<div class="row homeSlider">
  <div class="swiper-container slider-home">
    <div class="swiper-wrapper">
      <?php if (have_rows('slider_home')) : ?>
        <?php while (have_rows('slider_home')) : the_row(); ?>

          <div class="swiper-slide homeSlider__slide" style="background-image:url(<?php the_sub_field('photo'); ?>)" data-nameSlide="<?php the_sub_field('slide_name'); ?>">

            <div class="swiper-content homeSlider__content">
              <h2><?php the_sub_field('title'); ?></h2>
              <p><?php the_sub_field('desc'); ?></p>
              <a href="<?php echo get_sub_field('link')['url']; ?>"><?php echo get_sub_field('link')['title']; ?></a>
            </div>

          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <!-- Add Pagination -->
  </div>
  <div class="swiper-pagination swiper-pagination_first homeSlider__buttons"></div>
</div>



<?php get_footer(); ?>