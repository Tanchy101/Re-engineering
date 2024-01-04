<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

require 'vendor/autoload.php';

require 'scriptMailer.php';
    if(isset($_POST['submit'])){
        
        if(empty($_POST['forgotPassEmail'])){
            $response = "Field is empty!";
        }else{
            $response = sendMail($_POST['forgotPassEmail']);
        }
    }

require_once('partials/_head.php');
?>

<style>
@font-face {
    font-family: 'Blanka';
    font-style: normal;
    font-weight: 400;
    src: local('Blanka'), url('https://fonts.cdnfonts.com/s/18915/Blanka-Regular.woff') format('woff');
}

.btn{
    border-radius: 25px;
    background-color: #7ED957; 
    font-family: 'Montserrat';
    font-weight: bold;
    color: white;
    width: 21em;
}
.nlas{
    font-family: 'Blanka' !important;
    position: relative; 
    margin-top: 5.34em; 
    left: 2.41em; 
    color: white; 
    font-size: 65px; 
    text-align: center;
}
.bg-image{
    display: flex; 
    background-image: url('assets/img/brand/Index BG.png'); 
    background-size: cover; 
    height: 100vh;"
}

.error{
   margin-top: 30px;
   color: #af0c0c;
}
 
.success{
   margin-top: 30px;
   color: green;
}
</style>


<!-- wag pi <script>
>>>>>>> Stashed changes
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->



<body class="bg-image">
    
    <div>
    <img src="assets/img/brand/LogoIndex.png" class="logoindex" style="position: relative; margin-top:14.8em; left: 448%; color: white; 
    width: 120px; height: 120px;"></div>

    <div class="nlas" >Network Layout<br>Assessment System</div>

        <div class="text" style="position: absolute; margin-top: 0.7em; left: 3%; color: white; font-size: 40px; font-family: 'Montserrat'; 
        font-weight: bold;">Forgot Password</div>

            <div class="container" style="position: relative; margin-top: 14em; margin-left: 20em; width: 345px;">
                <div class="header-body text-center mb-7">
                    <div class="col">
                        <!-- Move the h1 tag inside the col-lg-5 col-md-7 div -->
                        <div class="col-lg-0 col-md-0">
                            <div class="card bg-secondary shadow border-10" style="border-radius: 20px; margin-bottom: 20px; width: 351px;">
                                <div class="card-body" style="position: relative; top: 0; left: 0; background-color: #161B22; border-radius: 20px; width: 349px;">
                                    <!-- Align the text horizontally -->
                                    <h1 class="text-black" style="display: flex; font-size: 20px; text-align: left; margin-bottom: 15px; color: white; font-family: Montserrat;">Enter Your Existing Email</h1>
                                    <!-- Form starts here -->
                                    <form action="" method="post"  enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative" style="border-radius: 25px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="background-color: black;"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control" value= "" placeholder="Enter Email" pattern=".+.co|.+.edu.+.|.+.com"
                                                    type="email" style="background-color: black;" name="forgotPassEmail">
                                            </div>
                                            </div>
                                           
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-success">Send</button>
                                            <?php
                                                if(@$response == "success"){
                                                    ?>
                                                        <p class="success">Email send successfully</p>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <p class="error"><?php echo @$response; ?></p>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <hr class="my-3">
                                        <div class="text-center" style="margin-top: 10px;">
                                            <p class="mb-0" style="color: white">Already have an account? <a href="index.php" style="color: #37D5F2; font-weight: bold;">Sign In</a></p>
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
