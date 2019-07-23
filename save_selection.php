<?php
require_once('includes/config.php');
require_once('includes/db.php');
require_once('includes/functions.php');

$query="SELECT * FROM users_profile WHERE users_id='$_SESSION[logged_id]'";
$result=mysqli_query($dbc,$query)or die(mysqli_error($dbc));
$row=mysqli_fetch_array($result);



$check="SELECT * FROM user_customization WHERE users_id='$_SESSION[logged_id]'";
$resuult_check=mysqli_query($dbc,$check) or die(mysqli_error($dbc));
if(mysqli_num_rows($resuult_check) == 0){

		$date=date('Y-m-d');
		$result=mysql_query("insert into user_customization values('','$date','$_SESSION[logged_id]')");
		$orderid=mysql_insert_id();
}

else{

$check="SELECT * FROM user_customization WHERE users_id='$_SESSION[logged_id]'";
$resuult_check=mysqli_query($dbc,$check) or die(mysqli_error($dbc));
$row_check=mysqli_fetch_array($resuult_check);
$orderid=$row_check['id'];

}		
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			mysql_query("insert into customization_details values ('',$pid,$q,$orderid)");

             }
			 
			        unset($_SESSION['cart']);
			 		die('<div style="display:block;
width:100%;
height:100%;
">
		
		
		<p style="color:black; text-align:center; position: relative; top: 200px; margin-top: 0px;">Your Customization has been Places<br />
		you can now return to your profile In order to view your customization and check prices <br />
		 <a href="user_profile.php" style="color:green;">BACk To your profile</a></p>
		</div>');


?>