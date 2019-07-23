<?php
require_once('includes/header.php');
?>

<div class="container" style="padding-top:130px;">

<p class="border"></p>

<h1 class="main_title">Smart Custmoziation</h1>

<h3 class="sub_title">Please Answer The Following In order To get your right needs</h3>

<p style="margin-bottom:50px;">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. 
Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip. 
Duis Aute Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.
</p>


<div class="question_form">

<form action="get_questions.php" method="get">

<h2>Q1 - Describe How you Would Use Your PC ?</h2>

<?php 
$query="SELECT * FROM usagee";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
while($row=mysqli_fetch_array($result)){
?>

<p><input type="radio" name="usage_type" value="<?php echo $row['id']; ?>" required /> <?php echo $row['name']; ?></p>

<?php
}
?>

<button name="submit_1" class="btn_big right" value="submit_1">Next</button>

</form>

<div class="clear"></div>

</div><!--/question_form-->

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>