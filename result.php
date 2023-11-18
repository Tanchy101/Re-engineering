<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

check_login();


$input = $_GET['input'];
$net_institution = $_GET['net_institution'];

?>
<head>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets\img\icons\networklogo2.png">
  <link rel="manifest" href="assets/img/icons/site.webmanifest">
  <link rel="mask-icon" href="assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
</head>

<body>
  <!-- Sidenav -->
  <?php
  $activePage = 'page2';
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
        <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: 1500px 1000px;background-repeat: no-repeat;" class="header  pb-8 pt-5 pt-md-8">
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

<?php
if(is_numeric($input)){

    $ret = "SELECT * FROM  netlayout WHERE net_institution = '$net_institution' ORDER BY ABS(net_layout_area - $input)";
    $stmt = $mysqli->prepare($ret); 
    $stmt->execute();
    $res = $stmt->get_result();

    if (mysqli_num_rows($res) > 0){?>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <a href="generateplantestt.php" class="btn btn-outline-success">
                <i class="fas fa-plus"></i>
                Generate New Layout
              </a>
            </div>
            <h3 style="margin-left: 20px;"><?php echo "Your Area is: $input";?></h3>
              <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                  <th scope="col">Network Image</th>
                  <th scope="col">Network Area (sqm)</th>
                  <th scope="col">Institution</th>
                  <th scope="col">Ergonomics</th>
                  <th scope="col">Length (m)</th>
                  <th scope="col">Width (m)</th>
                  <th scope="col">Action</th>
                </tr> 
                </thead>
                <tbody>
                <?php
                            
                            $ret = "SELECT * FROM  netlayout ORDER BY ABS(net_layout_area - $input)LIMIT 10";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->execute();
                            $res = $stmt->get_result();
                                       
                            while ($row = mysqli_fetch_assoc($res)) {
            
                              $net_layout_id = $row['net_layout_id'];
                              $net_layout_area = $row['net_layout_area'];
                              $net_institution = $row['net_institution'];
                              $net_ergo = $row['net_ergo'];
                              $net_length = $row['net_length'];
                              $net_width = $row['net_width'];
                              $net_image = $row ['net_image'];
                        
                              ?>
                          <tr>
                              <td> <?php
                                  if ($net_image) {
                                    echo "<img src='assets/img/netlayout/$net_image' height='60' width='60 class='img-thumbnail'>";
                                  } else {
                                    echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                                  }
            
                                  ?></td>
                              <td><?php echo $net_layout_area; ?></td>
                              <td><?php echo $net_institution; ?></td>
                              <td><?php echo $net_ergo; ?></td>
                              <td><?php echo $net_length; ?></td>
                              <td><?php echo $net_width;?></td> 
                              <td>
                                    <a href="makeplantest<?php echo $net_layout_id;?>.php?display=<?php echo $net_layout_id;?>">

                                      <button class="btn btn-sm btn-primary">
                                        <i class="fas fa-user-edit"></i>
                                       View Details
                                      </button>
                                    </a>
                                  </td>
                                  <?php
                          }
                          ?>
            
                          </tr>
                          <?php
                          }
                          ?>
            
                </tbody>
            </table>
            </div>
            
                 </div>
              </div>
           </div>
        </div>
    </body>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
          <?php
    }else{  
        $err = "Insert Numerical Value!";
    }
  require_once('partials/_head.php');
?>
