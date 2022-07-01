<?php include_once 'header.php'; ?>
<?php
$user = current_user();

// Parse args
$user = hw_parse_args($user, get_user_db_default_args());
$user['password'] = '';

?>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      	<div class="col-md-10 mx-auto col-lg-8">

      		<?php if( !empty( $signup_err ) ) : ?>
	      		<div class="alert alert-warning alert-dismissible">
	      			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				  	<strong>Error:</strong> Something went wrong, please check the informations again.
				</div>
			<?php endif; ?>

			<div class="card shadow-lg border-0 rounded-lg">
			    <div class="card-header">
			        <h3 class="text-center font-weight-light my-4">Update your profile</h3>
			    </div>
			    <form method="post">
			    	<div class="card-body">
			        
			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputFullName" type="text" name="full_name" placeholder="Enter your full name" value="<?php echo $user['full_name']; ?>" required>
			                <label for="inputFullName">Full Name</label>
			            </div>

			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" value="<?php echo $user['email']; ?>" required>
			                <label for="inputEmail">Email address</label>
			            </div>

			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputPhone" type="tel" name="phone" placeholder="+8801770376544" value="<?php echo $user['phone']; ?>" required>
			                <label for="inputPhone">Phone</label>
			            </div>

			            <div class="form-floating mb-3">
			               	<input class="form-control" id="inputPassword" type="password" name="password" placeholder="Create a password" value="<?php echo $user['password']; ?>">
			                <label for="inputPassword">Password</label>
			                <small>Leave empty if you want to keep your old password.</small>
			            </div>


			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputFullAddress" type="text" name="full_address" placeholder="Enter full address" value="<?php echo $user['full_address']; ?>">
			                <label for="inputFullAddress">Full Address</label>
			            </div>

			            <div class="row mb-3">
			                <div class="col-md-6">
			                    <div class="form-floating mb-3 mb-md-0">
			                        <input class="form-control" id="inputCountry" type="text" name="country" placeholder="Country" value="<?php echo $user['country']; ?>">
			                        <label for="inputCountry">Country</label>
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-floating mb-3 mb-md-0">
			                        <input class="form-control" id="inputState" type="text"  name="state" placeholder="State" value="<?php echo $user['state']; ?>">
			                        <label for="inputState">State</label>
			                    </div>
			                </div>
			            </div>

			            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
			        
			    	</div>
			    <div class="card-footer text-center py-3">
			        <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Update Account</button></div>
			    </div>
			    </form>
			</div>
      	</div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
