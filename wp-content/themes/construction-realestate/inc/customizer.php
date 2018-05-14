<?php
/**
 * Construction Realestate Theme Customizer
 * @package Construction Realestate
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function construction_realestate_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'construction_realestate_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'construction-realestate' ),
	    'description' => __( 'Description of what this panel does.', 'construction-realestate' ),
	) );

	//layout setting
	$wp_customize->add_section( 'construction_realestate_option', array(
    	'title'      => __( 'Layout Settings', 'construction-realestate' ),
		'priority'   => 30,
		'panel' => 'construction_realestate_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('construction_realestate_layout_options',array(
	        'default' => __('Right Sidebar','construction-realestate'),
	        'sanitize_callback' => 'construction_realestate_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('construction_realestate_layout_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section','construction-realestate'),
	        'section' => 'construction_realestate_option',
	        'choices' => array(
	            'One Column' => __('One Column','construction-realestate'),
	            'Three Columns' => __('Three Columns','construction-realestate'),
	            'Four Columns' => __('Four Columns','construction-realestate'),
	            'Grid Layout' => __('Grid Layout','construction-realestate'),
	            'Left Sidebar' => __('Left Sidebar','construction-realestate'),
	            'Right Sidebar' => __('Right Sidebar','construction-realestate')
	        ),
	    )
    );

	//Social Icons(topbar)
	$wp_customize->add_section('construction_realestate_topbar_header',array(
		'title'	=> __('Social Icon Section','construction-realestate'),
		'description'	=> __('Add Socail Link here','construction-realestate'),
		'priority'	=> null,
		'panel' => 'construction_realestate_panel_id',
	));

	$wp_customize->add_setting('construction_realestate_cont_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('construction_realestate_cont_facebook',array(
		'label'	=> __('Add Facebook link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_cont_facebook',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('construction_realestate_cont_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('construction_realestate_cont_twitter',array(
		'label'	=> __('Add Twitter link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_cont_twitter',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('construction_realestate_google_plus',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('construction_realestate_google_plus',array(
		'label'	=> __('Add Google Plus link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_google_plus',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('construction_realestate_pinterest',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('construction_realestate_pinterest',array(
		'label'	=> __('Add Pintrest link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_pinterest',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('construction_realestate_tumblr',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('construction_realestate_tumblr',array(
		'label'	=> __('Add Tumblr link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_tumblr',
		'type'		=> 'url'
	));

	//Top Bar(topbar)
	$wp_customize->add_section('construction_realestate_contact',array(
		'title'	=> __('Contact Us','construction-realestate'),
		'description'	=> __('Add contact us here','construction-realestate'),
		'priority'	=> null,
		'panel' => 'construction_realestate_panel_id',
	));

	$wp_customize->add_setting('construction_realestate_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('construction_realestate_location',array(
		'label'	=> __('Enter Street','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_location1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('construction_realestate_location1',array(
		'label'	=> __('Enter City','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('construction_realestate_time',array(
		'label'	=> __('Enter Time','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_time1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('construction_realestate_time1',array(
		'label'	=> __('Enter Day','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('construction_realestate_number',array(
		'label'	=> __('Enter Phone No 1.','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_number1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('construction_realestate_number1',array(
		'label'	=> __('Enter Phone No 2.','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'construction_realestate_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'construction-realestate' ),
		'priority'   => 30,
		'panel' => 'construction_realestate_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'construction_realestate_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'construction_realestate_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'construction-realestate' ),
			'section'  => 'construction_realestate_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//About
	$wp_customize->add_section('construction_realestate_about',array(
		'title'	=> __('About Us Section','construction-realestate'),
		'description'	=> __('Add We Think sections below.','construction-realestate'),
		'panel' => 'construction_realestate_panel_id',
	));

	$wp_customize->add_setting('construction_realestate_sec_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('construction_realestate_sec_title',array(
		'label'	=> __('Title','construction-realestate'),
		'section'	=> 'construction_realestate_about',
		'type'		=> 'text'
	));

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('construction_realestate_about_post_setting',array(
		'default' =>'select post',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('construction_realestate_about_post_setting',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','construction-realestate'),
		'section' => 'construction_realestate_about',
	));
	
	//footer text
	$wp_customize->add_section('construction_realestate_footer_section',array(
		'title'	=> __('Footer Text','construction-realestate'),
		'description'	=> __('Add some text for footer like copyright etc.','construction-realestate'),
		'panel' => 'construction_realestate_panel_id'
	));
	
	$wp_customize->add_setting('construction_realestate_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('construction_realestate_footer_copy',array(
		'label'	=> __('Copyright Text','construction-realestate'),
		'section'	=> 'construction_realestate_footer_section',
		'type'		=> 'text'
	));
	
}
add_action( 'customize_register', 'construction_realestate_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class construction_realestate_customize {

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
		$manager->register_section_type( 'Construction_Realestate_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Construction_Realestate_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'RealState Pro', 'construction-realestate' ),
					'pro_text' => esc_html__( 'Go Pro', 'construction-realestate' ),
					'pro_url'  => 'https://www.buywptemplates.com/themes/premium-construction-real-estate-wordpress-theme/',
					'priority'   => 9
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

		wp_enqueue_script( 'construction-realestate-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'construction-realestate-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
construction_realestate_customize::get_instance();