<?php
include "connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());
?>

<html>

<head>
    <title>BuildUpCity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link href="css2.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">BuildUpCity</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="user_login.php">Interior</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="worker_req_form.php">Worker</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="loginOffcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Login
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="loginOffcanvasNavbarDropdown">
                                    <li><a class="dropdown-item" href="Admin/dashboard.php">Admin</a></li>
                                    <li><a class="dropdown-item" href="Dealer/login.php">Dealer</a></li>
                                    <li><a class="dropdown-item" href="Contractor/login.html">Contractor</a></li>
                                    <li><a class="dropdown-item" href="User/login.html">User</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="signupOffcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Signup
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="signupOffcanvasNavbarDropdown">
                                    <li><a class="dropdown-item" href="Dealer/register_dealer.html">Dealer</a></li>
                                    <li><a class="dropdown-item" href="Contractor/register.html">Contractor</a></li>
                                    <li><a class="dropdown-item" href="User/register.html">User</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- <div class="nav-scroller bg-body shadow-sm">
            <nav class="nav nav-underline navbar-center" aria-label="Secondary navigation">
                <a class="nav-link" href="#category1">Category 1</a>
                <a class="nav-link" href="#category2">Category 2</a>
                <a class="nav-link" href="#category3">Category 3</a>
                <a class="nav-link" href="#category4">Category 4</a>
            </nav>
        </div> -->
    </header>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/index_carousel/1.webp" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="image/index_carousel/2.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="image/index_carousel/3.webp" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <div class="row mb-3" style="margin-left: 1%; margin-right: 1%">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-8 mb-3">
                <div class="card h-100">
                    <img src="image/icons/1.png" class="card-img-top" style="height: 90px; width: 80px; margin: auto;">
                    <div class="card-footer">
                        <h5 class="card-title" style="text-align: center;">Commercial Services</h5>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-8 mb-3">
                <div class="card h-100">
                    <img src="image/icons/2.jpg" class="card-img-top" style="height: 90px; width: 80px; margin: auto;">
                    <div class="card-footer">
                        <h5 class="card-title" style="text-align: center;">Site Management</h5>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-8 mb-3">
                <div class="card h-100">
                    <img src="image/icons/3.png" class="card-img-top" style="height: 90px; width: 80px; margin: auto;">
                    <div class="card-footer">
                        <h5 class="card-title" style="text-align: center;">Industrial Services</h5>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mid-text" style="margin-bottom: 2%;">Products</h2>
        <?php
        $query = "SELECT * FROM material WHERE category<3";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
        } else {
        ?>
            <section id="category1">
                <h5 style="text-align: left;">Artificial Materials</h5>
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
        $query = "SELECT * FROM material WHERE category>2";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
        } else {
        ?>
            <section id="category3">
                <h5 style="text-align: left;">Natural Materials</h5>
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

    </div>
</body>

</html>

<?php
mysqli_close($con);
?>