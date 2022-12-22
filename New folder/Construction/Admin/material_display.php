<?php
include "index.html";
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$query = "SELECT * FROM material";
$result = mysqli_query($con, $query);

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10%">Available Material</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Material</li>
        <li class="breadcrumb-item active">Availability</li>
    </ol>
</div>

<?php
if (mysqli_num_rows($result) == 0) {
?>
    <h4 style="text-align: center; margin-top: 10%">No Available Material! <a href="add_material.php">Click Here</a> to add</h4>
<?php
} else {
?>

    <div class="container" style="width: 90%;">
        <div class="row mb-3">
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-xl-4 col-lg-5 col-md-6 mb-4">
                    <div class="card h-100">
                        <img src="material_img/<?php echo $row['img']; ?>" style="width: 100%; height: 40%" class="card-img-top" alt="Concrete">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <div class="row align-items-center">
                                <p style="text-indent: 50px" class="card-text"><?php echo $row['description']; ?></p>
                                <b>Availability: <?php echo $row['availability']; ?></b>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <a href="update_material.php?material_id=<?php echo $row['material_id']; ?>" class="btn btn-sm btn-google" title="Edit">
                                    <span><i class="fas fa-edit"></i></span>
                                </a>
                                <div style="margin: auto;" class="text-muted"><b><?php echo "Rs." . $row['price']; ?> per <?php echo $row['unit']; ?></b>
                                </div>
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