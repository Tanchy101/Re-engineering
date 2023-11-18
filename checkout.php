
<?php
// checkout.php

// Load the cart from localStorage
$cart = json_decode($_POST["cart"], true);

// Process the checkout and display a confirmation message
$total = 0;
foreach ($cart as $item) {
	$total += $item["price"] * $item["quantity"];
}

echo "<h1>Thank you for your purchase!</h1>";
echo "<p>Total: $" . number_format($total, 2) . "</p>";
?>