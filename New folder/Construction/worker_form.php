<?php
include "connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());
?>

<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</body>

<?php

$name = ucwords($_POST['name']);
$phn_no = $_POST['phn_no'];
$email = $_POST['email'];
$address = $_POST['address'];
$area = $_POST['area'];
$labour = $_POST['labour'];
$carpenter = $_POST['carpenter'];
$electrician = $_POST['electrician'];
$equip_operator = $_POST['equip_operator'];
$manager = $_POST['manager'];

$query = "INSERT INTO worker_req(user_name, user_phn, user_email, user_address, area, labour, carpenter, electrician, operator, manager) VALUES('$name', '$phn_no', '$email', '$address', '$area', '$labour', '$carpenter', '$electrician', '$equip_operator', '$manager')";
$result = mysqli_query($con, $query);
if ($result) 
{
    ?>
    <script>
        alert("Requested!");
        window.location.href="index.php";
    </script>
    <?php
} 
else 
{
    ?>
    <script>
        alert("ERROR!");
        window.history.back();
    </script>
    <?php
}
