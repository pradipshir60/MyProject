<?php
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$contractor_id = $_GET['contractor_id'];
$eform_id = $_GET['eform_id'];

$query = "UPDATE e_form SET status=2 WHERE eform_id=" . $eform_id;
$result = mysqli_query($con, $query);

if ($result == TRUE) {
?>
    <script>
        alert("Tender Rejected!!");
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

?>