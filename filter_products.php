<?php
if (isset($_POST['prod_type'])) {
  include('config/config.php');
  $selectedType = $_POST['prod_type'];
  if ($selectedType === "") {
    // If the user selects "All Products," fetch all products
    $query = "SELECT * FROM product";
  } else {
    // Otherwise, fetch products matching the selected prod_type
    $query = "SELECT * FROM product WHERE prod_type = ?";
  }

  $stmt = $mysqli->prepare($query);

  if ($selectedType !== "") {
    $stmt->bind_param('s', $selectedType);
  }

  $stmt->execute();
  $res = $stmt->get_result();

  // Display the filtered products
  while ($row = mysqli_fetch_assoc($res)) {
    // Fetch the product data and display it as before
    // ...
  }
}
?>
