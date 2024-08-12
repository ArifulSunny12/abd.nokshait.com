
<?php

session_start();

$host='localhost';
$user='nokshait_admin';
$pass='51563435Sun';
$db='nokshait_blood';


//echo $_SESSION['id'];
if(isset($_SESSION['id']) ){
   }

   else{
     header("Location: login.php");
   }
$personid = $_SESSION['id'];
//echo $_SESSION['name'];

if(isset($_GET['logout'])){
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  unset($_SESSION['img']);
   header("Location: login.php");
}


if(isset($_GET['update'])){
  $_SESSION['modify'] = 'update';  
   header("Location: update.php");
}


if(isset($_GET['upload'])){
  $_SESSION['modify'] = 'upload';  
   header("Location: update.php");
}



      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = " SELECT * FROM donateinfo WHERE personId = '$personid' ORDER BY id DESC";
      $res = mysqli_query($link,$sql);

      $sql = "SELECT * FROM donor WHERE id = '$personid' ";

      $res1=mysqli_query($link,$sql);

      $result1 = mysqli_fetch_assoc($res1);

  $name= $result1['name'];
  $mobile= $result1['mobile'];
  $dofb= $result1['dob'];
  $gender= $result1['gender'];
  $blood= $result1['blood_group'];
  $village= $result1['village'];
  $police= $result1['police_station'];
  $District= $result1['District'];
  $img = $result1['img'];

?>


<!DOCTYPE html>
<html>
<head>
  <title>Adorsho Blood Donor</title>
  <meta charset="UTF-8">

  <link rel="icon" type="image/jpg" href="image/logo.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
<?php 
if(isset($_SESSION['id']) ){
if ($_SESSION['id']==!null) {

  ?>
      <li class="navbar-item  mx-1"> 
        <img class="mt-2" src="donors/<?=$_SESSION['img']?>" width="25px" style="border-radius: 20px; float: left;">
        <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" style=" float: left;" href="donor.php"><?=$_SESSION['name']?></a>
      </li>
      <li class="navbar-item  mx-1"> <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" href="?logout=true">log Out</a> </li>
  <?php  }
}
 else{
?>
      <li class="navbar-item  mx-1"> <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" href="login.php">Login</a> </li>
      <li class="navbar-item  mx-1"> <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" href="registration.php">Registration</a></li>
<?php
}
?>
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




<!--list start-->

<div class="row px-0 mx-0">

<!-- left side advertise div start-->
  <div class="col-md-2">
    <div class="row m-2 advertise">
      <div class="col-md-12 text-center border px-md-1 px-lg-2 ">
        <p class=" pt-2 " style="color: red;">"সেচ্ছায় রক্ত দিন, অন্যকে রক্তদানে উৎসাহিত করুন"</p>        
      </div>
    </div>
  </div>
<!-- left side advertise div end-->



  <div class="col-md-7 ">
<hr>


    <div class="row">

    
        <?php
    if ($_SESSION['messageflag']==1) {

        ?>

     
     <div class=""><h5><?=$_SESSION['message']?></h5></div>


     <?php  
     $_SESSION['messageflag']=0;
    }
     ?>
     
   </div>

   <div class="row">
     
     <div class=""><h3>Personal Information </h3></div>
     <div class="" style="margin-left: auto;">
      <a class="nav-link px-3 ltsp" href="?update=true">Update Info</a>
     </div>
   </div>




    <div class="row">

  <div class="col-md-4 mx-0 px-0 py-2" style="background-color: " > 
    <!-- <img class="mt-2" src="donors/<?=$_SESSION['img']?>" width="25px" style="border-radius: 20px; float: left;"> -->
    <img class="mx-0 px-0 dimg" src="donors/<?=$img?>" >

  </div>
  <div class="col-md-8 "  style="background-color: ">

    <div class="row py-2">
      <div class="col-3 col-md-3 "> <span>Name</span></div>
      <div class="col-8 col-md-8 "> <span>: <?=$name?></span></div>
    </div>

    <div class="row py-2">
      <div class="col-3 col-md-3"> <span>Mobile</span></div>
      <div class="col-8 col-md-8"> <span>: <?=$mobile?></span></div>
    </div>

    <div class="row py-2">
      <div class="col-3 col-md-3"> <span>Date of birth</span></div>
      <div class="col-8 col-md-8"> <span>: <?=$dofb?></span></div>
    </div>

    <div class="row py-2">
      <div class="col-3 col-md-3"> <span>Your Gender</span> </div>
      <div class="col-8 col-md-8"> <span>: <?=$gender?></span></div>
    </div>

    <div class="row py-2">
      <div class="col-3 col-md-3"> <span>Blood Group</span> </div>
      <div class="col-8 col-md-8"> <span>: <?=$blood?></span></div>
    </div>

    <div class="row py-2">
      <div class="col-3 col-md-3"> <span>Village</span></div>
      <div class="col-8 col-md-8"> <span>: <?=$village?></span></div>
    </div>

    <div class="row py-2">
      <div class="col-3 col-md-3"> <span>Police Station</span></div>
      <div class="col-8 col-md-8"> <span>: <?=$police?></span></div>
    </div>

    <div class="row py-2">
      <div class="col-3 col-md-3"> <span>District</span> </div>
      <div class="col-8 col-md-8"> <span>: <?=$District?></span></div>
    </div>



  </div>

      </div>

<br>
<hr>

<!-- blood donation information start-->
<br>
<br>



<div class="row">

    
        <?php
    if ($_SESSION['messageflag']==2) {

        ?>

     
     <div class=""><h5><?=$_SESSION['message']?></h5></div>


     <?php  
     $_SESSION['messageflag']=0;
    }
     ?>
     
   </div>
<div class="row">
     
     <div class=""><h3>Blood Donate Information </h3></div>
     <div class="" style="margin-left: auto;">
       <a class="nav-link px-3 ltsp" href="?upload=true">Upload New</a>
     </div>
</div>

<br>

     <table class="col-md-12 table table-striped">
    <thead>
      <tr>
        <th>Sr.</th>
        <th>Donation date</th>
        <th>Donation Place</th>
      </tr>
    </thead>

 <tbody>
<?php

$sr=1;
if (mysqli_num_rows($res)>0) {

  

  while ($result = mysqli_fetch_assoc($res)) { 
  $id= $result['id'];
  $lastDonate= $result['lastDonate'];
  $place= $result['place'];
  
  ?>


      <tr>
        <td><?=$sr?></td>   
        <td><?=$lastDonate?></td>
        <td><?=$place?></td>
      </tr>
<?php 
$sr++;
      }     
  }

else{
  $donormessage= "No information available! Upload your blood donate information.";
?>
  
<tr>
  <td colspan="3"><?=$donormessage?> </td>
</tr>
 

<?php 
}
  ?>
     
      
    </tbody>
  </table>

  <!--blood donation information end-->


  </div>





<!-- right side advertise div start-->
  <div class="col-md-3" style="background-color: ;">
    <div class="row m-2 advertise">
      <div class="col-md-12 text-center border p-2">

<!--carousel start-->

<div class="row mx-0  px-0">

<div id="demo" class="col-md-12 carousel slide px-0 mb-3" data-ride="carousel">


  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/advertise1.jpg" alt="pizza" width="100%" max-height="200px">
       
    </div>
    <div class="carousel-item">
      <img src="image/advertise contact.jpg" alt="hamburger" width="100%" max-height="200px">
    </div>
  
</div>

</div>
</div>
<!--carousel end-->

    
      </div>
    </div>
  </div>
<!-- right side advertise div end-->
</div>




<!--list end-->




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