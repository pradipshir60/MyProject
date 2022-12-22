<?php
include "index.html";
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$query = "SELECT * FROM worker";
$result = mysqli_query($con, $query);

?>

<div class="container-fluid" id="container-wrapper" style="margin-bottom: 12%">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Worker Availability</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Worker</li>
            <li class="breadcrumb-item active" aria-current="page">Availability</li>
        </ol>
    </div>

    <form action="worker_change.php" method="POST">
        <div class="container" style="margin: auto;">
            <div class="row" style="margin-top: 2%">
                <div class="col-lg-12 mb-4" style="margin-top: 3%">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead">
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Worker Type</th>
                                        <th>Availability</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td>1</td>
                                            <td>Labour</td>
                                            <td><?php echo $row['labour']; ?></td>
                                            <td>
                                                <div class="input-group">
                                                    <button type="button" class="sub btn btn-outline-secondary btn-number" id="sub" data-type="minus" data-field="">
                                                        <span class="fas fa-minus"></span>
                                                    </button>
                                                    <input type="text" id="labour" name="labour" class="form-control input-number" style="width: 2px" value="<?php echo $row['labour']; ?>" min="1" max="100">
                                                    <button type="button" class="add btn btn btn-outline-secondary btn-number" id="add" data-type="plus" data-field="">
                                                        <span class="fas fa-plus"></span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Carpenter</td>
                                            <td><?php echo $row['carpenter']; ?></td>
                                            <td>
                                                <div class="input-group">
                                                    <button type="button" class="sub btn btn-outline-secondary btn-number" id="sub" data-type="minus" data-field="">
                                                        <span class="fas fa-minus"></span>
                                                    </button>
                                                    <input type="text" id="carpenter" name="carpenter" class="form-control input-number" style="width: 2px" value="<?php echo $row['carpenter']; ?>" min="1">
                                                    <button type="button" class="add btn btn btn-outline-secondary btn-number" id="add" data-type="plus" data-field="">
                                                        <span class="fas fa-plus"></span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>Electricians</td>
                                            <td><?php echo $row['electrician']; ?></td>
                                            <td>
                                                <div class="input-group">
                                                    <button type="button" class="sub btn btn-outline-secondary btn-number" id="sub" data-type="minus" data-field="">
                                                        <span class="fas fa-minus"></span>
                                                    </button>
                                                    <input type="text" id="electrician" name="electrician" class="form-control input-number" style="width: 2px" value="<?php echo $row['electrician'] ?>" min="1" max="100">
                                                    <button type="button" class="add btn btn btn-outline-secondary btn-number" id="add" data-type="plus" data-field="">
                                                        <span class="fas fa-plus"></span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>Equipment Operator</td>
                                            <td><?php echo $row['equip_operator']; ?></td>
                                            <td>
                                                <div class="input-group">
                                                    <button type="button" class="sub btn btn-outline-secondary btn-number" id="sub" data-type="minus" data-field="">
                                                        <span class="fas fa-minus"></span>
                                                    </button>
                                                    <input type="text" id="equip_operator" name="equip_operator" class="form-control input-number" style="width: 2px" value="<?php echo $row['equip_operator'] ?>" min="1" max="100">
                                                    <button type="button" class="add btn btn btn-outline-secondary btn-number" id="add" data-type="plus" data-field="">
                                                        <span class="fas fa-plus"></span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>5</td>
                                            <td>Construction Manager</td>
                                            <td><?php echo $row['manager']; ?></td>
                                            <td>
                                                <div class="input-group">
                                                    <button type="button" class="sub btn btn-outline-secondary btn-number" id="sub" data-type="minus" data-field="">
                                                        <span class="fas fa-minus"></span>
                                                    </button>
                                                    <input type="text" id="manager" name="manager" class="form-control input-number" style="width: 2px" value="<?php echo $row['manager'] ?>" min="1" max="100">
                                                    <button type="button" class="add btn btn btn-outline-secondary btn-number" id="add" data-type="plus" data-field="">
                                                        <span class="fas fa-plus"></span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer"></div>
                        <input type="submit" class="btn btn-primary" value="Submit" style="padding: auto">
                    </div>
                </div>
            </div>

        </div>

        <script>
            $('.add').click(function() {
                if ($(this).prev().val() < 100) {
                    $(this).prev().val(+$(this).prev().val() + 1);
                }
            });
            $('.sub').click(function() {
                if ($(this).next().val() > 0) {
                    if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
                }
            });
        </script>


    <?php
                                    }
                                    mysqli_close($con);
    ?>