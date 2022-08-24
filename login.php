<?php 
session_start();
include('server.php');  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginsuccessful2.css">
    <title>Document</title>
</head>

<body>
   <section>
    <div class="form-container">
        <h1>login</h1>
        <form action="login_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
      <div class="error" style="font-family: titanfont; margin-top:-40px; font-size: 18px; color:red; text-align:center;" >
      	<p>
          <?php 
          	echo $_SESSION['error']; 
          	unset($_SESSION['error']);
          ?>
      	</p>
      </div>
  	<?php endif ?>
            <div class="control" >
                <label class="txt" for="username">Username</label>
                <input type="text" name="username" required maxlength="10">
            </div>
            <div class="control" >
                <label class="txt" for="password">Password</label>
                <input type="password" name="password" required maxlength="10">
            </div>
            <span class="txt">Not a member ? <a href="registeruser.php">Sign Up</a></span>
            <div class="control" >
                <input type="submit" value="Login" name="login_user" id="login_user">
            </div>
        </form>
    </div>
   </section>
</body>

</html>