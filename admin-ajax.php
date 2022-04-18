<?php
/** Load Functions  */
require_once dirname( __FILE__ ) . '/functions.php';

if ( isset( $_POST['action'] ) && !empty( $_POST['action'] ) ) {

	// Make function key
	$action = 'hw_ajax_' . str_replace('-', '_', sanitize_text_field( $_POST['action'] ));

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

/**
 * Handle Donation Browse by map
 */
function hw_ajax_browse_map(){

	// Get Form data
	$country   = isset( $_POST['country'] ) ? sanitize_text_field( $_POST['country'] ) : '';
	$state     = isset( $_POST['state'] ) ? sanitize_text_field( $_POST['state'] ) : '';
	$latitude  = isset( $_POST['latitude'] ) ? sanitize_text_field( $_POST['latitude'] ) : '';
	$longitude = isset( $_POST['longitude'] ) ? sanitize_text_field( $_POST['longitude'] ) : '';

	// Get doncations
    $donations = dbconn()->get_results("SELECT id, title, type, qty, status, is_active, location, country, state, latitude, longitude, user_id, images, dated FROM Donations WHERE 1=1 ORDER BY id DESC LIMIT 50");

    // Response
    $response = [];
    $locations = [];

    if( !empty( $donations ) ) {
    	foreach(  $donations as $row ) {
			// Donation default args
            $defaults_args = get_donation_default_args();

            // Parse args
            $args = hw_parse_args($row, $defaults_args); 

            if ( (float) $args['latitude'] && (float) $args['longitude'] ) {
            	// Push locations
	            $locations[] = [
	            	'info' 	=> $args['title'],
	            	'lat' 	=> (float) $args['latitude'],
	            	'lng' 	=> (float) $args['longitude'],
	            ];
            }


            //get_template_part('donation-content.php', $args);
        }
    }

    $response['locations'] = $locations;

    // Send reponse
    echo json_encode( $response );

	die();
}
// Die
die("0");