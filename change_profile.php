
<!DOCTYPE html>


<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

// Update Profile
if (isset($_POST['ChangeProfile'])) {
  $admin_id = $_SESSION['admin_id'];
  $admin_name = $_POST['admin_name'];
  $admin_email = $_POST['admin_email'];
  $bio = $_POST['bio'];
  $profileImage = $_FILES['profileImage']['name'];
  move_uploaded_file($_FILES["profileImage"]["tmp_name"], "assets/img/profile/" . $_FILES["profileImage"]["name"]);

  $Qry = "UPDATE admin SET admin_name = ?, admin_email = ? WHERE admin_id = ?";
  $postStmt = $mysqli->prepare($Qry);

  // Bind parameters
  $postStmt->bind_param('sss', $admin_name, $admin_email, $admin_id);
  $postStmt->execute();

  if ($postStmt) {
    $success = "Account Updated";
    header("refresh:1; url=change_profile.php");
  } else {
    $err = "Please Try Again Or Try Later";
  }
}

if (isset($_POST['ChangeBio'])) {
  $bio = $_POST['bio'];
  $admin_id = $_SESSION['admin_id'];

  $Qry = "UPDATE admin SET bio = ? WHERE admin_id = ?";
  $postStmt = $mysqli->prepare($Qry);

  // Bind parameters
  $postStmt->bind_param('ss', $bio, $admin_id);
  $postStmt->execute();

  if ($postStmt) {
    $success = "Account Updated";
    header("refresh:1; url=change_profile.php");
  } else {
    $err = "Please Try Again Or Try Later";
  }
}

// Update Profile Image
if (isset($_POST['ChangeProfileImage'])) {
  $admin_id = $_SESSION['admin_id'];
  $profileImage = $_FILES['profileImage']['name'];
  move_uploaded_file($_FILES["profileImage"]["tmp_name"], "assets/img/profile/" . $_FILES["profileImage"]["name"]);

  $Qry = "UPDATE admin SET profileImage = ? WHERE admin_id = ?";
  $postStmt = $mysqli->prepare($Qry);

  // Bind parameters
  $postStmt->bind_param('ss', $profileImage, $admin_id);
  $postStmt->execute();

  if ($postStmt) {
    $success = "Profile Image Updated";
    header("refresh:1; url=change_profile.php");
  } else {
    $err = "Please Try Again Or Try Later";
  }
}

if (isset($_POST['changePassword'])) {
  $error = 0;
  if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
    $old_password = $_POST['old_password'];
  } else {
    $error = 1;
    $err = "Old Password Cannot Be Empty";
  }
  if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
    $new_password = $_POST['new_password'];
  } else {
    $error = 1;
    $err = "New Password Cannot Be Empty";
  }
  if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
    $confirm_password = $_POST['confirm_password'];
  } else {
    $error = 1;
    $err = "Confirmation Password Cannot Be Empty";
  }

  if (!$error) {
    $admin_id = $_SESSION['admin_id'];
    $sql = "SELECT * FROM admin WHERE admin_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $admin_id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
      $row = $res->fetch_assoc();
      if ($old_password != $row['admin_password']) {
        $err = "Please Enter Correct Old Password";
      } elseif ($new_password != $confirm_password) {
        $err = "Confirmation Password Does Not Match";
      } else {
        $query = "UPDATE admin SET admin_password = ? WHERE admin_id = ?";
        $stmt = $mysqli->prepare($query);

        $stmt->bind_param('ss', $new_password, $admin_id);
        $stmt->execute();

        if ($stmt) {
          $success = "Password Changed";
          header("refresh:1; url=change_profile.php");
        } else {
          $err = "Please Try Again Or Try Later";
        }
      }
    }
  }
}
require_once('partials/_head.php');

?>


    <!--wag pi
    <script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->
<body>
  <!-- Sidenav -->
  
  <?php   $activePage = 'page7';require_once('partials/_sidebar.php'); ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->

    <?php
     require_once('partials/_topnav.php');
    
     $admin_id = $_SESSION['admin_id'];
    $ret = "SELECT * FROM admin WHERE admin_id = ?";
    $stmt = $mysqli->prepare($ret);
    $stmt->bind_param('s', $admin_id);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($admin = $res->fetch_object()) {
    ?>
      <!-- Header -->
      <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 400px; background-image: url(assets/img/theme/restro00.jpg); margin-top:-100px;background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
          <div class="row">
          <div class="profile-info">
            <div class="col-lg-7 col-md-10">
              <h1 class="display-2 text-white">Hello <?php echo $admin->admin_name; ?></h1>
              <p class="text-white mt-0 mb-5">This is your profile page. You can customize your profile as you want and also change your password.</p>
            </div>
            </div>
          </div>
        </div>
      </div>

      
      <!-- Page content -->
      <div class="container-fluid mt--8">
        <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
              <div class="row justify-content-center">
              <div class="card-profile-image">
                <?php
                  $profileImage = $admin->profileImage;
                  if (!empty($profileImage) && is_string($profileImage)) {
                    echo "<img src='assets/img/profile/$profileImage' height='150' width='150' class='rounded-circle' id='profile-img'>";
                  } else {
                    echo "<img src='assets/img/theme/user-a-min.png' class='rounded-circle' id='profile-img'>";
                  }
                ?>
           
            </div>

              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                </div>
              </div>
              <div class="card-body pt-0 pt-md-4">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      <div>
                      </div>
                      <div>
                      </div>
                      <div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h3>
                <?php 
                echo "Username: ";
                echo $admin->admin_name; ?>
                  </h3>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i><?php echo $admin->admin_email; ?>
                  </div>
                <div class="h5 font-weight-300">
                <label class="form-control-label" for="input-bio">Bio:</label><br>
                  <i class="ni location_pin mr"></i><span id="bioText"><?php echo $admin->bio; ?></span><br><br>
                  <button class="btn btn-sm btn-primary" type="button" onclick="toggleBioEdit()">Edit Bio</button>
                </div>
                <div id="bioEditSection" style="display: none;">
                <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <textarea name="bio" id="input-bio" class="form-control" rows="4"><?php echo $admin->bio; ?></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="ChangeBio" class="btn btn-sm btn-primary form-control-alternative" value="Update Bio">
                  </div>
                </form>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0 py-4">
          <div class="row align-items-center">
            <form method="post" enctype="multipart/form-data">
              <div class="col-8" style="width: 300px;">
                <h3 style="margin-bottom: 0px;">My Account </h3>
              
              </div>
            </form>
            <div class="col-4 text-right">
            </div>
          </div>
        </div>
              <div class="card-body" style="zoom: 83%">
                <form method="post" enctype ="multipart/form-data">
                  
                  <h6 class="heading-small text-muted mb-4">User information</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Username</label>
                          <input type="text" name="admin_name" value="<?php echo $admin->admin_name; ?>" id="input-username" class="form-control form-control-alternative">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Email address</label>
                          <input type="email" id="input-email" value="<?php echo $admin->admin_email; ?>" name="admin_email" class="form-control form-control-alternative">
                        </div>
                      </div>       
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input type="submit" id="input-email" name="ChangeProfile" class="btn btn-success form-control-alternative" value="Submit">
                        </div>
                      </div>
                      
                    </div>
                    
                  </div>

                  <h6 class="heading-small text-muted mb-4">Change Profile Picture</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Select Image</label>
                          <input type="file" class="form-control" name="profileImage">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="upload-img"></br></label>
                          <input type="submit" id="upload-img" value="Upload" name="ChangeProfileImage" class="form-control form-control-alternative btn btn-sm btn-primary">
                        </div>
                        
                      </div>       
           
                </form>
                <hr>
                <form method="post" enctype ="multipart/form-data">
                  <h6 class="heading-small text-muted mb-4">Change Password</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Old Password</label>
                          <input type="password" name="old_password" id="input-username" class="form-control form-control-alternative">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">New Password</label>
                          <input type="password" name="new_password" class="form-control form-control-alternative">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Confirm New Password</label>
                          <input type="password" name="confirm_password" class="form-control form-control-alternative">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input type="submit" id="input-email" name="changePassword" class="btn btn-success form-control-alternative" value="Change Password">
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
        <?php require_once('partials/_footer.php'); }
        ?>
      </div>
    </div>
    <!-- Argon Scripts -->
    <?php require_once('partials/_sidebar.php'); ?>

<script>
  function toggleBioEdit() {
    var bioText = document.getElementById('bioText');
    var bioEditSection = document.getElementById('bioEditSection');

    if (bioText.style.display === 'none') {
      bioText.style.display = 'inline';
      bioEditSection.style.display = 'none';
    } else {
      bioText.style.display = 'none';
      bioEditSection.style.display = 'block';
    }
  }
</script>
<script>
  const imgElement = document.getElementById('profile-img');
  const dynamicStyle = document.getElementById('dynamic-style');
  const changeProfileText = document.querySelector('.change-profile-text');

  imgElement.addEventListener('mouseover', function() {
    // Add grayscale class
    imgElement.classList.add('grayscale');

    // Show "Change Profile" text
    changeProfileText.style.display = 'block';

    // Change profile CSS
    dynamicStyle.textContent = '.rounded-circle { border: 2px solid red; }';
  });

  imgElement.addEventListener('mouseout', function() {
    // Remove grayscale class
    imgElement.classList.remove('grayscale');

    // Hide "Change Profile" text
    changeProfileText.style.display = 'none';

    // Reset profile CSS
    dynamicStyle.textContent = '';
  });
</script>

  </body>
</html>
