<?php
session_start();
include "../connection.php";

$dealer_id = $_SESSION['dealer_id'];
$order_id = $_GET['order_id'];

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$query = "UPDATE orders SET status=3 WHERE dealer_id=".$dealer_id." AND order_id=".$order_id;
$result = mysqli_query($con, $query);

if($result == TRUE)
{
    ?>
    <script>
        alert("Rejected!");
        window.history.back();
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("ERROR!");
        window.history.back();    
    </script>
    <?php
}
mysqli_close($con);

?>