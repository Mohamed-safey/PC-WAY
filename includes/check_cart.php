<?php

	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		
		$query="SELECT * FROM user_customization WHERE users_id='$_SESSION[logged_id]'";
        $result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
        $row_cu=mysqli_fetch_array($result);
		
		$query_2="SELECT * FROM customization_details WHERE u_c_id='$row_cu[id]'AND part_id='$pid'";
		$result_2=mysqli_query($dbc,$query_2) or die(mysqli_error($dbc));
		if(mysqli_num_rows($result_2)==0){
		
		addtocart($pid,1);
		header("location:customization-box.php");
		exit();
	}
	
	else{
	
     die('<div style="display:block;
width:100%;
height:100%;
">
		
		
		<p style="color:black; text-align:center; position: relative; top: 200px; margin-top: 0px;">This Part Was Already Added to your Custoizaiation previously<br />
		Please Go Back To Tour Profile And review Your Customizations Box<br />
		 <a href="user_profile.php" style="color:green;">BACk To your profile</a></p>
		</div>');
	
	}
	 }
?>	