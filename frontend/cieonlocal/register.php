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
	<div  class="container row">
    <a class="btn btn-primary display-4" href="../../frontend/cieonlocal/index.php">Back</a></div>
    </div>
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" onsubmit="return set_phone_number()" method="POST">
				
					<span class="login100-form-title p-b-26">
					</span>
					<span class="login100-form-title p-b-48">
						<img src ="upload/cie icon.jpg" width="110 px" height="110 px"/><br><br>
						CIEON INVENTORY
					</span>
					<!-- STUDENT SECTION-->
					<?php if($_GET['po'] == 's' ){ ?>
					<div class="wrap-input100 validate-input" data-validate = "Student or Teacher number ">
						<input id="number" class="input100" onchange="update_number()" type="number" required="required" name="number" placeholder="Id number" min="1" max="9999999999">
						<span class="focus-input100" ></span>
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" required="required" name="firstname"placeholder=" Firstname" minlength="1" maxlength="25">
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" >
						<span class="btn-show-pass">
						</span>
						<input class="input100" type="text" required="required" name="surname" placeholder=" Surname" minlength="1" maxlength="25">
						<span class="focus-input100"></span>
					</div>
					<!-- TEACHER SECTION -->
					<?php }else{ ?>
					<div class="wrap-input100 validate-input" >
						<input id="firstname" class="input100" type="text" onchange="update_email()" required="required" name="firstname"placeholder=" Firstname" minlength="1" maxlength="25">
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" >
						<span class="btn-show-pass">
						</span>
						<input id="surname" class="input100" type="text" onchange="update_email()" required="required" name="surname" placeholder=" Surname" minlength="1" maxlength="25">
						<span class="focus-input100"></span>
					</div>
					<?} ?>
					

					<div class="wrap-input100 " >
						<input id="email" class="input100" type="text" disabled="disabled" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Enter telephone number">
						<span class="btn-show-pass">
						</span>
						<input id="phone" class="input100" required="required" type="text" name="telephone" placeholder=" Telephone number">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
					<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
						<input class="input100" type="password" required="required" name="password" placeholder=" Password" minlength="6" maxlength="20">
						<span class="btn-show-pass">
						</span>
					</div>
					<p class="mbr-text mbr-fonts-style display-8" style="color: red"> *Password must be at least 6 characters but not more than 20 characters</p>

					<?php if($_GET['po'] == 's' ){ ?>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="student">
								Student
							</button>
						</div>
					</div>
					<?php }else{?>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="teacher">
								Teacher
							</button>
						</div>
					</div>
					<?php }?>

					
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
				  
                if (isset($_POST['student'])) {
                    $student_id = $_POST['number'];
                    $student_firstname = $_POST['firstname'];
                    $student_surname= $_POST['surname'];
                    $student_email = $_POST['number'].'@kmitl.ac.th';
                    $student_tel = $_POST['telephone'];
					$password = $_POST['password'];
					$salt = generate_password();
    				$password = hash('sha256',$password.$salt);
                    $student_password = $password;

					
					$sql4 = "SELECT * FROM tb_user WHERE user_no = '$student_id'";
					$sql4 = mysqli_fetch_assoc($cls_conn->select_base($sql4));
					if(!$sql4['user_no'])
					{
						//IF NO USER IN DB
						$sql = " insert into tb_user(user_no,user_firstname,user_surname,user_email,user_tel,user_position,user_sts,user_password,user_limit,user_br_day,salt)";
						$sql .= " values ('$student_id','$student_firstname','$student_surname','$student_email','$student_tel','2','n','$student_password','10','7','$salt')";


						if ($cls_conn->write_base($sql) == true) {
							echo $cls_conn->show_message('Success');
							echo $cls_conn->goto_page(1, 'index.php');
						} else {
							echo $cls_conn->show_message('Unsuccess');
						}
					}
					else
					{
						//IF USER IN DB
						echo $cls_conn->show_message('Already Register');
					}
					
					

// values = recieve data from input
// insert = insert to database table
					
                    
                
			}
			
                ?> 
                <?php
                if (isset($_POST['teacher'])) {
                    $teacher_firstname = $_POST['firstname'];
                    $teacher_surname= $_POST['surname'];
					$su2 = substr($teacher_surname,0,2);
                    $teacher_email = strtolower($_POST['firstname'].'.'.$su2.'@kmitl.ac.th');
                    $teacher_tel = $_POST['telephone'];
					$password = $_POST['password'];
					$salt = generate_password();
    				$password = hash('sha256',$password.$salt);
                    $teacher_password = $password;

					$sql4 = "SELECT * FROM tb_user WHERE user_email = '$teacher_email'";
					$sql4 = mysqli_fetch_assoc($cls_conn->select_base($sql4));
					if(!$sql4['user_email'])
					{
						//IF NO USER IN DB
						$sql = " insert into tb_user(user_no,user_firstname,user_surname,user_email,user_tel,user_position,user_sts,user_password,user_limit,user_br_day,salt)";
						$sql .= " values ('0','$teacher_firstname','$teacher_surname','$teacher_email','$teacher_tel','1','n','$teacher_password','20','7','$salt')";


						if ($cls_conn->write_base($sql) == true) {
							echo $cls_conn->show_message('Success');
							echo $cls_conn->goto_page(1, 'index.php');
						} else {
							echo $cls_conn->show_message('Unsuccess');
						}
					}
					else
					{
						//IF USER IN DB
						echo $cls_conn->show_message('Already Register');
					}


// values = recieve data from input
// insert = insert to database table
                    
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


function update_number(){
    
    if(document.getElementById('number').value)
	{
		var number = document.getElementById('number').value;
		document.getElementById('email').value = number+'@kmitl.ac.th';
        
    }
}
function update_email(){
    
    if(document.getElementById('firstname').value)
    {
        var first_name = document.getElementById('firstname').value.toLowerCase();
        if(document.getElementById('surname').value)
        {
            var surname = document.getElementById('surname').value.toLowerCase();
            document.getElementById('email').value = first_name+'.'+surname.substring(0,2)+"@kmitl.ac.th";
        }
    }
    
   
    
}
</script>
</body>
</html>