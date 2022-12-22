<?php 
include "index.html";
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$user_id = $_GET['user_id'];

$query = "SELECT * FROM user WHERE id=".$user_id;
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result))
{
    $name = $row['name'];
    $ex = explode(" ", $name);
    $firstName = $ex[0];
    $lastName = $ex[1];
    $address = $row['address'];

    ?>
    <form method="POST" action="update_user_query.php">
    <div class="container" style="width: 60%">
        <div class="row">
            <div class="col form-group">
                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName" value="<?php echo $firstName ?>">
            </div>

            <div class="col form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" value="<?php echo $lastName ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>">
        </div>

        <input type="submit" class="btn btn-block btn-warning" value="Submit">
    </div>
    </form>

    <?php
}

?>