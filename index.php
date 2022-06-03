<?php

/**
 * The main template file
 *
 * @link https://lemonbay.gatsbyjs.io;
 *
 * @package LemonPower
 * @subpackage BHP
 * @since LemonPower BHP 1.0
 */
get_header();
?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <article>
            <p>aaaaaaaa</p>
            <h2><?php the_title(); ?></h2>
        </article>
    <?php
    endwhile;
else :
    ?>
    <p>Nothing to display</p>
<?php endif ?>

<?php get_footer(); ?>