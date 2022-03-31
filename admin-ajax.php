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


	// Upload Images
	$product_images = isset( $_FILES['product-images'] ) ? $_FILES['product-images'] : array();
	$images = handle_uploads( $product_images );

	// Image uploaded
	$image_ids = '';
	if ( !empty( $images ) ) {
		// Comma seperated image ids
		$image_ids = implode(',', array_keys($images));
	}

	// Append Image IDs
	$_POST['images'] = $image_ids;
	
	// Add data to donation
	$donation_id = add_donation( $_POST );

	ppr( $donation_id );
	

	die();
}
// Die
die("0");