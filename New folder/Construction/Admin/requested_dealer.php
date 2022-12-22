<?php
include "index.html";
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10%">New Dealer Registrations</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Dealer Register Request</li>
    </ol>
</div>

<div class="card" style="margin-bottom: 10%; margin-left: 5%; margin-right: 5%">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Dealer Details</h6>
    </div>

    <div class="table-responsive scrollable">
        <table class="table align-items-center table-flush" style="text-align: center">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>ShopAct</th>
                    <th>Aadhaar No</th>
                    <th>Aadhaar PDF</th>
                    <th>Shop Address</th>
                    <th>Material</th>
                    <th>Availability</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <td colspan="2">
                    <a href="new_dealer_register.php">+ Add User</a>
                </td>
                <?php

                $query = "SELECT * from dealer WHERE status=1";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) == 0) {
                ?>
                    <tr>
                        <td colspan="13" style="text-align: center; padding: 5%">
                            No new registrations!!
                        </td>
                    </tr>
                <?php
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php $row_id = $row["id"];
                            echo $row_id; ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["phn_no"] ?></td>
                        <td><?php echo $row["address"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["shopAct"] ?></td>
                        <td><?php echo $row["aadhaar_no"] ?></td>
                        <td><a href="display_aadhaar.php?file=<?php echo $row["pdf_file"] ?>">Click Here</a></td>
                        <td><?php echo $row["shop_add"] ?></td>
                        <td><?php echo $row["material"] ?></td>
                        <td><?php echo $row["availability"] ?></td>
                        <td>
                            <a href="approve_dealer.php?user_id=<?php echo $row_id ?>" class="btn btn-sm btn-success" style="margin: auto">Approve</a>
                            <a href="reject_dealer.php?user_id=<?php echo $row_id ?>" class="btn btn-sm btn-danger" style="margin-top: 5px">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<?php
include "footer.html";
?>