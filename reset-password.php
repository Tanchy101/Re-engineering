<?php

$email = $_GET["email"];

$mysqlis = require __DIR__ . "../config/config.php";

$sql = "SELECT * FROM admin
        WHERE admin_email = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $admin_email);
$stmt->execute();

$result = $stmt->get_result();

while($user = $result->fetch_object()){
if ($user === null) {
    var_dump($user);
    die("email not found");
    
    }
} 
$lengthErr = "";
$matchErr = "";
if(isset($_POST['sub'])){
   

    if (strlen($_POST["password"]) < 8) {
        $lengthErr = "Password must be at least 8 characters";
    }

    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        $matchErr = "Passwords must match";
    }    
    else{
        header("process-reset-pass.php");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Reset Password</h1>

    <form method="post" action="process-reset-pass.php">

        <input type="hidden" name="emailReset" value="<?= htmlspecialchars($email) ?>">

        <label for="password">New password</label>
        <input required type="password" id="password" name="password">
        <span style="color: red;"><?php echo $lengthErr ?></span><br>
        <label for="password_confirmation">Repeat password</label>
        <input required type="password" id="password_confirmation"
               name="password_confirmation">
        <span style="color: red;"><?php echo $matchErr ?></span><br>

        <button type="submit" name="sub">Send</button>
    </form>

</body>
</html>