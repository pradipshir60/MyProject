<?php 
session_start();

if(isset($_SESSION['user_id']))
{
include "header.php";
include "../connection.php";
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$id = $_SESSION['user_id'];
$address = $_POST['address'];
$area = $_POST['area_sq'];
$description = $_POST['description'];


$query = "INSERT INTO requirement_form(user_id, address, area, description, validate) VALUES('$id', '$address', '$area', '$description', '0')";
$result = mysqli_query($con, $query);

if($result == TRUE){
    ?>
    <script>
        alert("Submitted!!");
        window.location.href="dashboard.php";
    </script>
    <?php
}
else{
    ?>
    <script>
        alert("ERROR");
        window.hisory.back();
    </script>
    <?php
}
}

else{
    echo "SESSION not active!";
    exit();
}
?>