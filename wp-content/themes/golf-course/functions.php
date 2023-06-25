<?php
/**
 * Golf Course functions and definitions
 *
 * @package Golf Course
 * @subpackage golf_course
 */

function golf_course_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'golf-course-featured-image', 2000, 1200, true );
	add_image_size( 'golf-course-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'golf-course' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', golf_course_fonts_url() ) );
}
add_action( 'after_setup_theme', 'golf_course_setup' );

/**
 * Register custom fonts.
 */
function golf_course_fonts_url(){
	$golf_course_font_url = '';
	$golf_course_font_family = array();
	$golf_course_font_family[] = 'DM Sans:400;0,500;0,700;1,400;1,500;1,700';
	$golf_course_font_family[] = 'Lexend:wght@100;200;300;400;500;600;700;800;900';

	$golf_course_query_args = array(
		'family'	=> rawurlencode(implode('|',$golf_course_font_family)),
	);
	$golf_course_font_url = add_query_arg($golf_course_query_args,'//fonts.googleapis.com/css');
	return $golf_course_font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $golf_course_font_url ) );
}

/**
 * Register widget area.
 */
function golf_course_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'golf-course' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'golf-course' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'golf-course' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'golf-course' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'golf-course' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'golf-course' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'golf-course' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'golf-course' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'golf-course' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'golf-course' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'golf-course' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'golf-course' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'golf-course' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'golf-course' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'golf_course_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function golf_course_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'golf-course-fonts', golf_course_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'golf-course-style', get_stylesheet_uri() );

	// Theme block stylesheet.
	wp_enqueue_style( 'golf-course-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'golf-course-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	if(!wp_is_mobile()){
		wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), true );
		wp_enqueue_script( 'golf-course-superfish-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/superfish-custom.js', array('jquery','jquery-superfish'), true );
	}

	wp_enqueue_script( 'golf-course-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/custom.js', array('jquery'), true );

	wp_enqueue_script( 'golf-course-focus-nav', esc_url( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'golf_course_scripts' );

//Admin Enqueue for Admin
function golf_course_admin_enqueue_scripts(){
	wp_enqueue_style('golf-course-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
	wp_enqueue_script( 'golf-course-custom-scripts', get_template_directory_uri(). '/assets/js/custom.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'golf_course_admin_enqueue_scripts' );

/*radio button sanitization*/
function golf_course_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function golf_course_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function golf_course_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'golf_course_loop_columns');
if (!function_exists('golf_course_loop_columns')) {
	function golf_course_loop_columns() {
		$columns = get_theme_mod( 'golf_course_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'golf_course_per_page', 20 );
function golf_course_per_page( $cols ) {
  	$cols = get_theme_mod( 'golf_course_product_per_page', 9 );
	return $cols;
}

function golf_course_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function golf_course_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function golf_course_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function golf_course_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'golf_course_front_page_template' );

/**
 * Logo Custamization.
 */

function golf_course_logo_width(){

	$golf_course_logo_width   = get_theme_mod( 'golf_course_logo_width', 150 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $golf_course_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'golf_course_logo_width' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
/**
 * Load Toggle file
 */
require get_parent_theme_file_path( '/inc/customize-control-toggle.php' );

/**
 * About Theme Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

define('GOLF_COURSE_CREDIT',__('https://www.themespride.com/themes/free-golf-wordpress-theme/','golf-course') );
if ( ! function_exists( 'golf_course_credit' ) ) {
	function golf_course_credit(){
		echo "<a href=".esc_url(GOLF_COURSE_CREDIT)." target='_blank'>".esc_html__('Golf Course WordPress Theme','golf-course')."</a>";
	}
}

function golf_course_activation_notice() { ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="golf-course-getting-started-notice clearfix">
            <div class="golf-course-theme-notice-content">
                <h2 class="golf-course-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'golf-course' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'golf-course')) ?></p>

                <a class="golf-course-btn-get-started button button-primary button-hero golf-course-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=golf-course-about' )); ?>" ><?php esc_html_e( 'Get started', 'golf-course' ) ?></a><span class="golf-course-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

add_action( 'admin_notices', 'golf_course_activation_notice' );
