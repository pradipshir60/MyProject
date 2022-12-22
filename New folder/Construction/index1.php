<?php
include "connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());
?>

<html>

<head>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="Admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <title>Welcome</title>
</head>

<body>
    <?php 
        include "header.php";
    ?>

    <div class="sidebar">
        <a href="#" style="color: blueviolet;">Categories</a>
        <a href="#category1" style="color: purple;">Category 1</a>
        <a href="#category2" style="color: purple;">Category 2</a>
        <a href="#category3" style="color: purple;">Category 3</a>
        <a href="#category4" style="color: purple;">Category 4</a>
    </div>

    <div class="container-fluid" style="text-align: center;" id="content">
        <h2 class="mid-text" id="change-it" style="margin-bottom: 2%;">Our Services</h2>

        <div class="row mb-3" style="align-items: center; margin-right: 1%">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-8 mb-3">
                <div class="card h-100">
                    <img src="image/icons/1.png" class="card-img-top" style="height: 80px; width: 80px; margin: auto;">
                    <div class="card-footer">
                        <h5 class="card-title" style="text-align: center;">Commercial Services</h5>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-8 mb-3">
                <div class="card h-100">
                    <img src="image/icons/2.jpg" class="card-img-top" style="height: 80px; width: 80px; margin: auto;">
                    <div class="card-footer">
                        <h5 class="card-title" style="text-align: center;">Site Management</h5>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-8 mb-3">
                <div class="card h-100">
                    <img src="image/icons/3.png" class="card-img-top" style="height: 55%; width: 30%; margin: auto;">
                    <div class="card-footer">
                        <h5 class="card-title" style="text-align: center;">Industrial Services</h5>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mid-text" style="margin-bottom: 2%;">Products</h2>
        <?php
        $query = "SELECT * FROM material WHERE category=1 AND availability='Available'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
        } else {
        ?>
            <section id="category1">
                <h5 style="text-align: left;">Category 1</h5>
                <div class="row mb-3">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 mb-4">
                            <div class="card h-100">
                                <img src="Admin/material_img/<?php echo $row['img']; ?>" style="width: 100%; height: 40%" class="card-img-top" alt="Concrete">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <div class="row align-items-center">
                                        <p class="card-text"><?php echo $row['description']; ?></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-muted"><b><?php echo "Rs." . $row['price']; ?> per <?php echo $row['unit']; ?></b></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </section>
        <?php
        }
        ?>

        <?php
        $query = "SELECT * FROM material WHERE category=2 AND availability='Available'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
        } else {
        ?>
            <section id="category2">
                <h5 style="text-align: left;">Category 2</h5>
                <div class="row mb-3">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 mb-4">
                            <div class="card h-100">
                                <img src="Admin/material_img/<?php echo $row['img']; ?>" style="width: 100%; height: 40%" class="card-img-top" alt="Concrete">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <div class="row align-items-center">
                                        <p class="card-text"><?php echo $row['description']; ?></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-muted"><b><?php echo "Rs." . $row['price']; ?></b></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </section>
        <?php
        }
        ?>


        <?php
        $query = "SELECT * FROM material WHERE category=3 AND availability='Available'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
        } else {
        ?>
            <section id="category3">
                <h5 style="text-align: left;">Category 3</h5>
                <div class="row mb-3">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 mb-4">
                            <div class="card h-100">
                                <img src="Admin/material_img/<?php echo $row['img']; ?>" style="width: 100%; height: 40%" class="card-img-top" alt="Concrete">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <div class="row align-items-center">
                                        <p class="card-text"><?php echo $row['description']; ?></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-muted"><b><?php echo "Rs." . $row['price']; ?></b></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </section>
        <?php
        }
        ?>


        <?php
        $query = "SELECT * FROM material WHERE category=4 AND availability='Available'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
        } else {
        ?>
            <section id="category4">
                <h5 style="text-align: left;">Category 4</h5>
                <div class="row mb-3">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 mb-4">
                            <div class="card h-100">
                                <img src="Admin/material_img/<?php echo $row['img']; ?>" style="width: 100%; height: 40%" class="card-img-top" alt="Concrete">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <div class="row align-items-center">
                                        <p class="card-text"><?php echo $row['description']; ?></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-muted"><b><?php echo "Rs." . $row['price']; ?></b></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </section>
        <?php
        }
        ?>

        <form action="send_msg.php" method="POST">
            <div class="text-primary" style="text-align: center; margin-top: 10%">
                <h1 style="text-align: center; padding-top: 2%">Contact Us</h1>
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-12">
                        <div style="align-items:center; text-align: center; margin-top: 8%;">
                            <span style="font-size: 50px;"><i class="fas fa-map-marker-alt"></i></span>
                            <h4>Pune, India</h4>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242118.1419999989!2d73.72287747909077!3d18.52456485722606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1590123967123!5m2!1sen!2sin" width="350" height="370" frameborder="0" style="border:0; margin: auto;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-12">
                        <div style="text-align: center; margin-top: 8%; padding-left: 7%">
                            <span style="font-size: 50px;"><i class="fas fa-phone"></i></span>
                            <h4 style="margin-top: 10px">+91 9272707070</h4>
                            <h4 style="margin-top: 10px">support@softezi.in</h4>

                            <div class="form-group" style="width: 90%; text-align: center;">
                                <h5 style="text-align: left; margin-top: 10%">SEND US MESSAGE</h5>
                                <input type="text" class="form-control" name="cont_name" style="margin-top: 2%;" placeholder="Enter your Name">
                                <input type="email" class="form-control" name="cont_email" style="margin-top: 2%;" placeholder="Enter your Email">
                                <input type="number" class="form-control" name="cont_phn" style="margin-top: 2%;" placeholder="Enter your Phone no">
                                <textarea class="form-control" name="cont_msg" style="margin-top: 2%;" placeholder="Enter Message"></textarea>
                                <input type="submit" class="btn btn-block btn-warning" style="margin-top: 4%;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-cols-md-5" style="align-items: center">
                    <h5 style="margin: auto">Connect Us with</h5>
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-instagram"></i></span>
                    <span><i class="fab fa-linkedin"></i></span>
                    <span><i class="fab fa-twitter"></i></span>
                </div>
            </div>
        </form>
    </div>

    <?php
        include "footer.php";
    ?>

    </div>
</body>

</html>


<script>
    /* Set the width of the side navigation to 250px */
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

</body>

</html>

<?php
mysqli_close($con);
?>