<?php 

$severname = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// create connection
$conn = mysqli_connect($severname, $username, $password, $dbname);

// check connection
if(!$conn){
    die("connection fail" . mysqli_connect_error());
} else {
}

?>