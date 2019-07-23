<?php
require_once('includes/config.php');

if(isset($_POST['item_update'])){

$price=$_POST['price'];
$id=$_POST['id'];

$query="UPDATE parts_dealers SET price='$price' WHERE id='$id'" ;
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

header('location:update_selected_item.php?done=1');

}

?>