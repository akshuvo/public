jQuery(document).ready(function($){
    /* Donation submit */
    $(document).on('submit', '.hw-ajax-form', function(e) {
            e.preventDefault();
            var $this = $(this);
        
        jQuery('.submit-btn').prop('disabled', true);

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
                    jQuery('.submit-btn').prop('disabled', false);
                },
                success: function(data) {

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