<?php include_once 'header.php'; ?>
<?php
$title = isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : '';

$email = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
$phone = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
$password = isset( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '';
$full_address = isset( $_POST['full_address'] ) ? sanitize_text_field( $_POST['full_address'] ) : '';
$country = isset( $_POST['country'] ) ? sanitize_text_field( $_POST['country'] ) : '';
$state = isset( $_POST['state'] ) ? sanitize_text_field( $_POST['state'] ) : '';
$latitude = isset( $_POST['latitude'] ) ? sanitize_text_field( $_POST['latitude'] ) : '';
$longitude = isset( $_POST['longitude'] ) ? sanitize_text_field( $_POST['longitude'] ) : '';


$signup_err = '';

// // Validate inputs
// if ( isset( $_POST ) && $full_name && $email && $phone && $password ) {

// 	$hash_password = md5( $password );

// 	// Insert query
// 	$sql = "INSERT INTO Users (full_name, email, phone, password, full_address, country, state) 
// 	VALUES ('$full_name', '$email', '$phone', '$hash_password', '$full_address', '$country', '$state')";


// 	if ( $dbconn->query( $sql ) === TRUE ) {
// 	  	$last_id = $dbconn->insert_id;

// 	  	if ( $last_id ) {
// 	  		// Initialize the session
// 	        if ( session_status() === PHP_SESSION_NONE ) {
// 	            session_start();
// 	        }

// 	        // Store data in session variables
// 	        $_SESSION["loggedin"] = true;
// 	        $_SESSION["current_user_id"] = $last_id;
	                
// 	        // Redirect user to welcome page
// 	        header("location: " . home_url('dashboard?message=signup-done'));
// 	  	}
	  	
// 	} else {
// 	  	$signup_err = 'Something went wrong.';
// 	}

// }
?>
<form class="hw-ajax-form" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="donation-add">
<div class="container">
	<div class="pb-4 pt-4 row">
		<div class="col-md-12">
      		<h1 class>Add New Donation</h1>
      	</div>
	</div>

    <div class="row">

      	<div class="col-md-8 col-lg-8">

			<div class="card">
			    <div class="card-header">
			        <h6 class="mt-2">Product Infromations</h6>
			    </div>
			    <div class="card-body">
			     
			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputFullName" type="text" name="title" placeholder="Enter your full name" value="<?php echo $title; ?>" required>
			                <label for="inputFullName">Title</label>
			            </div>

			            <div class="form-floating mb-3">
			                <select class="form-select" id="product-type" required>
				                <option value="">Choose...</option>
				                <option>Pant</option>
				                <option>Shirt</option>
				                <option>Soyetar</option>
				            </select>
			                <label for="product-type">Product Type</label>
			            </div>

			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputQty" type="number" min="1" name="qty" placeholder="2" value="<?php echo $phone; ?>" required>
			                <label for="inputQty">Quantity</label>
			            </div>


			    </div>
			   
			</div>

			<div class="card mt-4">
			    <div class="card-header">
			        <h6 class="mt-2">Location</h6>
			    </div>
			    <div class="card-body">

			          
						<div class="input-group me-3">
		                    <input id="push-geo-location" type="text" class="form-control py-3 border-end-0" name="location" placeholder="Enter your full address" autocomplete="off" value="<?php echo $full_address; ?>">

		                    <a data-bs-toggle="tooltip" data-bs-placement="top" id="get-current-location" class="input-geo cursor-pointer bg-body input-group-text" title="Autofill your current location" onclick="showPosition(this);">
		                    	<i class="bi bi-geo-alt"></i>
		                    	<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
		                    </a>
		                </div>
		                <div id="geo-result" class="mb-3"></div>


			            <div class="row mb-3">
			                <div class="col-md-6">
			                    <div class="form-floating mb-3 mb-md-0">
			                        <input class="form-control" id="inputCountry" type="text" name="country" placeholder="Country" value="<?php echo $country; ?>">
			                        <label for="inputCountry">Country</label>
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-floating mb-3 mb-md-0">
			                        <input class="form-control" id="inputState" type="text"  name="state" placeholder="State" value="<?php echo $state; ?>">
			                        <label for="inputState">State/District</label>
			                    </div>
			                </div>
			            </div>

			            <div class="row mb-3">
			                <div class="col-md-6">
			                    <div class="form-floating mb-3 mb-md-0">
			                        <input class="form-control" id="inputlatitude" type="text" name="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>">
			                        <label for="inputlatitude">Latitude</label>
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-floating mb-3 mb-md-0">
			                        <input class="form-control" id="inputlongitude" type="text"  name="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>">
			                        <label for="inputlongitude">Longitude</label>
			                    </div>
			                </div>
			            </div>

			    </div>
			   
			</div>

			<div class="card mt-4">
			    <div class="card-header">
			        <h6 class="mt-2">Advance Contents</h6>
			    </div>
			    <div class="card-body">

			          
					<div>
					   	<textarea id="advanced-contents"></textarea>
					</div>

			    </div>
			   
			</div>

      	</div>

      	<div class="col-md-4 col-lg-4">
			<div class="card ">
			    <div class="card-header">
			        <h6 class="mt-2">Product Images</h6>
			    </div>
			    <div class="card-body">
			   	
			   		<div class="form-group files">
	                	<input type="file" class="form-control product-images" name="product-images[]" accept="image/*" multiple>
	              	</div>

			      
			    </div>
			   
			</div>

			<div class="card mt-4">
			    <div class="card-header">
			        <h6 class="mt-2">Save</h6>
			    </div>
			    <div class="card-body">
			   	
			   		<div class="form-floating mb-3">
			            <select class="form-select" id="product-status" name="status" required>
				            <option value="2">Submit for review</option>
				            <option value="0">Draft</option>
				        </select>
			            <label for="product-status">Status</label>
			        </div>
			      
			    </div>
			    <div class="card-footer text-center py-3">
			        <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Submit</button></div>
			    </div>
			   
			</div>
      	</div>

    </div>
</div>
</form>
<?php include_once 'footer.php'; ?>

