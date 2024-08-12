
<?php
session_start();

//echo $_SESSION['id'];
//echo $_SESSION['name'];

if(isset($_GET['logout'])){
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  unset($_SESSION['img']);
   header("Location: login.php");
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

<!--scrole notice start-->  
<div class="row bg-white">
  <div class="col-md-12">
    <marquee behavior="scroll" direction="left"> <p class="notice pt-3"> রক্ত দানের পূর্বে যাকে রক্ত দিবেন তার পরিচয় সম্পর্কে সঠিক ভাবে জেনেনিন। সন্দেহভাজন বা ঝুঁকিপূর্ণ স্থানে রক্তদানে যাওয়া থেকে বিরত থাকুন।   </p> </marquee>

  </div>
</div>
<!--scrole notice end--> 


<!--carousel start-->

<div class="row mx-0  px-0">

<div id="demo" class="col-md-12 carousel slide px-0" data-ride="carousel">

<!-- indicator start-->
   <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
   </ul>
<!-- indicator end-->

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/cover1.jpg" alt="Blood Cover" width="100%" max-height="700px">
       <div class="carousel-caption">
       <p class="carouselText">রক্তদান করুন, জীবন বাচান।</p> 
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/cover2.jpg" alt="Blood Cover" width="100%" max-height="700px">
      <div class="carousel-caption">
        <a class="linkdecoretion" href="#aboutDonate">
         <p class="carouselText">রক্তদানে সতর্কতা এবং যা জানা জরুরি</p>
        </a>
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/cover3.jpg" alt="Blood Cover" width="100%" max-height="700px">
      <div class="carousel-caption captionPossition">
       <p class="carouselText">আমি নিয়মিত রক্তদান করছি।</p>
       <p class="carouselText1">আপনি করছেন তো? </p>
      </div>
    </div>
  </div>
  
  <!--Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

</div>

<!--carousel end-->


<!-- common data start-->
<div class="row pt-4" id="aboutDonate">
  <div class="col-md-12 bg-white">
    <div class="row pt-5">
      <div class="col-md-2 "></div>
      <div class="col-md-7 ">
        <h2>রক্ত দানের আগে রক্তদানের নিয়ম এবং সতর্কতাগুলো জেনে নেয়া দরকার।</h2>
      </div>
      <div class="col-md-3"></div>

    </div>

    <div class="row">
      <div class="col-md-2 "></div>
      <div class="col-md-7 ">
        <br>
        <h4>কারা রক্ত দিতে পারবেন:</h4>
        <p> 
          • শারীরিক এবং মানসিক ভাবে সুস্থ নিরোগ ব্যক্তি রক্ত দিতে পারবেন  <br>
          • রক্ত দাতার বয়স ১৮ থেকে ৬০ বছরের মধ্যে হতে হবে  <br>
          • শারীরিক ওজন ৪৫ কেজি বা এর বেশি হতে হবে। উচ্চতা অনযায়ী ওজন ঠিক আছে কিনা অর্থ্যাৎ বডি মাস ইনডেক্স ঠিক আছে কিনা দেখে নিতে হবে।  <br>
          • রক্তে হিমোগ্লোবিনের পরিমাণ, পালস এবং শরীরের তাপমাত্রা স্বাভাবিক থাকতে হবে  <br>
          • শ্বাস-প্রশ্বাসজনিত রোগ এ্যাজমা, হাপানি যাদের আছে তারা রক্ত দিতে পারবেন না  <br>
          • চর্মরোগ থেকে মুক্ত থাকতে হবে  <br>
        </p>
      </div>

          <div class="col-md-3">
            <div class="row m-2 advertise2">
              <div class="col-md-12 text-center border p-2">
                <!--carousel start-->
                  <div class="row mx-0  px-0">
                  <div id="demo" class="col-md-12 carousel slide px-0 mb-3" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="image/advertise1.jpg" alt="advertize" width="100%" >
                      </div>
                      <div class="carousel-item">
                        <img src="image/advertise contact.jpg" alt="Contact" width="100%" >
                      </div>
                    </div>
                  </div>
                  </div>
                <!--carousel end-->
             </div>
            </div>
          </div>
    </div>





    <div class="row">
      <div class="col-md-2 "></div>
      <div class="col-md-7">
        <br>
        <h4>এছাড়া রক্তদানের উপযোগিতা যাচাই করার জন্য কতকগুলো পরীক্ষা করা জুরুরি।</h4>
        <p> 
          
          যেমন: <br>
          ১) এনিমিয়া বা রক্ত স্বল্পতা, <br>
          ২) জন্ডিস, <br>
          ৩) পালস রেট, <br>
          ৪) রক্তচাপ, <br>
          ৫) শরীরের তাপমাত্রা, <br>
          ৬) ওজন, <br>
          ৭) হিমোগ্লোবিন টেস্ট, <br>
          ৮) ব্লাড সুগার বা চিনির মাত্রা পরিমাপ করা <br>
          ৯) সেরাক ক্রিয়েটিনন, <br>
          ১০) ইসিজি। <br>
          পরীক্ষাগুলো খুব সাধারণ। তাই রক্ত দাতাদের আগে থেকে টেস্ট করে রাখা উচিত। বিপদের সময় যাতে বিলম্ব না হয়। <br>
        </p>
      </div>
      <div class="col-md-3"></div>
    </div>


<div class="row">
  <div class="col-md-2 "></div>
      <div class="col-md-7">
        <br>
        <p>  
          একজন পূর্ণবয়স্ক মানুষ ৪ মাসে অন্তত একবার রক্ত দিতে পারেন। বাংলাদেশে প্রতি ৩ মাসে একবার রক্ত দেয়াকে নিরাপদ ধরা হয়। রক্তদাতা একবার রক্ত দিলে তার শরীরের ১০ ভাগের মাত্র ১ ভাগ রক্ত কমে। কিন্তু এই পরিমাণ রক্ত অল্প সময়েই আগের মত হয়ে যায়। শরীরে সাধারণ ৫-৬ লিটার রক্ত থাকে। রক্তদাতা সাধারণত এক দফায় ৪০০-৪৫০ মিলিলিটার রক্ত দিয়ে থাকেন। এই পরিমাণ রক্ত দেয়াতে দেহের উপর তেমন কোন প্রভাবই পড়ে না। তাই রক্ত দাতার অযথা ভয় ভীতির কোন কারণ নেই। তবে রক্ত দানের আগে এবং পরে বিশেষ কিছু সতর্কতা অবশ্যই পালনীয়।
        </p>
      </div>
      <div class="col-md-3"></div>
    </div>


 <div class="row">
  <div class="col-md-2 "></div>
      <div class="col-md-7">
        <br>
        <h4>রক্তদানে বিশেষ সতর্কতা:</h4>
        <p> 
          
              • রক্তদানের ৪ ঘন্টা আগে ভালোভাবে খাদ্যগ্রহণ করতে হবে। খালি পেটে রক্ত দান করা ঠিক নয়।<br>
              • এসপিরিন ও এ জাতীয় ওষুধ খাওয়া অবস্থায় রক্ত দেয়া যাবে না। রক্তদানের ৪৮ ঘন্টা আগে এমন ওষুধ বন্ধ করতে হবে।<br>
              • কোনরূপ এনার্জি ড্রিংক রক্তদানের ২৪ ঘন্টা আগে সেবন করা যাবে না।<br>
              • শরীরে কোন উল্কি বা ট্যাটু করানো হলে বা নাক কান ফুটো করানো হলে ২-৪ সপ্তাহ পর রক্ত দিতে হবে।<br>
              • অ্যান্টিবায়োটিক গ্রহণ করা অবস্থায় রক্ত দেয়া উচিত না।<br>
          <br>
          বিষয়গুলো জুরুরী তাই রক্তদাতা কে অবশ্যই এগুলো মানতে হবে। একই সাথে রক্ত দেয়ার সময় যে সুঁচ ব্যবহার করা হচ্ছে তা নিশ্চিত হয়ে নিবেন তা নিরাপদ কিনা। আপনার একটু অসাবধানতায় রক্তে বাসা নিতে পারে কোন মরণব্যাধির। তাই রক্তদান করতেও রাখা উচিত অতিরিক্ত সতর্কতা।
          <br>
          <br>
          
        </p>
      </div>
      <div class="col-md-3"></div>
    </div>


      <div class="row">
<div class="col-md-2 "></div>
      <div class="col-md-7">
        <br>
        <h4>যারা রক্ত দিতে পারবেন না:</h4>
        <p> 
          
          • ক্যান্সারের রোগী<br>
          • হিমেফিলিয়াতে যারা ভুগছেন <br>
          • যারা মাদক গ্রহণ করেছেন <br>
           • গর্ভবতী মহিলা<br>
           • অতিরিক্ত শ্বাস কষ্ট যাদের আছে<br>
           • যাদের এইচআইভি পজেটিভ তথা এইডস আছে <br>
           • যাদের ওজন গত ২ মাসে ৪ কেজি কমে গেছে<br>
           এছাড়াও আর বেশকিছু কারনে রক্ত দেয়া যাবে না।<br>
          <br>
        </p>
      </div>
      <div class="col-md-3"></div>
    </div>

     <div class="row">
      <div class="col-md-2 "></div>
      <div class="col-md-7">
        <br>
       
        <p> 
           এখনকার বিশ্বে রক্তদান কে উৎসাহিত করা হয়। আর আমাদের মতন দেশে বিপদ আপদ দুর্ঘটনা লেগেই থাকে। প্রতিবছর বিশ্বজুড়ে ৩২ মিলিয়ন মানুষ রক্ত দান করেন। ২০০৪ সাল থেকে বিশ্ব স্বাস্থ্য সংস্থার উদ্যোগে ১৪ জুন এ বিশ্ব রক্তদাতা দিবস পালিত হয়। রক্তদান একটি মানবিক কাজ। আপনার দেয়া রক্তে হয়তো একজন মুমূর্ষ রোগী বেঁচে যাবেন। মৃত্যুকে জয় করে এভাবে অসংখ্য মানুষ গাইবে মানবতার জয়গান।
          <br>
          <br>
        </p>
      </div>
      <div class="col-md-3"></div>
    </div>
    



  </div>
</div>
<!-- common data end-->


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