<?php

/**
 * The template for the displaying all pages
 *
 * @link https://lemonbay.gatsbyjs.io;
 *
 * @package LemonPower
 * @subpackage BHP
 * @since LemonPower BHP 1.0
 */
get_header();
?>
<div class="site_wrapper topSpace" id="Page">
    <main>
        <div class="site_content">
            <div class="container">
            <div class="row">
                    <?php

                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content-page');
                    endwhile;
                    ?>

                    <?php

                    if (is_page('moje-konto') && !is_user_logged_in()) :
                    ?>
                        <h1 class="login_slogan">Join Us.</h1>
                        <a class="back-to-home" href="/bhp-project"><i class="bi bi-house-door-fill"></i> Powrót</a>

                    <?php
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </main>
</div>


<?php if (is_page('moje-konto') && !is_user_logged_in()) :
        get_footer('login');
    else :
        get_footer('footer');
    endif;
    ?>