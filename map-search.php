<?php include_once 'header.php';?>

  <!-- ========== MAIN CONTENT ========== -->
  <main class="hw-browse-with-maps">
    <!-- Content -->
    <div class="container-fluid px-3">
      <div class="row">
        <div class="align-items-center bg-light col-lg-5 d-lg-flex d-none flex-wrap min-vh-lg-100 position-relative p-0">
       
   			<div class="h-100 hw-map-search-wrap overflow-auto w-100">
	   			<form class="hw-ajax-form hw_geo_wrap ">
		   			<div class="hw-ajax-form hw_geo_wrap align-items-center bg-body d-flex p-4 shadow" method="post" autocomplete="off">
		                <div class="input-group input-group-lg me-3">
		                    <input id="push-geo-location" type="text" class="hw-geo-location form-control border-end-0" name="location" placeholder="Enter your full address" autocomplete="off" required>
		                    <a id="get-current-location" class="input-geo cursor-pointer bg-body input-group-text" title="Autofill your current location">
		                        <i class="bi bi-geo-alt"></i>
		                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
		                    </a>
		                </div>
		                <button class="btn btn-lg btn-primary w-25" type="submit">Search</button>

		                <div id="map" class="d-none"></div>

		                <input type="hidden" class="form-control" id="inputCountry" name="country" placeholder="Country">
		                <input type="hidden" class="form-control" id="inputState"  name="state" placeholder="State">
		                <input type="hidden" class="form-control" id="inputlatitude" name="latitude" placeholder="Latitude">
		                <input type="hidden" class="form-control" id="inputlongitude"  name="longitude" placeholder="Longitude">
		            </div>
	            </form>

	            <div class="hw-map-results-wrap p-2 mt-3">
	           
	   				<?php
			        // Get doncations
			        $donations = dbconn()->get_results("SELECT id, title, type, qty, status, is_active, location, country, state, latitude, longitude, user_id, images, dated FROM Donations WHERE 1=1 ORDER BY id DESC LIMIT 50");

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

   			
          
        </div>
        <!-- End Col -->

        <div class="col-lg-7 d-flex justify-content-center align-items-center min-vh-lg-100 p-0">
         	<div id="map-canvas" class="h-100 w-100"></div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->
<?php include_once 'footer.php';?>

<script>

var locations = [
      ['<h1>Bondi Beach</h1>', -33.890542, 151.274856, 4],
      ['Coogee Beach', -33.923036, 151.259052, 5],
      ['Cronulla Beach', -34.028249, 151.157507, 3],
      ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
      ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map-canvas'), {
      zoom: 10,
      center: new google.maps.LatLng(-33.92, 151.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
jQuery(document).ready(function($){
   
});
</script>