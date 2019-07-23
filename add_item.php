<?php
require_once('includes/header.php');

$query1="SELECT * FROM category";
$result1=mysqli_query($dbc,$query1) or die(mysqli_error($dbc));
?>

<div class="container" style="padding-top:130px;">

<div class="register" style="margin-bottom:40px;">

<p class="border"></p>

<h1 class="main_title">Adding New Items</h1>

<h3 class="sub_title">Please Read The Instructions Carfully</h3>

<p style="margin-bottom:50px;">Thank you for contibuting in our website , in order to maintain stable smart customization Resuults
we take some Concept as a standard that we need you to highy follow it in order we adjust our result process

<ul style="margin-top:-30px; list-style-type:square;">
<li style="font-weight:bold; color:red;"> We have 4 categories to add items to (1-gaming category, 2-student category , 3-Graphic & Multimedia ctegory , 4- Company Category) </li>
<li style="font-weight:bold;color:red;">We Take Gaming category as a mesure for the other categories</li>
<li style="font-weight:bold;color:red;">This Means That when adding an item as medium level item to gaming category , it will be added as high level for student and company</li>
<li style="font-weight:bold;color:red;">and adding an item as low gaming level it will be added as medium level category to student pc and company</li>
<li style="font-weight:bold;color:red;">you can just target items for student and company or to any other category rather than gaming & graphic use</li>
<li style="font-weight:bold;color:red;">Gaming and graphic use categories are equaal and student & company categories are equal</li>
<li style="font-weight:bold;color:red;">You will Be Promoted to select items first and them to you selection if your intended item is not in our category you can add it as a new</li>
</ul>

</p>

</div><!--/register-->

<div class="adding_form">

<form method="post" action="add_1.php" enctype="multipart/form-data">

<label for="select_category">1 - SELECT PART CATEGORY : </label>

<select name="category">

<?php
while($row_1=mysqli_fetch_array($result1)){
?>

<option value="<?php echo $row_1['id']; ?>"><?php echo $row_1['name']; ?></option>

<?php
}
?>

</select><br />

<button class="right btn_big" name="next_1">Next</button>

<div class="clear"></div>

</form>

</div><!--/adding_form-->

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>