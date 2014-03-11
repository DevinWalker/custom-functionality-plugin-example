<?php
/**
 *  Custom Post Types
 *
 * @description: Registers all Custom Post Types using Bamboo CPT helper class
 * @since      : 1.1
 */

/**
 * Intialize Bamboo CPT Helper Class
 * @see: https://github.com/beaucharman/wordpress-custom-post-types
 */
if ( ! class_exists( 'Bamboo_Custom_Post_Type' ) ) {
	require_once( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wordpress-custom-post-types/custom-post-type.php' );
	// Include Font Awesome
	//@TODO: Determine if you want to use font awesome; plus is it's pretty; minus is it will load all of font awesome
	Bamboo_Custom_Post_Type::get_font_awesome();
}

/**
 * Register a Sample Post Type
 */
// required
$args['name'] = 'movies';

// optional
$args['labels'] = array(
	'singular' => 'Movie',
	'plural'   => 'Movies',
	'menu'     => 'Movies'
);

$args['options'] = array(
	'public'       => true,
	'hierarchical' => false,
	'supports'     => array( 'title', 'editor', 'thumbnail' ),
	'has_archive'  => true
);
// The Unicode of the desired font awesome icon
// @see: fontawesome.io/icons/
$args['menu_icon'] = 'f008';

if ( class_exists( 'Bamboo_Custom_Post_Type' ) ) {
	$albums = new Bamboo_Custom_Post_Type( $args );
}