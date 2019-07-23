<?php
require_once('includes/header.php');
	if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
	
	if($_REQUEST['command']=='save'){
	
	header('location:save_selection.php');
	
	}
?>

<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your Customization, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
	
	function save_cart(){
		document.form1.command.value='save';
		document.form1.submit();
	}
	

</script>

<div class="container" style="padding-top:130px;">

<p class="border"></p>

<h1 class="main_title">Pc - Customization</h1>

<h3 class="sub_title">Add Item to your custmization Box Then save them to your profile</h3>

<p style="margin-bottom:50px;">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. 
Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip. 
Duis Aute Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.
</p>

<div id="cart" class="left" >
<h1>Your Customization Box</h1>
<form name="form1" >
<input type="hidden" name="pid" />
<input type="hidden" name="command" />
<?php
if(is_array($_SESSION['cart']) && !empty($_SESSION['cart'])){
			echo"
			<table class='kies_el_bda3a' >
			<tr >
             <td class='cell-def' >Item View</td>
             <td class='cell-def' >Item Name</td>
             <td class='cell-def' style='text-align:center;'>Remove</td>
            </tr>";
			
				$max=count($_SESSION['cart']);
				
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					
					$pname=get_product_name($pid);
					$pimg=get_product_image($pid);
					if($q==0) continue;
			?>
            		<tr style="border-top:2px solid #d9dbd6; width:100%;margin-bottom:10px;">
					<td ><img src="<?php echo $pimg?>" width="108px" height="108px" /></td>
					<td ><p style="text-align:center;" ><a href="pc-parts.php" class="p-name"><?php echo $pname?></a></p></td>                 
                    <td style="text-align:center;"><p><a href="javascript:del(<?php echo $pid?>)"><img src="images/close.png" name="delete" /></a></p></td>
					</tr>
            <?php					
				}
				
			?>
			     
				
			<?php
            }
			else{
				echo "<h4 style='text-align:center; font-size:17px; margin-top:20px; color:#000;'>There are no items in your Basket !!<h4>";
			}



?>



</table>

<div class="estimated-deleviry">



</div><!--/estimated-deleviry-->

 </div><!--/cart-->	
 
 <div class="right options" style="width:20%;">
 
<div class="cart-summary">

<h1>Your Choicees :</h1>
<?php
if(is_array($_SESSION['cart']) && !empty($_SESSION['cart'])){
?>
<p>1 - <a href="#" onclick="clear_cart()" style="color:#000; text-decoration:underline;">Clear Cart</a></p>
<?php
}else{
?>
<p>1 - <a href="user_profile.php" style="color:#000; text-decoration:underline;">My Profile</a></p>
<?php
}
?>

<p>2 - <a href="pc-parts.php" style="color:#000; text-decoration:underline;">Back To Hardware Page</a></span></p>
<hr />
<h3>saving your selection let you view & compare dealers price</h3>
 
</div><!--/cart-summary-->

<div class="check-out" style="margin-top:55px;">

<?php
if(is_array($_SESSION['cart']) && !empty($_SESSION['cart'])){
?>

<p style="text-align:center;"><button class="btn_big" onclick="save_cart(<?php echo $pid?>)" name="save" style="padding:10px 30px; margin-left:30px;cursor:pointer;">Save My selection</button></p>

<?php
}
?>

</form>

</div><!--/checkout-->

 
 </div><!--/right_options-->

 <div class="clear"></div>
 
</div><!--/container-->


<?php
require_once('includes/footer.php');
?>