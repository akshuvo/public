<?php include_once 'header.php';?>
<div class="main-hero">
    <div class="overlay">
        <div class="container">
            <div class="mt-4 p-0 p-md-5 mb-4">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold text-center text-primary">Search Donations</h1>
                    <p class="fs-4 mb-5 text-center text-secondary">Here you can find donations by location</p>

                    <form class="hw_geo_wrap align-items-center bg-body d-flex p-4 shadow" method="post" autocomplete="off" action="map-search.php">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">

    <div class="row align-items-md-stretch">

        <div class="col-md-12">
            <div class="align-items-center d-flex justify-content-between ">
                <h1 class="m-0 text-secondary">Most recent donations</h1>
                <button class="btn btn-secondary">View All</button>
            </div>
            <hr>
        </div>

        
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
<?php include_once 'footer.php';?>
