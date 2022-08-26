<?php session_start();
include 'imagedb.php';
include 'myanimedb.php';
include 'animelistdb.php';

if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    include('conn.php');
    $query = mysqli_query($connect,"SELECT * FROM `animelist` WHERE nameanime like '%$keyword%'");
    $search_result = filterTabel($query);
}else{
    include('conn.php');
    $query = mysqli_query($connect,"SELECT * FROM `animelist`");
    $search_result = filterTabel($query);
}
function filterTabel($query){
    include('conn.php');
    $filter_Result = $query;
    return $filter_Result;
}

if (!isset($_SESSION['username'])) {
  $_SESSION['msg']="You must log in first";
  header('location: login.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/videoanimes.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Document</title>
</head>

<body>
    <div class="container">
    <?php include 'header.php'; ?>
        <div class="row divide">
            <div class="color-topic">
                <h3 class="header-topic">Anime Trailers</h3>
            </div>
        </div>
        <div class="row" style="border: 1px solid #bebebe;">
        <div class="col-12 type" >
           <div>
           PV Anime 
        </div>
        </div>
        <?php
            include 'connvideo.php';
                 if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $namevideo = $row['namevideo'];
            $video = $row['video'];
            $type = $row['type'];
            $link = $row['link'];

            echo "<div class='col-3' style='padding-top: 10px; padding-bottom: 20px;'>
            <a href='$link' class='animevideo'  style='background-image: url(wallpaper/$video);'>
            <span class='textvideo'>$type</span>
            <span class='btn-play' style='background-image: url(wallpaper/play.png);'></span></a>
            <a href=''><span class='namevideo'>$namevideo</span></a>

          </div>";
        }
    }
    ?>
          <div class="col-12 type" >Announcement</div>
          <?php
            include 'announcement.php';
                 if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $image = $row['image'];
            $type = $row['type'];
            $link = $row['link'];

            echo "<div class='col-3' style='padding-top: 10px; padding-bottom: 20px;'>
            <a href='$link' class='animevideo'  style='background-image: url(wallpaper/$image);'>
            <span class='textvideo'>$type</span>
            <span class='btn-play' style='background-image: url(wallpaper/play.png);'></span></a>
            <a href=''><span class='namevideo'>$name</span></a>

          </div>";
        }
    }
    ?>

       
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/7add581fca.js" crossorigin="anonymous"></script>
<script src="js/navbar.js"></script>
<script src="js/scroll2.js"></script>
<script src="js/search.js"></script>

</html>