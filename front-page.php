<?php
get_header();
?>

    <main id="primary" class="site-main">

        <?php
        get_template_part( 'template-parts/homepage/section', 'hero' );
        get_template_part( 'template-parts/homepage/section', 'about' );
        get_template_part( 'template-parts/homepage/section', 'services' );
        get_template_part( 'template-parts/homepage/section', 'contact' );

        get_template_part( 'template-parts/homepage/section', 'api-posts' );
        ?>

    </main>
<?php
get_footer();