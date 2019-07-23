<?php
require_once('includes/config.php');

if(isset($_POST['adding_new'])){

$name=$_POST['product_name'];
$price=$_POST['price'];
$usage=$_POST['usage'];
$level=$_POST['level'];
$man=$_POST['man'];
$pp = $_FILES['image']['name'];
$pp_type = $_FILES['image']['type'];
$pp_size = $_FILES['image']['size'];

if(!empty($name) && !empty($price) && !empty($usage) && !empty($level) && !empty($pp)){

if($_SESSION['cat_id']==1){ // vga

include('includes/appvars_v.php');
$image="images/parts/vga/$pp";


}

if($_SESSION['cat_id']==2){//ram

include('includes/appvars_r.php');
$image="images/parts/ram/$pp";

}

if($_SESSION['cat_id']==3){//cpu

$image="images/parts/processors/$pp";
include('includes/appvars_cp.php');

}

if($_SESSION['cat_id']==4){//psu

include('includes/appvars_ps.php');
$image="images/parts/power-supply/$pp";


}

if($_SESSION['cat_id']==5){//mb

include('includes/appvars_mb.php');
$image="images/parts/mother_board/$pp";

}

if($_SESSION['cat_id']==6){//display

include('includes/appvars_m.php');
$image="images/parts/monitor/$pp";

}

if($_SESSION['cat_id']==7){//hd
include('includes/appvars_h.php');
$image="images/parts/hard_drives/$pp";

}

if($_SESSION['cat_id']==8){//cases
include('includes/appvars_c.php');
$image="images/parts/cases/$pp";

}

$query1="SELECT * FROM parts WHERE part_name ='$name'";
$result1=mysqli_query($dbc,$query1) or die (mysqli_error($dbc));
if(mysqli_num_rows($result1) == 1){

header('location:add_new_item.php?error=1');
die();
}//lw l2et el product da mwgod asln

else{


  if ((($pp_type == 'image/gif') || ($pp_type == 'image/jpeg') || ($pp_type == 'image/pjpeg') || ($pp_type == 'image/png'))
        && ($pp_size > 0) && ($pp_size <= GW_MAXFILESIZE)) {
       
        if ($_FILES['image']['error'] == 0) { 
           $target = GW_UPLOADPATH . $pp;
		   
		    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		  
            $query2="INSERT INTO parts VALUES('','$name','$image','$_SESSION[cat_id]','$man')";
            $result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));

			$query3="SELECT * FROM parts WHERE part_name='$name'";
			$result3=mysqli_query($dbc,$query3) or die(mysqli_error($dbc));
			$row3=mysqli_fetch_array($result3);
			
		    if($usage ==1 && $level== 1 ){

		    $query4="INSERT INTO part_usage VALUES('','$row3[id]','$usage')";
			$result4=mysqli_query($dbc,$query4) or die(mysqli_error($dbc));
			
			$query5="INSERT INTO part_properties VALUES('','$row3[id]','$_SESSION[cat_id]','$level','0')";
			$result5=mysqli_query($dbc,$query5) or die(mysqli_error($dbc));
			
			$query6="INSERT INTO parts_dealers VALUES('','$row3[id]','$_SESSION[cat_id]','$level','0','$man','$_SESSION[logged_d]','$price')";
			$result6=mysqli_query($dbc,$query6) or die(mysqli_error($dbc));

}//tzbet awel case en el category gaming aw graphics we el level high fa hyd5ol mra wa7da bs we hyb2a compatible m3 el high wel gaming wel graphics	

//--------------------------------------------------------------------------------------------------------------------------------------------------------

		    if($usage ==1 && $level== 2 ){

		    $query4="INSERT INTO part_usage VALUES('','$row3[id]','$usage')";
			$result4=mysqli_query($dbc,$query4) or die(mysqli_error($dbc));
			
			$query4_4="INSERT INTO part_usage VALUES('','$row3[id]','2')";
			$result4_4=mysqli_query($dbc,$query4_4) or die(mysqli_error($dbc));
			
			$query5="INSERT INTO part_properties VALUES('','$row3[id]','$_SESSION[cat_id]','$level','1')";
			$result5=mysqli_query($dbc,$query5) or die(mysqli_error($dbc));
			
			$query6="INSERT INTO parts_dealers VALUES('','$row3[id]','$_SESSION[cat_id]','$level','1','$man','$_SESSION[logged_d]','$price')";
			$result6=mysqli_query($dbc,$query6) or die(mysqli_error($dbc));

}//tzbet tany case en el category gaming aw graphics we el level medium fa hyd5ol mrtin fil usage mra lil first we mra lil second we hyd5ol medium lil gaming we el graphic bs high lil student we el company		

//--------------------------------------------------------------------------------------------------------------------------------------------------------

		    if($usage == 1 && $level== 3 ){

		    $query4="INSERT INTO part_usage VALUES('','$row3[id]','$usage')";
			$result4=mysqli_query($dbc,$query4) or die(mysqli_error($dbc));
			
			$query4_4="INSERT INTO part_usage VALUES('','$row3[id]','2')";
			$result4_4=mysqli_query($dbc,$query4_4) or die(mysqli_error($dbc));
			
			$query5="INSERT INTO part_properties VALUES('','$row3[id]','$_SESSION[cat_id]','$level','2')";
			$result5=mysqli_query($dbc,$query5) or die(mysqli_error($dbc));
			
			$query6="INSERT INTO parts_dealers VALUES('','$row3[id]','$_SESSION[cat_id]','$level','2','$man','$_SESSION[logged_d]','$price')";
			$result6=mysqli_query($dbc,$query6) or die(mysqli_error($dbc));

}//tzbet talt case en el category gaming aw graphics we el level low fa hyd5ol mrtin fil usage mra lil first we mra lil second we hyd5ol low lil gaming we el graphic bs medium lil student we el company		

//--------------------------------------------------------------------------------------------------------------------------------------------------------

		    if($usage ==2 && $level== 1 ){

		    $query4="INSERT INTO part_usage VALUES('','$row3[id]','$usage')";
			$result4=mysqli_query($dbc,$query4) or die(mysqli_error($dbc));
			
			$query4_4="INSERT INTO part_usage VALUES('','$row3[id]','1')";
			$result4_4=mysqli_query($dbc,$query4_4) or die(mysqli_error($dbc));
			
			$query5="INSERT INTO part_properties VALUES('','$row3[id]','$_SESSION[cat_id]','2','$level')";
			$result5=mysqli_query($dbc,$query5) or die(mysqli_error($dbc));
			
			$query6="INSERT INTO parts_dealers VALUES('','$row3[id]','$_SESSION[cat_id]','2','$level','$man','$_SESSION[logged_d]','$price')";
			$result6=mysqli_query($dbc,$query6) or die(mysqli_error($dbc));

}//tzbet rab3 case en el category company aw student we el level hight fa hyd5ol mrtin fil usage mra lil first we mra lil second we hyd5ol high lil student we el company bs medium lil gaming we el graphic		

//--------------------------------------------------------------------------------------------------------------------------------------------------------

		    if($usage ==2 && $level== 2 ){

		    $query4="INSERT INTO part_usage VALUES('','$row3[id]','$usage')";
			$result4=mysqli_query($dbc,$query4) or die(mysqli_error($dbc));
			
			$query4_4="INSERT INTO part_usage VALUES('','$row3[id]','1')";
			$result4_4=mysqli_query($dbc,$query4_4) or die(mysqli_error($dbc));
			
			$query5="INSERT INTO part_properties VALUES('','$row3[id]','$_SESSION[cat_id]','3','$level')";
			$result5=mysqli_query($dbc,$query5) or die(mysqli_error($dbc));
			
			$query6="INSERT INTO parts_dealers VALUES('','$row3[id]','$_SESSION[cat_id]','3','$level','$man','$_SESSION[logged_d]','$price')";
			$result6=mysqli_query($dbc,$query6) or die(mysqli_error($dbc));

}//tzbet 5ams case en el category company aw student we el level medium fa hyd5ol mrtin fil usage mra lil first we mra lil second we hyd5ol medium lil student we el company bs low lil gaming we el graphic		

//--------------------------------------------------------------------------------------------------------------------------------------------------------

		    if($usage ==2 && $level== 3 ){

		    $query4="INSERT INTO part_usage VALUES('','$row3[id]','$usage')";
			$result4=mysqli_query($dbc,$query4) or die(mysqli_error($dbc));
						
			$query5="INSERT INTO part_properties VALUES('','$row3[id]','$_SESSION[cat_id]','0','$level')";
			$result5=mysqli_query($dbc,$query5) or die(mysqli_error($dbc));
			
			$query6="INSERT INTO parts_dealers VALUES('','$row3[id]','$_SESSION[cat_id]','0','$level','$man','$_SESSION[logged_d]','$price')";
			$result6=mysqli_query($dbc,$query6) or die(mysqli_error($dbc));

}//tzbet sads case en el category company aw student we el level low fa hyd5ol mra wa7da bs lil compaby wel student we hyd5ol low lil student we el company bs mesh hyd5ol asln lil gaming we el graphic		

//--------------------------------------------------------------------------------------------------------------------------------------------------------

header('location:add_new_item.php?done=1');
		     
}//while moving the image in tmprory directory to target folder

else{

header('location:add_new_item.php?error=4');

}

 }//file ie error-free
  }//checking image file types and sizes

  else{
  
   header('location:add_new_item.php?error=5');      
  }
  
  // Try to delete the temporary image file
      @unlink($_FILES['image']['tmp_name']);




}//lw el product mesh mwgod
 }//if not empty all
  }//if submit is pressed
?>