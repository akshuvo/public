<?php include_once 'header.php'; ?>
<?php
$full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
$email = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
$phone = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
$password = isset( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '';
$full_address = isset( $_POST['full_address'] ) ? sanitize_text_field( $_POST['full_address'] ) : '';
$country = isset( $_POST['country'] ) ? sanitize_text_field( $_POST['country'] ) : '';
$state = isset( $_POST['state'] ) ? sanitize_text_field( $_POST['state'] ) : '';

$signup_err = '';

// Validate inputs
if ( $full_name && $email && $phone && $password ) {

	$hash_password = md5( $password );

	// Insert query
	$sql = "INSERT INTO Users (full_name, email, phone, password, full_address, country, state) 
	VALUES ('$full_name', '$email', '$phone', '$hash_password', '$full_address', '$country', '$state')";

	// Include config file
	require_once "config.php";

	if ( $dbconn->query( $sql ) === TRUE ) {
	  	$last_id = $dbconn->insert_id;

	  	if ( $last_id ) {
	  		// Initialize the session
	        if ( session_status() === PHP_SESSION_NONE ) {
	            session_start();
	        }

	        // Store data in session variables
	        $_SESSION["loggedin"] = true;
	        $_SESSION["current_user_id"] = $last_id;
	                
	        // Redirect user to welcome page
	        header("location: " . home_url('dashboard?message=signup-done'));
	  	}
	  	
	} else {
	  	$signup_err = 'Something went wrong.';
	}

}
?>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      	<div class="col-md-10 mx-auto col-lg-8">
			<div class="card shadow-lg border-0 rounded-lg">
			    <div class="card-header">
			        <h3 class="text-center font-weight-light my-4">Create Account</h3>
			    </div>
			    <div class="card-body">
			        <form method="post">

			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputFullName" type="text" name="full_name" placeholder="Enter your full name" value="<?php echo $full_name; ?>" required>
			                <label for="inputFullName">Full Name</label>
			            </div>

			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" value="<?php echo $email; ?>" required>
			                <label for="inputEmail">Email address</label>
			            </div>

			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputPhone" type="tel" name="phone" placeholder="+8801770376544" value="<?php echo $phone; ?>" required>
			                <label for="inputPhone">Phone</label>
			            </div>

			            <div class="form-floating mb-3">
			               	<input class="form-control" id="inputPassword" type="password" name="password" placeholder="Create a password" value="<?php echo $password; ?>" required>
			                <label for="inputPassword">Password</label>
			            </div>

			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputFullAddress" type="text" name="full_address" placeholder="Enter full address" value="<?php echo $full_address; ?>">
			                <label for="inputFullAddress">Full Address</label>
			            </div>

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
			                        <label for="inputState">State</label>
			                    </div>
			                </div>
			            </div>

			            <div class="mt-4 mb-0">
			                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Account</button></div>
			            </div>

			        </form>
			    </div>
			    <div class="card-footer text-center py-3">
			        <div class="small">Have an account? <a href="login.php">Go to login</a></div>
			    </div>
			</div>
      	</div>
    </div>
</div>
<?php include_once 'footer.php'; ?>

