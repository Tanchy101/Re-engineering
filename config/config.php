
<?php
    $dbuser="root";
    $dbpass="";
    $host="localhost";
    $db="siaproject";
    $mysqli=new mysqli($host,$dbuser, $dbpass, $db) or die ("database error:". mysqli_error($mysqli));
?>
