// Set up global variable
    var result;
    
    function showPosition( thisObj ) {
        // Store the element where the page displays the result
        result = document.getElementById("geo-result");
        
        // If geolocation is available, try to get the visitor's position
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            // result.innerHTML = "Getting the position information...";
            jQuery(thisObj).addClass('loading');
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    };
    
    // Define callback function for successful attempt
    function successCallback(position) {
        set_location( position.coords.latitude, position.coords.longitude );

    }

    // Set location on location fields
    function set_location( lat = '', long = '', address = '', country = '', state = '' ){
        jQuery('#inputlatitude').val( lat );
        jQuery('#inputlongitude').val( long );


        // Remove Spinner
        jQuery('.input-geo').removeClass('loading');
    }
    
    // Define callback function for failed attempt
    function errorCallback(error) {
        if(error.code == 1) {
            result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
        } else if(error.code == 2) {
            result.innerHTML = "The network is down or the positioning service can't be reached.";
        } else if(error.code == 3) {
            result.innerHTML = "The attempt timed out before it could get the location data.";
        } else {
            result.innerHTML = "Geolocation failed due to unknown error.";
        }

        /// Remove Spinner
        jQuery('.input-geo').removeClass('loading');
    }

jQuery(document).ready(function($){
        /* vendorForm submit */
        $(document).on('submit', '.hw-ajax-form', function(e) {
            e.preventDefault();
            var $this = $(this);

            var formData = new FormData(this);
            //formData.append('action', 'get_vendors_tables');

            $.ajax({
                type: 'post',
                url: ajaxurl,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(data) {


                },
                complete: function(data) {

                },
                success: function(data) {

                    console.log(data);
                    //var response = JSON.parse(data);


                    //$this.find('.response').html( response.msg );

                },
                error: function(data) {
                    console.log(data);

                },

            });

        });
});