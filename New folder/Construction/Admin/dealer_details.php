<?php
include "index.html";
include "../connection.php";

//Database Connection
$dbname = "softezi";
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10%">User Details</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Dealer Register Request</li>
        <li class="breadcrumb-item">View Details</li>
    </ol>
</div>

<div class="card" style="margin-bottom: 10%; margin-left: 5%; margin-right: 5%">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Dealer Details</h6>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Shop Address</th>
                    <th>Material</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <?php
            
            $user_id = $_COOKIE['user_id'];
            $query = "SELECT * from dealer WHERE id=$user_id";
            $result = mysqli_query($con, $query);
            
            while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["address"] ?></td>
                        <td><?php echo $row["material"] ?></td>
                        <td><a href="user_details.php" class="btn btn-sm btn-primary">View</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>