<?php
session_start();
include('config/config.php');

if(mysqli_connect_error()){
    echo"<script>
    alert('cannot connect database');
    window.location.href='cart.php';
    </script>";
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(isset($_POST['purchase'])){
        $order_status = "Pending";

        $admin_id = $_SESSION['admin_id'];
        $ret = "SELECT * FROM admin WHERE admin_id = ?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('s', $admin_id);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($admin = $res->fetch_object()) {
    
        
        $order_username = $admin -> admin_name;
        $user_address = $admin -> address;
        
        }

        // Prepare insert order sql statement
        $insertOrderSql="INSERT INTO orders (order_status, total, order_username, user_address) VALUES(?,?,?,?)";
        $insertOrderSqlStmt=mysqli_prepare($mysqli, $insertOrderSql);

        if($insertOrderSqlStmt){
            // Get the total price of the cart array items
            $total = array_reduce($_SESSION['cart'], function($a, $b) {
                return $a += ($b['price'] * $b['quantity']);
            }, 0);

            // Execute insert order sql statement with parameters
            mysqli_stmt_bind_param($insertOrderSqlStmt, "siss", $order_status, $total, $order_username, $user_address);
            mysqli_stmt_execute($insertOrderSqlStmt);

            // Get the ID of the last query (insert order query)
            $order_id=mysqli_insert_id($mysqli);

            // Prepare insert order_item sql statement
            $insertOrderItemSql="INSERT INTO order_item (price, name, quantity, order_id, image) VALUES(?,?,?,?,?)";
            $insertOrderItemSqlStmt=mysqli_prepare($mysqli, $insertOrderItemSql);

            // Insert each cart item using the insert order_sql statement
            foreach($_SESSION['cart'] as $key => $cartItems){
                mysqli_stmt_bind_param($insertOrderItemSqlStmt, "isiis", $cartItems['price'], $cartItems['name'], $cartItems['quantity'], $order_id, $cartItems['image']);
                mysqli_stmt_execute($insertOrderItemSqlStmt);
            }
            
            unset($_SESSION['cart']);
            echo"<script>
            alert('Your Order Has Been Placed');
            window.location.href='dashboard.php';
            </script>";
        } else {
            echo"<script>
            alert('SQL QUERY PREPARE ERROR');
            window.location.href='cart.php';
            </script>";
        }
    }
    else {
        echo"<script>
        alert('SQL ERROR');
        window.location.href='cart.php';
        </script>";
    }
}
?>