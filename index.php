<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

//login 
if (isset($_POST['login'])) {
  $admin_email = $_POST['admin_email'];
  $admin_password = $_POST['admin_password']; //double encrypt to increase security
  $stmt = $mysqli->prepare("SELECT admin_email, admin_password, admin_id  FROM admin WHERE (admin_email =? AND admin_password =?)"); //sql to log in user
  $stmt->bind_param('ss',$admin_email, $admin_password); //bind fetched parameters
  $stmt->execute(); //execute bind 
  $stmt->bind_result($admin_email, $admin_password, $admin_id); //bind result
  $rs = $stmt->fetch();
  $_SESSION['admin_id'] = $admin_id;
  
  if ($rs) {
    //if its sucessfull
	
    header("location:dashboard.php");
  } else {
    $err = "Incorrect Authentication Credentials ";
  }
}

require_once('partials/_head.php');
?>

    <!-- <script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->
<body class="bg-dark">
    <div class="main-content">
    <div class="header bg-gradient-white py-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                   
                    <div class="row justify-content-center">
                        <!-- Move the h1 tag inside the col-lg-5 col-md-7 div -->
                        <div class="col-lg-5 col-md-7">
                            <div class="card bg-secondary shadow border-50">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <!-- Align the text horizontally -->
                                    <h1 class="text-center text-black">Network Layout Assessment System</h1>
                                    <!-- Form starts here -->
                                    <form method="post" role="form">
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control" required name="admin_email" placeholder="Email"
                                                    type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input class="form-control" required name="admin_password"
                                                    placeholder="Password" type="password">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="login" class="btn btn-primary btn-block">Log In</button>
                                        </div>
                                        <hr class="my-4">

                                        <div class="text-center">
                                            <p class="mb-0">Don't have an account? <a href="add_user.php">Sign Up</a></p>
                                        </div>
                                    </form>

                             
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div><br>
                        <!-- Footer -->
    <?php require_once('partials/_footer.php'); ?>
                </div>
                
                
            </div>
            
        </div>
        
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">

                </div>
            </div>
        </div>
    </div>

    <!-- Argon Scripts -->
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>
