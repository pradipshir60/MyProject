<?php
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$name = $_GET['name'];
$email = $_GET['email'];
$password = $_GET['password'];

$query = "INSERT INTO contractor(name, email, password) VALUES('$name', '$email', '$password')";
$result = mysqli_query($con, $query);

if($result == TRUE)
{
    ?>
    <script>
        alert("Contractor Added!!");
        window.location.href="registered_contractor.php";
    </script>
    <?php 
}
else
{
    ?>
    <script>
        alert("ERROR");
        window.location.href="registered_contractor.php";
    </script>
    <?php 
}

?>