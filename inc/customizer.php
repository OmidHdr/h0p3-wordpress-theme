<?php
/**
 * Theme Customizer settings and defaults.
 *
 * @package H0P3
 */

defined( 'ABSPATH' ) || exit;

/**
 * Get the default Hero content.
 *
 * @return array<string, string>
 */
function h0p3_get_hero_defaults(): array {
	return array(
		'intro'                 => __( 'Hello, I’m', 'h0p3' ),
		'heading'               => __( 'A Java Backend Developer', 'h0p3' ),
		'description'           => __( 'I build secure, scalable, and maintainable backend applications using Java and Spring Boot.', 'h0p3' ),
		'primary_button_text'   => __( 'View My Projects', 'h0p3' ),
		'primary_button_url'    => '',
		'secondary_button_text' => __( 'Contact Me', 'h0p3' ),
		'secondary_button_url'  => '',
	);
}

/**
 * Get the default About section content.
 *
 * @return array<string, string>
 */
function h0p3_get_about_defaults(): array {
	return array(
		'eyebrow'            => __( 'About Me', 'h0p3' ),
		'heading'            => __( 'Building reliable backend systems', 'h0p3' ),
		'description'        => __( 'I am a Java backend developer focused on creating secure, scalable, and maintainable applications with Spring Boot. I enjoy designing clean APIs, working with databases, and solving complex backend problems.', 'h0p3' ),
		'location'           => __( 'Tehran, Iran', 'h0p3' ),
		'specialization'     => __( 'Java & Spring Boot', 'h0p3' ),
		'experience'         => __( 'Continuously learning and building', 'h0p3' ),
		'resume_button_text' => __( 'Download Resume', 'h0p3' ),
		'resume_url'         => '',
	);
}

/**
 * Get the default Skills section content.
 *
 * @return array<string, string>
 */
function h0p3_get_skills_defaults(): array {
	return array(
		'eyebrow'     => __( 'Technical Skills', 'h0p3' ),
		'heading'     => __( 'Technologies I work with', 'h0p3' ),
		'description' => __( 'A practical toolkit for building, securing, testing, and deploying backend applications.', 'h0p3' ),
	);
}

/**
 * Get the filterable skills list.
 *
 * @return array<int, array<string, string>>
 */
function h0p3_get_skills(): array {
	$default_skills = array(
		array(
			'name'        => __( 'Java', 'h0p3' ),
			'description' => __( 'A general-purpose language for backend application development.', 'h0p3' ),
			'category'    => __( 'Backend', 'h0p3' ),
		),
		array(
			'name'        => __( 'Spring Boot', 'h0p3' ),
			'description' => __( 'A framework for creating production-ready Java applications.', 'h0p3' ),
			'category'    => __( 'Backend', 'h0p3' ),
		),
		array(
			'name'        => __( 'Spring Security', 'h0p3' ),
			'description' => __( 'Authentication and authorization for Spring applications.', 'h0p3' ),
			'category'    => __( 'Backend', 'h0p3' ),
		),
		array(
			'name'        => __( 'REST APIs', 'h0p3' ),
			'description' => __( 'HTTP interfaces for communication between applications.', 'h0p3' ),
			'category'    => __( 'Backend', 'h0p3' ),
		),
		array(
			'name'        => __( 'PostgreSQL', 'h0p3' ),
			'description' => __( 'A relational database for structured application data.', 'h0p3' ),
			'category'    => __( 'Database', 'h0p3' ),
		),
		array(
			'name'        => __( 'Docker', 'h0p3' ),
			'description' => __( 'Containerized environments for consistent application delivery.', 'h0p3' ),
			'category'    => __( 'DevOps', 'h0p3' ),
		),
		array(
			'name'        => __( 'Git', 'h0p3' ),
			'description' => __( 'Distributed version control for managing source code.', 'h0p3' ),
			'category'    => __( 'Tools', 'h0p3' ),
		),
		array(
			'name'        => __( 'GitHub Actions', 'h0p3' ),
			'description' => __( 'Automated workflows for testing and delivery.', 'h0p3' ),
			'category'    => __( 'DevOps', 'h0p3' ),
		),
	);

	/**
	 * Filters the skills displayed in the homepage Skills section.
	 *
	 * @param array<int, array<string, string>> $default_skills Default skills.
	 */
	$skills = apply_filters( 'h0p3_default_skills', $default_skills );

	return is_array( $skills ) ? $skills : $default_skills;
}

/**
 * Get the default Projects section content.
 *
 * @return array<string, string>
 */
function h0p3_get_projects_defaults(): array {
	return array(
		'eyebrow'            => __( 'Selected Projects', 'h0p3' ),
		'heading'            => __( 'Things I have built', 'h0p3' ),
		'description'        => __( 'A selection of backend projects focused on security, clean architecture, testing, and deployment.', 'h0p3' ),
		'archive_button_text' => __( 'View All Projects', 'h0p3' ),
	);
}

/**
 * Get the default Project archive content.
 *
 * @return array<string, string>
 */
function h0p3_get_project_archive_defaults(): array {
	return array(
		'eyebrow'     => __( 'Portfolio', 'h0p3' ),
		'heading'     => __( 'All Projects', 'h0p3' ),
		'description' => __( 'Explore the backend applications, experiments, and tools I have built while improving my Java and Spring Boot skills.', 'h0p3' ),
	);
}

/**
 * Get the default Contact section content.
 *
 * @return array<string, string>
 */
function h0p3_get_contact_defaults(): array {
	return array(
		'eyebrow'          => __( 'Contact', 'h0p3' ),
		'heading'          => __( 'Let’s build something together', 'h0p3' ),
		'description'      => __( 'Have a project, opportunity, or technical discussion in mind? Feel free to get in touch.', 'h0p3' ),
		'email_button_text' => __( 'Send Me an Email', 'h0p3' ),
	);
}

/**
 * Register theme Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 * @return void
 */
function h0p3_customize_register( WP_Customize_Manager $wp_customize ): void {
	$hero_defaults = h0p3_get_hero_defaults();
	$hero_fields   = array(
		'intro'                 => array(
			'label'    => esc_html__( 'Small introductory text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'heading'               => array(
			'label'    => esc_html__( 'Main heading', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'description'           => array(
			'label'    => esc_html__( 'Description', 'h0p3' ),
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'primary_button_text'   => array(
			'label'    => esc_html__( 'Primary button text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'primary_button_url'    => array(
			'label'    => esc_html__( 'Primary button URL', 'h0p3' ),
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'secondary_button_text' => array(
			'label'    => esc_html__( 'Secondary button text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'secondary_button_url'  => array(
			'label'    => esc_html__( 'Secondary button URL', 'h0p3' ),
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
	);

	$wp_customize->add_section(
		'h0p3_hero',
		array(
			'title'    => esc_html__( 'Homepage Hero', 'h0p3' ),
			'priority' => 30,
		)
	);

	foreach ( $hero_fields as $field_name => $field ) {
		$setting_id = 'h0p3_hero_' . $field_name;

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $hero_defaults[ $field_name ],
				'sanitize_callback' => $field['sanitize'],
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $field['label'],
				'section' => 'h0p3_hero',
				'type'    => $field['type'],
			)
		);
	}

	$about_defaults = h0p3_get_about_defaults();
	$about_fields   = array(
		'eyebrow'            => array(
			'label'    => esc_html__( 'Section eyebrow text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'heading'            => array(
			'label'    => esc_html__( 'Section heading', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'description'        => array(
			'label'    => esc_html__( 'About description', 'h0p3' ),
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'location'           => array(
			'label'    => esc_html__( 'Current location', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'specialization'     => array(
			'label'    => esc_html__( 'Main specialization', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'experience'         => array(
			'label'    => esc_html__( 'Years of experience text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'resume_button_text' => array(
			'label'    => esc_html__( 'Resume button text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
	);

	$wp_customize->add_section(
		'h0p3_about',
		array(
			'title'    => esc_html__( 'Homepage About', 'h0p3' ),
			'priority' => 40,
		)
	);

	foreach ( $about_fields as $field_name => $field ) {
		$setting_id = 'h0p3_about_' . $field_name;

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $about_defaults[ $field_name ],
				'sanitize_callback' => $field['sanitize'],
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $field['label'],
				'section' => 'h0p3_about',
				'type'    => $field['type'],
			)
		);
	}

	$wp_customize->add_setting(
		'h0p3_about_resume_url',
		array(
			'default'           => $about_defaults['resume_url'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Upload_Control(
			$wp_customize,
			'h0p3_about_resume_url',
			array(
				'label'       => esc_html__( 'Resume file', 'h0p3' ),
				'description' => esc_html__( 'Choose a PDF from the Media Library.', 'h0p3' ),
				'section'     => 'h0p3_about',
			)
		)
	);

	$skills_defaults = h0p3_get_skills_defaults();
	$skills_fields   = array(
		'eyebrow'     => array(
			'label'    => esc_html__( 'Section eyebrow text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'heading'     => array(
			'label'    => esc_html__( 'Section heading', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'description' => array(
			'label'    => esc_html__( 'Section description', 'h0p3' ),
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
	);

	$wp_customize->add_section(
		'h0p3_skills',
		array(
			'title'    => esc_html__( 'Homepage Skills', 'h0p3' ),
			'priority' => 50,
		)
	);

	foreach ( $skills_fields as $field_name => $field ) {
		$setting_id = 'h0p3_skills_' . $field_name;

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $skills_defaults[ $field_name ],
				'sanitize_callback' => $field['sanitize'],
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $field['label'],
				'section' => 'h0p3_skills',
				'type'    => $field['type'],
			)
		);
	}

	$projects_defaults = h0p3_get_projects_defaults();
	$projects_fields   = array(
		'eyebrow'            => array(
			'label'    => esc_html__( 'Section eyebrow text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'heading'            => array(
			'label'    => esc_html__( 'Section heading', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'description'        => array(
			'label'    => esc_html__( 'Section description', 'h0p3' ),
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'archive_button_text' => array(
			'label'    => esc_html__( 'Projects archive button text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
	);

	$wp_customize->add_section(
		'h0p3_projects',
		array(
			'title'    => esc_html__( 'Homepage Projects', 'h0p3' ),
			'priority' => 60,
		)
	);

	foreach ( $projects_fields as $field_name => $field ) {
		$setting_id = 'h0p3_projects_' . $field_name;

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $projects_defaults[ $field_name ],
				'sanitize_callback' => $field['sanitize'],
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $field['label'],
				'section' => 'h0p3_projects',
				'type'    => $field['type'],
			)
		);
	}

	$project_archive_defaults = h0p3_get_project_archive_defaults();
	$project_archive_fields   = array(
		'eyebrow'     => array(
			'label'    => esc_html__( 'Eyebrow', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'heading'     => array(
			'label'    => esc_html__( 'Heading', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'description' => array(
			'label'    => esc_html__( 'Description', 'h0p3' ),
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
	);

	$wp_customize->add_section(
		'h0p3_project_archive',
		array(
			'title'    => esc_html__( 'Projects Archive', 'h0p3' ),
			'priority' => 70,
		)
	);

	foreach ( $project_archive_fields as $field_name => $field ) {
		$setting_id = 'h0p3_project_archive_' . $field_name;

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $project_archive_defaults[ $field_name ],
				'sanitize_callback' => $field['sanitize'],
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $field['label'],
				'section' => 'h0p3_project_archive',
				'type'    => $field['type'],
			)
		);
	}

	$contact_defaults = h0p3_get_contact_defaults();
	$contact_fields   = array(
		'eyebrow'          => array(
			'label'    => esc_html__( 'Section eyebrow text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'heading'          => array(
			'label'    => esc_html__( 'Section heading', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'description'      => array(
			'label'    => esc_html__( 'Section description', 'h0p3' ),
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'email_button_text' => array(
			'label'    => esc_html__( 'Email button text', 'h0p3' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
	);

	$wp_customize->add_section(
		'h0p3_contact',
		array(
			'title'       => esc_html__( 'Homepage Contact', 'h0p3' ),
			'description' => esc_html__( 'Email and profile URLs are shared with the Social Links settings.', 'h0p3' ),
			'priority'    => 80,
		)
	);

	foreach ( $contact_fields as $field_name => $field ) {
		$setting_id = 'h0p3_contact_' . $field_name;

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $contact_defaults[ $field_name ],
				'sanitize_callback' => $field['sanitize'],
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $field['label'],
				'section' => 'h0p3_contact',
				'type'    => $field['type'],
			)
		);
	}

	$wp_customize->add_section(
		'h0p3_social_links',
		array(
			'title'    => esc_html__( 'Social Links', 'h0p3' ),
			'priority' => 160,
		)
	);

	$wp_customize->add_setting(
		'h0p3_github_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'h0p3_github_url',
		array(
			'label'   => esc_html__( 'GitHub URL', 'h0p3' ),
			'section' => 'h0p3_social_links',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'h0p3_linkedin_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'h0p3_linkedin_url',
		array(
			'label'   => esc_html__( 'LinkedIn URL', 'h0p3' ),
			'section' => 'h0p3_social_links',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'h0p3_email',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_email',
		)
	);

	$wp_customize->add_control(
		'h0p3_email',
		array(
			'label'   => esc_html__( 'Email address', 'h0p3' ),
			'section' => 'h0p3_social_links',
			'type'    => 'email',
		)
	);
}
add_action( 'customize_register', 'h0p3_customize_register' );
