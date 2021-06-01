<?php session_start();?>
<?php include('class_conn.php');?>
<?php $cls_conn=new class_conn();?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="icon" type="
    image/png" href="template_login/images/icons/favicon.ico"/>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<!--===============================================================================================-->
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" onsubmit="return set_phone_number()" method="POST">
					<span class="login100-form-title p-b-26">
					</span>
					<span class="login100-form-title p-b-48">
						<img src ="upload/cie icon.jpg" width="110 px" height="110 px"/><br><br>
						CIEON INVENTORY
					</span>

					<!-- <div class="wrap-input100 validate-input" data-validate = "Student or Teacher number ">
						<input class="input100" type="number" name="number"placeholder="Id number" min="1" max="9999999999">
						<span class="focus-input100" ></span>
					</div> -->

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="firstname"placeholder=" Firstname">
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" >
						<span class="btn-show-pass">
						</span>
						<input class="input100" type="text" name="surname" placeholder=" Surname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100" data-validate="Enter email">
			
						<input class="input100" style="width:175px;display:inline" type="text" name="email" placeholder=" Email"minlength="6" maxlength="20">
							<span class="input-group-text" id="basic-addon2">@kmitl.ac.th</span>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter telephone number">C:\xampp\htdocs\invnewest\public_html\frontend\cieonlocal\teacherregis.php
						<span class="btn-show-pass">
						</span>
						<input id="phone" class="input100" type="text" name="telephone" placeholder=" Telephone number">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder=" Password" minlength="6" maxlength="20">
						<span class="btn-show-pass">
						</span>
					</div>

					<!-- <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="test">
								test
							</button> -->
							
						<!-- </div>
					</div> -->
					<!-- <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="student">
								Student
							</button>
							
						</div>
					</div> -->
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="teacher">
								Register
							</button>
							
						</div>
					</div>

					
				</form>
				<?php
				function generate_password($length = 8){
					$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
							  '0123456789';
				  
					$str = '';
					$max = strlen($chars) - 1;
				  
					for ($i=0; $i < $length; $i++)
					  $str .= $chars[random_int(0, $max)];
				  
					return $str;
				  }
				  if (isset($_POST['test'])) {
					  var_dump($_POST);
					  ?>
					  
					  <?
				  }
                // if (isset($_POST['student'])) {
                //     $student_id = $_POST['number'];
                //     $student_firstname = $_POST['firstname'];
                //     $student_surname= $_POST['surname'];
                //     $student_email = $_POST['email'].'@kmitl.ac.th';
                //     $student_tel = $_POST['telephone'];
				// 	$password = $_POST['password'];
				// 	$salt = generate_password();
    			// 	$password = hash('sha256',$password.$salt);
                //     $student_password = $password;



// values = recieve data from input
// insert = insert to database table
                //     $sql = " insert into tb_user(user_id,user_firstname,user_surname,user_email,user_tel,user_position,user_sts,user_password,user_limit,user_br_day,salt)";
                //     $sql .= " values ('$student_id','$student_firstname','$student_surname','$student_email','$student_tel','2','n','$student_password','10','7','$salt')";


                //     if ($cls_conn->write_base($sql) == true) {
                //         echo $cls_conn->show_message('Success');
                //         echo $cls_conn->goto_page(1, 'index.php');
                //     } else {
                //         echo $cls_conn->show_message('Unsuccess');
                //     }
                // }
                // ?> 
                <?php
                if (isset($_POST['teacher'])) {
                    $teacher_id = $_POST['number'];
                    $teacher_firstname = $_POST['firstname'];
                    $teacher_surname= $_POST['surname'];
                    $teacher_email = $_POST['email'].'@kmitl.ac.th';
                    $teacher_tel = $_POST['telephone'];
					$password = $_POST['password'];
					$salt = generate_password();
    				$password = hash('sha256',$password.$salt);
                    $teacher_password = $password;



// values = recieve data from input
// insert = insert to database table
                    $sql = " insert into tb_user(user_no,user_firstname,user_surname,user_email,user_tel,user_position,user_sts,user_password,user_limit,user_br_day,salt)";
                    $sql .= " values ('$teacher_id','$teacher_firstname','$teacher_surname','$teacher_email','$teacher_tel','1','n','$teacher_password','20','7','$salt')";


                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('Success');
                        echo $cls_conn->goto_page(1, 'index.php');
                    } else {
                        echo $cls_conn->show_message('Unsuccess');
                    }
                }
                ?>


			</div>
		</div>
	</div>
	

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
	<script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
	initialCountry: "th",
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
 </script>
<script>
function set_phone_number(){
if(isNaN(document.getElementById("phone").value) == true)
{
	alert('Phone number is incorrect');
	return false
}
else
{
 document.getElementById("phone").value = phoneInput.getNumber();
 return true;
}
}
</script>
</body>
</html>