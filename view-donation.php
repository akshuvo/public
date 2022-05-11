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
				<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
				    
				    <div class="carousel-inner">
				        <div class="carousel-item active">
				            <img src="https://heplingwall.local/uploads/demo.png" class="d-block w-100" alt="...">
				        </div>
				        <div class="carousel-item">
				            <img src="https://heplingwall.local/uploads/demo.png" class="d-block w-100" alt="...">
				        </div>
				        <div class="carousel-item">
				            <img src="https://heplingwall.local/uploads/demo.png" class="d-block w-100" alt="...">
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
			        <ul class="list-unstyled cf-advert-list list-inline">
					    <li class="flex-wrap"> <span class="cf-label"> Make			</span> <span class="cf-value"> Scania			</span> </li>
					    <li class="flex-wrap"> <span class="cf-label"> Model			</span> <span class="cf-value"> R450			</span> </li>
					    <li class="flex-wrap"> <span class="cf-label"> Mileage 			</span> <span class="cf-value"> 456km			</span> </li>
					    <li class="flex-wrap"> <span class="cf-label"> Production Year			</span> <span class="cf-value"> 2018			</span> </li>
					    <li class="flex-wrap"> <span class="cf-label"> Body Color			</span> <span class="cf-value"> Red</span> </li>
					    <li class="flex-wrap"> <span class="cf-label"> Used			</span> <span class="cf-value"> No			</span> </li>
					    <li class="flex-wrap"> <span class="cf-label"> Extras			</span> <span class="cf-value"> Airbags, ASP</span> </li>
					</ul>
			    </div>
			</div>
			<!-- End More Info -->

      		<div class="card mb-5">
      			<div class="card-body">
			     	<h5 class="mb-3">Scania R-SRS L-CLASS R450 LA Streamline Highline Diesel</h5>
					<div class="post-content clearfix">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<blockquote><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p></blockquote>
						<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
					</div>
			    </div>
			</div>
			<!-- End More Info -->

      	</div>

      	<div class="col-md-4 col-lg-4">

      		<!-- Availability -->
			<div class="bg-info py-3  text-center text-light mb-5">
				<h4 class="m-0">Available</h4>
			</div>

			<!-- Contact Information -->
			<div class="card mb-5">
      			<div class="card-body">
			     	<h5 class="mb-3">Location Info</h5>

			     	<ul class="list-unstyled cf-advert-list list-inline">
					    <li class="flex-wrap w-100"> 
					    	<span class="cf-label">Address</span> 
					    	<span class="cf-value">Banasree road, house 06</span> 
					    </li>
					    <li class="flex-wrap w-100"> 
					    	<span class="cf-label">District</span> 
					    	<span class="cf-value">Dhaka</span> 
					    </li>
					    <li class="flex-wrap w-100"> 
					    	<span class="cf-label">Country</span> 
					    	<span class="cf-value">Bangladesh</span> 
					    </li>
					</ul>
					
			    </div>
			</div>

			<!-- Send Request Form -->
			<div class="card mb-5">
      			<div class="card-body">
			     	<h5 class="mb-3">Send Request to this</h5>

			     	<form class="request-form">
			     		<div class="form-floating mb-3">
			                <input class="form-control" id="inputFullName" type="text" name="name" placeholder="Enter your full name" required>
			                <label for="inputFullName">Your Name</label>
			            </div>
			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputFullName" type="email" name="email" placeholder="Enter your full name" required>
			                <label for="inputFullName">Email Address</label>
			            </div>
			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputFullName" type="tel" name="phone" placeholder="Enter your full name" required>
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
      			<div class="card-body">
			     	<h5 class="mb-3">More from this location</h5>
					<div class="similar-donations">
						
						<!-- Start Single Donation Small Grid -->
						<div class="card mb-3 position-relative">
	                        <div class="row g-0">
	                            <div class="col-md-3">
	                            	<img src="https://heplingwall.local/uploads/demo.png" class="d-block h-100 w-100">
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
	                            	<img src="https://heplingwall.local/uploads/demo.png" class="d-block h-100 w-100">
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
	                            	<img src="https://heplingwall.local/uploads/demo.png" class="d-block h-100 w-100">
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
	                            	<img src="https://heplingwall.local/uploads/demo.png" class="d-block h-100 w-100">
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