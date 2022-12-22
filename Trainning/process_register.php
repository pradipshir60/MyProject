<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname ="trainning";


session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$passwords=$_POST['passwords'];
//$password=$_POST['password'];
//$_SESSION['success']="";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

/*if (isset($_POST['register.php'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];*/

$sql = "INSERT INTO student (name, email, mobile, address,password)
VALUES ('$name', '$email', '$mobile', '$address','$password')";



if ($conn->query($sql) === TRUE) {
echo "New record created successfully";


} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

  $sql="SELECT `name`, `email`,  `mobile`, `address` FROM `student` ";
  $result=mysqli_query($conn,$sql);
 echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                
                <th scope="col">Email</th>

                <th scope="col">Mobile</th>

                <th scope="col">Address</th>
               </tr>
                
        </thead>
         
        <tbody>';
        while($row=mysqli_fetch_assoc($result)){
echo      '<tr>
                <th scope="row">' .$row ['name']. '</th>
                <td>'.$row ['email']. '</td>
                <td>'.$row ['mobile']. '</td>
                <td>'.$row ['address']. '</td>
            </tr>';}
        echo '</tbody>
    </table>';
echo '<h5>click <a href="http://localhost:8080/trainning/register.php"> here </a>  to Register Again</h5>';
session_destroy();
/*
$_SESSION['name']=$name;
$_SESSION['email']=$email;
$_SESSION['mobile']=$mobile;
$_SESSION['address']=$address;
$_SESSION['passwords']=$passwords;
print_r($_SESSION);
//$_SESSION['success']="register successful";
//header('location: register.php');

*/
$conn->close();
