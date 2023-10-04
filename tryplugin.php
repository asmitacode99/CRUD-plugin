<?php

/*
  Plugin Name: CRUD Plugin
  Description: Plugin to execute crud operation
  Version: 1
  Author: Asmita Shah
  Author URI: http://wordpress.com
 */
//creating database
/*global $at_db_version;
$at_db_version = '1.0';

function at_datatable() {
    global $wpdb;
    global $at_db_version;

    $table_name = $wpdb->prefix . 'student_list';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name(100) DEFAULT '' NOT NULL,
		role(100) DEFAULT '' NOT NULL,
		contact(100) DEFAULT '' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);

    add_option('at_db_version', $at_db_version);
}

register_activation_hook(__FILE__, 'at_datatable');*/
global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'student_list';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		address text NOT NULL,
		role text NOT NULL,
		contact bigint(12), 
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'jal_install' );
//adding in menu
add_action('admin_menu', 'at_try_menu');

function at_try_menu() {
    //adding plugin in menu
    add_menu_page('student_list', //page title
        'Student Listing', //menu title
        'manage_options', //capabilities
        'Student_Listing', //menu slug
        'student_list' //function
    );
    //adding submenu to a menu
    add_submenu_page('Student_Listing',//parent page slug
        'student_insert',//page title
        'Student Insert',//menu titel
        'manage_options',//manage optios
        'Student_Insert',//slug
        'student_insert'//function
    );
    add_submenu_page( null,//parent page slug
        'student_update',//$page_title
        'Student Update',// $menu_title
        'manage_options',// $capability
        'Student_Update',// $menu_slug,
        'student_update'// $function
    );
    add_submenu_page( null,//parent page slug
        'student_delete',//$page_title
        'Student Delete',// $menu_title
        'manage_options',// $capability
        'Student_Delete',// $menu_slug,
        'student_delete'// $function
    );
}


// returns the root directory path of particular plugin
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'student_list.php');
require_once (ROOTDIR.'student_insert.php');
require_once (ROOTDIR.'student_update.php');
require_once (ROOTDIR.'student_delete.php');
?>