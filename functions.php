<?php
/** Absolute path to the  directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

if ( ! defined( 'UPLOADS_DIR' ) ) {
	define( 'UPLOADS_DIR', ABSPATH . 'uploads/' );
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

// Email function
function hw_mail( $to, $subject, $message, $headers = ''){

	$headers .= "From: Helping Wall <mailserver@".$_SERVER['SERVER_NAME'].">\r\n";
	// $headers .= "Reply-To: Shuvo <ss@example.com> \r\n";

	// $headers .= "CC: susan@example.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	// send email
	mail($to, $subject, $message, $headers);
}

// hw_mail('s@gmail.com', 'test', 'Shuvo<br>hi');

// Get Settings
function get_option( $option_key = false ){
	if ( !$option_key ) {
		return '';
	}

	// sql query 
	$get_value = dbconn()->get_row( "SELECT value FROM Options WHERE name = '$option_key' LIMIT 1" );
    
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

if ( ! defined( 'UPLOADS_URL' ) ) {
	define( 'UPLOADS_URL', home_url('uploads/') );
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

// Sanitize HTML
function esc_html( $string = '' ) {
    return trim( htmlspecialchars( $string ) );
}

// Date with formattings
function hw_date( $date = '' ){
	if ( !empty( $date ) ) {
		return date("M d, Y h:ia", strtotime( $date ) );
	}
	
	return '';
}

// Allowed Mimes
function get_allowed_file_types(){
	$mimes = array(
		// 'txt' => 'text/plain',
		// 'htm' => 'text/html',
		// 'html' => 'text/html',
		// 'php' => 'text/html',
		// 'css' => 'text/css',
		// 'js' => 'application/javascript',
		// 'json' => 'application/json',
		// 'xml' => 'application/xml',
		// 'swf' => 'application/x-shockwave-flash',
		// 'flv' => 'video/x-flv',
		// images
		'png' => 'image/png',
		'jpe' => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'jpg' => 'image/jpeg',
		'gif' => 'image/gif',
		'bmp' => 'image/bmp',
		'ico' => 'image/vnd.microsoft.icon',
		'tiff' => 'image/tiff',
		'tif' => 'image/tiff',
		'svg' => 'image/svg+xml',
		'svgz' => 'image/svg+xml',
		// archives
		// 'zip' => 'application/zip',
		// 'rar' => 'application/x-rar-compressed',
		// 'exe' => 'application/x-msdownload',
		// 'msi' => 'application/x-msdownload',
		// 'cab' => 'application/vnd.ms-cab-compressed',
		// audio/video
		// 'mp3' => 'audio/mpeg',
		// 'qt' => 'video/quicktime',
		// 'mov' => 'video/quicktime',
		// // adobe
		// 'pdf' => 'application/pdf',
		// 'psd' => 'image/vnd.adobe.photoshop',
		// 'ai' => 'application/postscript',
		// 'eps' => 'application/postscript',
		// 'ps' => 'application/postscript',
		// // ms office
		// 'doc' => 'application/msword',
		// 'rtf' => 'application/rtf',
		// 'xls' => 'application/vnd.ms-excel',
		// 'ppt' => 'application/vnd.ms-powerpoint',
		// 'docx' => 'application/msword',
		// 'xlsx' => 'application/vnd.ms-excel',
		// 'pptx' => 'application/vnd.ms-powerpoint',
		// // open office
		// 'odt' => 'application/vnd.oasis.opendocument.text',
		// 'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    );

    return $mimes;
}

// Get template part
function get_template_part( $template_name = false, $args = array() ){
	$located = '';

    if ( ! $template_name ) {
        return;
    }

   	if ( file_exists( ABSPATH . 'dashboard/template-parts/' . $template_name ) ) {
        $located = ABSPATH . 'dashboard/template-parts/' . $template_name;
    }
    
    return include $located;
}

function hw_parse_str( $string, &$array ) {
    parse_str( (string) $string, $array );
}

// Parse Args
function hw_parse_args( $args, $defaults = array() ) {
    if ( is_object( $args ) ) {
        $parsed_args = get_object_vars( $args );
    } elseif ( is_array( $args ) ) {
        $parsed_args =& $args;
    } else {
        hw_parse_str( $args, $parsed_args );
    }
 
    if ( is_array( $defaults ) && $defaults ) {
        return array_merge( $defaults, $parsed_args );
    }
    return $parsed_args;
}

// Upload Media
function handle_uploads( $upload_files = [] ){
	
	// Create Uploads Folder
	if ( !file_exists( UPLOADS_DIR ) ) {
	    mkdir( UPLOADS_DIR, 0777, true) ;
	}

	// Hold return data
	$return_data = [];
	
	if ( isset( $upload_files['name'][0] ) && !empty( $upload_files['name'][0] ) ) {
		foreach ( $upload_files['name'] as $key => $filename ) {

			// If file already exixts then give another name
			if ( file_exists( UPLOADS_DIR . $filename ) ) {   
				$filename = time() . '-' . $filename;
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

	return $return_data;
}

// Donation Default args
function get_donation_default_args(){
	return array(
		'id'        => '',
		'title'     => '',
		'type'      => '',
		'qty'       => '',
		'contents'  => '',
		'status'    => '',
		'is_active' => '0',
		'location'  => '',
		'country'   => '',
		'state'     => '',
		'latitude'  => '',
		'longitude' => '',
		'user_id'   => get_current_user_id(),
		'images'   	=> '',
		'dated'   	=> date('Y-m-d H:i:s'),
	);
}

// Add Donation
function add_donation( $args = [] ){

	$defaults_args = get_donation_default_args();

	// Parse args
	$args = hw_parse_args($args, $defaults_args);

	// Insert Data
	$insert_data = array(
		'title'     => sanitize_text_field( $args['title'] ),
		'type'      => sanitize_text_field( $args['type'] ),
		'qty'       => sanitize_text_field( $args['qty'] ),
		'contents'  => htmlspecialchars( $args['contents'], ENT_QUOTES ), // sanitize
		'status'    => sanitize_text_field( $args['status'] ),
		'is_active' => sanitize_text_field( $args['is_active'] ),
		'location'  => sanitize_text_field( $args['location'] ),
		'country'   => sanitize_text_field( $args['country'] ),
		'state'     => sanitize_text_field( $args['state'] ),
		'latitude'  => sanitize_text_field( $args['latitude'] ),
		'longitude' => sanitize_text_field( $args['longitude'] ),
		'user_id'   => sanitize_text_field( $args['user_id'] ),
		'images'   	=> sanitize_text_field( $args['images'] ),
		'dated'   	=> sanitize_text_field( $args['dated'] ),
	);

	if( isset( $args['id'] ) && !empty( $args['id'] ) ) {
		// Insert
		dbconn()->update( 'Donations', $insert_data, ['id' => $args['id']]);

		// Get Insert ID
		$insert_id = $args['id'];
	} else {

		unset( $insert_data['id'] );

		// Insert
		dbconn()->insert( 'Donations', $insert_data);

		// Get Insert ID
		$insert_id = dbconn()->insert_id;
	}

	
	// Return Insert ID
	return $insert_id;
}


// User Default args
function get_user_db_default_args(){
	return array(
		'id'           => '',
		'full_name'    => '',
		'email'        => '',
		'password'     => '',
		'phone'        => '',
		'full_address' => '',
		'country'      => '',
		'state'        => '',
		'lat'          => '0',
		'long'         => '0',
		'user_role'    => 'user',
		'dated'        => date('Y-m-d H:i:s'),
	);
}


// Add User
function add_update_user( $args = [] ){

	$defaults_args = get_user_db_default_args();

	// Parse args
	$args = hw_parse_args($args, $defaults_args);

	// Insert Data
	$insert_data = array(
		'id'           => sanitize_text_field( $args['id'] ),
		'full_name'    => sanitize_text_field( $args['full_name'] ),
		'email'        => sanitize_text_field( $args['email'] ),
		'password'     => sanitize_text_field( $args['password'] ),
		'phone'        => sanitize_text_field( $args['phone'] ),
		'full_address' => sanitize_text_field( $args['full_address'] ),
		'country'      => sanitize_text_field( $args['country'] ),
		'state'        => sanitize_text_field( $args['state'] ),
		'lat'          => sanitize_text_field( $args['lat'] ),
		'long'         => sanitize_text_field( $args['long'] ),
		'user_role'    => sanitize_text_field( $args['user_role'] ),
		'dated'        => sanitize_text_field( $args['dated'] ),
	);

	if( isset( $args['id'] ) && !empty( $args['id'] ) ) {
		// Insert
		dbconn()->update( 'Users', $insert_data, ['id' => $args['id']]);

		// Get Insert ID
		$insert_id = $args['id'];
	} else {

		// Unset ID
		unset( $insert_data['id'] );

		// Insert
		dbconn()->insert( 'Users', $insert_data);

		// Get Insert ID
		$insert_id = dbconn()->insert_id;
	}

	
	// Return Insert ID
	return $insert_id;
}

// Get user by ID
function get_user_by( $by = 'id', $value = '' ){

	if ( empty( $value ) ) {
		return '';
	}

	if ( $by == 'id' ) {
		$user = dbconn()->get_row("SELECT * FROM Users WHERE id = '$value'");
	} elseif( $by == 'email' ){
		$user = dbconn()->get_row("SELECT * FROM Users WHERE email = '$value'");
	} elseif( $by == 'phone' ){
		$user = dbconn()->get_row("SELECT * FROM Users WHERE phone = '$value'");
	}
	
	return $user;
}

// Get current user
function current_user(){
	if ( isset( $GLOBALS['current_user'] ) && !empty( $GLOBALS['current_user'] ) ) {
		return $GLOBALS['current_user'];
	}

	$user_id = get_current_user_id();
	$user = dbconn()->get_row("SELECT * FROM Users WHERE id = '$user_id'");
	if ( !empty( $user ) ) {
		$GLOBALS['current_user'] = $user;

		return $user;
	}

	return false;
}

// Donation Request Default args
function get_donation_req_db_default_args(){
	return array(
		'id'          => '',
		'full_name'   => '',
		'email'       => '',
		'phone'       => '',
		'donation_id' => '',
		'user_id'     => '0',
		'comment'     => '',
		'date'        => date('Y-m-d H:i:s'),
	);
}

// Add Donation Request
function add_update_donation_request( $args = [] ){

	$defaults_args = get_donation_req_db_default_args();

	// Parse args
	$args = hw_parse_args($args, $defaults_args);

	// Insert Data
	$insert_data = array(
		'id'          => sanitize_text_field( $args['id'] ),
		'full_name'   => sanitize_text_field( $args['full_name'] ),
		'email'       => sanitize_text_field( $args['email'] ),
		'phone'       => sanitize_text_field( $args['phone'] ),
		'donation_id' => sanitize_text_field( $args['donation_id'] ),
		'user_id'     => sanitize_text_field( $args['user_id'] ),
		'comment'     => sanitize_text_field( $args['comment'] ),
		'date'        => sanitize_text_field( $args['date'] ),
	);

	if( isset( $args['id'] ) && !empty( $args['id'] ) ) {
		// Insert
		dbconn()->update( 'DonationRequests', $insert_data, ['id' => $args['id']]);

		// Get Insert ID
		$insert_id = $args['id'];
	} else {

		// Unset ID
		unset( $insert_data['id'] );

		// Insert
		dbconn()->insert( 'DonationRequests', $insert_data);

		// Get Insert ID
		$insert_id = dbconn()->insert_id;
	}

	
	// Return Insert ID
	return $insert_id;
}

// Get images from comma separeted
function hw_get_images( $ids = '' ){

	if( empty( $ids ) ){
		return false;
	}

	// Get Images
	$get_images = dbconn()->get_results("SELECT * FROM Media WHERE id IN($ids)");

	return $get_images;
}

// Donation Status name
function hw_donation_statuses(){
	return [
		'2' => 'Submit for review',
		'1' => 'Active',
		'0' => 'Draft',
	];
}

