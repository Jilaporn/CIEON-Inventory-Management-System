<?php session_start();?>
<?php error_reporting(0);
?>
<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.0.29, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.0.29, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/cieon-121x121.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Conclude List</title>
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
<body>
<?php include('header.php');?>


<!-- <section class="engine"><a href="https://mobirise.info/d">web maker</a></section><section class="features15 cid-spwNsx934l" id="features16-1h">

    

    
    <div class="container">
        <div class="content-wrapper">
            <div class="row align-items-center">
                <div class="col-12 col-lg">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style display-2"><strong>Extend Date/Time</strong></h6>
                        <p class="mbr-text mbr-fonts-style mb-4 display-4">
                            The user can extend the borrowed item(s) by this feature. The processes are choosing the items that the user would like to extend date and time and set the quantity then submit to done the extend date/time process. The user will receive the email that display a new return date.</p>
                        
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="image-wrapper">
                        <img src="assets/images/extend-400x171.png" alt="Mobirise">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="content6 cid-spwNB2vPqI" id="content6-1k">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <hr class="line">
                <p class="mbr-text align-center mbr-fonts-style my-4 display-5">
                    <em>Reserve Items List</em></p>
                <hr class="line">
            </div>
        </div>
    </div>
</section>

<section class="features8 cid-spwNxYQxed" xmlns="http://www.w3.org/1999/html" id="features9-1i">
    
    



    <div class="container">
    <?php 
        $idd= $_SESSION['user_id'];
        $sql = "SELECT
        tb_reserve.rs_id,
        tb_reserve.item_id,
        sum(tb_reserve.rs_amount),
        tb_reserve.rs_date,
        tb_reserve.cate_type,
        tb_reserve.rs_flag,
        tb_reserve.user_id,
        tb_reserve.rs_pic,
        tb_reserve.rs_item_name
        FROM
        tb_reserve
        where  tb_reserve.user_id = '$idd' AND rs_otp = '0'
        GROUP by tb_reserve.rs_item_name 
        ";
// echo $sql;
$result=$cls_conn->select_base($sql);
while($row=mysqli_fetch_array($result)){
$all = $row['sum(tb_reserve.rs_amount)'];
$amount=$row['rs_amount'];
$rs_id = $row['rs_id'];
$rs_date = $row['rs_date'];
$item_id = $row['item_id'];
$item_name = $row['rs_item_name'];
$datedate = date ("Y-m-d", strtotime("+1 day", strtotime($rs_date))); 

        ?>
        <div class="card">
            <div class="card-wrapper">
                <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                        <div class="image-wrapper">
                        <img src="../../backend/upload/<?= $row['rs_pic'] ?>" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md">
                                    <h6 class="card-title mbr-fonts-style display-5">
                                        <strong><?=$row['rs_item_name']?></strong></h6>
                                    <p class="mbr-text mbr-fonts-style display-7"> Pick up before: <?=$datedate?></p>
                                </div>
                                <form method="post">
                                <div class="col-md-auto">
                                    <p class="price mbr-fonts-style display-2">Amount: <?=$all?></p>
                                    <button type="submit" name="delete" value="<?=$row['rs_id'] ?>" class="btn btn-primary display-4" >Delete</button>
                                    <input type="hidden" name="item_id" value="<?=$item_id?>">
                                    <input type="hidden" name="item_name" value="<?=$item_name?>">
                                    <input type="hidden" name="rs_amount" value="<?=$amount?>">
                                    <!-- <div class="mbr-section-btn"><a href="https://mobiri.se" class="btn btn-primary display-4"><span class="mobi-mbri mobi-mbri-plus mbr-iconfont mbr-iconfont-btn"></span>0</a></div> -->
                                </div>
                                </form>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php  } ?> 
    </div>
</section>
<?php 
if(isset($_POST['delete'])){
$rs_id = $_POST['delete'];
$item_id = $_POST['item_id'];
$item_name = $_POST['item_name'];
$rs_amount = $_POST['rs_amount'];
// echo $rs_id; 
$sql ="delete from tb_activity where user_id = '$idd' and act_type ='rs' and act_item_name ='$item_name' and act_flag ='o' limit 1 ";
$sql1 = "UPDATE tb_reserve SET rs_amount = rs_amount -'1' WHERE rs_id = '".$rs_id."' LIMIT 1;";
$sql2 ="SELECT rs_amount from tb_reserve";
$cls_conn->write_base($sql);
$cls_conn->write_base($sql1);
$cls_conn->write_base($sql2);
$sql21 ="delete from tb_reserve where rs_id = '$rs_id' and rs_amount ='0'  ";
$sql23 = "UPDATE tb_cate_item SET ith_avalible = ith_avalible + '1' WHERE item_id = '".$item_id."';";
$cls_conn->write_base($sql21);
$cls_conn->write_base($sql23);
echo $cls_conn->goto_page(1, 'conclude.php');
}
?>

<section class="content11 cid-spwNySWLqS" id="content11-1j">
<form method="post">

    <div  class="container row">
    <button type="submit" style="margin-left: 31% ; width: 50%; " name="submit" class="btn btn-primary display-4" >Reserve</button>
    </div><br>
    <!-- <div  class="container row">
    <a class="btn btn-primary display-4" style="margin-left: 31% ; width: 50% ;" href="reserve.php">Cancel</a></div>
    </div> -->
  
</form>
    <?php 
    if(isset($_POST['submit'])){

        $rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$to="$user_email";
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: cieonkmitl@gmail.com" . "\r\n" .
"CC: divyasundarsahu@gmail.com";
mail($to,$subject,$txt,$headers);
if(isset($_POST['submitt']))
{
// $_SESSION['otp']=$rndno;
// echo $rndno;
}

        $sql = " update tb_reserve set rs_otp = '$rndno' where user_id = '$idd' ";

        if ($cls_conn->write_base($sql) == true) {
            echo $cls_conn->show_message('Success');
            echo $cls_conn->goto_page(1, 'logout.php');
            // echo $sql;
        } else {
            echo $cls_conn->show_message('Unsuccess');
        }
    }
    ?>
</section>

<section class="footer3 cid-s48P1Icc8J" once="footers" id="footer3-1g">


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
                    ?? Copyright 2020 Mobirise. All Rights Reserved.
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