<?php session_start();
include('imagedb.php');
include('myanimedb.php');
include('conn.php');
if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    include('conn.php');
    $query = mysqli_query($connect,"SELECT * FROM `animelist` WHERE id like '%$keyword%'");
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
    <link rel="stylesheet" href="css/detailanimes.css">
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
                <?php
                 if (mysqli_num_rows($search_result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($search_result)) {
            $id = $row['id'];
            $nameanime = $row['nameanime'];
            $secondnameanime = $row['secondnameanime'];
            $imageanime = $row['imageanime'];
            echo
                "<h1 style='font-size:20px' class='header-topic'>$nameanime</h1>
                <p class='title-english'>$secondnameanime</p>";
            }
        }
                ?>
            </div>
            <div class="row">
                <div class="col-3" style="border-right: 1px solid #bebebe;margin: 5px 0;">
                    <?php
                    if(isset($_GET['keyword'])){
                        $keyword = $_GET['keyword'];
                        include('conn.php');
                        $query = mysqli_query($connect,"SELECT * FROM `animelist` WHERE id like '%$keyword%'");
                        $search_result = filterTabel($query);
                    }
                    if (mysqli_num_rows($search_result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($search_result)) {
                            $id2 = $row['id'];
                            $nameanime = $row['nameanime'];
                            $secondnameanime = $row['secondnameanime'];
                            $imageanime2 = $row['imageanime'];
                            echo
                "<img class='anime-pic' src='wallpaper/$imageanime2' alt=''>";
                        }
                    }
                ?>
                <h2 class='titles'>Alternative Titles</h2>
                <?php
                if(isset($_GET['keyword'])){
                    $keyword = $_GET['keyword'];
                    include('conn.php');
                    $query = mysqli_query($connect,"SELECT * FROM `animedetail` WHERE id like '%$keyword%'");
                    $search_result = filterTabel($query);
                }
                            if (mysqli_num_rows($search_result) > 0) {
                                while($row=mysqli_fetch_assoc($search_result)) {
                                    $synonyms = $row['synonyms'];
                                    $japanese  = $row['japanese'];
                                    $english  = $row['english'];
                                    $type = $row['type'];
                                    $episodes = $row['episodes'];
                                    $status  = $row['status'];
                                    $aired  = $row['aired'];
                                    $premiered  = $row['premiered'];
                                    $broadcast  = $row['broadcast'];
                                    $producers = $row['producers'];
                                    $licensors  = $row['licensors'];
                                    $studios  = $row['studios'];
                                    $source  = $row['source'];
                                    $genres  = $row['genres'];
                                    $theme = $row['theme'];
                                    $duration  = $row['duration'];
                                    $rating  = $row['rating'];
                                    
                                    echo
                    
                    "<div class='font_text'><span class='dark_text'> Synonyms: </span> $synonyms</div>
                    <div class='font_text'><span class='dark_text'> Japanese: </span> $japanese</div>
                    <div class='font_text'><span class='dark_text'> English: </span> $english</div>
                    <h2 class='titles'>Information</h2>
                    <div class='font_text'><span class='dark_text'> Type: </span> $type</div>
                    <div class='font_text'><span class='dark_text'> Episodes: </span> $episodes</div>
                    <div class='font_text'><span class='dark_text'> Status: </span> $status</div>
                    <div class='font_text'><span class='dark_text'> Aired: </span> $aired</div>
                    <div class='font_text'><span class='dark_text'> Premiered: </span> $premiered</div>
                    <div class='font_text'><span class='dark_text'> Broadcast: </span> $broadcast</div>
                    <div class='font_text'><span class='dark_text'> Producers: </span> $producers</div>
                    <div class='font_text'><span class='dark_text'> Licensors: </span> $licensors</div>
                    <div class='font_text'><span class='dark_text'> Studios: </span> $studios</div>
                    <div class='font_text'><span class='dark_text'> Source: </span> $source</div>
                    <div class='font_text'><span class='dark_text'> Genres: </span> $genres</div>
                    <div class='font_text'><span class='dark_text'> Theme: </span> $theme</div>
                    <div class='font_text'><span class='dark_text'> Duration: </span> $duration</div>
                    <div class='font_text'><span class='dark_text'> Rating: </span> $rating</div>";
                                }
                            }else{
                                echo "Coming Soon!!";
                            }
                            ?>

                </div>
                <div class="col-9">
                    <h2 class="right-titles">Synopsis</h2>
                    <?php
                    if(isset($_GET['keyword'])){
                        $keyword = $_GET['keyword'];
                        include('conn.php');
                        $query = mysqli_query($connect,"SELECT * FROM `animelist` WHERE id like '%$keyword%'");
                        $search_result = filterTabel($query);
                    }
                    if (mysqli_num_rows($search_result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($search_result)) {
                            $id2 = $row['id'];
                            $nameanime = $row['nameanime'];
                            $secondnameanime = $row['secondnameanime'];
                            $textanime = $row['textanime'];
                            echo
                "<div class='font_text_right'>$textanime</div>";
                        }
                    }
                ?>
                    
                    <article>
                        <h2 class="titles" style="padding-top: 20px;">Summer 2022 anime- <span style="float: right;"><a
                                    style="text-decoration: none; color:#1c439b;" href="anime.php"
                                    style="font-weight: normal; font-size: 10px;">View
                                    more</a></span></h2>
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

?>
                        </div>
                    </article>
                    <h2 class="titles" style="padding-top: 20px;">Characters & Voice Actors
                        <!--  <span style="float: right;"><a
                                    style="text-decoration: none; color:#1c439b;" href="anime.php"
                                    style="font-weight: normal; font-size: 10px;">View
                                    more</a></span> future เพิ่ม more characters -->
                    </h2>
                    <div class="row">
                        <div class="col-6 border-right">
                            <?php
                            
                            if(isset($_GET['keyword'])){
                                $keyword = $_GET['keyword'];
                                include('actordb.php');
                                $query = mysqli_query($connect,"SELECT * FROM `voiceactor` WHERE id like '%$keyword%'");
                                $search_result = filterTabel($query);
                            }
                            if(mysqli_num_rows($search_result) > 0) {
                                while($row=mysqli_fetch_assoc($search_result)) {
                                    $id = $row['id'];
                                    $animename1 = $row['animename1'];
                                    $animename2 = $row['animename2'];
                                    $animename3 = $row['animename3'];
                                    $animename4 = $row['animename4'];
                                    $animename5 = $row['animename5'];
                                    $animename6 = $row['animename6'];
                                    $animename7 = $row['animename7'];
                                    $animename8 = $row['animename8'];
                                    $animename9 = $row['animename9'];
                                    $animename10 = $row['animename10'];
                                    $animeimage1 = $row['animeimage1'];
                                    $animeimage2 = $row['animeimage2'];
                                    $animeimage3 = $row['animeimage3'];
                                    $animeimage4 = $row['animeimage4'];
                                    $animeimage5 = $row['animeimage5'];
                                    $animeimage6 = $row['animeimage6'];
                                    $animeimage7 = $row['animeimage7'];
                                    $animeimage8 = $row['animeimage8'];
                                    $animeimage9 = $row['animeimage9'];
                                    $animeimage10 = $row['animeimage10'];
                                    $actor1 = $row['actor1'];
                                    $actor2 = $row['actor2'];
                                    $actor3 = $row['actor3'];
                                    $actor4 = $row['actor4'];
                                    $actor5 = $row['actor5'];
                                    $actor6 = $row['actor6'];
                                    $actor7 = $row['actor7'];
                                    $actor8 = $row['actor8'];
                                    $actor9 = $row['actor9'];
                                    $actor10 = $row['actor10'];
                                    $actorimage1 = $row['actorimage1'];
                                    $actorimage2 = $row['actorimage2'];
                                    $actorimage3 = $row['actorimage3'];
                                    $actorimage4 = $row['actorimage4'];
                                    $actorimage5 = $row['actorimage5'];
                                    $actorimage6 = $row['actorimage6'];
                                    $actorimage7 = $row['actorimage7'];
                                    $actorimage8 = $row['actorimage8'];
                                    $actorimage9 = $row['actorimage9'];
                                    $actorimage10 = $row['actorimage10'];
                                    $main1 = $row['main1'];
                                    $main2 = $row['main2'];
                                    $main3 = $row['main3'];
                                    $main4 = $row['main4'];
                                    $main5= $row['main5'];
                                    $main6 = $row['main6'];
                                    $main7 = $row['main7'];
                                    $main8 = $row['main8'];
                                    $main9 = $row['main9'];
                                    $main10 = $row['main10'];
                                    $jp = $row['jp'];
                                }
                            }else{
                                echo "Coming Soon!!";
                                return false;
                            }
                            ?>
                                       <!-- left --> 
                            <table class='border-space'>
                                <tbody border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='width: 11%;'>
                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $animeimage1 ?>' alt=''></div>
                                        </td>
                                        <td valign='top' class='borderClass'>
                                            <h3 class='characters_voice_actors'><?php echo $animename1 ?></h3>
                                            <div class='spaceit_pad'>
                                                <small><?php echo $main1 ?></small>
                                            </div>
                                        </td>
                                        <td align='right' valign='top' class='borderClass'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' class='padding-pic'>
                                                            <h3 class='characters_voice_actors'><?php echo $actor1 ?></h3>
                                                            <div class='spaceit_pad_right'>
                                                                <small><?php echo $jp ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $actorimage1 ?>'
                                                                    alt=''></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                             
                            
                            <table class='border-space color'>
                                <tbody border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='width: 11%;'>
                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $animeimage2 ?>' alt=''></div>
                                        </td>
                                        <td valign='top' class='borderClass'>
                                            <h3 class='characters_voice_actors'><?php echo $animename2 ?></h3>
                                            <div class='spaceit_pad'>
                                                <small><?php echo $main2 ?></small>
                                            </div>
                                        </td>
                                        <td align='right' valign='top' class='borderClass'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' class='padding-pic'>
                                                            <h3 class='characters_voice_actors'><?php echo $actor2 ?></h3>
                                                            <div class='spaceit_pad_right'>
                                                                <small><?php echo $jp ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $actorimage2 ?>'
                                                                    alt=''></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                    
                            <table class='border-space'>
                                <tbody border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='width: 11%;'>
                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $animeimage3 ?>' alt=''></div>
                                        </td>
                                        <td valign='top' class='borderClass'>
                                            <h3 class='characters_voice_actors'><?php echo $animename3 ?></h3>
                                            <div class='spaceit_pad'>
                                                <small><?php echo $main3 ?></small>
                                            </div>
                                        </td>
                                        <td align='right' valign='top' class='borderClass'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' class='padding-pic'>
                                                            <h3 class='characters_voice_actors'><?php echo $actor3 ?></h3>
                                                            <div class='spaceit_pad_right'>
                                                                <small><?php echo $jp ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $actorimage3 ?>'
                                                                    alt=''></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            
                            <table class='border-space color'>
                                <tbody border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='width: 11%;'>
                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $animeimage4 ?>' alt=''></div>
                                        </td>
                                        <td valign='top' class='borderClass'>
                                            <h3 class='characters_voice_actors'><?php echo $animename4 ?></h3>
                                            <div class='spaceit_pad'>
                                                <small><?php echo $main4 ?></small>
                                            </div>
                                        </td>
                                        <td align='right' valign='top' class='borderClass'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' class='padding-pic'>
                                                            <h3 class='characters_voice_actors'><?php echo $actor4 ?></h3>
                                                            <div class='spaceit_pad_right'>
                                                                <small><?php echo $jp ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $actorimage4 ?>'
                                                                    alt=''></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class='border-space'>
                                <tbody border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='width: 11%;'>
                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $animeimage5 ?>' alt=''></div>
                                        </td>
                                        <td valign='top' class='borderClass'>
                                            <h3 class='characters_voice_actors'><?php echo $animename5 ?></h3>
                                            <div class='spaceit_pad'>
                                                <small><?php echo $main5 ?></small>
                                            </div>
                                        </td>
                                        <td align='right' valign='top' class='borderClass'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' class='padding-pic'>
                                                            <h3 class='characters_voice_actors'><?php echo $actor5 ?></h3>
                                                            <div class='spaceit_pad_right'>
                                                                <small><?php echo $jp ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $actorimage5 ?>'
                                                                    alt=''></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            




                           
                                
                                    <!-- right -->
                         
                        </div>
                        <div class="col-6">
                        <?php
                            
                            if(isset($_GET['keyword'])){
                                $keyword = $_GET['keyword'];
                                include('actordb.php');
                                $query = mysqli_query($connect,"SELECT * FROM `voiceactor` WHERE id like '%$keyword%'");
                                $search_result = filterTabel($query);
                            }
                            if(mysqli_num_rows($search_result) > 0) {
                                while($row=mysqli_fetch_assoc($search_result)) {
                                    $id = $row['id'];
                                    $animename1 = $row['animename1'];
                                    $animename2 = $row['animename2'];
                                    $animename3 = $row['animename3'];
                                    $animename4 = $row['animename4'];
                                    $animename5 = $row['animename5'];
                                    $animename6 = $row['animename6'];
                                    $animename7 = $row['animename7'];
                                    $animename8 = $row['animename8'];
                                    $animename9 = $row['animename9'];
                                    $animename10 = $row['animename10'];
                                    $animeimage1 = $row['animeimage1'];
                                    $animeimage2 = $row['animeimage2'];
                                    $animeimage3 = $row['animeimage3'];
                                    $animeimage4 = $row['animeimage4'];
                                    $animeimage5 = $row['animeimage5'];
                                    $animeimage6 = $row['animeimage6'];
                                    $animeimage7 = $row['animeimage7'];
                                    $animeimage8 = $row['animeimage8'];
                                    $animeimage9 = $row['animeimage9'];
                                    $animeimage10 = $row['animeimage10'];
                                    $actor1 = $row['actor1'];
                                    $actor2 = $row['actor2'];
                                    $actor3 = $row['actor3'];
                                    $actor4 = $row['actor4'];
                                    $actor5 = $row['actor5'];
                                    $actor6 = $row['actor6'];
                                    $actor7 = $row['actor7'];
                                    $actor8 = $row['actor8'];
                                    $actor9 = $row['actor9'];
                                    $actor10 = $row['actor10'];
                                    $actorimage1 = $row['actorimage1'];
                                    $actorimage2 = $row['actorimage2'];
                                    $actorimage3 = $row['actorimage3'];
                                    $actorimage4 = $row['actorimage4'];
                                    $actorimage5 = $row['actorimage5'];
                                    $actorimage6 = $row['actorimage6'];
                                    $actorimage7 = $row['actorimage7'];
                                    $actorimage8 = $row['actorimage8'];
                                    $actorimage9 = $row['actorimage9'];
                                    $actorimage10 = $row['actorimage10'];
                                    $main1 = $row['main1'];
                                    $main2 = $row['main2'];
                                    $main3 = $row['main3'];
                                    $main4 = $row['main4'];
                                    $main5= $row['main5'];
                                    $main6 = $row['main6'];
                                    $main7 = $row['main7'];
                                    $main8 = $row['main8'];
                                    $main9 = $row['main9'];
                                    $main10 = $row['main10'];
                                    $jp = $row['jp'];
                                }
                            }else{
                                return false;
                            }
                            ?>
                                       <!-- left --> 
                            <table class='border-space'>
                                <tbody border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='width: 11%;'>
                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $animeimage6 ?>' alt=''></div>
                                        </td>
                                        <td valign='top' class='borderClass'>
                                            <h3 class='characters_voice_actors'><?php echo $animename6 ?></h3>
                                            <div class='spaceit_pad'>
                                                <small><?php echo $main6 ?></small>
                                            </div>
                                        </td>
                                        <td align='right' valign='top' class='borderClass'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' class='padding-pic'>
                                                            <h3 class='characters_voice_actors'><?php echo $actor6 ?></h3>
                                                            <div class='spaceit_pad_right'>
                                                                <small><?php echo $jp ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $actorimage6 ?>'
                                                                    alt=''></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                             
                            
                            <table class='border-space color'>
                                <tbody border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='width: 11%;'>
                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $animeimage7 ?>' alt=''></div>
                                        </td>
                                        <td valign='top' class='borderClass'>
                                            <h3 class='characters_voice_actors'><?php echo $animename7 ?></h3>
                                            <div class='spaceit_pad'>
                                                <small><?php echo $main7 ?></small>
                                            </div>
                                        </td>
                                        <td align='right' valign='top' class='borderClass'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' class='padding-pic'>
                                                            <h3 class='characters_voice_actors'><?php echo $actor7 ?></h3>
                                                            <div class='spaceit_pad_right'>
                                                                <small><?php echo $jp ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $actorimage7 ?>'
                                                                    alt=''></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                    
                            <table class='border-space'>
                                <tbody border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='width: 11%;'>
                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $animeimage8 ?>' alt=''></div>
                                        </td>
                                        <td valign='top' class='borderClass'>
                                            <h3 class='characters_voice_actors'><?php echo $animename8 ?></h3>
                                            <div class='spaceit_pad'>
                                                <small><?php echo $main8 ?></small>
                                            </div>
                                        </td>
                                        <td align='right' valign='top' class='borderClass'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' class='padding-pic'>
                                                            <h3 class='characters_voice_actors'><?php echo $actor8 ?></h3>
                                                            <div class='spaceit_pad_right'>
                                                                <small><?php echo $jp ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $actorimage8 ?>'
                                                                    alt=''></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            
                            <table class='border-space color'>
                                <tbody border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='width: 11%;'>
                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $animeimage9 ?>' alt=''></div>
                                        </td>
                                        <td valign='top' class='borderClass'>
                                            <h3 class='characters_voice_actors'><?php echo $animename4 ?></h3>
                                            <div class='spaceit_pad'>
                                                <small><?php echo $main9 ?></small>
                                            </div>
                                        </td>
                                        <td align='right' valign='top' class='borderClass'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' class='padding-pic'>
                                                            <h3 class='characters_voice_actors'><?php echo $actor9 ?></h3>
                                                            <div class='spaceit_pad_right'>
                                                                <small><?php echo $jp ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $actorimage9 ?>'
                                                                    alt=''></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class='border-space'>
                                <tbody border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='width: 11%;'>
                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $animeimage10 ?>' alt=''></div>
                                        </td>
                                        <td valign='top' class='borderClass'>
                                            <h3 class='characters_voice_actors'><?php echo $animename10 ?></h3>
                                            <div class='spaceit_pad'>
                                                <small><?php echo $main10 ?></small>
                                            </div>
                                        </td>
                                        <td align='right' valign='top' class='borderClass'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' class='padding-pic'>
                                                            <h3 class='characters_voice_actors'><?php echo $actor10 ?></h3>
                                                            <div class='spaceit_pad_right'>
                                                                <small><?php echo $jp ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><img class='actor' src='wallpaper/charecter/<?php echo $actorimage10 ?>'
                                                                    alt=''></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <img src="css/aniROOM.png" alt="" style="width:10%;">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/7add581fca.js" crossorigin="anonymous"></script>
<script src="js/navbar.js"></script>
<script src="js/scroll2.js"></script>
<script src="js/search.js"></script>

</html>