<?php
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$form_id = $_POST['form_id'];
$labour = $_POST['labour'];
$carpenter = $_POST['carpenter'];
$electrician = $_POST['electrician'];
$operator = $_POST['equip_operator'];
$manager = $_POST['manager'];

$result1 = mysqli_query($con, "SELECT * FROM worker");
while ($row = mysqli_fetch_array($result1)) {
    $wor_labour = $row['labour'];
    $wor_carpenter = $row['carpenter'];
    $wor_electrician = $row['electrician'];
    $wor_operator = $row['equip_operator'];
    $wor_manager = $row['manager'];
}

$worker_labour = $wor_labour - $labour;
$worker_carpenter = $wor_carpenter - $carpenter;
$worker_electrician = $wor_electrician - $electrician;
$worker_operator = $wor_operator - $operator;
$worker_manager = $wor_manager - $manager;

$query = "UPDATE worker SET labour='$worker_labour', carpenter='$worker_carpenter', electrician='$worker_electrician', equip_operator='$worker_operator', manager='$worker_manager' WHERE id=1";
$result = mysqli_query($con, $query);

$results = mysqli_query($con, "SELECT * FROM worker_req WHERE form_id='$form_id'");
while ($rows = mysqli_fetch_array($results)) {
    $req_labour = $rows['labour'];
    $req_carpenter = $rows['carpenter'];
    $req_electrician = $rows['electrician'];
    $req_operator = $rows['operator'];
    $req_manager = $rows['manager'];
}

$required_labour = $req_labour - $labour;
$required_carpenter = $req_carpenter - $carpenter;
$required_electrician = $req_electrician - $electrician;
$required_operator = $req_operator - $operator;
$required_manager = $req_manager - $manager;

$qry = "SELECT * FROM worker_req WHERE form_id='$form_id'";
$rst = mysqli_query($con, $qry);
while ($rw = mysqli_fetch_array($rst)) {
    if ($rw['labour'] == $labour && $rw['carpenter'] == $carpenter && $rw['electrician'] == $electrician && $rw['operator'] == $operator && $rw['manager'] == $manager) {
        $query2 = "UPDATE worker_req SET labour='$required_labour', carpenter='$required_carpenter', electrician='$required_electrician', operator='$required_operator', manager='$required_manager', status='Completed' WHERE form_id='$form_id'";
        $result2 = mysqli_query($con, $query2);
        if ($result2 == TRUE) {
        ?>
            <script>
                alert("Workers Placed");
                window.location.href = "worker_requests.php";
            </script>
        <?php
        }
    } else {
        $query2 = "UPDATE worker_req SET labour='$required_labour', carpenter='$required_carpenter', electrician='$required_electrician', operator='$required_operator', manager='$required_manager', status='Incompleted' WHERE form_id='$form_id'";
        $result2 = mysqli_query($con, $query2);
        if ($result2 == TRUE) {
        ?>
            <script>
                alert("Workers Placed");
                window.location.href = "worker_requests.php";
            </script>
        <?php
        }
    }
}

?>