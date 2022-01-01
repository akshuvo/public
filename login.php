<?php include_once 'header.php';?>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
     
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label><input type="checkbox" value="remember-me"> Remember me</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
          <hr class="my-4">
          <a class="small text-muted" href="#!">Forgot password?</a>
          <p style="color: #393f81;">Don't have an account? <a href="signup.php" style="color: #393f81;">Register here</a></p>
        </form>
      </div>
    </div>
  </div>
<?php include_once 'footer.php';?>

