<?php
require_once('includes/header.php');

if(isset($_SESSION['level'])){

if($_SESSION['level']== '1'){

$level="HIGH PERFORMANCE MACHINE";

}

if($_SESSION['level']== '2'){

$level="MEDIUM PERFORMANCE MACHINE";

}

if($_SESSION['level']== '3'){

$level=" Moderate PERFORMANCE MACHINE";

}

}//bta3t el level

if(isset($_SESSION['man']) && ($_SESSION['man'] !='any')){

$man_id=$_SESSION['man'];

$man="SELECT * FROM manfecturer WHERE id='$man_id'";
$result_man=mysqli_query($dbc,$man) or die(mysqli_error($dbc));
$row_man=mysqli_fetch_array($result_man);

}

if(isset($_SESSION['man']) && $_SESSION['man'] =='any'){

$man='We choosed For You The approbriate Manefacturer Accoridng To Your Results';

}

if(isset($_SESSION['price'])){

if($_SESSION['price']=='high'){

$price="High - End Price Machine";

}

if($_SESSION['price']=='low'){

$price="Adjusted Price Machine";

}

}//bta3t el price

?>

<div class="container" style="padding-top:130px;">

<p class="border"></p>

<h1 class="main_title">Your Customization Results</h1>

<h3 class="sub_title">Customization Result Accoridung to you answer</h3>

<p style="margin-bottom:50px;">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. 
Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip. 
Duis Aute Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.
</p>

<div class="result_info">

<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />

<h4 class="cat_name"><span><i class="fa fa-arrow-right"></i></span> Results From Your Answers >>></h4>

<p><span>Machine Performance : </span> <?php echo $level ?> </p>

<?php
if(isset($_SESSION['man'])&& ($_SESSION['man'] !='any')){
?>

<p><span>Parts Manefacturer : </span> <?php echo $row_man['name']; ?> </p>

<?php
}
?>
<?php
if(isset($_SESSION['man'])&& ($_SESSION['man'] =='any')){
?>

<p><span>Parts Manefacturer : </span> <?php echo $man; ?> </p>

<?php
}
?>

<p><span>Price Range : </span> <?php echo $price ?> </p>


</div><!--/result_info-->

<div class="parts_results">

<?php

if(($_SESSION['usage']=='1') || ($_SESSION['usage']=='4')){

$_SESSION['usage']='1';


?>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Matching Graphic card according to you Results >>></h4>

<?php
if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='1' AND level_id='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='1' AND level_id='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='1' AND level_id='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='1' AND level_id ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


if(isset($_SESSION['man']) && $_SESSION['man'] =='any'){
$query_4="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_4=mysqli_query($dbc,$query_4) or die('rrrr');
}

if(isset($_SESSION['man']) && $_SESSION['man'] !='any'){

$query_4="SELECT * FROM parts WHERE id='$row_3[part_id]' AND man_id='$_SESSION[man]'";
$result_4=mysqli_query($dbc,$query_4) or die('rrrr');

}

while($row_4=mysqli_fetch_array($result_4)){



?>



<div class="left product_show">

<h2><img src="<?php echo $row_4['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_4['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>


<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_4[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_4[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_4['id']; ?>">Compare</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }  

?>



<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Random ACCESS MEMORY (RAM) >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='2' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='2' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='2' AND level_id='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='2' AND level_id ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Central Proccesing units (CPU) >>></h4>

<?php
if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='3' AND level_id='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='3' AND level_id='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='3' AND level_id='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='3' AND level_id ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


if(isset($_SESSION['man']) && $_SESSION['man'] =='any'){
$query_4="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_4=mysqli_query($dbc,$query_4) or die('rrrr');
}

if(isset($_SESSION['man']) && $_SESSION['man'] !='any'){

$query_4="SELECT * FROM parts WHERE id='$row_3[part_id]' AND man_id='$_SESSION[man]'";
$result_4=mysqli_query($dbc,$query_4) or die('rrrr');

}

while($row_4=mysqli_fetch_array($result_4)){



?>



<div class="left product_show">

<h2><img src="<?php echo $row_4['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_4['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>


<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_4[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_4[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_4['id']; ?>">Compare</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }  

?>

<div class="clear"></div>	

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Power Supply Units (PSU) >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='4' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='4' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='4' AND level_id='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='4' AND level_id ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Mother - Boards >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='5' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='5' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='5' AND level_id='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='5' AND level_id ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Monitor >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='6' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='6' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='6' AND level_id='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='6' AND level_id ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Hard Drives >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='7' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='7' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='7' AND level_id='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='7' AND level_id ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> CASES >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='8' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='8' AND level_id='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='8' AND level_id='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='8' AND level_id ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

</div><!--/parts_results-->
<?php
}
?>

<!--awel case---------------------------------------------------------------------------------------------------------------------------------------->
<!--asd--------------------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------->

<?php

if(($_SESSION['usage']=='2') || ($_SESSION['usage']=='3')){

$_SESSION['usage']='2';


?>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Matching Graphic card according to you Results >>></h4>

<?php
if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='1' AND level_s='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='1' AND level_s='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='1' AND level_s='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='1' AND level_s ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


if(isset($_SESSION['man']) && $_SESSION['man'] =='any'){
$query_4="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_4=mysqli_query($dbc,$query_4) or die('rrrr');
}

if(isset($_SESSION['man']) && $_SESSION['man'] !='any'){

$query_4="SELECT * FROM parts WHERE id='$row_3[part_id]' AND man_id='$_SESSION[man]'";
$result_4=mysqli_query($dbc,$query_4) or die('rrrr');

}

while($row_4=mysqli_fetch_array($result_4)){



?>



<div class="left product_show">

<h2><img src="<?php echo $row_4['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_4['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>


<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_4[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_4[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_4['id']; ?>">Compare</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }  

?>



<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Random ACCESS MEMORY (RAM) >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='2' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='2' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='2' AND level_s='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='2' AND level_s ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Central Proccesing units (CPU) >>></h4>

<?php
if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='3' AND level_s='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='3' AND level_s='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='3' AND level_s='$_SESSION[level]'AND man_id='$_SESSION[man]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='3' AND level_s ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


if(isset($_SESSION['man']) && $_SESSION['man'] =='any'){
$query_4="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_4=mysqli_query($dbc,$query_4) or die('rrrr');
}

if(isset($_SESSION['man']) && $_SESSION['man'] !='any'){

$query_4="SELECT * FROM parts WHERE id='$row_3[part_id]' AND man_id='$_SESSION[man]'";
$result_4=mysqli_query($dbc,$query_4) or die('rrrr');

}

while($row_4=mysqli_fetch_array($result_4)){



?>



<div class="left product_show">

<h2><img src="<?php echo $row_4['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_4['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>


<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_4[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_4[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_4['id']; ?>">Compare</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }  

?>

<div class="clear"></div>	

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Power Supply Units (PSU) >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='4' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='4' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='4' AND level_s='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='4' AND level_s ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Mother - Boards >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='5' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='5' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='5' AND level_s='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='5' AND level_s ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Monitor >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='6' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='6' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='6' AND level_s='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='6' AND level_s ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> Hard Drives >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='7' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='7' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='7' AND level_s='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='7' AND level_s ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

<h4 class="cat_name" style="width:50%;"><span><i class="fa fa-arrow-right"></i></span> CASES >>></h4>

<?php

if($_SESSION['price']=='low'){
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE cat_id='8' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}

if($_SESSION['price']=='high'){
$min="SELECT MAX(price) As price_min FROM parts_dealers WHERE cat_id='8' AND level_s='$_SESSION[level]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];
}


$query="SELECT * FROM parts_dealers WHERE price='$min_price' AND cat_id='8' AND level_s='$_SESSION[level]'";
$result=mysqli_query($dbc,$query) or die('rrrr');
while($row=mysqli_fetch_array($result)){

$query_2="SELECT * FROM part_properties WHERE part_id='$row[part_id]' AND category_id='8' AND level_s ='$_SESSION[level]'";
$result_2=mysqli_query($dbc,$query_2) or die('rrrr');
while($row_2=mysqli_fetch_array($result_2)){

$query_3="SELECT * FROM part_usage WHERE part_id='$row_2[part_id]' AND usage_id='$_SESSION[usage]'";
$result_3=mysqli_query($dbc,$query_3) or die('rrrr');
while($row_3=mysqli_fetch_array($result_3)){


$query_8="SELECT * FROM parts WHERE id='$row_3[part_id]'";
$result_8=mysqli_query($dbc,$query_8) or die('rrrr');


while($row_8=mysqli_fetch_array($result_8)){


?>



<div class="left product_show">

<h2><img src="<?php echo $row_8['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_8['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>
<?php
$min="SELECT MIN(price) As price_min FROM parts_dealers WHERE part_id='$row_8[id]'";
$r=mysqli_query($dbc,$min) or die(mysqli_error($dbc));
$row_min=mysqli_fetch_array($r);
$min_price= $row_min['price_min'];

$p="SELECT * FROM parts_dealers WHERE price='$min_price' AND part_id='$row_8[id]'";
$result_p=mysqli_query($dbc,$p) or die('error');

while($row_best=mysqli_fetch_array($result_p)){

$query_d="SELECT * FROM dealers_profile WHERE dealers_id='$row_best[dealer_id]'";
$result_d=mysqli_query($dbc,$query_d) or die('rrrr');
while($row_d=mysqli_fetch_array($result_d)){

?>

<p class="man"><span> Best Dealer : </span><?php echo $row_d['name'];  ?></p>
<p class="man"><span> price : </span><?php echo $row_best['price'];  ?></p>
<?php
}
 }
?>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_8['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){

?>

<button class="btn_big" onclick="addtocart(<?php echo $row_4['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_4['id']; ?>" class="window dialog">

<div class="left img">
<img src="images/stop.png" />
</div>

<div class="left img" style="margin-left:50px; margin-top:20px;">

<h2 style="margin-bottom:19px;">you have to logged in in order to perform This action </h2>

<a class="btn_big" href="user_login.php">Log in to your account</a>

<h2 style="margin-bottom:19px;margin-top:40px;">not A pc-way user ? Signup an account Now !!!</h2>

<a class="btn_big" href="user_register.php">Sign Up</a>

</div>

<div class="clear"></div>

</div><!--/window_dialog-->

<div class="clear"></div>

</div><!--/p_controls-->

</div><!--/product_show-->

<?php
}
 }
  }
   }

?>

<div class="clear"></div>

</div><!--/parts_results-->
<?php
}
?>

</form>

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>