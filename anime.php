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
    <link rel="stylesheet" href="css/animes.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>


    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <nav>
                    <div class="nav-bar"><i class='bx bx-menu sidebarOpen'></i><span class="logo navLogo"><img
                                src="wallpaper/AniROOM.png" alt="" style="width: 150%;"></span>
                        <div class="menu" style="margin-top:20px;">
                            <div class="logo-toggle"><span class="logo"><img
                src="wallpaper/AniROOM.png" alt="" style="width: 200%;margin-left:95px;"></span><i
                                    class='bx bx-x siderbarClose'></i></div>
                            <ul class="nav-links">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="anime.php">Anime</a></li>
                                <li><a href="videoanime.php">Trailers</a></li>
                                <li><a href="information.php">Information</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                        <div class="darkLight-searchBox">
              <div class="dark-light"><i class='bx bx-moon moon'></i><i class='bx bx-sun sun'></i></div>
              <form action="anime.php" method="GET">
              <div class="searchBox">
                <div class="searchToggle"><i class='bx bx-x cancel'></i><i class='bx bx-search search'></i></div>
                <div class="search-field"><input type="text" id="image" name="keyword" placeholder="Search..."><button style="border: none;"><i class='bx bx-search'></i></button>
                <div class="searchbar" id="searchresult"></div>
              <?php include('searchdb.php') ?>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div style="display: flex;"><?php if (isset($_SESSION['username'])) : ?><span
                                style="font-family: anime; font-size: 16px; color: #fff; margin-right: 10px;"><?php echo $_SESSION['username'];
                ?></span><span>
                                <p><a href="login_success.php?logout='1'" style="color: red;">logout</a></p>
                            </span><?php endif ?></div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row divide">
            <div class="color-topic">
                <h3 class="header-topic">Seasonal Anime</h3>
            </div>
            <div class="col-12">
                <div class="tvnew"><p> TV (New) </p></div>
                <div class="row">
                    <?php
                      if (mysqli_num_rows($search_result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($search_result)) {
            $id = $row['id'];
            $nameanime = $row['nameanime'];
            $secondnameanime = $row['secondnameanime'];
            $date = $row['date'];
            $episode = $row['episode'];
            $imageanime = $row['imageanime'];
            $textanime = $row['textanime'];
     
   
                echo
                    "<span class='col-4 content'>
                        <h2>
                            <div style='text-align: center;'> <a href='detailanime.php?keyword=$id' class='name-anime'> $nameanime </a>
                            </div>
                        </h2>
                        <div class='name-anime2' style='text-align: center; margin-top: -10px;'>$secondnameanime</div>
                        <div class='text-space'><span class='line'>$date</span>
                            <span>$episode</span>
                        </div>
                        <div class='row'>
                            <div class='col-6'><img class='content-pic' src='wallpaper/$imageanime' alt=''></div>
                            <div class='col-6 content-overflow'>
                                <div class='box' id='myDiv'>
                                    <p>$textanime</p>
                                    <a href='#' class='readmore-btn' id='readmore-btn' style='text-decoration: none;'><i
                                            class='fa-solid fa-chevron-down'></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </span>";
                }
            }
                    ?>
                </div>
            </div>
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
<script src="js/scroll3.js"></script>
<script src="js/search.js"></script>

</html>