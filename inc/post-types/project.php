<?php
/**
 * Project post type, taxonomy, and metadata.
 *
 * @package H0P3
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the Project post type and Project Category taxonomy.
 *
 * @return void
 */
function h0p3_register_project_content_type(): void {
	register_post_type(
		'project',
		array(
			'labels'             => array(
				'name'                  => esc_html__( 'Projects', 'h0p3' ),
				'singular_name'         => esc_html__( 'Project', 'h0p3' ),
				'menu_name'             => esc_html__( 'Projects', 'h0p3' ),
				'name_admin_bar'        => esc_html__( 'Project', 'h0p3' ),
				'add_new'               => esc_html__( 'Add New', 'h0p3' ),
				'add_new_item'          => esc_html__( 'Add New Project', 'h0p3' ),
				'new_item'              => esc_html__( 'New Project', 'h0p3' ),
				'edit_item'             => esc_html__( 'Edit Project', 'h0p3' ),
				'view_item'             => esc_html__( 'View Project', 'h0p3' ),
				'all_items'             => esc_html__( 'All Projects', 'h0p3' ),
				'search_items'          => esc_html__( 'Search Projects', 'h0p3' ),
				'parent_item_colon'     => esc_html__( 'Parent Projects:', 'h0p3' ),
				'not_found'             => esc_html__( 'No projects found.', 'h0p3' ),
				'not_found_in_trash'    => esc_html__( 'No projects found in Trash.', 'h0p3' ),
				'featured_image'        => esc_html__( 'Project featured image', 'h0p3' ),
				'set_featured_image'    => esc_html__( 'Set project featured image', 'h0p3' ),
				'remove_featured_image' => esc_html__( 'Remove project featured image', 'h0p3' ),
				'use_featured_image'    => esc_html__( 'Use as project featured image', 'h0p3' ),
				'archives'              => esc_html__( 'Project archives', 'h0p3' ),
				'insert_into_item'      => esc_html__( 'Insert into project', 'h0p3' ),
				'uploaded_to_this_item' => esc_html__( 'Uploaded to this project', 'h0p3' ),
				'filter_items_list'     => esc_html__( 'Filter projects list', 'h0p3' ),
				'items_list_navigation' => esc_html__( 'Projects list navigation', 'h0p3' ),
				'items_list'            => esc_html__( 'Projects list', 'h0p3' ),
			),
			'public'             => true,
			'show_in_rest'       => true,
			'has_archive'        => 'projects',
			'rewrite'            => array(
				'slug'       => 'projects',
				'with_front' => false,
			),
			'menu_icon'          => 'dashicons-portfolio',
			'supports'           => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
				'custom-fields',
			),
			'taxonomies'         => array( 'project_category' ),
			'publicly_queryable' => true,
		)
	);

	register_taxonomy(
		'project_category',
		array( 'project' ),
		array(
			'labels'            => array(
				'name'              => esc_html__( 'Project Categories', 'h0p3' ),
				'singular_name'     => esc_html__( 'Project Category', 'h0p3' ),
				'search_items'      => esc_html__( 'Search Project Categories', 'h0p3' ),
				'all_items'         => esc_html__( 'All Project Categories', 'h0p3' ),
				'parent_item'       => esc_html__( 'Parent Project Category', 'h0p3' ),
				'parent_item_colon' => esc_html__( 'Parent Project Category:', 'h0p3' ),
				'edit_item'         => esc_html__( 'Edit Project Category', 'h0p3' ),
				'update_item'       => esc_html__( 'Update Project Category', 'h0p3' ),
				'add_new_item'      => esc_html__( 'Add New Project Category', 'h0p3' ),
				'new_item_name'     => esc_html__( 'New Project Category Name', 'h0p3' ),
				'menu_name'         => esc_html__( 'Categories', 'h0p3' ),
				'not_found'         => esc_html__( 'No project categories found.', 'h0p3' ),
				'back_to_items'     => esc_html__( 'Back to project categories', 'h0p3' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'rewrite'           => array(
				'slug'       => 'project-category',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'h0p3_register_project_content_type' );

/**
 * Get the available project statuses.
 *
 * @return array<string, string>
 */
function h0p3_get_project_statuses(): array {
	return array(
		'in-development' => __( 'In Development', 'h0p3' ),
		'completed'      => __( 'Completed', 'h0p3' ),
		'maintained'     => __( 'Maintained', 'h0p3' ),
		'archived'       => __( 'Archived', 'h0p3' ),
	);
}

/**
 * Get a project's normalized technology stack.
 *
 * @param int $post_id Project post ID.
 * @return array<int, string>
 */
function h0p3_get_project_technologies( int $post_id ): array {
	$metadata = h0p3_get_project_metadata( $post_id );

	return $metadata['technologies'];
}

/**
 * Parse and normalize a comma-separated technology stack.
 *
 * @param string $stored_technologies Stored technology string.
 * @return array<int, string>
 */
function h0p3_parse_project_technologies( string $stored_technologies ): array {
	$technologies = array();

	foreach ( explode( ',', $stored_technologies ) as $stored_technology ) {
		$technology = sanitize_text_field( $stored_technology );

		if ( '' !== $technology && ! in_array( $technology, $technologies, true ) ) {
			$technologies[] = $technology;
		}
	}

	return $technologies;
}

/**
 * Read a scalar value from the raw Project metadata array.
 *
 * @param array<string, array<int, mixed>> $metadata Raw metadata.
 * @param string                           $meta_key Metadata key.
 * @return string
 */
function h0p3_get_project_meta_value( array $metadata, string $meta_key ): string {
	if ( ! isset( $metadata[ $meta_key ][0] ) || ! is_scalar( $metadata[ $meta_key ][0] ) ) {
		return '';
	}

	return (string) $metadata[ $meta_key ][0];
}

/**
 * Get normalized Project metadata with a single metadata cache read.
 *
 * @param int $post_id Project post ID.
 * @return array{
 *     repository_url: string,
 *     demo_url: string,
 *     technologies: array<int, string>,
 *     status: string
 * }
 */
function h0p3_get_project_metadata( int $post_id ): array {
	$metadata = get_post_meta( $post_id );

	$repository_url = esc_url_raw(
		h0p3_get_project_meta_value( $metadata, '_h0p3_project_repository_url' )
	);
	$demo_url       = esc_url_raw(
		h0p3_get_project_meta_value( $metadata, '_h0p3_project_demo_url' )
	);
	$technology     = h0p3_get_project_meta_value( $metadata, '_h0p3_project_technology' );
	$status         = h0p3_sanitize_project_status(
		h0p3_get_project_meta_value( $metadata, '_h0p3_project_status' )
	);

	return array(
		'repository_url' => $repository_url,
		'demo_url'       => $demo_url,
		'technologies'   => h0p3_parse_project_technologies( $technology ),
		'status'         => $status,
	);
}

/**
 * Check whether the current user may edit project metadata.
 *
 * @param bool   $allowed Whether access is currently allowed.
 * @param string $meta_key Metadata key.
 * @param int    $post_id Project post ID.
 * @return bool
 */
function h0p3_auth_project_meta( bool $allowed, string $meta_key, int $post_id ): bool {
	unset( $allowed, $meta_key );

	return current_user_can( 'edit_post', $post_id );
}

/**
 * Sanitize the project status.
 *
 * @param mixed $value Submitted status.
 * @return string
 */
function h0p3_sanitize_project_status( $value ): string {
	$allowed_statuses = h0p3_get_project_statuses();
	$value            = sanitize_key( $value );

	return array_key_exists( $value, $allowed_statuses ) ? $value : '';
}

/**
 * Register project metadata.
 *
 * @return void
 */
function h0p3_register_project_meta(): void {
	$meta_fields = array(
		'_h0p3_project_repository_url' => 'esc_url_raw',
		'_h0p3_project_demo_url'       => 'esc_url_raw',
		'_h0p3_project_technology'     => 'sanitize_text_field',
		'_h0p3_project_status'         => 'h0p3_sanitize_project_status',
	);

	foreach ( $meta_fields as $meta_key => $sanitize_callback ) {
		register_post_meta(
			'project',
			$meta_key,
			array(
				'type'              => 'string',
				'single'            => true,
				'default'           => '',
				'show_in_rest'      => true,
				'sanitize_callback' => $sanitize_callback,
				'auth_callback'     => 'h0p3_auth_project_meta',
			)
		);
	}
}
add_action( 'init', 'h0p3_register_project_meta' );

/**
 * Register the Project Details meta box.
 *
 * @return void
 */
function h0p3_add_project_meta_box(): void {
	add_meta_box(
		'h0p3-project-details',
		esc_html__( 'Project Details', 'h0p3' ),
		'h0p3_render_project_meta_box',
		'project',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes_project', 'h0p3_add_project_meta_box' );

/**
 * Render the Project Details meta box.
 *
 * @param WP_Post $post Current project.
 * @return void
 */
function h0p3_render_project_meta_box( WP_Post $post ): void {
	$repository_url = get_post_meta( $post->ID, '_h0p3_project_repository_url', true );
	$demo_url       = get_post_meta( $post->ID, '_h0p3_project_demo_url', true );
	$technology     = get_post_meta( $post->ID, '_h0p3_project_technology', true );
	$status         = get_post_meta( $post->ID, '_h0p3_project_status', true );
	$statuses       = h0p3_get_project_statuses();

	wp_nonce_field( 'h0p3_save_project_details', 'h0p3_project_details_nonce' );
	?>
	<p>
		<label for="h0p3-project-repository-url">
			<strong><?php esc_html_e( 'Repository URL', 'h0p3' ); ?></strong>
		</label>
		<input
			class="widefat"
			id="h0p3-project-repository-url"
			name="h0p3_project_repository_url"
			type="url"
			value="<?php echo esc_attr( $repository_url ); ?>"
		>
	</p>
	<p>
		<label for="h0p3-project-demo-url">
			<strong><?php esc_html_e( 'Live demo URL', 'h0p3' ); ?></strong>
		</label>
		<input
			class="widefat"
			id="h0p3-project-demo-url"
			name="h0p3_project_demo_url"
			type="url"
			value="<?php echo esc_attr( $demo_url ); ?>"
		>
	</p>
	<p>
		<label for="h0p3-project-technology">
			<strong><?php esc_html_e( 'Technology stack', 'h0p3' ); ?></strong>
		</label>
		<input
			class="widefat"
			id="h0p3-project-technology"
			name="h0p3_project_technology"
			type="text"
			value="<?php echo esc_attr( $technology ); ?>"
			placeholder="<?php esc_attr_e( 'Java, Spring Boot, PostgreSQL, Docker', 'h0p3' ); ?>"
		>
		<span class="description">
			<?php esc_html_e( 'Enter comma-separated values.', 'h0p3' ); ?>
		</span>
	</p>
	<p>
		<label for="h0p3-project-status">
			<strong><?php esc_html_e( 'Project status', 'h0p3' ); ?></strong>
		</label>
		<select
			class="widefat"
			id="h0p3-project-status"
			name="h0p3_project_status"
		>
			<option value=""><?php esc_html_e( 'Select a status', 'h0p3' ); ?></option>
			<?php foreach ( $statuses as $status_value => $status_label ) : ?>
				<option value="<?php echo esc_attr( $status_value ); ?>" <?php selected( $status, $status_value ); ?>>
					<?php echo esc_html( $status_label ); ?>
				</option>
			<?php endforeach; ?>
		</select>
	</p>
	<?php
}

/**
 * Save Project Details metadata.
 *
 * @param int $post_id Project post ID.
 * @return void
 */
function h0p3_save_project_meta( int $post_id ): void {
	if (
		! isset( $_POST['h0p3_project_details_nonce'] )
		|| ! is_string( $_POST['h0p3_project_details_nonce'] )
		|| ! wp_verify_nonce(
			sanitize_text_field( wp_unslash( $_POST['h0p3_project_details_nonce'] ) ),
			'h0p3_save_project_details'
		)
		|| ! current_user_can( 'edit_post', $post_id )
		|| wp_is_post_autosave( $post_id )
		|| wp_is_post_revision( $post_id )
	) {
		return;
	}

	$meta_fields = array(
		'h0p3_project_repository_url' => array(
			'meta_key' => '_h0p3_project_repository_url',
			'sanitize' => 'esc_url_raw',
		),
		'h0p3_project_demo_url'       => array(
			'meta_key' => '_h0p3_project_demo_url',
			'sanitize' => 'esc_url_raw',
		),
		'h0p3_project_technology'     => array(
			'meta_key' => '_h0p3_project_technology',
			'sanitize' => 'sanitize_text_field',
		),
		'h0p3_project_status'         => array(
			'meta_key' => '_h0p3_project_status',
			'sanitize' => 'h0p3_sanitize_project_status',
		),
	);

	foreach ( $meta_fields as $field_name => $field ) {
		$value = isset( $_POST[ $field_name ] ) && is_scalar( $_POST[ $field_name ] )
			? call_user_func( $field['sanitize'], wp_unslash( $_POST[ $field_name ] ) )
			: '';

		if ( '' === $value ) {
			delete_post_meta( $post_id, $field['meta_key'] );
			continue;
		}

		update_post_meta( $post_id, $field['meta_key'], $value );
	}
}
add_action( 'save_post_project', 'h0p3_save_project_meta' );
