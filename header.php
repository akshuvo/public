<?php require_once 'functions.php'; ?>
<?php
if ( isset( $_GET['logout'] ) && $_GET['logout'] == 'true' ) {

	// Initialize the session
	if ( session_status() === PHP_SESSION_NONE ) {
	    session_start();
	}

	// Unset all of the session variables
	$_SESSION = array();
	 
	// Destroy the session.
	session_destroy();
	 
	// Redirect to login page
	header("location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helping Wall</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>

<!-- Start Header -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="javascript:void(0)">HW</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Link</a>
                </li>
            </ul>

            <?php if( is_logged_in() ) : ?>
	            <div class="dropdown text-end">
			        <a href="#" class="d-flex link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
			        	<span class="align-items-center bg-body d-flex h6 justify-content-center m-0 p-1 rounded-circle" style=" width: 30px; height: 30px; ">M</span>
			        </a>
			        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
			          	<li><a class="dropdown-item" href="#">New project...</a></li>
			          	<li><a class="dropdown-item" href="#">Settings</a></li>
			          	<li><a class="dropdown-item" href="#">Profile</a></li>
			          	<li><hr class="dropdown-divider"></li>
			          	<li><a class="dropdown-item" href="?logout=true">Sign out</a></li>
			        </ul>
		        </div>
		    <?php else : ?>
		    	<div class="text-end">
	                <a href="login.php" class="btn btn-outline-light me-2">Login</a>
	                <a href="signup.php" class="btn btn-warning">Sign-up</a>
	            </div>
		    <?php endif; ?>

        </div>
    </div>
</nav>
<!-- Start Footer -->