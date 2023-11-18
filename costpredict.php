<!DOCTYPE html> 
<html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');

?>

<body>
  <!-- Sidenav -->
  <?php
    $activePage = 'page3';
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/bg4.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    
    <script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script>

    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-6">
              <h3>Please Select Institution</h3>
            </div>
            <div class="card-body">
            <div class="form-row">
            <div class="col-md-6"><div class="text-center">
            <b><label>Predict Cost for School</label></b><br><a href = predictschool.php>
                <input type="" value="Low Budget" class="btn btn-primary value=" style = "margin:10px;"></a>
                </div>
              </div>
                <div class="col-md-6"><div class="text-center">
                <b><label>Predict Cost for Office</label></b><br><a href = predictoffice.php>
                <input type="" value="Low Budget" class="btn btn-primary" value="" style = "margin:10px"></a>
                </div>
              </div>
              <div class="col-md-6"><div class="text-center"><a href = predictschoolmid.php>
                <input type="" value="Medium Budget"  class="btn" style = "background-color:#FFCC33; color:white" style = "margin:10px"></a>
                </div>
              </div>
                <div class="col-md-6"><div class="text-center"><a href = predictofficemid.php>
                <input type="" value="Medium Budget" class="btn" style = "background-color:#FFCC33; color:white" style = "margin:10px"></a>
                </div>
              </div>  
            </div>
            <div class="form-row">
            <div class="col-md-6"><div class="text-center"><a href = predictschoolhigh.php>
                <input type="" value="High Budget" class="btn btn-danger value=" style = "margin:10px"></a>
                </div>
              </div>
                <div class="col-md-6"><div class="text-center"><a href = predictofficehigh.php>
                <input type="" value="High Budget" class="btn btn-danger" value="" style = "margin:10px"></a>
                </div>
            
            <hr>

            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  </body>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
  
<script>
  function validateForm() {
    let lengthInput = document.getElementById("length");
    let widthInput = document.getElementById("width");
    let lengthError = document.getElementById("lengthError");
    let widthError = document.getElementById("widthError");
    let length = lengthInput.value;
    let width = widthInput.value;
    let netInstitution = document.getElementById("net_institution").value;
    let netErgo = document.getElementById("net_ergo").value;
    let netInstitutionError = document.getElementById("netInstitutionError");
    let netErgoError = document.getElementById("netErgoError");

    if (isNaN(length)) {
      lengthError.innerHTML = " *Length must be a number.";
      lengthInput.focus();
      return false;
    } else {
      lengthError.innerHTML = "";
    }

    if (isNaN(width)) {
      widthError.innerHTML = " *Width must be a number.";
      widthInput.focus();
      return false;
    } else {
      widthError.innerHTML = "";
    }

    if (netInstitution === "") {
      netInstitutionError.innerHTML = " *Please select a net institution.";
      return false;
    } else {
      netInstitutionError.innerHTML = "";
    }

    return true;
  }
</script>
</html>