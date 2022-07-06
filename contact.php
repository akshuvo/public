<?php include_once 'header.php'; ?>
<?php
$errors = '';

// Current User Data
$current_user = current_user();
$current_user = hw_parse_args($current_user, get_user_db_default_args());
?>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-md-10 mx-auto col-lg-8">

            <?php if( !empty( $errors ) ) : ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Error:</strong> Something went wrong, please check the informations again.
                </div>
            <?php endif; ?>

            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Send a message to us</h3>
                </div>
                <form method="post">
                    <div class="card-body">

                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputFullName" type="text" name="full_name" placeholder="Enter your full name" value="<?php echo esc_html( $current_user['full_name'] ); ?>" required>
                            <label for="inputFullName">Your Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputFullName" type="email" name="email" placeholder="Enter your full name" value="<?php echo esc_html( $current_user['email'] ); ?>" required>
                            <label for="inputFullName">Email Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputFullName" type="tel" name="phone" placeholder="Enter your full name" value="<?php echo esc_html( $current_user['phone'] ); ?>" required>
                            <label for="inputFullName">Phone</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="inputMsg"  name="message" style=" min-height: 200px; " required></textarea>
                            <label for="inputMsg">Your Message</label>
                        </div>

                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Send</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>

