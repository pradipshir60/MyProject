<?php
include "index.html";
include "../connection.php";

$id = $_GET['contractor_id'];

$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$query = "SELECT * FROM contractor WHERE contractor_id='$id'";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $ex = explode(" ", $name);
    $firstName = $ex[0];
    $lastName = $ex[1];
?>

    <h1 class="h3 mb-0 text-gray-800" style="margin: 3%">Update Contractor Information</h1>

    <form action="update_contractor_query.php" method="POST">
        <div class="container" style="width: 60%">
            <div class="row" style="margin-top: 5%">
                <div class="col form-group">
                    <input type="hidden" name="id" value=<?php echo $row['contractor_id']; ?>>
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" name="firstName" style="text-transform: capitalize;" value="<?php echo $ex[0]; ?>" required>
                </div>

                <div class="col form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" name="lastName" style="text-transform: capitalize;" value="<?php echo $ex[1]; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" title="Enter correct email id" value="<?php echo $row['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})" title="Atleast One Symbol, One Capital Letter, One Small Letter, One Digit is required" value="<?php echo $row['password']; ?>" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-block btn-warning" value="Submit">
            </div>
        </div>
    </form>
<?php
}

mysqli_close($con);
?>