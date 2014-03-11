<?php
/**
 *  Admin Customizations
 *
 * @description: All functions that customize the admin area go here
 */

//* custom CSS for admin logo and layout
function wordimpress_custom_styles() {

	echo '<link rel="shortcut icon" type="image/png" href="' . plugins_url( 'assets/img/favicon.ico',  dirname(__FILE__) ) . '" />';
	echo '<link rel="stylesheet" href="' . plugins_url( 'assets/css/admin.css', dirname(__FILE__) ) . '" type="text/css" media="screen" />';

}

add_action( 'login_head', 'wordimpress_custom_styles' );
add_action( 'admin_head', 'wordimpress_custom_styles' );


// Add and remove dashboard widgets
function wordimpress_dashboard_cleanup() {

	//* remove meta boxes
//	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );

	//* add call to include a custom widget
	wp_add_dashboard_widget( 'wordimpress_help_text', 'Website Help and Support', 'wordimpress_help_links' ); // add a new custom widget for help and support
}

add_action( 'wp_dashboard_setup', 'wordimpress_dashboard_cleanup' );

//* add custom help links
function wordimpress_help_links() {
	?>

	<img src="<?php echo plugins_url( 'assets/img/wordimpress-logo.png', dirname(__FILE__) ) ?>" />

	<p>We're here to help. If you have any questions please don't hesitate to reach out to us.</p>

	<ul>
		<li>Site Developer: <a href="http://wordimpress.com/" title="Visit WordImpress">Devin Walker @ WordImpress</a></li>
	</ul>

<?php
}


//* re-order admin panel
function wordimpress_reorder_menu( $__return_true ) {
	return array(
		'index.php', // this represents the dashboard link
		'edit.php?post_type=page', // this is the default page menu
		'edit.php?post_type=post', // this is the default page menu
		'edit.php', // this is the default POST admin menu
		'upload.php',
		'edit-comments.php',
	);
}

add_filter( 'custom_menu_order', 'wordimpress_reorder_menu' );
add_filter( 'menu_order', 'wordimpress_reorder_menu' );


/**
 * Remove Menu Links
 *
 * @see : https://codex.wordpress.org/Function_Reference/remove_menu_page
 * @TODO: Determin which menu pages, if any, you would like removed
 */
function wordimpress_remove_menus() {

//  remove_menu_page( 'index.php' );                  //Dashboard
//	remove_menu_page( 'edit.php' ); 										//Posts
//  remove_menu_page( 'upload.php' );                 //Media
//  remove_menu_page( 'edit.php?post_type=page' );    //Pages
//  remove_menu_page( 'edit-comments.php' );          //Comments
//  remove_menu_page( 'themes.php' );                 //Appearance
//  remove_menu_page( 'plugins.php' );                //Plugins
//  remove_menu_page( 'users.php' );                  //Users
//  remove_menu_page( 'tools.php' );                  //Tools
//  remove_menu_page( 'options-general.php' );        //Settings

}

add_action( 'admin_menu', 'wordimpress_remove_menus' );


//* remove unwanted columns
function wordimpress_edit_post_columns( $defaults ) {
	unset( $defaults['comments'] );
	unset( $defaults['author'] );
	unset( $defaults['custom-fields'] );
	unset( $defaults['page-meta-robots'] );

	return $defaults;
}

add_filter( 'manage_edit-page_columns', 'wordimpress_edit_post_columns' ); // will affect all non-hierarchical post types