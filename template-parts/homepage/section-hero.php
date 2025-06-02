<?php

$hero_image_url = get_field('hero_background_image') ? get_field('hero_background_image')['url'] : DARKSIDE_THEME_DIR_URI . '/assets/images/default-hero.jpg';
$hero_title = get_field('hero_title') ? get_field('hero_title') : __('Bem-vindo à WebForce Solutions', 'darkside-theme');
$hero_subtitle = get_field('hero_subtitle') ? get_field('hero_subtitle') : __('As suas soluções digitais começam aqui.', 'darkside-theme');
$hero_button_text = get_field('hero_button_text') ? get_field('hero_button_text') : __('Saiba Mais', 'darkside-theme');
$hero_button_url = get_field('hero_button_url') ? get_field('hero_button_url') : '#about'; 

?>
<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($hero_image_url); ?>');">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
            <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
            <?php if ($hero_button_text && $hero_button_url) : ?>
                <a href="<?php echo esc_url($hero_button_url); ?>" class="btn btn-primary hero-button"><?php echo esc_html($hero_button_text); ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>