<?php include_once 'header.php';?>
<div class="page-title py-4 quick-search text-light mb-5">
    <div class="container">
        <div class="flex-wrap">
            <div class="text-center">
                <h1 class="h4-size">All Donations at one place</h1>
            </div>
           
        </div>
    </div>
</div>

<div class="container mt-5">

    <div class="row align-items-md-stretch">

       

        
        <?php
        // Get doncations
        $donations = dbconn()->get_results("SELECT id, title, type, qty, status, is_active, location, country, state, latitude, longitude, user_id, images, dated FROM Donations WHERE 1=1 ORDER BY id DESC LIMIT 100");

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
