<?php
require_once('includes/header.php');

$query2="SELECT * FROM parts_dealers WHERE dealer_id='$_SESSION[logged_d]'";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));

?>

<div class="container" style="padding-top:130px;">

<div class="register">

<p class="border"></p>

<h1 class="main_title">Update Items</h1>

<h3 class="sub_title">Updating Your Item Prices</h3>

<p style="margin-bottom:50px;">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. 
Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip. 
Duis Aute Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.
</p>

</div>


<?php
if(mysqli_num_rows($result2) > 0){

while($row_2=mysqli_fetch_array($result2)){
$items="SELECT * FROM parts WHERE id='$row_2[part_id]'";
$res_part=mysqli_query($dbc,$items) or die(mysqli_error($dbc));
while($row_part=mysqli_fetch_array($res_part)){
?>

<div class="left product_show" style="width:180px; height:280px;">

<h2><img src="<?php echo $row_part['image'];  ?>" style="width:150px; height:150px;"/></h2>

<p class="p_name"><?php echo $row_part['part_name'];  ?></p>

<p class="man"><span>price : </span><?php echo $row_2['price'];  ?></p>

<p class="man"><span><a href="update_selected_item.php?id=<?php echo $row_2['id'];?>" style="color:red; text-decoration:underline;">Update Price</a></p>

</div><!--/product_show-->


<?php
}
 }
  }
?>

<div class="clear"></div>


</div><!--/container-->


<?php
require_once('includes/footer.php');
?>