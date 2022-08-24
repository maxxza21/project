<?php 
$connect = mysqli_connect('localhost', 'root', '', 'image');
$keyword = $_GET['keyword'];
$query = mysqli_query($connect,"SELECT * FROM `animelist` WHERE nameanime like '%$keyword%';");
if (mysqli_num_rows($query) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($query)) {
      $id2 = $row['id'];
      $nameanime2 = $row['nameanime'];
      $secondnameanime2 = $row['secondnameanime'];
      $date2 = $row['date'];
      $episode2 = $row['episode'];
      $imageanime2 = $row['imageanime'];
      $textanime2 = $row['textanime'];
      
      echo
      "<span class='col-4 content'>
          <h2>
              <div style='text-align: center;'> <a href='#' class='name-anime'> $nameanime2 </a>
              </div>
          </h2>
          <div class='name-anime2' style='text-align: center; margin-top: -10px;'>$secondnameanime2</div>
          <div class='text-space'><span class='line'>$date2</span>
              <span>$episode2</span>
          </div>
          <div class='row'>
              <div class='col-6'><img class='content-pic' src='css/$imageanime2' alt=''></div>
              <div class='col-6 content-overflow'>
                  <div class='box'>
                      <p>$textanime2</p>
                      <a href='#' class='readmore-btn' id='readmore-btn' style='text-decoration: none;'><i
                              class='fa-solid fa-chevron-down'></i></a>
                      </button>
                  </div>
              </div>
          </div>
      </span>";
      header('location: anime.php');
  }
}
?>