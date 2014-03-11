<?php
/**
 *  Metaboxes
 *
 * @description: Contains all Custom Metaboxes and Fields functions
 * @since      : 1.1
 * @created    : 3/10/14
 */

/**
 * Initialize the metabox class
 *
 * @see : https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress/wiki/Basic-Usage
 * @TODO: Determine if you want to use CMB; uncomment action to initialize
 */
add_action( 'init', 'wordimpress_initialize_cmb_meta_boxes', 9999 );
function wordimpress_initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) ) {
		require_once( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cmb/init.php' );
	}
}

/**
 * Sample Metaboxes
 *
 * Adds a sample metabox with fields to the sample "Movies" post type
 *
 * @param $meta_boxes
 *
 * @return mixed
 * @TODO: If you elected to use CMB then you will need to uncomment the filter; otherwise, remove this function
 */
add_filter( 'cmb_meta_boxes', 'wordimpress_sample_metaboxes' );
function wordimpress_sample_metaboxes( $meta_boxes ) {
	$prefix                     = '_cmb_'; // Prefix for all fields
	$meta_boxes['movie_info_metabox'] = array(
		'id'         => 'movie_info_metabox',
		'title'      => 'Movie Information',
		'pages'      => array( 'movies' ), // post type
		'context'    => 'normal', //  'normal', 'advanced', or 'side'
		'priority'   => 'core', //  'high', 'core', 'default' or 'low'
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Lead Actor',
				'desc' => 'Who starred in this film?',
				'id'   => $prefix . 'lead_actor',
				'type' => 'text'
			),
			array(
			    'name' => 'Total Budget',
			    'desc' => 'How much did this movie cost?',
			    'id' => $prefix . 'movie_budget',
			    'type' => 'text_money'
			),
		),
	);

	return $meta_boxes;
}