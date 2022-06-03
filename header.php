<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="pageHeader__shadow" id="HeaderShadow"></div>
    <header class="pageHeader">
       
        <div class="pageHeader__top">
            <div class="pageHeader__innerBox">
                <img class="pageHeader__logo" src="" alt="Logo sklepu">
                <nav class="pageHeader__mainMenu">
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'lemonPower_mainMenu'
                        )
                    ); ?>
                </nav>
                <form class="pageHeader__search" action="">
                    <input type="search" name="" id="" placeholder="Szukaj produktu">
                    <button aria-label="Wyszukaj produkty" type="submit"><i class="bi bi-search"></i></button>
                </form>
                <div class="pageHeader__userMenu">
                    <a href="moje-konto" class=""><i class="bi bi-person"></i></a>
                    <a href="wishlist" class=""><i class="bi bi-suit-heart"></i></a>
                    <a href="koszyk" class=""><i class="bi bi-basket2"></i></a>
                </div>
            </div>
        </div>
        <div class="pageHeader__bottom">
            <div class="pageHeader__innerBox">

                <?php

                $taxonomy     = 'product_cat';
                $orderby      = 'name';
                $show_count   = 0;      // 1 for yes, 0 for no
                $pad_counts   = 0;      // 1 for yes, 0 for no
                $hierarchical = 1;      // 1 for yes, 0 for no  
                $title        = '';
                $empty        = 0;

                $args = array(
                    'taxonomy'     => $taxonomy,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'hide_empty'   => $empty
                );
                $all_categories = get_categories($args);


                foreach ($all_categories as $cat) {
                    $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
                    $thumbImage = wp_get_attachment_url($thumbnail_id);
                    if ($cat->category_parent == 0 && !empty($thumbImage)) {
                        $category_id = $cat->term_id;
                ?>
                        <div class="pageHeader__subcatBox">
                            <a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>">
                                <img src="<?php echo $thumbImage ?>" />
                                <span><?php echo $cat->name; ?></span>
                                <section class="pageHeader__subcategoriesBar">
                                    <div class="pageHeader__barNav">
                                         <?php echo $cat->name; ?>
                                         <a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>">Wszystkie</a>
                                    </div>
                                    
                                   
                                    <?php

                                    $args2 = array(
                                        'taxonomy'     => $taxonomy,
                                        'child_of'     => 0,
                                        'parent'       => $category_id,
                                        'orderby'      => $orderby,
                                        'show_count'   => $show_count,
                                        'pad_counts'   => $pad_counts,
                                        'hierarchical' => $hierarchical,
                                        'title_li'     => $title,
                                        'hide_empty'   => $empty
                                    );
                                    $sub_cats = get_categories($args2);


                                    if ($sub_cats) {
                                        foreach ($sub_cats as $sub_category) {
                                    ?>
                                            <a class="pageHeader__subLinks" href="<?php echo get_term_link($sub_category->slug, 'product_cat') ?>"><?php echo $sub_category->name ?></a>
                                       
                                    <?php
                                        }
                                    }
                                    ?>
                                </section>
                            </a>
                        </div>


                <?php
                    }
                }
                ?>
            </div>
        </div>

    </header>