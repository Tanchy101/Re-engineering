<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');

$admin_id = $_SESSION['admin_id'];
//$login_id = $_SESSION['login_id'];
$ret = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();

while ($admin = $res->fetch_object()) {
}
?>


<body>

  <!-- Sidenav -->
  <?php
  $activePage = 'page1';
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>

<style>

.form-container {
  padding-top: 100vh 100vh;
  flex-direction: column;
  align-items: left;
  position: relative;
  width: 3px;
  height: 0;
}

p.text {
  text-align: left;
  margin-top: 1.7em;
  margin-bottom: 2%;
  margin-left: 0.8em;
  font-size: 70px;
  font-weight: bold;
  font-family: Montserrat;
  line-height: 1.4;
  color:white;
  width: 80%;
  inline-size: 170%;
}

.card{
  background-color:#161b22;
  width: 470px;
}

p.caption {
  font-size: 20px;
  font-family: Montserrat;
  color: white;
  margin-top: 10px;
}

.submit-btn {
  font-weight: bold;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 25px;
  border: none;
  background-color: #7ed957;
  font-family: Montserrat;
  font-weight: bold;
  color: white;
  width: 250px;
  margin-left: 5.8em;
  
}
</style>

    <!--wag pi
    <script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->
  
  <!-- Header -->
  <div style="background-image: url(assets/img/theme/dashboardbggif.gif); background-size: cover; display: flex; height: 100vh; ">
    <span class="mask bg-gradient-dark opacity-3"></span>
    <!-- Page content -->
    <div class="container-fluid">
      <div class = "row">
        <div class= "form-container col-7">   
          <p class= "text">Visualize Your Network, <br> Optimize Your <br> Performance</p>
            <div class= "form-container" style = "margin-left: 3.8em;">
            <div class="card">
              <div class="container">
                <p style="margin: 0.8em 0.6em 0.8em" class= "caption">
                  Revamp your network layout with ease: <br>
                  Generate a network floor plan and <br>
                  corresponding costs in seconds.
                </p>
              </div>
            </div>
                <div class="submit-btn-container"><br>
                  <a href="generateplantestt.php">
                  <button type="submit" name="login" class="submit-btn">Generate Now!</button>
                  </a>
                </div>
          </div>
      </div>
      </div>
    </div>
    
  </div>
      <!-- Footer -->
  
</div>

    </body>
        <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>
</html>
