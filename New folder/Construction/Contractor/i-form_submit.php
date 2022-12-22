<?php 
session_start();
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port) 
or die('Could not connected to the database server '.mysqli_connect_error());

$form_id = $_POST['form_id'];
$contractor_id = $_SESSION['contractor_id'];


$temp = explode(".", $_FILES["pdf_file"]["name"]);
$extension = end($temp);
$upload_tender=$_FILES["pdf_file"]["name"];

$query = "INSERT INTO i_form(interior_form_id, contractor_id, file) VALUES('$form_id', '$contractor_id', '$upload_tender')";
$result = mysqli_query($con, $query);
if($result == TRUE)
{
    ?>
    <script>
        alert("Interior Tender Submitted!!");
        window.location.href="new_interior_application.php";
    </script>
    <?php
        move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"../Admin/interior_tender/" . $_FILES["pdf_file"]["name"]);
}
else
{
    ?>
    <script>
        alert("ERROR");
        window.location.href="new_interior_application.php";
    </script>
    <?php
}

?>