<?php
require_once('includes/config.php');
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
<script type='text/javascript' src='js/jquery.mobile.customized.min.js'></script>
<script type='text/javascript' src='js/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='js/camera.min.js'></script>
<script type="text/javascript" src="js/yoxview/yoxview-init.js"></script>
<script src="js/wow.min.js"></script>
<script>

		jQuery(function(){
			
			jQuery('#slider').camera({
				height: '583px',
				loader: 'none',
				pagination: false,
				thumbnails: false,
				hover: false,
				opacityOnGrid: false,
				overlayer: false,
				playPause: false,
				imagePath: '../images/'
			});

		});
	</script>
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

<div class="slider">

 <div class="camera_wrap camera_emboss pattern_1" id="slider">
 
             <div data-src="images/slider1.png" style="width:100%; height:583px;">
			
			<div class="fadeIn camera_effected" style="margin-top:175px; width:675px; margin-left:auto; margin-right: auto; "id="caption"><p
			style="color:white; font-size:37px; font-weight:600; font-style:italic;line-height:53px;">
			 <h4>WELCOME!</h4> <h1>NETWORKING.<br /> DATABASE MANAGEMENT<br /> APPLICATION DEVELOPMENT</h1>
             </p></div><!--/caption-->
			
            </div><!--/slider_1-->
			
			<div data-src="images/slider2.png" style="width:100%; height:583px;">
			
			<div class="fadeIn camera_effected" style="margin-top:175px; width:675px; margin-left:auto; margin-right: auto; "id="caption"><p
			style="color:white; font-size:37px; font-weight:600; font-style:italic;line-height:53px;">
			 <h4>WELCOME!</h4> <h1>NETWORKING.<br /> DATABASE MANAGEMENT<br /> APPLICATION DEVELOPMENT</h1>
             </p></div><!--/caption-->
			
            </div><!--/slider_2-->
			
					<div data-src="images/slider3.png" style="width:100%; height:583px;">
			
			<div class="fadeIn camera_effected" style="margin-top:175px; width:675px; margin-left:auto; margin-right: auto; "id="caption"><p
			style="color:white; font-size:37px; font-weight:600; font-style:italic;line-height:53px;">
			 <h4>WELCOME!</h4> <h1>NETWORKING.<br /> DATABASE MANAGEMENT<br /> APPLICATION DEVELOPMENT</h1>
             </p></div><!--/caption-->
			
            </div><!--/slider_3-->
 
 </div<!--/camera_wrap-->

</div><!--/slider-->

<div class="clear"></div>

</header>	