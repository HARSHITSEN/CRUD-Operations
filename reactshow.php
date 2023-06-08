<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$conn = mysqli_connect("localhost","root","","demo");
$query = "select * from data";
$result = mysqli_query($conn,$query);
$rows = array();
while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
}
echo json_encode($rows);
?>