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
  .pb-12 {
    padding-bottom: 12rem;
  }

  .pt-md-12 {
    padding-top: 12rem;
  }

  .mask {
    background-image: url(assets/img/theme/bg4.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }

.form-container {
  width: 100%;
  max-width: 1100px;
  flex-direction: column;
  align-items: left;
  display: flex;
  position: relative;
 
}

p.text {
  text-align: left;
  margin-top:-110px ;
  margin-left: 100px;
  margin-bottom: 30px;
  font-weight: 800;
  line-height: 1.4;
  color:white;
}

.picture-container {
  width: 6rem;
  margin-left: 1000px;
  object-fit: none;  
  object-position:right;
}

.picture {
  width: 150px;
}

.form-container-2 {
  width: 100%;
  max-width: 450px;
  text-align: left;
  flex-direction: column;
  align-items: left;
  display: flex;
  position: relative;
  margin-top:-30px ;
  margin-bottom: -50px;
  margin-left: 100px;
}

p.caption {
  font-weight: 600;
  color:white;
}

.submit-btn-container {
  display: grid;
  padding-left: center;
  width:300px ;
  margin-top: 3rem;
  margin-left: 0px;
}
.submit-btn {
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 30px;
  outline: none;
  position: relative;
  font-weight: 900;
  font-size: 1rem;
  outline: none;
  border: none;
}

.submit-btn {
  width: 100%;
  border: 1px solid white;
  background-color: white;
  color:#0F6973;
}

.submit-btn {
  background: #0F6973;
  color: #fff;
  width: 100%;
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
  <div style="background-image: url(assets/img/theme/bg4.jpg); background-size: cover;" class="pb-12 pt-md-12">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <!-- Page content -->
    <div class="container-fluid">
      <!-- Table -->
      <div class="row">
        <div class="col-4">
              <div class="card-body">
              </div>
              </div>
      </div>
      <div class = "row">
        <div class= "form-container col-12">
    
          <p style="font-size: 70px; " class= "text">Visualize Your Network, <br> Optimize Your Performance</p>
            <div class= "form-container" style = "margin-left: 100px">
              <p style="font-size: 19px; opacity:0.8;" class= "caption">
                Revamp your network layout with ease: <br>
                Generate a network floor plan and <br>
                corresponding costs in seconds.</p>
                <div class="submit-btn-container"><br>
                  <a href="generateplantestt.php">
                  <button type="submit" name="login" class="submit-btn">GENERATE A PLAN</button>
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
