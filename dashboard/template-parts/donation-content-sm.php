<?php
/**
 * Donation List Content
 */

// Get images
$get_images = hw_get_images( $args['images'] );
?>
<!-- Start Single Donation Small Grid -->
<div class="card mb-3 position-relative">
    <div class="row g-0">
        <div class="col-md-3">
            <?php if( !empty( $args['images'] ) ) : ?>
                <div id="carouselExampleControls-<?php echo $args['id']; ?>" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach( $get_images as $key => $val ) : ?>
                            <div class="carousel-item <?php echo $key == "0" ? ' active ' : ' ';  ?>">
                                <img src="<?php echo home_url('/') . $val['url']; ?>" class="obfit-contain d-block w-100" height="95">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev text-dark" type="button" data-bs-target="#carouselExampleControls-<?php echo $args['id']; ?>" data-bs-slide="prev"><i class="bi bi-chevron-left"></i></button>
                    <button class="carousel-control-next text-dark" type="button" data-bs-target="#carouselExampleControls-<?php echo $args['id']; ?>" data-bs-slide="next"><i class="bi bi-chevron-right"></i></button>
                </div>
            <?php else: ?>
                <img class="no-image-found" src="<?php echo home_url() . 'assets/img/no-image-found.png';?>" height="95">
            <?php endif; ?>
        </div>
        <div class="col-md-9 ">
            <div class="card-body">
                <h5 class="card-title"><?php echo esc_html( $args['title'] ); ?></h5>
                <div class="card-text text-muted d-flex">
                    <small class="me-3 whs-nowrap"><i class="bi bi-record-circle"></i> <?php echo esc_html( $args['type'] . ' Qty: ' . $args['qty'] ); ?></small>
                    <small class="text-truncate"><i class="bi bi-geo-alt"></i> <?php echo esc_html( $args['state'] . ', ' . $args['country'] ); ?></small>
                </div>
            </div>
        </div>
        <?php if( function_exists('is_admin') && is_admin() ): ?>
            <div class="action-btns bottom-0 position-absolute end-0">
                <a class="small " href="<?php echo home_url('dashboard/new-donation.php'); ?>?id=<?php echo $args['id']; ?>">Edit</a>
                <a class="small " target="_blank" href="<?php echo home_url('view-donation.php'); ?>?id=<?php echo base64_encode($args['id']); ?>">View</a>
                <a class="small delete-confirm" href="?action=donation-delete&id=<?php echo $args['id']; ?>">Delete</a>
            </div>
        <?php else: ?>
            <div class="action-btns bottom-0 position-absolute end-0 text-end">
                <a class="small " target="_blank" href="<?php echo home_url('view-donation.php'); ?>?id=<?php echo base64_encode($args['id']); ?>">View</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- End Single Donation Small Grid -->