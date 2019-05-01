<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Charmed
 */



if ( ! function_exists( 'charmed_jetpack_setup' ) ) :
function charmed_jetpack_setup() {


	/*
	 * Let JetPack manage the site logo.
	 * By adding theme support, we declare that this theme does use the default
	 * JetPack Site Logo functionality, if the module is activated. 
	 *
	 * See: http://jetpack.me/support/site-logo/
	 */
	add_theme_support( 'site-logo' );


}
endif;
add_action( 'after_setup_theme', 'charmed_jetpack_setup' );