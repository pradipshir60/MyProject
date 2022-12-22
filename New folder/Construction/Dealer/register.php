<?php
include "../connection.php";

$username = $_POST['user_name'];
$phn_no = $_POST['phn_no'];
$address = $_POST['address'];
$mail = $_POST['email'];
$shop_act = $_POST['shopAct'];
$aadhaar = $_POST['aadhaar'];
$shop_address = $_POST['shopAddress'];
$pass = $_POST['password'];

//File Upload
$type = $_FILES["pdf_file"]["type"];
if($type === "application/pdf")
{ 
    $allowedExts = array("pdf");
    $temp = explode(".", $_FILES["pdf_file"]["name"]);
    $extension = end($temp);
    $upload_pdf=$_FILES["pdf_file"]["name"];
}
else
{
    ?>
    <script>
        alert("Error Uploading File! Required PDF file!");
        window.history.back();
    </script>
    <?php
    exit();
}


//Material from selected options
$material = array();
foreach ($_POST['material'] as $names)
{
    array_push($material, $names);
}
$mod_material = implode(", ", $material);


//Area availability from selected options
$area = array();
foreach ($_POST['availability'] as $locality)
{
    array_push($area, $locality);
}
$mod_area = implode(", ", $area);


//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());


$query = "SELECT * from dealer";
$result = mysqli_query($con, $query);
    
while($row = mysqli_fetch_array($result))
{
    if($row["email"]==$mail) 
    {
        ?>
        <script>
            alert("Email already registered!!");
            window.location.href="register_dealer.html";
        </script>
        <?php
    }
    
    if($row["phn_no"]==$phn_no)
    {
        {
            ?>
            <script>
                alert("Phone no is already registered!!");
                window.location.href="register_dealer.html";
            </script>
            <?php
        }
    }

    if($row["shopAct"]==$shop_act)  
    {
        ?>
        <script>
            alert("ShopAct is registered with another email account!!");
            window.location.href="register_dealer.html";
        </script>
        <?php
    }
    
    if($row["aadhaar_no"]==$aadhaar)
    {
        ?>
        <script>
            alert("Aadhaar no already enrolled with another account!!");
            window.location.href="register_dealer.html";
        </script>
        <?php
    } 
}
    

    
$sql = "INSERT INTO dealer(name,phn_no,address,email,shopAct,aadhaar_no,pdf_file,shop_add,password,material,availability,status) 
                VALUES('$username', '$phn_no', '$address', '$mail', '$shop_act', '$aadhaar', '$upload_pdf', '$shop_address', '$pass', '$mod_material', '$mod_area', 1)";

if ($con->query($sql) === TRUE) 
{
    ?>
    <script>
        alert("Submitted! Please wait until approval of your registration!");
        window.location.href="../index.php";
    </script>
    <?php
        move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploads/" . $_FILES["pdf_file"]["name"]);


} else 
{
    $msg = 'Error: ' . $sql . '<br>' . $con->error;
    echo "Message: $msg";
    ?>
    <script>
        alert("ERROR! <?php $msg ?>");
    </script>
    <?php
}

mysqli_close($con);
?>