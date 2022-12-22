<?php
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

?>

<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
    <div class="text-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</body>

<?php
$id = $_POST['id'];
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
$availability = $_POST['availability'];

$query = "UPDATE material SET name='$name', img='$upload_img', description='$description', category='$catergory', price='$price', unit='$unit', availability='$availability' WHERE material_id='$id'";
$result = mysqli_query($con, $query);
if ($result == TRUE) {
?>
    <script>
        alert("Material Updated!");
        window.location.href = "material_display.php";
    </script>
<?php
} else {
?>
    <script>
        alert("ERROR while material update!");
        window.history.back();
    </script>
<?php
}

mysqli_close($con);
?>

</html>