<?php
session_start();
include('config/config.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['reset'])){
        unset($_SESSION['cart']);
    
    header('location: cart.php');
        }
    }

?>