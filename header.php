<?php
/**
 * Site header.
 *
 * @package H0P3
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary">
	<?php esc_html_e( 'Skip to content', 'h0p3' ); ?>
</a>
<header class="site-header">
	<div class="site-header__inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
				</a>
			<?php endif; ?>
		</div>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<button
				class="menu-toggle"
				type="button"
				aria-expanded="false"
				aria-controls="primary-navigation"
			>
				<span class="menu-toggle__label"><?php esc_html_e( 'Menu', 'h0p3' ); ?></span>
				<span class="menu-toggle__icon" aria-hidden="true"></span>
			</button>

			<?php
			wp_nav_menu(
				array(
					'theme_location'       => 'primary',
					'container'            => 'nav',
					'container_class'      => 'primary-navigation',
					'container_id'         => 'primary-navigation',
					'container_aria_label' => esc_attr__( 'Primary navigation', 'h0p3' ),
					'menu_class'           => 'primary-menu',
					'fallback_cb'          => false,
				)
			);
			?>
		<?php endif; ?>
	</div>
</header>
