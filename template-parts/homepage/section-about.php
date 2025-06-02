<?php
/**
 * Template part para a secção "Sobre" da página inicial.
 *
 * @package Darkside_Theme
 */

$about_title = get_field('about_title') ? get_field('about_title') : __('Sobre a WebForce Solutions', 'darkside-theme');
$about_text = get_field('about_text') ? get_field('about_text') : __('Somos especialistas em transformar ideias em realidade digital. A nossa paixão é criar soluções web inovadoras e eficazes que impulsionam o sucesso dos nossos clientes. Com uma equipa dedicada e experiente, estamos prontos para enfrentar qualquer desafio e entregar resultados excecionais.', 'darkside-theme');
// Podes adicionar um campo para imagem aqui também se quiseres.
// $about_image_url = get_field('about_image') ? get_field('about_image')['url'] : '';
?>
<section id="about" class="about-section section-padding">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html($about_title); ?></h2>
        <div class="about-content">
            <?php // if($about_image_url): ?>
                <?php // endif; ?>
            <p><?php echo wp_kses_post($about_text); // Usar wp_kses_post para permitir algum HTML seguro ?></p>
        </div>
    </div>
</section>