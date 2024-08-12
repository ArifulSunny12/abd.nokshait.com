
<?php
session_start();

$host='localhost';
$user='nokshait_admin';
$pass='51563435Sun';
$db='nokshait_blood';


 $messageflag=0;



if(isset($_SESSION['id']) ){
   }

   else{
     header("Location: login.php");
   }



if(isset($_GET['logout'])){
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  unset($_SESSION['img']);
   header("Location: login.php");
}


$personid = $_SESSION['id'];

 $link = mysqli_connect($host,$user,$pass,$db);
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



//update code start

  if(isset($_POST['updateinfo']) && isset($_FILES['img']) ){
    
  $name1= $_POST['name'];
  $mobile1= $_POST['mobile'];
  $dofb1= $_POST['dofb'];
  $gender1= $_POST['gender'];
  $blood1= $_POST['blood-group'];
  $village1= $_POST['village'];
  $police1= $_POST['police-station'];
  $District1= $_POST['District'];

  $oldmobile= $_POST['oldmobile'];



      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = "SELECT name,mobile FROM `donor` WHERE mobile='$mobile1' ";


      $res1=mysqli_query($link,$sql);

      $result1 = mysqli_fetch_assoc($res1);
      if ($result1==!null) {
        $name1= $result1['name'];
        $mobile1= $result1['mobile'];
      //   $img1 = $result1['img'];

        if ($oldmobile != $mobile1) {


           $message= "Sorry! someone have already registar using ".$mobile1." mobile number. try another one." ;
            $messageflag=1;
        unset($res1);
        }

        else{


            //move image code start
  $moveimglink = mysqli_connect($host,$user,$pass,$db);


  $moveimgsql = "SELECT img FROM donor WHERE id = '$personid' ";
      $moveimgresult=mysqli_query($moveimglink,$moveimgsql);
      $moveimgresult1 = mysqli_fetch_assoc($moveimgresult);
  $moveimg_img = $moveimgresult1['img'];
/* Store the path of source file */
$filePath = 'donors/'.$moveimg_img; 
/* Store the path of destination file */
$destinationFilePath = 'trash/'.$moveimg_img;
  
/* Move File from images to copyImages folder */
if( !rename($filePath, $destinationFilePath) ) {  
    echo "File can't be moved!";  
}  
else {       } 
//move image code end




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
      $sql =" UPDATE donor SET name = '$name1', mobile= '$mobile1',dob = '$dofb1',gender = '$gender1', 
      blood_group = '$blood1',img = '$new_img_name', village = '$village1', police_station = '$police1', 
      District = '$District1' WHERE donor.id = '$personid'";


          if(mysqli_query($link,$sql)){


            $_SESSION['img']=$new_img_name;
           unset($_SESSION['modify']);
           $_SESSION['message'] = 'Personal Information Updated Successfully';
           $_SESSION['messageflag']=1;

             header("Location: donor.php");

          } else{
          die('Query Problem'.mysqli_error($link));
        }

        }





   
      
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
      $sql =" UPDATE donor SET name = '$name1', mobile= '$mobile1',dob = '$dofb1',gender = '$gender1', 
      blood_group = '$blood1',img = '$new_img_name', village = '$village1', police_station = '$police1', 
      District = '$District1' WHERE donor.id = '$personid'";


          if(mysqli_query($link,$sql)){

           unset($_SESSION['modify']);

             header("Location: donor.php");

          } else{
          die('Query Problem'.mysqli_error($link));
        } 



}




 }


//update code end



if(isset($_POST['uploadinfo'])){
    
 
  $dofd= $_POST['dofd'];
  $place= $_POST['place'];
  $personId= $_SESSION['id'];

      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = "INSERT INTO donateinfo (personId,lastDonate,place) VALUES 
        ('$personId','$dofd','$place')";

      if(mysqli_query($link,$sql)){
             unset($_SESSION['modify']);

            $_SESSION['message']= "New Information Updated Successfully" ;
            $_SESSION['messageflag']=2;
             header("Location: donor.php");

          } else{
          die('Query Problem'.mysqli_error($link));
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


<!-- Update personal info form start-->

<?php

if ($_SESSION['modify'] == 'update') {

 
 ?>




<div class="container py-5 ">
<div class="row px-0 mx-0 justify-content-center">
  <div class="col-md-8">



   <div class="row">
     
     <div class=""> <?php
    if ($messageflag==1) {

        ?>
      <p style="color: red;"><?=$message?></p>

   <?php  
    $messageflag=0;
    }
     ?></div>
     
  </div>
  <div class="row">
     
     <div class=""><h3>Update Personal Information </h3></div>
     
  </div>
  <hr>


    <form action="" method="post" enctype="multipart/form-data">
      
     <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
       <span class="">Name:</span> 
      </div>
      <div class="col-md-9 px-0 " >
        <input class="w-100 p-2 border" type="text" name="name" value="<?php echo $name ?>" required> 
      </div>   
     </div>
      

     <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
       <span>Mobile:</span> 
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="text" name="mobile" value="<?php echo $mobile ?>" required>
        <input class="w-100 p-2 border" type="hidden" name="oldmobile" value="<?php echo $mobile ?>" >
      </div>   
     </div>

       
    <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
        <span>Date of birth:</span> 
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="date" name="dofb" value="<?php echo $dofb ?>" required> 
      </div>   
     </div>

     

      <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
        <span>Your Gender:</span> 
      </div>
      <div class="col-md-9 px-0" >
        <select class="w-100 p-2 border" name="gender" required>
        <option value= "<?php echo $gender ?>" >      <?php echo $gender ?>     </option>

        <option value="" disabled>Select Gender</option>
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
        <option value="<?php echo  $blood ?>" >  <?php echo  $blood ?>  </option>
        <option value=""  disabled>Select Blood Group</option>
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
         <input class="w-100 p-2 border" type="text" name="village" value="<?php echo $village ?>" required>
      </div>   
     </div>


     <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
          <span>Police Station:</span> 
      </div>
      <div class="col-md-9 px-0" >
         <input class="w-100 p-2 border" type="text" name="police-station" value="<?php echo $police ?>" required>
      </div>   
     </div>


     <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
          <span>District:</span> 
      </div>
      <div class="col-md-9 px-0" >
         <input class="w-100 p-2 border" type="text" name="District" value="<?php echo $District ?>" required>
      </div>   
     </div>





      <input class="w-100 bg-success font-weight-bold py-2 mb-3 border-0" type="submit" name="updateinfo" value="Update info">

    </form>
  </div>
</div>
</div>


 <?php 
}

 ?>

<!-- Update personal info form end-->


<!-- Upload blood donation info form start-->

<?php

if ($_SESSION['modify'] == 'upload') {

 
 
 ?>

<div class="container py-5 ">
<div class="row px-0 mx-0 justify-content-center">
  <div class="col-md-8">



  <div class="row">
     
     <div class=""><h3>Upload Donate Information </h3></div>
     
  </div>
  <hr>


    <form action="" method="post" >
      
     

       
    <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
        <span>Date of Donation:</span> 
      </div>
      <div class="col-md-9 px-0" >
        <input class="w-100 p-2 border" type="date" name="dofd" required> 
      </div>   
     </div>

    <div class="row px-0 mx-0 my-3">
        <div class="col-md-3 pl-0 pt-2" >
          <span>Donation place:</span> 
      </div>
      <div class="col-md-9 px-0" >
         <input class="w-100 p-2 border" type="text" name="place" placeholder="blood Donation place" required>
      </div>   
    </div>


      <input class="w-100 bg-success font-weight-bold py-2 mb-3 border-0" type="submit" name="uploadinfo" value="Upload Info">

    </form>
  </div>
</div>
</div>


 <?php 
}

 ?>
<!-- Upload blood donation info form end-->



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