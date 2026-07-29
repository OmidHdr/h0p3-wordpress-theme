<?php
/**
 * Theme setup, assets, menus, and widget areas.
 *
 * @package H0P3
 */

defined( 'ABSPATH' ) || exit;

/**
 * Configure theme defaults and supported WordPress features.
 *
 * @return void
 */
function h0p3_setup(): void {
	load_theme_textdomain( 'h0p3', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-logo' );
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'search-form',
			'script',
			'style',
		)
	);

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'h0p3' ),
			'footer'  => esc_html__( 'Footer Menu', 'h0p3' ),
		)
	);
}
add_action( 'after_setup_theme', 'h0p3_setup' );

/**
 * Get a local asset's cache-busting version.
 *
 * @param string $relative_path Path relative to the theme directory.
 * @return string
 */
function h0p3_get_asset_version( string $relative_path ): string {
	$asset_path    = get_theme_file_path( $relative_path );
	$modified_time = file_exists( $asset_path ) ? filemtime( $asset_path ) : false;

	if ( false !== $modified_time ) {
		return (string) $modified_time;
	}

	return (string) wp_get_theme()->get( 'Version' );
}

/**
 * Enqueue public theme assets.
 *
 * @return void
 */
function h0p3_enqueue_assets(): void {
	wp_enqueue_style(
		'h0p3-style',
		get_theme_file_uri( 'assets/css/main.css' ),
		array(),
		h0p3_get_asset_version( 'assets/css/main.css' )
	);
	wp_style_add_data( 'h0p3-style', 'rtl', 'replace' );

	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'h0p3-navigation',
			get_theme_file_uri( 'assets/js/main.js' ),
			array(),
			h0p3_get_asset_version( 'assets/js/main.js' ),
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'h0p3_enqueue_assets' );

/**
 * Register widget areas.
 *
 * @return void
 */
function h0p3_widgets_init(): void {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'h0p3' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'h0p3' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'h0p3_widgets_init' );
