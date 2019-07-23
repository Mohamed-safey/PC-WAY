<?php
require_once('includes/header.php');

$msg="";
$output_form=true;
if(isset($_POST['add_exist'])){

$item=$_POST['item'];

$query="SELECT * FROM parts WHERE id='$item'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

}

if(isset($_GET['done'])){

if($_GET['done']==1){

$msg="<p class='succ'>Price Has Been Added Successfully To Item</p>";
$output_form=false;

}

}
if(isset($_GET['error'])){

if($_GET['error']==1){

$msg="<p class='error'>you Already Added This Item before</p>";
$output_form=false;
}

}

?>

<div class="container" style="padding-top:130px;">

<div class="register" style="margin-bottom:40px;">

<p class="border"></p>

<h1 class="main_title">Adding Exisiting Item To Your Collection</h1>



<h3 class="sub_title">Please Insert Your Price</h3>

<p style="margin-bottom:50px;">Thank you for contibuting in our website , in order to maintain stable smart customization Resuults
we take some Concept as a standard that we need you to highy follow it in order we adjust our result process</p>

</div>

<div class="adding_form">

<form method="post" action="done_adding_existing.php" enctype="multipart/form-data">

<h2 style="text-align:center; font-weight:bold; font-size:17px;">
<?php
echo $msg;
?>
</h2>
<?php
if($output_form){
?>
<h2 class="h2" style="margin-top:35px;">your Price</h2>

<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
        return false;
    return true;
}
</script>

<input type="text" name="price" placeholder="Your Price" class="input" required onkeypress="return isNumberKey(event)"/><br />

<h2 class="h2">Product Name :</h2>

<?php
while($row=mysqli_fetch_array($result)){
?>

<input type="text" name="product_name" value="<?php echo $row['part_name']; ?>" class="input" required disabled /><br />
<input type="hidden" name="p_id" value="<?php echo $row['id']; ?>" />



<h2 class="h2">Product Image</h2>

<img src="<?php echo $row['image']; ?>" style="width:200px; height:200px;" />

 <?php
}
?>
 

<div class="clear"></div>

<button class="right btn_big">Done</button>

<?php
}
?>

<div class="clear"></div>

</form>

</div><!--/adding_form-->

</div>

<?php
require_once('includes/footer.php');
?>