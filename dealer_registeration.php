<?php
require_once('includes/config.php');
require_once('includes/appvars_d.php');

if(isset($_POST['register'])){

$uname=$_POST['username'];
$pw1=$_POST['password'];
$pw2=$_POST['cpassword'];
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$ll=$_POST['ll'];
$email=$_POST['email'];
$time=$_POST['time'];
$add=$_POST['address'];
$about=$_POST['about'];
$pp = $_FILES['image']['name'];
$pp_type = $_FILES['image']['type'];
$pp_size = $_FILES['image']['size'];

if(!empty($uname) && !empty($pw1) && !empty($pw2) && !empty($pp)){

if($pw1==$pw2){

$query1="SELECT * FROM dealers WHERE user_name='$uname'";
$result1=mysqli_query($dbc,$query1)or die(mysqli_error($dbc));
if(mysqli_num_rows($result1)==1){
header('location:dealer_register.php?error=1');
}

else{

$query2="INSERT INTO dealers VALUES ('','$uname',SHA('$pw1'))";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));

$query3="SELECT * FROM dealers WHERE user_name='$uname'";
$result3=mysqli_query($dbc,$query3)or die(mysqli_error($dbc));
$row=mysqli_fetch_array($result3);

  if ((($pp_type == 'image/gif') || ($pp_type == 'image/jpeg') || ($pp_type == 'image/pjpeg') || ($pp_type == 'image/png'))
        && ($pp_size > 0) && ($pp_size <= GW_MAXFILESIZE)) {
       
        if ($_FILES['image']['error'] == 0) { 
           $target = GW_UPLOADPATH . $pp;
		   
		    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		  
            $query4="INSERT INTO dealers_profile VALUES('','$name','$email','images/dealers/$pp','$add','$mobile','$ll','$time','$about','$row[id]')";
            $result4=mysqli_query($dbc,$query4) or die(mysqli_error($dbc));

             header('location:dealer_login.php?done=1');

		     
}//while moving the image in tmprory directory to target folder

else{

header('location:dealer_register.php?error=4');

}

 }//file ie error-free
  }//checking image file types and sizes

  else{
  
   header('location:dealer_register.php?error=5');      
  }
  
  // Try to delete the temporary image file
      @unlink($_FILES['image']['tmp_name']);


}


}//both password and confirm shabh b3d

else{

header('location:dealer_register.php?error=2');

}

 }//if not empty all fields ya gd3an

}
?>