<?php
require_once('includes/header.php');
$msg="";
$output_form=false;
$query="SELECT * FROM dealers_profile WHERE dealers_id='$_SESSION[logged_d]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
$row=mysqli_fetch_array($result);

$query8="SELECT * FROM parts_dealers WHERE dealer_id='$_SESSION[logged_d]'";
$result8=mysqli_query($dbc,$query8) or die(mysqli_error($dbc));
if(mysqli_num_rows($result8) > 0){
$row_8=mysqli_fetch_array($result8);
$output_form=true;


}

if(isset($_GET['done'])){

if($_GET['done']==4){


$msg='<p class="succ">Customization has been Deleted successfully</p>';

}

}
?>

<div class="container" style="padding-top:130px;">

<div class="profile">

<div class="left view_column">
<div class="pict"><img src="<?php echo $row['logo']; ?>" style="width:100%;height:100%;"/></div>
<div class="menu_profile" style="margin-top:35px;">
	<ul class="menu_profile_item">
		<li><a href="user_profile.php"><span><img src="images/profile.png"/></span><span class="menu_item">My Profile</span></a></li>
		<li><a href="update_profile_d.php"><span><img src="images/UPDATE.png"/></span><span class="menu_item">Update Profile</span></a></li>
		<?php
		if($output_form){
		?>
		<li><a href="update_dealer_price.php"><span><img src="images/UPDATE.png"/></span><span class="menu_item"> Update Items Price </span></a></li>
		<li><a href="delete_items.php"><span><img src="images/UPDATE.png"/></span><span class="menu_item"> Delete Items </span></a></li>
		<?php
		}
		?>
		<li><a href="add_item.php"><span><img src="images/UPDATE.png"/></span><span class="menu_item">Add New Item</span></a></li>
         
		<li><a href="logout_d.php"><span><img src="images/logout.png"/></span><span class="menu_item">Logout</span></a></li>
	
	</ul>
	
	
	
</div>


</div><!--/view_column-->

<div class="left wide_column">
<div class="main_info">
	<h1 class="main_title" style="font-size:30px"><?php echo $row['name']; ?></h1>
	<p>Location <img src="images/live-in.png" /><span> <?php echo $row['address'];?></span> Opening - Time <img src="images/bday.png" />
                                    <span> <?php echo $row['time']; ?></span> land Line <img src="images/hone.png" /> <span> <?php echo $row['land_line']; ?></span>
									contact no. <img src="images/hone.png" /> <span><?php echo $row['mobile']; ?></span>&nbsp; 
									Description <img src="images/about.png" /> <span><?php echo $row['about']; ?></span></p>	
								
</div>

<div class="customization">

<h1 class="main_title" style="font-size:25px">My Items : </h2>

<?php

$query2="SELECT * FROM parts_dealers WHERE dealer_id='$_SESSION[logged_d]' LIMIT 8";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
if(mysqli_num_rows($result2) == 0){

?>
<h3 style="text-align:center;"><?php echo $msg; ?></h3>	

<h3 style="font-size:18px; text-align:center; font-weight:bold;margin-top:45px;">You Don't Have Any Items Yet</h3>

<?php
}else{
$output_form=true;

?>


<div class="user_selections">

<?php
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
?>

<div class="clear"></div>

<h2 style="text-align:center; font-size:18px; font-weight:bold;"><a href="view_dealer_items.php?d_id=<?php echo $_SESSION['logged_d'] ?>" style="color:#000;text-decoration:underline;">View All Your Items</a></h2>

</div><!--/user_selections-->


<?php
}
?>
</div>

</div><!--/wide_column-->

<div class="clear"></div>

</div><!--/profile-->

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>