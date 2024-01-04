<?php
include ("config/config.php");
$email = $_POST["emailReset"];
$sql = "SELECT * FROM admin
        WHERE admin_email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $email);

$stmt->execute();

$result = $stmt->get_result();
while($variable = $result->fetch_object()){
    $Email = $variable->admin_email;
    if ($Email === null) {
        die("email not found");
    }
    
    // var_dump($Email);
    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }

    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        die("Passwords must match");
    }


$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql2 = "UPDATE admin
        SET admin_password = ?
        WHERE admin_email = ?";

$stmt2 = $mysqli->prepare($sql2);

$stmt2->bind_param("ss", $password_hash, $email);

$stmt2->execute();

header('location: password-sucess-page.php'); }