<?php
include "index.html";
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());


$query1 = "SELECT * FROM worker";
$result1 = mysqli_query($con, $query1);

$id = $_GET['form_id'];
?>

<form method="POST" action="worker_req_update.php">
    <div class="container-fluid" id="container-wrapper" style="margin-bottom: 12%">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <table class="table align-items-center table-bordered" style="width: 40%;">
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
                    <input type="hidden" name="form_id" value="<?php echo $id; ?>">
                    <?php
                    while ($row1 = mysqli_fetch_array($result1)) {
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

        <?php
        $query = "SELECT * FROM worker_req WHERE form_id='$id'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>

            <table class="table table-striped" style="width: 80%; margin-top: 5%; margin-left: 5%">
                <thead>
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Worker Type</th>
                        <th scope="col">Required</th>
                        <th scope="col">Allocate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query1 = "SELECT * FROM worker";
                    $result1 = mysqli_query($con, $query1);
                    while ($row1 = mysqli_fetch_array($result1)) {
                    ?>
                        <tr>
                            <th scope="row">1</th>
                            <td>Labour</td>
                            <td><?php echo $row['labour']; ?></td>
                            <td>
                                <select class="form-control" name="labour">
                                    <?php
                                    for ($i = 0; $i <= $row1['labour']; $i++) {
                                    ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">2</th>
                            <td>Carpenter</td>
                            <td><?php echo $row['carpenter']; ?></td>
                            <td>
                                <select class="form-control" name="carpenter">
                                    <?php
                                    for ($i = 0; $i <= $row1['carpenter']; $i++) {
                                    ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td>Electrician</td>
                            <td><?php echo $row['electrician']; ?></td>
                            <td>
                                <select class="form-control" name="electrician">
                                    <?php
                                    for ($i = 0; $i <= $row1['electrician']; $i++) {
                                    ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">4</th>
                            <td>Equipment Operator</td>
                            <td><?php echo $row['operator']; ?></td>
                            <td>
                                <select class="form-control" name="equip_operator">
                                    <?php
                                    for ($i = 0; $i <= $row1['equip_operator']; $i++) {
                                    ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">5</th>
                            <td>Construction Manager</td>
                            <td><?php echo $row['manager']; ?></td>
                            <td>
                                <select class="form-control" name="manager">
                                    <?php
                                    for ($i = 0; $i <= $row1['manager']; $i++) {
                                    ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
                </tbody>
            </table>
            
    <input type="submit" class="btn btn-block btn-warning" style="width: 80%; margin-left: 5%">
    </div>