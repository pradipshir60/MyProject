<style>
h4,
h5 {
    padding-top: 10px;
    margin-left: 11px;
}
</style>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
include "partial/dbconnect.php";
$name=$_POST['registerName'];
$email=$_POST['registerEmail'];
$mobile=$_POST['registerMobile'];
$address=$_POST['registerAddress'];
$password=$_POST['registerPassword'];
}


$sql="INSERT INTO `studentdetails` (`name`, `email`, `Password`, `mobile`, `address`) VALUES ('$name', '$email', '$password', '$mobile', '$address')";
$result=mysqli_query($conn,$sql);

if($result){
    session_start();
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    $_SESSION['mobile']=$mobile;
    $_SESSION['address']=$address;

include "partial/registration_header.php";
echo '<h4> Hi '.$_SESSION['name'].'</h4>
  <h5>Thank you For Registration </h5>
  <h5>Please Click <a href="/user/new/processController.php"> here </a> to check previously sumitted responses</h5>';
}
else{
    include "registration_header.php";
  
  echo'<h3 class="position-absolute top-50 start-50 translate-middle">Please fill the form again! click <a href="/user/new/register.php"> here </a> to Fill the form  </h3>';
}
?>