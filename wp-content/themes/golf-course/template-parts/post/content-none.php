<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Golf Course
 * @subpackage golf_course
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'golf-course' ); ?></h1>
	</header>
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
				<?php
				/* translators: %s: Post editor URL. */
				printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'golf-course' ), esc_url( admin_url( 'post-new.php' ) ) );
				?>
			</p>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'golf-course' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div>
</section>
