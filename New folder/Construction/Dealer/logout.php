<?php
    session_start();
    unset($_SESSION['dealer_id']);
    session_destroy();
?>
<script>
    alert("Logged Out!!");
    window.location.href="../index.php";
</script>

<?php
mysqli_close($con);

?>