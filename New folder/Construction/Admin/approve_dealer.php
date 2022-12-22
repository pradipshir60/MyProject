<?php
include "../connection.php";

$id = $_GET['user_id'];

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$query = "UPDATE dealer SET status=0 WHERE id=".$id;

if ($con->query($query) === TRUE) 
{
    ?>
    <script>
        alert("Dealer Approved!!");
        window.location.href="requested_dealer.php";
    </script>
    <?php
} 
else 
{
    ?>
    <script>
        alert("ERROR while approving!");
        window.history.back();
    </script>
    <?php
}

?>