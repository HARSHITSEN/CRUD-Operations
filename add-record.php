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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="add-record.css">
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_SESSION['msg'])){
     echo $_SESSION['msg'];
     unset($_SESSION['msg']);

    }
    ?>
    <div class="main-container">
    <div class="sidebar">
    <div class="logo-details">
      <img src="2.png" alt="" width='40px'>
        <div class="logo_name">Doc</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
       <a href="http://localhost/crud/add-record.php">
       <i class="fa-solid fa-user-plus"></i>
         <span class="links_name">Add Record</span>
       </a>
       <span class="tooltip">Add Record</span>
     </li>
     <li>
       <a href="http://localhost/crud/show-records.php">
       <i class="fa-solid fa-eye"></i>
         <span class="links_name">Show Record</span>
       </a>
       <span class="tooltip">Show Record</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">Harshit sen</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>
  <section class="home-section">
  <div class="container">
    <form action="add-record-back.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name" class="lable">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter Your Name" class="form-control">
    </div>
    <div class="form-group">
        <label for="email" class="lable">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email"  class="form-control">
    </div>
    <div class="form-group">
        <label for="password" class="lable">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Your Password" class="form-control">
        <small class="form-text text-muted">
            Your password must be 8-20 
        </small>
    </div>
    <div class="form-group">
        <label for="name" class="lable cr">Gender :-</label>
        <div class="form-check">
            <input type="radio" name="gender" value="male" class="form-check-input">
            <label for="gender" class="form-check-label">Male</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" value="female" class="form-check-input">
            <label for="gender" class="form-check-label">Female</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" value="other" class="form-check-input">
            <label for="gender"  class="form-check-label">Other</label>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="lable cr">Hobbies :-</label>
        <div class="form-check">
            <input type="Checkbox" id="music" name="hobbies[]" value="music" class="form-check-input">
            <label for="music" class="form-check-label">Music</label>
        </div>
        <div class="form-check">
            <input type="checkbox" id="traviling" name="hobbies[]" value="traviling" class="form-check-input">
            <label for="traviling" class="form-check-label">Traviling</label>
        </div>
        <div class="form-check">
            <input type="checkbox" id="dance" name="hobbies[]" value="dance"class="form-check-input">
            <label for="dance" class="form-check-label">Dance</label>
        </div>
        <div class="form-check">
            <input type="checkbox" id="cooking" name="hobbies[]" value="cooking" class="form-check-input">
            <label for="cooking" class="form-check-label">Cooking</label>
        </div>
    </div>
    <div class="form-check">
        <label for="" class="lable">City</label>
        <select name="city" id="" class="form-control"> 
        <option value="">Select your city</option>
            <option value="agra">Agra</option>
            <option value="delhi">Delhi</option>
            <option value="mathura">Mathura</option>
            <option value="noida">Noida</option>
            <option value="gurgao">Gurgao</option>
        </select>
    </div>
    <div class="form-group">
        <label for="dob" class="lable dob">Date Of Birth</label>
        <input type="date" name="dob" value="date" id="dob" class="form-control">
    </div>
    <div class="form-group">
        <label for="file" class="lable">Upload File</label>
        <input type="file" name="photo" id="file" class="form-control-file" accept="image/png , image/jpg" onchange=setpp(event)>
        <img src="" alt="" class="pp" width='200px'>
    </div>
    <button>Submit</button>
    </form>
    </div>
    </div>
  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
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