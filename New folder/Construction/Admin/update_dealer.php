<?php
include "index.html";
include "../connection.php";

$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

$id = $_GET['dealer_id'];

$query = "SELECT * FROM dealer WHERE id='$id'";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
?>

    <form action="update_dealer_query.php" method="POST">
        <h1 class="h3 mb-0 text-gray-800" style="margin: 3%">Update Dealer Information</h1>
        <div class="container" style="width: 60%; margin-bottom: 10%; margin-top: 5%">
            <div class="form-group">
                <input type="hidden" name="dealer_id" value="<?php echo $row['id']; ?>">
                <label>Name</label>
                <input type="text" class="form-control" style="text-transform: capitalize;" name="user_name" id="user_name" value="<?php echo $row['name']; ?>" placeholder="Enter Name" pattern="[a-zA-Z ]+" title="Name should be Alphabets only" required>
            </div>

            <div class="form-group">
                <label>Mobile No</label>
                <input type="text" class="form-control" style="text-transform: capitalize;" name="phn_no" id="phn_no" value="<?php echo $row['phn_no']; ?>" placeholder="Enter Mobile No" pattern="[7-9]{1}[0-9]{9}" title="Phone no should be numeric and required length is 10!" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" style="text-transform: capitalize;" name="address" id="address" value="<?php echo $row['address']; ?>" placeholder="Enter Address" required>
            </div>

            <div class="form-group" style="margin-top: 3%">
                <label>ShopAct</label>
                <input type="text" class="form-control" name="shopAct" id="shopAct" value="<?php echo $row['shopAct']; ?>" placeholder="Enter ShopAct" required>
            </div>

            <div class="form-group">
                <label>Shop Address</label>
                <input type="text" class="form-control" style="text-transform: capitalize;" value="<?php echo $row['shop_add']; ?>" name="shopAddress" id="shopAddress" placeholder="Enter Address" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" autocomplete="off" name="password" id="password" value="<?php echo $row['password']; ?>" placeholder="Password" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})" title="Atleast One Symbol, One Capital Letter, One Small Letter, One Digit is required" required>
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
            <input type="submit" class="btn btn-block btn-warning" value="Submit">
        </div>
    </form>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script type="text/javascript " src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js "></script>

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
}
?>