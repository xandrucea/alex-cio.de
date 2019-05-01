<?php
/**
 * Charmed Customizer functionality
 *
 * @package Charmed
 */


/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function bean_customize_register( $wp_customize ) {

	

	/**
	 * Remove unnecessary controls.
	 */
	$wp_customize->remove_section( 'colors');



	/**
	 * Add custom controls.
	 */
	require get_template_directory() . '/inc/customizer/custom-controls/content.php';
	require get_template_directory() . '/inc/customizer/custom-controls/range.php';
	


	/**
	 * Top-Level Customizer sections and panels.
	 */

	// Add the Theme Options top-level panel.
	$wp_customize->add_panel( 'charmed_theme_options', array(
		'title' 						=> esc_html__( 'Theme Options', 'charmed' ),
		'description' 					=> esc_html__( 'Customize various options throughout the theme with the settings within this panel.', 'charmed' ),
		'priority' 					=> 1, //After the WP default "Background Image" section.
	) );



	/**
	 * Theme Customizer Sections.
	 * For more information on Theme Customizer settings and default sections:
	 *
 	 * @see https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
	 */



	/**
	 * Add the portfolio section.
	 */
	$wp_customize->add_section( 'charmed_pro_portfolio', array(
		'title' 						=> esc_html__( 'Portfolio', 'charmed' ),
		'panel'       					=> 'charmed_theme_options',
	) );

			// Upsell content.
			$wp_customize->add_setting( 'pro_portfolio_content', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'bean_sanitize_nohtml',
			) );

			$wp_customize->add_control( new Bean_Content_Control( $wp_customize, 'pro_portfolio_content', array(
				'type' 				=> 'content',
				'label' 				=> esc_html__( 'Portfolio Settings', 'charmed' ),
			     'description' 			=> sprintf( __( '<a target="_blank" href="%1$s" class="button button-secondary">Get Access to Portfolio Settings</a>', 'charmed' ), esc_url( PRO_UPGRADE_URL ) ),
				'section'				=> 'charmed_pro_portfolio',
				'input_attrs' 			=> array( 'content' => __( '<p>Customize your online portfolio with options to add portfolio sorting, display a portfolio loop on the single view, and activate gallery lazy loading and serve a lightbox gallery.</p><ul><li>Portfolio Sorting</li><li>Lazy Loading Images</li><li>Photoswipe Lightbox Gallery</li><li>Single Portfolio Loop</li></ul>', 'charmed' ) 
				),
			) ) );



	/**
	 * Add the call to action section.
	 */
	$wp_customize->add_section( 'charmed_pro_portfolio_cta', array(
		'title' 						=> esc_html__( 'Call to Action', 'charmed' ),
		'panel'       					=> 'charmed_theme_options',
	) );

			// Upsell content.
			$wp_customize->add_setting( 'pro_portfolio_cta_content', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'bean_sanitize_nohtml',
			) );

			$wp_customize->add_control( new Bean_Content_Control( $wp_customize, 'pro_portfolio_cta_content', array(
				'type' 				=> 'content',
				'label' 				=> esc_html__( 'Call to Action Settings', 'charmed' ),
			     'description' 			=> sprintf( __( '<a target="_blank" href="%1$s" class="button button-secondary">Get Access to Call to Action Settings</a>', 'charmed' ), esc_url( PRO_UPGRADE_URL ) ),
				'section'				=> 'charmed_pro_portfolio_cta',
				'input_attrs' 			=> array( 'content' => __( '<p>Add a call to action <em>(ex: "Hire Me")</em> to the single portfolio view that opens up a contact lead-generation form designed to get you clients.</p><p>Also input a custom email address that messages will be sent to and add your own pre-set subject lines.</p><ul><li>Beautiful CTA</li><li>Customize the CTA Button Text</li><li>Lead Generation Form</li><li>Custom Subject Lines</li><li>Custom Send-to Email Address</li></ul>', 'charmed' ) 
				),
			) ) );

	

	/**
	 * Add the contact section.
	 */
	$wp_customize->add_section( 'charmed_theme_options_contact', array(
		'title' 						=> esc_html__( 'Contact', 'charmed' ),
		'panel'       					=> 'charmed_theme_options',
	) );

			// Add the contact email address selector setting and control.
			$wp_customize->add_setting( 'contact_email', array(
				'default'           	=> '',
			) );

			$wp_customize->add_control( 'contact_email', array(
				'type' 				=> 'email',
				'label' 				=> esc_html__( 'Email Address', 'charmed' ),
				'description' 			=> esc_html__( 'Enter the email address you would like the contact form to send to.', 'charmed' ),
				'section'				=> 'charmed_theme_options_contact',
			) );

			// Add the contact email address selector setting and control.
			$wp_customize->add_setting( 'contact_button', array(
				'default'           	=> '',
				 'sanitize_callback' 	=> 'bean_sanitize_nohtml',
			) );

			$wp_customize->add_control( 'contact_button', array(
				'type' 				=> 'text',
				'label' 				=> esc_html__( 'Contact Button', 'charmed' ),
				'description' 			=> esc_html__( 'Enter the email address you would like the contact form to send to.', 'charmed' ),
				'section'				=> 'charmed_theme_options_contact',
			) );



	/**
	 * Add the footer section.
	 */
	$wp_customize->add_section( 'charmed_theme_options_footer', array(
		'title' 						=> esc_html__( 'Footer', 'charmed' ),
		'panel'       					=> 'charmed_theme_options',
	) );

			// Add the powered by Charmed setting and control.
			$wp_customize->add_setting( 'powered_by_charmed', array(
				'default'           	=> TRUE,
				'sanitize_callback' 	=> 'bean_sanitize_checkbox',
			) );

			$wp_customize->add_control( 'powered_by_charmed', array(
				'type' 				=> 'checkbox',
				'label'       			=> esc_html__( 'Powered by Charmed', 'charmed' ),
				'section' 			=> 'charmed_theme_options_footer',
			) );

			// Add the powered by WordPress setting and control.
			$wp_customize->add_setting( 'powered_by_wordpress', array(
				'default'           	=> FALSE,
				'sanitize_callback' 	=> 'bean_sanitize_checkbox',
			) );

			$wp_customize->add_control( 'powered_by_wordpress', array(
				'type' 				=> 'checkbox',
				'label'       			=> esc_html__( 'A WordPress run site. Nice.', 'charmed' ),
				'section' 			=> 'charmed_theme_options_footer',
			) );



	/**
	 * Add the typography section.
	 */
	$wp_customize->add_section( 'charmed_pro_typography', array(
		'priority'    					=> 20,
		'title'       					=> esc_html__( 'Typography', 'charmed' ),
		'priority' 					=> 20, //After the WP default "Site Identity" section.
	) );

		// Upsell content.
		$wp_customize->add_setting( 'pro_typography_content', array(
			'default'           	=> '',
			'sanitize_callback' 	=> 'bean_sanitize_nohtml',
		) );

		$wp_customize->add_control( new Bean_Content_Control( $wp_customize, 'pro_typography_content', array(
			'type' 				=> 'content',
			'label' 				=> esc_html__( 'Typography Settings', 'charmed' ),
		     'description' 			=> sprintf( __( '<a target="_blank" href="%1$s" class="button button-secondary">Get Access to Typography Settings</a>', 'charmed' ), esc_url( PRO_UPGRADE_URL ) ),
			'section'				=> 'charmed_pro_typography',
			'input_attrs' 			=> array( 'content' => __( '<p>You\'ll have access to 500+ Google Fonts along with font size, line height, letter spacing, and word spacing settings for each section:</p><ul><li>Body</li><li>Page Titles</li><li>Page Content</li></ul>', 'charmed' ) 
			),
		) ) );



	/**
	 * Add the colors section.
	 */
	$wp_customize->add_section( 'charmed_pro_colors', array(
		'title' 				=> esc_html__( 'Colors', 'charmed' ),
		'panel'       			=> 'charmed_theme_options',
	) );	

			//PRO: Add main accent color setting and control.
			$wp_customize->add_setting( 'theme_accent_color', array(
				'default'           	=> '#007AFF',
				'sanitize_callback' 	=> 'sanitize_hex_color',
				'transport'         	=> 'postMessage',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_accent_color', array(
				'label'        		=> esc_html__( 'Accent Color', 'charmed' ),
				'section'     			=> 'charmed_pro_colors',
			) ) );

			//Upsell content.
			$wp_customize->add_setting( 'pro_colors_content', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'bean_sanitize_nohtml',
			) );

			$wp_customize->add_control( new Bean_Content_Control( $wp_customize, 'pro_colors_content', array(
				'type' 				=> 'content',
				'label' 				=> esc_html__( 'Advanced Color Settings', 'charmed' ),
			     'description' 			=> sprintf( __( '<a target="_blank" href="%1$s" class="button button-secondary">Get Access to More Color Settings</a>', 'charmed' ), esc_url( PRO_UPGRADE_URL ) ),
				'section'				=> 'charmed_pro_colors',
				'input_attrs' 			=> array( 'content' => __( '<p>Fine tune your site design with a number of color customization options for each section of the theme:</p><ul><li>Backgrounds</li><li>Accent Colors</li><li>Typography</li><li>Links</li><li>Headers</li><li>CSS3 Black/White Post Filter</li></ul>', 'charmed' ) 
				),
			) ) );



	/**
	 * JetPack Site Logo feaure support
	 * Check to see if JetPack Site Logo module is added. 
	 * For more information on the JetPack site logo:
	 *
 	 * @see http://jetpack.me/support/site-logo/
	 */
	if ( !function_exists( 'jetpack_the_site_logo' ) ) { 
		// Add logo uploader setting and control to the standard WP title_tagline section.
		$wp_customize->add_setting( 'site_logo', array(
			'sanitize_callback'			=> 'bean_sanitize_image',
			// 'default' 	=> get_template_directory_uri() . '/images/' . 'logo@2x.png'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo', array(
	          'label'       				=> esc_html__( 'Site logo', 'charmed' ),
	          'description' 				=> esc_html__( 'Upload a logo to replace the default site name.', 'charmed' ),
	          'section'     				=> 'title_tagline',
	          'settings'    				=> 'site_logo', 
	          
	     ) ) );
	}

	
	/**
	 * Set transports for the Customizer.
	 */
	
	$wp_customize->get_setting( 'blogname' )->transport            		= 'postMessage';
	$wp_customize->get_setting( 'site_logo' )->transport 		   		= 'refresh';
	$wp_customize->get_setting( 'contact_button' )->transport  	  		= 'postMessage';
	$wp_customize->get_setting( 'contact_email' )->transport  	   		= 'postMessage';	
	$wp_customize->get_setting( 'powered_by_charmed' )->transport  	   	= 'postMessage';
	$wp_customize->get_setting( 'powered_by_wordpress' )->transport  	= 'postMessage';	
}

add_action( 'customize_register', 'bean_customize_register', 11 );



/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function bean_customize_preview_js() {
	wp_enqueue_script( 'bean-customize-preview', get_template_directory_uri() . '/inc/customizer/js/customize-preview.js', array( 'customize-preview' ), '20150903', true );
}
add_action( 'customize_preview_init', 'bean_customize_preview_js' );