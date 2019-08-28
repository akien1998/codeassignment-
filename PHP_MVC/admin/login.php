<?php 
$filepata = realpath(dirname(__FILE__));
include($filepata.'/../classes/adminLogin.php');
 ?>
 <?php 
 $class = new adminLogin(); // goi class
if ($_SERVER['REQUEST_METHOD'] =='POST') {
	$adminUser = $_POST['adminUser']; 
	$adminPass = md5($_POST['adminPass']);
	$login_check = $class->login_admin($adminUser,$adminPass);
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="imagesL/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorL/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fontsL/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fontsL/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorL/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendorL/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorL/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorL/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendorL/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cssL/util.css">
	<link rel="stylesheet" type="text/css" href="cssL/main.css">
<!--===============================================================================================-->

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="login.php" method="POST">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span>
						<?php 
						if (isset($login_check)) {
							echo $login_check;
							echo $adminUser;
							echo $adminPass;
						}
						 ?>
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="adminUser">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="adminPass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="#">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendorL/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorL/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorL/bootstrap/js/popper.js"></script>
	<script src="vendorL/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorL/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorL/daterangepicker/moment.min.js"></script>
	<script src="vendorL/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendorL/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="jsL/main.js"></script>

</body>
</html>