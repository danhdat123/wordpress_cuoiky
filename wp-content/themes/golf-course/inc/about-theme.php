<?php
/**
 * Golf Course Theme Page
 *
 * @package Golf Course
 */

function golf_course_admin_scripts() {
	wp_dequeue_script('jquery-superfish');
	wp_dequeue_script('golf-course-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'golf_course_admin_scripts' );

if ( ! defined( 'GOLF_COURSE_FREE_THEME_URL' ) ) {
	define( 'GOLF_COURSE_FREE_THEME_URL', 'https://www.themespride.com/themes/free-golf-wordpress-theme/' );
}
if ( ! defined( 'GOLF_COURSE_PRO_THEME_URL' ) ) {
	define( 'GOLF_COURSE_PRO_THEME_URL', 'https://www.themespride.com/themes/golf-course-wordpress-theme/' );
}
if ( ! defined( 'GOLF_COURSE_DEMO_THEME_URL' ) ) {
	define( 'GOLF_COURSE_DEMO_THEME_URL', 'https://www.themespride.com/golf-course-pro/' );
}
if ( ! defined( 'GOLF_COURSE_DOCS_THEME_URL' ) ) {
    define( 'GOLF_COURSE_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/golf-course' );
}
if ( ! defined( 'GOLF_COURSE_DOCS_URL' ) ) {
    define( 'GOLF_COURSE_DOCS_URL', 'https://www.themespride.com/demo/docs/golf-course' );
}
if ( ! defined( 'GOLF_COURSE_SUPPORT_THEME_URL' ) ) {
    define( 'GOLF_COURSE_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/golf-course/' );
}
if ( ! defined( 'GOLF_COURSE_RATE_THEME_URL' ) ) {
    define( 'GOLF_COURSE_RATE_THEME_URL', 'https://wordpress.org/support/theme/golf-course/reviews/#new-post' );
}
if ( ! defined( 'GOLF_COURSE_CHANGELOG_THEME_URL' ) ) {
    define( 'GOLF_COURSE_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}


/**
 * Add theme page
 */
function golf_course_menu() {
	add_theme_page( esc_html__( 'About Theme', 'golf-course' ), esc_html__( 'About Theme', 'golf-course' ), 'edit_theme_options', 'golf-course-about', 'golf_course_about_display' );
}
add_action( 'admin_menu', 'golf_course_menu' );

/**
 * Display About page
 */
function golf_course_about_display() {
	$golf_course_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $golf_course_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$golf_course_description = explode( '. ', $golf_course_theme->get( 'Description' ) );

					array_pop( $golf_course_description );

					$golf_course_description = implode( '. ', $golf_course_description );

					echo esc_html( $golf_course_description . '.' );
				?></p>
				<p class="actions">
					<a target="_blank" href="<?php echo esc_url( GOLF_COURSE_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'golf-course' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( GOLF_COURSE_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'golf-course' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( GOLF_COURSE_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'golf-course' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( GOLF_COURSE_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'golf-course' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( GOLF_COURSE_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'golf-course' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $golf_course_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'golf-course' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'golf-course-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'golf-course-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'golf-course' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'golf-course-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'golf-course' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'golf-course-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'golf-course' ); ?></a>
		</nav>

		<?php
			golf_course_main_screen();

			golf_course_changelog_screen();

			golf_course_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'golf-course' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'golf-course' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'golf-course' ) : esc_html_e( 'Go to Dashboard', 'golf-course' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function golf_course_main_screen() {
	if ( isset( $_GET['page'] ) && 'golf-course-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'golf-course' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'golf-course' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'golf-course' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'golf-course' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'golf-course' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( GOLF_COURSE_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'golf-course' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'golf-course' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'golf-course' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary" onclick="golf_course_text_copyied()"><?php esc_html_e( 'GETPro20', 'golf-course' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function golf_course_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'golf-course' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'golf_course_changelog_file', GOLF_COURSE_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = golf_course_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function golf_course_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function golf_course_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'golf-course' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'golf-course' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'golf-course' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'golf-course' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'golf-course' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(GOLF_COURSE_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'golf-course' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
