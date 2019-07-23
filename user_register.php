<?php
require_once('includes/header.php');

if(isset($_GET['done'])){

if($_GET['done']==1){
$msg='<p class="succ">You Have Been Registered Successufully <br /> Redirecting you now to Login Page To Complete your Profile Information</p>';

}

 }
if(isset($_GET['error'])){
if($_GET['error']==1){
$msg='<p class="error">User Name Already Exist please Login with your info Or choose Another Username</p>';
}
if($_GET['error']==2){
$msg='<p class="error">Passwords Dont Match Please Re-check</p>';
 }
if($_GET['error']==3){
$msg='<p class="error">All Field Must Have Values</p>';
 } 
}
?>

<div class="container" style="padding-top:130px;">

<div class="register">

<p class="border"></p>

<h1 class="main_title">Register</h1>

<h3 class="sub_title">Welcome To pc - way Registration page</h3>

<p style="margin-bottom:50px;">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. 
Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip. 
Duis Aute Irure Dolor In Reprehenderit. Lorem Ipsum Dolor Sit Amet Co Tetur Adipisicing Elit.
</p>

<div class="profile_update">

							
							<h2 style="text-align:center;"><?php echo $msg; ?></h2>
							
							 <form action="user_registeration.php" method="post">
	<div class="col-3">
    <label>
      User Name: :
      <input placeholder="please choose a user name" id="phone" name="username" tabindex="3" type="text" value="<?php echo $row['mobile']; ?>" required="required" />
    </label>
  </div>

	<div class="col-3">
    <label>
      Password :
      <input placeholder="Please Choose a password" id="phone" name="password" tabindex="3" type="password" value="<?php echo $row['mobile']; ?>" required="required" />
    </label>
  </div>	

	<div class="col-3">
    <label>
      Confirm Password :
      <input placeholder="Please Confirm your password" id="phone" name="cpassword" tabindex="3" type="password" value="<?php echo $row['mobile']; ?>" required="required" />
    </label>
  </div>	  
							 
  <div class="col-2">
    <label>
      Name :
      <input placeholder="Your Full Name " id="name" name="name" tabindex="1" type="text" value="<?php echo $row['name']; ?>" required="required" />
    </label>
  </div>
  <div class="col-2">
    <label>
      Email :
      <input placeholder="your email address?" id="company" name="email" tabindex="2" type="email" value="<?php echo $row['email']; ?>" required="required" />
    </label>
  </div>
  
  <div class="col-3">
    <label>
      Mobile :
      <input placeholder="Your Mobile Number" id="phone" name="mobile" tabindex="3" type="text" value="<?php echo $row['mobile']; ?>" required pattern="\d{11}" title="11 Digits mobile Number digits only" />
    </label>
  </div>
  <div class="col-3">
  <label>
      Landline :
      <input placeholder="Your landline Number" id="phone" name="ll" tabindex="3" type="text" value="<?php echo $row['mobile']; ?>" required pattern="\d{8}" title="8 Digits landline Number digits only" />
    </label>
  </div>
  <div class="col-3">
    <label style="padding-bottom:12px;">
      Age Range :
      <select tabindex="5" name="age" required="required">
	    <option value="<?php echo $row['age'] ?>" selected> <?php echo $row['age'] ?> </option>
        <option value="0 - 17">0 - 17</option>
        <option value="18 - 25">18 - 25</option>
        <option value="26 - 40" >26 - 40</option>
        <option value="40 +" >40 +</option>
      </select>
    </label>
  </div>
  
 
  <div class="col-2">
    <label>
      About :
      <input placeholder="About you" id="experience" name="about" tabindex="7" value="<?php echo $row['about']; ?>" required="required" />
    </label>
  </div>
  <div class="col-2">
    <label>
      Address :
      <input placeholder="Address" id="company" name="address" tabindex="2" type="text" value="<?php echo $row['address']; ?>" required="required" />
    </label>
  </div>
  
  <div class="col-submit">
    <button class="submitbtn" name="register">Register</button>
  </div>
  
  </form>
  </div>
<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>

</div><!--/profile_update-->

</div><!--/register-->

</div><!--/container-->

<?php
require_once('includes/footer.php');
?>