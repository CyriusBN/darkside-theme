<?php
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

define( 'DARKSIDE_THEME_DIR_URI', get_template_directory_uri() );
define( 'DARKSIDE_THEME_DIR_PATH', get_template_directory() );


if ( ! function_exists( 'darkside_theme_setup' ) ) :

	function darkside_theme_setup() {

		load_theme_textdomain( 'darkside-theme', DARKSIDE_THEME_DIR_PATH . '/languages' );

		add_theme_support( 'automatic-feed-links' );


		add_theme_support( 'title-tag' );


		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primário', 'darkside-theme' ),
				'footer-menu' => esc_html__( 'Menu do Rodapé', 'darkside-theme' ),
			)
		);


		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );


		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'darkside_theme_setup' );


function darkside_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Barra Lateral', 'darkside-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Adicione widgets aqui.', 'darkside-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'darkside_theme_widgets_init' );


function darkside_theme_scripts() {
	wp_enqueue_style( 'darkside-theme-style-underscores', get_stylesheet_uri(), array(), _S_VERSION );

    wp_enqueue_style( 'darkside-theme-main-css', DARKSIDE_THEME_DIR_URI . '/assets/css/main.css', array(), _S_VERSION );

    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css', array(), '6.5.2' ); // Verifica a versão mais recente


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'darkside_theme_scripts' );


if ( file_exists( DARKSIDE_THEME_DIR_PATH . '/inc/customizer.php' ) ) {
    require DARKSIDE_THEME_DIR_PATH . '/inc/customizer.php';
}


if ( file_exists( DARKSIDE_THEME_DIR_PATH . '/inc/template-tags.php' ) ) {
    require DARKSIDE_THEME_DIR_PATH . '/inc/template-tags.php';
}


if( !class_exists('ACF') ) {
    add_action('admin_notices', function() {
        ?>
        <div class="notice notice-error is-dismissible">
            <p><?php _e( 'O plugin Advanced Custom Fields (ACF) é necessário para este tema funcionar corretamente. Por favor, instale e ative o ACF.', 'darkside-theme' ); ?></p>
        </div>
        <?php
    });
}


function darkside_theme_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'darkside_theme_mime_types');

function darkside_theme_fix_svg_thumb_display() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'darkside_theme_fix_svg_thumb_display');

?>