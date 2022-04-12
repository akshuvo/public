<?php include_once 'header.php'; ?>
<?php

// Get current user id
$user_id = get_current_user_id();

// Get doncations
$donations = dbconn()->get_results("SELECT id, title, type, qty, status, is_active, location, country, state, latitude, longitude, user_id, images, dated FROM Donations WHERE user_id = $user_id");

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
		                <th>Actions</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php if( !empty( $donations ) ) : ?>
		        		<?php foreach(  $donations as $row ) : 

		        			// Donation default args
		        			$defaults_args = get_donation_default_args();

		        			// Parse args
							$args = hw_parse_args($row, $defaults_args);
		        			?>
				        	<tr>
				                <td>
				                	<?php echo esc_html( $args['title'] ); ?>
				                	<div><small>Quantity: <?php echo esc_html( $args['qty'] ); ?></small></div>
				                </td>
				                <td><?php echo esc_html( $args['type'] ); ?></td>
				                <td><?php echo esc_html( $args['images'] ); ?></td>
				                <td><?php echo esc_html( $args['location'] ); ?></td>
				                <td><?php echo esc_html( $args['status'] ); ?></td>
				                <td><?php echo esc_html( $args['user_id'] ); ?></td>
				                <td>
				                	Published<br><?php echo esc_html( date("d/m/Y h:ia", strtotime($args['dated'])) ); ?>
				                </td>
				                <td>
				                	<a href="<?php echo home_url('dashboard/new-donation.php?id=' . $args['id']); ?>" class="btn btn-outline-secondary btn-sm">Edit</a>
				                	<a href="<?php echo '?action=delete_donation&id=' . $args['id']; ?>" class="btn btn-outline-secondary btn-sm">Delete</a>
				                </td>
				              
				            </tr>
		        		<?php endforeach; ?>
		        	<?php endif; ?>

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
