<?php include_once "assets/config.php";
session_start();

if(isset($_SESSION['vendor'])):
  header("location: vendor/index.php");
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <title>FoodStuff | online Dairy products available Here</title>
  <link rel = "icon" href = "image\ico.gif" type = "image/x-icon">
	<link rel="stylesheet" href="bootstrap\bootstrap.min.css">
	<link rel="stylesheet" href="css\body.css">
<link rel="stylesheet" type="text/css" href="css/log_style.css">

</head>
<body class="bg-dark">
	 <?php include"vendor/header.php"?>
	<!--Login page-->
	<div class="login-container d-flex align-items-center justify-content-cent" style="margin-top:60px">
		<form class="login-form text-center" action="vendor_login.php" method="post">
			<h2 class="mb-5 font-weight-light text-uppercase text-white"> Vendor Login Here</h2>
			<div class="form-group">
				<input type="text" class="form-control rounded-pill form-control-lg" placeholder="username" name='v_email'>
			</div>
			<div class="form-group">
				<input type="password" class="form-control rounded-pill form-control-lg" placeholder="password" name="v_pass">
			</div>

			<div class="forget-link d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="remember">
					<label for="remember">Remember password</label>
				</div>
				<a href="#">Forgot Password?</a>
			</div>
			<input type="submit" class="btn btn-success mb-5 btn-block rounded-pill form-control-lg" value="Login" name="v_login">
			<p class="mt-3 font-weight-normal">Don't have an account?<a href="signup_way.php"> &nbsp;Create an account</a></p>
		</form>
	</div>
	<?php include"assets/footer.php"?>
</body>
</html>
<?php
if(isset($_POST['v_login'])){
	$v_email = $_POST['v_email'];
	$v_password = sha1($_POST['v_pass']);

	$query = mysql_query("SELECT * from vendor where v_email='$v_email' AND v_pass='$v_password' AND v_status='Active'");
	$count = mysql_num_rows($query);

	if($count > 0){
			$_SESSION['vendor'] = $v_email;
			echo"<script>window.open('vendor/index.php','_self')</script>";
	}
	else{
		echo "<script>alert('your user name or password is not matched')</script>";
	}
}
?>
