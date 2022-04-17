<?php include_once 'header.php'; ?>
<?php

// Default values
$defaults_args = get_donation_default_args();
$donation_args = array();

$id = isset( $_GET['id'] ) ? (int) sanitize_text_field( $_GET['id'] ) : 0;

// Get donation by id
if ( $id ) {
	$donation_args = dbconn()->get_row("SELECT * FROM Donations WHERE id = $id");
}

// Parse args
$args = hw_parse_args($donation_args, $defaults_args);

$get_images = hw_get_images( $args['images'] );


?>
<form class="hw-ajax-form" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="donation-add">

<?php if( $id ): ?>
	<input type="hidden" name="id" value="<?php echo $args['id']; ?>">
<?php endif;  ?>

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
			                <input class="form-control" id="inputFullName" type="text" name="title" placeholder="Enter your full name" value="<?php echo $args['title']; ?>" required>
			                <label for="inputFullName">Title</label>
			            </div>

			            <div class="form-floating mb-3">
			                <select class="form-select" id="product-type" name="type" data-value="<?php echo $args['type']; ?>" required>
				                <option value="">Choose...</option>
				                <option>Pant</option>
				                <option>Shirt</option>
				                <option>Soyetar</option>
				            </select>
			                <label for="product-type">Product Type</label>
			            </div>

			            <div class="form-floating mb-3">
			                <input class="form-control" id="inputQty" type="number" min="1" name="qty" placeholder="2" value="<?php echo $args['qty']; ?>" required>
			                <label for="inputQty">Quantity</label>
			            </div>


			    </div>
			   
			</div>

			<div class="card mt-4">
			    <div class="card-header">
			        <h6 class="mt-2">Location</h6>
			    </div>
			    <div class="hw_geo_wrap card-body">
			    	<div id="map" class="mb-3"></div>
			          
						<div class="input-group me-3">
		                    <input id="push-geo-location" type="text" class="form-control py-3 border-end-0" name="location" placeholder="Enter your full address" autocomplete="off" value="<?php echo $args['location']; ?>">

		                    <a data-bs-toggle="tooltip" data-bs-placement="top" id="get-current-location" class="input-geo cursor-pointer bg-body input-group-text" title="Autofill your current location">
		                    	<i class="bi bi-geo-alt"></i>
		                    	<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
		                    </a>
		                </div>
		                <div id="geo-result" class="mb-3"></div>


			            <div class="row mb-3">
			                <div class="col-md-6">
			                    <div class="form-floating mb-3 mb-md-0">
			                        <input class="form-control" id="inputCountry" type="text" name="country" placeholder="Country" value="<?php echo $args['country']; ?>">
			                        <label for="inputCountry">Country</label>
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-floating mb-3 mb-md-0">
			                        <input class="form-control" id="inputState" type="text"  name="state" placeholder="State" value="<?php echo $args['state']; ?>">
			                        <label for="inputState">State/District</label>
			                    </div>
			                </div>
			            </div>

			            <div class="row mb-3">
			                <div class="col-md-6">
			                    <div class="form-floating mb-3 mb-md-0">
			                        <input class="form-control" id="inputlatitude" type="text" name="latitude" placeholder="Latitude" value="<?php echo $args['latitude']; ?>">
			                        <label for="inputlatitude">Latitude</label>
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-floating mb-3 mb-md-0">
			                        <input class="form-control" id="inputlongitude" type="text"  name="longitude" placeholder="Longitude" value="<?php echo $args['longitude']; ?>">
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
					   	<textarea id="advanced-contents" name="contents"><?php echo $args['contents']; ?></textarea>
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

	              	<div class="metabox-selected-images mt-3 row" style="--bs-gutter-x: 7px;">
	              		<?php if( !empty( $get_images ) ) : ?>
		              		<?php foreach ($get_images as $image) : ?>
			              		<div class="col-3">
								  	<div class="border hwd-image-wrap">
								  		<a class="remove-image"><i class="bi bi-x-square"></i></a>
								  		<img src="<?php echo $image['url']; ?>" class="figure-img img-fluid rounded">
								  	</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
	              	</div>	
			      
			    </div>
			   
			</div>

			<div class="card mt-4">
			    <div class="card-header">
			        <h6 class="mt-2">Save</h6>
			    </div>
			    <div class="card-body">
			   	
			   		<div class="form-floating mb-3">
			            <select class="form-select" id="product-status" name="status" data-value="<?php echo $args['status']; ?>" required>
			            	<?php foreach( hw_donation_statuses() as $sid => $sval ): ?>
					            <option value="<?php echo esc_html( $sid ); ?>"><?php echo esc_html( $sval ); ?></option>
					        <?php endforeach; ?>
				        </select>
			            <label for="product-status">Status</label>
			        </div>
			      
			    </div>
			    <div class="card-footer text-center py-3">
			        <div class="d-grid">
			        	<button class="btn btn-primary btn-block submit-btn" type="submit">
			        		<span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Submit
				        </button>
				    </div>
			    </div>
			   
			</div>
      	</div>

    </div>
</div>
</form>
<?php include_once 'footer.php'; ?>

