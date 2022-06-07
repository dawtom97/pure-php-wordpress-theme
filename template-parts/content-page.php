<article class="col">
    <h3>
        <?php
        if (is_page('my-account') && !is_user_logged_in()) {
          null;
        } else {
        
         the_title();
        }
      


        ?>
    </h3>
    <div><?php the_content(); ?></div>
</article>