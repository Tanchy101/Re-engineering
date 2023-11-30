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
<style>

    th, td {
        padding-right: 8px;
    }

    th {
        padding-right: auto;
    }

    td {
        padding: auto;
    }
</style>
<body>
    <?php
        require_once('../partials/_sidebar.php');
        $activePage = 'page8'; require_once('../partials/_sidebar.php'); 
    ?>

    <?php
     $admin_id = $_SESSION['admin_id'];
     $ret = "SELECT * FROM admin WHERE admin_id = ?";
     $stmt = $mysqli->prepare($ret);
     $stmt->bind_param('s', $admin_id);
     $stmt->execute();
     $res = $stmt->get_result();
     $admin = $res->fetch_object();

    $username = $admin->admin_name;
    $retri = "SELECT orders.order_id, order_item.price, order_item.name, order_item.quantity, orders.order_status, orders.total, orders.order_username 
    FROM orders JOIN order_item ON orders.order_id = order_item.order_id AND order_username = '" . $username . "';";
    
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
    <table class = "table table-responsive" style ="width: 100%; border: collapse; zoom:80%" >
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
                    echo "<tr><td colspan = '4'><center>You don't have any current orders for now</center></tr></td>";
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
    
      <table border-collapse: collapse; width: 100%;>
        <thead> <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr></thead>
        <tbody>
        <?php 
                // // Loop through each order 
                // foreach($toShipOrderItems as $pendingByOrderIdKey => $pendingByOrderIdItems) {
                //     echo "
                //             <tr>
                //                 <td colspan = '4'>
                //                     <div>Order ID: " . $pendingByOrderIdKey . "</div>
                //                 </td>
                //             </tr>
                //         ";

                //     // Loop through each of the current order's order items
                //     foreach($pendingByOrderIdItems as $pendingByOrderIdItem) {
                //         echo "
                //                 <tr>
                //                     <td>
                //                         <span>" . $pendingByOrderIdItem['name'] . "</span>
                //                     </td>

                //                     <td>
                //                         <span> ₱" . number_format($pendingByOrderIdItem['price'], 0) . "</span>
                //                     </td>

                //                     <td>
                //                         <span>" . $pendingByOrderIdItem['quantity'] . "</span>
                //                     </td>

                //                     <td>
                //                         <span> ₱" . number_format($pendingByOrderIdItem['price'] * $pendingByOrderIdItem['quantity'], 0) . "</span>
                //                     </td>
                //                 </tr>";     
                //     }

                //     echo "
                //         <tr>
                //             <td colspan = '4'>
                //                 <span style = 'float: right;'> Total Amount: ₱" . number_format($pendingByOrderIdItem['total'], 0). "</span>
                //             </td>
                //         </tr>";
                // }
                ?>
    </tbody>
</table>

    
    </div>

    <input type="radio" id="tabgold" name="mytabs">
    <label for="tabgold">To Receive</label>
    <div class="tab">
   
    <table border-collapse: collapse; width: 100%;>
        <thead> <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr></thead>
        <tbody>
            <tr>
                <td>Product Receiving</td>
                <td>$10.00</td>
                <td>2</td>
                <td>$20.00</td>
            </tr>
            </tr> <tr> <td></td> </tr>
       <!-- Total Amount-->     <tr class="total-row">
        <td colspan="3">Total Amount:</td>
        <td>$65.00</td>
      </tr>


</table>
    </div>

  </div>


<style>
  body {
    background: #ccc;
    font-family: 'Roboto', sans-serif;
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

td, th {
border:.1em solid #dddddd;
text-align:left;
padding: 1em;
width: 20%;
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
</html>
