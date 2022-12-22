<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      include "partial/dbconnect.php";
      $email=$_POST['username1'];
      $password=$_POST['loginPassword'];
      $exist_sql="SELECT * FROM `studentdetails` WHERE `email`='$email'";
      $result=mysqli_query($conn,$exist_sql);
      $numRows=mysqli_num_rows($result);
      if(($numRows==1)){
          $row=mysqli_fetch_assoc($result);
          if($password==$row['Password']){
            session_start();
            $_SESSION['useremail']=$row['email'];
            $_SESSION['user_name']=$row['name'];
            header ("location:/user/new/dashboard.php?loginsuccess=true");
            exit();
          }
          else{ 
            $showAlert="Please Enter correct email and password";
            header ("location:/user/new/index.php?loginerror=$showAlert");
          }
        }
     else{ 
      $showAlert="Please Enter correct email and password";
      header ("location:/user/new/index.php?loginerror=$showAlert");
     }}
     ?>