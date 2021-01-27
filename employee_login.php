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
<body class="bg-dark">
	 <?php include"assets/header.php"?>
	<!--Login page-->
	<div class="login-container d-flex align-items-center justify-content-cent" style="margin-top:60px">
		<form class="login-form text-center" action="employee_login.php" method="post">
			<h2 class="mb-5 font-weight-light text-uppercase text-white">Employee Login Here</h2>
			<div class="form-group">
				<input type="text" class="form-control rounded-pill form-control-lg" placeholder="username" name='emp_email'>
			</div>
			<div class="form-group">
				<input type="password" class="form-control rounded-pill form-control-lg" placeholder="password" name="emp_pass">
			</div>

			<div class="forget-link d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="remember">
					<label for="remember">Remember password</label>
				</div>
				<a href="#">Forgot Password?</a>
			</div>
			<input type="submit" class="btn btn-success mb-5 btn-block rounded-pill form-control-lg" value="Login" name="emp_login">
			<p class="mt-3 font-weight-normal">Don't have an account?<a href="signup_way.php"> &nbsp;Create an account</a></p>
		</form>
	</div>
	<?php include"assets/footer.php"?>
</body>
</html>
<?php
if(isset($_POST['emp_login'])){
	$emp_email = $_POST['emp_email'];
	$emp_password = sha1($_POST['emp_pass']);

	$query = mysql_query("select * from employee where emp_email ='$emp_email' AND emp_pass ='$emp_password'");
	$count = mysql_num_rows($query);

	if($count > 0){
			$_SESSION['employee'] = $emp_email;
			echo"<script>window.open('index.php','_self')</script>";
	}
	else{
		echo "<script>alert('your user name or password is not matched')</script>";
	}
}
?>
