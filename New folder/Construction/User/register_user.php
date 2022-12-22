<?php 
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$first_name = ucfirst($_POST['FirstName']);
$last_name = ucfirst($_POST['LastName']);
$name = $first_name.' '.$last_name;

$address = $_POST['Address'];
$email = $_POST['Email'];
$password = $_POST['Password'];


$queue = "SELECT * FROM user";
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


$query = "INSERT INTO user(name,email,password,address) VALUES('$name', '$email', '$password', '$address')";
$result = mysqli_query($con, $query);
if($result == TRUE)
{
    ?>
    <script>
        alert("Registered");
        window.location.href="../index.php";
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