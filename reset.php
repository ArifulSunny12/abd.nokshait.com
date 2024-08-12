
<?php
session_start();

$host='localhost';
$user='nokshait_admin';
$pass='51563435Sun';
$db='nokshait_blood';

if(isset($_SESSION['id']) ){
    header("Location: donor.php");
   }


$messageflag=0;
$rest=1;

//check info code start

  if(isset($_POST['getinfo']) ){  
 
  $mobile1= $_POST['mobile'];
  $dofb1= $_POST['dofb'];
  $gender1= $_POST['gender'];
  $blood1= $_POST['blood-group'];

      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = "SELECT id FROM `donor` WHERE mobile='$mobile1' AND gender='$gender1' AND blood_group='$blood1' AND dob='$dofb1'";

      $res1=mysqli_query($link,$sql);

      $result1 = mysqli_fetch_assoc($res1);
      if ($result1==!null) {
        $id= $result1['id'];
        $rest=2;   
     }
     else{

  $message= "Sorry, Information did not matched!"."<br> try again";
  $messageflag=1;
  $rest=1;

     }




 }


//update code end













if(isset($_POST['restpass'])){
    
 
  $testpassword1 = $_POST['password'];
  $testpassword2 = $_POST['Confirmpassword'];

  $id= $_POST['id'];
  $password= md5($_POST['password']);




 if ( $testpassword1 !=  $testpassword2){

  $message= "Sorry, password did not matched!"."<br> Use same Password in Confirm Password";
  $messageflag=2;
  $rest=2;
  
    
    
  }

  else{

     $link = mysqli_connect($host,$user,$pass,$db);
     $sql =" UPDATE donor SET password = '$password' WHERE donor.id = '$id'";

      if(mysqli_query($link,$sql)){
             $rest=1;
             header("Location: login.php");

          } else{
          die('Query Problem'.mysqli_error($link));
        } 

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


<!--  info for reset form  start-->

<?php

if ($rest == '1') {

 
 
 ?>

<div class="container py-5 ">

<div class="row justify-content-center">
  <div class="col-md-8">
    <?php
    if ($messageflag==1) {
        ?>
      <p style="color: red;"><?=$message?></p>
   <?php  
    $messageflag=0;
    $rest=1;
    }
     ?>
  </div>
</div>



<div class="row px-0 mx-0 justify-content-center">
  <div class="col-md-8">




  <div class="row">
     
     <div class=""><h3>Give Information To Reset Your Password </h3></div>
     
  </div>
  <hr>


    <form action="" method="post">
      
     <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
       <span>Mobile:</span> 
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="text" name="mobile" placeholder="Mobile Number" required>
      </div>   
     </div>

       
    <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
        <span>Date of birth:</span> 
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="date" name="dofb" required> 
      </div>   
     </div>

     

      <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
        <span>Your Gender:</span> 
      </div>
      <div class="col-md-9 px-0" >
        <select class="w-100 p-2 border" name="gender" required>
        <option value="" selected disabled>Select Gender</option>
        <option value="Male" >Male</option>
        <option value="Female" >Female</option>
        <option value="Other" >Other</option>

      </select>
      </div>   
     </div>
      

  <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
       <span>Blood Group:</span> 
      </div>
      <div class="col-md-9 px-0" >
       <select class="w-100 p-2 border" name="blood-group" required>
        <option value="" selected disabled>Select Blood Group</option>
        <option value="O+" > O+ </option>
        <option value="O-" > O- </option>
        <option value="A+" > A+ </option>
        <option value="A-" > A- </option>
        <option value="B+" > B+ </option>
        <option value="B-" > B- </option>
        <option value="AB+" > AB+ </option>
        <option value="AB-" > AB- </option>

      </select>
      </div>   
     </div>       
     

      <input class="w-100 bg-success font-weight-bold py-2 mb-3 border-0" type="submit" name="getinfo" value="Check Information">

    </form>
  </div>
</div>
</div>
<?php 
}

 ?>
<!-- info for reset form end-->


<!-- new password start-->

<?php

if ($rest == '2') {

 
 
 ?>

<div class="container py-5 ">


<div class="row justify-content-center">
  <div class="col-md-8">
    <?php
    if ($messageflag==2) {
        ?>
      <p style="color: red;"><?=$message?></p>
   <?php  
    $messageflag=0;
    $rest=2;
    }
     ?>
  </div>
</div>




<div class="row px-0 mx-0 justify-content-center">
  <div class="col-md-8">



  <div class="row">
     
     <div class=""><h3>Set New Password </h3></div>
     
  </div>
  <hr>


    <form action="" method="post" >
      
     

       
   <div class="row px-0 mx-0 my-3 ">
        <div class="col-md-3 pl-0 pt-2" >
       <span>Password:</span>
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="Password" name="password" placeholder="New Password" required> 
        <input class="w-100 p-2 border" type="hidden" name="id" value="<?php echo $id ?>"> 
      </div>   
     </div>
      




    <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
       <span>Confirm Password:</span>
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="Password" name="Confirmpassword" placeholder="Confirm New Password" required>
      
      </div>   
     </div>


      <input class="w-100 bg-success font-weight-bold py-2 mb-3 border-0" type="submit" name="restpass" value="Rest Password">

    </form>
  </div>
</div>
</div>


 <?php 
}

 ?>
<!-- new password end-->



<!-- footer start-->
<div class="row px-0 mx-0">
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