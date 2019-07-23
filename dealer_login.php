<?php
require_once('includes/header.php');
$msg="";
if(isset($_GET['done'])){
if($_GET['done']==1){
$msg='<p class="succ">You Have Been Registered Successufully <br /> Please use your username and password To login</p>';
}
 }
if(isset($_GET['error'])){
if($_GET['error']==1){
$msg='<p class="error">Both Fields Must Have Values</p>';
}
if($_GET['error']==2){
$msg='<p class="error">Wrong username Or Password Please Re-check</p>';
 }
  }
?>

<div class="container" style="padding-top:130px;">
<p class="border"></p>

<h1 class="main_title">Dealer's Area</h1>

<h3 class="sub_title">Please Insert your login info to access your profile</h3>

<p style="margin-bottom:50px;">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. 
Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip. 
Duis Aute Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.
</p>

<div class="login_holder">

	<section id="content" style="padding-bottom: 90px;">
		<form action="login_d.php" method="post">
			<h1>Dealer Login</h1>
			<?php echo $msg; ?>
			<div>
				<input type="text" placeholder="Username" required="" id="username" name="email" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" name="pass1" />
			</div>
			<div>
				<input type="submit" value="Log in" name="login" />
				<a href="contact.php">Have aproblem?</a>
				<a href="dealer_register.php">Register</a>
			</div>
		</form><!-- form -->
	
	</section><!-- content -->

</div><!--/login_holder-->

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>