<?php
include("includes/db.php");// b7ot connection bta3 el db
include("includes/config.php");// b7ot connection bta3 el db
include("includes/functions.php");// file fi kol el function bta3t el be3 we el shera wel shopping cart
include("includes/check_cart.php");// file el function eli b3ml biha check 3la hl fiha 7aga mdafa lil cart wla l2
?>
<!DOCTYPE HTML>
<HTML>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>PC-WAY | SMART PC-SOLUTIONS</title>
<meta name="keywords" content="pc-way, pc-in egypt,pc-price,get my right pc"/>
<meta name="description" content="pc-way is a smart pc solution website system intended for helping non-experienced users  to get the right pc
with the most suitable budget" />
<meta name="robots" content="INDEX,FOLLOW"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/camera.css" />
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="shorctut icon" href="images/favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/wow.min.js"></script>
<script type="text/javascript" src="js/popup_window.js"></script>

<SCRIPT>

function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
	var newwindow = ''
function popitup(url) {
if (newwindow.location && !newwindow.closed) {
    newwindow.location.href = url;
    newwindow.focus(); }
else {
    newwindow=window.open(url,'htmlname','width=404,height=316,resizable=1');}
}

function tidy() {
if (newwindow.location && !newwindow.closed) {
   newwindow.close(); }
}

</SCRIPT>

</head>

<body>

<header>

<div class="header_top">

<div class="container">

<div class="info">

<div class="left address">

<address>
11 Abo El Feda ST. BIS , Zamalik ,cairo, Egypt
</address>

</div><!--/address-->

<div class="left email">
<p>contact@pc-way.com</p>
</div><!--email-->

<div class="left phone">
<p>(+2) 0106 23 78 544</p>
</div><!--phone-->

<div class="right social">

<ul>

<?php
if(!isset($_SESSION['logged_id']) && !isset($_SESSION['logged_d'])){
?>
 <li><a href="user_login.php">User Login</a></li>
 <li><a href="dealer_login.php">Dealer Login</a></li>

 <?php
 }
 ?>
 
<?php
if(isset($_SESSION['logged_id'])){
?>
 
 <li><a href="user_profile.php">My Profile</a></li>
 <li><a href="logout.php">Logout</a></li>
 
<?php
}
?>

<?php
if(isset($_SESSION['logged_d'])){
?>
 
 <li><a href="dealer_profile.php">My Profile</a></li>
 <li><a href="logout_d.php">Logout</a></li>
 
<?php
}
?>
 
</ul> 
 
</div><!--/social-->

<div class="clear"></div>

</div><!--/info-->

</div><!--/container-->

</div><!--/header_top-->

<div class="stuck_holder">

<div class="container">

<div class="left logo">

<h1>

<a href="index.php">

<span class="main">
PC - WAY
</span><!--/main--><br />
<span class="slogan">
Desktops solution system
</span><!--/slogan-->

</a>

</h1>

</div><!--/logo-->

<nav class="right">

<ul>

 <li><a href="ondex.php" class="active">Home</a></li>
 <li><span></span></li>
 <li><a href="about.php">About</a></li>
 <li><span></span></li>
 <?php
 if(!isset($_SESSION['logged_id'])){
 ?>
 <li><a href="user_register.php">Users Area</a></li>
 <?php
 }else{
 ?>
 <li><a href="user_profile.php">Users Area</a></li>
 <?php
 }
 ?>
 <li><span></span></li>
 <li><a href="pc-parts.php">Hardware</a></li>
 <li><span></span></li>
 <?php
 if(!isset($_SESSION['logged_d'])){
 ?>
 <li><a href="dealer_register.php">Dealers Area</a></li>
 <?php
 }else{
 ?>
  <li><a href="dealer_profile.php">Dealers Area</a></li>
  <?php
  }
  ?>
 <li><span></span></li>
 <li><a href="contact.php">Contact</a></li>

</ul>
 
</nav>

<div class="clear"></div>

</div><!--/container-->

</div><!--/stuck_holder-->

<div class="clear"></div>

</header>

<div class="clear"></div>	