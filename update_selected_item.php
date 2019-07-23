<?php
require_once('includes/header.php');

$msg="";

if(isset($_GET['id'])){

$row_id = $_GET['id'];

$query="SELECT * FROM parts_dealers WHERE id='$row_id'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
$row=mysqli_fetch_array($result);

}

if(isset($_GET['done'])){


if($_GET['done']==1){

$msg="<p class='sucss'>Price Updated Successfully</p>";

}

}

?>

<div class="container" style="padding-top:130px;">

<div class="register">

<p class="border"></p>

<h1 class="main_title">Confrim Update</h1>

<h3 class="sub_title">update item Price</h3>

<p style="margin-bottom:50px;">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. 
Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip. 
Duis Aute Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.
</p>

</div>

<div class="update_item" style="margin-bottom:30px;">

<h2 style="text-align:center; color:green" >
<?php
echo $msg;
?>

</h2>

<form method="post" action="done_item_update.php">

<?php
$items="SELECT * FROM parts WHERE id='$row[part_id]'";
$res_part=mysqli_query($dbc,$items) or die(mysqli_error($dbc));
while($row_part=mysqli_fetch_array($res_part)){
?>

<div class="product_show" style="width:400px; height:530px; margin:0 auto;">

<h2><img src="<?php echo $row_part['image'];  ?>" style="width:350px; height:300px;"/></h2>

<p class="p_name"><?php echo $row_part['part_name'];  ?></p>

<p class="man"><span>price : </span><?php echo $row['price'];  ?></p>

<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
        return false;
    return true;
}
</script>

<p class="man"> New price :   <input type="text" name="price" value="<?php echo $row['price']; ?>" style="width:40%;" onkeypress="return isNumberKey(event)" required /></p>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

<button class="btn_big" style="margin-top:35px;" name="item_update">UPDATE</button>

</div><!--/product_show-->

<?php
}
?>

</form>

</div><!--/update_item-->

</div>

<?php
require_once('includes/footer.php');
?>