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
  <link rel="stylesheet" href="css/index19.css">
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
              <div class="logo-toggle"><span class="logo"><img
                src="wallpaper/AniROOM.png" alt="" style="width: 200%;margin-left:95px;"></span><i
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
        <h3 class="header-topic">Welcome to AniRoom ! !</h3>
      </div>
      <div class="col-9">
        <div class="widget-container left"><img src="wallpaper/mikuall5.png" alt=""
            style="width:100%; height: 200px;margin-top: 15px;object-fit: contain;">
            </div>
        <article class="widget-container left">
          <div class="widget mxj left">
            <div class="widget-header"><span style="float: right;"><a style="text-decoration: none;color:#1c439b;"
                  href="https://mxj.myanimelist.net/" style="font-weight: normal; font-size: 11px;">Visit
                  MALxJapan</a></span>Information anime-</div>
            <div class="widget-content"><a style="text-decoration: none;"
                href="https://mxj.myanimelist.net/anisong-survey2022/?utm_source=MAL&amp;utm_medium=top_mxj_anisong-survey2022">
                <div class="content">
                  <div class="image"><img class="image"
                      src="https://cdn.myanimelist.net/resources/mxj_panel/2022/20220817_anisong.png"></div>
                  <div class="text">AniSong Giveaway Survey - Take for a chance to win</div>
                </div>
              </a><a style="text-decoration: none;"
                href="https://mxj.myanimelist.net/otakujudge/quizentry/?utm_source=MAL&amp;utm_medium=top_mxj_OJ-quiz">
                <div class="content">
                  <div class="image"><img class="image"
                      src="https://cdn.myanimelist.net/resources/mxj_panel/2022/20220715_otaku_judge.png"></div>
                  <div class="text">Calling all otaku ! Submit your otaku quiz questions to new quiz app Otaku Judge
                  </div>
                </div>
              </a><a style="text-decoration: none;"
                href="https://mxj.myanimelist.net/bunkasai2022/emoji-contest/?utm_source=MAL&amp;utm_medium=top_mxj_bunkasai-emoji">
                <div class="content">
                  <div class="image"><img class="image"
                      src="https://cdn.myanimelist.net/resources/mxj_panel/2022/20220804_emoji.png"></div>
                  <div class="text">Whip up some cute critter emoji designs for MAL and win prizes ! ?</div>
                </div>
              </a></div>
          </div>
        </article>
        <article class="widget-container left">
          <div class="widget mxj left">
            <div class="widget-header"><span style="float: right;"><a style="text-decoration: none; color:#1c439b;"
                  href="anime.php" style="font-weight: normal; font-size: 11px;">View
                  more</a></span>Summer 2022 anime-</div>
            <div class="widget-content">
              <?php if (mysqli_num_rows($result) > 0) {
                while($row=mysqli_fetch_assoc($result)) {
    echo "<a style='text-decoration: none;' href='https://mxj.myanimelist.net/anisong-survey2022/?utm_source=MAL&amp;utm_medium=top_mxj_anisong-survey2022'>
<div class='content'>";
echo " <ul class='widget-slide js-widget-slide' >
<li class='btn-anime'><a href='detailanime.php?keyword={$row['id']}'class='link'><h3 class='h3_character_name'><span class='title'> {$row['name']}
    </span></h3><img class='image_anime'src='wallpaper/{$row['filename']}'></a></li></ul></div></a>";

  }
}

?></div>
          </div>
        </article>
        <article class="widget-container left">
          <div class="widget mxj left">
            <div class="widget-header"><span style="float: right;"><a style="text-decoration: none; color:#1c439b;"
                  href="videoanime.php" style="font-weight: normal; font-size: 11px;">View
                  more</a></span>Most Popular Anime Trailers-</div>
            <div class="widget-content"><a style='text-decoration: none;'
                href='https://mxj.myanimelist.net/anisong-survey2022/?utm_source=MAL&amp;utm_medium=top_mxj_anisong-survey2022'>
                <div class='content'>
                  <ul class="widget-slide js-widget-slide" data-slide="3"
                    style="display: flex;margin-left: -20px;">
                    <li class="btn-anime"><a data-bg="https://cdn.myanimelist.net/images/anime/10/47347.jpg"
                        class="iframe js-fancybox-video link lazyloaded picture"
                        href="https://www.youtube.com/embed/KKzmOh4SuBc?"
                        data-title="PV 1" data-video-id="30" data-anime-id="16498" rel="gallery"
                        style="background-image: url(&quot;https://cdn.myanimelist.net/images/anime/10/47347.jpg&quot;);"><span
                          class="title">PV 1</span><span class="btn-play"
                          style="background-image: url(wallpaper/play.png);">play</span></a><span class="external-link">
                        <h3 class="promotional_videos_h3"><a class="videos"
                            href="https://myanimelist.net/anime/16498/Shingeki_no_Kyojin"
                            title="Shingeki no Kyojin">Shingeki no Kyojin</a></h3>
                      </span></li>
                    <li class="btn-anime"><a data-bg="https://cdn.myanimelist.net/images/anime/9/9453.jpg"
                        class="iframe js-fancybox-video link lazyloaded picture"
                        href="https://www.youtube.com/embed/NlJZ-YgAt-c?"
                        data-title="PV" data-video-id="3679" data-anime-id="1535" rel="gallery"
                        style="background-image: url(&quot;https://cdn.myanimelist.net/images/anime/9/9453.jpg&quot;);"><span
                          class="title">PV</span><span class="btn-play"
                          style="background-image: url(wallpaper/play.png);">play</span></a><span class="external-link">
                        <h3 class="promotional_videos_h3"><a class="videos"
                            href="https://myanimelist.net/anime/1535/Death_Note" title="Death Note">Death Note</a>
                        </h3>
                      </span></li>
                    <li class="btn-anime"><a data-bg="https://cdn.myanimelist.net/images/anime/9/9453.jpg"
                        class="iframe js-fancybox-video link lazyloaded picture"
                        href="https://www.youtube.com/embed/--IcmZkvL0Q?"
                        data-title="PV" data-video-id="3679" data-anime-id="1535" rel="gallery"
                        style="background-image: url(wallpaper/fullmetal.jpg);background-position: center;"><span
                          class="title">Announcement</span><span class="btn-play"
                          style="background-image: url(wallpaper/play.png);">play</span></a><span class="external-link">
                        <h3 class="promotional_videos_h3"><a class="videos"
                            href="https://myanimelist.net/anime/1535/Death_Note"
                            title="Fullmetal Alchemist: Brotherhood">Fullmetal Alchemist: Brotherhood</a></h3>
                      </span></li>
                    <li class="btn-anime"><a data-bg="https://cdn.myanimelist.net/images/anime/9/9453.jpg"
                        class="iframe js-fancybox-video link lazyloaded picture"
                        href="https://www.youtube.com/embed/6Bdb1V0Io_g?"
                        data-title="PV" data-video-id="3679" data-anime-id="1535" rel="gallery"
                        style="background-image: url(wallpaper/saitama.jpg);background-position: center;"><span
                          class="title">PV1</span><span class="btn-play"
                          style="background-image: url(wallpaper/play.png);">play</span></a><span class="external-link">
                        <h3 class="promotional_videos_h3"><a class="videos"
                            href="https://myanimelist.net/anime/1535/Death_Note" title="One Punch Man">One Punch
                            Man</a></h3>
                      </span></li>
                  </ul>
                </div>
              </a></div>
          </div>
        </article>
      </div>
      <div class="col-3">
        <div class="right-column">
          <article class="widget-container right">
            <div class="widget airing_ranking right">
              <div class="ranking-digest">
                <div class="ranking-header side_header_margin"><a class="btn-view_more"
                    href="#"><b>More</b></a>
                  <h2 class="h2_side">Top My Anime</h2>
                </div>
                <ul style="list-style:none;">
                  <?php
                  // add button ใส่หลัง div class='data' //
                  // <a
                  //         href='https://myanimelist.net/login.php?error=login_required&amp;from=%2Fanime%2F50160%2FKingdom_4th_Season'
                  //         title='Quick add anime to my list'
                  //         class='button_add ga-click ranking-digest fl-r addtolist'><span class='ga-click'
                  //           data-ga-click-type='list-add-button' data-ga-click-param='aid:50160'
                  //           style='line-height: unset;'>add</span></a>
               if (mysqli_num_rows($results) > 0) {
                while($row=mysqli_fetch_assoc($results)) {
                  $id2 = $row['id'];
                  $name2 = $row['name'];
                  $filename2 = $row['filename'];
                  $text = $row['text'];
                  if($id2 >= 1){
                 echo "<li class='ranking-unit'><span class='rank'>$id2</span>
                      <p class='data-image'><a class='image'
                          href=''><img width='50' height='70'
                            src='wallpaper/$filename2'
                            class='lazyloaded'>
                            </a>
                      </p>
                    <div class='data'>
                        <h3 class='h3_side'><a class='title'
                            href='https://myanimelist.net/anime/50160/Kingdom_4th_Season'>$name2</a></h3>
                        <span class='info pt8'>$text,
                          scored ? </span><br><span class='members pb8'>0 members</span>
                      </div>
                    </li>";
               }
              }
              }
                ?>

                </ul>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
   
  </div>
  <footer>
      <div class="footer-content">
        <img src="css/aniROOM.png" alt="" style="width:10%;">
        <p class="footer-ul"><ul style="list-style: none;display: flex;">
                <li><a class="nav" href="index.php">Home</a></li>
                <li><a class="nav" href="anime.php">Anime</a></li>
                <li><a class="nav" href="videoanime.php">Anime Trailers</a></li>
                <li><a class="nav" href="information.php">Information</a></li>
                <li><a class="nav" href="contact.php">Contact</a></li>
              </ul></p>

            <ul class="socials">
              <li><a href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/maxz.chatsoponpan"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://www.youtube.com/channel/UC6Ng-ATgob6P_EZU5RAp9Fg"><i class="fa fa-youtube"></i></a></li>
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