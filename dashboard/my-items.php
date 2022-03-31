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
      		<div class="align-items-center d-flex justify-content-between">
      			<h1 class>My Donations</h1>
      			<a href="<?php echo home_url('dashboard/new-donation.php'); ?>" class="btn btn-secondary btn-block">Add New</a>
      		</div>
      	</div>
	</div>

    <div class="row">
      	<div class="col-md-8 col-lg-12">
			<table id="data-table" class="table " style="width:100%">
		        <thead>
		            <tr>
		                <th>Title</th>
		                <th>Type</th>
		                <th>Images</th>
		                <th>Location</th>
		                <th>Status</th>
		                <th>User</th>
		                <th>Date</th>
		            </tr>
		        </thead>
		        <tbody>

		            <tr>
		                <td>2 T-Shirt in Dhaka</td>
		                <td>T-Shirt</td>
		                <td>
		                	<img class="card-img-top" data-src="holder.js/100px160/" alt="100%x160" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22372%22%20height%3D%22160%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20372%20160%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17fe00cae93%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A19pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17fe00cae93%22%3E%3Crect%20width%3D%22372%22%20height%3D%22160%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22137.3984375%22%20y%3D%2289%22%3E372x160%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 100px; width: 200px; display: block;">
		                </td>
		                <td>Dhaka, Bangladesh</td>
		                <td>Active</td>
		                <td>John Doe</td>
		                <td>Published<br>2021/07/04 at 1:33 pm</td>
		            </tr>
		        	
		            <tr>
		                <td>1 Pant in Dhaka</td>
		                <td>Pant</td>
		                <td>
		                	<img class="card-img-top" data-src="holder.js/100px160/" alt="100%x160" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22372%22%20height%3D%22160%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20372%20160%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17fe00cae93%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A19pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17fe00cae93%22%3E%3Crect%20width%3D%22372%22%20height%3D%22160%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22137.3984375%22%20y%3D%2289%22%3E372x160%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 100px; width: 200px; display: block;">
		                </td>
		                <td>Dhaka, Bangladesh</td>
		                <td>Active</td>
		                <td>John Doe</td>
		                <td>Published<br>2021/07/04 at 1:33 pm</td>
		            </tr>
		        	
		            <tr>
		                <td>1 Pant in Dhaka</td>
		                <td>Pant</td>
		                <td>
		                	<img class="card-img-top" data-src="holder.js/100px160/" alt="100%x160" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22372%22%20height%3D%22160%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20372%20160%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17fe00cae93%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A19pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17fe00cae93%22%3E%3Crect%20width%3D%22372%22%20height%3D%22160%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22137.3984375%22%20y%3D%2289%22%3E372x160%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 100px; width: 200px; display: block;">
		                </td>
		                <td>Dhaka, Bangladesh</td>
		                <td>Active</td>
		                <td>John Doe</td>
		                <td>Published<br>2021/07/04 at 1:33 pm</td>
		            </tr>
		        	
		            <tr>
		                <td>1 Pant in Dhaka</td>
		                <td>Pant</td>
		                <td>
		                	<img class="card-img-top" data-src="holder.js/100px160/" alt="100%x160" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22372%22%20height%3D%22160%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20372%20160%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17fe00cae93%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A19pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17fe00cae93%22%3E%3Crect%20width%3D%22372%22%20height%3D%22160%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22137.3984375%22%20y%3D%2289%22%3E372x160%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 100px; width: 200px; display: block;">
		                </td>
		                <td>Dhaka, Bangladesh</td>
		                <td>Active</td>
		                <td>John Doe</td>
		                <td>Published<br>2021/07/04 at 1:33 pm</td>
		            </tr>

		            <tr>
		                <td>2 T-Shirt in Dhaka</td>
		                <td>T-Shirt</td>
		                <td>
		                	<img class="card-img-top" data-src="holder.js/100px160/" alt="100%x160" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22372%22%20height%3D%22160%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20372%20160%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17fe00cae93%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A19pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17fe00cae93%22%3E%3Crect%20width%3D%22372%22%20height%3D%22160%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22137.3984375%22%20y%3D%2289%22%3E372x160%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 100px; width: 200px; display: block;">
		                </td>
		                <td>Dhaka, Bangladesh</td>
		                <td>Active</td>
		                <td>John Doe</td>
		                <td>Published<br>2021/07/04 at 1:33 pm</td>
		            </tr>
		        	
		            <tr>
		                <td>1 Pant in Dhaka</td>
		                <td>Pant</td>
		                <td>
		                	<img class="card-img-top" data-src="holder.js/100px160/" alt="100%x160" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22372%22%20height%3D%22160%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20372%20160%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17fe00cae93%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A19pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17fe00cae93%22%3E%3Crect%20width%3D%22372%22%20height%3D%22160%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22137.3984375%22%20y%3D%2289%22%3E372x160%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 100px; width: 200px; display: block;">
		                </td>
		                <td>Dhaka, Bangladesh</td>
		                <td>Active</td>
		                <td>John Doe</td>
		                <td>Published<br>2021/07/04 at 1:33 pm</td>
		            </tr>

		        </tbody>
		        <tfoot>
		            <tr>
		                <th>Title</th>
		                <th>Type</th>
		                <th>Images</th>
		                <th>Location</th>
		                <th>Status</th>
		                <th>User</th>
		                <th>Date</th>
		            </tr>
		        </tfoot>
		    </table>
      	</div>
    </div>
</div>
</form>
<?php include_once 'footer.php'; ?>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#data-table').DataTable();
} );
</script>
