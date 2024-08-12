
<?php

session_start();

$host='localhost';
$user='nokshait_admin';
$pass='51563435Sun';
$db='nokshait_blood';

//echo $_SESSION['id'];
//echo $_SESSION['name'];

if(isset($_GET['logout'])){
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  unset($_SESSION['img']);
  header("Location: login.php");
}

if(isset($_POST['btnSearch']) ){
  
   $blood= $_POST['blood_group'];
   $District= $_POST['District']; 
  



  if ($blood==!null && $District==!null ) {
         
      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = " SELECT * FROM `donor` WHERE blood_group='$blood' && District='$District' ORDER BY id ASC";
      $res = mysqli_query($link,$sql);
      }  
  elseif ($blood==!null ) {

    if ($blood=="all") {
      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = " SELECT * FROM donor ORDER BY id ASC";
      $res = mysqli_query($link,$sql);
    }

    else{
      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = " SELECT * FROM `donor` WHERE blood_group='$blood' ORDER BY id ASC";
      $res = mysqli_query($link,$sql);
    }
     
     } 
  elseif ($District==!null) {
      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = " SELECT * FROM `donor` WHERE District='$District' ORDER BY id ASC";
      $res = mysqli_query($link,$sql);
    }  
  else{


      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = " SELECT * FROM donor ORDER BY id ASC";
      $res = mysqli_query($link,$sql);
    
  }   

}

else{
      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = " SELECT * FROM donor ORDER BY id ASC";
      $res = mysqli_query($link,$sql);
}



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

<div class="container-fluid px-0">

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
      <li class="navbar-item   mx-1"> <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" href="index.php">Home</a> </li>
      <li class="navbar-item   mx-1"> <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" style="color: red;" href="donorlist.php">Donor List</a> </li>
<?php 
if(isset($_SESSION['id']) ){
if ($_SESSION['id']==!null) {

  ?>
      <li class="navbar-item   mx-1 "> 
        <img class="mt-2" src="donors/<?=$_SESSION['img']?>" width="25px" style="border-radius: 20px; float: left;">
        <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" style=" float: left;" href="donor.php"><?=$_SESSION['name']?></a>
      </li>
      <li class="navbar-item   mx-1"> <a class="nav-link px-sm-1 px-md-1 px-lg-3 ltsp" href="?logout=true">log Out</a> </li>
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
    <marquee behavior="scroll" direction="left"> <p class="notice pt-3" style=""> রক্তদাতার যাতায়াতের সম্পূর্ণ ব্যবস্থা করুন। রক্তদানের পূর্বে রক্তদাতাকে হাফ লিটার পানিতে স্যালাইন মিশিয়ে খাওয়ার জন্য দিন এবং রক্তদানের পরে এক লিটার পানি খাওয়ার জন্য দিন। রক্তদানের পর রক্ত দাতা সুস্থ আছে কিনা বা পরবর্তীতে তার কোন সমস্যা হল কিনা সে বেপারে অবশ্যই খোঁজখবর রাখুন।  </p> </marquee>

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


  <div class="col-md-7 tpx-0 ">

    <!--search nav start-->
    <form action="" method="post">
    <div class="row">
      
      <div class="col-md-6 col-lg-5 tpr-0">

        <div class="bloodfilter1"> 
          <label>Blood group: </label>
        </div>
        <div class="bloodfilter2">
        <select class="p-1 border" style="width: 100%;" name="blood_group" required>
        <option value="" selected disabled>Select Blood Group</option>
        <option value="all" > All Blood Group </option>
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
    <div class="col-md-6 col-lg-4 tpl-2" >

      <div class="bloodfilter1"> 
          <label class="">District: </label>
      </div>
      <div class="bloodfilter2"> 
          <input class="p-1" style="width: 100%;"  type="text" name="District" placeholder="পূরণ করুন/না করুন">
      </div>
      
      
    </div>  
    <div class="col-md-12 col-lg-3" style="background-color: ;">
       <!--<button type="button" name="btnSearch" class="btn btn-danger"><i class="fa fa-search " style="font-size:20px;color:white"> Search</i></button>  -->

       <input class="btn btn-danger" style="width: 100%;" type="submit" name="btnSearch" value="Search" >

    </div> 

   
 
    </div>
     </form>
    <br>
 <!--search nav end-->

<!-- donor list start-->

<div class="col-md-12 donortable ">

<table class="col-md-12 table table-striped ">
    <thead>
      <tr>
        <th>Sr.</th>
        <th>Image</th>
        <th>Name</th>
        <th>Blood Group</th>
        <th>Mobile Numer</th>
        <th>Last Donate</th>
      </tr>
    </thead>

 <tbody>
<?php

$sr=1;
if (mysqli_num_rows($res)>0) {

  

  while ($result = mysqli_fetch_assoc($res)) { 

      $personid = $result['id'];

      $link = mysqli_connect($host,$user,$pass,$db);
      $sql3 = " SELECT lastDonate FROM donateinfo WHERE personId = '$personid' ORDER BY id DESC";
      $res3 = mysqli_query($link,$sql3);

      $result3 = mysqli_fetch_assoc($res3);



  $name= $result['name'];
  $mobile= $result['mobile'];


 if(isset($result3['lastDonate']) ){
    if ($result3['lastDonate']==!null) {
      $dofb= $result3['lastDonate'];
    }
   }
else{

$dofb= '- - -';

}
  




  $gender= $result['gender'];
  $blood= $result['blood_group'];
  $village= $result['village'];
  $police= $result['police_station'];
  $District= $result['District'];
  $img = $result['img'];



  ?>


      <tr>
        <td><?=$sr?></td>
        <td><img class="donorimg" src="donors/<?=$img?>" width="40px" style="border-radius: 20px;"></td>
        <td><?=$name?></td>
        <td><?=$blood?></td>
        <td><?=$mobile?></td>
        <td><?=$dofb?></td>
      </tr>
<?php 

$sr++;
      }     
  }



else{
  $donormessage= "No Donor Available!";
?>
  
<tr>
  <td colspan="6"><?=$donormessage?> </td>
</tr>
 

<?php 
}
  ?>

      
    </tbody>
  </table>
 </div>

 
    
<!-- donor list end-->
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