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
    // $admin_password = $_POST['admin_password']; //Hash This   
    $usertype = $_POST['usertype'];
    // $profileImage = $_FILES['profileImage']['name'];
    // move_uploaded_file($_FILES["profileImage"]["tmp_name"], "assets/img/profile/" . $_FILES["profileImage"]["name"]);

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
    
    //hash the password 
    $password_hash = password_hash($_POST["admin_password"], PASSWORD_DEFAULT);
    //Insert Captured information to a database table
    $postQuery = "INSERT INTO admin (admin_id, admin_name, admin_email, admin_password, usertype) VALUES(?,?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('sssss', $admin_id, $admin_name, $admin_email, $password_hash, $usertype);
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

<?php
    $length = 6;
    $alpha= substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM"),1,$length);
    $ln = 6;
    $beta = substr(str_shuffle("1234567890"),1,$length);
?>
  <style>
@font-face {
    font-family: 'Blanka';
    font-style: normal;
    font-weight: 400;
    src: local('Blanka'), url('https://fonts.cdnfonts.com/s/18915/Blanka-Regular.woff') format('woff');
}
.btn{
  width: 22.5em; 
  border-radius: 25px; 
  color: white; 
  background-color: #7ED957;
  font-family: 'Montserrat';
}
.nlas{
  font-family: 'Blanka', Poppins; 
  position: relative; 
  margin-top: -0.15em; 
  left: 4.26em; 
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
</style>
</style>

  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <body class="bg-image">
        
      <div><img src="assets/img/brand/LogoIndex.png" style="position: relative; margin-top: 14.8em; left: 33.6em; 
      color: white; width: 120px; height: 120px;"></div>
        
        <div class="nlas">Network Layout<br>Assessment System</div>

        <div class="text" style="position: absolute; top: 0.7em; left: 7%; color: white; font-size: 20px; font-family: 'Montserrat'; 
        font-weight: bold;">Sign Up</div>

      <div class="align-items-center" style="position: absolute; top: 0; left: 0; 
      background-color: transparent; width: 351px; height: 374px; border-radius: 25px;"></div>

        <form class="card border-white w-400 p-3 form-style" method="POST" enctype="multipart/form-data" style="position: relative; background-color: #161B22; 
        border-radius: 25px; width: 351px; margin-top: -22em; left: 174%">

          <h4 class="display" style="font-family:'Montserrat'; color: white; font-size: 20px; margin-bottom: -10px; margin-top:10px;">Create Account</h4><br>

          <input type="hidden" name="admin_id" value="<?php echo $alpha; ?>-<?php echo $beta;?>"class="form-control">

          <div class="mb-1">
          <div class="input-group input-group-alternative" style="border-radius: 20px;">
            <div class="input-group-prepend">
              <span class="input-group-text" style="background-color: black; height: 46px;"><i class="ni ni-single-02"></i></span>
            </div>
            <input type="text" name="admin_name" class="form-control" value="" placeholder="Create Username" style="margin-bottom: 15px; background-color: black;">
          </div>

          <div class="mb-1">
          <div class="input-group input-group-alternative" style="border-radius: 25px;">
            <div class="input-group-prepend">
              <span class="input-group-text" style="background-color: black; height: 46px;"><i class="ni ni-email-83"></i></span>
            </div>
          <input type="email" name="admin_email" class="form-control" value="" placeholder="Enter Email" pattern=".+.co|.+.edu.+.|.+.com" style="margin-bottom: 15px; background-color: black;">
          </div>

          <div class="mb-4">
          <div class="input-group input-group-alternative" style="border-radius: 25px;">
            <div class="input-group-prepend">
              <span class="input-group-text" style="background-color: black; height: 46px;"><i class="ni ni-lock-circle-open"></i></span>
            </div>
            <input type="password" name="admin_password" class="form-control" value="" placeholder="Create Password" style="margin-bottom: 15px; background-color: black;">
          </div>
          <input type="hidden" name="usertype" value="user">
          <button type="submit" name="adduser"class="btn btn-success">Sign Up</button>
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