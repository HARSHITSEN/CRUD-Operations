<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>show_records</title>
    <style>
        *{
            margin:0;
            box-sizing:border-box;
        }
        .container{
             background-image: linear-gradient(to bottom, rgba(8, 13, 21, 0.7), rgba(8, 13, 21, 0.7)), url(pp.jpg);
            height:700px;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .name{
            margin:20px;
            background-color:#fff;
            font-size:50px;
            font-weight:800px;
            font-family: 'Lobster', cursive;
            text-align:center;
        }
        .img{
            text-align:center;
        }
        img{
            width:400px;

        }
    </style>
</head>
<body>
<?php
    if(isset($_SESSION['msg1'])){
     echo $_SESSION['msg1'];
     unset($_SESSION['msg1']);
    }
    ?>
<?php
include_once('database.php');
$id = $_GET['id'];
$query= "select * from data where id={$id}";
$result = mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($result);
?>
    <div class="container">
        <?php
        echo "<div class='name'>Name : {$data['name']}</div>";
        echo "<div class='img'><img src='img/{$data['photo']}'width='300px'></div>";
        ?>
    </div>
</body>
</html>