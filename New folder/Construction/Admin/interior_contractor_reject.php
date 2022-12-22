<?php 
include "../connection.php";

$contractor_id = $_GET['contractor_id'];
$form_id = $_GET['interior_form_id'];
$iform_id = $_GET['iform_id'];

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$query = "UPDATE i_form SET status=2 WHERE iform_id=$iform_id AND interior_form_id=$form_id";
$result = mysqli_query($con, $query);
if($result == TRUE)
{
    ?>
    <script>
        alert("Tender Rejected");
        window.history.back();
    </script>
    <?php 
}

else
{
    ?>
    <script>
        alert("ERROR");
        window.history.back();
    </script>
    <?php 
}

mysqli_close($con);

?>