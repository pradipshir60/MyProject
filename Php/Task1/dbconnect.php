<?php
$servername="localhost";
$username="root";
$password="";
$database="user";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("we fail to connect server ".mysql_connect_error() );
}?>