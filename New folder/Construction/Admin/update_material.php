<?php
include "index.html";
include "../connection.php";

$id = $_GET['material_id'];

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$query = "SELECT * FROM material WHERE material_id=" . $id;
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)) {
?>


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10%">Update Material Details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Material</li>
            <li class="breadcrumb-item">Availability</li>
            <li class="breadcrumb-item active">Update</li>
        </ol>
    </div>

    <form action="update_material_query.php" method="POST" enctype="multipart/form-data">
        <div class="container" style="width: 65%; margin-bottom: 10%; margin-top: 3%">
            <input type="hidden" name="id" value="<?php echo $row['material_id']; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
            </div>

            <div class="form-group required">
                <label for="img">Image</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a href="view_material_img.php?file=<?php echo $row['img']; ?>">
                            <span class="input-group-text" id="inputGroupFileAddon01">View</span>
                        </a>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="img_file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                        <label class="custom-file-label" for="inputGroupFile01"><?php echo $row['img']; ?></label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" required><?php echo $row['description']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="custom-select" name="category" required>
                    <option value="<?php echo $row['category']; ?>">Category <?php echo $row['category']; ?></option>
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                    <option value="3">Category 3</option>
                    <option value="4">Category 4</option>
                </select>
            </div>

            <div class="row">
                <div class="form-group col-8">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price" value="<?php echo $row['price']; ?>" required>
                </div>
                <div class="form-group col-4">
                    <label for="unit">Unit</label>
                    <select class="form-control" name="unit" id="unit" required>
                        <option value="<?php echo $row['unit']; ?>">Select<?php echo $row['unit']; ?></option>
                        <option value="Pcs">Pcs</option>
                        <option value="Kg">Kg</option>
                        <option value="Centimeter">Centimeter</option>
                        <option value="Meter">Meter</option>
                        <option value="Foot">Foot</option>
                        <option value="Inch">Inch</option>
                        <option value="Liter">Liter</option>
                    </select>
                </div>
            </div>

            <div class="row" style="margin-top: 5%;">
                <div class="form-group col">
                    <label for="availability">Availability: </label>
                </div>
                <div class="form-group col">
                    <select class="form-control" name="availability" required>
                        <option value="<?php echo $row['availability']; ?>"><?php echo $row['availability']; ?></option>
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col">
                    <a href="delete_material.php?id=<?php echo $row['material_id']; ?>" class="btn btn-block btn-danger">Delete</a>
                </div>

                <div class="form-group col">
                    <input type="submit" class="btn btn-block btn-warning" value="Submit">
                </div>
            </div>

        </div>
    </form>

    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

<?php
}
?>