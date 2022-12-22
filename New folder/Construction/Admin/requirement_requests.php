<?php
include "index.html";
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-bottom: 10%">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10%">New Application - User Requirement</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Requirement Form</li>
        <li class="breadcrumb-item active">New Application</li>
    </ol>
</div>

<div class="card" style="margin-bottom: 10%; margin-left: 5%; margin-right: 5%">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Requirement Details</h6>
    </div>

    <div class="table-responsive scrollable">
        <table class="table align-items-center table-flush" style="width: 1100px">
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

                $query = "SELECT * from requirement_form WHERE status='No Action' AND validate=0";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) == 0) {
                ?>
                    <tr>
                        <td colspan="13" style="text-align: center; padding: 5%">
                            No new Applications!!!
                        </td>
                    </tr>
                    <?php
                } else {
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php $form_id = $row["form_id"];
                                echo $form_id; ?></td>
                            <td><?php $user_id = $row["user_id"];

                                $query1 = "select * from user,requirement_form WHERE requirement_form.user_id=user.id and user.id=" . $user_id;
                                $result1 = mysqli_query($con, $query1);
                                while ($rows = mysqli_fetch_array($result1)) {
                                    echo $rows["name"];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $rows['email'];
                                ?>
                            </td>
                            <td>
                            <?php
                                    echo $rows[4];
                                    break;
                                }
                            ?>
                            </td>

                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['area'] ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <a href="accept_form_request.php?form_id=<?php echo $form_id; ?>" class="btn btn-sm btn-primary" style="margin: auto">Approve</a>
                                <a href="reject_requirement_form.php?form_id=<?php echo $form_id; ?>" class="btn btn-sm btn-danger" style="margin-top: 5px">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<?php
include "footer.html";
?>

</body>