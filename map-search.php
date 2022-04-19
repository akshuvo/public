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
		                    <input id="push-geo-location" type="text" class="hw-geo-location form-control border-end-0" name="location" placeholder="Enter your full address" autocomplete="off" >
		                    <a id="get-current-location" class="input-geo cursor-pointer bg-body input-group-text" title="Autofill your current location">
		                        <i class="bi bi-geo-alt"></i>
		                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
		                    </a>
		                </div>
		                <button class="btn btn-lg btn-primary w-25" type="submit">Search</button>

		                <div id="map" class="d-none"></div>

		                <input type="hidden" name="country" placeholder="Country">
		                <input type="hidden" name="state" placeholder="State">
		                <input type="hidden" name="latitude" placeholder="Latitude">
		                <input type="hidden" name="longitude" placeholder="Longitude">
		                <input type="hidden" name="action" value="browse_map">
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

	var locations = [];

    var map = new google.maps.Map(document.getElementById('map-canvas'), {
      center:    new google.maps.LatLng( 23.763567379093512,90.29701113313904 ), // Dhaka Location
      zoom:      7,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    let markers = [];

    // Center Position
    jQuery(document).on('wp_geo_get_location_data', function(e, data){

    	latLng = new google.maps.LatLng( data.lat, data.lng );

        map.setCenter( latLng );
        //map.setZoom( zoom );
        map.panTo(latLng);
    });

    // Ajax success
    jQuery(document).on('hw_ajax_success_browse_map', function(e, response){

    	let data = JSON.parse( response );

    	// Set locations
    	if ( data.locations ) {
    		locations = data.locations;
    	}

    	clearMarkers();
    
	    for (i = 0; i < locations.length; i++) {  

	    	let timeout = i*100;

	    	let lat = locations[i].lat;
	    	let lng = locations[i].lng;
	    	let info = locations[i].info;

	    	// add animation
	    	setTimeout(function(){
			    marker = new google.maps.Marker({
			       position: new google.maps.LatLng(lat, lng),
			       map: map,
			       animation: google.maps.Animation.DROP,
			     //   icon: '<?php //echo assets_url('img/markers.png'); ?>',
			     //   label: {
				    //   text: "\uF3E7",
				    //   fontFamily: "bootstrap-icons",
				    //   color: "#ffffff",
				    //   fontSize: "12px",
				    // },
			    });

			    markers.push(marker);

			    google.maps.event.addListener(marker, 'click', (function(marker, i) {
			        return function() {
			          infowindow.setContent(info);
			          infowindow.open(map, marker);
			        }
			    })(marker, i));

			}, timeout);
	    }

    });

	function clearMarkers() {
	  for (let i = 0; i < markers.length; i++) {
	    markers[i].setMap(null);
	  }

	  markers = [];
	}

    
jQuery(document).ready(function($){
   
});
</script>