<footer class="pageFooter">
    <div class="pageFooter__innerWrapper">
        <h2>Stopka</h2>

        <div class="pageFooter__contactBox">
            <span class="pageFooter__contactTitle">Kontakt</span>
            <span><i class="bi bi-telephone-fill"></i> <?php echo get_field('phone1') ?></span>
            <span><i class="bi bi-telephone-fill"></i> <?php echo get_field('phone2') ?></span>
            <span><i class="bi bi-envelope-fill"></i> <?php echo get_field('email') ?></span>



            <span> <?php echo get_field('address1') ?></span>
            <span> <?php echo get_field('address2') ?></span>

            <a href=" <?php echo get_field('facebook') ?>"><i class="bi bi-facebook"></i></a>
            <a href="<?php echo get_field('instagram') ?>"><i class="bi bi-instagram"></i></a>




        </div>

    </div>

</footer>

<?php wp_footer(); ?>
</body>

</html>