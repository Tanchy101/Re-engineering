<?php
// $email = $_GET["email"];

// $mysqlis = require __DIR__ . "../config/config.php";

// $sql = "SELECT * FROM admin
//         WHERE admin_email = ?";

// $stmt = $mysqli->prepare($sql);
// $stmt->bind_param('s', $admin_email);
// $stmt->execute();

// $result = $stmt->get_result();

// while($user = $result->fetch_object()){
// if ($user === null) {
//     var_dump($user);
//     die("email not found");
    
//     }
// } 
// $lengthErr = "";
// $matchErr = "";
// if(isset($_POST['sub'])){
   

//     if (strlen($_POST["password"]) < 8) {
//         $lengthErr = "Password must be at least 8 characters";
//     }

//     if ($_POST["password"] !== $_POST["password_confirmation"]) {
//         $matchErr = "Passwords must match";
//     }    
//     else{
//         header("process-reset-pass.php");
//     }
// }

?>
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>

    <center>
        <form  method="post" action="process-reset-pass.php">
            <h1>Reset Password</h1>
            <input type="hidden" name="emailReset" value="">

            <label for="password">New password</label>
            <input required type="password" id="password" name="password">
            <span style="color: red;"></span><br>
            <label for="password_confirmation">Repeat password</label>
            <input required type="password" id="password_confirmation"
                name="password_confirmation">
            <span style="color: red;"></span><br>

            <button type="submit" name="sub">Send</button>
        </form>
    </center>
    

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> -->

<?php

include('config/config.php');

$email = $_GET["email"];

$mysqlis = require __DIR__ . "../config/config.php";

$sql = "SELECT * FROM admin
        WHERE admin_email = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $admin_email);
$stmt->execute();

$result = $stmt->get_result();

while($user = $result->fetch_object()){
if ($user === null) {
    var_dump($user);
    die("email not found");
    
    }
} 
$lengthErr = "";
$matchErr = "";
if(isset($_POST['sub'])){
   

    if (strlen($_POST["password"]) < 8) {
        $lengthErr = "Password must be at least 8 characters";
    }

    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        $matchErr = "Passwords must match";
    }else{
        header("location: process-reset-pass.php");
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
        font-weight: bold;">Password Reset</div>

            <div class="container" style="position: relative; margin-top: 16.5em; margin-left: 20em; width: 345px;">
                <div class="header-body text-center mb-7">
                    <div class="col">
                        <!-- Move the h1 tag inside the col-lg-5 col-md-7 div -->
                        <div class="col-lg-0 col-md-0">
                            <div class="card bg-secondary shadow border-10" style="border-radius: 20px; margin-bottom: 20px; width: 351px;">
                                <div class="card-body" style="position: relative; top: 0; left: 0; background-color: #161B22; border-radius: 20px; width: 349px;">
                                    <!-- Align the text horizontally -->
                                    <h1 class="text-black" style="display: flex; font-size: 20px; text-align: left; margin-bottom: 15px; color: white; font-family: Montserrat;">Enter new password</h1>
                                    <!-- Form starts here -->
                                    <form action="" method="post"  enctype="multipart/form-data">
                                        <input type="hidden" name="emailReset" value="<?= $email ?>">
                                        <div class="form-group mb-3" style = "height: 11em;">
                                            <div class="input-group input-group-alternative" style="border-radius: 25px;">
                                                <span style="color: red; font-size: px;"><?php echo $lengthErr ?></span>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="background-color: black;"><i class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input class="form-control" value= "" placeholder="Enter New Password" 
                                                    type="password" style="background-color: black;" name="password">
                                                    
                                            </div>
                                            <br>
                                            <span style="color: red;"><?php echo $matchErr ?></span>
                                            <div class="input-group input-group-alternative" style="border-radius: 25px;">
                                                
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="background-color: black;"><i class="ni ni-lock-circle-open"></i></span>
                                                </div>

                                                <input class="form-control" value= "" placeholder="Repeat Password" 
                                                    type="password" style="background-color: black;" name="password_confirmation">
                                                    
                                            </div>

                                            </div>

                                            
                                           
                                        <div class="text-center">
                                            <button type="submit" name="sub" class="btn btn-success">Send</button>
                                            
                                        </div>
                                        
                                    </form>

                                    <!-- code para sa pagsend ng email-->
                                    <!-- <form action="process-reset-pass.php" method="post"  enctype="multipart/form-data">
                                        <input type="hidden" name="emailReset" value="<?//= $email ?>">
                                        <div class="form-group mb-3" style = "height: 11em;">
                                            <div class="input-group input-group-alternative" style="border-radius: 25px;">
                                                <span style="color: red; font-size: px;"><?php //echo $lengthErr ?></span>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="background-color: black;"><i class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input class="form-control" value= "" placeholder="Enter New Password" 
                                                    type="password" style="background-color: black;" name="password">
                                                    
                                            </div>
                                            <br>
                                            <span style="color: red;"><?php //echo $matchErr ?></span>
                                            <div class="input-group input-group-alternative" style="border-radius: 25px;">
                                                
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="background-color: black;"><i class="ni ni-lock-circle-open"></i></span>
                                                </div>

                                                <input class="form-control" value= "" placeholder="Repeat Password" 
                                                    type="password" style="background-color: black;" name="password_confirmation">
                                                    
                                            </div>

                                            </div>

                                            
                                           
                                        <div class="text-center">
                                            <button type="submit" name="sub" class="btn btn-success">Send</button>
                                            
                                        </div>
                                        
                                    </form> -->
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
