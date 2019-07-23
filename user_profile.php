<?php
require_once('includes/header.php');
$msg="";
$output_form=false;
$query="SELECT * FROM users_profile WHERE users_id='$_SESSION[logged_id]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
$row=mysqli_fetch_array($result);

$query8="SELECT * FROM user_customization WHERE users_id='$_SESSION[logged_id]'";
$result8=mysqli_query($dbc,$query8) or die(mysqli_error($dbc));
if(mysqli_num_rows($result8) > 0){
$row_8=mysqli_fetch_array($result8);
$output_form=true;
$_SESSION['cust_id']=$row_8['id'];

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
<div class="pict"><img src="images/user_img.png" style="width:100%;height:100%;"/></div>
<div class="menu_profile" style="margin-top:35px;">
	<ul class="menu_profile_item">
		<li><a href="user_profile.php"><span><img src="images/profile.png"/></span><span class="menu_item">My Profile</span></a></li>
		<li><a href="update_profile.php"><span><img src="images/UPDATE.png"/></span><span class="menu_item">Update Profile</span></a></li>
		<?php
		if($output_form){
		?>
		<li><a href="delete_customization.php?cus_id=<?php echo $_SESSION['cust_id']; ?>"><span><img src="images/UPDATE.png"/></span><span class="menu_item">Delete Customization</span></a></li>
		<li><a href="Best-total.php"><span><img src="images/UPDATE.png"/></span><span class="menu_item">One Dealer's Price For All </span></a></li>
		<?php
		}
		?>
		<li><a href="Get_Help_Custmozing.php"><span><img src="images/profile.png"/></span><span class="menu_item">Smart PC Customization</span></a></li>
		<li><a href="logout.php"><span><img src="images/logout.png"/></span><span class="menu_item">Logout</span></a></li>
	
	</ul>
	
	
	
</div>


</div><!--/view_column-->

<div class="left wide_column">
<div class="main_info">
	<h1 class="main_title" style="font-size:30px"><?php echo $row['name']; ?></h1>
	<p>Lives in <img src="images/live-in.png" /><span><?php echo $row['address'];?></span> Age range <img src="images/bday.png" />
                                    <span> <?php echo $row['age']; ?></span> Landline <img src="images/hone.png" /> <span> <?php echo $row['land_line']; ?></span>
									contact no. <img src="images/hone.png" /> <span><?php echo $row['mobile']; ?></span> <br />
									About me <img src="images/about.png" /> <span><?php echo $row['about']; ?></span></p>	
								
</div>

<div class="customization">

<h1 class="main_title" style="font-size:25px">My Customizations : </h2>

<?php

$query2="SELECT * FROM user_customization WHERE users_id='$_SESSION[logged_id]'";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
if(mysqli_num_rows($result2) == 0){

?>
<h3 style="text-align:center;"><?php echo $msg; ?></h3>	

<h3 style="font-size:18px; text-align:center; font-weight:bold;margin-top:45px;">Your Customization Box Is Empty</h3>

<?php
}else{
$output_form=true;

?>


<div class="user_selections">

<table>

<tr>
<td class="cell_def">item View</td>
<td class="cell_def">Item  Name </td>
<td class="cell_def">Quantity</td>
<td class="cell_def">Item Price</td>
<td class="cell_def">Supoorted Dealer</td>
</tr>

<?php

while($row_selection=mysqli_fetch_array($result2)){

$query3="SELECT * FROM customization_details WHERE u_c_id='$row_selection[id]'";
$result3=mysqli_query($dbc,$query3) or die(mysqli_error($dbc));
while($row_details=mysqli_fetch_array($result3)){

$query4="SELECT * FROM parts WHERE id='$row_details[part_id]'";
$result4=mysqli_query($dbc,$query4) or die(mysqli_error($dbc));
while($row_parts=mysqli_fetch_array($result4)){

?>

<tr>

<td><img src="<?php echo $row_parts['image']; ?>" /></td>
<td><?php echo $row_parts['part_name']; ?></td>
<td><?php echo $row_details['quantity']; ?></td>
<td><a href="view_prices.php?p_id=<?php echo $row_parts['id']; ?>">View Dealers prices</a></td>
<td><a href="view_item_dealer.php?p_id=<?php echo $row_parts['id']; ?>"">View Supported Dealers</a></td>

</tr>

<?php
}
 }
  }
?>

</table>

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