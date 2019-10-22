<?php
/**
 * Fashion Designer Theme Customizer
 *
 * @package Fashion Designer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function fashion_designer_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'fashion_designer_custom_controls' );

function fashion_designer_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'fashion_designer_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'fashion-designer' ),
	) );

	// Layout
	$wp_customize->add_section( 'fashion_designer_left_right', array(
    	'title'      => __( 'General Settings', 'fashion-designer' ),
		'panel' => 'fashion_designer_panel_id'
	) );

	$wp_customize->add_setting('fashion_designer_width_option',array(
        'default' => __('Full Width','fashion-designer'),
        'sanitize_callback' => 'fashion_designer_sanitize_choices'
	));
	$wp_customize->add_control(new Fashion_Designer_Image_Radio_Control($wp_customize, 'fashion_designer_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','fashion-designer'),
        'description' => __('Here you can change the width layout of Website.','fashion-designer'),
        'section' => 'fashion_designer_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('fashion_designer_theme_options',array(
        'default' => __('Right Sidebar','fashion-designer'),
        'sanitize_callback' => 'fashion_designer_sanitize_choices'
	));
	$wp_customize->add_control('fashion_designer_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','fashion-designer'),
        'description' => __('Here you can change the sidebar layout for posts. ','fashion-designer'),
        'section' => 'fashion_designer_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','fashion-designer'),
            'Right Sidebar' => __('Right Sidebar','fashion-designer'),
            'One Column' => __('One Column','fashion-designer'),
            'Three Columns' => __('Three Columns','fashion-designer'),
            'Four Columns' => __('Four Columns','fashion-designer'),
            'Grid Layout' => __('Grid Layout','fashion-designer')
        ),
	) );

	$wp_customize->add_setting('fashion_designer_page_layout',array(
        'default' => __('One Column','fashion-designer'),
        'sanitize_callback' => 'fashion_designer_sanitize_choices'
	));
	$wp_customize->add_control('fashion_designer_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','fashion-designer'),
        'description' => __('Here you can change the sidebar layout for pages. ','fashion-designer'),
        'section' => 'fashion_designer_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','fashion-designer'),
            'Right Sidebar' => __('Right Sidebar','fashion-designer'),
            'One Column' => __('One Column','fashion-designer')
        ),
	) );

	//Top Bar
	$wp_customize->add_section( 'fashion_designer_topbar', array(
    	'title'      => __( 'Top Bar Settings', 'fashion-designer' ),
		'panel' => 'fashion_designer_panel_id'
	) );

	$wp_customize->add_setting('fashion_designer_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fashion_designer_call_text',array(
		'label'	=> __('Add Phone Text','fashion-designer'),
		'input_attrs' => array(
            'placeholder' => __( 'PHONE', 'fashion-designer' ),
        ),
		'section'=> 'fashion_designer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('fashion_designer_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fashion_designer_call',array(
		'label'	=> __('Add Phone Number','fashion-designer'),
		'input_attrs' => array(
            'placeholder' => __( '+00 1234 567 890', 'fashion-designer' ),
        ),
		'section'=> 'fashion_designer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('fashion_designer_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fashion_designer_email_text',array(
		'label'	=> __('Add Email Text','fashion-designer'),
		'input_attrs' => array(
            'placeholder' => __( 'MAIL', 'fashion-designer' ),
        ),
		'section'=> 'fashion_designer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('fashion_designer_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fashion_designer_email',array(
		'label'	=> __('Add Email Address','fashion-designer'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'fashion-designer' ),
        ),
		'section'=> 'fashion_designer_topbar',
		'type'=> 'text'
	));
	
	$wp_customize->add_setting( 'fashion_designer_header_search',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'fashion_designer_switch_sanitization'
    ));  
    $wp_customize->add_control( new Fashion_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'fashion_designer_header_search',array(
      	'label' => esc_html__( 'Show / Hide Search','fashion-designer' ),
      	'section' => 'fashion_designer_topbar'
    )));
    
	//Slider
	$wp_customize->add_section( 'fashion_designer_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'fashion-designer' ),
		'panel' => 'fashion_designer_panel_id'
	) );

	$wp_customize->add_setting( 'fashion_designer_slider_arrows',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'fashion_designer_switch_sanitization'
    ));  
    $wp_customize->add_control( new Fashion_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'fashion_designer_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','fashion-designer' ),
      	'section' => 'fashion_designer_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'fashion_designer_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'fashion_designer_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'fashion_designer_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'fashion-designer' ),
			'description' => __('Slider image size (1600 x 700)','fashion-designer'),
			'section'  => 'fashion_designer_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('fashion_designer_slider_content_option',array(
        'default' => __('Center','fashion-designer'),
        'sanitize_callback' => 'fashion_designer_sanitize_choices'
	));
	$wp_customize->add_control(new Fashion_Designer_Image_Radio_Control($wp_customize, 'fashion_designer_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','fashion-designer'),
        'section' => 'fashion_designer_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

	//Opacity
	$wp_customize->add_setting('fashion_designer_slider_opacity_color',array(
      'default'              => 0.4,
      'sanitize_callback' => 'fashion_designer_sanitize_choices'
	));

	$wp_customize->add_control( 'fashion_designer_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','fashion-designer' ),
	'section'     => 'fashion_designer_slidersettings',
	'type'        => 'select',
	'settings'    => 'fashion_designer_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','fashion-designer'),
      '0.1' =>  esc_attr('0.1','fashion-designer'),
      '0.2' =>  esc_attr('0.2','fashion-designer'),
      '0.3' =>  esc_attr('0.3','fashion-designer'),
      '0.4' =>  esc_attr('0.4','fashion-designer'),
      '0.5' =>  esc_attr('0.5','fashion-designer'),
      '0.6' =>  esc_attr('0.6','fashion-designer'),
      '0.7' =>  esc_attr('0.7','fashion-designer'),
      '0.8' =>  esc_attr('0.8','fashion-designer'),
      '0.9' =>  esc_attr('0.9','fashion-designer')
	),
	));
 
	//Services
	$wp_customize->add_section('fashion_designer_category_section',array(
		'title'	=> __('Fashion Categroy Section','fashion-designer'),
		'panel' => 'fashion_designer_panel_id',
	));	

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('fashion_designer_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('fashion_designer_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','fashion-designer'),
		'description'=> __('Size of image should be 370 x 270 ','fashion-designer'),
		'section' => 'fashion_designer_category_section',
	));

	//Blog Post
	$wp_customize->add_section('fashion_designer_blog_post',array(
		'title'	=> __('Blog Post Settings','fashion-designer'),
		'panel' => 'fashion_designer_panel_id',
	));	

	$wp_customize->add_setting( 'fashion_designer_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'fashion_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Fashion_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'fashion_designer_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','fashion-designer' ),
        'section' => 'fashion_designer_blog_post'
    )));

    $wp_customize->add_setting( 'fashion_designer_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'fashion_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Fashion_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'fashion_designer_toggle_author',array(
		'label' => esc_html__( 'Author','fashion-designer' ),
		'section' => 'fashion_designer_blog_post'
    )));

    $wp_customize->add_setting( 'fashion_designer_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'fashion_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Fashion_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'fashion_designer_toggle_comments',array(
		'label' => esc_html__( 'Comments','fashion-designer' ),
		'section' => 'fashion_designer_blog_post'
    )));

    $wp_customize->add_setting( 'fashion_designer_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'fashion_designer_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','fashion-designer' ),
		'section'     => 'fashion_designer_blog_post',
		'type'        => 'range',
		'settings'    => 'fashion_designer_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Content Craetion
	$wp_customize->add_section( 'fashion_designer_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'fashion-designer' ),
		'priority' => null,
		'panel' => 'fashion_designer_panel_id'
	) );

	$wp_customize->add_setting('fashion_designer_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new Fashion_Designer_Content_Creation( $wp_customize, 'fashion_designer_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','fashion-designer' ),
		),
		'section' => 'fashion_designer_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'fashion-designer' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('fashion_designer_footer',array(
		'title'	=> __('Footer Settings','fashion-designer'),
		'panel' => 'fashion_designer_panel_id',
	));	
	
	$wp_customize->add_setting('fashion_designer_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('fashion_designer_footer_text',array(
		'label'	=> __('Copyright Text','fashion-designer'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'fashion-designer' ),
        ),
		'section'=> 'fashion_designer_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'fashion_designer_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'fashion_designer_switch_sanitization'
    ));  
    $wp_customize->add_control( new Fashion_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'fashion_designer_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','fashion-designer' ),
      	'section' => 'fashion_designer_footer'
    )));

	$wp_customize->add_setting('fashion_designer_scroll_top_alignment',array(
        'default' => __('Right','fashion-designer'),
        'sanitize_callback' => 'fashion_designer_sanitize_choices'
	));
	$wp_customize->add_control(new Fashion_Designer_Image_Radio_Control($wp_customize, 'fashion_designer_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','fashion-designer'),
        'section' => 'fashion_designer_footer',
        'settings' => 'fashion_designer_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'fashion_designer_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Fashion_Designer_Customize {

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
		$manager->register_section_type( 'Fashion_Designer_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Fashion_Designer_Customize_Section_Pro( $manager,'example_1', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Fashion Designer Pro', 'fashion-designer' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'fashion-designer' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/fashion-designer-wordpress-theme/'),
		)));

		$manager->add_section(new Fashion_Designer_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'fashion-designer' ),
			'pro_text' => esc_html__( 'DOCS', 'fashion-designer' ),
			'pro_url'  => admin_url('themes.php?page=fashion_designer_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'fashion-designer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'fashion-designer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Fashion_Designer_Customize::get_instance();