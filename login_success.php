<?php 

  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
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
    <link rel="stylesheet" href="css/loginsuccessful2.css">
    <title>Home page</title>
</head>
<body onLoad="setTimeout('delayedRedirect()', '3000')">
</div>
<section>
    <div class="form-container">
        <h1>login</h1>
        <form action="login_db.php" method="post">
        <!-- notification message -->
  	<!-- ?php if (isset($_SESSION['success'])) : ?>
      <div class="success" style="font-family: titanfont; margin-top:-40px; font-size: 18px; color:red; text-align:center;" >
      	<h3>
          <! --?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<! ?php endif ?>  -->
     <!-- logged in user information -->
      <?php  if (isset($_SESSION['username'])) : ?> 
        <p style="font-family: titanfont; color:red; text-align: center;margin-top: -40px;font-size: 25px;font-weight: 500;">You are now logged in</p>
    	<p style="font-family: anime; font-size: 16px; text-align: center; ">Welcome <strong style="font-family: anime; font-size: 16px;"><?php echo $_SESSION['username']; ?></strong></p>
        
    	<!--<p> <a href="login_success.php?logout='1'" style="color: red;">logout</a> </p> -->
     <?php endif ?> 
        </form>
    </div>
   </section>

  	
   
</body>
<script>
    function delayedRedirect(){
        window.location = "http://localhost/project/index.php"
    }
</script>
</html>