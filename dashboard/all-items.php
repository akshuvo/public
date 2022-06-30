<?php include_once 'header.php'; ?>
<?php

// Get current user id
$user_id = get_current_user_id();

// Get doncations
$donations = dbconn()->get_results("SELECT id, title, type, qty, status, is_active, location, country, state, latitude, longitude, user_id, images, dated FROM Donations WHERE 1=1 ORDER BY id DESC LIMIT 0,20");

?>
<form class="hw-ajax-form" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="donation-add">
<div class="container">
	<div class="pb-4 pt-4 row">
		<div class="col-md-12">
      		<div class="align-items-center d-flex justify-content-between">
      			<h1 class>All Donations</h1>
      			<a href="<?php echo home_url('dashboard/new-donation.php'); ?>" class="btn btn-secondary btn-block">Add New</a>
      		</div>
      	</div>
	</div>

    <div class="row">
      	<div class="col-md-8 col-lg-12">
			<div class="row">
		        	<?php if( !empty( $donations ) ) : ?>
		        		<?php foreach(  $donations as $row ) : 

		        			// Donation default args
		        			$defaults_args = get_donation_default_args();

		        			// Parse args
							$args = hw_parse_args($row, $defaults_args);

							get_template_part('donation-content.php', $args);
		        			?>
				        
		        		<?php endforeach; ?>
		        	<?php endif; ?>

		     </div>
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
