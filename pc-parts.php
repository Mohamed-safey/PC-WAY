<?php
require_once('includes/header.php');
?>

<div class="container" style="padding-top:130px;">

<p class="border"></p>

<h1 class="main_title">HARDWARE</h1>

<h3 class="sub_title">Check Out our latest products in all categories</h3>

<h4 class="cat_name"><span><i class="fa fa-arrow-right"></i></span> Graphic processing units >>></h4>

</div><!--/container-->

<div class="container_1" >

<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />


<?php
$query_vga="SELECT * FROM parts WHERE cat_id='1' ORDER BY id DESC LIMIT 4";
$result_vga=mysqli_query($dbc,$query_vga) or die(mysqli_error($dbc));
while($row_vga=mysqli_fetch_array($result_vga)){
$_SESSION['vga_cat'] = $row_vga['cat_id'];

$query_man="SELECT * FROM manfecturer WHERE id='$row_vga[man_id]'";
$result_man=mysqli_query($dbc,$query_man) or die(mysqli_error($dbc));
while($row_man=mysqli_fetch_array($result_man)){

?>

<div class="left product_show">

<h2><img src="<?php echo $row_vga['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_vga['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_vga['id']; ?>">View Prices</a>

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

<button class="btn_big" onclick="addtocart(<?php echo $row_vga['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_vga['id']; ?>" class="window dialog">

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

 ?>

<div class="clear"></div>

<div class="container">

<div class="view_more">

<h2 style="text-align:center;"><a href="view-category.php?id=<?php echo $_SESSION['vga_cat']; ?>" style="text-align:center;">View All Items in this category</a></h2>

</div><!--/view_more-->

</div><!--/container-->

</div><!--/container-->

<hr class="separtor" />

<div class="clear"></div>

<div class="container" >

<h4 class="cat_name"><span><i class="fa fa-arrow-right"></i></span> Random ACCESS MEMORY (RAM) >>></h4>

</div><!--/container-->

<div class="container_1">

<?php
$query_vga="SELECT * FROM parts WHERE cat_id='2' ORDER BY id DESC LIMIT 4";
$result_vga=mysqli_query($dbc,$query_vga) or die(mysqli_error($dbc));
while($row_vga=mysqli_fetch_array($result_vga)){
$_SESSION['ram_cat'] = $row_vga['cat_id'];
$query_man="SELECT * FROM manfecturer WHERE id='$row_vga[man_id]'";
$result_man=mysqli_query($dbc,$query_man) or die(mysqli_error($dbc));
while($row_man=mysqli_fetch_array($result_man)){

?>

<div class="left product_show">

<h2><img src="<?php echo $row_vga['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_vga['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_vga['id']; ?>">View Prices</a>

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
<button class="btn_big" onclick="addtocart(<?php echo $row_vga['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_vga['id']; ?>" class="window dialog">

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
 ?>

<div class="clear"></div>

<div class="container">

<div class="view_more">

<h2 style="text-align:center;"><a href="view-category.php?id=<?php echo $_SESSION['ram_cat']; ?>" style="text-align:center;">View All Items in this category</a></h2>

</div><!--/view_more-->

</div><!--/container-->

</div><!--/container-->

<hr class="separtor" />

<div class="clear"></div>

<div class="container" >

<h4 class="cat_name"><span><i class="fa fa-arrow-right"></i></span> Central Proccesing units (CPU) >>></h4>

</div><!--/container-->

<div class="container_1">

<?php
$query_vga="SELECT * FROM parts WHERE cat_id='3' ORDER BY id DESC LIMIT 4";
$result_vga=mysqli_query($dbc,$query_vga) or die(mysqli_error($dbc));
while($row_vga=mysqli_fetch_array($result_vga)){
$_SESSION['cpu_cat'] = $row_vga['cat_id'];
$query_man="SELECT * FROM manfecturer WHERE id='$row_vga[man_id]'";
$result_man=mysqli_query($dbc,$query_man) or die(mysqli_error($dbc));
while($row_man=mysqli_fetch_array($result_man)){

?>

<div class="left product_show">

<h2><img src="<?php echo $row_vga['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_vga['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_vga['id']; ?>">View Prices</a>

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
<button class="btn_big" onclick="addtocart(<?php echo $row_vga['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_vga['id']; ?>" class="window dialog">

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
 ?>

<div class="clear"></div>

<div class="container">

<div class="view_more">

<h2 style="text-align:center;"><a href="view-category.php?id=<?php echo $_SESSION['cpu_cat']; ?>" style="text-align:center;">View All Items in this category</a></h2>

</div><!--/view_more-->

</div><!--/container-->

</div><!--/container-->

<hr class="separtor" />

<div class="clear"></div>

<div class="container" >

<h4 class="cat_name"><span><i class="fa fa-arrow-right"></i></span> Power Supply Units (PSU) >>></h4>

</div><!--/container-->

<div class="container_1">

<?php
$query_vga="SELECT * FROM parts WHERE cat_id='4' ORDER BY id DESC LIMIT 4";
$result_vga=mysqli_query($dbc,$query_vga) or die(mysqli_error($dbc));
while($row_vga=mysqli_fetch_array($result_vga)){
$_SESSION['psu_cat'] = $row_vga['cat_id'];
$query_man="SELECT * FROM manfecturer WHERE id='$row_vga[man_id]'";
$result_man=mysqli_query($dbc,$query_man) or die(mysqli_error($dbc));
while($row_man=mysqli_fetch_array($result_man)){

?>

<div class="left product_show">

<h2><img src="<?php echo $row_vga['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_vga['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_vga['id']; ?>">View Prices</a>

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
<button class="btn_big" onclick="addtocart(<?php echo $row_vga['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_vga['id']; ?>" class="window dialog">

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
 ?>

<div class="clear"></div>

<div class="container">

<div class="view_more">

<h2 style="text-align:center;"><a href="view-category.php?id=<?php echo $_SESSION['psu_cat']; ?>" style="text-align:center;">View All Items in this category</a></h2>

</div><!--/view_more-->

</div><!--/container-->

</div><!--/container-->

<hr class="separtor" />

<div class="clear"></div>

<div class="container" >

<h4 class="cat_name"><span><i class="fa fa-arrow-right"></i></span> Mother - Boards >>></h4>

</div><!--/container-->

<div class="container" style="width:1215px; margin-left:70px;">

<?php
$query_vga="SELECT * FROM parts WHERE cat_id='5' ORDER BY id DESC LIMIT 4";
$result_vga=mysqli_query($dbc,$query_vga) or die(mysqli_error($dbc));
while($row_vga=mysqli_fetch_array($result_vga)){
$_SESSION['mb_cat'] = $row_vga['cat_id'];
$query_man="SELECT * FROM manfecturer WHERE id='$row_vga[man_id]'";
$result_man=mysqli_query($dbc,$query_man) or die(mysqli_error($dbc));
while($row_man=mysqli_fetch_array($result_man)){

?>

<div class="left product_show">

<h2><img src="<?php echo $row_vga['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_vga['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_vga['id']; ?>">View Prices</a>

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
<button class="btn_big" onclick="addtocart(<?php echo $row_vga['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_vga['id']; ?>" class="window dialog">

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
 ?>

<div class="clear"></div>

<div class="container">

<div class="view_more">

<h2 style="text-align:center;"><a href="view-category.php?id=<?php echo $_SESSION['mb_cat']; ?>" style="text-align:center;">View All Items in this category</a></h2>

</div><!--/view_more-->

</div><!--/container-->

</div><!--/container-->

<hr class="separtor" />

<div class="clear"></div>

<div class="container" >

<h4 class="cat_name"><span><i class="fa fa-arrow-right"></i></span> Monitros >>></h4>

</div><!--/container-->

<div class="container_1">

<?php
$query_vga="SELECT * FROM parts WHERE cat_id='6' ORDER BY id DESC LIMIT 4";
$result_vga=mysqli_query($dbc,$query_vga) or die(mysqli_error($dbc));
while($row_vga=mysqli_fetch_array($result_vga)){
$_SESSION['mn_cat'] = $row_vga['cat_id'];
$query_man="SELECT * FROM manfecturer WHERE id='$row_vga[man_id]'";
$result_man=mysqli_query($dbc,$query_man) or die(mysqli_error($dbc));
while($row_man=mysqli_fetch_array($result_man)){

?>

<div class="left product_show">

<h2><img src="<?php echo $row_vga['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_vga['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_vga['id']; ?>">View Prices</a>

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
<button class="btn_big" onclick="addtocart(<?php echo $row_vga['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_vga['id']; ?>" class="window dialog">

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
 ?>

<div class="clear"></div>

<div class="container">

<div class="view_more">

<h2 style="text-align:center;"><a href="view-category.php?id=<?php echo $_SESSION['mn_cat']; ?>" style="text-align:center;">View All Items in this category</a></h2>

</div><!--/view_more-->

</div><!--/container-->

</div><!--/container-->

<hr class="separtor" />

<div class="clear"></div>

<div class="container" >

<h4 class="cat_name"><span><i class="fa fa-arrow-right"></i></span> Hard Drives >>></h4>

</div><!--/container-->

<div class="container_1" >

<?php
$query_vga="SELECT * FROM parts WHERE cat_id='7' ORDER BY id DESC LIMIT 4";
$result_vga=mysqli_query($dbc,$query_vga) or die(mysqli_error($dbc));
while($row_vga=mysqli_fetch_array($result_vga)){
$_SESSION['hd_cat'] = $row_vga['cat_id'];
$query_man="SELECT * FROM manfecturer WHERE id='$row_vga[man_id]'";
$result_man=mysqli_query($dbc,$query_man) or die(mysqli_error($dbc));
while($row_man=mysqli_fetch_array($result_man)){

?>

<div class="left product_show">

<h2><img src="<?php echo $row_vga['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_vga['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_vga['id']; ?>">View Prices</a>

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
<button class="btn_big" onclick="addtocart(<?php echo $row_vga['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_vga['id']; ?>" class="window dialog">

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
 ?>

<div class="clear"></div>

<div class="container">

<div class="view_more">

<h2 style="text-align:center;"><a href="view-category.php?id=<?php echo $_SESSION['hd_cat']; ?>" style="text-align:center;">View All Items in this category</a></h2>

</div><!--/view_more-->

</div><!--/container-->

</div><!--/container-->

<hr class="separtor" />

<div class="clear"></div>

<div class="container" >

<h4 class="cat_name"><span><i class="fa fa-arrow-right"></i></span> Cases >>></h4>

</div><!--/container-->

<div class="container_1" >

<?php
$query_vga="SELECT * FROM parts WHERE cat_id='8' ORDER BY id DESC LIMIT 4";
$result_vga=mysqli_query($dbc,$query_vga) or die(mysqli_error($dbc));
while($row_vga=mysqli_fetch_array($result_vga)){
$_SESSION['cs_cat'] = $row_vga['cat_id'];
$query_man="SELECT * FROM manfecturer WHERE id='$row_vga[man_id]'";
$result_man=mysqli_query($dbc,$query_man) or die(mysqli_error($dbc));
while($row_man=mysqli_fetch_array($result_man)){

?>

<div class="left product_show">

<h2><img src="<?php echo $row_vga['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_vga['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_vga['id']; ?>">View Prices</a>

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
<button class="btn_big" onclick="addtocart(<?php echo $row_vga['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_vga['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_vga['id']; ?>" class="window dialog">

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
 ?>

<div class="clear"></div>

<div class="container">

<div class="view_more">

<h2 style="text-align:center;"><a href="view-category.php?id=<?php echo $_SESSION['cs_cat']; ?>" style="text-align:center;">View All Items in this category</a></h2>

</div><!--/view_more-->

</div><!--/container-->

</div><!--/container-->

<div class="clear"></div>

</form>

<?php
require_once('includes/footer.php');
?>