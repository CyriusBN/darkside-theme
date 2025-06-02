<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://cdn.tailwindcss.com"></script> <?php // Teu script do Tailwind CDN ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'darkside-theme' ); ?></a>

    <header id="masthead" class="site-header bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-4">
            <div class="site-branding flex items-center">
                <?php
                // Se tiveres um logo personalizado:
                if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                    the_custom_logo(); // Adiciona classes ao logo via filtro 'get_custom_logo' se necessário ou estiliza 'img.custom-logo'
                }
                ?>
                <div> <?php // Div para agrupar título e descrição ?>
                    <?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title text-xl sm:text-2xl font-bold text-gray-800 hover:text-blue-600 transition-colors duration-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title text-xl sm:text-2xl font-bold text-gray-800 hover:text-blue-600 transition-colors duration-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif; ?>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) :
                        ?>
                        <p class="site-description text-xs sm:text-sm text-gray-500 hidden sm:block"><?php echo $description; ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle md:hidden text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-controls="primary-menu" aria-expanded="false">
                    <span class="sr-only"><?php esc_html_e( 'Open main menu', 'darkside-theme' ); ?></span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'container'      => false, // Remove o container padrão do WordPress
                        'menu_class'     => 'hidden md:flex md:space-x-4', // Classes para a <ul>. 'hidden' para mobile inicialmente, 'md:flex' para desktop
                        // Para estilizar os <li> e <a> com Tailwind, pode ser necessário um Walker personalizado
                        // ou adicionar classes via JavaScript, ou usar filtros de menu.
                        // Por agora, o `menu_class` aplica ao `<ul>`.
                    )
                );
                ?>
            </nav>
        </div>
    </header>

    <?php // O restante do teu site (content) virá aqui ?>