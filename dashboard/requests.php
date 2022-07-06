<?php include_once 'header.php'; ?>
<?php

// Get current user id
$user_id = get_current_user_id();


// Get donation requests
$donation_req = dbconn()->get_results("SELECT * FROM DonationRequests WHERE 1=1 ORDER BY id ASC LIMIT 50");

?>
<form class="hw-ajax-form" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="donation-add">
<div class="container">
	<div class="pb-4 pt-4 row">
		<div class="col-md-12">
      		<div class="align-items-center d-flex justify-content-between">
      			<h1 class>Donations Requests</h1>
      			<!-- <a href="<?php echo home_url('dashboard/new-donation.php'); ?>" class="btn btn-secondary btn-block">Add New</a> -->
      		</div>
      	</div>
	</div>

    <div class="row">
      	<div class="col-md-8 col-lg-12">
			<div class="row">
			<?php
		    if( !empty( $donation_req ) ) {
		    	foreach(  $donation_req as $row ) {
					// Donation default args
		            $defaults_args = get_donation_req_db_default_args();

		            // Parse args
		            $req_args = hw_parse_args($row, $defaults_args); 

		            ?>
		            <div class="col-md-6">

						<div class="card mb-4" id="donation-request-id-<?php echo $req_args['id']; ?>">        
			      			<div class="card-body">
							    <div class="d-flex row">
							        <div class="col-md-12">
							            <div class="d-flex flex-column comment-section">
							                <div class="bg-white p-2">
							                    <div class="d-flex flex-row user-info">
							                    	<img class="rounded-circle" src="<?php echo home_url() . 'assets/img/img_avatar3.png';?>" width="40" height="40">
							                        <div class="d-flex flex-column justify-content-start ms-2">
							                        	<span class="d-block font-weight-bold name"><?php echo $req_args['full_name']; ?></span>
							                        	<small class="date text-black-50">Shared publicly - <?php echo hw_date( $req_args['date'] ); ?></small>
							                        </div>

							               
							                        
							                    </div>
							                    <div class="mt-2">
							                        <p class="comment-text"><?php echo $req_args['comment']; ?></p>
							                    </div>
							                </div>
							               
							            </div>
							        </div>
							    </div>
						    </div>
						    <small class="bottom-0 me-2 ms-3 position-absolute submitted-on text-black-50">
						    	<span>Submitted on: <a target="_blank" href="<?php echo home_url('view-donation.php'); ?>?id=<?php echo base64_encode($req_args['donation_id']); ?>"><?php echo esc_html( get_title( $req_args['donation_id'] ) ); ?></a></span> |
						    	<span><a href="tel:<?php echo esc_html( $req_args['phone'] ); ?>"><?php echo esc_html( $req_args['phone'] ); ?></a></span> |
						    	<span><a href="mailto:<?php echo esc_html( $req_args['email'] ); ?>"><?php echo esc_html( $req_args['email'] ); ?></a></span> 
						    	
						    </small>
						</div>
					</div>
		            <?
		        }
		    } else { ?>
				<div class="container-fluid py-5 text-center">
                    <h1 class="display-5 fw-bold  text-primary">No requests yet!</h1>
                    <p class="fs-4 text-secondary">Request now and join the contributions.</p>
                    <a href="#donation-request-form" class="btn btn-outline-secondary">Request Now</a>

                 </div>
		    <?php } ?>

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
