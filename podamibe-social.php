<?php
/*
Plugin Name:       Podamibe Social Widget
Plugin URI:        http://podamibenepal.com/wordpress-plugins/
Description:       This plugin is used for displaying various social sites link with icons on your desired sidebars with various settings.
Version:           1.0.3
Author:            Podamibe Nepal
Author URI:        http://podamibenepal.com/ 
License:           GPLv2 or later
Text Domain:       psw
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'PSW_PATH', plugin_dir_path( __FILE__ ) );
include( PSW_PATH . 'inc/podamibe-social-widget.php');

/**
 * Register and enqueue the required script
 */

function psw_register_front_scripts() {
	wp_enqueue_style( 'psw-main-style', plugin_dir_url( __FILE__ ) . 'assets/psw-style.css');
	wp_register_style( 'psw-font-awesome', plugin_dir_url( __FILE__ ) . 'assets/font-awesome.min.css');
	wp_enqueue_style( 'psw-font-awesome' );
}
add_action( 'wp_enqueue_scripts', 'psw_register_front_scripts' );

/**
 * Register the js for admin section
 */

function psw_register_admin_scripts() {	 
	wp_enqueue_style( 'psw-admin-style', plugin_dir_url( __FILE__ ) . 'assets/psw-backend.css');
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'psw-color-js', plugin_dir_url( __FILE__ ) . 'assets/psw-color-picker.js', array( 'wp-color-picker' ) );
}
add_action( 'admin_enqueue_scripts', 'psw_register_admin_scripts' );
