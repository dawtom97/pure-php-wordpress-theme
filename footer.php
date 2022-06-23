<footer class="pageFooter">
    <div class="pageFooter__innerWrapper">

        <div class="pageFooter__contactBox">
            <span class="pageFooter__subtitle">Kontakt</span>
            <span><i class="bi bi-telephone-fill"></i> <?php echo get_field('phone1') ?></span>
            <span><i class="bi bi-telephone-fill"></i> <?php echo get_field('phone2') ?></span>
            <span><i class="bi bi-envelope-fill"></i> <?php echo get_field('email') ?></span>

            <span> <?php echo get_field('address1') ?></span>
            <span> <?php echo get_field('address2') ?></span>

            <a class="pageFooter__biggerIcon" href=" <?php echo get_field('facebook') ?>"><i class="bi bi-facebook"></i></a>
            <a class="pageFooter__biggerIcon" href="<?php echo get_field('instagram') ?>"><i class="bi bi-instagram"></i></a>
            <a class="pageFooter__biggerIcon" href=""><i class="bi bi-youtube"></i></a>
            <a class="pageFooter__biggerIcon" href=""><i class="bi bi-twitter"></i></a>

        </div>

        <div class="pageFooter__contactBox">
            <span class="pageFooter__subtitle">Sklep</span>
            <nav class="pageFooter__regulationsMenu">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'lemonPower_regulationsMenu'
                    )
                ); ?>
            </nav>
        </div>

        <div class="pageFooter__contactBox">
            <span class="pageFooter__subtitle">Zamówienia</span>
            <nav class="pageFooter__regulationsMenu">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'lemonPower_footerUserMenu'
                    )
                ); ?>
            </nav>
        </div>

        <div class="pageFooter__contactBox">
            <span class="pageFooter__subtitle">Posty i promocje</span>
            <nav class="pageFooter__regulationsMenu">
                <?php
                $group = get_field('hot_shot');
                ?>
                <?php if ($group) {
                    foreach ($group as $key => $row) {

                        $r = $row['product'][0]->ID;
                        $product = wc_get_product($r);

                        $salePercentage = round(($product->price / $product->regular_price) * 100 - 100);

                ?>
                  <li>
                    <a class="pageFooter__goodDeal" href="<?php echo get_permalink($row['product'][0]->ID) ?>">Good Deal</a>
                  </li>

                <?php }
                } ?>

                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'lemonPower_footerSalesMenu'
                    )
                ); ?>
            </nav>
        </div>

    </div>

</footer>

<?php wp_footer(); ?>
</body>

</html>