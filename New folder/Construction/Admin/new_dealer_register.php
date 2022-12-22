<?php
include "index.html";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10%">New Dealer Registration</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">New Dealer Register</li>
    </ol>
</div>

<div class="container" style="width: 60%; margin-bottom: 5%">
    <form action="register_dealer.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" autocomplete="off" style="text-transform: capitalize;" name="user_name" id="user_name" placeholder="Enter Name" pattern="[a-zA-Z ]+" title="Name should be Alphabets only" required>
        </div>

        <div class="form-group">
            <label>Mobile No</label>
            <input type="text" class="form-control" style="text-transform: capitalize;" name="phn_no" id="phn_no" placeholder="Enter Mobile No" pattern="[7-9]{1}[0-9]{9}" title="Phone no should be numeric and required length is 10!" required>
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" style="text-transform: capitalize;" name="address" id="address" placeholder="Enter Address" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" title="Enter correct email id" required>
        </div>

        <div class="form-group">
            <label>Aadhaar No</label>
            <input type="text" class="form-control" name="aadhaar" id="aadhaar" placeholder="Enter Aadhaar No" pattern="[0-9]{12}" title="Aadhaar no should be 12 digits only!" required>
        </div>

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="pdf_file" required>
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

        <div class="form-group" style="margin-top: 3%">
            <label>ShopAct</label>
            <input type="text" class="form-control" name="shopAct" id="shopAct" placeholder="Enter ShopAct" required>
        </div>

        <div class="form-group">
            <label>Shop Address</label>
            <input type="text" class="form-control" style="text-transform: capitalize;" name="shopAddress" id="shopAddress" placeholder="Enter Address" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" autocomplete="off" name="password" id="password" placeholder="Password" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})" title="Atleast One Symbol, One Capital Letter, One Small Letter, One Digit is required" required>
        </div>

        <div class="form-group">
            <label for="material">Providing Material</label>
            <select class="mul-select form-control" id="material" name="material[ ]" multiple="true" required>
                <option value="Concrete">Concrete</option>
                <option value="Cement">Cement</option>
                <option value="River Sand">River Sand</option>
                <option value="Aggregates">Aggregates</option>
                <option value="Bricks">Bricks</option>
                <option value="Steel">Steel</option>
                <option value="Wood">Wood</option>
                <option value="Glass">Glass</option>
                <option value="Ceramics">Ceramics</option>
                <option value="Plastics">Plastics</option>
            </select>
        </div>

        <div class="form-group">
            <label for="availability">Area for availability</label>
            <select class="mul-select form-control" id="availability" name="availability[ ]" multiple="true" required>
                <option value="Ambegaon ">Ambegaon</option>
                <option value="Aundh ">Aundh</option>
                <option value="Baner ">Baner</option>
                <option value="Bavdhan Khurd ">Bavdhan Khurd</option>
                <option value="Bavdhan Budruk ">Bavdhan Budruk</option>
                <option value="Balewadi ">Balewadi</option>
                <option value="Bibvewadi ">Bibvewadi</option>
                <option value="Bhugaon ">Bhugaon</option>
                <option value="Bhukum ">Bhukum</option>
                <option value="Dhankawadi ">Dhankawadi</option>
                <option value="Dhanori ">Dhanori</option>
                <option value="Dhayari ">Dhayari</option>
                <option value="Erandwane ">Erandwane</option>
                <option value="Fursungi ">Fursungi</option>
                <option value="Ghorpadi ">Ghorpadi</option>
                <option value="Hadapsar ">Hadapsar</option>
                <option value="Hingne Khurd ">Hingne Khurd</option>
                <option value="Karve Nagar ">Karve Nagar</option>
                <option value="Kalas ">Kalas</option>
                <option value="Kartaj ">Katraj</option>
                <option value="Khadki ">Khadki</option>
                <option value="Kharadi ">Kharadi</option>
                <option value="Kondhawa ">Kondhawa</option>
                <option value="Koregaon Park ">Koregaon Park</option>
                <option value="Kothrud ">Kothrud</option>
                <option value="Manjiri ">Manjiri</option>
                <option value="Markal ">Markal</option>
                <option value="Mohammed Wadi ">Mohammed Wadi</option>
                <option value="Mundhawa ">Mundhawa</option>
                <option value="Nanded ">Nanded</option>
                <option value="Parvati ">Parvati</option>
                <option value="Panmala ">Panmala</option>
                <option value="Pashan ">Pashan</option>
                <option value="Pirangut ">Pirangut</option>
                <option value="Shivane ">Shivane</option>
                <option value="Sus ">Sus</option>
                <option value="Undri ">Undri</option>
                <option value="Vishrantwadi ">Vishrantwadi</option>
                <option value="Vitthalwadi ">Vitthalwadi</option>
                <option value="Vadgaon Khurd ">Vadgaon Khurd</option>
                <option value="Vadgaon Budruk ">Vadgaon Budruk</option>
                <option value="Vadgaon Sheri ">Vadgaon Sheri</option>
                <option value="Wagholi ">Wagholi</option>
                <option value="Wanorie ">Wanorie</option>
                <option value="Warje ">Warje</option>
                <option value="Yerwada ">Yerwada</option>
            </select>
        </div>

        <div class="form-group" style="margin-top: 5%;">
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </div>
    </form>

</div>

<script type="text/javascript " src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js "></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<script>
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
</script>

<script>
    $(document).ready(function() {
        $(".mul-select").select2({
            tags: true,
            tokenSeparator: [';']
        });
    });
</script>



<?php
include "footer.html";
?>