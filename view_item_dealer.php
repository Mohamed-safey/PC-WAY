<?php
require_once('includes/header.php');

if(isset($_GET['p_id'])){

$p_id=$_GET['p_id'];

$query_1="SELECT * FROM parts WHERE id='$p_id'";
$result_1=mysqli_query($dbc,$query_1) or die(mysqli_error($dbc));
$row_1=mysqli_fetch_array($result_1);

$query="SELECT * FROM parts_dealers WHERE part_id='$p_id'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

}
?>



<div class="container" style="padding-top:130px;">

<p class="border"></p>

<h1 class="main_title">Dealer's Prices</h1>

<h3 class="sub_title">Showing All Dealer's Seeling This Item</h3>

<p style="margin-bottom:50px;">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. 
Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip. 
Duis Aute Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.
</p>

<div class="dealers_container">

<h4 class="cat_name" style="margin-top:-23px;"><span><i class="fa fa-arrow-right"></i></span> Dealer's Are Sorted Accrding To The Best Price ( lowest Price ) >>></h4>

<div id="just_select">

<?php
while($row=mysqli_fetch_array($result)){

$query2="SELECT * FROM dealers_profile WHERE dealers_id='$row[dealer_id]'";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));

while($row_d=mysqli_fetch_array($result2)){

?>

<div class="left dealer_view">

<h4><img src="<?php echo $row_d['logo']; ?>" /></h4>

<ul>

<li><span><img src="images/icon1.png"/></span><?php echo $row_d['address']; ?></li>
<li><span><img src="images/icon3.png"/></span><?php echo $row_d['mobile']; ?></li>
<li><span><img src="images/icon3.png"/></span><?php echo $row_d['land_line']; ?></li>
<li><span><img src="images/icon1.png"/></span><?php echo $row_d['time']; ?></li>

</ul>

<h2><?php echo $row_1['part_name']; ?> : L.E <?php echo $row['price'];  ?></h2>

</div><!--/dealer_view-->

<?php
}
 }
 ?>

<div class="clear"></div>

</div><!--/just_select-->

</div><!--/dealers_container-->

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>