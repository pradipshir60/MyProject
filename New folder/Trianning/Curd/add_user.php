<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>Add New User</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control"  placeholder="Name" name="user_name">
    </div>
	<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="user_password">
    </div>
	
	
	<div class="form-group">
      <label>Details:</label>
     <textarea class="form-control" name="user_details"></textarea>
    </div>
	
    
    <input type="submit" name="insert-btn" class="btn btn-primary" />
  </form>
  
  <?php
	$conn =  mysqli_connect('localhost','root','','login1');
	
	if(isset($_POST['insert-btn'])){
		
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$image = $_FILES['image']['name'];
	$user_details = $_POST['user_details'];
		
	$insert = "INSERT INTO user(user_name,user_email,user_password,user_details) VALUES('$user_name','$user_email','$user_password','$user_details')";
	
	$run_insert = mysqli_query($conn,$insert);
	if($run_insert ===  true){
		echo "Data Has Been Inserted";
		//move_uploaded_file($image_tmp,"upload/$image");
	}else{
		echo "Failed, Ty Again";
	}	
	
		
	}
	
	
	
	
	
	
  
  ?>
  
  
  
  
  
</div>

</body>
</html>
