<?php
include "index.html";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10%">Add Material</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Material</li>
        <li class="breadcrumb-item active">Add Material</li>
    </ol>
</div>

<form action="add_material_query.php" method="POST" enctype="multipart/form-data">
    <div class="container" style="width: 60%; margin-top: 2%; margin-bottom: 10%">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" style="text-transform: capitalize" name="name" id="name" placeholder="Enter Material Name" required>
        </div>

        <div class="form-group">
            <label for="image">Material Image</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file" required>
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="img_file" aria-describedby="inputGroupFileAddon01" required>
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter Item Description" onblur="check();" required></textarea>
            <span id="desc_msg"></span>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="custom-select" name="category" required>
                <option>Select</option>
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <option value="3">Category 3</option>
                <option value="4">Category 4</option>
            </select>
        </div>

        <div class="row">
            <div class="form-group col-8">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Enter Material Price" required>
            </div>
            <div class="form-group col-4">
                <label for="unit">Unit</label>
                <select class="form-control" name="unit" id="unit" required>
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

        <input type="submit" class="btn btn-block btn-warning" value="Submit">
    </div>
</form>

<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<script>
    var check = function() {
        var desc = document.getElementById('description').value;
        if (desc.length > 200) {
            document.getElementById('desc_msg').style.color = 'red';
            document.getElementById('desc_msg').innerHTML = 'Description should be less than 200 characters';
            return false;
        } else {
            return true;
        }
    }
</script>