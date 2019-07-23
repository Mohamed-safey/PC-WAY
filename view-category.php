<?php
require_once('includes/header.php');
if(isset($_GET['id'])){

$cat_id=$_GET['id'];
$_SESSION['cat_id']=$cat_id;

$query="SELECT * FROM category WHERE id='$_SESSION[cat_id]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
$row_cat=mysqli_fetch_array($result);

}
?>

<div class="container" style="padding-top:130px;">

<p class="border"></p>

<h1 class="main_title">HARDWARE</h1>

<h3 class="sub_title">Check Out our latest products in this category</h3>

<h4 class="cat_name"><span><i class="fa fa-arrow-right"></i></span> <?php echo $row_cat['name']; ?> >>></h4>

</div><!--/container-->

<div class="container_1" >

<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />


<?php
$query="SELECT * FROM category WHERE id='$_SESSION[cat_id]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
while($row=mysqli_fetch_array($result)){

$query_parts="SELECT * FROM parts WHERE cat_id='$row[id]' ORDER BY id DESC";
$result_parts=mysqli_query($dbc,$query_parts) or die(mysqli_error($dbc));
while($row_parts=mysqli_fetch_array($result_parts)){

$query_man="SELECT * FROM manfecturer WHERE id='$row_parts[man_id]'";
$result_man=mysqli_query($dbc,$query_man) or die(mysqli_error($dbc));
while($row_man=mysqli_fetch_array($result_man)){

?>

<div class="left product_show">

<h2><img src="<?php echo $row_parts['image'];  ?>" /></h2>

<p class="p_name"><?php echo $row_parts['part_name'];  ?></p>

<p class="man"><span>provides by : </span><?php echo $row_man['name'];  ?></p>

<div class="p_controls">

<div class="left addt_to">

<?php
if(isset($_SESSION['logged_id'])){
?>
<a class="btn_big" href="view_prices.php?p_id=<?php echo $row_parts['id']; ?>">View Prices</a>

<?php
}
else{
?>

<a href="#<?php echo $row_parts['id'];  ?>" name="modal" class="btn_big">View Prices</a>

<?php
}
?>

</div><!--/add_to-->

<div class="left addt_to">
<?php
if(isset($_SESSION['logged_id'])){
?>
<button class="btn_big" onclick="addtocart(<?php echo $row_parts['id']?>)" >Get This One</button>

<?php
}
else{
?>

<a href="#<?php echo $row_parts['id'];  ?>" name="modal" class="btn_big">Get This one </a></span>

<?php
}
?>

</div><!--/add_to-->

<div id="<?php echo $row_parts['id']; ?>" class="window dialog">

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
 ?>

<div class="clear"></div>

</form>

</div>

<?php
require_once('includes/footer.php');
?>