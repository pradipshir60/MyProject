<?php
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$id = $_POST['dealer_id'];
$username = $_POST['user_name'];
$phn_no = $_POST['phn_no'];
$address = $_POST['address'];
$shop_act = $_POST['shopAct'];
$shop_address = $_POST['shopAddress'];
$pass = $_POST['password'];

$material = array();
foreach ($_POST['material'] as $names) {
    array_push($material, $names);
}
$mod_material = implode(", ", $material);


//Area availability from selected options
$area = array();
foreach ($_POST['availability'] as $locality) {
    array_push($area, $locality);
}
$mod_area = implode(", ", $area);


$query = "UPDATE dealer SET name='$username', phn_no='$phn_no', address='$address', shopAct='$shop_act', shop_add='$shop_address', password='$pass', material='$mod_material', availability='$mod_area' WHERE id='$id'";
$result = mysqli_query($con, $query);

if ($result == TRUE) {
?>
    <script>
        alert("Dealer Information Updated!");
        window.location.href = "approved_dealer_request.php";
    </script>
<?php
} else {
?>
    <script>
        alert("ERROR");
        window.location.href = "approved_dealer_request.php";
    </script>
<?php
}
