<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Golf Course
 * @subpackage golf_course
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses golf_course_header_style()
 */
function golf_course_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'golf_course_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'golf_course_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'golf_course_custom_header_setup' );

if ( ! function_exists( 'golf_course_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see golf_course_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'golf_course_header_style' );
function golf_course_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$golf_course_custom_css = "
        .headerbox,.header-img{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
		}";
	   	wp_add_inline_style( 'golf-course-style', $golf_course_custom_css );
	endif;
}
endif;
