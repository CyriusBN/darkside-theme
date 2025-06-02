<?php

$config_page_id = 72; 

$footer_contact_info = get_field('footer_contact_info', $config_page_id) ? get_field('footer_contact_info', $config_page_id) : 'R. Cap. Neco, 631, Cruzeiro/SP | (12) 3145-4004 | contato@webforcesolutions.com';
$footer_copyright = get_field('footer_copyright', $config_page_id) ? get_field('footer_copyright', $config_page_id) : '&copy; ' . date('Y') . ' WebForce Solutions. Todos os direitos reservados.';

?>
	<footer id="colophon" class="site-footer">
		<div class="container">
            <div class="footer-contact-info">
                <p><?php echo wp_kses_post($footer_contact_info); ?></p>
            </div>

            <?php
            $social_links_output = []; 
            for ($i = 1; $i <= 3; $i++) { 
                $icon_class_value = get_field('footer_social_icon_' . $i, $config_page_id);
                $url_value = get_field('footer_social_url_' . $i, $config_page_id);

                if ( $url_value && $icon_class_value ) {
                    $social_links_output[] = '<li><a href="' . esc_url($url_value) . '" target="_blank" rel="noopener noreferrer"><i class="' . esc_attr($icon_class_value) . '"></i><span class="screen-reader-text">' . esc_html(str_replace(array('fab fa-', 'fas fa-', 'far fa-'), '', $icon_class_value)) . '</span></a></li>';
                }
            }

            if (!empty($social_links_output)) :
            ?>
                <div class="footer-social-links">
                    <ul>
                        <?php echo implode('', $social_links_output);  ?>
                    </ul>
                </div>
            <?php endif;  ?>
            
            <nav class="footer-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'menu_id'        => 'footer-menu-items',
                        'fallback_cb'    => false, 
                        'depth'          => 1,     
                    )
                );
                ?>
            </nav>

			<div class="site-info">
                <p><?php echo wp_kses_post($footer_copyright); ?></p>
				<p>
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'darkside-theme' ) ); ?>">
                        <?php printf( esc_html__( 'Proudly powered by %s', 'darkside-theme' ), 'WordPress' ); ?>
                    </a>
                    <span class="sep"> | </span>
                    <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'darkside-theme' ), 'Darkside Theme', '<a href="https://example.com/">Cyrius Black</a>' ); ?>
                </p>
			</div></div> </footer></div><?php ?>

<?php wp_footer(); ?>

</body>
</html>