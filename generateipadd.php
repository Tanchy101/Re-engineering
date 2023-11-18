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
  
            <div class="card-body">
              <form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
           
                  <form method="POST">
                      <label for="num_computers">Enter number of computers:</label>
                      <input type="number" id="num_computers" name="num_computers">
                      <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user-edit"></i>Generate</button><br>
                  </form>
                <?php
                  if(isset($_POST['num_computers'])) {
                  $num_computers = intval($_POST['num_computers']);

                  for($i = 1; $i <= $num_computers; $i++) {
                      $ip_address = "192.168.0." . $i; // You can change the IP address format based on your network configuration
                      echo $ip_address . "<br>";
                  }
              }
              ?>
                  </div>
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