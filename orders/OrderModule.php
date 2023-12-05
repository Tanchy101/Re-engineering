<?php
session_start();
include('../config/checklogin.php');
include('../config/config.php');
check_login();
?>

<head>
  <title>Orders</title>
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
<body>
<?php
        $activePage = 'page8';
        require_once('../partials/_sidebar.php');
    ?>
    <?php
    if(isset($_POST['received'])){
        $order_received =$_POST['received'];
        $received = mysqli_query($mysqli, "DELETE orders, order_item FROM orders INNER JOIN order_item ON order_item.order_id = orders.order_id WHERE orders.order_id=$order_received");
    }


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
<?php
  $activePage = 'page8';
  require_once('../partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <h2>ORDERS</h2>


<div class="mytabs">
    <input type="radio" id="tabfree" name="mytabs" checked="checked">
    <label for="tabfree" style="background-color: #ffff9; text-align: center;"><h1>PENDING</h1></label>
    <div class="tab">
    
   <!-- <div style = "overflow-x:auto;"> -->
    <table class = "table table-responsive" style ="width: 100%; border: collapse; zoom:85%; border-color: transparent;"  >
        <thead > 
            <div class="table-header">
            <tr class="pendings" style="display: table;">
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
                                    <td colspan = '4'>
                                        <div style='font-weight: bold;'>Order ID: " . $pendingByOrderIdKey . "</div>
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
    <label for="tabsilver"  style="background-color: #fab6ab;"><h1>TO PACK</h1></label>
    <div class="tab">
    
      <table name="topack-table" class = "table table-responsive" style ="width: 100%; border: collapse; zoom:85%">
        <thead> 
            <tr class="topacks" style="display: table;"> 
                <th><h3>PRODUCT</h3></th>
                <th><h3>PRICE</h3></th>
                <th><h3>QUANTITY</h3></th>
                <th><h3>AMOUNT</h3></th>
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
                                    <td colspan = '4' style='font-weight: bold;'>
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
                                    <span style = 'float: right; margin-bottom: 3em; font-weight: bold;'> Total Amount: ₱" . number_format($toShipByOrderIdItem['total'], 0). "</span>
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
   
        <table name="toreceive-table" class = "table table-responsive" style ="width: 100%; border: collapse; zoom:85%">
            <thead> 
                <tr class="toreceives" style="display: table;">
                    <th><h3>PRODUCT</h3></th>
                    <th><h3>PRICE</h3></th>
                    <th><h3>QUANTITY</h3></th>
                    <th><h3>AMOUNT</h3></th>
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
                        echo "<tr><td colspan = '4'>You don't have any current orders for now</tr></td>";
                    }else {
                        // Loop through each order 
                        foreach($toReceiveByOrderId as $toReceiveByOrderIdKey => $toReceiveByOrderIdItems) {
                            echo "
                                    <tr>
                                        <td colspan = '4' style='font-weight: bold;'>
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
                                        <span style='float:left;'>
                                            <form action='OrderModule.php' method='POST'>
                                                <input type='hidden' name='received' value='".$toReceiveByOrderIdItem['order_id']."'>
                                                <button type='submit'>RECEIVED</button>
                                            </form>
                                        </span>
                                        <span style = 'float: right; margin-bottom: 3em; font-weight: bold;' > Total Amount: ₱" . number_format($toReceiveByOrderIdItem['total'], 0). "</span>
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
    background: #36517C;
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
    th:first-child,
    td:first-child {
      width: 70%;
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
    float: center;
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
.btn {
    background-color: #C83264;
    padding: 6px;
    border-radius: 15px;
    /* margin-bottom: 0.1em; */
    color: white;
    font-size: 10px; 
    }
.btn:hover {
    background-color: #C80032;
    color: white;
  }
  tbody {
    display: block;
    height: 28em;
    overflow: auto;
  }

</style>
<script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>
