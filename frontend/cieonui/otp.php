<head>
  <!-- Site made with Mobirise Website Builder v5.0.29, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.0.29, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/cieon-121x121.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Return</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  
</head>
<?php
session_start();
error_reporting(0);
if(isset($_POST['save']))
{
$rno=$_SESSION['otp'];
$urno=$_POST['otpvalue'];
if(!strcmp($rno,$urno))
{
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
//For admin if he want to know who is register
$to="example@gmail.com";
$subject = "Thank you!";
$txt = "Some one show your demo Email id: ".$email." Mobile number : ".$phone."";
$headers = "From: studentstutorial@gmail.com" . "\r\n" .
"CC: divyasundarsahu@gmail.com";
mail($to,$subject,$txt,$headers);
echo "<p>Thank you for show our Demo.</p>";
//For admin if he want to know who is register
}
else{
echo "<p>Invalid OTP</p>";
}
}
//resend OTP
if(isset($_POST['resend']))
{
$message="<p class='w3-text-green'>Sucessfully send OTP to your mail.</p>";
$rno=$_SESSION['otp'];
$to=$_SESSION['email'];
$subject = "OTP";
$txt = "OTP: ".$rno."";
$headers = "From: otp@studentstutorial.com" . "\r\n" .
// "CC: divyasundarsahu@gmail.com";
mail($to,$subject,$txt,$headers);
$message="<p class='w3-text-green w3-center'><b>Sucessfully resend OTP to your mail.</b></p>";
}
?>
<!DOCTYPE html>
<html>
<header>
<title>OTP</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//studentstutorial.com/div/d.css">
<style>
a{
text-decoration:none;
}
</style>
<header>
<body>
<?php include('headernocart.php');?>
<br>
<div style="margin-left: 10%; margin-right: 10%; margin-top: 10%;" class="w3-row">
<div class="w3-full w3-card-2 w3-round">
<div class="w3-container w3-center w3-green">
<h2>OTP</h2>
</div>
<br>
<form class="w3-container" method="post" action="">
<br>
<br>
<p>
<input class="w3-input w3-border w3-round" type="text" placeholder="OTP" name="otpvalue"></p>
<p class="w3-center"><button class="w3-btn w3-green w3-round" style="width:100%;height:40px" name="savee">Submit</button></p>
<!-- <p class="w3-center"><button class="w3-btn w3-green w3-round" style="width:100%;height:40px" name="resend">Resend</button></p> -->
</form>
<?php 
if(isset($_POST['savee'])){
    $otpvalue = $_POST['otpvalue'];

     
    $sql1 = " update tb_reserve set rs_flag = 'b' where user_id = '$idd' and rs_flag ='o' ";
    $cls_conn->write_base($sql1) == true;
    echo $sql1;

    $sql = "SELECT *from tb_reserve where user_id = '$idd' ";
    $re = $cls_conn->select_base($sql);
    while($row=mysqli_fetch_array($re)){
        $rs_otp =$row['rs_otp'];
    }
    // echo $rs_otp ;
    if($rs_otp == $otpvalue){
    // echo $cls_conn->goto_page(1, 'concludeotp.php?otp='.$otpvalue);
    }else{
        echo $cls_conn->show_message('Incorrect OTP');
    }

}
?>

<div><?php if(isset($message)) { echo $message; } ?>
</div>
<br>
<div class="w3-container w3-center w3-light-grey">
<!-- <h4><a href="studentstutorial.com">Students Tutorial</a></h4> -->
</div>
</div>
<div class="w3-full">
</div>
</div>
<section style="margin-top: 10%" class="footer3 cid-s48P1Icc8J" once="footers" id="footer3-1g">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                    
                    
                    
                    
                    
                <li class="foot-menu-item mbr-fonts-style display-7"><a href="https://mobirise.com/help/" class="text-success">Help Center</a></li><li class="foot-menu-item mbr-fonts-style display-7"><a href="http://forums.mobirise.com/" class="text-success">Mobirise Forums</a></li><li class="foot-menu-item mbr-fonts-style display-7"><a href="https://mobirise.com/" class="text-success">Mobirise.com</a></li></ul>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                    
                    
                    
                    
                    
                    
                <div class="soc-item">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.youtube.com/c/mobirise" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://instagram.com/mobirise" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>
                        </a>
                    </div></div>
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
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  
</body>

</html>