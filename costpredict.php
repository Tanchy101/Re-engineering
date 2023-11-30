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
    <div style="background-image: url(assets/img/theme/costpredictbg.png); background-size: cover; height: 100vh;">    
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <style>
        h3 {
            color: white; 
        }
        label {
            color: white; 
        }
    </style>

    <!-- wag pi
    <script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->

    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row" >
        <div class="col">
          <div class="card" style= "background-color: transparent; border: 0px; margin-left: 3em;">
            <div class="card-header border-6" style= "background-color: rgba(22,27,34,.8); margin-top: -31em; 
            border-top-right-radius: 25px; border-top-left-radius: 25px; margin-right: 3em;">
              <h3 style="margin-top: 1em;">Please Select Institution</h3>
            </div>
            <div class="card-body" style= "background-color: rgba(22,27,34,.8); border-bottom-right-radius: 25px; 
            border-bottom-left-radius: 25px; margin-bottom: 9em; margin-right: 3em;">
            <div class="form-row">
            <div class="col-md-6"><div class="text-center">
            <b><label>Predict Cost for School</label></b><br><a href = predictschool.php>
                <input type="" value="Low Budget" class="btn btn-primary value=" style = "margin:10px;" readonly></a>
                </div>
              </div>
                <div class="col-md-6"><div class="text-center">
                <b><label>Predict Cost for Office</label></b><br><a href = predictoffice.php>
                <input type="" value="Low Budget" class="btn btn-primary" value="" style = "margin:10px" readonly></a>
                </div>
              </div>
              <div class="col-md-6"><div class="text-center"><a href = predictschoolmid.php>
                <input type="" value="Medium Budget"  class="btn" style = "background-color:#FFCC33; color:white" style = "margin:10px" readonly></a>
                </div>
              </div>
                <div class="col-md-6"><div class="text-center"><a href = predictofficemid.php>
                <input type="" value="Medium Budget" class="btn" style = "background-color:#FFCC33; color:white" style = "margin:10px" readonly></a>
                </div>
              </div>  
            </div>
            <div class="form-row" style="margin-bottom: -2em;">
            <div class="col-md-6"><div class="text-center"><a href = predictschoolhigh.php>
                <input type="" value="High Budget" class="btn btn-danger value=" style = "margin:10px" readonly></a>
                </div>
              </div>
                <div class="col-md-6"><div class="text-center"><a href = predictofficehigh.php>
                <input type="" value="High Budget" class="btn btn-danger" value="" style = "margin:10px" readonly></a>
                </div>
            
            <hr>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <div class="footers" style="margin-left: 2.7em; margin-top: -10em;">
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