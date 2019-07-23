<?php
require_once('includes/header.php');

if(isset($_GET['d_id'])){

$d_id=$_GET['d_id'];

$query2="SELECT * FROM parts_dealers WHERE dealer_id='$d_id' ";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));

}
?>

<div class="container" style="padding-top:130px;">

<div class="register">

<p class="border"></p>

<h1 class="main_title">Your Items</h1>

<h3 class="sub_title">Shoing All Your Added Items</h3>

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

<div class="left product_show" style="width:180px; height:240px;">

<h2><img src="<?php echo $row_part['image'];  ?>" style="width:150px; height:150px;"/></h2>

<p class="p_name"><?php echo $row_part['part_name'];  ?></p>

<p class="man"><span>price : </span><?php echo $row_2['price'];  ?></p>

</div><!--/product_show-->


<?php
}
 }
  }
?>

<div class="clear"></div>
</div>

<?php
require_once('includes/footer.php');
?>