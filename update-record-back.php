
<?php
session_start();
include_once('database.php');
$id       = $_POST['id'];
$name     = $_POST['name'];
$password = $_POST['password']; 
$email    = $_POST['email'];
$city 	  = $_POST['city'];
$gender   = $_POST['gender'];
$hobbies  = implode(",",$_POST['hobbies']);
$dob      = $_POST['dob'];
$pname = "";
if(isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']))
{
	echo "inslide if 1 <br>";
 	$xyz = $_FILES['photo']['name'];
	$psize = $_FILES['photo']['size'];
	$ptype = $_FILES['photo']['type'];
	$ptmp = $_FILES['photo']['tmp_name'];

	$pname = generateUniqueName($xyz);

	if(move_uploaded_file($ptmp,"img/".$pname))
	{
		unlink("img/".$_POST['photo_old']);
		$_SESSION['msg1']="photo successfully uploaded<br>";
	}
	else
	{
		$pname = $_POST['photo_old'];
		$_SESSION['msg1']="photo not updated";
	}
	
	
	$_SESSION['msg1']="inslide if 2 <br>";
}
else
{
	$pname = $_POST['photo_old'];
	$_SESSION['msg1']="old_photo  not change <br>";
}

$query = "update data set name='$name',password='$password',email='$email',gender='$gender',hobbies='$hobbies',city='$city',dob='$dob',photo='$pname' where id=$id";
//echo "$query";
$data = mysqli_query($conn,$query);



function generateUniqueName($pname)
{
	$unqName = substr(str_shuffle(md5($pname).uniqid()),mt_rand(0,20),15);
	$arr = explode(".",$pname);
	$ext = strtolower(end($arr));
	$newName = $unqName.".".$ext;
	return $newName;
}

header("location:show-records.php");
exit();

?>