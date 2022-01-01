<?php include_once 'header.php';?>
<?php 
// Check if the user is already logged in, if yes then redirect him to welcome page
if( is_logged_in() ){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if( isset( $_SERVER["REQUEST_METHOD"] ) && $_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Check if username is empty
    if ( isset( $_POST["email"] ) && empty( trim( $_POST["email"] ) ) ){
        $username_err = "Please enter username.";
    } else{
        $username = trim( $_POST["email"] );
    }
    
    // Check if password is empty
    if ( isset( $_POST["password"] ) && empty( trim( $_POST["password"] ) ) ) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim( $_POST["password"] );
    }
    
    // Validate credentials
    if( empty( $username_err ) && empty( $password_err ) ){
     
        $query = $mysqli->query( "SELECT id, email, password FROM Users WHERE email = '$username'" );
        $get_users = $query->fetch_assoc();
       
        if( $query->num_rows > 0 ){
            
            // Get hased password from db
            $hashed_password = isset( $get_users['password'] ) ? $get_users['password'] : '';
            
            // Verify
            if( md5( $password ) == $hashed_password ) {

                // Initialize the session
                if ( session_status() === PHP_SESSION_NONE ) {
                    session_start();
                }

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["current_user_id"] = $get_users['id'];
                
                // Redirect user to welcome page
                header("location: welcome.php");
                     
            } else{
                // Username doesn't exist, display a generic error message
                $login_err = "Invalid username or password.";
            }
          
        } else{
            // Error msg
            $login_err = "Invalid username or password.";
        }
    } else{
        // Error msg
        $login_err = "Invalid username or password.";
    }
    
    // Close connection
    $mysqli->close();
}
?>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
     
      <div class="col-md-10 mx-auto col-lg-5">

        <?php if( !empty( $login_err  ) ) : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error:</strong> <?php echo $login_err; ?>
            </div>
        <?php endif; ?>

        <form class="p-4 p-md-5 border rounded-3 bg-light" method="post">

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo trim( $username ); ?>" required>
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label><input type="checkbox" name="remember" value="1"> Remember me</label>
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

