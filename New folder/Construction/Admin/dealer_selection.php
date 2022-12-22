<?php
include "../connection.php";
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());
echo "Hello";
$dealer_id = $_GET['dealer_id'];
$order_id = $_GET['order_id'];

$query = "UPDATE orders SET dealer_id=".$dealer_id.", status=1 WHERE order_id=".$order_id;
$result = mysqli_query($con, $query);

if($result == TRUE)
{
    ?>
    <script>
        alert("Request sent to dealer!");
        window.history.back();
    </script>
    <?php
}

else
{
    ?>
    <script>
        alert("ERROR occured!");
        window.history.back();
    </script>
    <?php
}

?>