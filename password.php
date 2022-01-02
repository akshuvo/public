<?php include_once 'header.php'; ?>
<?php
// Initial error message
$error_msg = '';
?>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
     
        <div class="col-md-10 mx-auto col-lg-5">

            <?php if( !empty( $error_msg  ) ) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Error:</strong> <?php echo $error_msg; ?>
                </div>
            <?php endif; ?>

            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                </div>
                
                <div class="card-body">
                    <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input name="email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small" href="login.php">Return to login</a>
                            <button class="btn btn-primary" type="submit">Reset Password</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center py-3">
                    <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>