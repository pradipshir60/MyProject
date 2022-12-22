<?php
session_start();
include "../connection.php";
?>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">


<body>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>


    <form action="calculate_bill.php" method="GET">

        <?php
        if (isset($_SESSION['user_id'])) {
            $con = new mysqli($host, $user, $password, $dbname, $port)
                or die('Could not connected to the database server ' . mysqli_connect_error());

            $query = "SELECT * from user WHERE id=" . $_SESSION['user_id'];
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-user" style="margin-right: 5px"></span>
                                    <?php echo $row['name']; ?></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="dashboard.php">My Account</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>

            <?php
            }
        } else {
            ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-success" href="logout.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                    </li>
                </ul>
            </nav>
        <?php
        }
        $query = "SELECT * FROM material WHERE availability='Available'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 0) {
        ?>
            <h4 style="text-align: center; margin-top: 10%">No Available Material! <a href="add_material.php">Click Here</a> to add</h4>
        <?php
        } else {
        ?>

            <div class="container" style="width: 90%; margin-top: 5%">
                <div class="row mb-3">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="col-xl-4 col-lg-5 col-md-6 mb-4">
                            <div class="card h-100">
                                <img src="../Admin/material_img/<?php echo $row['img']; ?>" style="width: 100%; height: 40%" class="card-img-top" alt="Concrete">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <div class="row align-items-center">
                                        <p style="text-indent: 50px" class="card-text"><?php echo $row['description']; ?></p>
                                    </div>
                                    <div class="text-muted"><b><?php echo "Rs." . $row['price']; ?></b></div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <button type="button" class="col-2 sub btn btn-danger btn-number" id="sub" style="height: 43px" data-type="minus" data-field="">
                                            <span class="fas fa-minus"></span>
                                        </button>
                                        <input type="text" class="col-8 form-control input-number" name="<?php echo preg_replace('/\s/', '', $row['name']) ?>" value="0" min="1" max="100">

                                        <button type="button" class="col-2 add btn btn-success btn-number" id="add" style="height: 43px;" data-type="plus" data-field="">
                                            <span class="fas fa-plus"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        <?php
        }
        ?>

        <div class="fixed-bottom" style="padding-left: 95%; padding-bottom: 10px">
            <button type="submit" class="btn btn-sm btn-primary" style="height: 40px; width: 40px">
                <span><i class="fa fa-arrow-right"></i></span>
            </button>
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

        <script>
            $('.carousel').carousel({
                interval: 1700
            });
        </script>
    </form>

</body>

</html>