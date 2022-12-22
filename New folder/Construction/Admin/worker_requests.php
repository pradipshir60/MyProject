<?php
include "index.html";
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$query = "SELECT * FROM worker_req WHERE status='No Action' OR status='Incompleted'";
$result = mysqli_query($con, $query);

$query1 = "SELECT * FROM worker";
$result1 = mysqli_query($con, $query1);

?>


<div class="container-fluid" id="container-wrapper" style="margin-bottom: 12%">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h1 class="col h3 mb-0 text-gray-800">Requests for Worker</h1>

            <div class="col">
                <table class="table align-items-center table-bordered">
                    <thead class="thead-dark">
                        <tr align="center">
                            <th>Labour</th>
                            <th>Carpenter</th>
                            <th>Electrician</th>
                            <th>Operator</th>
                            <th>Manager</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                ?>
                        <tr>
                            <td><?php echo $row1['labour']; ?></td>
                            <td><?php echo $row1['carpenter']; ?></td>
                            <td><?php echo $row1['electrician']; ?></td>
                            <td><?php echo $row1['equip_operator']; ?></td>
                            <td><?php echo $row1['manager']; ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Requirement Details</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-bordered">
                        <thead class="thead-light">
                            <tr align="center">
                                <th rowspan="2">Form ID</th>
                                <th rowspan="2">Name</th>
                                <th rowspan="2">Phone No.</th>
                                <th rowspan="2">Email</th>
                                <th rowspan="2">Address</th>
                                <th rowspan="2">Location</th>
                                <th colspan="5">Worker</th>
                                <th rowspan="2">Action</th>
                            <tr>
                                <th>Labour</th>
                                <th>Carpenter</th>
                                <th>Electrician</th>
                                <th>Equipment Operator</th>
                                <th>Construction Manager</th>
                            </tr>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
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
                            ?>

                                <tr>
                                    <td><?php echo $row['form_id']; ?></td>
                                    <td><?php echo $row['user_name']; ?></td>
                                    <td><?php echo $row['user_phn']; ?></td>
                                    <td><?php echo $row['user_email']; ?></td>
                                    <td><?php echo $row['user_address']; ?></td>
                                    <td><?php echo $row['area']; ?></td>
                                    <td><?php echo $row['labour']; ?> </td>
                                    <td><?php echo $row['carpenter']; ?></td>
                                    <td><?php echo $row['electrician']; ?></td>
                                    <td><?php echo $row['operator']; ?></td>
                                    <td><?php echo $row['manager']; ?></td>
                                    <td><a href="worker_req.php?form_id=<?php echo $row['form_id'] ?>" class="btn btn-outline-warning">Select</a></td>
                                </tr>

                            <?php
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