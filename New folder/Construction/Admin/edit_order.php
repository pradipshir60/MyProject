<?php
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$order_id = $_GET['order_id'];

$query = "UPDATE orders SET dealer_id=NULL,status=0 WHERE order_id=$order_id";
$result = mysqli_query($con, $query);

if($result == TRUE)
{
    ?>
    <script>
        alert("You can now select new dealer!");
        window.history.back();
    </script>
    <?php
}

else
{
    ?>
    <script>
        alert("You cannot do this operation!");
        window.history.back();
    </script>
    <?php
}


?>