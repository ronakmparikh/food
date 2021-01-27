<?php include_once "assets/config.php";
session_start();
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
<body>
	 <?php include"assets/header.php"?>
	<!--Login page-->
	<div style="background:url('image/13.jpg');background-repeat:no-repeat;background-size:cover;margin-top:-30px">
		  <div style="background-color:rgba(0,0,0,.5);position:relative">
	<div class="login-container d-flex align-items-center justify-content-cent" style="margin-top:60px">
		<form class="login-form text-center" action="login.php" method="post">
			<h2 class="mb-5 font-weight-light text-uppercase text-white"> Login Here</h2>
			<div class="form-group">
				<input type="text" class="form-control rounded-pill form-control-lg" placeholder="username" name='email'>
			</div>
			<div class="form-group">
				<input type="password" class="form-control rounded-pill form-control-lg" placeholder="password" name="password">
			</div>

			<div class="forget-link d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input type="checkbox" class="form-check-input " id="remember">
					<label for="remember" class="text-white">Remember password</label>
				</div>
				<a href="#">Forgot Password?</a>
			</div>
			<input type="submit" class="btn btn-success mb-5 btn-block rounded-pill form-control-lg" value="Login" name="login">
			<p class="mt-3 font-weight-normal text-white">Don't have an account?<a href="register_customer_account.php"> &nbsp;Create an account</a></p>
		</form>
	</div>
</div></div>
	<?php include"assets/footer.php"?>
</body>
</html>
<?php
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	$query = mysql_query("select * from customer where c_email ='$email' AND c_pass ='$password'");
	$count = mysql_num_rows($query);

	if($count > 0){
			$_SESSION['customer'] = $email;
			echo"<script>window.open('index.php','_self')</script>";
	}
	else{
		echo "<script>alert('your username and password is wrong')</script>";
	}
}
?>
