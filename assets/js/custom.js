jQuery(document).ready(function($){
    /* Donation submit */
    $(document).on('submit', '.hw-ajax-form', function(e) {
            e.preventDefault();
            var $this = $(this);
        
        jQuery('.submit-btn').prop('disabled', true);

        var formData = new FormData(this);
        let action = formData.get('action');

            $.ajax({
                type: 'post',
                url: ajaxurl,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    

                },
                complete: function(data) {
                    jQuery('.submit-btn').prop('disabled', false);
                },
                success: function(data) {

                    // Ajax success
                    jQuery( document ).trigger( 'hw_ajax_success_'+action, [data] );


                    console.log('hw_ajax_success_'+action);
                    console.log(data);
                    //var response = JSON.parse(data);


                    //$this.find('.response').html( response.msg );

                },
                error: function(data) {

                    jQuery('.submit-btn').prop('disabled', false);
                    console.log(data);

                },

            });

    });
});