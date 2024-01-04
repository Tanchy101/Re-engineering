<?php
include ("config/config.php");
$email = $_POST["emailReset"];
$sql = "SELECT * FROM admin
        WHERE admin_email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $admin_email);

$stmt->execute();

$result = $stmt->get_result();
while($variable = $result->fetch_object()){
    $Email = $variable->admin_email;
    // if ($user->admin_email === null) {
    //     die("email not found");
    // }
    

    

    var_dump($Email);
    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }

    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        die("Passwords must match");
    }
}
var_dump($result);
// $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// $sql2 = "UPDATE admin
//         SET admin_password = ?,
//         WHERE admin_email = ? ";

// $stmt2 = $mysqli->prepare($sql2);

// $stmt2->bind_param("ss", $password_hash, $user["admin_email"]);

// $stm2t->execute();

// echo "Password updated. You can now login.";