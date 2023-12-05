<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $productType = $_POST['productType'];

    // Fetch product types for the dropdown
    $productTypes = array();
    $stmt = $mysqli->prepare("SELECT DISTINCT prod_type FROM product");
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = mysqli_fetch_assoc($res)) {
        $productTypes[] = $row['prod_type'];
    }

    // Search for products based on input and product type
    $query = "SELECT * FROM product WHERE (prod_name LIKE ? OR prod_type LIKE ?)";
    $params = array("%$input%", "%$input%");

    // Append the product type filter if it's selected
    if (!empty($productType)) {
        $query .= " AND prod_type = ?";
        $params[] = $productType;
    }

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    $stmt->execute();
    $res = $stmt->get_result();

    if (mysqli_num_rows($res) > 0) {
        ?>
        <table class="table align-items-center table-flush" style="background-color: transparent;;">
            <thead class="thead-light">
            <tr>
                <th scope="col" style="color: white; background-color: #484A4C; border: none; border-top-left-radius: 10px;">Image</th>
                <th scope="col" style="color: white; background-color: #484A4C; border: none;">Name</th>
                <th scope="col" style="color: white; background-color: #484A4C; border: none;">Price</th>
                <th scope="col" style="color: white; background-color: #484A4C; border: none;">Quantity</th>
                <th scope="col" style="color: white; background-color: #484A4C; border: none;">Product Type</th>
                <th scope="col" style="color: white; background-color: #484A4C; border: none;">Action</th>                      
                <th scope="col" style="color: white; background-color: #484A4C; border: none;">Product Link</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $prod_id = $row['prod_id'];
                $prod_img = $row['prod_img'];
                $prod_type = $row['prod_type'];
                $prod_name = $row['prod_name'];
                $prod_price = $row['prod_price'];
                ?>
                <tr>
                    <td style="color: white; border-color: rgb(153, 148, 143,.5);">
                        <?php
                        if ($prod_img) {
                            echo "<img src='assets/img/products/$prod_img' height='60' width='60 class='img-thumbnail'>";
                        } else {
                            echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                        }
                        ?>
                    </td>
                    <td style="color: white; border-color: rgb(153, 148, 143,.5);"><?php echo $prod_name; ?></td>
                    <td style="color: white; border-color: rgb(153, 148, 143,.5);">₱<?php echo $prod_price; ?></td>
                    <td style="color: white; border-color: rgb(153, 148, 143,.5);">
                        <input type="number" class="form-control quantity-input" min="1" value="1" max="999" style="width:70px;">
                    </td>
                    <td style="color: white; border-color: rgb(153, 148, 143,.5);"><?php echo $prod_type; ?></td>
                    <td style="color: white; border-color: rgb(153, 148, 143,.5);">
                        <button class="btn btn-sm btn-warning add-to-cart" data-price="<?php echo $prod_price; ?>" data-name="<?php echo $prod_name; ?>" data-image="<?php echo $prod_img; ?>">
                            <i class="fas fa-cart-plus"></i>
                            Add to Cart
                        </button>
                    </td>
                    <td style="color: white; border-color: rgb(153, 148, 143,.5);">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-link"></i>
                            Link
                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    } else {
        $err = "No Data Found";
    }
}
require_once('partials/_head.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
// Add to Cart button click event
$(".add-to-cart").click(function() {
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

  // Save cart data in session
  $.ajax({
    url: "cart.php?item=" + JSON.stringify(item), // Include the image in the item object
    method: "GET",
    success: function(response) {
      alert("Item added to cart");
      }
    });
  });
});
</script>

