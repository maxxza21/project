<?php
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
  <link rel="stylesheet" href="css/indexs.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Document</title>
</head>

<body>
  
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