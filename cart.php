<!DOCTYPE html>
<html>
  <?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
// Delete customer
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $adn = "DELETE FROM product WHERE prod_id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Deleted" && header("refresh:1; url=products.php");
  } else {
    $err = "Try Again Later";
  }
}
require_once('partials/_head.php');
?>

    <!--wag pi<script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->

<style>
.btn{
  background-color: #7ED957;
  border-radius: 15px;
}
.btn-remove:hover{
  background-color: white;
}

#err {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: white;
  color: black;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  top: 30px;
  font-size: 17px;
}

#err.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.4s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {top: 0; opacity: 0;} 
  to {top: 30px; opacity: 1;}
}

@keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {top: 30px; opacity: 1;} 
  to {top: 0; opacity: 0;}
}

@keyframes fadeout {
  from {top: 30px; opacity: 1;}
  to {top: 0; opacity: 0;}
}
</style>
<body>
  <!-- Sidenav -->
  <?php
    $activePage = 'page5';
  require_once('partials/_sidebar.php');
  
  ?>
  <!-- Main content -->
  <div class="main-content">

    <!-- Header -->
    <div style="background-image: url(assets/img/theme/productsbg.png); height: 100vh; background-size: cover; display: flex;" class="header  pb-8 pt-5 pt-md-8">
      <span class="mask bg-gradient-dark opacity-5"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <?php

if (isset($_GET['item'])) {
  $item = json_decode($_GET['item'], true);

  // Process the item data and add it to the cart
  // You can store the cart data in the session or a database

  // Example: Storing the cart data in the session
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

  $_SESSION['cart'][] = $item;

  // You can also redirect the user to a different page or display a success message
  // header("Location: cart.php");
  // exit();
}

// Remove item from the cart
if (isset($_GET['remove'])) {
  $removeIndex = $_GET['remove'];

  if (isset($_SESSION['cart'][$removeIndex])) {
    unset($_SESSION['cart'][$removeIndex]);
  }
}


// Calculate the total amount in the cart
$totalAmount = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
  }
}
?>

    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
            <div class="card-header border-0" style="margin-top: -31em; border-radius: 25px; overflow-x: hidden; 
            overflow-y: scroll; visible; height: 75vh; border-radius: 25px; background-color: rgba(22,27,34,.8); color: white;">
              <?php $admin_id = $_SESSION['admin_id'];
                $ret = "SELECT * FROM admin WHERE admin_id = ?";
                $stmt = $mysqli->prepare($ret);
                $stmt->bind_param('s', $admin_id);
                $stmt->execute();
                $res = $stmt->get_result();
                while ($admin = $res->fetch_object()) {
                ?>
              <label style=" margin-left: 1em; font-weight: bold; color: white;"><?php echo $admin ->admin_name;?> 's Cart </label>
              <div class="col-md-12">
                <table class="table align-items-center table-flush table-borderless" id="table-data-product">
                  <thead class="thead-light">
                    <tr>
                 
                      <th scope="col" style="color: white; background-color: rgb(153, 148, 143,.5); border: none; border-top-left-radius: 10px;">Name</th>
                      <th scope="col" style="color: white; background-color: rgb(153, 148, 143,.5); border: none;">Price</th>
                      <th scope="col" style="color: white; background-color: rgb(153, 148, 143,.5); border: none;">Quantity</th>
                      <th scope="col" style="color: white; background-color: rgb(153, 148, 143,.5); border: none;">Amount</th>
                      <th scope="col" style="color: white; background-color: rgb(153, 148, 143,.5); border: none; border-top-right-radius: 10px;"></th>
                    </tr>
                  </thead>
                 <tbody><!-- Added missing opening <tbody> tag -->
                    <?php
                  $user_address = $admin -> address;
                  $totalAmount = 0; // Initialize totalAmount variable
                  // if(empty($user_address) && !empty($_SESSION['cart'])){
                  //   foreach ($_SESSION['cart'] as $index => $item) {
                  //     echo "<tr>";
                  //     echo "<td>" . $item['name'] . "</td>";
                  //     echo "<td>₱" . $item['price'] . "</td>";
                  //     echo "<td style='width: 9.5em;'>" . $item['quantity'] . "</td>";
                  //     echo "<td>₱" . number_format($item['price'] * $item['quantity']) .  "</td>"; // Calculate and display the amount for each item
                  //     echo "<td><a href='cart.php?remove=" . $index . "' style='background-color: #F5365C; padding: 3px 18px 3px; 
                  //     font-weight: bold; color: white; border-radius: 10px; font-size: 12px;'>Remove</a></td>";
                  //     echo "</tr>";
                  //     $totalAmount += $item['price'] * $item['quantity']; // Update the total amount
                  //   }
                   
                  //   echo "<tr><td colspan='3' style='text-align: right; font-weight: bold;'>Total Amount:</td>";
                  //   echo "<td style='font-weight: bold;'>₱" . number_format($totalAmount, 0) . "</td></tr>";
                  //   echo "<tr> <td> <form action='#' method='POST'> 
                  //   <button class='btn btn-success'; border: none' onclick='popUp()'>Place Order</button>
                  //   <div id='err'>You Have No Address!</div>
                  //   </form>
                  //   <br>
                  //   <span>
                  //     <form action='removeAllItemCart.php' method='POST' name='reset'>
                  //     <button class='btn' border: none style='background-color: red; color:white;' name='reset'>Remove All</button>
                      
                  //     </form>
                  //   </span>
                  //   </td> </tr>";
                  // } 
                  if (isset($_SESSION['cart']) && !empty($_SESSION['cart']) && !empty($user_address)) {
                      foreach ($_SESSION['cart'] as $index => $item) {
                        echo "<tr>";
                        echo "<td>" . $item['name'] . "</td>";
                        echo "<td>₱" . $item['price'] . "</td>";
                        echo "<td style='width: 9.5em;'>" . $item['quantity'] . "</td>";
                        echo "<td>₱" . number_format($item['price'] * $item['quantity']) .  "</td>"; // Calculate and display the amount for each item
                        echo "<td><a href='cart.php?remove=" . $index . "' style='background-color: #F5365C; padding: 3px 18px 3px; 
                        font-weight: bold; color: white; border-radius: 10px; font-size: 12px;'>Remove</a></td>";
                        echo "</tr>";
                        $totalAmount += $item['price'] * $item['quantity']; // Update the total amount
                      }
                     
                      echo "<tr><td colspan='3' style='text-align: right; font-weight: bold;'>Total Amount:</td>";
                      echo "<td style='font-weight: bold;'>₱" . number_format($totalAmount, 0) . "</td></tr>";
                      echo "<tr> <td> <form action='purchase.php' method='POST'> 
                      <button class='btn btn-success'; border: none' name='purchase'>Place Order</button>
                      </form>
                      <br>
                      <span>
                        <form action='removeAllItemCart.php' method='POST' name='reset'>
                        <button class='btn' border: none style='background-color: red; color:white;' name='reset'>Remove All</button>
                        
                        </form>
                      </span>
                      </td> </tr>";
                    }
                     else {
                      echo "<tr><td colspan='6'>Cart is empty or your address is not updated, please check your profile</td></tr>";
                      }
                  }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 
<script type="text/javascript">
  function popUp() {
  var msgpop = document.getElementById("err");
  msgpop.className = "show";
  setTimeout(function(){ msgpop.className = msgpop.className.replace("show", ""); }, 3000);
}
</script>
</body>
</html>