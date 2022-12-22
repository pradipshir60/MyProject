<?php
include "../connection.php";
session_start();
$id = $_SESSION['user_id'];
$material = $_GET['material'];
$quantity = $_GET['quantity'];
$total = $_GET['total'];

if ($total > 0) {

    $con = new mysqli($host, $user, $password, $dbname, $port)
        or die('Could not connected to the database server ' . mysqli_connect_error());

    $query = "INSERT INTO orders(user_id, material, quantity, total, status) VALUES('$id', '$material', '$quantity', '$total', '0')";
    $result = mysqli_query($con, $query);
    if ($result == TRUE) {
?>
        <script>
            alert("Quotation send! Please wait until confirmation!");
            window.location.href = "dashboard.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error Occured! Please try again later.");
            window.location.href = "dashboard.php";
        </script>
    <?php
    }
    mysqli_close($con);
} else {
    ?>
    <script>
        alert("Add some items to proceed");
        window.location.href = "index.php";
    </script>
<?php
}
?>