<?php
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());


$mat_name = $_POST['name'];
$name = ucwords($mat_name);

$type = $_FILES["img_file"]["type"];

if ($type === "image/png" || $type === "image/jpeg") {
    $allowedExts = array("png", "jpeg");
    $temp = explode(".", $_FILES["img_file"]["name"]);
    $extension = end($temp);
    $upload_img = $_FILES["img_file"]["name"];
} else {
?>
    <script>
        alert("Error Uploading File! Required only JPEG or PNG files!");
        window.history.back();
    </script>
<?php
    exit();
}

$description = $_POST['description'];
$catergory = $_POST['category'];
$price = $_POST['price'];
$unit = $_POST['unit'];

$query = "INSERT INTO material(name, img, description, category, price, unit, availability) VALUES('$name', '$upload_img', '$description', '$catergory', '$price', $unit, 'Available')";
$result = mysqli_query($con, $query);
if ($result == TRUE) {
?>
    <script>
        alert("Material Added!!");
        window.location.href = "add_material.php";
    </script>
<?php
    move_uploaded_file($_FILES["img_file"]["tmp_name"], "material_img/" . $_FILES["img_file"]["name"]);
} else {
?>
    <script>
        alert("ERROR while adding material!");
        window.location.href = "add_material.php";
    </script>
<?php
}

?>