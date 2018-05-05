<?php
/*
Plugin Name: WP Inspire
Plugin URI: 
Description: Replaces WP logo on login with theme logo and inspirational quotes.
Version: 1.0
Author: Leroy Rosales
Author URI: https://leroyrosales.com
Copyright: Leroy Rosales
Text Domain: wp-inspire
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Include customizer CSS.
include( plugin_dir_path(__FILE__) . 'inc/wp-inspire.php' );

// Enqueues styling for login area
add_action( 'login_enqueue_scripts', 'wpinspire_login_stylesheet' );
function wpinspire_login_stylesheet() {
    wp_enqueue_style( 'onemap-custom-login', plugin_dir_url(__FILE__) . 'css/login-styles.css' );
}