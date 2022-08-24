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
    <link rel="stylesheet" href="css/register2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="js/validate.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="title">Register to wings of freedom</div>
        <form action="register.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
      <div class="error" style="font-family: titanfont; margin-top:20px; font-size: 18px; color:red;">
      	<p class="error">
          <?php 
          	echo $_SESSION['error']; 
          	unset($_SESSION['error']);
          ?>
      	</p>
      </div>
  	<?php endif ?>
            <div class="user_details">
                <div class="input-box">
                    <span for="username" class="details">Username</span>
                    <input type="text" name="username" required placeholder="Enter your username" maxlength="10">
                </div>
                <div class="input-box">
                    <span for="email" class="details">Email</span>
                    <input type="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="input-box">
                    <span for="password_1" class="details">Password</span>
                    <input type="password" name="password_1" required placeholder="Enter your password" maxlength="10">
                </div>
                <div class="input-box">
                    <span class="details" for="password_2">Confirm Password</span>
                    <input type="password" name="password_2" required placeholder="Confirm your password" maxlength="10">
                </div>
                <div class="input-box">
                    <p class="details" style="margin-bottom: -30px ;">Already a member ? <a href="login.php">Sign in</a></p>
                </div>
            </div>
            <div class="button">
                <input type="submit" name="reg_user" id="reg_user" value="Register">
            </div>
        </form>
    </div>
           
</body>

</html>