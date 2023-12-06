<!DOCTYPE html> 
<html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');

if (isset($_GET['display'])) {
  $id = $_GET['display'];
  
  // Retrieve network layout details from the database
  $stmt = $mysqli->prepare("SELECT * FROM netlayout WHERE net_layout_id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $res = $stmt->get_result();
  
  if (mysqli_num_rows($res) == 1) {
      $row = mysqli_fetch_assoc($res);
      
      // Display network layout details on the page
      $net_layout_id = $row['net_layout_id'];
      $net_layout_area = $row['net_layout_area'];
      $net_institution = $row['net_institution'];
      $net_ergo = $row['net_ergo'];
      $net_length = $row['net_length'];
      $net_width = $row['net_width'];
      $net_image = $row ['net_image'];
      $no_pcs = $row ['no_pcs'];
      $low_total_price = $row ['low_total_price'];
      $ave_total_price = $row ['ave_total_price'];
      $high_total_price = $row ['high_total_price'];
      $switch_model = $row ['switch_model'];
      $no_standard_table = $row ['no_standard_table'];
      $no_Lshape = $row ['no_Lshape'];
      $no_Ushape = $row ['no_Ushape'];
      $no_standard_school = $row ['no_standard_school'];
?>
<head><link rel="stylesheet" href="makeplanstyle.css"></head>
<!--<script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "67%";
        };
    </script>-->
<body>

<script> 
var draggableElements = [];  // Array to store draggable elements

function captureAndPrint() {
  var targetDiv = document.getElementById('form-container');
  if (targetDiv === null) {
    console.error('Target div is not found.');
    return;
  }
  // Reset the position for capturing
  targetDiv.style.position = 'static';

  // Capture the initial positions of the draggable elements
  var initialPositions = draggableElements.map(function (element) {
    var rect = element.getBoundingClientRect();
    return { left: rect.left, top: rect.top };
  });

  // Clone the draggable elements and position them accordingly
  var clonedElements = draggableElements.map(function (element, index) {
    var clone = element.cloneNode(true);
    clone.style.position = 'absolute';  // Set the position to absolute for the clone
    clone.style.left = initialPositions[index].left + 'px';
    clone.style.top = initialPositions[index].top + 'px';
    targetDiv.appendChild(clone);
    return clone;
  });

  applyOverlay('.elementToOverlay');
  applyOverlay2('.elementToOverlay2');

  domtoimage.toPng(targetDiv)
    .then(function (dataUrl) {
      // Restore the original position
      targetDiv.style.position = 'relative';

      // Remove the cloned elements from the targetDiv
      clonedElements.forEach(function (clone) {
        targetDiv.removeChild(clone);
      });
      
      removeOverlay('.elementToOverlay');
      removeOverlay2('.elementToOverlay2');

      var printWindow = window.open('', '_blank');
      if (printWindow === null) {
        console.error('Failed to open print window. Please check your browser settings and ensure that pop-ups are allowed.');
        return;
      }
      
      printWindow.document.open();
      printWindow.document.write('<html><head><title>Print Preview</title></head><body>');
      printWindow.document.write('<img src="' + dataUrl + '" style="width: 100%;" onload="setTimeout(function() { window.print(); window.close(); }, 500);" />');
      printWindow.document.write('</body></html>');
      printWindow.document.close();
    })
    .catch(function (error) {
      console.error('Error capturing image:', error);
    });
}

</script>

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
    <div style="background-image: url(assets/img/theme/GenerateBG.png); background-size: cover; height: 45vh;" class="header  pb-8 pt-5 pt-md-8">      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="card shadow" style="margin-top: -18em;">
            <div class="card-header border-0">
              <div class = "row">
                <div class = "col-md-6">
                  <h2>Customize your Layout:</h2>
                </div>
                <div class = "col-md-6">
                <a href="generateplantest.php" class="btn btn-outline-success" style="float: right">
                         <i class="fas fa-user-plus"></i>
                            GENERATE ANOTHER LAYOUT
                         </a>
                </div>
              </div>  

              <div class = "row">
              <div class = "dropdown col-md-6" style = "float:left">
                          <div class="dropdown">
                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    Minimum
                                  </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style ="width:570px">
                                  <a class="dropdown-item" href=""><b>Details:</b>
                                    <div class = "row">
                                      <div class = "col-6">
                                        <strong>Number of PCs:</strong> <?php echo $no_pcs; ?> <br>
                                        <strong>Number of Tables:</strong> <?php echo $no_pcs; ?><b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Standard:</b> <?php echo $no_standard_table; ?> <b>&nbsp;&nbsp;&nbsp;L-shape:</b> <?php echo $no_Lshape; ?> <b>&nbsp;&nbsp;&nbsp; U-shape:</b> <?php echo $no_Ushape; ?><br>
                                        <strong>Number of Chairs:</strong> <?php echo $no_pcs; ?><br> <br>
                                        <strong>Switch Model:</strong> <?php echo $switch_model; ?> ports<br> <br>
                                        <br>

                                        <strong>Specs for Minimum:</strong><br>
                                        <strong>CPU</strong> - Intel Core I3-10100F Processor                               <br>
                                        <strong>MoBo</strong> - Asus Prime H610M-K D4, LGA1700, MATX, 2*Ddr4                <br>
                                        <strong>SSD</strong> - Kingston SSDNow A400 240GB SATA 2.5                          <br>
                                        <strong>RAM</strong> – Patriot CL19 RAM 8GB DDR4                                    <br>
                                        <strong>MONITOR</strong> – Nvision N2255-B 21.5" 75HZ IPS Monitor                     <br>
                                        <strong>UPS</strong> – Secure 650VA UPS Frequency:50hz – 60hz (BLACK)               <br>
                                        <strong>KB & M</strong> – A4Tech KRS-8572 Usb Keyboard and Mouse Black              <br>
                                        <strong>PSU</strong> – Gigabyte P450B 450 watts 80 Plus Bronze 120mm                <br>
                                        <strong>CASE</strong> – Honeycomb Micro ATX                                         <br></a>
                                      </div>
                                    
                                      <div class = "col-4" style = padding-left:130px><br><br><br><br><br><br><br>
                                      <a class="dropdown-item" href="">
                                      <b>(P4,695.00)</b><br>
                                      <b>(P4,625.00)</b><br>
                                      <b>(P969.00)</b><br>
                                      <b>(P1,495)</b><br>
                                      <b>(P3,495)</b><br>
                                      <b>(P1,650)</b><br>
                                      <b>(P490)</b><br>
                                      <b>(P2,150)</b><br>
                                      <b>(P436)</b>
                                      <hr>
                                      Total Price: <b><?php echo  ($no_pcs * (4695 + 4625 + 969 + 1495 + 3495 + 1650 + 490 + 2150 + 436 + 2999) + $no_standard_table * (4390) + $no_Lshape * (11990) + $no_Lshape * (15780)); ?> </b></a>
                                      </div>

                                    </div>
                            </div>
                          </div>

                            <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "background-color:#FFCC33; color:white">
                            Average
                           </button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style ="width:570px">
                                  <a class="dropdown-item" href=""><b>Details:</b>
                                    <div class = "row">
                                      <div class = "col-6">
                                        <strong>Number of PCs:</strong> <?php echo $no_pcs; ?> <br>
                                        <strong>Number of Tables:</strong> <?php echo $no_pcs; ?> <b> 
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Standard:</b> <?php echo $no_standard_table; ?> <b>&nbsp;&nbsp;&nbsp;L-shape:</b> <?php echo $no_Lshape; ?> <b>&nbsp;&nbsp;&nbsp; U-shape:</b> <?php echo $no_Ushape; ?><br>
                                        <strong>Number of Chairs:</strong> <?php echo $no_pcs; ?><br> <br>
                                        <strong>Switch Model:</strong> <?php echo $switch_model; ?><br> <br>
                                        <br>

                                        <strong>Specs for Average:</strong><br>
                                        <strong>CPU</strong> - Intel Core I3-13100 Processor                                <br>
                                        <strong>MoBo</strong> - Asus Prime H610M-K D4, LGA1700, MATX, 2*Ddr4                <br>
                                        <strong>HDD</strong> - Western Digital 1tb Harddisk Drive Blue                      <br>
                                        <strong>SSD</strong> - Crucial MX500 250GB 3D NAND SATA 2.5-inch SSD                <br>
                                        <strong>RAM</strong> – Kingston Fury Beast 8GB DDR4                                 <br>
                                        <strong>MONITOR</strong> – 24" LG Ultragear 24GN60R-B LED 144hz                     <br>
                                        <strong>UPS</strong> – Secure 650VA UPS Frequency:50hz – 60hz (BLACK)               <br>
                                        <strong>KB & M</strong> – A4Tech KRS-8572 Usb Keyboard and Mouse Black              <br>
                                        <strong>PSU</strong> – Gigabyte P450B 450 watts 80 Plus Bronze 120mm                <br>
                                        <strong>CASE</strong> – Honeycomb Micro ATX                                         <br></a>
                                      </div>
                                    
                                      <div class = "col-6" style = padding-left:130px><br><br><br><br><br><br><br>
                                      <a class="dropdown-item" href="">
                                      <b>(P4,799.00)</b><br>
                                      <b>(P4,625.00)</b><br>
                                      <b>(P2,259.00)</b><br>
                                      <b>(P1,653.00)</b><br>
                                      <b>(P2,442)</b><br>
                                      <b>(P10,625)</b><br>
                                      <b>(P1,650)</b><br>
                                      <b>(P490)</b><br>
                                      <b>(P2,150)</b><br>
                                      <b>(P436)</b>
                                      <hr>
                                      Total Price: <b><?php echo $no_pcs * (4799 + 4625 + 2259 + 1653 + 2442 + 10625 + 1650 + 490 + 2150 + 436 + 2999) + $no_standard_table * (4390) + $no_Lshape * (11990) + $no_Lshape * (15780) + $no_standard_school * (1990)?> </b></a>
                                      </div>

                                    </div>
                              </div>
                            </div>

                          <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            High-End
                           </button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style ="width:570px">
                                  <a class="dropdown-item" href=""><b>Details:</b>
                                    <div class = "row">
                                      <div class = "col-6">
                                        <strong>Number of PCs:</strong> <?php echo $no_pcs; ?> <br>
                                        <strong>Number of Tables:</strong> <?php echo $no_pcs; ?>
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Standard:</b> <?php echo $no_standard_table; ?> <b>&nbsp;&nbsp;&nbsp;L-shape:</b> <?php echo $no_Lshape; ?> <b>&nbsp;&nbsp;&nbsp; U-shape:</b> <?php echo $no_Ushape; ?><br>
                                        <strong>Number of Chairs:</strong> <?php echo $no_pcs; ?><br> <br>
                                        <strong>Switch Model:</strong> <?php echo $switch_model; ?><br> <br>
                                        <br>

                                        <strong>Specs for Average:</strong><br>
                                        <strong>Desktop</strong> - iMac    <br>
                                        <strong>CPU</strong> - Apple M1 chip with 8-core CPU                        <br>
                                        <strong>SSD</strong> - 256GB SSD storage                                    <br>
                                        <strong>RAM</strong> – 8GB unified memory                                   <br>
                                        <strong>MONITOR</strong> – Built-in 24-inch Apple Monitor                   <br>
                                        <strong>UPS</strong> –  Secure 650VA UPS Frequency:50hz – 60hz (BLACK)      <br>
                                        <strong>KB & M</strong> – Magic Mouse and Magic Keyboard                    <br>
                                        <br>Price per piece: <b> 79990 </b>
                                        <hr>
                                        Total Price: <b><?php echo $high_total_price; ?> </b></a>
                                      </div>
                                      
                                    </div>
                                </div>
                              </div>
                    </div>
                  </div>
                  <hr>
                </div>

            <!-- ITEMS COLUMN -->
            <div class = "col-sm-12 container" id = "form-container">
              <div class="row">
              <div class="col-sm-5" style = "padding-right: 150px; padding-left: 30px; max-width:480px" > <b style = "margin-top: 10px;"> ITEMS TO ADD: </b>
                        <div id="accordion">
                          <div class = "elementToOverlay"><button class="collapsible" style = "margin-top: 10px;"><b>Cubicles</b></button> 
                              <div class="content" id = "scroll-box" style = "display:none">
                                <div class="drag-element-source drag-element" style = "z-index:1">
                                  <div class="rect" style = "margin-bottom: 110px;"><img src="assets/img/items/cubicle.png" draggable="false"/>  
                                    <div class="middle desc" style = "padding-left: 170px; padding-top: 120px;"> <b>L-shape Cubicle </b> <br>200cmX185cm</div>
                                  </div>
                                </div>
                
                            <div class="drag-element-source drag-element" style = "z-index:1">
                              <div class="rect" style = "margin-left: 2px; margin-top:80px"><img src="assets/img/items/U-shaped_cubicle.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left:70px; margin-top: 90px"> <b>U-shape Cubicle </b> <br>260cmX185cm</div>
                            </div>
                            </div>
                        </div>
                        </div>

                        <div><button class="collapsible"><b>Tables</b></button> 
                          <div class="content" id = "scroll-box" style = "display:none">
                            <div class="drag-element-source drag-element" style = "z-index:2">
                              <div class="rect" style = "margin-top: 10px; margin-left: 11px"><img src="assets/img/items/L-table.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 74px; margin-top: 55px;"> <b>L-shaped Table </b> <br>155cmX130cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:2">
                              <div class="rect" style = "margin-top: 70px; margin-left: -3px"><img src="assets/img/items/U-table.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 75px; margin-top: 50px"> <b>U-shaped Table </b> <br>195cmX155cm</div>
                            </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:2">
                              <div class="rect" style = "margin-top: 120px; margin-left:2px;"><img src="assets/img/items/table_standard.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:2">
                              <div class="rect" style = "margin-left: -4px; margin-top: 80px;"><img src="assets/img/items/computer_desk.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 35px; margin-top: 10px;"> <b>Computer Desk</b> <br>100cmX60cm</div>
                            </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:2">
                              <div class="rect" style = "margin-left: 6px; margin-top: 40px;"><img src="assets/img/items/computer_table.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left:16px; margin-top: 0px;"> <b>Computer Table</b> <br>80cmX55cm</div>
                            </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:2">
                              <div class="rect" style = "margin-left: 9px; margin-top: -25px;"><img src="assets/img/items/workstation.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 42px; margin-top: 0px;"> <b>Workstation</b> <br>140cmX60cm</div>
                            </div>
                            </div>

                          </div>
                        </div>

                        <div><button class="collapsible"><b>Chairs</b></button> 
                          <div class="content" id = "scroll-box" style = "display:none; height:200px">
                            <div class="drag-element-source drag-element" style = "z-index:3">
                              <div class="rect" style = "margin-top: 20px; margin-left: 8px"><img src="assets/img/items/office_chair.png" draggable="false"/>
                              <div class="middle desc" style = "color:whitesmoke; margin-top: 0px; margin-left:8px"> <b >Office Chair </b> <br>63cmX66cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:3">
                              <div class="rect" style = "margin-top: 0px; margin-left: -8px"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:3">
                              <div class="rect" style = "margin-top: -30px; margin-left: -12px"><img src="assets/img/items/school_chair.png" draggable="false"/>
                              <div class="middle desc" style = "margin-top: 4px; margin-left:10px"> <b >School Chair</b> <br>42cmX47cm</div>
                              </div>
                            </div>

                          
                          </div>
                        </div>

                        <div><button class="collapsible"><b>Network Equipments</b></button> 
                          <div class="content" id = "scroll-box" style = "display:none; height:200px">
                            <div class="drag-element-source drag-element" style = "z-index:4">
                              <div class="rect" style = "margin-top: 20px;"><img src="assets/img/items/computer.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:4">
                              <div class="rect" style = "margin-top: -5px;"><img src="assets/img/items/switch.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -10px; padding-left: 100px; margin-top: -7px"> <b>Switch </b> </div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:4">
                              <div class="rect" style = "margin-top: -80px; margin-left: -3px;"><img src="assets/img/items/router.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -6px; padding-left: 100px; margin-top: -7px"> <b>Router </b></div>
                              </div>
                            </div>

                          </div>
                        </div>

                        <div><button class="collapsible"><b>Others</b></button> 
                          <div class="content" id = "scroll-box" style = "display:none;">
                            <div class="drag-element-source drag-element" style = "z-index:1; padding-top: -340px;">
                              <div class="rect" style = "margin-left: 15px; margin-top: 40px;"><img src="assets/img/items/door.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 4px; margin-top: -1px"> <b>Door </b> <br>68cmX68cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:3; padding-top: -340px;">
                              <div class="rect" style = "margin-left: 0px; margin-top: 30px;"><img src="assets/img/items/cabinet.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 4px; margin-top: 0px"> <b>File Cabinet</b> <br>43cmX52cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:3">
                              <div class="rect" style = "margin-left: 0px; margin-top: 10px;"><img src="assets/img/items/cabinet2.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 19px; margin-top: 0px"> <b>Cupboard </b> <br>80cmX35cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:3">
                              <div class="rect" style = "margin-left: -15px; margin-top: -10px;"><img src="assets/img/items/cabinet3.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 45px;margin-top: 10px; color:white"> <b> File Cabinet </b> <br>99cmX56cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:3">
                              <div class="rect" style = "margin-left: 0px; margin-top: 0px;"><img src="assets/img/items/cabinet4.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 42px; margin-top: 5px"> <b>Office Cabinet </b> <br>117cmX53cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element" style = "z-index:3; margin-bottom:-230px">
                              <div class="rect" style = "margin-left: 0px; margin-top: -10px;"><img src="assets/img/items/cabinet5.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left:65px; margin-top: 5px"> <b>Cabinet </b> <br>160cmX45cm</div>
                              </div>
                            </div>


                          </div>
                        </div>
                      </div> 

                      </div>
                    <!-- EDIT COLUMN -->
                    <div class="col-sm-6">
                      <div id = "plane-container" style = "height: 199mm; width: 143mm;">
                      <p></p>

                      <!-- Tables -->
                      <div class="drag-element" style = "z-index:2; margin-top: 49px; margin-left: 40px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 175px; margin-left: 40px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 301px; margin-left: 40px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 427px; margin-left: 40px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>
                      
                      <div class="drag-element" style = "z-index:2; margin-top: 553px; margin-left: 40px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>
                      
                      <div class="drag-element" style = "z-index:2; margin-top: 49px; margin-left: 102px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 175px; margin-left: 102px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 301px; margin-left: 102px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 427px; margin-left: 102px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 553px; margin-left: 102px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 49px; margin-left: 300px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 175px; margin-left: 300px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>
                      
                      <div class="drag-element" style = "z-index:2; margin-top: 301px; margin-left: 300px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      
                      <div class="drag-element" style = "z-index:2; margin-top: 427px; margin-left: 300px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 553px; margin-left: 300px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 49px; margin-left: 362px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 175px; margin-left: 362px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      <div class="drag-element" style = "z-index:2; margin-top: 301px; margin-left: 362px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                      
                      <div class="drag-element" style = "z-index:2; margin-top: 427px; margin-left: 362px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>


                      <div class="drag-element" style = "z-index:2; margin-top: 553px; margin-left: 362px;">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" style ="transform: rotate(90deg)" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 39px; margin-top: 3px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>


                      

                      <!-- Door -->
                            <div class="drag-element" style = "margin-left: 28px; margin-top: -2px;;  z-index:2">
                              <div class="rect"><img src="assets/img/items/door1.png" draggable="false"style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 4px; margin-top: -1px"> <b>Door </b> <br>68cmX68cm</div>
                              </div>
                            </div>

                      <!-- Computers -->

                      <div class="drag-element" style = "margin-top: 122px; margin-left: 70px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 248px; margin-left: 70px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 374px; margin-left: 70px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 497px; margin-left: 70px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 623px; margin-left: 70px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 122px; margin-left: 332px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 248px; margin-left: 332px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 374px; margin-left: 332px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 497px; margin-left: 332px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 623px; margin-left: 332px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <!-- Computer Rotate -->

                      <div class="drag-element" style = "margin-top: 130px; margin-left: 150px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                        <div class="drag-element" style = "margin-top: 256px; margin-left: 150px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 382px; margin-left: 150px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" />
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 505px; margin-left: 150px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" />
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 628px; margin-left: 150px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" />
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 130px; margin-left: 410px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" />
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 256px; margin-left: 410px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" />
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 382px; margin-left: 410px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false" />
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top:  505px; margin-left: 410px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 628px; margin-left: 410px; z-index:4">
                              <div class="rect"><img src="assets/img/items/computer.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: 0px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                        <!-- Chairs -->

                      <div class="drag-element" style = "z-index:3; margin-top: 128px; margin-left: 25px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 253px; margin-left: 25px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 378px; margin-left: 25px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 503px; margin-left: 25px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 628px; margin-left: 25px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 128px; margin-left: 285px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 253px; margin-left: 285px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 378px; margin-left: 285px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 503px; margin-left: 285px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 628px; margin-left: 285px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <!-- Chairs Rotate -->
                    
                      <div class="drag-element" style = "z-index:3; margin-top: 138px; margin-left: 205px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: -20px; margin-left: 0px"> <b >Small Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 263px; margin-left: 205px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 388px; margin-left:  205px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 513px; margin-left:  205px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 638px; margin-left:  205px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 138px; margin-left: 465px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 263px; margin-left: 465px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 388px; margin-left: 465px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 513px; margin-left: 465px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-top: 638px; margin-left: 465px">
                              <div class="rect"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: 0px; margin-left: 5px"> <b >Small <br> Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>


                      <div class="drag-element" style = "margin-top: -2px; margin-left: 450px; z-index:4">
                              <div class="rect"><img src="assets/img/items/switch.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -10px; padding-left: 100px; margin-top: -7px"> <b>Switch </b> </div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: -3px; margin-left: 490px; z-index:4">
                              <div class="rect"><img src="assets/img/items/router.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -6px; padding-left: 100px; margin-top: -7px"> <b>Router </b></div>
                              </div>
                            </div>

                      <div class="drag-element" style = "z-index:3; margin-left: 220px; margin-top: -12px;">
                              <div class="rect"><img src="assets/img/items/cabinet5.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left:65px; margin-top: 5px"> <b>Cabinet </b> <br>160cmX45cm</div>
                              </div>
                            </div>

                    </div> 
                    </div>
                    </div>   
                    <div class = "row">
                    <div class ="elementToOverlay2 col-sm-2 dropzone element-trash" style = "margin-left: 17em; margin-top: -120px; 
                          height: 120px; background-color: transparent; border: none; ">
                              <div style="text-align: center; color: black;">
                                <div style="font-size: 40px;">
                                  <span><i class="fas fa-trash-alt"></i></span>
                                </div>
                                <span style="font-size: 16px;"><b>DROP TO</b></span><br>
                                <span style="font-size: 16px;"><b>DELETE</b></span>
                              </div>
                            </div> 
                        <!-- </div>   -->
                      <!-- </div> -->
                    <!-- </div> -->
                    <div class ="elementToOverlay2 col-sm-2 dropzone element-trash" style = "margin-left: 66em; margin-top: -120px; 
                          height: 120px; background-color: transparent; border: none;">
                              <div style="text-align: center; color: black; margin-left: -3em;">
                                <div style="font-size: 40px;">
                                  <span><i class="fas fa-trash-alt"></i></span>
                                </div>
                                <span style="font-size: 16px;"><b>DROP TO</b></span><br>
                                <span style="font-size: 16px;"><b>DELETE</b></span>
                            </div>
                      </div>
                  </div>

              <!-- </div>                                                 -->                                               
                    <div class="form-row">
                        <div class="col-md-6">
                          <br>
                            <b> Generated Layout Details:</b><br>
                            <strong>Network Area:</strong> <?php echo $net_layout_area; ?> sqm<br>
                            <strong>Institution:</strong> <?php echo $net_institution; ?><br>
                            <strong>Ergonomics:</strong> <?php echo $net_ergo; ?><br>
                            <strong>Length:</strong> <?php echo $net_length; ?> m<br>
                            <strong>Width:</strong> <?php echo $net_width; ?> m<br></br>
                            <strong>Recommended Bandwidth:</strong> 
                            <?php 
                            
                            if ($no_pcs <= 4){

                              echo "5 - 25 Mbps";

                            } 

                            else if ($no_pcs > 4 && $no_pcs < 7 ) {

                              echo "25 - 50 Mbps";

                            }

                            else if ($no_pcs >= 7 && $no_pcs < 10 ) {

                              echo "50 - 100 Mbps";

                            }

                            else if ($no_pcs >= 10 && $no_pcs < 15 ){
                              echo "100 - 500 Mbps";
                            }

                            else {
                              echo "500 - 1000 Mbps";
                            }
                            
                            
                            
                            ?>
                            <strong><br>Recommended Topology: </strong>
                            <?php 
                            
                            if ($net_institution == "Office"){

                              echo "Star Topology";

                            } 

                            else {

                              echo "Bus Topology or Star Topology";

                            } 
                            ?>

                            </strong> <br></br>
                            <strong>LEGEND:</strong><br>
                            <strong>R:</strong> Router
                            <strong>S:</strong> Switches
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                            
                            <?php
                            
                                $stmt = $mysqli->prepare("SELECT no_pcs FROM netlayout");
                                $stmt->execute();
                                $res = $stmt->get_result();

                                if ($res->num_rows > 0) {
                                    $row = $res->fetch_assoc();
                                    $num_computers = intval($row["no_pcs"]);
                              
                                }
                                
                            ?>
                       
                            </div>
              </div>
            </div>
            <hr>
            <div class="form-row text-left">
              <div class="col-md-12" style = "margin-bottom:25px; margin-left: 20px">
              <button type="button" id = "printButton" class="btn btn-primary" onclick="captureAndPrint()">Print</button>
              </div>
            </div>
            <input type="hidden" name="input" value="<?php echo $input; ?>">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
  </body>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');

  ?>
    </body>

        <?php
    } else {
        // Network layout not found
        $err = "Network layout not found";
        header("location: index.php?err=$err");
    }
} else {
    // No network layout ID provided
    $err = "No network layout ID provided";
    header("location: index.php?err=$err");
}

?>
<script>

$(document).ready(function(){
  // Event listener for when a collapsible button is clicked
  $('#accordion .collapsible').click(function() {
    // Check if the button has an active class
    // If yes, close its content and remove its active class (clicked an open container)
    // If no, remove all active classes except for the current button and close all containers (clicked a close container)
    if ($(this).hasClass('active')) {
      $(this).siblings('.content').slideUp();
      $(this).removeClass('active');
    } else {
      $('.collapsible.active').removeClass('active');
      $(this).addClass('active');
      $('.collapsible:not(.active) ~ .content').each(function() {
        $(this).slideUp();
      });
      $(this).siblings('.content').slideDown().css("overflow-y", "scroll");
    }
  });
});

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
        <script src="http://cdn.jsdelivr.net/interact.js/1.2.4/interact.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/interact.js/1.10.11/interact.min.js"></script>
        <script src="makeplanscript.js"></script>
</html>