
<?php

session_start();

$host='localhost';
$user='nokshait_admin';
$pass='51563435Sun';
$db='nokshait_blood';



//
  if(isset($_SESSION['id']) ){
    if ($_SESSION['id']==!null) {
      echo "<script>window.top.location='http://www.abd.nokshait.com/donor.php'</script>";
    }
   }


   $messageflag=0;


if(isset($_POST['btn']) ){
    
  
  $mobile= $_POST['mobile'];
  $password= md5($_POST['password']);


      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = " SELECT * FROM `donor` WHERE mobile='$mobile' && password='$password'";

      $res=mysqli_query($link,$sql);

      $result = mysqli_fetch_assoc($res);

   if ($result) {
     session_start();
     $_SESSION['id'] = $result['id'];
     $_SESSION['name']=$result['name'];
     $_SESSION['img']=$result['img'];
     $_SESSION['message']=0;
     $_SESSION['messageflag']=0;
     
     
   // echo $_SESSION['id'];
   // echo $_SESSION['name'];
     
echo "<script>window.top.location='http://www.abd.nokshait.com/index.php'</script>";
   }

   else{
    $message= "Mobile number or Password is incurrect!";
    $messageflag=1;
   }


          

}



?>











<!DOCTYPE html>
<html>
<head>
	<title>Adorsho Blood Donor</title>
	<meta charset="UTF-8">

	<link rel="icon" href="image/logo.jpg" sizes="32x32" type="image/jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>


<div class="container-fluid px-0 ">

<!--nav bar start-->
<div class="row shadow1 px-0 mx-0 sticky-top">
  <div class=" col-md-12 px-0 ">    
  <nav class="navbar navbar-expand-md  navbar-light mpadding ">
    <a class="navbar-brand  px-1 mx-md-0  ltfmly ltsp" style="" href="index.php" class="navtext"><img class="logo-image"style="width: 50px;"  src="image/logo1.jpg"> <p class="logotitle">Adorsho Blood Donor</p></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="navbar-item  mx-1"> <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" href="index.php">Home</a> </li>
      <li class="navbar-item  mx-1"> <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" style="color: red;" href="donorlist.php">Donor List</a> </li>
      <li class="navbar-item  mx-1"> <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" href="login.php">Login</a> </li>
      <li class="navbar-item  mx-1"> <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" href="registration.php">Registration</a></li>

    </ul>
    </div>
  </nav>
  </div>  
</div>
<!--nav bar end-->



<!--scrole notice start-->  
<div class="row bg-white">
  <div class="col-md-12">
    <marquee behavior="scroll" direction="left"> <p class="notice pt-3"> রক্ত দানের পূর্বে যাকে রক্ত দিবেন তার পরিচয় সম্পর্কে সঠিক ভাবে জেনেনিন। সন্দেহভাজন বা ঝুঁকিপূর্ণ স্থানে রক্তদানে যাওয়া থেকে বিরত থাকুন।   </p> </marquee>

  </div>
</div>
<!--scrole notice end--> 


<!-- login  form start-->
<div class="container ">

<div class="row justify-content-center">
  <div class="col-md-8">

    <?php
    if ($messageflag==1) {

        ?>
      <p><?=$message?></p>

   <?php  
    $messageflag=0;
    }
     ?>


  </div>
</div>

<div class="row px-0 mx-0 justify-content-center">
  <div class="col-md-8">
    <form action="" method="post">
      
    
      

     <div class="row px-0 mx-0 mb-3">
        <div class="col-md-3 pl-0 pt-2" >
       <span>Mobile:</span> 
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="text" name="mobile" placeholder="Mobile Number" required>
      </div>   
     </div>

 
     <div class="row px-0 mx-0 my-3 ">
        <div class="col-md-3 pl-0 pt-2" >
       <span>Password:</span>
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="Password" name="password" placeholder="Password" required> 
      </div>   
     </div>
      

      <input class="w-100 bg-success font-weight-bold py-2 mb-3 border-0" type="submit" name="btn" value="LogIn">

    </form>
  </div>

  <div class="col-md-8">
    
    <a href="registration.php" class="linkdecoretion2">Registration</a>
    <br>
    <a href="reset.php" class="linkdecoretion2">Forget Password</a>

  </div>
</div>
</div>
<!-- login form end-->




<!-- footer start-->
<div class="row px-0 mx-0 mt-footer ">
	<div class="col-md-12 px-0 mx-0 " style="background-color: #f1f1f1;"> 
      

      <div class="row mx-0 py-4">
      	<div class="col-md-2"></div>
      	<div class="col-md-4">
      		<p class="float-left">
      			
      		© 2021 All rights reserved <br>
      	by Adorsho Blood Donor.</p>
      	</div>
      	<div class="col-md-4">
          <p class="float-right text-right">Developed by  
            <a href="https://www.facebook.com/tremendous.sunny.5" class="developerlink">Ariful Sunny</a>
            <br>
          aisunny25@gmail.com</p>
        </div>
      	<div class="col-md-2"></div>
      </div>

	</div>
</div>
<!-- footer end-->

</div>




<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
</body>
</html>