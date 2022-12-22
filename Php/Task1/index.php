<?php
include "partial/loginHeader.php";
include "partial/loginModal.php";

if (isset($_GET['loginerror'])){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error! </strong>'.$_GET['loginerror'].'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
  }
echo '<h3 class="position-absolute top-50 start-50 translate-middle">Please Click <a href="" data-bs-toggle="modal"
data-bs-target="#loginModal">here</a>  to Log In</h3>';
    ?>