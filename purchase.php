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
        $order_id=mysqli_insert_id($mysqli);
        $sql="INSERT INTO orders (order_id, item_name, price, quantity) VALUES(?,?,?,?)";
        $stmt=mysqli_prepare($mysqli, $sql);

        if($stmt){
            var_dump($_SESSION['cart']);
            foreach($_SESSION['cart'] as $key => $values){
                $item_name=$values['name'];
                $price=$values['price'];
                $quantity=$values['quantity'];
                mysqli_stmt_bind_param($stmt, "isii", $order_id, $item_name, $price, $quantity);
                mysqli_stmt_execute($stmt);
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