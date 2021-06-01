<?php session_start(); ?>
<?php include('class_conn.php'); ?>
<?php $cls_conn = new class_conn();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Forget Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="
    image/png" href="../frontend/cieonlocal/template_login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../frontend/cieonlocal/template_login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../frontend/cieonlocal/template_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../frontend/cieonlocal/template_login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../frontend/cieonlocal/template_login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../frontend/cieonlocal/template_login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../frontend/cieonlocal/template_login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../frontend/cieonlocal/template_login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../frontend/cieonlocal/template_login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../frontend/cieonlocal/template_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../frontend/cieonlocal/template_login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>
<?php
    if(!$_GET['token'])
    {
        $error = 1;
    }

    $sql = " select * from tb_forget_password_token";
    $sql .= " where";
    $sql .= " token='".$_GET['token']."'";
    $result = mysqli_fetch_assoc($cls_conn->select_base($sql));
    if(!$result)
    {
        $error = 1;
    }
    else if($result['used'] == 1)
    {
        $error = 1;
    }
    else $error = 0;

?>

	
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form validate-form" method="POST">
                        <input type="hidden" name="email" value="<?=$result['email'];?>">
                        <input type="hidden" name="token" value="<?=$result['token'];?>">
						<span class="login100-form-title p-b-26">
						</span>
						<span class="login100-form-title p-b-48">
							<img src="upload/cie icon.jpg" width="110 px" height="110 px" /><br><br>
							CIEON INVENTORY
						</span>
                        <?php
                        if($error == 1)
                        {
                            echo ' <div class="alert alert-danger" role="alert">
                                Invalid token. Please contact admin.
                            </div>';
                        }
                        else
                        {   
                           


                            ?>
						<div align="right">
							<div class="wrap-input100 " data-validate="Enter password">
								<span class="btn-show-pass">
									<i class="zmdi zmdi-eye"></i>
								</span>
								<input class="input100" type="password" name="password1" placeholder=" New password">
								<span class="focus-input100"></span>


							</div>
						</div>
                        <div align="right">
							<div class="wrap-input100 " data-validate="Enter password">
								<span class="btn-show-pass">
									<i class="zmdi zmdi-eye"></i>
								</span>
								<input class="input100" type="password" name="password2" placeholder=" Confirm new password">
								<span class="focus-input100"></span>


							</div>
						</div>
                        <div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn" name="submit">
									Update password
								</button>
							</div>
						</div>
                        <?}?>


					</form>
					<?php
					if (isset($_POST['submit'])) {
                        //UPDATE `tb_user` SET `salt` = '1234' WHERE `tb_user`.`user_id` = 60011229;
                        $email = $_POST['email'];
                        $token = $_POST['token'];
						$password1 = $_POST['password1'];
                        $password2 = $_POST['password2'];
                        if($password1 !== $password2)
                        {
                            echo 'password not match';
                        }
                        else{
                        function generate_password($length = 8){
                            $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                                      '0123456789';
                          
                            $str = '';
                            $max = strlen($chars) - 1;
                          
                            for ($i=0; $i < $length; $i++)
                              $str .= $chars[random_int(0, $max)];
                          
                            return $str;
                          }

                            $salt = generate_password();
                            $password = hash('sha256',$password1.$salt);

						$sql = "UPDATE tb_user SET user_password = '".$password."', salt = '".$salt."' WHERE user_email = '".$email."' LIMIT 1;";
                        $cls_conn->write_base($sql);
                        $sql ="UPDATE tb_forget_password_token SET used = '1' WHERE token = '".$token."';";
                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('Success');
                            echo $cls_conn->goto_page(1, 'login.php');
                        } else {
                            echo $cls_conn->show_message('Unsuccess');
                        }


                    }
					}
					

					?>
				</div>
			</div>
		</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="../frontend/cieonlocal/template_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../frontend/cieonlocal/template_login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../frontend/cieonlocal/template_login/vendor/bootstrap/js/popper.js"></script>
	<script src="../frontend/cieonlocal/template_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../frontend/cieonlocal/template_login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../frontend/cieonlocal/template_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../frontend/cieonlocal/template_login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../frontend/cieonlocal/template_login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../frontend/cieonlocal/template_login/js/main.js"></script>

</body>

</html>