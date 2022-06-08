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

            $salePercentage = round(($product->price / $product->regular_price) * 100);

        ?>
            <a href="<?php echo get_permalink($row['product'][0]->ID) ?>">
              <header class="homeMain__hotshotHeader">
                <h2>Good Deal <span>- <?php echo $salePercentage; ?>%</span></h2>
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

  <div class="homeMain__featured"></div>
</main>



<?php get_footer(); ?>