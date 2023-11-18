$(document).ready(function() {
	// Initialize the cart
	var cart = [];

	// Load any saved items from localStorage
	if (localStorage.getItem("cart") !== null) {
		cart = JSON.parse(localStorage.getItem("cart"));
	}

	// Update the cart total and display the items
	updateCart();

	// Add event listener for the "Add to Cart" button
	$(".add-to-cart").click(function(event) {
		event.preventDefault();
		var productId = $(this).data("id");
		var productPrice = parseFloat($(this).data("price"));
		var productName = $(this).data("name");

		// Check if the item is already in the cart
		var itemIndex = cart.findIndex(item => item.id === productId);
		if (itemIndex === -1) {
			// Item is not in the cart, add it
			cart.push({
				id: productId,
				name: productName,
				price: productPrice,
				quantity: 1
			});
		} else {
			// Item is already in the cart, increase the quantity
			cart[itemIndex].quantity += 1;
		}

		// Save the updated cart to localStorage
		localStorage.setItem("cart", JSON.stringify(cart));

		// Update the cart total and display the items
		updateCart();
	});

	// Add event listener for the "Remove" button
	$("#cart").on("click", ".remove-from-cart", function(event) {
		event.preventDefault();
		var productId = $(this).data("id");

		// Remove the item from the cart
		var itemIndex = cart.findIndex(item => item.id === productId);
		cart.splice(itemIndex, 1);

		// Save the updated cart to localStorage
		localStorage.setItem("cart", JSON.stringify(cart));

		// Update the cart total and display the items
		updateCart();
	});

	// Function to update the cart total and display the items
	function updateCart() {
		var cartTable = $("#cart tbody");
		cartTable.empty();

		var cartTotal = 0;
		for (var i = 0; i < cart.length; i);
        {
            var item = cart[i];
            var row = $("<tr>");
            row.append($("<td>").text(item.name));
            row.append($("<td>").text("$" + item.price.toFixed(2)));
            row.append($("<td>").text(item.quantity));
            row.append($("<td>").text("$" + (item.price * item.quantity).toFixed(2)));
            row.append($("<td>").append($("<a>").attr("href", "#").attr("data-id", item.id).addClass("remove-from-cart").text("Remove")));
            cartTable.append(row);
			cartTotal += item.price * item.quantity;
		}
	
		$("#total").text(cartTotal.toFixed(2));
	}
	});