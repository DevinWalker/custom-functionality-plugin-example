<?php
/*
Plugin Name: WordImpress Custom Functions
Plugin URI: http://wordimpress.com
Description: Custom functions for the ::client name:: website
Author: Devin Walker
Version: 1.2
Requires at least: 3.8.1
Author URI: http://imdev.in
*/

/**
 * Include all necessary files
 */
//admin customizations
if ( file_exists( plugin_dir_path( __FILE__ ) . 'lib/admin-customizations.php' ) ) {
	require_once( 'lib/admin-customizations.php' );
}
//metaboxes
if ( file_exists( plugin_dir_path( __FILE__ ) . 'lib/metaboxes.php' ) ) {
	require_once( 'lib/metaboxes.php' );
}
//CPTs
if ( file_exists( plugin_dir_path( __FILE__ ) . 'lib/custom-post-types.php' ) ) {
	require_once( 'lib/custom-post-types.php' );
}
//Taxonomies
if ( file_exists( plugin_dir_path( __FILE__ ) . 'lib/custom-taxonomies.php' ) ) {
	require_once( 'lib/custom-taxonomies.php' );
}
//Required Plugins
if ( file_exists( plugin_dir_path( __FILE__ ) . 'lib/required-plugins.php' ) ) {
	require_once( 'lib/required-plugins.php' );
}