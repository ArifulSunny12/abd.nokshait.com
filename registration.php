
<?php
session_start();
$host='localhost';
$user='nokshait_admin';
$pass='51563435Sun';
$db='nokshait_blood';

$messageflag=0;

if(isset($_SESSION['id']) ){
if ($_SESSION['id']==!null) {
      header("Location: login.php");
   }

}

if(isset($_POST['btn']) && isset($_FILES['img']) ){
    
  $name= $_POST['name'];
  $mobile= $_POST['mobile'];
  $dofb= $_POST['dofb'];
  $gender= $_POST['gender'];
  $blood= $_POST['blood-group'];
  $village= $_POST['village'];
  $police= $_POST['police-station'];
  $District= $_POST['District'];
  
  $testpassword1 = $_POST['password'];
  $testpassword2 = $_POST['Confirmpassword'];


  $password= md5($_POST['password']);

   


      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = "SELECT name,mobile FROM `donor` WHERE mobile='$mobile' ";

      $res1=mysqli_query($link,$sql);

      $result1 = mysqli_fetch_assoc($res1);
      if ($result1==!null) {
      //header("Location: registration.php");
    

     

        $name1= $result1['name'];
        $mobile1= $result1['mobile'];


        $message= "Sorry ".$name1.", You have already registar using ".$mobile1." mobile number. ";
        $messageflag=1;
       unset($res1);

      }

   else{
 


  if ( $testpassword1 !=  $testpassword2){


    $message= "Sorry, password did not matched!"."<br> Fill the form again carefully";
    $messageflag=2;
    
  }

  else{



  $img_name = $_FILES['img']['name'];
  $tmp_name = $_FILES['img']['tmp_name'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png"); 

      if (in_array($img_ex_lc, $allowed_exs)) {

        $imgtitle= "$name"."_";
        $new_img_name = uniqid($imgtitle, true).'.'.$img_ex_lc;
        $img_upload_path = 'donors/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);}

         $link = mysqli_connect($host,$user,$pass,$db);
        $sql = "INSERT INTO donor (name,mobile,dob,gender,blood_group,img,village,police_station,District,password) VALUES 
        ('$name','$mobile','$dofb','$gender','$blood','$new_img_name','$village','$police','$District','$password')";

                if(mysqli_query($link,$sql)){

                 //header("Location: login.php");
                 
                 echo "<script>window.top.location='http://www.abd.nokshait.com/login.php'</script>";

                } 

                else{
                die('Query Problem'.mysqli_error($link));
                } 


  }
  //2nd else end

    }
      // 1st else end
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




<!-- reg form start-->
<div class="container pb-5 pt-md-4 ">

<!-- same number error message start-->
<div class="row justify-content-center">
  <div class="col-md-8">
    <?php
    if ($messageflag==1) {
        ?>
      <p style="color: red;"><?=$message?></p>
   <?php  
    $messageflag=0;
    }
     ?>
  </div>
</div>
<!-- same number error message end-->


<!-- password missmatch message start-->
<div class="row justify-content-center">
  <div class="col-md-8">
    <?php
    if ($messageflag==2) {
        ?>
      <p style="color: red;"><?=$message?></p>
   <?php  
    $messageflag=0;
    }
     ?>
  </div>
</div>
<!-- password missmatch message end-->

<div class="row px-0 mx-0 justify-content-center">
  <div class="col-md-8">
    <form action="" method="post" enctype="multipart/form-data">
      
     <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
       <span class="">Name:</span> 
      </div>
      <div class="col-md-9 px-0 " >
        <input class="w-100 p-2 border" type="text" name="name" placeholder="Full Name" required> 
      </div>   
     </div>
      

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
     

       <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
        <span>Image:</span>  
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="file" name="img" placeholder="Image" required> 
      </div>   
     </div>

    
     <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
          <span>Village:</span> 
      </div>
      <div class="col-md-9 px-0" >
         <input class="w-100 p-2 border" type="text" name="village" placeholder="City/Village" required>
      </div>   
     </div>


     <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
          <span>Police Station:</span> 
      </div>
      <div class="col-md-9 px-0" >
         <input class="w-100 p-2 border" type="text" name="police-station" placeholder="Police Station/Thana" required>
      </div>   
     </div>


     <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
          <span>District:</span> 
      </div>
      <div class="col-md-9 px-0" >
         <input class="w-100 p-2 border" type="text" name="District" placeholder="District" required>
      </div>   
     </div>




<!-- address fild
       <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
          <span>Address:</span> 
      </div>
      <div class="col-md-9 px-0" >
         <textarea class="w-100 p-2 border" name="address" placeholder="Address"></textarea>
      </div>   
     </div>

 -->
      



<div class="row px-0 mx-0 my-3 ">
        <div class="col-md-3 pl-0 pt-2" >
       <span>Password:</span>
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="Password" name="password" placeholder="Password" required> 
      </div>   
     </div>
      




    <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
       <span>Confirm Password:</span>
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="Password" name="Confirmpassword" placeholder="Confirm Password" required>
      
      </div>   
     </div>
      




      <input class="w-100 bg-success font-weight-bold py-2 mb-3 border-0" type="submit" name="btn" value="Registar">

    </form>
  </div>
</div>
</div>
<!-- reg form end-->




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