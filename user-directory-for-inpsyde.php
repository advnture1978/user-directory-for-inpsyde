<?php 
/*
Plugin Name: User Directory for Inpsyde
Plugin URI: https://inpsyde.com/
Description: This plugin has been created for a test purpose to apply to the Inpsyde jobs.
Version: 1.0.0
Author: Andre Verona
Author URI: http://andreverona.com
Text Domain: udfi
Generated By: http://ensuredomains.com
*/

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

// Let's Initialize Everything
if ( file_exists( plugin_dir_path( __FILE__ ) . 'core-init.php' ) ) {
require_once( plugin_dir_path( __FILE__ ) . 'core-init.php' );
}