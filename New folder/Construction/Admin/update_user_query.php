<?php 
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$id = $_POST['user_id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$name = $firstName.' '.$lastName;
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "UPDATE user SET name='$name', email='$email', password='$password', address='$address' WHERE id='$id'";
$result = mysqli_query($con, $query);

if($result == TRUE)
{
    ?>
    <script>
        alert("User Information Updated!");
        window.location.href="registered_user.php";
    </script>
    <?php
}
else{
    ?>
    <script>
        alert("ERROR");
        window.location.href="registered_user.php";
    </script>
    <?php
}


?>