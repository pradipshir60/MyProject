<?php
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$user_id = $_GET['user_id'];

$query = "DELETE FROM user WHERE id=".$user_id;
$result = mysqli_query($con, $query);

if($result == TRUE)
{
    ?>
    <script>
        alert("User Deleted!");
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

?>