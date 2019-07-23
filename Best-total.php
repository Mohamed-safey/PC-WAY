<?php
require_once('includes/header.php');

$query="SELECT * FROM user_customization WHERE users_id='$_SESSION[logged_id]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));


?>

<div class="container" style="padding-top:130px;">

<p class="border"></p>

<h1 class="main_title">Best Dealer's Price For Total Customization</h1>

<h3 class="sub_title">Getting you The Best Total Order of your Customization</h3>

<p style="margin-bottom:50px;">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. 
Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip. 
Duis Aute Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.
</p>

<div class="dealers_container">

<h4 class="cat_name" style="margin-top:-23px;"><span><i class="fa fa-arrow-right"></i></span>Best Dealer's Total Order  >>></h4>


<div id="just_select">

<?php
while($row=mysqli_fetch_array($result)){

$query_14="SELECT COUNT(part_id) AS count, part_id FROM customization_details WHERE u_c_id='$row[id]'";
$result_14=mysqli_query($dbc,$query_14) or die(mysqli_error($dbc));
$row_14=mysqli_fetch_array($result_14);
$count_total=$row_14['count'];


$query2="SELECT * FROM customization_details WHERE u_c_id='$row[id]'LIMIT 1";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));


while($row_c=mysqli_fetch_array($result2)){

$query10="SELECT * FROM parts WHERE id='$row_c[part_id]'";
$result10=mysqli_query($dbc,$query10) or die(mysqli_error($dbc));
while($row_10=mysqli_fetch_array($result10)){


$query5="SELECT * FROM parts_dealers WHERE part_id='$row_10[id]' ORDER BY Price ASC";
$result5=mysqli_query($dbc,$query5) or die(mysqli_error($dbc));
while($row_5=mysqli_fetch_array($result5)){

$query8="SELECT * FROM dealers_profile WHERE dealers_id='$row_5[dealer_id]'";
$result8=mysqli_query($dbc,$query8) or die(mysqli_error($dbc));

while($row_d=mysqli_fetch_array($result8)){

$query18="SELECT COUNT(part_id) AS count_part FROM parts_dealers WHERE dealer_id='$row_d[dealers_id]' ORDER BY Price ASC LIMIT 1";
$result18=mysqli_query($dbc,$query18) or die(mysqli_error($dbc));
$row_18=mysqli_fetch_array($result18);
$count_part=$row_18['count_part'];


if($count_part >= $count_total){

$query3="SELECT SUM(price) AS price_total ,dealer_id  FROM parts_dealers WHERE dealer_id='$row_d[dealers_id]' ORDER BY price ASC";
$resul3=mysqli_query($dbc,$query3) or die (mysqli_error($dbc));
while($row_3=mysqli_fetch_array($resul3)){
$total_order=$row_3['price_total'];





?>

<div class="left dealer_view">
<h4><img src="<?php echo $row_d['logo']; ?>" /></h4>


<ul>

<li><span><img src="images/icon1.png"/></span><?php echo $row_d['address']; ?></li>
<li><span><img src="images/icon3.png"/></span><?php echo $row_d['mobile']; ?></li>
<li><span><img src="images/icon3.png"/></span><?php echo $row_d['land_line']; ?></li>
<li><span><img src="images/icon1.png"/></span><?php echo $row_d['time']; ?> <?php echo $min; ?></li>

</ul>


<h2>Total Order <?php echo $row_3['dealer_id']; ?>: L.E <?php echo $total_order;  ?></h2>

</div><!--/dealer_view-->

<?php
}
  } 
}
 }
  }
}
 }
 ?>

<div class="clear"></div>

</div><!--/just_select-->

</div><!--/delars'_container-->

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>