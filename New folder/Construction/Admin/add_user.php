<?php 
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());


$name = $_GET['name'];
$address = $_GET['address'];
$email = $_GET['email'];
$password = $_GET['password'];

$query = "INSERT INTO user(name, email, password, address) VALUES('$name', '$email', '$password', '$address')";
$result = mysqli_query($con, $query);
if($result == TRUE)
{
    ?>
    <script>
        alert("User Added!");
        window.location.href="registered_user.php";
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("ERROR");
        window.location.href="registered_user.php";
    </script>
    <?php
}

mysqli_close($con);
?>