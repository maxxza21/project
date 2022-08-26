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
	<link rel="stylesheet" type="text/css" href="css/contacts.css">
  <link rel="stylesheet" href="css/contactnavbars.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div class="container">
  <?php include 'header.php'; ?>
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
  <?php include 'footer.php'; ?>
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