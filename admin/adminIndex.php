<?php
session_start();
include('../config/checklogin.php');
include('../config/config.php');
check_login();
?>

<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.5">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="mainnew.js"></script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/icons/networklogo2.png">
  <link rel="manifest" href="assets/img/icons/site.webmanifest">
  <link rel="mask-icon" href="assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
</head>
<body style="background-image: url('../assets/img/theme/AdminBG.png'); background-size: cover; height: 100vh; opacity: 3">
<?php
  // deleting the placed order items in database when cancel button is pressed
  if(isset($_POST['cancelOrder'])){
    $del_id=$_POST['cancelOrder'];
    $remove = mysqli_query($mysqli, "DELETE orders, order_item FROM orders INNER JOIN order_item ON order_item.order_id = orders.order_id WHERE orders.order_id=$del_id");
  }

  //query for updating status into to ship from pednding
  if(isset($_POST['toPack'])){
    $packed_id=$_POST['toPack'];
    $updateStatus = mysqli_query($mysqli, "UPDATE orders SET order_status='To Ship' WHERE order_id=$packed_id");
  }

  // query for updating status into in transit from to ship
  if(isset($_POST['toShip'])){
    $packed_id=$_POST['toShip'];
    $updateStatus = mysqli_query($mysqli, "UPDATE orders SET order_status='To Receive' WHERE order_id=$packed_id");
  }

  //retrieving data from the two tables that has a relationship
  $retri = "SELECT orders.user_address, orders.order_id, order_item.price, order_item.name, order_item.quantity, orders.order_status, orders.total, orders.order_username, order_item.id
  FROM orders JOIN order_item ON orders.order_id = order_item.order_id";

  $res = mysqli_query($mysqli, $retri);
  $allOrderItems = mysqli_fetch_all($res, MYSQLI_ASSOC);
  mysqli_free_result($res);

  $pendingOrderItems = array_filter($allOrderItems, function($orderItem) {
    return $orderItem['order_status'] == "Pending";
  });

  $toShipOrderItems = array_filter($allOrderItems, function($orderItem) {
    return $orderItem['order_status'] == "To Ship";
  });

  $toReceiveOrderItems = array_filter($allOrderItems, function($orderItem) {
    return $orderItem['order_status'] == "To Receive";
  });
  
?>
<?php
  $activePage = 'page8';
  require_once('../partials/_adminsidebar.php');
  ?>
  <!-- Main content -->
  
  <div class="main-content">


    <h2>ADMIN PANEL</h2>

    
<div class="mytabs">
<!--Table for Pending-->
    <input type="radio" id="tabfree" name="mytabs" checked="checked">
    <label for="tabfree" style="background-color: #ffff9; text-align: center;"><h1>PENDING</h1></label>
    <div class="tab">
    
   <!-- <div style = "overflow-x:auto;"> -->
    <table class = "table table-responsive" style ="width: 100%; border: collapse; zoom:85%; border-color: transparent;"  >
        <thead > 
            <div class="table-header">
            <tr class="pendings" style="display: table;">
                <th><h3>USERNAME</h3></th>
                <th><h3>ADDRESS</h3></th>
                <th><h3>PRODUCT</h3></th>
                <th><h3>PRICE</h3></th>
                <th><h3>QUANTITY</h3></th>
                <th><h3>AMOUNT</h3></th>
                
            </tr>
            <div>
        </thead>
    
        <tbody>
            <?php  
                $pendingByOrderId = [];
                // Group each pending order items by their orders (using order_id)
                foreach($pendingOrderItems as $pendingOrderItem) {
                    $pendingByOrderId[$pendingOrderItem['order_id']][] = $pendingOrderItem;
                }
                
                if (count($pendingByOrderId) == 0){
                    echo "<tr><td colspan = '4'><center>You don't have any current orders for now</center></td></tr>";
                }else {
                    // Loop through each order 
                    foreach($pendingByOrderId as $pendingByOrderIdKey => $pendingByOrderIdItems) {
                        echo "
                                <tr>
                                    <td colspan = '6'>
                                        <div style='font-weight: bold;'>Order ID: " . $pendingByOrderIdKey . "</div>
                                    </td>
                                </tr>
                            ";
                        // Loop through each of the current order's order items
                        foreach($pendingByOrderIdItems as $pendingByOrderIdItem) {
                            echo "
                                    <tr>
                                        <td>
                                        "
                                        .$pendingByOrderIdItem['order_username']. 
                                        "
                                        </td>
                                        <td style='margin-left: -10em;'>
                                        "
                                        .$pendingByOrderIdItem['user_address'].
                                        "
                                        </td>
                                        <td>
                                            <span>" . $pendingByOrderIdItem['name'] . "</span>
                                        </td>
                                        <td>
                                            <span> ₱" . number_format($pendingByOrderIdItem['price'], 0) . "</span>
                                        </td>
                                        
                                        <td>
                                            <span>" . $pendingByOrderIdItem['quantity'] . "</span>
                                        </td>
                                        <td>
                                            <span> ₱" . number_format($pendingByOrderIdItem['price'] * $pendingByOrderIdItem['quantity'], 0) . "</span>
                                        </td>
                                        
                                        
                                    </tr>";     
                        }

                        echo "
                            <tr>
                                <td colspan = '6'>
                                    <span style='float:left;'>
                                        <form action='adminIndex.php' method='POST'>
                                        <input type='hidden' name='cancelOrder' value='".$pendingByOrderIdItem['order_id']."'>
                                        <button class='cancels' type='submit'>CANCEL</button>
                                        </form>
                                        <form action='adminIndex.php' method='POST'>
                                        <input type='hidden' name='toPack' value='".$pendingByOrderIdItem['order_id']."'>
                                        <button class='to-packs' type='submit'>TO PACK</button>
                                        </form>
                                    </span>
                                    <span style = 'float: right; font-weight: bold;'> Total Amount: ₱" . number_format($pendingByOrderIdItem['total'], 0). "</span>
                                </td>
                            </tr>";
                    }
                }

            ?>
</tbody>
</table>
</div>
<!--Table for To Pack-->
    <input type="radio" id="tabsilver" name="mytabs">
    <label for="tabsilver"  style="background-color: #fab6ab;"><h1>TO PACK</h1></label>
    <div class="tab">
    
    <table class = "table table-responsive" style ="width: 100%; border: collapse; zoom:85%; border-color: transparent;"  >
        <thead > 
            <div class="table-header">
            <tr class="topacks" style="display: table;">
                <th><h3>USERNAME</h3></th>
                <th><h3>ADDRESS</h3></th>
                <th><h3>PRODUCT</h3></th>
                <th><h3>PRICE</h3></th>
                <th><h3>QUANTITY</h3></th>
                <th><h3>AMOUNT</h3></th>
                
            </tr>
            <div>
        </thead>
    
        <tbody>
            <?php  
                $toShipByOrderId = [];
                // Group each pending order items by their orders (using order_id)
                foreach($toShipOrderItems as $toShipOrderItem) {
                    $toShipByOrderId[$toShipOrderItem['order_id']][] = $toShipOrderItem;
                }
                
                if (count($toShipByOrderId) == 0){
                    echo "<tr><td colspan = '4'><center>You don't have any current orders for now</center></td></tr>";
                }else {
                    // Loop through each order 
                    foreach($toShipByOrderId as $toShipByOrderIdKey => $toShipByOrderIdItems) {
                        echo "
                                <tr>
                                    <td colspan = '6'>
                                        <div style='font-weight: bold;'>Order ID: " . $toShipByOrderIdKey . "</div>
                                    </td>
                                </tr>
                            ";
                        // Loop through each of the current order's order items
                        foreach($toShipByOrderIdItems as $toShipByOrderIdItem) {
                            echo "
                                    <tr>
                                        <td>
                                        "
                                        .$toShipByOrderIdItem['order_username']. 
                                        "
                                        </td>
                                        <td style='margin-left: -10em;'>
                                        "
                                        .$toShipByOrderIdItem['user_address'].
                                        "
                                        </td>
                                        <td>
                                            <span>" . $toShipByOrderIdItem['name'] . "</span>
                                        </td>
                                        <td>
                                            <span> ₱" . number_format($toShipByOrderIdItem['price'], 0) . "</span>
                                        </td>
                                        
                                        <td>
                                            <span>" . $toShipByOrderIdItem['quantity'] . "</span>
                                        </td>
                                        <td>
                                            <span> ₱" . number_format($toShipByOrderIdItem['price'] * $toShipByOrderIdItem['quantity'], 0) . "</span>
                                        </td>
                                        
                                        
                                    </tr>";     
                        }

                        echo "
                            <tr>
                                <td colspan = '6'>
                                    <span style='float:left;'>
                                        <form action='adminIndex.php' method='POST'>
                                        <input type='hidden' name='toShip' value='".$toShipByOrderIdItem['order_id']."'>
                                        <button class='ship-out' type='submit'>SHIP OUT</button>
                                        </form>
                                        
                                    </span>
                                    <span style = 'float: right; font-weight: bold;'> Total Amount: ₱" . number_format($toShipByOrderIdItem['total'], 0). "</span>
                                </td>
                            </tr>";
                    }
                }

            ?>
</tbody>
</table>
</div>
    <input type="radio" id="tabgold" name="mytabs">
    <label for="tabgold" style="background-color: #5dcad1;"><h1>TO RECEIVE</h1></label>
    <div class="tab">
   
    <table class = "table table-responsive" style ="width: 100%; border: collapse; zoom:85%; border-color: transparent;"  >
        <thead > 
            <div class="table-header">
            <tr class="toreceives" style="display: table;">
                <th><h3>USERNAME</h3></th>
                <th><h3>ADDRESS</h3></th>
                <th><h3>PRODUCT</h3></th>
                <th><h3>PRICE</h3></th>
                <th><h3>QUANTITY</h3></th>
                <th><h3>AMOUNT</h3></th>
                
            </tr>
            <div>
        </thead>
    
        <tbody>
            <?php  
                $toReceiveByOrderId = [];
                // Group each pending order items by their orders (using order_id)
                foreach($toReceiveOrderItems as $toReceiveOrderItem) {
                    $toReceiveByOrderId[$toReceiveOrderItem['order_id']][] = $toReceiveOrderItem;
                }
                
                if (count($toReceiveByOrderId) == 0){
                    echo "<tr><td colspan = '4'><center>You don't have any current orders for now</center></td></tr>";
                }else {
                    // Loop through each order 
                    foreach($toReceiveByOrderId as $toReceiveByOrderIdKey => $toReceiveByOrderIdItems) {
                        echo "
                                <tr>
                                    <td colspan = '6'>
                                        <div style='font-weight: bold;'>Order ID: " . $toReceiveByOrderIdKey . "</div>
                                    </td>
                                </tr>
                            ";
                        // Loop through each of the current order's order items
                        foreach($toReceiveByOrderIdItems as $toReceiveByOrderIdItem) {
                            echo "
                                    <tr>
                                        <td>
                                        "
                                        .$toReceiveByOrderIdItem['order_username']. 
                                        "
                                        </td>
                                        <td style='margin-left: -10em;'>
                                        "
                                        .$toReceiveByOrderIdItem['user_address'].
                                        "
                                        </td>
                                        <td>
                                            <span>" . $toReceiveByOrderIdItem['name'] . "</span>
                                        </td>
                                        <td>
                                            <span> ₱" . number_format($toReceiveByOrderIdItem['price'], 0) . "</span>
                                        </td>
                                        
                                        <td>
                                            <span>" . $toReceiveByOrderIdItem['quantity'] . "</span>
                                        </td>
                                        <td>
                                            <span> ₱" . number_format($toReceiveByOrderIdItem['price'] * $toReceiveByOrderIdItem['quantity'], 0) . "</span>
                                        </td>
                                        
                                        
                                    </tr>";     
                        }

                        echo "
                            <tr>
                                <td colspan = '6'>                        
                                    </span>
                                        <span style = 'float: right; font-weight: bold;'> Total Amount: ₱" . number_format($toReceiveByOrderIdItem['total'], 0). "
                                    </span>
                                </td>
                            </tr>";
                    }
                }

            ?>
</tbody>
</table>
    </div>
  </div>
  <style>
  body {
    font-family: 'Poppins';
    overflow: hidden;
}
th, td {
        padding-right: 8px;
    }
    th {
        padding-right: auto;
        background-color: #ffff9;
        margin-top: 1em;
    }
    td {
        padding: auto;
        
    }
    td, th {
        border: none;
        text-align:left;
        padding: 1em;
        width: 20%;
}
    table {
      width: 100%;
    }    
    th:first-child{
        width: 30%;
    }
    td:first-child {
      width: 30%;
    }
    tr.total-row td{
        text-align: right;
        

    }
.mytabs {
    display: flex;
    flex-wrap: wrap;
    max-width: 85%;
    margin: 1em auto;
    position: center;
}
.mytabs input[type="radio"] {
    display: none;
}
.mytabs label {
    padding: 2em;
    background: white;
    font-weight: bold;
    border-top-left-radius: 20px; 
    border-top-right-radius: 25px;
    margin-bottom: -0.1em;
    height: 3em;
    margin-top: 8em;
    width: 17em;
    text-align: center;
    font-family: 'Montserrat';
}
h1{
    font-size: 17px;
    width: 14.8em;
    margin-top: -.35em;
    text-align: center;
    font-weight: bold;
    margin-left: -2em;
}
h2{
    font-size: 7em;
    color: white;
    font-weight: bold;
    margin-left: 6.9%;
    margin-bottom: -1em;
    font-family:'Montserrat';
}
h3{
    font-size: 1.09em;
    font-weight: bold;
    float: center;
}
.mytabs .tab {
    width: 100%;
    background: #fff;
    border-bottom-left-radius: 20px; 
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    max-height: 35em;
    order: 1;
    display: none;
    justify-content: center;
}
.mytabs .tab h2 {
    font-size: 3em;
}
.mytabs input[type='radio']:checked + label + .tab {
    display: block;
}
.mytabs input[type="radio"]:checked + label {
    background: #fff;
}
.pendings{
    background-color: #D6D4D2;
    height: 0em;
    border-top-right-radius: 20px;
}
.topacks{
    background-color: #FDE2DD;
    height: 0em;
    float: center;
    border-top-right-radius: 20px;
    
}
.toreceives{
    background-color: #BEEAED;
    height: 0em;
    float: center;
    border-top-right-radius: 20px;
}
.cancels {
    background-color: #FF0000;
    width: 10em;
    padding: 6px;
    border-radius: 15px;
    /* margin-bottom: 0.1em; */
    color: white;
    font-size: 10px; 
    margin-bottom: 3em;
    border: 0;
    }
.cancels:hover {
    background-color: #C80032;
    color: white;
  }

.to-packs {
    background-color: orange;
    width: 10em;
    padding: 6px;
    border-radius: 15px;
    /* margin-bottom: 0.1em; */
    color: white;
    font-size: 10px; 
    border: 0;
    margin-top: -7.2em;
    margin-left: 12em;
    }
.to-packs:hover {
    background-color: green;
    color: white;
  }
  .ship-out {
    background-color: #FF0000;
    width: 10em;
    padding: 6px;
    border-radius: 15px;
    /* margin-bottom: 0.1em; */
    color: white;
    font-size: 10px; 
    margin-bottom: 3em;
    border: 0;
    }
.ship-out:hover {
    background-color: #C80032;
    color: white;
  }
  .order-received {
    background-color: orange;
    width: 15em;
    padding: 6px;
    border-radius: 15px;
    /* margin-bottom: 0.1em; */
    color: white;
    font-size: 10px; 
    margin-bottom: 3em;
    border: 0;
    }
.order-received:hover {
    background-color: green;
    color: white;
  }


.receive {
    background-color: #7ED957;
    width: 10em;
    padding: 6px;
    border-radius: 15px;
    /* margin-bottom: 0.1em; */
    color: white;
    font-size: 10px; 
    margin-bottom: 3em;
    border: 0;
    }
.receive:hover {
    background-color: #4EAD26;
    color: white;

}
  tbody {
    display: block;
    height: 28em;
    overflow-y: scroll;
  }

</style>
<script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>
