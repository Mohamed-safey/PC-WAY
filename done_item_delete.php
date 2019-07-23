<?php
require_once('includes/config.php');

if(isset($_POST['item_update'])){

$id=$_POST['id'];

$query="DELETE FROM parts_dealers WHERE id='$id'" ;
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

header('location:delete_selected_item.php?done=1');

}

?>