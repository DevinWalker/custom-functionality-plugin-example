<?php
/**
 *  Custom Taxonomies
 *
 * @description: Registers and attaches all Custom Taxonomies using Bamboo Taxonomies helper class
 * @since      : 1.1
 */

/**
 * Intialize Bamboo Taxonomies Helper Class
 * @see: https://github.com/beaucharman/wordpress-custom-taxonomies
 */
if ( ! class_exists( 'Bamboo_Custom_Taxonomy' ) ) {
	require_once(plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wordpress-custom-taxonomies/custom-taxonomy.php' );
}

/**
 * Custom Taxonomy
 *
 * Creates a sample "Genres" taxonomy and attaches to "Movies" sample CPT
 */
// required
$args['name'] = 'genres';

// The post type/s that the taxonomy is connected to.
// String or array
$args['post_type'] = 'movies';

// optional
$args['labels'] = array(
	'singular' => 'Genre',
	'plural'   => 'Genres',
	'menu'     => 'Genres'
);

$args['options'] = array(
	'public'                => true,
	'show_ui'               => true,
	'show_in_nav_menus'     => true,
	'show_tagcloud'         => true,
	'hierarchical'          => true,
	'update_count_callback' => null,
	'query_var'             => true,
	'rewrite'               => true,
	'capabilities'          => array(),
	'sort'                  => null
);

$args['help'] = '';

if ( class_exists( 'Bamboo_Custom_Taxonomy' ) ) {
	$genres = new Bamboo_Custom_Taxonomy( $args );
}