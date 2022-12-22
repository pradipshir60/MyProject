<?php
session_start();

if (isset($_SESSION['user_id'])) {
    include "header.php";
    include "../connection.php";
    $con = new mysqli($host, $user, $password, $dbname, $port)
        or die('Could not connected to the database server ' . mysqli_connect_error());

    $query = "SELECT * from interior_form WHERE status='Completed' AND user_id=" . $_SESSION['user_id'];
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

?>

    <div class="container-fluid" id="container-wrapper" style="margin-bottom: 12%">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fulfilled Requirements</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">User Requirement Form</li>
                <li class="breadcrumb-item active" aria-current="page">Completed Requests</li>
            </ol>
        </div>

        <div class="row" style="margin: auto">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                    </div>
                    <div class="table-responsive scrollable">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Form No</th>
                                    <th>Address</th>
                                    <th>Area</th>
                                    <th>Description</th>
                                    <th>Contractor Name</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) == 0) {
                                ?>
                                    <tr>
                                        <td colspan="13" style="text-align: center; padding: 5%">
                                            No Orders yet!!
                                        </td>
                                    </tr>
                                    <?php
                                } else {
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['interior_form_id']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['area']; ?></td>
                                            <td><?php echo $row['description']; ?></td>

                                            <?php
                                            $query1 = "SELECT * FROM interior_form WHERE status='Completed' AND user_id=" . $_SESSION['user_id'];
                                            $result1 = mysqli_query($con, $query1);
                                            while ($row = mysqli_fetch_array($result1)) {
                                                $query2 = "SELECT contractor.name from contractor,i_form,interior_form WHERE i_form.contractor_id=contractor.contractor_id AND i_form.interior_form_id=interior_form.interior_form_id AND interior_form.interior_form_id=" . $row['interior_form_id'];
                                                $result1 = mysqli_query($con, $query2);
                                                while ($rows = mysqli_fetch_array($result1)) {
                                            ?>
                                                    <td><?php echo $rows['name']; ?></td>
                                            <?php
                                                    break;
                                                }
                                            }
                                            ?>

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
        </div>
    </div>

<?php
    include "footer.html";
} else {
    echo "Session Timed Out!!!";
    exit();
}
mysqli_close($con);

?>