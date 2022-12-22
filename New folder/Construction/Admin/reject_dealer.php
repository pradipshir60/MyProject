<?php
include "../connection.php";

$id = $_GET['user_id'];

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$query = "UPDATE dealer SET status=2 WHERE id=".$id;

if ($con->query($query) === TRUE) 
{
    ?>
    <script>
        alert("Dealer Rejected!!");
        window.history.back();
    </script>
    <?php
} 
else
{
    ?>
    <script>
        alert("ERROR while deleting!");
        window.history.back();
    </script>
    <?php
}

?>