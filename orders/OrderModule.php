<!DOCTYPE html>
<html>
<html lang="en">
<?php
session_start();
include('../config/checklogin.php');
include('../config/config.php');
?>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Tabs</title>

</head>

<body>
    <?php
        $activePage = 'page8';
        require_once('../partials/_sidebar.php');
    ?>

    <?php

    if(isset($_POST['user_cancel'])){
        $del_id=$_POST['user_cancel'];
        $remove = mysqli_query($mysqli, "DELETE orders, order_item FROM orders INNER JOIN order_item ON order_item.order_id = orders.order_id WHERE orders.order_id=$del_id");
    }

    $admin_id = $_SESSION['admin_id'];
    $ret = "SELECT * FROM admin WHERE admin_id = ?";
    $stmt = $mysqli->prepare($ret);
    $stmt->bind_param('s', $admin_id);
    $stmt->execute();
    $res = $stmt->get_result();
    $admin = $res->fetch_object();

    $username = $admin->admin_name;
    $retri = "SELECT orders.order_id, order_item.price, order_item.name, order_item.quantity, orders.order_status, orders.total, orders.order_username 
    FROM orders JOIN order_item ON orders.order_id = order_item.order_id AND order_username = '" . $username . "'";
    
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
  <div class="mytabs">
    <input type="radio" id="tabfree" name="mytabs" checked="checked">
    <label for="tabfree">Pending Orders</label>
    <div class="tab">
   
   <!-- <div style = "overflow-x:auto;"> -->
    <table class = "table table-responsive" style ="width: 100%; border: collapse; zoom:85%" >
        <thead> 
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
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
                                    <td colspan = '4'>
                                        <div>Order ID: " . $pendingByOrderIdKey . "</div>
                                    </td>
                                </tr>
                            ";

                        // Loop through each of the current order's order items
                        foreach($pendingByOrderIdItems as $pendingByOrderIdItem) {
                            echo "
                                    <tr>
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
                                <td colspan = '4'>
                                    <span style='float:left;'>
                                        <form action='OrderModule.php' method='POST'>
                                        <input type='hidden' name='user_cancel' value='".$pendingByOrderIdItem['order_id']."'>
                                        <button type='submit'>CANCEL</button>
                                        </form>
                                    </span>
                                    <span style = 'float: right;'> Total Amount: ₱" . number_format($pendingByOrderIdItem['total'], 0). "</span>
                                </td>
                            </tr>";
                    }
                }
                ?>
              
             
    </tbody>
</table>



        </div>

    <input type="radio" id="tabsilver" name="mytabs">
    <label for="tabsilver">To Pack</label>
    <div class="tab">
    
      <table class = "table table-responsive" style ="width: 100%; border: collapse; zoom:85%">
        <thead> 
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                    $toShipByOrderId = [];
                // Group each pending order items by their orders (using order_id)
                foreach($toShipOrderItems as $toShipOrderItem) {
                    $toShipByOrderId[$toShipOrderItem['order_id']][] = $toShipOrderItem;
                }
                
                if (count($toShipByOrderId) == 0){
                    echo "<tr><td colspan = '4'><center>You don't have any current orders for now</center></tr></td>";
                }else {
                    // Loop through each order 
                    foreach($toShipByOrderId as $toShipByOrderIdKey => $toShipByOrderIdItems) {
                        echo "
                                <tr>
                                    <td colspan = '4'>
                                        <div>Order ID: " . $toShipByOrderIdKey . "</div>
                                    </td>
                                </tr>
                            ";

                        // Loop through each of the current order's order items
                        foreach($toShipByOrderIdItems as $toShipByOrderIdItem) {
                            echo "
                                    <tr>
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
                                <td colspan = '4'>
                                    <span style = 'float: right;'> Total Amount: ₱" . number_format($toShipByOrderIdItem['total'], 0). "</span>
                                </td>
                            </tr>";
                    }
                }
                ?>
        </tbody>
</table>

    
    </div>

    <input type="radio" id="tabgold" name="mytabs">
    <label for="tabgold">To Receive</label>
    <div class="tab">
   
        <table class = "table table-responsive" style ="width: 100%; border: collapse; zoom:85%">
            <thead> 
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        $toReceiveByOrderId = [];
                    // Group each pending order items by their orders (using order_id)
                    foreach($toReceiveOrderItems as $toReceiveOrderItem) {
                        $toReceiveByOrderId[$toReceiveOrderItem['order_id']][] = $toReceiveOrderItem;
                    }
                    
                    if (count($toReceiveByOrderId) == 0){
                        echo "<tr><td colspan = '4'><center>You don't have any current orders for now</center></tr></td>";
                    }else {
                        // Loop through each order 
                        foreach($toReceiveByOrderId as $toReceiveByOrderIdKey => $toReceiveByOrderIdItems) {
                            echo "
                                    <tr>
                                        <td colspan = '4'>
                                            <div>Order ID: " . $toReceiveByOrderIdKey . "</div>
                                        </td>
                                    </tr>
                                ";

                            // Loop through each of the current order's order items
                            foreach($toReceiveByOrderIdItems as $toReceiveByOrderIdItem) {
                                echo "
                                        <tr>
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
                                    <td colspan = '4'>
                                        <span style = 'float: right;'> Total Amount: ₱" . number_format($toReceiveByOrderIdItem['total'], 0). "</span>
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
    background: #ccc;
    font-family: 'Roboto', sans-serif;
}


th, td {
        padding-right: 8px;
    }

    th {
        padding-right: auto;
    }

    td {
        padding: auto;
    }

    td, th {
border:.1em solid #dddddd;
text-align:left;
padding: 1em;
width: 20%;
}

.mytabs {
    display: flex;
    flex-wrap: wrap;
    max-width: 68%;
    margin: 1em auto;
    position: center;
}
.mytabs input[type="radio"] {
    display: none;
}
.mytabs label {
    padding: 2em;
    background: #e2e2e2;
    font-weight: bold;
}

.mytabs .tab {
    width: 100%;
    padding: 2em;
    background: #fff;
    order: 1;
    display: none;
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

table {

      width: 100%;
    }

    th {
      background-color: #f2f2f2;
    }    
    th:first-child,
    td:first-child {
      width: 70%;
    }
    tr.total-row td{
        text-align: right;
    }



</style>
 
    
</body>
<?php include('../partials/_BootStrap.php'); ?>

<script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>
