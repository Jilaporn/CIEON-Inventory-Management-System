<!DOCTYPE html>
<?php
error_reporting(0);
?>
<?php session_start();?>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.0.29, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.0.29, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/cieon-121x121.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Home</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  <style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
  
</head>
<body>
<?php include('headernocart.php');?>

<section class="engine"><a href="index.php">free responsive site templates</a></section><section class="header15 cid-spnHkn7NcH" id="header15-o">
    

<?php if($user_status == 'p' ) { ?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Warning!</strong> You currently have penalty status please contact admin at HM 604
</div>
<?php } ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md">
                <div class="text-wrapper">
                    <h2 class="mbr-section-title mb-3 mbr-fonts-style display-5">
                        <strong>Welcome to </strong><br><strong>CIEON Inventory Management System</strong></h2>
                    <p class="mbr-text mb-3 mbr-fonts-style display-7">CIEON Inventory management system&nbsp;is a smart system developed to assist with stock management systems by implementing a self-borrowing and a self-returning process.</p>
                    
                </div>
            </div>
            <div class="mbr-figure col-12 col-md-7"><iframe width="560" height="315" src="https://www.youtube.com/embed/EU8A_UuEO-c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        </div>
    </div>
</section>

<section class="features2 cid-spuAtsOFL6" id="features3-10">
    
    
<div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Features</strong><br><strong><br></strong></h4>
            
        </div>
        <div class="row mt-3">
            <div class="item features-image сol-12 col-md-3 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets1/images/borrow.jpg" alt="Mobirise">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>Borrow</strong></h5>
                        
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">The process of borrow features begin with choosing the item(s) and amount then submit it.</p>
                    </div>
                    
                </div>
            </div>
            <div class="item features-image сol-12 col-md-3 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets1/images/return.jpg" alt="Mobirise">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>Return</strong></h5>
                        
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">User has to choose the item(s) and amount that the user would like to return then put the return item(s) on RFID machine before submit the process. After that the return door locker will open to let the user keep the return item(s) inside.</p>
                    </div>
                    
                </div>
            </div>
            <div class="item features-image сol-12 col-md-3 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets1/images/broken.jpg" alt="Mobirise">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>Broken</strong></h5>
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">User has to declare the broken items name and amount along with describing a breif malfunction of item(s). After declaring all of its, the user has to put the broken on RFID machine and submit the process. Then the broken locker door will open.&nbsp; However, those user who uses this feature will receive a penalty and they cannot use the system until the admin edit their penalty status.<br></p>
                    </div>
                </div>
            </div>

              <div class="item features-image сol-12 col-md-3 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets1/images/enterotp.jpg" alt="Mobirise">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>Enter OTP</strong></h5>
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">User have to enter the OTP that user receive via user's email after doing a reservation online. After typing a correct and unexpired OTP, the locker door will open.<br></p>
                    </div>  
                </div>
            </div>

        </div>
    </div>
    
    </div>
</div>
</section>

<section class="content1 cid-s48udlf8KU" id="content1-8">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-md-9">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>What is Penalty status?</strong></h3>
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7">The user who gets penalty in the system had been doing these following: returning late, ruining the item(s) that they borrowed or losting the borrowed item(s)</h4>
                
            </div>
        </div>
    </div>
</section>

<section class="image3 cid-s48upRUlSD" id="image3-9">
    

    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="image-wrapper">
                    <img src="assets/images/penalty_cieon.PNG" alt="Mobirise">
                    <p class="mbr-description mbr-fonts-style mt-2 align-center display-4">
                        Example page of person who gets penalty</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content1 cid-s48vaXqeL6" id="content1-b">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-md-9">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>How to unlock Penalty status?</strong></h3>
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7">The user who receive the penalty announcement via E-mail. Please contact to admin and lets admin edit the penalty status after declaring the cause of penalty with admin.</h4>
                
            </div>
        </div>
    </div>
</section>

<section class="content1 cid-s48vnjULo4" id="content1-c">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-md-9">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>How to contact admin?</strong></h3>
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7">The user can contact admin at the HM building at room number 604 on Weekdays, at 8:00 am - 5:00 pm.</h4>
                
            </div>
        </div>
    </div>
</section>

<section class="footer3 cid-s48P1Icc8J" once="footers" id="footer3-i">

    

    

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