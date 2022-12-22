<?php 
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$contractor_id = $_GET['contractor_id'];
$form_id = $_GET['requirement_form_id'];
$eform_id = $_GET['eform_id'];

$query = "UPDATE e_tender SET contractor_id=$contractor_id, status='Accepted', eform_id=$eform_id WHERE requirement_form_id=$form_id";
$result = mysqli_query($con, $query);

$query1 = "UPDATE requirement_form SET status='Accepted' WHERE form_id=$form_id";
$result1 = mysqli_query($con, $query1);

$query2 = "UPDATE e_form SET status=1 WHERE requirement_form_id=$form_id";
$result2 = mysqli_query($con, $query2);

if($result && $result1 && $result2 == TRUE)
{
    ?>
    <script>
        alert("Tender Placed!!!");
        window.location.href="select_contractor.php";
    </script>
    <?php
}

else
{
    ?>
    <script>
        alert("ERROR");
        window.location.href="select_contractor.php";
    </script>
    <?php
}

?>