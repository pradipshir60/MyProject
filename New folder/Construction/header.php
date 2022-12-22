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
    <nav class="navbar fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="#">BuildUpCity</a>

        <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" onclick="openNav()"></span>
        </a>
    </nav>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php" class="nav-link active" style="color: black;">Home</a>
        <a class="nav-link" href="user_login.php">Interior</a>
        <a class="nav-link" href="worker_req_form.php">Worker</a>
        <a class="nav-link dropdown-toggle" href="#" id="signupContent" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Login
        </a>
        <div class="dropdown-menu" aria-labelledby="signupContent">
            <a class="dropdown-item" href="User/login.html">Customer</a>
            <a class="dropdown-item" href="Dealer/login.php">Dealer</a>
            <a class="dropdown-item" href="Contractor/login.html">Contractor</a>
            <a class="dropdown-item" href="#">Admin</a>
        </div>

        <a class="nav-link dropdown-toggle" href="#" id="signupContent" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            SignUp
        </a>
        <div class="dropdown-menu" aria-labelledby="signupContent">
            <a class="dropdown-item" href="User/register.html">Customer</a>
            <a class="dropdown-item" href="Dealer/register_dealer.html">Dealer</a>
            <a class="dropdown-item" href="Contractor/register.html">Contractor</a>
        </div>


        <a href="#">About Us</a>
    </div>

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