<?php
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port)
  or die('Could not connected to the database server ' . mysqli_connect_error());

$id = $_GET['contractor_id'];

$query = "DELETE FROM contractor WHERE contractor_id='$id'";
$result = mysqli_query($con, $query);

if($result == TRUE)
{
    ?>
    <script>
        alert("Contractor Deleted!");
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