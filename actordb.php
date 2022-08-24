<?php 
$connect = mysqli_connect('localhost', 'root', '', 'image');
if (!$connect) {
    die("connection failed") .mysqli_connect_error();
}
$resultactor = mysqli_query($connect, "SELECT * FROM voiceactor");

// $test = array(
//     "0" => array("5", "text"),
//     "1" => array("2", "string")
// );
// for($i = 0; $i < 2; $i++){
//     for($y = 0; $y < 2; $y++){
// echo $test[$i][$y];
//     }
// }
?>