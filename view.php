<?php
include('config/config.php');

$data = array();
$sql = "SELECT *  FROM `discussion` ORDER BY id desc";
$result = $mysqli->query($sql);
while($row = $result->fetch_object()){
        array_push($data, $row);
        array_push($data);
}

echo json_encode($data);
$conn = null;
exit();

