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
<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="css/contact5.css">
  <link rel="stylesheet" href="css/contactnavbar2.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
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
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2 style="text-align:center;">Contact Us</h2>
				<p><i style="color:green; font-size: 20px;" class="fa-brands fa-line"></i><span stlye="font-size: 18px;"> matsumiz</span></p>
				<p><i style="color:#3b5999; font-size: 20px;" class="fa fa-facebook-square" aria-hidden="true"></i><span stlye="font-size: 18px;"> Maxz Chatsoponpan</span></p>
				<p><i style="color:#000; font-size: 20px;" class="fa-solid fa-phone"></i><span stlye="font-size: 18px;"> 082-565-8900</span></p>
				<p><i style="color:antiquewhite; font-size: 20px;" class="fa fa-envelope"></i><span stlye="font-size: 18px;"> M.kantapat21@gmail.com</span></p>
				<p><i style="color:red; font-size: 20px;" class="fa fa-map-marker" aria-hidden="true"></i><span stlye="font-size: 18px;"> 713/8 sukumvit101 punnawittee25 10260</span></p>
        <h2 style="text-align:center;">Credit</h2>
        <p>Made logo: Somsak </p>
        <p>Dev Web: Kantapat Chatsoponpan</p>
			</div>
		</div>
	</div>
  <footer>
      <div class="footer-content">
        <img src="wallpaper/aniROOM.png" alt="" style="width:10%;">
        <p class="footer-ul"><ul style="list-style: none;display: flex;">
                <li><a class="nav" href="index.php">Home</a></li>
                <li><a class="nav" href="anime.php">Anime</a></li>
                <li><a class="nav" href="videoanime.php">Anime Trailers</a></li>
                <li><a class="nav" href="information.php">Information</a></li>
                <li><a class="nav" href="contact.php">Contact</a></li>
              </ul></p>

            <ul class="socials">
              <li><a  href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-twitter"></i></a></li>
              <li><a  href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-google-plus"></i></a></li>
              <li><a  href="https://www.youtube.com/channel/UC6Ng-ATgob6P_EZU5RAp9Fg"><i class="fa fa-youtube"></i></a></li>
              <li><a  href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
      </div>
      <div class="footer-bottom">
        <p>copyright &copy;2022 designed by Maxz</p>
      </div>
    </footer>
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
</body>
</html>