<!DOCTYPE html> 
<html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');

?>
<head>
  <link rel="stylesheet" href="makeplanstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />
</head>
<style>
        body {
            /* Optional: Set a minimum width to prevent horizontal scrollbars due to zooming */
            min-width: 1000px;
        }
        h3, b{
          color: black;
        }
        h3{
          font-size: 25px;
          margin-top: -0.2em;
        }
        .collapsible:hover{
          background-color: #a6a6a6;
          transition: 0.2s;
        }
        #backButton{
          background-color: #F5365C;
        }
    </style>
    <!--wag pi <script>
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
    <div style="background-image: url(assets/img/theme/GenerateBG.png); background-size: cover; height: 100vh;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-5"></span>
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
          <div class="card shadow" style="margin-top: -37em; max-height: 43em; padding: 1em;">
            <div class="card-header border-6">
              <h3>Customize your Layout: 5x6 Dimension</h3>
            </div>
            <div class = "col-sm-12 container" id = "form-container">
              <div class="row">
                     <div class="col-sm-5" style = "padding-right: 150px; padding-left: 30px; max-width:482px" > <b style = "margin-top: 10px;"> ITEMS LIST: </b>
                      <div id = "accordion">
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

                    <div class="col-sm-6">
                      <div id = "plane-container" style = "height: 143mm; width: 171mm;">
                        <p>5x6</p>
                      </div>
                      <div class = "row">
                        <div class ="elementToOverlay2 col-sm-2 dropzone element-trash" style = "margin-left: -8em; margin-top: -120px; 
                        height: 120px; background-color: transparent; border: none; ">
                            <div style="text-align: center; color: black;">
                              <div style="font-size: 40px;">
                                <span><i class="fas fa-trash-alt"></i></span>
                              </div>
                              <span style="font-size: 16px;"><b>DROP TO</b></span><br>
                              <span style="font-size: 16px;"><b>DELETE</b></span>
                            </div>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <div class ="elementToOverlay2 col-sm-2 dropzone element-trash" style = "margin-left: 71em; margin-top: -120px; 
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
            <hr>
            <div class="form-row text-left">
              <div class="col-md-12" style = "margin-top: 0px; margin-left: 40px; width: 1em;">
              <button type="button" id = "printButton" class="btn btn-primary" onclick="captureAndPrint()">Print</button>
              <a href="generateplantest.php"><button type="button" id = "backButton" class="btn" style="color: white;">Back</button></a>
              </div>
            </div>
            <input type="hidden" name="input" value="<?php echo $input; ?>">
          </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
  </body>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
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
        <script src="makeplanscript.js"></script>
</html>