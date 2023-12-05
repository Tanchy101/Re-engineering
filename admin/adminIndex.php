<?php
include('../config/config.php');


session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/icons/networklogo2.png">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Admin View</title>
</head>
 
</head>
<style>
  .btn{
    background-color: #C83264;
    padding: 6px;
    border-radius: 15px;
    /* margin-bottom: 0.1em; */
    color: white;
    font-size: 10px;  
      
  }
  td, a{
    font-size: 13px;
    text-decoration: none;
  }
  
  .btn:hover {
    background-color: #C80032;
  }
  td{
    border: 1px solid gray;
    padding: 5px;
  }
  table {
    border-collapse: collapse;
  
  }

  
  body {
    background: #ccc;
    font-family: Montserrat;
    margin: 0;
    padding: 10px;
    background-color: #36517C;
}

  header {
    background-color: #36517C;
    color: #fff;
    padding: 0px;
    margin-top: 30px;
    margin-bottom: 50px;
    text-align: left;
    align-items: left; margin-left: 320px;
      
}

 .styled-box { 
  background-color: #99948F; 
  padding: auto;
  width: 65.60em;
  height: 2.5em;
  margin: 0px; 
  border-radius: 5px; 
  align-items: left; margin-left: -1.25em;
  margin-top:   -1.25em;
  margin-right: 0.1em;
  border-radius: 0px;
}

.top-text {
      margin-top: 20px; /* Adjust the margin-top value as needed */
    }

th {
  font-size: 14px;
  font-weight: lighter;
  top: 2em;
  padding-bottom: 18px;
  padding-top: 10px;
  
  
}

th,td{
  padding-left: 20px;
  column-gap: 40px;
}

td{
  line-height: 1.0;
  
}

h5{
  font-size: 15px;
  margin-top: -0.3em;
}

p {
  margin-top: 6.20px;
  padding: 12px;
  margin-left: -0.85em;
}

h4 { 
  margin-top: -0.1em;
  background-color: #99948F; 
  padding: 12px; 
  width: 66.65em;
  height: 1em;
  margin: 0px; 
  border-radius: 5px; 
  align-items: left; margin-left: -1.25em;
  margin-top:   -1.25em;
  margin-right: 0.1em;
  border-radius: 0px;
} 

.mytabs {
    display: flex;
    flex-wrap: wrap;
    max-width: 1100px;
    padding: 25px;
    align-items: left; margin-left: 335px;
    border-radius: 10px;
    flex-content: row;
    height: 1em;
    position: fixed;
    
    
}
.mytabs input[type="radio"] {
    display: none;
}

.mytabs label {
    padding: 23px;
    background: #e2e2e2;
    font-weight: bold;
    border-top-right-radius: 20px;
    border-top-left-radius: 20px;
    height: 13px;
    width: 13em;
    cursor: pointer;
    text-align: center;
    margin-top: 1em;
    flex-content: center;
    
    
}

.mytabs .tab {
    width: 100%;
    padding: 20px;
    background: #fff;
    order: 1;
    display: none;
    height: 410px;
}


.mytabs input[type='radio']:checked + label + .tab {
    display: block;
    background: #FFFFFF;
    
}

.mytabs input[type="radio"]:checked + label {
    background: #99948F;
}

</style>
<body>

  <!-- Sidenav -->
  <?php
  require_once('../partials/_adminsidebar.php');
  ?>

 
<header>
  <h1>ADMIN VIEW</h1>
</header>
<?php
  // deleting the placed order items in database when cancel button is pressed
  if(isset($_POST['order_id'])){
    $del_id=$_POST['order_id'];
    $remove = mysqli_query($mysqli, "DELETE orders, order_item FROM orders INNER JOIN order_item ON order_item.order_id = orders.order_id WHERE orders.order_id=$del_id");
  }

  //query for updating status into to ship from pednding
  if(isset($_POST['packed'])){
    $packed_id=$_POST['packed'];
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
<!-- Pending Table  -->
<div class="mytabs">
  <input type="radio" id="tabpending" name="mytabs" checked="checked">
  <label for="tabpending" style="background-color: #99948F;"><h5>PENDING</h5></label>
  <div class="tab">
      <div class="styled-box" style="background-color: rgba(213, 211, 209, 8)">
      <div style="overflow-x: auto; text-align: left;">
          <table style="width: 100%; height: 100%;">
          <thead>
            <tr>
              <th>ORDER#</th>
              <th>USER</th> 
              <th>ADDRESS</th> 
              <th>PRODUCT</th> 
              <th>PRICE</th> 
              <th>QUANTITY</th> 
              <th>AMOUNT</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            $pendingByOrderId = [];
            // $pendingOrderId = [];

            foreach($pendingOrderItems as $pendingOrderItem){
              $pendingByOrderId[$pendingOrderItem['order_id']][] = $pendingOrderItem;
              // $pendingOrderId[$pendingOrderItem['id']][] = $pendingOrderItem;

            }
            
            if(count($pendingByOrderId) == 0){
              echo "<tr><td><center>Users Have No Orders For Now</center></td></tr>";
            } else {

              foreach($pendingByOrderId as $pendingByOrderIdKey => $pendingByOrderIdItems){
                
                foreach($pendingByOrderIdItems as $pendingByOrdersIdKey => $pendingByOrderIdItem){
                  echo "<tr>";
                  if($pendingByOrdersIdKey == 0){
                    echo "
                    <td rowspan = '".(count($pendingByOrderIdItems))."'>
                      ".$pendingByOrderIdItem['order_id']."
                    </td>
                    ";
                  }
                  echo "
                    
                      <td>
                        "
                          .$pendingByOrderIdItem['order_username']. 
                        "
                      </td>
                      
                      <td>
                        "
                          . $pendingByOrderIdItem['user_address'] .
                        "
                      </td>

                      <td>"
                        . $pendingByOrderIdItem['name'] .
                      "</td>

                      <td>₱"
                        . number_format($pendingByOrderIdItem['price'], 0).
                      "</td>

                      <td>
                        <center>"
                        . $pendingByOrderIdItem['quantity'] .
                        "</center>
                      </td>

                      <td>₱"
                        . number_format($pendingByOrderIdItem['price'] * $pendingByOrderIdItem['quantity'], 0) .
                      "</td>";

                      if($pendingByOrdersIdKey == 0){ 
                      echo 
                      "<td rowspan='".(count($pendingByOrderIdItems))."'>
                          <center>
                              <form action='adminIndex.php' method='POST'>
                              <input type='hidden' name='order_id' value='".$pendingByOrderIdItem['order_id']."'>
                              <button type='submit' class='btn'>CANCEL</button>
                              </form>
                          </center>
                        </td>";
                     
                      }

                      if($pendingByOrdersIdKey == 0){ 
                        echo 
                        "<td rowspan='".(count($pendingByOrderIdItems))."'>
                            <center>
                                <form action='adminIndex.php' method='POST'>
                                <input type='hidden' name='packed' value='".$pendingByOrderIdItem['order_id']."'>
                                <button type='submit' class='btn'>PACKED</button>
                                </form>
                            </center>
                          </td>";
                       
                        }
                      
                    echo "</tr>";
                  
                  
                }
              }
            }
            ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>


  <!-- To Pack Table  -->
    <input type="radio" id="tabtopack" name="mytabs">
    <label for="tabtopack" style="background-color: #FAB6AB;"><h5>TO PACK</h5></label>
    <div class="tab">
      <div class="styled-box" style="background-color: rgba(252, 225, 217, 8);">
        <div style="overflow-x: auto; text-align: left;">
          <table style="width: 100%; height: 100%;">
          <thead>
            <tr>
              <th>ORDER#</th>
              <th>USER</th> 
              <th>ADDRESS</th> 
              <th>PRODUCT</th> 
              <th>PRICE</th> 
              <th>QUANTITY</th> 
              <th>AMOUNT</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $toShipByOrderId = [];

              foreach($toShipOrderItems as $toShipOrderItem){
                $toShipByOrderId[$toShipOrderItem['order_id']][] = $toShipOrderItem;
              }
              
              if(count($toShipByOrderId) == 0){
                echo "<tr><td><center>Users Have No Orders For Now</center></td></tr>";
              } else {

                foreach($toShipByOrderId as $toShipByOrderIdKey => $toShipByOrderIdItems){
                
                  foreach($toShipByOrderIdItems as $toShipByOrdersIdKey => $toShipByOrderIdItem){
                    echo "<tr>";
                    if($toShipByOrdersIdKey == 0){
                      echo "
                      <td rowspan = '" .(count($toShipByOrderIdItems)).  "'>
                      ".$toShipByOrderIdItem['order_id']."
                      </td>
                      ";
                    }
                    echo "
                        <td>
                          "
                            .$toShipByOrderIdItem['order_username']. 
                          "
                        </td>
                        
                        <td>
                          "
                            . $toShipByOrderIdItem['user_address'] .
                          "
                        </td>

                        <td>"
                          . $toShipByOrderIdItem['name'] .
                        "</td>

                        <td>₱"
                          . number_format($toShipByOrderIdItem['price'], 0).
                        "</td>

                        <td>
                          <center>"
                          . $toShipByOrderIdItem['quantity'] .
                          "</center>
                        </td>

                        <td>₱"
                          . number_format($toShipByOrderIdItem['price'] * $toShipByOrderIdItem['quantity'], 0) .
                        "</td>";

                        // if($toShipByOrdersIdKey == 0){
                        // echo
                        // "<td rowspan = '".(count($toShipByOrderIdItems))."'>
                        //   <center>
                        //       <form action='adminIndex.php' method='POST'>
                        //       <input type='hidden' name='order_id' value='".$toShipByOrderIdItem['order_id']."'>
                        //       <button type='submit' class='btn'>CANCEL</button>
                        //       </form>
                        //   </center>
                        // </td>";
                        // }
                      
                        if($toShipByOrdersIdKey == 0){
                          echo"
                          <td rowspan = '".(count($toShipByOrderIdItems))."'>
                            <center>
                                <form action='adminIndex.php' method='POST'>
                                <input type='hidden' name='toShip' value='".$toShipByOrderIdItem['order_id']."'>
                                <button type='submit' class='btn'>SHIP OUT</button>
                                </form>
                            </center>
                          </td>";
                          }     
                        echo "</tr>";
                    
                    
                  }
                }
              }
              ?>
          </tbody> 
          </table>
        </div>
      </div>
    </div>

    <!-- Table for To Receive or In Transit -->
    <input type="radio" id="tabintransit" name="mytabs">
    <label for="tabintransit" style="background-color: #5DCAD1;"><h5>IN TRANSIT</h5></label>
    <div class="tab">
      <div class="styled-box" style="background-color: rgba(189, 233, 232, 8);">
      <div style="overflow-x: auto; text-align: left;">
          <table style="width: 100%; height: 100%;">
            <thead>
              <tr>
                <th>ORDER#</th>
                <th>USER</th> 
                <th>ADDRESS</th> 
                <th>PRODUCT</th> 
                <th>PRICE</th> 
                <th>QUANTITY</th> 
                <th>AMOUNT</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $toReceiveByOrderId = [];

                foreach($toReceiveOrderItems as $toReceiveOrderItem){
                  $toReceiveByOrderId[$toReceiveOrderItem['order_id']][] = $toReceiveOrderItem;
                }
                
                if(count($toReceiveByOrderId) == 0){
                  echo "<tr><td colspan ='7'><center>Users Have No Orders For Now</center></td></tr>";
                } else {

                  foreach($toReceiveByOrderId as $toReceiveByOrderIdKey => $toReceiveByOrderIdItems){
                  
                    foreach($toReceiveByOrderIdItems as $toReceiveByOrdersIdKey => $toReceiveByOrderIdItem){
                      echo "<tr>";
                      if($toReceiveByOrdersIdKey == 0){
                        echo "
                        <td rowspan='".(count($toReceiveByOrderIdItems))."'>
                          ".$toReceiveByOrderIdItem['order_id']."
                        </td>
                        ";
                      }
                      echo "
                          <td>
                            "
                              .$toReceiveByOrderIdItem['order_username']. 
                            "
                          </td>
                          
                          <td>
                            "
                              . $toReceiveByOrderIdItem['user_address'] .
                            "
                          </td>

                          <td>"
                            . $toReceiveByOrderIdItem['name'] .
                          "</td>

                          <td>₱"
                            . number_format($toReceiveByOrderIdItem['price'], 0).
                          "</td>

                          <td>
                            <center>"
                            . $toReceiveByOrderIdItem['quantity'] .
                            "</center>
                          </td>

                          <td>₱"
                            . number_format($toReceiveByOrderIdItem['price'] * $toReceiveByOrderIdItem['quantity'], 0) .
                          "</td>";

                          // if($toReceiveByOrdersIdKey == 0){
                          //   echo 
                          //   "<td rowspan='".(count($toReceiveByOrderIdItems))."'>
                          //     <center>
                          //       <form action='adminIndex.php' method='POST'>
                          //       <input type='hidden' name='order_id' value='".$toReceiveByOrderIdItem['order_id']."'>
                          //       <button type='submit' class='btn'>CANCEL</button>
                          //       </form>
                          //     </center>
                          //   </td>
                          //   ";
                          // }
                       echo "</tr>";
                     
                      
                    }
                  }
                }
                ?>
            </tbody>
          </table>
        </div>
      </div>

  </div>

</body>
<?php
// require_once('../partials/_scripts.php');
?>
<script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<script src="http://cdn.jsdelivr.net/interact.js/1.2.4/interact.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
</html>
<style>
  body {
    background: #ccc;
    font-family: Montserrat;
    margin: 0;
    padding: 10px;
    background-color: #36517C;
}

  header {
    background-color: #36517C;
    color: #fff;
    padding: 0px;
    margin-top: 30px;
    margin-bottom: 50px;
    text-align: left;
    align-items: left; margin-left: 320px;
      
}

 .styled-box { 
  background-color: #99948F; 
  padding: auto;
  width: 65.60em;
  height: 2.5em;
  margin: 0px; 
  border-radius: 5px; 
  align-items: left; margin-left: -1.25em;
  margin-top:   -1.25em;
  margin-right: 0.1em;
  border-radius: 0px;
}

.top-text {
      margin-top: 20px; /* Adjust the margin-top value as needed */
    }

th {
  font-size: 14px;
  font-weight: lighter;
  top: 2em;
  padding-bottom: 18px;
  padding-top: 10px;
  
  
}

th,td{
  padding-left: 20px;
  column-gap: 40px;
}

td{
  line-height: 1.0;
  
}

h5{
  font-size: 15px;
  margin-top: -0.3em;
}

p {
  margin-top: 6.20px;
  padding: 12px;
  margin-left: -0.85em;
}

h4 { 
  margin-top: -0.1em;
  background-color: #99948F; 
  padding: 12px; 
  width: 66.65em;
  height: 1em;
  margin: 0px; 
  border-radius: 5px; 
  align-items: left; margin-left: -1.25em;
  margin-top:   -1.25em;
  margin-right: 0.1em;
  border-radius: 0px;
} 

.mytabs {
    display: flex;
    flex-wrap: wrap;
    max-width: 1100px;
    padding: 25px;
    align-items: left; margin-left: 335px;
    border-radius: 10px;
    flex-content: row;
    height: 1em;
    position: fixed;
    
    
}
.mytabs input[type="radio"] {
    display: none;
}

.mytabs label {
    padding: 23px;
    background: #e2e2e2;
    font-weight: bold;
    border-top-right-radius: 20px;
    border-top-left-radius: 20px;
    height: 13px;
    width: 13em;
    cursor: pointer;
    text-align: center;
    margin-top: 1em;
    flex-content: center;
    
    
}

.mytabs .tab {
    width: 100%;
    padding: 20px;
    background: #fff;
    order: 1;
    display: none;
    height: 410px;
}


.mytabs input[type='radio']:checked + label + .tab {
    display: block;
    background: #FFFFFF;
    
}

.mytabs input[type="radio"]:checked + label {
    background: #99948F;
}

</style>