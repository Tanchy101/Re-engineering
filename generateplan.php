<?php
session_start();
session_start();
include('config/config.php');
include('config/checklogin.php');

check_login();
require_once('partials/_head.php');
?>
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
     <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0 text-center">
              <h3>SELECT INPUT FIELD</h3>
            </div>
            <div class="card-body">
          
                <div class="form-row">
                  <div class="col-md-6 text-center">
                    <input type ="button" onclick="location='generateplantestt.php'" value="Area" class="btn btn-success"></a>
                  </div> 
                <hr> 
                  <div class="col-md-6 text-center">
                    <input type ="button" onclick="location='generateplantest.php'" value="Length & Width" class="btn btn-success">
                  </div>
                </div>
                
                <hr>
                </div>
              </form>
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
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>