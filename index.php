<?php
/**
 * Main template file.
 *
 * @package H0P3
 */

get_header();
?>
<main id="primary" class="site-main" tabindex="-1">
	<header class="content-header">
		<h1 class="content-header__title">
			<?php
			$h0p3_posts_page_id    = (int) get_option( 'page_for_posts' );
			$h0p3_posts_page_title = $h0p3_posts_page_id ? get_the_title( $h0p3_posts_page_id ) : '';

			echo esc_html(
				$h0p3_posts_page_title
					? $h0p3_posts_page_title
					: __( 'Latest Posts', 'h0p3' )
			);
			?>
		</h1>
	</header>

	<?php
	if ( have_posts() ) {
		echo '<div class="post-grid">';

		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/content' );
		}

		echo '</div>';
		?>
		<div class="content-pagination">
			<?php the_posts_pagination(); ?>
		</div>
		<?php
	} else {
		get_template_part( 'template-parts/content/content', 'none' );
	}
	?>
</main>
<?php
get_footer();
