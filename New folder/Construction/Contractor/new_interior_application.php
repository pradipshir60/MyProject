<?php
session_start();
if (isset($_SESSION['contractor_id'])) {
    include "header.php";
    include "../connection.php";

    $con = new mysqli($host, $user, $password, $dbname, $port)
        or die('Could not connected to the database server ' . mysqli_connect_error());
?>

    <div class="container-fluid" id="container-wrapper" style="margin-bottom: 12%">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Application</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">e-tender</li>
                <li class="breadcrumb-item active" aria-current="page">New Tender Application</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Requirement Details</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Form ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Customer Address</th>
                                    <th>Location</th>
                                    <th>Area</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $query = "SELECT * from interior_form WHERE status='No Action' AND validate=1";
                                $result = mysqli_query($con, $query);
                                if (mysqli_num_rows($result) == 0) {
                                ?>
                                    <tr>
                                        <td colspan="13" style="text-align: center; padding: 5%">
                                            No new Applications!!!
                                        </td>
                                    </tr>
                                    <?php
                                    exit();
                                }

                                while ($row = mysqli_fetch_array($result)) {
                                    $query2 = "SELECT * FROM i_form WHERE interior_form_id=" . $row['interior_form_id'] . " AND contractor_id=" . $_SESSION['contractor_id'];
                                    $result2 = mysqli_query($con, $query2);
                                    if (mysqli_num_rows($result2) == 0) {

                                    ?>
                                        <td><?php echo $row['interior_form_id']; ?></td>
                                        <?php
                                        $query1 = "SELECT * FROM user WHERE id=" . $row['user_id'];
                                        $result1 = mysqli_query($con, $query1);
                                        while ($row1 = mysqli_fetch_array($result1)) {
                                        ?>
                                            <td><?php echo $row1['name'] ?></td>
                                            <td><?php echo $row1['email'] ?></td>
                                            <td><?php echo $row1['address'] ?></td>
                                        <?php
                                        }
                                        ?>

                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['area']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td>
                                            <a href="i-form.php?form_id=<?php echo $row['interior_form_id']; ?>" class="btn btn-block btn-primary">Apply</a>
                                        </td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="13" style="text-align: center; padding: 5%">
                                                You Submitted Tender to all!!!
                                            </td>
                                        </tr>
                                <?php
                                        exit();
                                    }
                                }


                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>
    </div>


<?php
    include "footer.html";
} else {
    echo "Session Timed Out!!!";
    exit();
}
