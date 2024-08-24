<?php
/**
 * Bootscore Child Theme functions and definitions
 *
 * @package BootstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set to false for production
define( '_IS_DEV_MODE', true );


/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function bootscorechild_remove_scripts() {
	wp_dequeue_style( 'bootstrap-style' );
	wp_deregister_style( 'bootstrap-style' );

}
add_action( 'wp_enqueue_scripts', 'bootscorechild_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function bootscore_child_scripts(){
	
	$suffix = '';
	if( defined('_IS_DEV_MODE') && _IS_DEV_MODE ){
		$suffix = '.min';
	}

	wp_enqueue_style( 'bootstrap-child-style', get_theme_file_uri() . '/css/style-bootstrap'.$suffix.'.css', array(), _BOOTSCORE_VERSION );

	wp_enqueue_style( 'bootscore-child-style', get_stylesheet_uri(), array(), _BOOTSCORE_VERSION );

}
add_action( 'wp_enqueue_scripts', 'bootscore_child_scripts' );