<?php
include "index.html";
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$form_id = $_GET['form_id'];

$query = "UPDATE interior_form SET validate='1' WHERE interior_form_id=" . $form_id;

if ($con->query($query) === TRUE) {

    $date = date("Y-m-d");
    $query = "INSERT INTO interior_tender(date, name_work, interior_form_id, status) VALUES('$date', 'Interior Tender for $form_id', '$form_id', 'Requested')";
    $result = mysqli_query($con, $query);
    if ($result == TRUE) {
?>
        <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        ?>
        <script>
            alert("Form Validated!");
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
} else {
    ?>
    <script>
        alert("ERROR");
        window.location.href = "requirement_requests.php";
    </script>
<?php
}

mysqli_close($con);

?>