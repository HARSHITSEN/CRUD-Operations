<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show_records</title>
</head>
<body>
<?php
include_once('database.php');
$id = $_GET['id'];
$query= "delete from data where id={$id}";
$result = mysqli_query($conn,$query);
$_SESSION['msg1']="succesfully deleted ";

header("location:show-records.php");
exit();
?>
</body>
</html>