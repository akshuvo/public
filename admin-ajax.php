<?php
/** Load Functions  */
require_once dirname( __FILE__ ) . '/functions.php';

if ( isset( $_POST['action'] ) && !empty( $_POST['action'] ) ) {

	// Make function key
	$action = 'hw_ajax_' . str_replace('-', '_', sanitize_title( $_POST['action'] ));

	// Call the function
	if ( function_exists( $action ) ) {
		call_user_func( $action );
	}

	die("0");
}

/**
 * Handle Donation Submition
 */
function hw_ajax_donation_add(){
	
	ppr( $_POST );
	ppr( $_FILES );

	die();
}
// Die
die("0");