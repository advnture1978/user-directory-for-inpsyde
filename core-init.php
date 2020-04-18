<?php 
/*
*
*	***** User Directory for Inpsyde *****
*
*	This file initializes all UDFI Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('UDFI_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('UDFI_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('UDFI_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('UDFI_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
/*
*
*  Register CSS
*
*/
function udfi_register_core_css(){
wp_enqueue_style('udfi-bootstrap', UDFI_CORE_CSS . 'bootstrap.min.css',null,time(),'all');
wp_enqueue_style('udfi-core', UDFI_CORE_CSS . 'udfi-core.css',null,time(),'all');
};
add_action( 'wp_enqueue_scripts', 'udfi_register_core_css' );    
/*
*
*  Register JS/Jquery Ready
*
*/
function udfi_register_core_js(){
// Register Core Plugin JS	
wp_enqueue_script('udfi-bootstrap', UDFI_CORE_JS . 'bootstrap.min.js',array('jquery'),time(),true);
wp_enqueue_script('udfi-core', UDFI_CORE_JS . 'udfi-core.js',array('jquery'),time(),true);
wp_localize_script('udfi-core', 'udfi_ajaxurl', admin_url('admin-ajax.php'));
};
add_action( 'wp_enqueue_scripts', 'udfi_register_core_js' );    
/*
*
*  Includes
*
*/ 
// Load the Functions
if ( file_exists( UDFI_CORE_INC . 'udfi-core-functions.php' ) ) {
	require_once UDFI_CORE_INC . 'udfi-core-functions.php';
}     
// Load the ajax Request
if ( file_exists( UDFI_CORE_INC . 'udfi-ajax-request.php' ) ) {
	require_once UDFI_CORE_INC . 'udfi-ajax-request.php';
} 
// Load the Shortcodes
if ( file_exists( UDFI_CORE_INC . 'udfi-shortcodes.php' ) ) {
	require_once UDFI_CORE_INC . 'udfi-shortcodes.php';
}