<?php include_once 'header.php';?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
    </div>
</div>

<div class="d-flex dashboard-stats flex-wrap">
    <div class="toast show me-4 mb-4">
        <div class="toast-header strong">
            Total Donations
        </div>
        <div class="toast-body">
            <h2 class="m-0">120</h2>
        </div>
    </div>
    <div class="toast show me-4 mb-4">
        <div class="toast-header strong">
            Active Donations
        </div>
        <div class="toast-body">
            <h2 class="m-0">120</h2>
        </div>
    </div>

    <div class="toast show me-4 mb-4">
        <div class="toast-header strong">
            Pending Approval
        </div>
        <div class="toast-body">
            <h2 class="m-0">140</h2>
        </div>
    </div>

    <div class="toast show me-4 mb-4">
        <div class="toast-header strong">
            Pending Handover
        </div>
        <div class="toast-body">
            <h2 class="m-0">140</h2>
        </div>
    </div>

    <div class="toast show me-4 mb-4">
        <div class="toast-header strong">
            Total Donors
        </div>
        <div class="toast-body">
            <h2 class="m-0">110</h2>
        </div>
    </div>

    <div class="toast show me-4 mb-4">
        <div class="toast-header strong">
            Total Requests
        </div>
        <div class="toast-body">
            <h2 class="m-0">50</h2>
        </div>
    </div>
</div>  

<div class="dashboard-big-cards pt-5">
    <div class="row">
        <div class="col-md-5">
            <div class="card mb-5">
                <div class="card-header">
                    <h6 class="mt-2">Recent Customers</h6>
                </div>
                <div class="card-body">
                    <div class="similar-donations">
                        
                        <!-- Start Single Donation Small Grid -->
                        <div class="card mb-3 position-relative">
                            <div class="row g-0">
                                <div class="col-md-2">
                                    <img src="https://www.w3schools.com/bootstrap5/img_avatar3.png" class="d-block h-100 w-100">
                                </div>
                                <div class="col-md-9 ">
                                    <div class="card-body">
                                        <h6 class="card-title">John Doe</h6>
                                        <div class="card-text text-muted d-flex">
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
                                <div class="col-md-2">
                                    <img src="https://www.w3schools.com/bootstrap5/img_avatar2.png" class="d-block h-100 w-100">
                                </div>
                                <div class="col-md-9 ">
                                    <div class="card-body">
                                        <h6 class="card-title">John Doe</h6>
                                        <div class="card-text text-muted d-flex">
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
                                <div class="col-md-2">
                                    <img src="https://www.w3schools.com/bootstrap5/img_avatar3.png" class="d-block h-100 w-100">
                                </div>
                                <div class="col-md-9 ">
                                    <div class="card-body">
                                        <h6 class="card-title">John Doe</h6>
                                        <div class="card-text text-muted d-flex">
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
        </div>

        <div class="col-md-7">
            <div class="card mb-5">
                <div class="card-header">
                    <h6 class="mt-2">Donations by dates</h6>
                </div>
                <div class="card-body">
                    <img src="<?php echo home_url(); ?>/uploads/stats.png" class="d-block h-100 w-100">
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card mb-5">
                <div class="card-header">
                    <h6 class="mt-2">Recent Donations</h6>
                </div>
                <div class="card-body">
                    <div class="similar-donations">
                        <?php
                        // Get doncations
                        $donations = dbconn()->get_results("SELECT id, title, type, qty, status, is_active, location, country, state, latitude, longitude, user_id, images, dated FROM Donations WHERE 1=1 ORDER BY id DESC LIMIT 4");

                        if( !empty( $donations ) ) : ?>

                            <?php foreach(  $donations as $row ) : 

                                // Donation default args
                                $defaults_args = get_donation_default_args();

                                // Parse args
                                $args = hw_parse_args($row, $defaults_args); 

                                get_template_part('donation-content-sm.php', $args);
                                ?>
                                
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card mb-5">
                <div class="card-header">
                    <h6 class="mt-2">Requests by dates</h6>
                </div>
                <div class="card-body">
                    <img src="<?php echo home_url(); ?>/uploads/stats.png" class="d-block h-100 w-100">
                </div>
            </div>
        </div>

    </div>  
</div>
<?php include_once 'footer.php';?>