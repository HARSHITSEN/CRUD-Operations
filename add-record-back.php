<?php
session_start();
include_once('database.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$hobbies = implode(",",$_POST['hobbies']);
$city = $_POST['city'];
$dob = $_POST['dob'];

$pname = $_FILES['photo']['name'];
$psize = $_FILES['photo']['size'];
$ptype = $_FILES['photo']['type'];
$ptmp = $_FILES['photo']['tmp_name'];

$newName = generateUniqueName($pname);

$query = "Insert into data values(DEFAULT,'$name','$email','$password','$gender','$hobbies','$city','$dob','$newName',DEFAULT);";
if(move_uploaded_file($ptmp,"img/".$newName))
{
    if(mysqli_query($conn,$query))
 {
   $_SESSION['msg']="Data and file inserted successfully";
 }
    else
 {
    unlink("img/".$newName);
    $_SESSION['msg']="Something goes wrong 1";
 }
}
else
{
   $_SESSION['msg']="Something goes wrong 2";
}


function generateUniqueName($pname)
{
$unqName = substr(str_shuffle(md5($pname).uniqid()),mt_rand(0,20),15);
$arr = explode(".",$pname);
$ext = strtolower(end($arr));
$newName = $unqName.".".$ext;
return $newName;
}

header("location:add-record.php");
exit();

?>