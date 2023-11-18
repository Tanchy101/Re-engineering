<?php
session_start();
session_start();
include('config/config.php');
include('config/checklogin.php');

check_login();

if (isset($_POST['input'])){
    $input = $_POST['input'];


    if(is_numeric($input)){

    $ret = "SELECT * FROM  netlayout ORDER BY ABS(net_layout_area - $input)";
    $stmt = $mysqli->prepare($ret); 
    $stmt->execute();
    $res = $stmt->get_result();

    if (mysqli_num_rows($res) > 0){?>

    
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
            <div class="card-header border-0">
              <a href="add_product.php" class="btn btn-outline-success">
                <i class="fas fa-plus"></i>
                Add New Product
              </a>
            </div>
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
                                
                                    <a href="display_info.php?display=<?php echo $net_layout_id; ?>">
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
      </body>

    <?php
    }else{  
        $err = "Insert Numerical Value!";
    }
  }
  require_once('partials/_head.php');
?>