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
	
	$product_images = isset( $_FILES['product-images'] ) ? $_FILES['product-images'] : array();

	$upload_files = $product_images;
	$return_data = [];

	// Add data
	add_donation( $_POST );
	
	if ( isset( $upload_files['name'] ) && !empty( $upload_files ) ) {
		foreach ( $upload_files['name'] as $key => $filename ) {

			// If file already exixts then give another name
			if ( file_exists( UPLOADS_DIR . $filename ) ) {   
				//$filename = time() . '-' . $filename;
			}

			// File Upload Dir
			$FILE_URI = UPLOADS_DIR . $filename;

			// File Url
			$FILE_URL = sanitize_text_field( UPLOADS_URL . $filename );

			if( !in_array( $upload_files['type'][$key], get_allowed_file_types() ) ){
				die("Invalid file type.");
			}

			// Upload to directory
			if ( move_uploaded_file( $upload_files['tmp_name'][$key], $FILE_URI ) ) {

				// Insert file into database
				$file_id = dbconn()->insert('Media', [
					'url' 	=>  $FILE_URL,
					'type' 	=> 'donation',
				]);

				// Set return data
				$return_data[$file_id] = $FILE_URL;

			} else {

			}

		}
	}
	

	die();
}
// Die
die("0");