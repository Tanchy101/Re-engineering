<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

//login 
if (isset($_POST['login'])) {
  $admin_email = $_POST['admin_email'];
  $admin_password = $_POST['admin_password']; //double encrypt to increase security
  

  $stmt = $mysqli->prepare("SELECT admin_id, usertype  FROM admin WHERE (admin_email =? AND admin_password =?)"); //sql to log in user
  $stmt->bind_param('ss',$admin_email, $admin_password); //bind fetched parameters
  $stmt->execute(); //execute bind 
  $stmt->bind_result($admin_id, $usertype); //bind result into the variables
  $rs = $stmt->fetch(); // returns whether true or not
  $_SESSION['admin_id'] = $admin_id;
  
  //check if the field usertype is a user
  if ($usertype == "user") {
    //if its sucessfull
    header("location:dashboard.php");
// check if the field usertype is admin
  } else if($usertype == "admin"){
    header("location:admin.php");
  } 
  
  else {
    $err = "Incorrect Authentication Credentials ";
  }
}

require_once('partials/_head.php');
?>
<style>
@font-face {
    font-family: "Blanka-Regular";
    src: url("https://db.onlinewebfonts.com/t/8cdbb48678e4418f22a2f507c2b975bd.eot");
    src: url("https://db.onlinewebfonts.com/t/8cdbb48678e4418f22a2f507c2b975bd.eot?#iefix")format("embedded-opentype"),
    url("https://db.onlinewebfonts.com/t/8cdbb48678e4418f22a2f507c2b975bd.woff2")format("woff2"),
    url("https://db.onlinewebfonts.com/t/8cdbb48678e4418f22a2f507c2b975bd.woff")format("woff"),
    url("https://db.onlinewebfonts.com/t/8cdbb48678e4418f22a2f507c2b975bd.ttf")format("truetype"),
    url("https://db.onlinewebfonts.com/t/8cdbb48678e4418f22a2f507c2b975bd.svg#Blanka-Regular")format("svg");
}
</style>

<!-- wag pi <script>
>>>>>>> Stashed changes
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->



<body class="bg-image" style="display: flex; overflow: hidden; background-image: url('assets/img/brand/Index BG.png'); background-size: cover">
    <img src="assets/img/brand/LogoIndex.png" class="logoindex" style="position: fixed; top: 32%; left: 35%; color: white; width: 120px; height: 120px;">
    <div class="nlas" style="font-family: 'Blanka-Regular'; position: fixed; top: 47%; left: 18%; color: white; 
    font-size: 65px; text-align: center;">Network Layout<br>Assessment System</div>
        <div class="text" style="position: fixed; top: 2%; left: 3%; color: white; font-size: 20px; font-family: 'Montserrat'; font-weight: bold;">Log In</div>
            <div class="container" style="position: fixed; top: 30%; left: 70%; width: 345px;">
                <div class="header-body text-center mb-7">
                    <div class="col">
                        <!-- Move the h1 tag inside the col-lg-5 col-md-7 div -->
                        <div class="col-lg-0 col-md-0">
                            <div class="card bg-secondary shadow border-10" style="border-radius: 20px; margin-bottom: 20px; width: 351px;">
                                <div class="card-body" style="position: relative; top: 0; left: 0; background-color: #161B22; border-radius: 20px; width: 349px;">
                                    <!-- Align the text horizontally -->
                                    <h1 class="text-black" style="display: flex; font-size: 20px; text-align: left; margin-bottom: 15px; color: white; font-family: Montserrat;">Log in</h1>
                                    <!-- Form starts here -->
                                    <form method="post" role="form">
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative" style="border-radius: 25px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="background-color: black;"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control" required name="admin_email" placeholder="Enter Email"
                                                    type="email" style="background-color: black;">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="background-color: black;"><i class="ni ni-lock-circle-open"></i></span>
                                                    </div>
                                                    <input class="form-control" required name="admin_password"
                                                        placeholder="Enter Password" type="password" style="background-color: black;">

                                                </div>
                                                </div>
                                        <div class="text-center">
                                            <button style="border-radius: 25px; background-color: #7ED957; font-family: 'Montserrat'; font-weight: bold; color: white;" type="submit" name="login" class="btn btn-block">Log In</button>
                                        </div>
                                        <hr class="my-3">
                                        <div class="text-center" style="margin-top: 10px;">
                                            <p class="mb-0" style="color: white">Don't have an account? <a href="add_user.php" style="color: #37D5F2; font-weight: bold;">Sign Up</a></p>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div><br>
                
        <!-- Footer -->
        <?php require_once('partials/_FooterIndex.php'); ?>
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
