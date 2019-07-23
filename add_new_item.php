<?php
require_once('includes/header.php');

$msg="";

if(isset($_GET['done'])){

if($_GET['done']==1){

$msg="<p class='succ'>Item Has Been Added Successfully</p>";

}
 }
if(isset($_GET['error'])){

if($_GET['error']==1){

$msg="<p class='error'>Item Already Exist</p>";

}

if($_GET['error']==1){

$msg="<p class='error'>Item Already Exist</p>";

}

if($_GET['error']==4){
$msg='<p class="error">Sorry, there was a problem uploading your image.</p>';
}

if($_GET['error']==5){
$msg='<p class="error">The Picture must be a GIF, JPEG, or PNG image file no greater than ' . (GW_MAXFILESIZE / 1024) . ' KB in size.</p>';
 }
if($_GET['error']==6){
$msg='<p class="error">All Required Fields Must Have Values</p>';
 }  

} 
?>

<div class="container" style="padding-top:130px;">

<div class="register" style="margin-bottom:40px;">

<p class="border"></p>

<h1 class="main_title">Adding New Items</h1>

<h3 class="sub_title">Please Insert Product Data</h3>

<p style="margin-bottom:50px;">Thank you for contibuting in our website , in order to maintain stable smart customization Resuults
we take some Concept as a standard that we need you to highy follow it in order we adjust our result process</p>

</div>

<div class="adding_form">

<form method="post" action="done_adding_new.php" enctype="multipart/form-data">

<h2 style="text-align:center; font-weight:bold; font-size:18px;"><?php echo $msg; ?></h2>

<h2 class="h2"> Insert Product Name :</h2>
<input type="text" name="product_name" placeholder="Your Product name" class="input" required /><br />

<h2 class="h2">Product Image</h2>

    <div class="pp">
<div class="fileinputs">
        <input type="file" class="file" id="image_file" name="image" required />
         <input disabled="true" type="button" value="Upload image" class="btn" />
        <div class="fakefile">
            <input type="button" style="margin-left:0px; margin-top:-5px; "  />
        </div>

		<div class="clear"></div>
		
<b id="Select_file" style="text-align:center; position:relative; top:10px;"></b>		
    </div>
	
</div><!--/pp-->	
	<script>
$('.file').click(function() {
    $('#image_file').show();
    $('.btn').prop('disabled', false);
    $('#image_file').change(function() {
        var filename = $('#image_file').val();
        $('#Select_file').html(filename);
    });
});

</script>

<h2 class="h2" style="margin-top:35px;">your Price</h2>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
        return false;
    return true;
}
</script>
<input type="text" name="price" placeholder="Your Price" class="input" onkeypress="return isNumberKey(event)" required /><br />

<label for="man">manefacturer :</label><br />

<select name="man" style="margin-left:0px; margin-top:15px; margin-bottom: 20px;" required>

<?php
$query="SELECT * FROM manfecturer";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
while($row=mysqli_fetch_array($result)){
?>

<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?> </option>

<?php
}
?>

</select><br />

<label for="usage" style="margin-top:20px;">Usage :</label><br />

<select name="usage" style="margin-left:0px; margin-top:15px; margin-bottom:15px;" required>

<option value="1">Gaming & Graphics </option>
<option value="2">Student & Company </option>

</select><br />

<label for="level">Part Rating :</label><br />

<select name="level" style="margin-left:0px; margin-top:15px;" required>

<option value="1">High-End</option>
<option value="2">Medium-End</option>
<option value="3">Low - End</option>

</select>

<button class="right btn_big" name="adding_new">Done</button>

<div class="clear"></div>

</form>

</div><!--/adding_form-->

</div>

<?php
require_once('includes/footer.php');
?>