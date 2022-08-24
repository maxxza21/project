<?php session_start();
include 'imagedb.php';
include 'myanimedb.php';

if ( !isset($_SESSION['username'])) {
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
    <link rel="stylesheet" href="css/information6.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <div class="logo-toggle"><span class="logo"><img src="wallpaper/AniROOM.png" alt=""
                                        style="width: 200%;margin-left:95px;"></span><i
                                    class='bx bx-x siderbarClose'></i></div>
                            <ul class="nav-links">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="anime.php">Anime</a></li>
                                <li><a href="videoanime.php">Anime Trailers</a></li>
                                <li><a href="information.php">Information</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                        <div class="darkLight-searchBox">
                            <div class="dark-light"><i class='bx bx-moon moon'></i><i class='bx bx-sun sun'></i></div>
                            <form action="anime.php" method="GET">
                                <div class="searchBox">
                                    <div class="searchToggle"><i class='bx bx-x cancel'></i><i
                                            class='bx bx-search search'></i></div>
                                    <div class="search-field"><input type="text" id="image" name="keyword"
                                            placeholder="Search..."><button style="border: none;"><i
                                                class='bx bx-search'></i></button>
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
                <h3 class="header-topic">Information ! !</h3>
            </div>


            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    
                    <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='0' class='active'
                        aria-current='true' aria-label='Slide 1'></button>
                        <?php
                     include 'informationconn.php';
                     if (mysqli_num_rows($result) > 0) {
                         // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            echo
                    "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='$id'
                        aria-label='Slide $id+1'></button>";
                   
                         }
                        }
                        ?>
                </div>
               
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="wallpaper/anisong.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="box">
                                <a
                                    href="https://mxj.myanimelist.net/anisong-survey2022/?utm_source=MAL&utm_medium=top_mxj_anisong-survey2022">
                                    <h5 class='texthover'>AniSong Giveaway Survey - Take for a chance to win</h5>
                                </a>
                                <p class="display">Give us your thoughts!

                                    Even if you are unfamiliar with anisongs (anime songs), we want to know your
                                    thoughts and experiences regarding anisongs! Take the survey for your chance to win
                                    one of 30 $50 Amazon Gift Cards up for grabs.</p>
                            </div>
                        </div>
                    </div>
                    <?php
                    
                    include 'informationconn.php';
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $link = $row['link'];
                                    $img = $row['img'];
                                    $detail = $row['detail'];
                                    echo
                    "<div class='carousel-item'>
                        <img src='wallpaper/{$row['img']}' class='d-block w-100' alt='...'>
                        <div class='carousel-caption d-none d-md-block'>
                            <div class='box'>
                            <a
                                    href='{$row['link']}'>
                                <h5 class='texthover'>{$row['name']}</h5>
                                </a>
                                <p class='display'>{$row['detail']}</p>
                            </div>
                        </div>
                    </div>";
                                }
                            }
                            ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
                            <img style="width: 100%;height: auto;"src="wallpaper/mikuall5.png" alt="">
    </div>

    <footer>
        <div class="footer-content">
            <img src="wallpaper/aniROOM.png" alt="" style="width:10%;">
            <p class="footer-ul">
                <ul style="list-style: none;display: flex;">
                    <li><a class="nav" href="index.php">Home</a></li>
                    <li><a class="nav" href="anime.php">Anime</a></li>
                    <li><a class="nav" href="videoanime.php">Anime Trailers</a></li>
                    <li><a class="nav" href="information.php">information</a></li>
                    <li><a class="nav" href="contact.php">Contact</a></li>
                </ul>
            </p>

            <ul class="socials">
                <li><a href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UC6Ng-ATgob6P_EZU5RAp9Fg"><i class="fa fa-youtube"></i></a>
                </li>
                <li><a href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2022 designed by Maxz</p>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/navbar.js"></script>
<script src="js/search.js"></script>

</html>