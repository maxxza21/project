<?php
$connect = mysqli_connect('localhost', 'root', '', 'image');

if (!$connect) {
    die("connection failed") .mysqli_connect_error();
}
$result = mysqli_query($connect, "SELECT * FROM images");
    // if (mysqli_num_rows($result) > 0) {
    //     // output data of each row
    //     while($row = mysqli_fetch_assoc($result)) {
    //         $id = $row['id'];
    //         $name = $row['name'];
    //         $filename = $row['filename'];
    //     }
    // }
    //  else {
    //     echo "0 results";
    // }
// $test = array(
//     "0" => array("5", "text"),
//     "1" => array("2", "string")
// );
// for($i = 0; $i < 2; $i++){
//     for($y = 0; $y < 2; $y++){
// echo $test[$i][$y];
//     }
// }

mysqli_close($connect);
?>
