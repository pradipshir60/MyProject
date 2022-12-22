<?php
session_start();
include "../connection.php";

$tender_id = $_GET['tender_id'];
$form_id = $_GET['form_id'];

$con = new mysqli($host, $user, $password, $dbname, $port) 
        or die('Could not connected to the database server '.mysqli_connect_error());

$query = "UPDATE interior_tender SET status='Completed' WHERE interior_id=".$tender_id." AND contractor_id=".$_SESSION['contractor_id'];
$result = mysqli_query($con, $query);

$query1 = "UPDATE interior_form SET status='Completed' WHERE interior_form_id=".$form_id;
$result1 = mysqli_query($con, $query1);

if($result && $result1 == TRUE)
{
    ?>
    <script>
        alert("Tender Order Completed!!");
        window.location.href="accepted_tenders.php";
    </script>
    <?php
}

else
{
    ?>
    <script>
        alert("ERROR");
        window.location.href="accepted_tenders.php";
    </script>
    <?php
}

mysqli_close($con);

?>