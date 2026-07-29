<?php
/**
 * Site footer.
 *
 * @package H0P3
 */

$h0p3_github_url   = esc_url_raw( get_theme_mod( 'h0p3_github_url', '' ) );
$h0p3_linkedin_url = esc_url_raw( get_theme_mod( 'h0p3_linkedin_url', '' ) );
$h0p3_email        = sanitize_email( get_theme_mod( 'h0p3_email', '' ) );
$h0p3_has_socials  = $h0p3_github_url || $h0p3_linkedin_url || $h0p3_email;
?>
<footer class="site-footer">
	<div class="site-footer__inner">
		<p class="site-footer__copyright">
			<?php
			printf(
				/* translators: 1: Current year, 2: Site name. */
				esc_html__( '© %1$s %2$s', 'h0p3' ),
				esc_html( wp_date( 'Y' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);
			?>
		</p>

		<?php
		if ( has_nav_menu( 'footer' ) ) {
			wp_nav_menu(
				array(
					'theme_location'       => 'footer',
					'container'            => 'nav',
					'container_class'      => 'footer-navigation',
					'container_aria_label' => esc_attr__( 'Footer navigation', 'h0p3' ),
					'menu_class'           => 'footer-menu',
					'fallback_cb'          => false,
					'depth'                => 1,
				)
			);
		}
		?>

		<?php if ( $h0p3_has_socials ) : ?>
			<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social links', 'h0p3' ); ?>">
				<ul class="social-links">
					<?php if ( $h0p3_github_url ) : ?>
						<li>
							<a
								href="<?php echo esc_url( $h0p3_github_url ); ?>"
								target="_blank"
								rel="noopener noreferrer"
								aria-label="<?php esc_attr_e( 'Visit GitHub profile (opens in a new tab)', 'h0p3' ); ?>"
							>
								<?php esc_html_e( 'GitHub', 'h0p3' ); ?>
							</a>
						</li>
					<?php endif; ?>

					<?php if ( $h0p3_linkedin_url ) : ?>
						<li>
							<a
								href="<?php echo esc_url( $h0p3_linkedin_url ); ?>"
								target="_blank"
								rel="noopener noreferrer"
								aria-label="<?php esc_attr_e( 'Visit LinkedIn profile (opens in a new tab)', 'h0p3' ); ?>"
							>
								<?php esc_html_e( 'LinkedIn', 'h0p3' ); ?>
							</a>
						</li>
					<?php endif; ?>

					<?php if ( $h0p3_email ) : ?>
						<li>
							<a
								href="<?php echo esc_url( 'mailto:' . antispambot( $h0p3_email ) ); ?>"
								aria-label="<?php esc_attr_e( 'Send an email', 'h0p3' ); ?>"
							>
								<?php esc_html_e( 'Email', 'h0p3' ); ?>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</nav>
		<?php endif; ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
