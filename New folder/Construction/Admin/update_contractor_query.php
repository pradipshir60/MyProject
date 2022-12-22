<?php
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$id = $_POST['id'];
$firstName = $_POST['firstName'];
$firstName = ucwords($firstName);
$lastName = $_POST['lastName'];
$lastName = ucwords($lastName);
$name = $firstName.' '.$lastName;
$email = $_POST['email'];
$password = $_POST['password'];

$query = "UPDATE contractor SET name='$name', email='$email', password='$password' WHERE contractor_id='$id'";
$result = mysqli_query($con, $query);

if($result == TRUE)
{
    ?>
    <script>
        alert("Contractor Information Updated!");
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

mysqli_close($con);
?>