<?php
/*
Template name: Homepage
 */
get_header();
?>

<div class="row homeSlider topSpace">
  <div class="swiper-container slider-home">
    <div class="swiper-wrapper">
      <?php if (have_rows('slider_home')) : ?>
        <?php while (have_rows('slider_home')) : the_row(); ?>

          <div class="swiper-slide homeSlider__slide" style="background-image:url(<?php the_sub_field('photo'); ?>)" data-nameSlide="<?php the_sub_field('slide_name'); ?>">

            <div class="swiper-content homeSlider__content">
              <div>
                <h2><?php the_sub_field('title'); ?></h2>
                <p><?php the_sub_field('desc'); ?></p>
              </div>

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

<main class="homeMain">
  <aside class="homeMain__hotShot">
    <div class="">
      <div>
        <?php
        $group = get_field('hot_shot');
        ?>
        <?php if ($group) {
          foreach ($group as $key => $row) {

            $r = $row['product'][0]->ID;
            $product = wc_get_product($r);

            $salePercentage = round(($product->price / $product->regular_price) * 100 - 100);

        ?>
            <a href="<?php echo get_permalink($row['product'][0]->ID) ?>">
              <header class="homeMain__hotshotHeader">
                <h2>Good Deal <span> <?php echo $salePercentage; ?>%</span></h2>
                <p>Lepszej ceny nie znajdziesz!</p>
              </header>
              <div class="homeMain__hotshotContent">
                <?php if (isset($row['product_image']['url'])) : ?>
                  <img src="<?php echo $row['product_image']['url'] ?>" class="border_gray img-fluid" alt="">
                <?php else : ?>
                  <img src="<?php echo get_the_post_thumbnail_url($row['product'][0]->ID); ?>" class="border_gray img-fluid">
                <?php endif;

                ?>


                <h3 class="name_title"><?php echo $row['product'][0]->post_title; ?></h3>
                <!-- <p><?php echo $row['product'][0]->post_excerpt; ?></p> -->
                <p class="prevPrice"><?php echo $product->regular_price; ?> zł</p>
                <p class="newPrice"><?php echo $product->price; ?> zł</p>

              </div>

            </a>

            <div id="clockdiv" class="d-flex flex-column align-items-center justify-content-center text-center homeMain__hotshotClock">
              <p class="p-2">Do końca promocji:</p>
              <div class="d-flex">
                <div class="p-2">
                  <span class="days gray_circle"></span>
                  <div class="smalltext">dni</div>
                </div>
                <div class="p-2">
                  <span class="hours gray_circle"></span>
                  <div class="smalltext">godzin</div>
                </div>
                <div class="p-2">
                  <span class="minutes gray_circle"></span>
                  <div class="smalltext">minut</div>
                </div>
                <div class="p-2">
                  <span class="seconds gray_circle"></span>
                  <div class="smalltext">sekund</div>
                </div>
              </div>
            </div>


            <script>
              function getTimeRemaining(endtime) {
                var t = Date.parse(endtime) - Date.parse(new Date());
                var seconds = Math.floor((t / 1000) % 60);
                var minutes = Math.floor((t / 1000 / 60) % 60);
                var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                var days = Math.floor(t / (1000 * 60 * 60 * 24));
                return {
                  'total': t,
                  'days': days,
                  'hours': hours,
                  'minutes': minutes,
                  'seconds': seconds
                };
              }

              function initializeClock(id, endtime) {
                var clock = document.getElementById(id);
                var daysSpan = clock.querySelector('.days');
                var hoursSpan = clock.querySelector('.hours');
                var minutesSpan = clock.querySelector('.minutes');
                var secondsSpan = clock.querySelector('.seconds');

                if (endtime <= new Date()) {
                  daysSpan.innerHTML = 0;
                  hoursSpan.innerHTML = ('0').slice(-2);
                  minutesSpan.innerHTML = ('0').slice(-2);
                  secondsSpan.innerHTML = ('0').slice(-2);
                } else {
                  function updateClock() {
                    var t = getTimeRemaining(endtime);

                    daysSpan.innerHTML = t.days;
                    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                    if (t.total <= 0) {
                      clearInterval(timeinterval);
                    }
                  }
                  updateClock();
                  var timeinterval = setInterval(updateClock, 1000);
                }
              }

              var date = `<?php echo $row['hot_shot_end_date']; ?>`;
              var deadline = new Date(Date.parse(new Date(date)));
              initializeClock('clockdiv', deadline);
            </script>
        <?php }
        } ?>


      </div>
    </div>




  </aside>

  <div class="homeMain__featured">
    <?php
    date_default_timezone_set('Europe/Warsaw');
    $hour = date("H");
    if ($hour >= 6 && $hour < 18) {
      $greeting = "Dzień dobry";
    } else {
      $greeting = "Dobry wieczór";
    }
    ?>

    <h2><?php echo $greeting ?>, dziś polecamy</h2>

    <?php
    $featured_products = get_field('featured_products');
    ?>
    <div class="homeMain__cardsWrapperMobile">
      <div class="swiper-container sliderPopular">
        <div class="swiper-wrapper">
          <?php
          if ($featured_products) {
            foreach ($featured_products as $key => $row) {
              $price = wc_get_product($row->ID)->get_price();
              $url = get_permalink($row->ID);

          ?>

              <article class=" homeMain__productCard swiper-slide">

                <a class="cartButton" href="<?php echo do_shortcode("[add_to_cart_url id=$row->ID] ") ?>">
                  <i class="bi bi-basket2"></i>
                </a>

                <a href="<?php echo get_permalink($row->ID) ?>">
                  <img src="<?php echo get_the_post_thumbnail_url($row->ID) ?>" alt="<?php echo $row->post_title; ?>" />
                  <div class="homeMain__productInfo">
                    <h3><?php echo $row->post_title ?></h3>
                    <p><?php echo $price ?> zł</p>
                  </div>
                </a>


              </article>


          <?php
            }
          }
          ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>

    <div class="row homeMain__cardsWrapper">
      <?php

      if ($featured_products) {
        foreach ($featured_products as $key => $row) {
          $price = wc_get_product($row->ID)->get_price();
          $url = get_permalink($row->ID);

          // echo wc_get_product($row->ID);
      ?>
          <div class="col-lg-4 col-sm-6 homeMain__product">


            <article class=" homeMain__productCard">

              <a class="cartButton" href="<?php echo do_shortcode("[add_to_cart_url id=$row->ID] ") ?>">
                <i class="bi bi-basket2"></i>
              </a>

              <a href="<?php echo get_permalink($row->ID) ?>">
                <img src="<?php echo get_the_post_thumbnail_url($row->ID) ?>" alt="<?php echo $row->post_title; ?>" />
                <div class="homeMain__productInfo">
                  <h3><?php echo $row->post_title ?></h3>
                  <p><?php echo $price ?> zł</p>
                </div>
              </a>


            </article>


          </div>
          <!-- <?php echo do_shortcode("[product id=$row->ID columns='3' limit='3']"); ?> -->

      <?php
        }
      }
      ?>




    </div>
  </div>
</main>


<section class="homeCategories">

  <div class="homeCategories__top">
    <div>
      <h2>Kategorie odzieży BHP</h2>
      <p>Zobacz wszystkie dostępne kategorie odzieży</p>
    </div>

    <div>
      <nav class="">
        <?php wp_nav_menu(
          array(
            'theme_location' => 'lemonPower_mainMenu'
          )
        ); ?>
      </nav>
    </div>
  </div>


  <div class="swiper-container container sliderCategories">
    <?php $categories = get_terms(
      [
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'parent' => 0, // bez rodzica
      ]
    );

    ?>
    <div class="swiper-wrapper">
      <?php foreach ($categories as $key => $category) : ?>
        <?php
        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);
        ?>
        <?php if ($image) : ?>
          <a href="<?php echo $category->slug; ?>" class="swiper-slide homeCategories__categoryCard">
            <img class="" src="<?php echo $image; ?>" alt="">
            <h3><?php echo $category->name ?></h3>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>


<section class="homeBlog">
  <h2>Najnowsze wpisy</h2>
  <p>Zobacz nasze poradniki i nowinki ze świata BHP</p>

  <div class="swiper-container sliderPosts">
    <div class="swiper-wrapper">
      <?php

      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 7
      );
      $blog_posts = new WP_Query($args);


      if ($blog_posts->have_posts()) :
        while ($blog_posts->have_posts()) : $blog_posts->the_post();
          $content = get_the_excerpt();
          $content = strip_tags($content);

      ?>
          <article class="swiper-slide homeBlog__postCard">
            <a href="<?php the_permalink(); ?>">
              <div>
                <?php if (has_post_thumbnail()) :
                  the_post_thumbnail('lemonPower-blog', array('class' => 'postCardImg'))
                ?>
                <?php endif ?>
              </div>
              <h3><?php the_title() ?></h3>
              <p><?php echo substr($content, 0, 40); ?>...</p>
              <p class="postDate">Dodano: <?php echo get_the_date() ?></p>
            </a>
          </article>
        <?php
        endwhile;
      else :
        ?>
        <p>Nothing to display</p>
      <?php endif ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

</section>



<section class="homePopular">
  <h2>Popularne produkty</h2>
  <p>Zobacz wszystkie dostępne kategorie odzieży</p>
  <!-- <div class="">
    <?php echo do_shortcode('[products limit="5" columns="5" orderby="popularity"]'); ?>
  </div> -->
  <div class="swiper-container sliderPopular">
    <div class="swiper-wrapper">
      <?php

      $args = array(
        'post_type' => 'product',
        'posts_per_page' => 7,
        'orderby' => 'date'
      );
      $item_posts = new WP_Query($args);


      if ($item_posts->have_posts()) :
        while ($item_posts->have_posts()) : $item_posts->the_post();
          the_post();
          do_action('woocommerce_shop_loop');
          wc_get_template_part('content', 'product');
      ?>

        <?php endwhile; ?>
      <?php endif ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>




<?php get_footer(); ?>