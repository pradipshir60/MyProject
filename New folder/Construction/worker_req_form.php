<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Worker Requirement Form</title>
    <link href="User/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="User/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="User/css/ruang-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>

<?php
include "header.php";
?>

<body class="bg-gradient-login">
    <form action="worker_form.php" method="POST">
        <!-- Login Content -->
        <div class="container" style="margin-top: 5%;">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-9 col-sm-12">
                    <div class="card shadow-sm my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Worker Requirement Form</h1>
                                        </div>
                                        <form class="user">

                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" style="text-transform: capitalize;" name="name" id="name" placeholder="Enter Your Name" pattern="[a-zA-Z ]+" title="Name should be Alphabets only" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="phn_no">Phone No</label>
                                                <input type="text" class="form-control" name="phn_no" id="phn_no" placeholder="Enter Phone No" pattern="[7-9]{1}[0-9]{9}" title="Phone no should be numeric and required length is 10!" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" title="Enter correct email id" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" name="address" id="address" placeholder="Enter Address" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="area">Area</label>
                                                <input type="text" class="form-control" name="area" id="area" placeholder="Enter Working Area" required>
                                            </div>

                                            <div class="form-group" style="margin-top: 5%">
                                                <label for="no_worker">Workers Requirement - </label>

                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label>1. Labour</label>
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" name="labour" id="labour" value="0" pattern="[0-9]+" title="Only Numeric values area allowed" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label>2. Carpenter</label>
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" name="carpenter" id="carpenter" value="0" pattern="[0-9]+" title="Only Numeric values area allowed" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label>3. Electrician</label>
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" name="electrician" id="electrician" value="0" pattern="[0-9]+" title="Only Numeric values area allowed" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label>4. Equipment Operator</label>
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" name="equip_operator" id="equip_operator" value="0" pattern="[0-9]+" title="Only Numeric values area allowed" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label>5. Construction Manager</label>
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" name="manager" id="manager" value="0" pattern="[0-9]+" title="Only Numeric values area allowed" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-block btn-warning" value="Submit">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <footer class="sticky-footer bg-gray-900" style="margin-top:8%">
        <div class="container my-auto">
            <div class="copyright text-center my-auto" style="color: white; font-size: 18px;">
                <span>Copyright &copy; <script>
                        document.write(new Date().getFullYear());
                    </script> - developed by
                    <b><a href="index.html" style="color: whitesmoke;" target="_blank">SoftEzi Soltions LLP</a></b>
                </span>
            </div>
        </div>
    </footer>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

</body>

</html>