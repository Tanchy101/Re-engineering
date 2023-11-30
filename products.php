<!DOCTYPE html>
<html>
<head>
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
</head>

<!-- wag pi
    <script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->
    
<body>
  <?php
    $activePage = 'page4';
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/productsbg.png); background-size: cover; height: 100vh;">
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="main-content">

      <!-- Page content -->
      <div class="container-fluid mt--8">
        <!-- Table -->
        <div class="row">
          <div class="col">
              <div class="card-header" style="overflow-x: hidden; overflow-y: scroll; visible; height: 75vh; border-radius: 25px;
              margin-top: -40em;">
                <label style="font-size: x-large; font-weight: bold;"> Products </label>
                <div class="col-md-12">
                <div class="row">
                  <!-- Search input -->
                  <div class="col-md-10 mb-3">
                    <input type="text" class="form-control" id="live_search_product" autocomplete="off" placeholder="Search">
                  </div>

                  <!-- Select dropdown -->
                  <div class="col-md-2 mb-3">
                    <select class="form-control" id="filter_product_type">
                    <option disabled selected value="">Select Type</option>
                      <option value="">All</option>
                      <option value="CPU">CPU</option>
                      <option value="SSD">SSD</option>
                      <option value="HDD">HDD</option>
                      <option value="Case">Case</option>
                      <option value="Switch">Switch</option>
                      <option value="Monitor">Monitor</option>
                      <option value="UPS">UPS</option>
                      <option value="Chair">Chair</option>
                      <option value="Table">Table</option>
                    </select>
                  </div>
                </div>
                              
  

                  <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="table-data-product" style="zoom:70%">
                      <thead class="thead-light">
                        <?php
                        $ret = "SELECT * FROM product";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->execute();
                        $res = $stmt->get_result();
                        ?>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Product Type</th>
                            <th scope="col">Action</th>                      
                            <th scope="col">Product Link</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($row = mysqli_fetch_assoc($res)) {
                          $prod_id = $row['prod_id'];
                          $prod_img = $row['prod_img'];
                          $prod_name = $row['prod_name'];
                          $prod_price = $row['prod_price'];
                          $prod_type = $row['prod_type'];
                          // $prod_url= $row['prod_url'];
                        ?>
                          <tr>
                            <td>
                              <?php
                              if ($prod_img) {
                                echo "<img src='assets/img/products/$prod_img' height='60' width='60 class='img-thumbnail'>";
                              } else {
                                echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                              }
                              ?>
                            </td>
                            <td><?php echo $prod_name; ?></td>
                            <td>₱<?php echo $prod_price; ?></td>
                            <td>
                              <input type="number" class="form-control quantity-input" min="1" value="1" max="999" style="width:70px;">
                            </td>
                            <td><?php echo $prod_type; ?></td>
                            <td>
                              <button class="btn btn-sm btn-warning add-to-cart" data-price="<?php echo $prod_price; ?>" data-name="<?php echo $prod_name; ?>" data-image="<?php echo $prod_img; ?>">
                                <i class="fas fa-cart-plus"></i>
                                Add to Cart
                              </button>
                            </td>
                            <td>
                              <button class="btn btn-sm btn-primary">
                                <i class="fas fa-link"></i>
                                Link
                              </button>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    // Add to Cart button click event
    $(".add-to-cart").click(function() {
      console.log("Add to Cart button clicked"); // Log a message when the button is clicked

      var price = parseFloat($(this).data("price"));
      var name = $(this).data("name");
      var image = $(this).data("image");
      var quantity = parseInt($(this).closest("tr").find(".quantity-input").val());

      if (isNaN(quantity) || quantity <= 0) {
        alert("Invalid quantity. Please enter a valid number greater than zero.");
        return;
      }

      var item = {
        name: name,
        price: price,
        image: image,
        quantity: quantity
      };

      console.log("Item:", item); // Log the item object

      // Save cart data in session
      $.ajax({
        url: "cart.php?item=" + encodeURIComponent(JSON.stringify(item)), // Encode the item data
        method: "GET",
        success: function(response) {
          console.log("Response:", response); // Log the response from the server
          alert("Item added to cart");
        }
      });
    });

    $(document).ready(function() {
    // Fetch and populate the product types dropdown on page load
    $.ajax({
      url: "productso.php",
      method: "POST",
      dataType: "json",
      success: function(data) {
        console.log("Product Types:", data); // Log the fetched product types
        var dropdown = $("#filter_product_type");
        dropdown.empty(); // Clear existing options
        dropdown.append('<option value="">All</option>'); // Add default "All" option

        // Populate dropdown with fetched product types
        $.each(data, function(index, value) {
          dropdown.append('<option value="' + value + '">' + value + '</option>');
        });
      }
    });

    // Live search product keyup event
    $("#live_search_product").keyup(function() {
      console.log("Live search product keyup event");
      performSearch();
    });

    // Product type filter change event
    $("#filter_product_type").change(function() {
      console.log("Product type filter change event");
      performSearch();
    });

    function performSearch() {
      var input = $("#live_search_product").val();
      var productType = $("#filter_product_type").val();

      // Check if a productType is selected before performing the AJAX request
      if (productType !== "") {
        $.ajax({
          url: "productso.php",
          method: "POST",
          data: {
            input: input,
            productType: productType
          },
          success: function(data) {
            console.log("Response:", data);
            $("#table-data-product").html(data);
          }
        });
      } else {
        // If no productType is selected, just update the table with the filtered data based on the live search input
        var tableRows = $("#table-data-product tbody tr");
        var filteredRows = tableRows.filter(function() {
          var name = $(this).find("td:nth-child(2)").text().toLowerCase();
          return name.includes(input.toLowerCase());
        });
        $("#table-data-product tbody").html(filteredRows);

        // If "All" option is selected, reload the page to show all products
        if (productType === "") {
          window.location.reload();
        }
      }
    }
  }); 
 });
</script>

</body>
</html>
