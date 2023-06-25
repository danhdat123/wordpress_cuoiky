<?php
/**
 * Golf Course: Customizer
 *
 * @package Golf Course
 * @subpackage golf_course
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function golf_course_customize_register( $wp_customize ) {

	// Register the custom control type.
		$wp_customize->register_control_type( 'Golf_Course_Toggle_Control' );

	//add home page setting pannel
	$wp_customize->add_panel( 'golf_course_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home Page Settings', 'golf-course' ),
	    'description' => __( 'Description of what this panel does.', 'golf-course' ),
	) );

  	//TP Preloader Option
	$wp_customize->add_section('golf_course_prealoader_option',array(
		'title' => __('TP Preloader Option', 'golf-course'),
		'panel' => 'golf_course_panel_id',
		'priority' => 10,
 	) );

	$wp_customize->add_setting( 'golf_course_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'golf-course' ),
		'section'     => 'golf_course_prealoader_option',
		'type'        => 'toggle',
		'settings'    => 'golf_course_preloader_show_hide',
		) ) );

  	$wp_customize->add_setting( 'golf_course_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'golf_course_tp_preloader_color1_option', array(
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'golf-course'),
	    'section' => 'golf_course_prealoader_option',
	    'settings' => 'golf_course_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'golf_course_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'golf_course_tp_preloader_color2_option', array(
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'golf-course'),
	    'section' => 'golf_course_prealoader_option',
	    'settings' => 'golf_course_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'golf_course_tp_preloader_bg_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'golf_course_tp_preloader_bg_option', array(
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'golf-course'),
	    'section' => 'golf_course_prealoader_option',
	    'settings' => 'golf_course_tp_preloader_bg_option',
  	)));

	//TP General Option
	$wp_customize->add_section('golf_course_tp_general_settings',array(
        'title' => __('TP General Option', 'golf-course'),
        'panel' => 'golf_course_panel_id',
        'priority' => 10,
    ) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('golf_course_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'golf_course_sanitize_choices'
	));
	$wp_customize->add_control('golf_course_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'golf-course'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'golf-course'),
        'section' => 'golf_course_tp_general_settings',
        'choices' => array(
            'full' => __('Full','golf-course'),
            'left' => __('Left','golf-course'),
            'right' => __('Right','golf-course'),
            'three-column' => __('Three Columns','golf-course'),
            'four-column' => __('Four Columns','golf-course'),
            'grid' => __('Grid Layout','golf-course')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('golf_course_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'golf_course_sanitize_choices'
	));
	$wp_customize->add_control('golf_course_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'golf-course'),
        'description'   => __('This option work for pages.', 'golf-course'),
        'section' => 'golf_course_tp_general_settings',
        'choices' => array(
            'full' => __('Full','golf-course'),
            'left' => __('Left','golf-course'),
            'right' => __('Right','golf-course')
        ),
	) );

	$wp_customize->add_setting('golf_course_sticky',array(
		'default' => false,
		'sanitize_callback'	=> 'golf_course_sanitize_checkbox'
	));
	$wp_customize->add_control('golf_course_sticky',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Sticky Header','golf-course'),
		'section' => 'golf_course_tp_general_settings',
	));

	$wp_customize->add_setting( 'golf_course_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_sticky', array(
		'label'       => esc_html__( 'Show Sticky Header', 'golf-course' ),
		'section'     => 'golf_course_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'golf_course_sticky',
	) ) );

	//TP Blog Option
	$wp_customize->add_section('golf_course_blog_option',array(
        'title' => __('TP Blog Option', 'golf-course'),
        'panel' => 'golf_course_panel_id',
        'priority' => 10,
    ) );

	$wp_customize->add_setting( 'golf_course_remove_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_remove_date', array(
		'label'       => esc_html__( 'Show / Hide Date Option', 'golf-course' ),
		'section'     => 'golf_course_blog_option',
		'type'        => 'toggle',
		'settings'    => 'golf_course_remove_date',
	) ) );


	$wp_customize->add_setting( 'golf_course_remove_author', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_remove_author', array(
		'label'       => esc_html__( 'Show / Hide Author Option', 'golf-course' ),
		'section'     => 'golf_course_blog_option',
		'type'        => 'toggle',
		'settings'    => 'golf_course_remove_author',
	) ) );


	$wp_customize->add_setting( 'golf_course_remove_comments', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_remove_comments', array(
		'label'       => esc_html__( 'Show / Hide Comment Option', 'golf-course' ),
		'section'     => 'golf_course_blog_option',
		'type'        => 'toggle',
		'settings'    => 'golf_course_remove_comments',
	) ) );


	$wp_customize->add_setting( 'golf_course_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'golf-course' ),
		'section'     => 'golf_course_blog_option',
		'type'        => 'toggle',
		'settings'    => 'golf_course_remove_tags',
	) ) );


 	$wp_customize->add_setting( 'golf_course_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	 $wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'golf-course' ),
		'section'     => 'golf_course_blog_option',
		'type'        => 'toggle',
		'settings'    => 'golf_course_remove_read_button',
	) ) );

    $wp_customize->add_setting('golf_course_read_more_text',array(
		'default'=> __('Read More','golf-course'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('golf_course_read_more_text',array(
		'label'	=> __('Edit Button Text','golf-course'),
		'section'=> 'golf_course_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'golf_course_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'golf_course_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'golf_course_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','golf-course' ),
		'section'     => 'golf_course_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Top bar Section
	$wp_customize->add_section( 'golf_course_topbar', array(
    	'title'      => __( 'Header Details', 'golf-course' ),
    	'description' => __( 'Add your contact details', 'golf-course' ),
		'panel' => 'golf_course_panel_id',
      'priority' => 10,
	) );

	$wp_customize->add_setting('golf_course_header_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('golf_course_header_button',array(
		'label'	=> __('Add Button Text','golf-course'),
		'section'=> 'golf_course_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('golf_course_header_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('golf_course_header_button_link',array(
		'label'	=> __('Add Button URL','golf-course'),
		'section'=> 'golf_course_topbar',
		'type'=> 'url'
	));


	//home page slider
	$wp_customize->add_section( 'golf_course_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'golf-course' ),
		'panel' => 'golf_course_panel_id',
      'priority' => 10,
	) );

	$wp_customize->add_setting( 'golf_course_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'golf-course' ),
		'section'     => 'golf_course_slider_section',
		'type'        => 'toggle',
		'settings'    => 'golf_course_slider_arrows',
	) ) );

	for ( $golf_course_count = 1; $golf_course_count <= 4; $golf_course_count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'golf_course_slider_page' . $golf_course_count, array(
			'default'           => '',
			'sanitize_callback' => 'golf_course_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'golf_course_slider_page' . $golf_course_count, array(
			'label'    => __( 'Select Slide Image Page', 'golf-course' ),
			'section'  => 'golf_course_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'golf_course_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'golf-course' ),
		'section'     => 'golf_course_slider_section',
		'type'        => 'toggle',
		'settings'    => 'golf_course_slider_button',
	) ) );

	//About Section
	$wp_customize->add_section('golf_course_about_section',array(
		'title'	=> __('About Section','golf-course'),
		'panel' => 'golf_course_panel_id',
	));

	$wp_customize->add_setting( 'golf_course_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'golf_course_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'golf_course_about_page', array(
		'label'    => __( 'Select About Page', 'golf-course' ),
		'section'  => 'golf_course_about_section',
		'type'     => 'dropdown-pages'
	) );

	//footer
	$wp_customize->add_section('golf_course_footer_section',array(
		'title'	=> __('Footer Text','golf-course'),
		'description'	=> __('Add copyright text.','golf-course'),
		'panel' => 'golf_course_panel_id'
	));

	$wp_customize->add_setting('golf_course_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('golf_course_footer_text',array(
		'label'	=> __('Copyright Text','golf-course'),
		'section'	=> 'golf_course_footer_section',
		'type'		=> 'text'
	));

    $wp_customize->add_setting('golf_course_return_to_header',array(
       'default' => true,
       'sanitize_callback'	=> 'golf_course_sanitize_checkbox'
    ));
    $wp_customize->add_control('golf_course_return_to_header',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Return to header','golf-course'),
       'section' => 'golf_course_footer_section',
    ));

	$wp_customize->add_setting( 'golf_course_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'golf-course' ),
		'section'     => 'golf_course_footer_section',
		'type'        => 'toggle',
		'settings'    => 'golf_course_return_to_header',
	) ) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';


	$wp_customize->add_setting( 'golf_course_site_title_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'golf-course' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'golf_course_site_title_text',
	) ) );

	$wp_customize->add_setting( 'golf_course_site_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'golf_course_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Golf_Course_Toggle_Control( $wp_customize, 'golf_course_site_tagline_text', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'golf-course' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'golf_course_site_tagline_text',
	) ) );


    $wp_customize->add_setting('golf_course_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'golf_course_sanitize_number_absint'
	));
	 $wp_customize->add_control('golf_course_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','golf-course'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('golf_course_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'golf_course_sanitize_choices'
	));
   $wp_customize->add_control('golf_course_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'golf-course'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'golf-course'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','golf-course'),
            'Same Line' => __('Same Line','golf-course')
        ),
	) );

	$wp_customize->add_setting('golf_course_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'golf_course_sanitize_number_absint'
	));
	$wp_customize->add_control('golf_course_per_columns',array(
		'label'	=> __('Product Per Row','golf-course'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('golf_course_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'golf_course_sanitize_number_absint'
	));
	$wp_customize->add_control('golf_course_product_per_page',array(
		'label'	=> __('Product Per Page','golf-course'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

    $wp_customize->add_setting('golf_course_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'golf_course_sanitize_checkbox'
    ));
    $wp_customize->add_control('golf_course_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Shop page sidebar','golf-course'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting('golf_course_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'golf_course_sanitize_checkbox'
    ));
    $wp_customize->add_control('golf_course_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product page sidebar','golf-course'),
       'section' => 'woocommerce_product_catalog',
    ));
}
add_action( 'customize_register', 'golf_course_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Golf Course 1.0
 * @see golf_course_customize_register()
 *
 * @return void
 */
function golf_course_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Golf Course 1.0
 * @see golf_course_customize_register()
 *
 * @return void
 */
function golf_course_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'GOLF_COURSE_PRO_THEME_NAME' ) ) {
	define( 'GOLF_COURSE_PRO_THEME_NAME', esc_html__( 'Golf Course Pro Theme', 'golf-course' ));
}
if ( ! defined( 'GOLF_COURSE_PRO_THEME_URL' ) ) {
	define( 'GOLF_COURSE_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/golf-course-wordpress-theme/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Golf_Course_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Golf_Course_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Golf_Course_Customize_Section_Pro(
				$manager,
				'golf_course_section_pro',
				array(
					'priority'   => 9,
					'title'    => GOLF_COURSE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'golf-course' ),
					'pro_url'  => esc_url( GOLF_COURSE_PRO_THEME_URL, 'golf-course' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Golf_Course_Customize_Section_Pro(
				$manager,
				'golf_course_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'golf-course' ),
					'pro_text' => esc_html__( 'Click Here', 'golf-course' ),
					'pro_url'  => esc_url( GOLF_COURSE_DOCS_URL, 'golf-course'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'golf-course-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'golf-course-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Golf_Course_Customize::get_instance();
