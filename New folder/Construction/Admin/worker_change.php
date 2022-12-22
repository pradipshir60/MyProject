<?php 
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port)
  or die('Could not connected to the database server ' . mysqli_connect_error());

$labour = $_POST['labour'];
$carpenter = $_POST['carpenter'];
$electrician = $_POST['electrician'];
$equip_operator = $_POST['equip_operator'];
$manager = $_POST['manager'];

$query = "UPDATE worker SET labour='$labour', carpenter='$carpenter', electrician='$electrician', equip_operator='$equip_operator', manager='$manager' WHERE id=1";
$result = mysqli_query($con, $query);

if($result == 1)
{
    ?>
    <script>
        window.location.href="worker_availability.php";
    </script>
    <?php
}

else
{
    ?>
    <script>
        alert("An error Occuerd!");
        window.location.href="worker_availability.php";
    </script>
    <?php
}

mysqli_close($con);

?>