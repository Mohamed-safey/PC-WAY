<?php
require_once('includes/header.php');

if(isset($_GET['usage_type'])){

$u_id=$_GET['usage_type'];

$_SESSION['usage']=$u_id;

$query="SELECT * FROM questions WHERE usage_id='$_SESSION[usage]'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

}
?>

<div class="container" style="padding-top:130px;">

<p class="border"></p>

<h1 class="main_title">Smart Custmoziation</h1>

<h3 class="sub_title">Please Continue To Answer The Following</h3>

<p style="margin-bottom:50px;">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. 
Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip. 
Duis Aute Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.
</p>

<div class="question_form">

<form action="result_customize.php" method="post">

<?php
while($row=mysqli_fetch_array($result)){

?>

<h2 style="margin-top:15px; font-weight:bold;">Q - <?php echo $row['question']; ?></h2>



<?php
$query2="SELECT * FROM answers WHERE q_id='$row[id]'";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
while($row_2=mysqli_fetch_array($result2)){
?>

<p><input type="radio" name="<?php echo $row['group']; ?>" value="<?php echo $row_2['determine']; ?>" required /> <?php echo $row_2['answer']; ?></p>

<?php
}
 }
?>
<button name="result" class="btn_big right" value="">Result</button>

</form>

<div class="clear"></div>

</div>

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>