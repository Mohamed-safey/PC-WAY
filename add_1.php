<?php
require_once('includes/config.php');

if(isset($_POST['next_1'])){

$category=$_POST['category'];

header("location:add_item_2.php?cat_id=$category");

}
?>