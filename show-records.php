<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>show-table</title>
    <style>
        *{
            margin:0;
            box-sizing:border-box;
        }
        body{
            /* background-color:rgb(34, 163, 159); */
            /* background: linear-gradient(90deg, rgba(34,34,34,1) 5%, rgba(243,239,224,1) 10%, rgba(67,66,66,1) 40%, rgba(34,163,159,1) 100%); */
        }
        a{
            color:white;
            font-size:20px; 
        }
        h2{
            margin-top:20px;
            text-align:center;
            color:black;
        }
        i{
            color:black;
        }
        .container{
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;

        }
        </style>
</head>
<body>
    <div class="container">
    <?php
    $conn = mysqli_connect("localhost","root","","demo");
    $query = "select * from data";
    if($result = mysqli_query($conn,$query))
    {
        ?>
        <h2>Employee Data</h2>
         <table class="table table-hover table-sm  table-light">
            <tr>
                <th>NAME</th>
                <TH>EMAIL</TH>
                <th>Password</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>City</th>
                <th>Dob</th>
                <th>Photo</th>
                <th>Show</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        
        <?php
        while($row = mysqli_fetch_assoc($result))
        {

                echo "<tr>
                <td >".$row['name']."</td>
                <td >".$row['email']."</td>
                <td >".$row['password']."</td>
                <td >".$row['gender']."</td>
                <td >".$row['hobbies']."</td>
                <td >".$row['city']."</td>
                <td >".$row['dob']."</td>
                <td >".$row['photo']."</td>
                <td><a href='http://localhost/crud/show-record.php?id={$row['id']}'><i class='fa-solid fa-share-from-square'></a></i></td>
                <td><a href='http://localhost/crud/update-record.php?id={$row['id']}'><i class='fa-solid fa-pen-to-square'></a></i></td>
                <td><a href='http://localhost/crud/delete-record.php?id={$row['id']}'><i class='fa-solid fa-xmark'></a></i></td>
                </tr>";
        }
    }
    else{
        echo "something goes wrong";
    }
    ?>
    </table>
    </div>
    </body>
    </html>