<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head();?>
</head>

<body <?php body_class(); ?>>

    <header class="pageHeader">
        <div class="pageHeader__top">
             <div class="pageHeader__innerBox">
                 <nav class="pageHeader__mainMenu">
                     <?php wp_nav_menu(
                         array(
                            'theme_location' => 'lemonPower_mainMenu'
                         )
                     ); ?>
                 </nav>
                 <form class="pageHeader__search" action="">
                     <input type="search" name="" id="">
                     <button aria-label="Wyszukaj produkty" type="submit"><i class="bi bi-search"></i></button>
                 </form>
             </div>
        </div>
        <div class="pageHeader__bottom">
             <div class="pageHeader__innerBox"></div>
        </div>
       
    </header>