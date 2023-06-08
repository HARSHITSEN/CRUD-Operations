<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="add-record.css">
    <title>Document</title>
</head>
<body>
<?php
include_once('database.php');
$id = $_GET['id'];
$query= "select * from data where id={$id}";
$result = mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($result);
$hobbies = explode(",",$data['hobbies']);
    ?>
    <div class="container">
    <form action="update-record-back.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
    <div class="form-group">
        <label for="name" class="lable">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter Your Name" value="<?php echo $data['name'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="email" class="lable">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email" value="<?php echo $data['email'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="password" class="lable">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Your Password"value="<?php echo $data['password'] ?>" class="form-control">
        <small class="form-text text-muted">
            Your password must be 8-20 
        </small>
    </div>
    <div class="form-group">
        <label for="name" class="lable cr">Gender :-</label>
        <div class="form-check">
            <input type="radio" name="gender" value="male" class="form-check-input"  <?php if($data['gender']=="male"){echo'checked';}?>>
            <label for="gender" class="form-check-label">Male</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" value="female" class="form-check-input" <?php if($data['gender']=="female"){echo'checked';}?>>
            <label for="gender" class="form-check-label">Female</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" value="other" class="form-check-input" <?php if($data['gender']=="other"){echo'checked';}?>>
            <label for="gender"  class="form-check-label">Other</label>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="lable cr">Hobbies :-</label>
        <div class="form-check">
            <input type="Checkbox" id="music" name="hobbies[]" value="music" class="form-check-input" <?php if(in_array("music",$hobbies)){echo'checked';}?>>
            <label for="music" class="form-check-label"  >Music</label>
        </div>
        <div class="form-check">
            <input type="checkbox" id="traviling" name="hobbies[]" value="traviling" class="form-check-input" <?php if(in_array("traviling",$hobbies)){echo'checked';}?>>
            <label for="traviling" class="form-check-label"  >Traviling</label>
        </div>
        <div class="form-check">
            <input type="checkbox" id="dance" name="hobbies[]" value="dance"class="form-check-input" <?php if(in_array("dance",$hobbies)){echo'checked';}?>>
            <label for="dance" class="form-check-label">Dance </label>
        </div>
        <div class="form-check">
            <input type="checkbox" id="cooking" name="hobbies[]" value="cooking" class="form-check-input"<?php if(in_array("cooking",$hobbies)){echo'checked';}?>>
            <label for="cooking" class="form-check-label">Cooking </label>
        </div>
    </div>
    <div class="form-check">
        <label for="" class="lable">City</label>
        <select name="city" id="" class="form-control"> 
        <option value="">Select your city</option>
            <option value="agra" <?php if($data['city']=="agra"){echo 'selected';}?>> Agra </option>
            <option value="delhi"<?php if($data['city']=="delhi"){echo 'selected';}?>> Delhi</option>
            <option value="mathura"<?php if($data['city']=="mathura"){echo 'selected';}?>> Mathura</option>
            <option value="noida"<?php if($data['city']=="noida"){echo 'selected';}?>> Noida</option>
            <option value="gurgao" <?php if($data['city']=="gurgao"){echo 'selected';}?>> Gurgao</option>
        </select>
    </div>
    <div class="form-group">
        <label for="dob" class="lable dob">Date Of Birth</label>
        <input type="date" name="dob" value="<?php echo $data['dob'] ?>" id="dob" class="form-control">
    </div>
    <div class="form-group">
        <label for="file" class="lable">Upload File</label>
        <input type="file" name="photo" id="file" class="form-control-file" accept="image/png , image/jpg" onchange=setpp(hii)>
        <input type="hidden" name="photo_old" value="<?php echo $data['photo']?>">
        <img src="" alt="" class="pp" width='300px'>
        <script>
            let photo="<?php echo $data['photo']; ?>";
            console.log(photo)
            document.querySelector('.photo').setAttribute('src','img/'+ photo);
        </script>
    </div>
    <button value="update">update</button>
    </form>
    </div>
    <script>
        function setpp(evt){
            if(event.target.files.length>0){
                let src=URL.createObjectURL(event.target.files[0]);
                let myimg = document.querySelector('.pp')
                myimg.src=src;
            }
        }
    </script>
</body>
</html>