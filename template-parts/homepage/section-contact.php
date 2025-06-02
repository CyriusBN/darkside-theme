<?php

$contact_title = get_field('contact_section_title') ? get_field('contact_section_title') : __('Entre em Contato', 'darkside-theme');
$contact_form_shortcode = get_field('contact_form_shortcode'); 
?>
<section id="contact" class="contact-section section-padding">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html($contact_title); ?></h2>
        <div class="contact-form-wrapper">
            <?php
            if ( $contact_form_shortcode ) {
                echo do_shortcode( $contact_form_shortcode );
            } elseif ( class_exists( 'WPCF7' ) ) { 
                echo '<p>' . __('Por favor, configure o shortcode do formulário de contato nas opções do tema.', 'darkside-theme') . '</p>';
            } else {
                echo '<p>' . __('Plugin de formulário de contato (ex: Contact Form 7 ou WPForms) não encontrado ou shortcode não configurado.', 'darkside-theme') . '</p>';
                echo '<p>' . __('Instale e configure um plugin de formulário, depois adicione o shortcode nas opções do tema.', 'darkside-theme') . '</p>';
            }
            ?>
        </div>
    </div>
</section>