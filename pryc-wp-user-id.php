<?php
/*
 * Plugin Name: PRyC WP: User(s) ID
 * Plugin URI: http://PRyC.pl
 * Description: Add column with user(s) ID to WordPress users list
 * Author: PRyC
 * Author URI: http://PRyC.pl
 * Version: 1.0.5
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/



if ( ! defined( 'ABSPATH' ) ) exit;

// Column
function pryc_wp_user_id_add_column( $columns ) {
    return array_merge( $columns,
		array( 'userid' => __( 'UID' ) ) );
}
add_filter( 'manage_users_columns', 'pryc_wp_user_id_add_column' );

// Content
function pryc_wp_user_id_add_column_content( $content, $column_name, $userid ) {
	if ( $column_name === 'userid' ) {
		return $userid;
	}
	return $content;
}
add_action( 'manage_users_custom_column', 'pryc_wp_user_id_add_column_content', 10, 3 );

// CSS
function pryc_wp_user_id_column_css(){
	echo '<style>.column-userid { width: 3em; }</style>';
}
add_action( 'admin_head', 'pryc_wp_user_id_column_css' );


