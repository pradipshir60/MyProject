<?php
include "index.html";
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$form_id = $_GET['form_id'];

$query = "UPDATE interior_form SET validate='2' WHERE interior_form_id=" . $form_id;

if ($con->query($query) === TRUE) {
?>
    <script>
        alert("Form Deleted!");
        window.location.href = "interior_requirement_requests.php";
    </script>
<?php
} else {
?>
    <script>
        alert("ERROR");
        window.location.href = "interior_requirement_requests.php";
    </script>
<?php
}

mysqli_close($con);

?>