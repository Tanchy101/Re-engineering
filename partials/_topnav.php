<?php

if (isset($_SESSION['admin_id'])) {
  $admin_id = $_SESSION['admin_id'];
  //$login_id = $_SESSION['login_id'];
  $ret = "SELECT * FROM admin WHERE admin_id = ?";
  $stmt = $mysqli->prepare($ret);
  $stmt->bind_param('s', $admin_id);
  $stmt->execute();
  $res = $stmt->get_result();

  function isHaveTextInUrl($text) {
    return strpos($_SERVER['REQUEST_URI'], $text) !== false;
  }

  while ($admin = $res->fetch_object()) {

?>
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Brand -->
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="dashboard.php"><?php 

      if (isHaveTextInUrl("dashboard")) {
      } else if (isHaveTextInUrl("genplan")) {
        echo "NETWORK LAYOUT PLANNER";
      } else if (isHaveTextInUrl("GENERATE IP ADDRESS")) {
        echo "Customers";
      
      }
      ?></a>
    <!-- Form -->

    <!-- User -->
    <ul class="navbar-nav align-items-center d-none d-md-flex">
      <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle" style="display:none;">
            </span>
            <div class="media-body ml-2 d-none d-lg-block">
              <span class="mb-0 text-sm  font-weight-bold"></span>
            </div>
          </div>
        </a>


          <div class=" dropdown-header noti-title" style="display:none;">
          </div>
    
      </li>
    </ul>
  </div>
</nav>
<?php
  }
}
?>
