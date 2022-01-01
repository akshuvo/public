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