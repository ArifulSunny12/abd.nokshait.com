<?php



$host='localhost';
$user='nokshait_admin';
$pass='51563435Sun';
$db='nokshait_blood';



      $link = mysqli_connect($host,$user,$pass,$db);
      $sql = " SELECT * FROM `donor` ORDER BY id ASC";
      $res = mysqli_query($link,$sql);
      



      if (mysqli_num_rows($res)>0) {

  

  while ($result = mysqli_fetch_assoc($res)) { 



  $name= $result['name'];
  $mobile= $result['mobile'];
  $gender= $result['gender'];
  $blood= $result['blood_group'];
  $village= $result['village'];
  $police= $result['police_station'];
  $District= $result['District'];
  $img = $result['img'];




  echo $name;
  echo "--------";

}
}

?>