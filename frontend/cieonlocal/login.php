<?php session_start(); ?>
<?php include('class_conn.php'); ?>
<?php $cls_conn = new class_conn();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="
    image/png" href="template_login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="template_login/css/main.css">
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="template_login/css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
	<!--===============================================================================================-->
	<style>
		body {
			background-color: white;
		}
	</style>
</head>

<body>

	<?php if ($_GET['Forget'] == '1') { ?>
		<div class="limiter">
			<div class="container row">
				<a class="btn btn-primary display-4" href="login.php">Back</a>
			</div>
		</div>
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-26">
					</span>
					<span class="login100-form-title p-b-48">
						<img src="upload/cie icon.jpg" width="110 px" height="110 px" /><br><br>
						Forget Password

					</span>


					<div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
						<input class="input100" type="text" name="email" placeholder=" Email">
						<span class="focus-input100"></span>
					</div>


					<!-- <div class="wrap-input100 validate-input" data-validate = "Enter Number">
						<input class="input100" type="text" name="no"placeholder=" Number">
						<span class="focus-input100" ></span>
					</div>  -->



					<!-- <div align="right" style="margin-top: 0px ;" >	
								Register
					</div> -->
					<!-- <br> -->

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Forget Password
							</button>
						</div>
					</div>



				</form>
				<?php
				if (isset($_POST['submit'])) {
					$email = $_POST['email'];
					// $password=$_POST['password'];


					$sql = " select * from tb_user";
					$sql .= " where";
					$sql .= " user_email='$email'";
					$re = $cls_conn->select_base($sql);
					while ($row = mysqli_fetch_array($re)) {
						$user_email = $row['user_email'];
						$user_password = $row['user_password'];
						$user_id = $row['user_id'];
						$user_firstname = $row['user_firstname'];
					}
					if ($user_id >= 1) {

						// // $rndno = rand(100000, 999999); //OTP generate
						// $message = urlencode("Forget Password.".$user_password);
						// $to = $user_email;
						// $subject = "OTP";
						// $txt = "OTP: " . $rndno . "\n" . "ชื่อ: " . $name . "";
						// $headers = "From: krimbar3615336153@gmail.com" . "\r\n" .
						// 	"CC: divyasundarsahu@gmail.com";
						// mail($to, $subject, $txt, $headers);
						function generate_password($length = 16)
						{
							$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' .
								'0123456789';

							$str = '';
							$max = strlen($chars) - 1;

							for ($i = 0; $i < $length; $i++)
								$str .= $chars[random_int(0, $max)];

							return $str;
						}
						$salt = generate_password();
						$password = hash('sha256', $salt);
						$sql = "INSERT INTO `tb_forget_password_token` (`id`, `email`, `token`, `used`) VALUES (NULL, '" . $user_email . "', '" . $password . "', '0');";
						$cls_conn->write_base($sql) == true;
						$message = urlencode("Forget Password." . $user_password);
						$to = $user_email;
						$subject = "Forget Password";
						$txt = "Name:" . $user_firstname . "\n Your reset password link is http://www.cieinventory.ga/frontend/cieonlocal/forgotpassword.php?token=" . $password . "\n Please using this password to login the system ";
						$headers = "From: cieonkmitl@gmail.com" . "\r\n" .
							"CC: divyasundarsahu@gmail.com";
						mail($to, $subject, $txt, $headers);

						echo $cls_conn->goto_page(1, 'login.php');
						echo $cls_conn->show_message('Your password has sent via your email');
					} else {
						echo $cls_conn->show_message('Your password has sent via your email');
					}
				}

				?>
			</div>
		</div>
		</div>
	<?php } else { ?>
		<div class="limiter">
			<div class="container row">
				<a class="btn btn-primary display-4" href="index.php">Back</a>
			</div>
		</div>
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-26">
					</span>
					<span class="login100-form-title p-b-48">
						<img src="upload/cie icon.jpg" width="110 px" height="110 px" /><br><br>
						CIEON INVENTORY
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
						<input class="input100" type="text" name="email" placeholder=" Email">
						<span class="focus-input100"></span>
					</div>


					<!-- <div class="wrap-input100 validate-input" data-validate = "Enter Number">
						<input class="input100" type="text" name="no"placeholder=" Number">
						<span class="focus-input100" ></span>
					</div>  -->
					<div align="right">
						<div class="wrap-input100 " data-validate="Enter password">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
							<input class="input100" type="password" name="password" placeholder=" Password">
							<span class="focus-input100"></span>


						</div>
						<span><a href="login.php?Forget=1">Forget password</a></span>
					</div>
					<!-- <div align="right" style="margin-top: 0px ;" >	
								Register
					</div> -->
					<!-- <br> -->


					<!-- <div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<a class="login100-form-btn" name="submit" href="register.php">
									Register
								</a>
							</div>
						</div> -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Login
							</button>
						</div>
					</div>



				</form>
				<?php
				if (isset($_POST['submit'])) {
					$email = $_POST['email'];
					$password = $_POST['password'];


					$sql = " select salt from tb_user";
					$sql .= " where";
					$sql .= " user_email='$email'";
					$result = mysqli_fetch_assoc($cls_conn->select_base($sql));
					$password = hash('sha256', $password . $result['salt']);
					$sql = "SELECT * FROM tb_user WHERE user_email = '" . $email . "' AND user_password = '" . $password . "'";





					$num = $cls_conn->select_numrows($sql);
					if ($num >= 1) {
						$result = $cls_conn->select_base($sql);
						while ($row = mysqli_fetch_array($result)) {
							$user_id = $row['user_id'];
							$user_position = $row['user_position'];
						}

						// echo $_SESSION['user_id'];
						if ($user_position == 0) {
							$_SESSION['admin'] = $user_position;
							echo $cls_conn->show_message('Login Success');
							echo $cls_conn->goto_page(1, '../admin/admincontrollocker.php');
						} elseif ($user_position == 1) {
							$_SESSION['teacher'] = $user_position;
							$_SESSION['user_id'] = $user_id;
							echo $cls_conn->show_message('Login Success');
							echo $cls_conn->goto_page(1, 'index.php');
						} elseif ($user_position == 2) {
							$_SESSION['student'] = $user_position;
							$_SESSION['user_id'] = $user_id;
							echo $cls_conn->show_message('Login Success');
							echo $cls_conn->goto_page(1, 'index.php');
							// echo $sql;
						}
					} else {
						echo $cls_conn->show_message('Username or password is incorrect. If you forgot your password, please use the ‘forget password’ button.');
						// echo $sql;
						// echo $sql2;
					}
				}










				?>
			</div>
		</div>
		</div>
	<?php } ?>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="template_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="template_login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="template_login/vendor/bootstrap/js/popper.js"></script>
	<script src="template_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="template_login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="template_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="template_login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="template_login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="template_login/js/main.js"></script>

</body>

</html>