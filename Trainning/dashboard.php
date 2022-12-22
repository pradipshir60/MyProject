<html>


<?php 
/*
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trainning";

if (isset($_POST['index'])){
    $email = ($_POST['email']);

    $password = ($_POST['password']);
}

    if (empty($email)) 
    {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($password))
    {

        header("Location: index.php?error=Password is required");

        exit();

    }else
    {

        $sql = "SELECT $email, $passwords FROM student WHERE email='$email' AND password ='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) 
        {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $password) 
            {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

               // $_SESSION['name'] = $row['name'];

               // $_SESSION['id'] = $row['id'];

                header("Location: dashboard.php");

                exit();

            }else
            {

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }
    } */?>

echo "Login Sucessfuly";

<a href="http://localhost:8080/trainning/register.php">Visit Register page!</a>

</html>
