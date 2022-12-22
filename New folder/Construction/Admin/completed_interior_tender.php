<?php
include "index.html";
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-bottom: 10%">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10%">Completed Orders</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">e-Tender</li>
        <li class="breadcrumb-item active">Completed Tenders</li>
    </ol>
</div>

<div class="card" style="margin-bottom: 10%; margin-left: 5%; margin-right: 5%">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Requirement Details</h6>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center table-flush" style="width: 1100px">
            <thead class="thead-light">
                <tr>
                    <th>Form ID</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Area</th>
                    <th>Description</th>
                    <th>Contractor Name</th>
                    <th>Interior Tender</th>
                </tr>
            </thead>

            <tbody>
                <?php

                $query = "SELECT * from i_form WHERE status=1";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) == 0) {
                ?>
                    <tr>
                        <td colspan="13" style="text-align: center; padding: 5%">
                            No new Applications !!!
                        </td>
                    </tr>
                    <?php
                } else {
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['interior_form_id']; ?></td>
                            <?php
                            $query1 = "SELECT * FROM user,interior_form WHERE interior_form.user_id=user.id AND interior_form.status='Completed' AND interior_form.interior_form_id=" . $row['interior_form_id'];
                            $result1 = mysqli_query($con, $query1);
                            while ($rows1 = mysqli_fetch_array($result1)) {
                            ?>
                                <td> <?php echo $rows1['name']; ?> </td>
                                <td> <?php echo $rows1[7] ?></td>
                                <td> <?php echo $rows1['area'] ?></td>
                                <td> <?php echo $rows1['description'] ?></td>
                                <?php


                                $query2 = "SELECT * FROM contractor,i_form WHERE i_form.contractor_id=contractor.contractor_id AND contractor.contractor_id=" . $row['contractor_id'];
                                $result2 = mysqli_query($con, $query2);
                                while ($rows2 = mysqli_fetch_array($result2)) {
                                ?>
                                    <td> <?php echo $rows2['name']; ?> </td>
                                    <?php

                                    ?>
                                    <td><a href="display_interior_tender.php?file=<?php echo $row["file"] ?>">Click Here</a></td>
                        </tr>
        <?php
                                    break;
                                }
                                break;
                            }
                        }
                    }
        ?>
            </tbody>
        </table>
    </div>
</div>


<?php
include "footer.html";
?>

</body>