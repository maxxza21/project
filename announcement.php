<?php
$connect = mysqli_connect('localhost', 'root', '', 'image');
if (!$connect) {
    die("connection failed") .mysqli_connect_error();
}
$result = mysqli_query($connect, "SELECT * FROM announcement");

?>