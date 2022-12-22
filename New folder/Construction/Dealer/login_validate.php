<?php
session_start();
include "../connection.php";
$input_user = $_POST['username'];
$input_pass = $_POST['password'];

$flag=0;
$id = NULL;

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$query = "SELECT * from dealer where status=0";
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result))
{
    if($row["email"]==$input_user && $row["password"]==$input_pass) 
    {
        $id = $row["id"];
        $flag = 1;
        break;
    }
}

if($flag==1)
{
	$_SESSION['dealer_id'] = $id; 
	?><script>
		window.location.href="dashboard.php";
	  </script>
	  <h2>Welcome</h2>
	<?php
}
else	
{
	?><script>
	alert("Incorrect Information");
	window.history.back();
	</script>
	<?php
	
}
mysqli_close($con);

?>