<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Replace default login logo with custom image
add_action('login_head', 'wpinspire_login_quote');
function wpinspire_login_quote() {
    echo '<style type="text/css">.login h1 a { background-image:url('. get_stylesheet_directory_uri() .'/images/logo.png); }</style>';
}

function wpinspire_pick_random($array){
	return $array[array_rand($array)];
}

add_filter('login_message', 'wpinspire_login_message');
function wpinspire_login_message() {
	$url = plugin_dir_url(__FILE__) . 'quotes.json'; // get our json quotes
	$data = file_get_contents($url); // get contents from json
	$quoteArr = json_decode($data, true); // decode json
	$rand_array_key = array_rand($quoteArr); //random key 

	echo '<div class="wpinspire-quote">' . $quoteArr[$rand_array_key]['quoteText'] . '<br/> - '. $quoteArr[$rand_array_key]['quoteAuthor'] .'</div>'; // div with our quote followed by author
}

// Functions so that logo login url redirects to homepage
add_filter( 'login_headerurl', 'wpinspire_login_logo_url' );
function wpinspire_login_logo_url() {
    return home_url();
}

add_filter( 'login_headertitle', 'wpinspire_login_url_title' );
function wpinspire_login_url_title() {
    return get_bloginfo();
}
