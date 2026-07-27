<?php
/**
 * Theme module loader.
 *
 * @package H0P3
 */

defined( 'ABSPATH' ) || exit;

require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/post-types/project.php';
