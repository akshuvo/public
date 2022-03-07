<?php
/** Absolute path to the  directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

// Include config file
require ABSPATH . "config.php";


// For development purpose
if ( !function_exists('ppr') ) {
  function ppr($data = null){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
  }
}

// Get Settings
function get_option( $option_key = false ){
	if ( !$option_key ) {
		return '';
	}

	// sql query 
	$get_value = dbconn()->get_results( "SELECT value FROM Options WHERE name = '$option_key' LIMIT 1" );
    
    // If has data
    
    if ( !empty( $get_value ) ) {
    	// get option value
    	return isset( $get_value['value'] ) ? $get_value['value'] : '';
    }

	return '';
}


// Check if the user is logged in
function is_logged_in(){

	// Initialize the session
	if ( session_status() === PHP_SESSION_NONE ) {
	    session_start();
	}
	 
	// Check if the user is already logged in, if yes then return user id
	if( isset( $_SESSION["loggedin"] ) && $_SESSION["loggedin"] === true ){
	    return $_SESSION["current_user_id"];
	}
 	
 	return false;
}

// Get current logged in user id
function get_current_user_id(){
	return is_logged_in();
}

// Sanitize title
function sanitize_title( $str = '' ){
	// Replace any non word to dash -
	$str = preg_replace('/\W+/', '-', strtolower( trim( $str ) ) );
	$str = trim( $str, 'php' );
	$str = trim( $str, '-' );
	return $str;
}

// Current page id
function get_current_page_id(){
	$request_uri = $_SERVER['REQUEST_URI'];
	switch ( $request_uri ) {
		case '/':
			return 'index';
			break;
		
		default:
			return sanitize_title( $request_uri );
			break;
	}

	// return empty
	return;
}

// Body Class
function get_body_classes(){
	return get_current_page_id();
}


// Home url
function home_url( $url = '' ){

	// Get site url from DB
	$home_url = get_option('siteurl');
	//$home_url = '';

	// Set from client side
	if ( empty( $home_url ) ) {
		$home_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
	}

	// remove and add trailing slash
	$home_url = trim( $home_url, '/' ) . '/';

	// add extra params
	if ( !empty( $url ) ) {
		$home_url = $home_url . $url;
	}

	// remove and add trailing slash
	if ( !strrpos( $home_url, ".php") ) {
		$home_url = trim( $home_url, '/' ) . '/';
	}


	return $home_url;
}


// Assets url
function assets_url( $url = '' ){

	// remove and add trailing slash
	$assets_url = home_url('assets');

	// add extra params
	if ( !empty( $url ) ) {
		$assets_url = $assets_url . $url;
	}
	
	return $assets_url;
}

// Avatar
function get_avatar(){
	return 'S';
}

// Get welcome message
function get_welcome_message(){
	return 'Hi Shuvo';
}

// Sanitize Texts
function sanitize_text_field( $string, $remove_breaks = false ) {
    $string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $string );
    $string = strip_tags( $string );
 
    if ( $remove_breaks ) {
        $string = preg_replace( '/[\r\n\t ]+/', ' ', $string );
    }
 
    return trim( $string );
}