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
<div class="site_wrapper" id="Page">
    <main>
        <div class="site_content">
            <div class="container">
                <div class="row">
                    <?php

                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content-page');
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </main>
</div>


<?php get_footer(); ?>