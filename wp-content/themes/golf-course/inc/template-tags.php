<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Golf Course
 * @subpackage golf_course
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function golf_course_categorized_blog() {
	$golf_course_category_count = get_transient( 'golf_course_categories' );

	if ( false === $golf_course_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$golf_course_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$golf_course_category_count = count( $golf_course_categories );

		set_transient( 'golf_course_categories', $golf_course_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $golf_course_category_count > 1;
}

if ( ! function_exists( 'golf_course_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Golf Course
 */
function golf_course_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in golf_course_categorized_blog.
 */
function golf_course_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'golf_course_categories' );
}
add_action( 'edit_category', 'golf_course_category_transient_flusher' );
add_action( 'save_post',     'golf_course_category_transient_flusher' );
