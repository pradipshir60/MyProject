<?php 
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$first_name = ucfirst($_POST['FirstName']);
$last_name = ucfirst($_POST['LastName']);
$name = $first_name." ".$last_name;

$email = $_POST['Email'];
$password = $_POST['Password'];


$queue = "SELECT * FROM contractor";
$res = mysqli_query($con, $queue);
while($row = mysqli_fetch_array($res))
{
    if($row['email'] == $email)
    {
        ?>
        <script>
            alert("Email already registered! Please try another email");
            window.history.back();
        </script>
        <?php
    }
}


$query = "INSERT INTO contractor(name, email, password) VALUES('$name', '$email', '$password')";
$result = mysqli_query($con, $query);
if($result == TRUE)
{
    ?>
    <script>
        alert("Registered");
        window.location.href="login.html";
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Registration Failed!");
        window.history.back();
    </script>
    <?php 
}

?>