<?php
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