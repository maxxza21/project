<?php
$connect = mysqli_connect('localhost', 'root', '', 'image');

if (!$connect) {
    die("connection failed") .mysqli_connect_error();
}
$results = mysqli_query($connect, "SELECT * FROM animelist");

    // if (mysqli_num_rows($results) > 0) {
    //     // output data of each row
    //     while($row = mysqli_fetch_assoc($results)) {
    //         $id2 = $row['id'];
    //         $name2 = $row['name'];
    //         $filename2 = $row['filename'];
    //     }
    //     echo $id2;
    // }
    //  else {
    //     echo "0 results";
    // }

    mysqli_close($connect);
?>