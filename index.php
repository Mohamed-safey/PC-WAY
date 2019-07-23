<?php
require_once('includes/header_home.php');
$msg="";
if(isset($_GET['done'])){
if($_GET['done']==1){

$msg="<p class='success' style='color:green; font-weight:bold;margin-left:50px;'>email sent successfully to our side</p>";

}

 }
?>
<div class="below_header wow fadeInLeft animated" data-wow-duration="1.5s">

<div class="container" style="margin-left:110px;  margin-right:0;">

<div class="left post first">

<img src="images/page1_img1.png" class="left wow tada"data-wow-delay="2s"  />

<span class="heading wow pulse"  data-wow-delay="2.5s">

<a href="#">

<span class="main_h">
OUR
</span><br />

<span class="sec_h">
Services
</span>

</a>

</span>

</div><!--/post-->

<div class="left post">

<img src="images/page1_img2.png" class="left wow tada"data-wow-delay="3s" />

<span class="heading wow pulse" data-wow-delay="3.5s">

<a href="#">

<span class="main_h">
GET
</span><br />

<span class="sec_h">
YOUR NEEDS
</span>

</a>

</span>

</div><!--/post-->

<div class="left post">

<img src="images/page1_img3.png" class="left wow tada"data-wow-delay="4s" />

<span class="heading wow pulse" data-wow-delay="4.5s">

<a href="#">

<span class="main_h">
FIND
</span><br />

<span class="sec_h">
PC-DEALERS
</span>

</a>

</span>

</div><!--/post-->

<div class="left post ">

<img src="images/page1_img4.png" class="left wow tada"data-wow-delay="5s" />

<span class="heading wow pulse" data-wow-delay="5.5s">

<a href="#">

<span class="main_h">
OUR
</span><br />

<span class="sec_h">
Support
</span>

</a>

</span>

</div><!--/post-->

<div class="clear"></div>

</div><!--/container-->

</div><!--/below_header-->

<div class="banner wow fadeInLeft animated" data-wow-duration="2.3s" >

<div class="container">

<div class="left b_h1">

<h1>Find The Most Suitable For you<h1>

</div><!--/b_h1-->

<div class="right b_h2">
<?php
if(isset($_SESSION['logged_id'])){
?>
<h2><a href="Get_Help_Custmozing.php">ENTER QUESTION MODE AND<br /> WE WILL GUDIE YOU</a></h2>
<?php
}else{
?>
<h2><a href="user_login.php">ENTER QUESTION MODE AND<br /> WE WILL GUDIE YOU</a></h2>
<?php
}
?>
</div><!--/h2-->

<div class="clear"></div>

</div><!--/container-->

</div><!--/banner-->

<div class="container">

<div class="dealer_area">

<p class="border"></p>

<div class="left dealer_promo">

<h2>pc-dealer : New Ways to Market Your brands</h2>

<h3>SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUAVENIAM, QUIS NOSTRUD EXERCITATION</h3>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
 Duis aute irure dolor in reprehenderit. Lorem ipsum dolor sit amet co tetur adipisicing elit.</p>

</div><!--/dealer_promo-->

<div class="right click_dealer">
<?php
if(!isset($_SESSION['logged_d'])){
?>
<a class="btn_big" href="dealer_login.php">Click Here</a>
<?php
}else{
?>
<a class="btn_big" href="add_item.php">Click Here</a>
<?php
}
?>
</div><!--/click_dealer-->

<div class="clear"></div>

</div><!--/dealer_area-->

<div class="latest_destopts">

<div class="dealer_area">

<p class="border"></p>

<div class="left dealer_promo" style="width:50%;">

<h2 style="font: 700 31px/38px 'Roboto Condensed', sans-serif;">Check Out our latest customized Desktops Pc- systems</h2>

<h3>SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE </h3>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
 Duis aute irure dolor in reprehenderit. Lorem ipsum dolor sit amet co tetur adipisicing elit
 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
 Duis aute irure dolor in reprehenderit. Lorem ipsum dolor sit amet co tetur adipisicing elit
 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
 Duis aute irure dolor in reprehenderit. Lorem ipsum dolor sit amet co tetur adipisicing elitLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
 Duis aute irure dolor in reprehenderit. Lorem ipsum dolor sit amet co tetur adipisicing elit.</p>

</div><!--/dealer_promo-->

<div class="right click_dealer" style="width:50%;">

<div class="left customized_case">

<img src="images/01-01_lian_li_v1200.jpg"/>

</div><!--/customized_case-->


<div class="left customized_case">

<img src="images/Custom-Gaming-PC.jpg"/>

</div><!--/customized_case-->

<div class="left customized_case">

<img src="images/customized-pc-north-york-toronto.jpg"/>

</div><!--/customized_case-->

<div class="left customized_case">

<img src="images/digital-storm-vanguish-pc.jpg"/>

</div><!--/customized_case-->

</div><!--/click_dealer-->

<div class="clear"></div>

</div><!--/dealer_area-->

<div class="clear"></div>
</div><!--/latest_destopts-->

</div><!--/container-->

<div class="service_explain">

<div class="container">

<div class="left our_services">

<div class="explain">

<p class="border"></p>

<h3>We Connect Both Users AND pc-dealers Together ,<br />
we help users to get thier needs and we market Dealer's products and brands <br />
</h3>

<h2>Thorug pc-way we connect you with what you need</h2>

<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod 
Tempor Incididunt Ut Labore<br /> Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation 
Ullamco Laboris Nisi <br /> Ut Aliquip. 
Duis Aute 
Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.</p>

<a class="btn_big_inset" href="about.php"> Read More</a>

</div><!--/explain-->

</div><!--/our_services-->

<div class="clear"></div>

</div><!--/container-->

</div><!--/service_explain-->

<div class="offerat">

<div class="container">

<div class="left offer">

<h3>Get Updates about The latest Products Added </h3>

<h4> Insert your mail and we will send you the latest updates</h4>

<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae</p>

</div><!--/offer-->

<div class="right insert_mail" id="mail">

<?php
echo $msg;
?>

<form method="post" action="mail_subscribe.php">

<input type="email" name="mail" palceholder="insert your mail" required />

<button class="submit" name="subscribe">Subscribe</button>

</form>

</div><!--/insert_mail-->

<div class="clear"></div>

</div>

</div><!--/offerat-->


<div class="container">

<div class="brands">

<ul>

 <li><img src="images/GeForce-logo1-615x260.jpg" /></li>
 <li><img src="images/download.png" /></li>
 <li><img src="images/1000px-Intel-logo.svg.png" /></li>
 <li><img src="images/cooler_master_logo.png" /></li>

</ul>
 
 <div class="clear"></div>
 
</div><!--/brands-->

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>
