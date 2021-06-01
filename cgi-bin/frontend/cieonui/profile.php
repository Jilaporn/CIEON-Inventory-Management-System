<?php session_start();?>
<?php error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v5.0.29, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.0.29, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/cieon-121x121.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Edit Profile</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  
  
  <?php
                        if(isset($_GET['id']))
                        {
                            $id=$_GET['id'];
                            $sqlu=" select * from tb_user";
                            $sqlu.=" where";
                            $sqlu.=" user_id='$idd'";
                            $resultu=$cls_conn->select_base($sqlu);
                            // call array from database
                            
                            while($rowu=mysqli_fetch_array($resultu))
                            {
                                $user_id=$rowu['user_id'];
                                $user_firstname=$rowu['user_firstname'];
                                $user_surname=$rowu['user_surname'];
                                $user_email=$rowu['user_email'];
                                $user_tel=$rowu['user_tel'];
                                $user_status=$rowu['user_sts'];
                                $user_password=$rowu['user_password']; 
                                $user_limit=$rowu['user_limit']; 
                                
                            }
                            
                        }
                        ?>
</head>
<body>

<?php include('headernocart.php')?>

<section class="engine"><a href="https://mobirise.info/k">develop free website</a></section><section class="form7 cid-spx2tPHc7f" id="form7-2y">
    
    
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Edit Profile</strong></h3>
            
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form  onsubmit="return set_phone_number()"  method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="7khKMkVwbetY76hTLpQFWqCWFFM5KwUTE4MrtC8lCzfnwwXoG0nXXq59C8boaS/TlnSRXEuGbC9KyTlRoJFBdumk+jf2YXGxnjyR+Fz9Yru+IqXugOT4nXf4+f95+7Fw">
                    <p class="mbr-text mbr-fonts-style align-center mb-4 display-7"></p>
                    <!-- <div class="">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling
                            out the form!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some
                            problem!</div>
                    </div> -->
                    <div class="dragArea row">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="name">
                        Firstname :<input type="text" name="firstname" placeholder="Firstname" data-form-field="name" class="form-control" value="<?=$user_firstname?>" id="name-form7-2y">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="surname">
                            Surname :<input type="text" name="surname" placeholder="Surname" data-form-field="surname" class="form-control" value="<?=$user_surname?>" id="name-form7-2y">
                        </div>
                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="email">
                            Email :<input type="email" name="email" placeholder="Email" data-form-field="email" class="form-control" value="<?=$user_email?>" id="email-form7-2y">
                        </div> -->
                        <div data-for="phone" class="col-lg-12 col-md-12 col-sm-12 form-group" data-validate="Enter telephone number">
                            Telephone number :
                            <input id="phone" class="form-control" type="text" name="tel" value="<?=$user_tel?>" placeholder=" Telephone number" id="phone-form7-2y">
                        </div>
                        <div data-for="phone" class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="text" name="lim" placeholder="limit" class="form-control" value="<?=$user_limit?>" disabled id="limit-form7-2y">
                        </div>
                        
                        <div class="col-auto mbr-section-btn align-center">
                            <button type="submit" name="submit" class="btn btn-primary display-4">save</button>
                        </div>

                        <?php
                        if(isset($_POST['submit']))
                        {
                            $user_firstname=$_POST['firstname'];
                            $user_surname=$_POST['surname'];
                            $user_email=$_POST['email'];
                            $user_tel=$_POST['tel'];
                            // $user_status=$_POST['user_sts'];
                            // $user_password=$_POST['password']; 


                         
                            $sql=" update tb_user";
                            $sql.=" set";
                            $sql.=" user_firstname='$user_firstname'";
                            $sql.=" ,user_surname='$user_surname'";
                            $sql.=" ,user_email='$user_email'";
                            $sql.=" ,user_tel='$user_tel'";
                            // $sql.=" ,user_sts='$user_sts'";
                            // $sql.=" ,user_password='$user_password'";
                            // update where from database
                            $sql.=" where";
                            $sql.=" user_id='$user_id'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('Successfully edited the information');
                                echo $cls_conn->goto_page(1,'index.php');
                            // echo $sql;
                            }
                            else
                            {
                                echo $cls_conn->show_message('Failed to edit information');
                                echo $sql;
                            }
                            
                                                        
                        }
                        ?>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<section class="footer3 cid-s48P1Icc8J" once="footers" id="footer3-14">





<div class="container">
    <div class="media-container-row align-center mbr-white">
        <div class="row row-links">
            <ul class="foot-menu">





                <li class="foot-menu-item mbr-fonts-style display-7"><a href="https://mobirise.com/help/" class="text-success">Help Center</a></li>
                <li class="foot-menu-item mbr-fonts-style display-7"><a href="http://forums.mobirise.com/" class="text-success">Mobirise Forums</a></li>
                <li class="foot-menu-item mbr-fonts-style display-7"><a href="https://mobirise.com/" class="text-success">Mobirise.com</a></li>
            </ul>
        </div>
        <div class="row social-row">
            <div class="social-list align-right pb-2">






                <div class="soc-item">
                    <a href="https://twitter.com/mobirise" target="_blank">
                        <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                    </a>
                </div>
                <div class="soc-item">
                    <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                        <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                    </a>
                </div>
                <div class="soc-item">
                    <a href="https://www.youtube.com/c/mobirise" target="_blank">
                        <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                    </a>
                </div>
                <div class="soc-item">
                    <a href="https://instagram.com/mobirise" target="_blank">
                        <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row row-copirayt">
            <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                © Copyright 2020 Mobirise. All Rights Reserved.
            </p>
        </div>
    </div>
</div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/formstyler/jquery.formstyler.js"></script>
  <script src="assets/formstyler/jquery.formstyler.min.js"></script>
  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
	initialCountry: "th",
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   function set_phone_number(){
if(phoneInput.isValidNumber() == false)
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