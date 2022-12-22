<?php 
session_start();

include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$form_id = $_GET['form_id'];

$query = "DELETE FROM requirement_form WHERE form_id=".$form_id;
$result = mysqli_query($con, $query);
if($result == TRUE)
{
    ?>
    <script>
        alert("Form Deleted!");
        window.location.href="applied_form.php";
    </script>
    <?php
}

else
{
    ?>
    <script>
        alert("ERROR");
        window.location.href="applied_form.php";
    </script>
    <?php
}

?>