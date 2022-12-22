<?php
session_start();

if(isset($_SESSION['user_id']))
{
    session_destroy();
    ?>
    <script>
        alert("Successfully logged out!!");
        window.location.href="../index.php";
    </script>
    <?php
}

?>