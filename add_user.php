<?php
session_start();
include('config/config.php');
include('config/codegenerator.php');
//Add user
if (isset($_POST['adduser'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["admin_id"]) || empty($_POST["admin_name"]) || empty($_POST['admin_email']) || empty($_POST['admin_password'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $admin_id = $_POST['admin_id'];
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password']; //Hash This   
    $profileImage = $_FILES['profileImage']['name'];
    move_uploaded_file($_FILES["profileImage"]["tmp_name"], "assets/img/profile/" . $_FILES["profileImage"]["name"]);

    $sql = "SELECT * FROM admin WHERE admin_name='$admin_name'";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();

    if (mysqli_num_rows($res) > 0) {
      $err ="Username Taken Please Try Again";
    }else{


    $sql = "SELECT * FROM admin WHERE admin_email='$admin_email'";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();

    if (mysqli_num_rows($res) > 0) {
      $err ="Email Taken Please Try Again";
    }else{

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO admin (admin_id, admin_name, admin_email, admin_password, profileImage) VALUES(?,?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('sssss', $admin_id, $admin_name, $admin_email, $admin_password, $profileImage);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "User Added" && header("refresh:1; url=index.php");
    } else {
      $err = "Please Try Again Or Try Later";
      }
     }
    }
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

<?php
    $length = 6;
    $alpha= substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM"),1,$length);
    $ln = 6;
    $beta = substr(str_shuffle("1234567890"),1,$length);
?>

  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <body class="bg-image" style="display: flex; overflow: hidden; background-image: url('assets/img/brand/Index BG.png'); background-size: cover;">
        <img src="assets/img/brand/LogoIndex.png" class="logoindex" style="position: fixed; top: 32%; left: 35%; color: white; width: 120px; height: 120px;">
        <div class="nlas" style="font-family: 'Blanka-Regular'; position: fixed; top: 47%; left: 18%; color: white; 
        font-size: 65px; text-align: center;">Network Layout<br>Assessment System</div>

        <div class="text" style="position: fixed; top: 2%; left: 3%; color: white; font-size: 20px; font-family: 'Montserrat'; 
        font-weight: bold;">Sign Up</div>

      <div class="align-items-center" style="position: absolute; top: 0; left: 0; 
      background-color: transparent; width: 351px; height: 374px; border-radius: 25px;"></div>

        <form class="card border-white w-400 p-3 form-style" method="POST" enctype="multipart/form-data" style="position: fixed; background-color: #161B22; 
        border-radius: 25px; width: 351px; top: 24%; left: 72%">

          <h4 class="display" style="font-family:'Montserrat'; color: white; font-size: 20px; margin-bottom: -10px; margin-top:10px;">Create Account</h4><br>

          <input type="hidden" name="admin_id" value="<?php echo $alpha; ?>-<?php echo $beta;?>"class="form-control">

          <div class="mb-1">
          <div class="input-group input-group-alternative" style="border-radius: 20px;">
            <div class="input-group-prepend">
              <span class="input-group-text" style="background-color: black; height: 46px;"><i class="ni ni-email-83"></i></span>
            </div>
            <input type="text" name="admin_name" class="form-control" value="" placeholder="Create Username" style="margin-bottom: 15px; background-color: black;">
          </div>

          <div class="mb-1">
          <div class="input-group input-group-alternative" style="border-radius: 25px;">
            <div class="input-group-prepend">
              <span class="input-group-text" style="background-color: black; height: 46px;"><i class="ni ni-email-83"></i></span>
            </div>
          <input type="email" name="admin_email" class="form-control" value="" placeholder="Enter Email" style="margin-bottom: 15px; background-color: black;">
          </div>

          <div class="mb-4">
          <div class="input-group input-group-alternative" style="border-radius: 25px;">
            <div class="input-group-prepend">
              <span class="input-group-text" style="background-color: black; height: 46px;"><i class="ni ni-lock-circle-open"></i></span>
            </div>
            <input type="password" name="admin_password" class="form-control" value="" placeholder="Create Password" style="margin-bottom: 15px; background-color: black;">
          </div>
          
          <button type="submit" name="adduser"class="btn" style="width: 317px; border-radius: 25px; color: white; background-color: #7ED957;
          font-family: 'Montserrat';">Sign Up</button>
            <hr class="my-3">
            <div class="text-center" style="margin-top: 10px;">
                <p class="mb-0" style="color: white">Already Signed? <a href="index.php" style="color: #37D5F2; font-weight: bold;">Log In</a></p>
            </div>
        </form>
      </div>
    </body>
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