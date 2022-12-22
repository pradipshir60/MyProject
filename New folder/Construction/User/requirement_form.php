<?php 
session_start();

if(isset($_SESSION['user_id']))
{
include "header.php";
include "../connection.php";
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

?>

<div class="container-fluid" id="container-wrapper" style="margin-bottom: 12%">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Application</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item" aria-current="page">User Requirement Form</li>
      <li class="breadcrumb-item active" aria-current="page">Application</li>
    </ol> 
  </div>


<form action="requirement_form_validate.php" method="POST">
    <div class="form-group" style="width: 80%; margin: auto">
        <label for="address">Address</label>
        <textarea class="form-control" placeholder="Enter Address in Detail" name="address"></textarea>

        <label for="area_sq" style="margin-top: 2%">Area in sq.ft.</label>
        <input type="number" class="form-control" name="area_sq" placeholder="Enter Area in sq.ft.">

        <label for="description" style="margin-top: 2%">Description</label>
        <textarea class="form-control" placeholder="Description..." name="description"></textarea>

        <input type="submit" class="btn btn-block btn-warning" style="margin-top: 3%" value="Submit">
    </div>
</div>
</form>

<?php
}

else
{
    echo "Session Timed Out!!!";
    exit();
}
mysqli_close($con);
?>