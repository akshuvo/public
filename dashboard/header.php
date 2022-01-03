<?php require_once '../functions.php'; ?>
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
	header("location: " . home_url() );
	exit;
}

// Check if the user is already logged in, if yes then redirect him to welcome page
if( !is_logged_in() ){
    header("location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helping Wall</title>
    <link rel="stylesheet" href="<?php echo home_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo home_url('assets/font/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo home_url('assets/css/dashboard.css'); ?>">
</head>
<body class="<?php echo get_body_classes(); ?>">

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  	<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">Helping Wall</a>
  
	<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	</button>

  	<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

	<div class="navbar-nav">
	    <div class="nav-item text-nowrap">
	      <a class="nav-link px-3" href="<?php echo home_url(); ?>"><i class="bi bi-link"></i> Visit site</a>
	    </div>
	</div>

  	<div class="dropdown text-end">
	    <a href="#" class="d-flex link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
	    	<span class="align-items-center bg-body d-flex h6 justify-content-center m-0 p-1 rounded-circle" style=" width: 30px; height: 30px; "><?php echo get_avatar(); ?></span>
	    </a>
	    <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser1" style="">
	    	<li><h5 class="dropdown-header"><?php echo get_welcome_message(); ?></h5></li>
			<li><a class="dropdown-item" href="<?php echo home_url('dashboard/my-items.php'); ?>">My Items</a></li>
			<li><a class="dropdown-item" href="<?php echo home_url('dashboard/add-new.php'); ?>">Add New Item</a></li>
			<li><a class="dropdown-item" href="<?php echo home_url('dashboard/profile.php'); ?>">Profile</a></li>
	      	<li><hr class="dropdown-divider"></li>
	      	<li><a class="dropdown-item" href="?logout=true">Sign out</a></li>
	    </ul>
	</div>

</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              My Donates
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Add New
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Donation Requests
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li> -->
        </ul>

        <hr>

        <!-- 
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>

        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
        -->
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">