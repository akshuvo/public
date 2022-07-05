<?php include_once 'header.php';?>
<?php
/**
 * View Donation page
 */

// Default values
$defaults_args = get_donation_default_args();
$donation_args = array();

$id = isset( $_GET['id'] ) ?  sanitize_text_field( base64_decode( $_GET['id'] ) ) : 0;
// var_dump($id);

// Get donation by id
if ( $id ) {
	$donation_args = dbconn()->get_row("SELECT * FROM Donations WHERE id = $id");
}

// Parse args
$args = hw_parse_args($donation_args, $defaults_args);

$get_images = hw_get_images( $args['images'] );

// Current User Data
$current_user = current_user();
$current_user = hw_parse_args($current_user, get_user_db_default_args());

?>
<div class="page-title py-4 quick-search text-light mb-5">
    <div class="container">
        <div class="flex-wrap">
            <div class="flex-left">
                <h1 class="h4-size">1 T-Shirt available in Dhaka, Size: XXL</h1>
            </div>
           
        </div>
    </div>
</div>

<div class="container pt-5">
	<div class="row">
      	<div class="col-md-8 col-lg-8">
      		<div class="donation-images-section mb-5">
				<div id="carouselExampleIndicators" class="carousel slide single-donation-carousel card" data-bs-ride="carousel">
				    
				    <div class="carousel-inner">
				        <div class="carousel-item active">
				            <img src="<?php echo home_url('/'); ?>/uploads/demo.png" class="d-block w-100" alt="...">
				        </div>
				        <div class="carousel-item">
				            <img src="<?php echo home_url('/'); ?>/uploads/demo.png" class="d-block w-100" alt="...">
				        </div>
				        <div class="carousel-item">
				            <img src="<?php echo home_url('/'); ?>/uploads/demo.png" class="d-block w-100" alt="...">
				        </div>
				    </div>
				    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
				    
				    </button>
				    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
				   
				    </button>

				    <div class="carousel-indicators d-none">
				        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
				        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
				    </div>
				</div>
      		</div>	
      		<!-- End Carousel -->

      		<div class="card mb-5">
      			<div class="card-body">
			     	<h5 class="mb-3">More Details</h5>
			       
      		
			     	<h5 class="mb-3">Scania R-SRS L-CLASS R450 LA Streamline Highline Diesel</h5>
					<div class="post-content clearfix">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<blockquote><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p></blockquote>
						<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
					</div>
			    </div>
			</div>
			<!-- End More Info -->

			<div class="col-md-12">
	            <div class="align-items-center d-flex justify-content-between ">
	                <h1 class="m-0">Who requested on this</h1>
	                <a href="#donation-request-form" class="btn btn-secondary">Request Now</a>
	            </div>
	            <hr>
	        </div>

			<?php
			// Get doncations
		    $donation_req = dbconn()->get_results("SELECT * FROM DonationRequests WHERE 1=1 AND donation_id = $id ORDER BY id ASC LIMIT 50");

		    // Response
		    $response = [];
		    $locations = [];

		    if( !empty( $donation_req ) ) {
		    	foreach(  $donation_req as $row ) {
					// Donation default args
		            $defaults_args = get_donation_req_db_default_args();

		            // Parse args
		            $req_args = hw_parse_args($row, $defaults_args); 

		            ?>
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
      		
	
			<!-- End More Info -->

      	</div>

      	<div class="col-md-4 col-lg-4">

      		<!-- Availability -->
			<div class="bg-success py-3  text-center text-light mb-5">
				<h4 class="m-0">Available</h4>
			</div>

			<!-- Contact Information -->
			<div class="card mb-5">
				<div class="card-header"><strong>Location Info</strong></div>
      			<div class="card-body">
			     	<ul class="list-unstyled cf-advert-list list-inline">
			     		<li class="flex-wrap w-100"> 
					    	<span class="cf-label">Title</span> 
					    	<span class="cf-value"><?php echo esc_html($args['title']); ?></span> 
					    </li>
					    <li class="flex-wrap w-100"> 
					    	<span class="cf-label">Type</span> 
					    	<span class="cf-value"><?php echo esc_html($args['type']); ?></span> 
					    </li>
					    <li class="flex-wrap w-100"> 
					    	<span class="cf-label">Quantity</span> 
					    	<span class="cf-value"><?php echo esc_html($args['qty']); ?></span> 
					    </li>
					    <li class="flex-wrap w-100"> 
					    	<span class="cf-label">Posted By</span> 
					    	<span class="cf-value"><?php echo esc_html($args['user_id']); ?></span> 
					    </li>
					    <li class="flex-wrap w-100"> 
					    	<span class="cf-label">Address</span> 
					    	<span class="cf-value"><?php echo esc_html($args['location']); ?></span> 
					    </li>
					    <li class="flex-wrap w-100"> 
					    	<span class="cf-label">District</span> 
					    	<span class="cf-value"><?php echo esc_html($args['country']); ?></span> 
					    </li>
					    <li class="flex-wrap w-100"> 
					    	<span class="cf-label">Country</span> 
					    	<span class="cf-value"><?php echo esc_html($args['state']); ?></span> 
					    </li>
					</ul>
					
			    </div>
			</div>

			<!-- Send Request Form -->
			<div class="card mb-5" id="donation-request-form">
				<div class="card-header"><strong>Send Request to this</strong></div>
      			<div class="card-body">

			     	<form class="hw-ajax-form request-form" method="post">
			     		<input type="hidden" name="action" value="donation_request_add">
			     		<input type="hidden" name="donation_id" value="<?php echo $id; ?>">

			     		<div class="form-floating mb-3">
			                <input class="form-control" id="inputFullName" type="text" name="full_name" placeholder="Enter your full name" value="<?php echo esc_html( $current_user['full_name'] ); ?>" required>
			                <label for="inputFullName">Your Name</label>
			            </div>
			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputFullName" type="email" name="email" placeholder="Enter your full name" value="<?php echo esc_html( $current_user['email'] ); ?>" required>
			                <label for="inputFullName">Email Address</label>
			            </div>
			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputFullName" type="tel" name="phone" placeholder="Enter your full name" value="<?php echo esc_html( $current_user['phone'] ); ?>" required>
			                <label for="inputFullName">Phone</label>
			            </div>
			            <div class="form-floating mb-3">
			                <textarea class="form-control" id="inputFullName"  name="comment" placeholder="Enter your full name"  style="height: 100px"></textarea> 
			                <label for="inputFullName">Comment</label>
			            </div>

			            <div class="d-grid">
				        	<button class="btn btn-primary btn-block submit-btn" type="submit">
				        		<span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Submit
					        </button>
					    </div>
			     	</form>
					
			    </div>
			</div>




			<div class="card mb-5">
				<div class="card-header"><strong>More from this location</strong></div>
      			<div class="card-body">
					<div class="similar-donations">
						
						<!-- Start Single Donation Small Grid -->
						<div class="card mb-3 position-relative">
	                        <div class="row g-0">
	                            <div class="col-md-3">
	                            	<img src="<?php echo home_url('/'); ?>/uploads/demo.png" class="d-block h-100 w-100">
	                            </div>
	                            <div class="col-md-9 ">
	                                <div class="card-body">
	                                    <h6 class="card-title">Candace Jackson in Thakurgaon</h6>
	                                    <div class="card-text text-muted d-flex">
	                                        <small class="me-3 whs-nowrap"><i class="bi bi-record-circle"></i> Soyetar Qty: 2</small>
	                                        <small class="text-truncate"><i class="bi bi-geo-alt"></i> Rajshahi Division, Bangladesh</small>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- End Single Donation Small Grid -->
						
						<!-- Start Single Donation Small Grid -->
						<div class="card mb-3 position-relative">
	                        <div class="row g-0">
	                            <div class="col-md-3">
	                            	<img src="<?php echo home_url('/'); ?>/uploads/demo.png" class="d-block h-100 w-100">
	                            </div>
	                            <div class="col-md-9 ">
	                                <div class="card-body">
	                                    <h6 class="card-title">Candace Jackson in Thakurgaon</h6>
	                                    <div class="card-text text-muted d-flex">
	                                        <small class="me-3 whs-nowrap"><i class="bi bi-record-circle"></i> Soyetar Qty: 2</small>
	                                        <small class="text-truncate"><i class="bi bi-geo-alt"></i> Rajshahi Division, Bangladesh</small>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- End Single Donation Small Grid -->
						
						<!-- Start Single Donation Small Grid -->
						<div class="card mb-3 position-relative">
	                        <div class="row g-0">
	                            <div class="col-md-3">
	                            	<img src="<?php echo home_url('/'); ?>/uploads/demo.png" class="d-block h-100 w-100">
	                            </div>
	                            <div class="col-md-9 ">
	                                <div class="card-body">
	                                    <h6 class="card-title">Candace Jackson in Thakurgaon</h6>
	                                    <div class="card-text text-muted d-flex">
	                                        <small class="me-3 whs-nowrap"><i class="bi bi-record-circle"></i> Soyetar Qty: 2</small>
	                                        <small class="text-truncate"><i class="bi bi-geo-alt"></i> Rajshahi Division, Bangladesh</small>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- End Single Donation Small Grid -->
						
						<!-- Start Single Donation Small Grid -->
						<div class="card mb-3 position-relative">
	                        <div class="row g-0">
	                            <div class="col-md-3">
	                            	<img src="<?php echo home_url('/'); ?>/uploads/demo.png" class="d-block h-100 w-100">
	                            </div>
	                            <div class="col-md-9 ">
	                                <div class="card-body">
	                                    <h6 class="card-title">Candace Jackson in Thakurgaon</h6>
	                                    <div class="card-text text-muted d-flex">
	                                        <small class="me-3 whs-nowrap"><i class="bi bi-record-circle"></i> Soyetar Qty: 2</small>
	                                        <small class="text-truncate"><i class="bi bi-geo-alt"></i> Rajshahi Division, Bangladesh</small>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- End Single Donation Small Grid -->

					</div>
			    </div>
			</div>
			<!-- End More Info -->
      	</div>
    </div>
</div>

<div class="container">

    <div class="row align-items-md-stretch">

        <div class="col-md-12">
            <div class="align-items-center d-flex justify-content-between ">
                <h1 class="m-0">Similar donations</h1>
                <button class="btn btn-secondary">View All</button>
            </div>
            <hr>
        </div>

        
        <?php
        // Get doncations
        $donations = dbconn()->get_results("SELECT id, title, type, qty, status, is_active, location, country, state, latitude, longitude, user_id, images, dated FROM Donations WHERE 1=1 ORDER BY id DESC LIMIT 4");

        if( !empty( $donations ) ) : ?>

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
<?php include_once 'footer.php';?>