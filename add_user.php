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

    <!-- Top navbar -->

    <body>
    <style>
  .form-container {
    background-color: #f8f9fa;
    padding: 20px;
    border: 1px solid #ced4da;
  }

  .form-style {
    padding: 20px;
    border: 1px solid #ced4da;
  }
</style><body>
<?php
    $length = 6;
    $alpha= substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM"),1,$length);
    $ln = 6;
    $beta = substr(str_shuffle("1234567890"),1,$length);
?>

  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <body>
      <div class="d-flex justify-content-center align-items-center vh-100 form-container" style="margin-bottom: 50px; margin-top: 100px;">
        <form class="shadow w-450 p-3 form-style" method="POST" enctype="multipart/form-data">
          <h4 class="display-4 fs-1">Create Account</h4><br>

          <input type="hidden" name="admin_id" value="<?php echo $alpha; ?>-<?php echo $beta;?>"class="form-control">
          <div class="mb-3">
            <label>Username:</label>
            <input type="text" name="admin_name" class="form-control" value="">
          </div>
          <div class="mb-3">
          <label>Email:</label>
          <input type="email" name="admin_email" class="form-control" value="">
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="admin_password" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file" class="form-control" name="profileImage">
          </div>

          <button type="submit" name="adduser"class="btn btn-primary" style="width: 300px;">Sign Up</button>
        </form>
      </div>
    </body>
    <!-- Footer -->
    <?php
    require_once('partials/_footer.php');
    ?>
  </div>
</div>
<!-- Argon Scripts -->
<?php
require_once('partials/_scripts.php');
?>
    </body>
    <!-- Footer -->
    <?php
    require_once('partials/_footer.php');
    ?>
  </div>
</div>
<!-- Argon Scripts -->
<?php
require_once('partials/_scripts.php');
?>
</body>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>