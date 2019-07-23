<?php
require_once('includes/header.php');

if(isset($_GET['cat_id'])){

$cat_id=$_GET['cat_id'];
$_SESSION['cat_id']=$cat_id;


$query="SELECT * FROM parts_dealers WHERE cat_id='$cat_id' AND dealer_id='$_SESSION[logged_d]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));



}
?>

<div class="container" style="padding-top:130px;">

<div class="register" style="margin-bottom:40px;">

<p class="border"></p>

<h1 class="main_title">Select From ALready placed Items Or Add A New One</h1>

<h3 class="sub_title">Select one of The Following and add it ti your collection or add new items</h3>

<p style="margin-bottom:50px;">Thank you for contibuting in our website , in order to maintain stable smart customization Resuults
we take some Concept as a standard that we need you to highy follow it in order we adjust our result process

</p>

</div><!--/register-->

<div class="holder" style="margin-bottom:50px;">

<div class="left" style="width:50%; border-right:2px dashed #c9c9c9; padding:10px;">

<h2 style="font-size:17px; text-align:center; font-weight:bold;margin-bottom:10px;"> Your Items Of This Category </h2>

<?php
while($row_1=mysqli_fetch_array($result)){
$items="SELECT * FROM parts WHERE id='$row_1[part_id]'";
$res_part=mysqli_query($dbc,$items) or die(mysqli_error($dbc));
while($row_part=mysqli_fetch_array($res_part)){
?>

<div class="left product_show" style="width:170px; height:230px;">

<h2><img src="<?php echo $row_part['image'];  ?>" style="width:120px; height:130px;"/></h2>

<p class="p_name"><?php echo $row_part['part_name'];  ?></p>

<p class="man"><span>price : </span><?php echo $row_1['price'];  ?></p>

</div><!--/product_show-->

<?php
}
 }
?>

<div class="clear"></div>

</div><!--/left-->

<div class="right" style="width:50%; padding:10px;">

<h2 style="font-size:17px; text-align:center; font-weight:bold;margin-bottom:10px;"> Add Already found items to your collection </h2>

<form action="add_exisiting.php" method="post">

<div style="margin:0 auto; width:300px;">

<select name="item" style="width:300px; padding:10px;" >

<?php

$items="SELECT * FROM parts WHERE cat_id='$_SESSION[cat_id]'";
$res_part=mysqli_query($dbc,$items) or die(mysqli_error($dbc));
while($row_part=mysqli_fetch_array($res_part)){

?>

<option value="<?php echo $row_part['id']; ?>"><?php echo $row_part['part_name']; ?></option>

</div><!--/product_show-->

<?php
}
 ?>

</select>

<button class="right btn_big" style="margin-top:150px;" name="add_exist" >Next</a>

<div class="clear"></div>

</form>

</div>

</div><!--/right-->

<div class="clear"></div>

<h2 style="text-align:center; margin-top:40px; margin-bottom:20px; font-weight:bold; font-size:18px;"><a href="add_new_item.php" style="color:#333; text-decoration:underline;">Skip And Add New Item</a></h2>

</div><!--/holder-->

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>