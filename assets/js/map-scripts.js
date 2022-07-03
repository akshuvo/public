function WP_GEO_Field_MapInit( fieldEl = false, fieldtype = 'wp_geo' ) {

    fieldEl = jQuery('.hw_geo_wrap');

    var searchInput = jQuery('#push-geo-location').get(0);
    var mapCanvas   = jQuery('#map', fieldEl ).get(0);

    var putLocation = jQuery('#push-geo-location', fieldEl );
    var latitude    = jQuery('input[name="latitude"]', fieldEl );
    var longitude   = jQuery('input[name="longitude"]', fieldEl );
    var country     = jQuery('input[name="country"]', fieldEl );
    var state       = jQuery('input[name="state"]', fieldEl );
    var city        = jQuery('input[name="city"]', fieldEl );
    var street      = jQuery('input[name="street"]', fieldEl );
    var postal_code      = jQuery('input[name="postal_code"]', fieldEl );
    var locateme      = jQuery('#get-current-location' );

    var location_data = {};

    var componentForm = {
        route: 'long_name',
        street_number: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        postal_code: 'long_name'
    };

    var mapOptions = {
        center:    new google.maps.LatLng( 23.763567379093512,90.29701113313904 ), // Dhaka Location
        zoom:      6,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    // if( typeof adifier_data !== 'undefined' ){
    //     mapOptions.styles = adifier_data.map_style ? JSON.parse( adifier_data.map_style ) : '';
    // }

    var map	= new google.maps.Map( mapCanvas, mapOptions );
    geocoder = new google.maps.Geocoder();

    // Marker
    var markerOptions = {
        map: map,
        draggable: true
    };

    var marker = new google.maps.Marker( markerOptions );
    marker.setPosition( mapOptions.center );

    // Set Position on map
    function setPosition( latLng, zoom, type = null ) {

		jQuery( document ).trigger( 'map_set_position' );

        marker.setPosition( latLng );
        map.setCenter( latLng );

        if ( zoom ) {
            map.setZoom( zoom );
        }

        map.panTo(latLng);

        // Updating Lat, Long field
        if ( type == 'ARR' ) {
            latitude.val( latLng.lat );
            longitude.val( latLng.lng );

            location_data['lat'] = latLng.lat;
            location_data['lng'] = latLng.lng;
        } else {
            latitude.val( latLng.lat() );
            longitude.val( latLng.lng() );

            location_data['lat'] = latLng.lat();
            location_data['lng'] = latLng.lng();
        }


        if( !location_data.country ) {
            jQuery(document).find('.caafw_locateme').trigger('click');
        } 

        // // after location trigger
        // jQuery( document ).trigger({
        //     type: 'wp_geo_get_location_data',
        //     locations: JSON.stringify(location_data),
        // });
        // after location trigger
        jQuery( document ).trigger('wp_geo_get_location_data', [location_data]);
        

    }

    // Get geo code position on pin drag
    function geocodePosition( pos ) {
        geocoder.geocode({
            latLng: pos
        }, function( responses, status ) {

        	jQuery( document ).trigger({
			  	type: 'checkout_address_map_geocode_position',
			  	position: pos,
			  	responses: responses,
			  	status: status
			});

            if ( status === 'OK' && responses && responses.length > 0 ) {
                putLocation.val( responses[0].formatted_address );

                location_data['formatted_address'] = responses[0].formatted_address;

                get_components( responses[0] );

                console.log( responses );

            } else {
                console.log('Cannot determine address at this location due to: ' + status);
            }
        });
    }

    // Set stored Coordinates
    if ( latitude.val() && longitude.val() ) {
        latLng = new google.maps.LatLng( latitude.val(), longitude.val() );
        setPosition( latLng, 17 )
    }

    // Fires on map marker drag start
    google.maps.event.addListener(marker, 'dragstart', function() {
        jQuery( document ).trigger({
		  	type: 'checkout_address_map_dragstart',
		  	position: marker.getPosition(),
		  	fieldtype: fieldtype
		});
    });

    // Fires on map marker dragging
    google.maps.event.addListener(marker, 'drag', function() {
		jQuery( document ).trigger({
		  	type: 'checkout_address_map_drag',
		  	position: marker.getPosition(),
		  	fieldtype: fieldtype
		});
    });

    // Fires on map marker drag end
    google.maps.event.addListener( marker, 'dragend', function() {

        // Passing position to geocodePosition
        geocodePosition(marker.getPosition());

        // Set marker position
        setPosition( marker.getPosition() );

        jQuery( document ).trigger({
		  	type: 'checkout_address_map_dragend',
		  	position: marker.getPosition(),
		  	fieldtype: fieldtype
		});
    });

    // Search Autocomplete init
    var autocomplete = new google.maps.places.Autocomplete(searchInput);

    /*if( typeof adifier_data !== 'undefined' ){
        if( adifier_data.country_restriction ){
            autocomplete.setComponentRestrictions({'country': adifier_data.country_restriction.split(',')});
        }
    }
    autocomplete.bindTo('bounds', map);*/

    // Get current location function
    function geolocate() {
      	if ( navigator.geolocation ) {
        	navigator.geolocation.getCurrentPosition( function( position ) {
        	  	var geolocation = {
        	  	  	lat: position.coords.latitude,
        	  	  	lng: position.coords.longitude
        	  	};

        	  	geocodePosition( geolocation );

        	  	// Bias the autocomplete object to the user's geographical location as supplied by the browser's 'navigator.geolocation' object.
        	  	var circle = new google.maps.Circle({
        	  		center: geolocation,
        	  		radius: position.coords.accuracy
        	  	});

        	  	autocomplete.setBounds(circle.getBounds());

                setPosition( geolocation, 17, 'ARR' );

                // Remove Spinner
                jQuery(locateme).removeClass('loading');

        	}, errorCallback);
            
      	} else {
            alert("Sorry, your browser does not support geolocation.");
        }
    }

    // Define callback function for failed attempt
    function errorCallback(error) {
        // Store the element where the page displays the result
        var result = document.getElementById("geo-result");
        
        if( error.code == 1 ) {
            result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
        } else if( error.code == 2 ) {
            result.innerHTML = "The network is down or the positioning service can't be reached.";
        } else if( error.code == 3 ) {
            result.innerHTML = "The attempt timed out before it could get the location data.";
        } else {
            result.innerHTML = "Geolocation failed due to unknown error.";
        }

        // Remove Spinner
        jQuery(locateme).removeClass('loading');
    }

    // Get current location trigger
    jQuery( locateme ).on( 'click', function( e ){
        jQuery(locateme).addClass('loading');
        geolocate();
    });

    // Fires when place changed on Location field
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        }

        var street_val = '';
        street.val('');
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                if( addressType == 'route' ){
                    street.val( val );
                }
                if( addressType == 'street_number' ){
                    street.val( val );
                }
                else if( addressType == 'locality' ){
                    city.val( val );
                }
                else if( addressType == 'administrative_area_level_1' ){
                    state.val( val );
                }
                else if( addressType == 'country' ){
                    country.val( val ).trigger( 'change' );

                    location_data['country'] = val;
                }
                else if( addressType == 'postal_code' ){
                    postal_code.val( val );
                }
            }
        }

        setPosition( place.geometry.location, 17 );
    });

    // start get componenets //
    function get_components( place ){
        var street_val = '';
        street.val('');
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                if( addressType == 'route' ){
                    street.val( val );
                }
                if( addressType == 'street_number' ){
                    street.val( val );
                }
                else if( addressType == 'locality' ){
                    city.val( val );
                }
                else if( addressType == 'administrative_area_level_1' ){
                    state.val( val );
                }
                else if( addressType == 'country' ){
                    country.val( val ).trigger( 'change' );

                    location_data['country'] = val;
                }
                else if( addressType == 'postal_code' ){
                    postal_code.val( val );
                }
            }
        }
    }
    // end get componenets //

    jQuery(searchInput).keypress(function(e) {
        if (e.keyCode === 13) {
            e.preventDefault();
        }
    });

}



	jQuery(document).ready(function($){


        /*$(document).on('checkout_address_map_drag', function( e ){
        	console.log( e );
        });*/

        $( document ).on( 'click', '.order_location_show_on_map', function( e ) {
			e.preventDefault();
			var latitude = $( this ).data( 'lat' ),
				longitude = $( this ).data( 'long' ),
				mapCanvas = $( this ).parent().find( '#map' ).get(0);

		    var mapOptions = {
		        center:    new google.maps.LatLng( latitude, longitude ),
		        zoom:      17,
		        mapTypeId: google.maps.MapTypeId.ROADMAP,
		        mapTypeControl: false,
		        streetViewControl: false,
		        scaleControl: true
		    };


		    var map	= new google.maps.Map( mapCanvas, mapOptions );

		    // Marker
		    var markerOptions = {
		        map: map,
		        title: 'Uluru (Ayers Rock)'
		    };

		    var marker = new google.maps.Marker( markerOptions );
		    marker.setPosition( mapOptions.center );

		});

	});

	jQuery(window).on('load',function(){

        try {
        	WP_GEO_Field_MapInit();
        } catch( err ) {
            console.info('Loading Error', err.message);
        }

	});