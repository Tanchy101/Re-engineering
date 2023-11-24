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

<script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script>
<body>
  <!-- Sidenav -->
  <?php
    $activePage = 'page5';
  require_once('partials/_sidebar.php');
  
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/bg4.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
      <span class="mask bg-gradient-dark opacity-8"></span>
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
          <div class="card shadow">
            <div class="card-header border-0">
              <label> Cart </label>
              <div class="col-md-12">
                <table class="table align-items-center table-flush" id="table-data-product">
                  <thead class="thead-light">
                    <tr>
                 
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Amount</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                 <tbody><!-- Added missing opening <tbody> tag -->
                    <?php
                    $totalAmount = 0.00; // Initialize totalAmount variable

                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                      foreach ($_SESSION['cart'] as $index => $item) {
                        echo "<tr>";
                        echo "<td>" . $item['name'] . "</td>";
                        echo "<td>₱" . $item['price'] . "</td>";
                        echo "<td>" . $item['quantity'] . "</td>";
                        echo "<td>₱" . number_format($item['price'] * $item['quantity'], 2) . "</td>"; // Calculate and display the amount for each item
                        echo "<td><a href='cart.php?remove=" . $index . "'>Remove</a></td>";
                        echo "</tr>";

                        $totalAmount += $item['price'] * $item['quantity']; // Update the total amount
                      }

                      echo "<tr><td colspan='4' style='text-align: right; font-weight: bold;'>Total Amount:</td>";
                      echo "<td>₱" . number_format($totalAmount, 2) . "</td></tr>";
                      echo "<tr> <td> <button type='button' class='btn btn-primary'>Place Order</button>
                      </td> </tr>";

    

                    } else {
                      echo "<tr><td colspan='6'>Cart is empty</td></tr>";
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
</body>
</html>