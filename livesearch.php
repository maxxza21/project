<?php
include('searchdb.php');
if(isset($_POST['input'])){

    $input = $_POST['input'];
    $query = "SELECT * FROM animelist WHERE nameanime LIKE '{$input}%'";
    $results = mysqli_query($connect, $query);
    if(mysqli_num_rows($results) > 0){ ?>
    <?php 
    while($row = mysqli_fetch_assoc($results)) {
                $id2 = $row['id'];
                $name2 = $row['nameanime'];
                $image = $row['imageanime'];
            }
    ?>
    <tr>
        <td><a href="detailanime.php?keyword=<?php echo $id2 ?>"><img class="searchimage" src="wallpaper/<?php echo $image ?>" alt=""></a></td>
        <td><a href="detailanime.php?keyword=<?php echo $id2 ?>"><p style="padding-left: 5px;padding-right: 5px;"><?php echo $name2; ?></p></a></td>
    </tr>
    <?php
    }else{
        return true;
    }
}
?>