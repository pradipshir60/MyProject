<?php
session_start();
include "../connection.php";
$input_user = $_GET['username'];
$input_pass = $_GET['password'];

$flag=0;
$id = NULL;

$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$query = "SELECT * from contractor";
$result = mysqli_query($con, $query);

?>
<div class="text-center">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<?php

while($row = mysqli_fetch_array($result))
{
    if($row["email"]==$input_user && $row["password"]==$input_pass) 
    {
        $id = $row["contractor_id"];
		$_SESSION['contractor_id'] = $id; 
        $flag = 1;
        break;
    }
}

if($flag==1)
{
	?><script>
		window.location.href="dashboard.php";
	  </script>
	  <h2>Welcome</h2>
	<?php
}
else	
{
	?><script>
	window.alert("Incorrect Information");
	window.history.back();
	</script>
	<?php
	
}

?>