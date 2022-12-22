<?php
    include "partial/dashboardHeader.php";
    if(isset ($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>success!'.$_SESSION['user_name'].'  </strong> You have been loggedin successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    echo '<h3 class="position-absolute top-50 start-50 translate-middle">Please Click <a
            href="/user/new/register.php">here</a> to Register</h3>';
    ?>