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
<?php include('headernocart.php');?>


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
  <form method="post">  
    



    <div class="container">
    <?php 
    $otp = $_GET['otp'];
        $idd= $_SESSION['user_id'];
        $sql = "SELECT
        tb_activity.act_id,
        tb_activity.user_id,
        tb_activity.locker_no,
        tb_activity.rfid_tag,
        tb_activity.item_id,
        tb_activity.act_item_name,
        count(tb_activity.act_item_name),
        tb_activity.act_pic,
        tb_activity.act_type,
        tb_activity.act_date,
        tb_activity.user_sts,
        tb_activity.act_exp_date,
        tb_activity.act_boxno,
        tb_activity.act_bk_detail,
        tb_activity.act_flag
        FROM
        tb_activity
          
        where  tb_activity.user_id = '$idd' and tb_activity.act_type = 'rs'
        GROUP by tb_activity.act_item_name
        ";
// echo $sql;
$result=$cls_conn->select_base($sql);
while($row=mysqli_fetch_array($result)){
$locker = $row['locker_no'];
$item_name = $row['act_item_name'];
$all = $row['count(tb_activity.act_item_name)'];
$rs_date = $row['act_date'];
$datedate = date ("Y-m-d", strtotime("+1 day", strtotime($rs_date))); 


        ?>
        <div class="card">
            <div class="card-wrapper">
                <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                        <div class="image-wrapper">
                        <img src="../../backend/upload/<?= $row['act_pic'] ?>" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md">
                                    <h6 class="card-title mbr-fonts-style display-5">
                                        <strong><?=$item_name?></strong></h6>
                                        <input type="hidden" name="rs_item_name[]" value="<?=$row['rs_item_name']?>" />
                                    <p class="mbr-text mbr-fonts-style display-7"> Return before: <?= $row['act_exp_date'] ?></p>
                                    <p class="mbr-text mbr-fonts-style display-8" style="color: red"> *Item must be returned in seven days after it is borrowed</p>
                                    <p class="mbr-text mbr-fonts-style display-7"> Locker no: <?= $row['locker_no'] ?></p>
                                   
                                </div>
                                <div class="col-md-auto">
                              


                                    <p class="price mbr-fonts-style display-2">Amount: <?=$arraysum[]=$all?></p>
                                    <!-- <div class="mbr-section-btn"><a href="https://mobiri.se" class="btn btn-primary display-4"><span class="mobi-mbri mobi-mbri-plus mbr-iconfont mbr-iconfont-btn"></span>0</a></div> -->
                                    
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <?php 
                if(isset($_POST['submit'])){
                    $no = $_POST['locker_no'];
                    // echo $no;

                    $up ="UPDATE tb_locker set locker_sts ='b' where locker_no = '$locker' and locker_sts ='c' ";
                    // echo $up;
                    $cls_conn->write_base($up);
                }
                ?>
    <?php } ?>
    </div>
</section>

<section class="content11 cid-spwNySWLqS" id="content11-1j">


    <div  class="container row">
    <button type="submit" style="margin-left: 31% ; width: 50%; " name="submit" class="btn btn-primary display-4" >Submit</button>
    </div><br>
    <!-- <div  class="container row">
    <a class="btn btn-primary display-4" style="margin-left: 31% ; width: 50% ;" href="reserve.php">Cancel</a></div>
    </div>
   -->
</form>
   
<?php 
    if(isset($_POST['submit'])){

        // $arraytotal=array_sum($arraysum);
        // echo "Array SUM=".$arraytotal;

        $sqll7 = "SELECT * from tb_user where user_id ='$idd' ";
        $ree = $cls_conn->select_base($sqll7);
        while ($row = mysqli_fetch_array($ree)) {
            $email = $row['user_email'];
            $phone = $row['user_tel'];
            $name = $row['user_firstname'];
            $day = $row['user_br_day'];
            $limit = $row['user_limit'];
        }
        $sql = "SELECT
        tb_activity.act_id,
        tb_activity.user_id,
        tb_activity.locker_no,
        tb_activity.rfid_tag,
        tb_activity.item_id,
        tb_activity.act_item_name,
        count(tb_activity.act_item_name),
        tb_activity.act_pic,
        tb_activity.act_type,
        tb_activity.act_date,
        tb_activity.user_sts,
        tb_activity.act_exp_date,
        tb_activity.act_boxno,
        tb_activity.act_bk_detail,
        tb_activity.act_flag
        FROM
        tb_activity
          
        where  tb_activity.user_id = '$idd' and tb_activity.act_type = 'rs'
        GROUP by tb_activity.act_item_name
        ";
            // echo $sql;
            $result = $cls_conn->select_base($sql);
            $txt = "";
            while ($row = mysqli_fetch_array($result)) {
                
                $txt .= "Lists :".$row['act_item_name']."\nAmount :".$row['count(tb_activity.act_item_name)']."\nReturn date:".$row['act_exp_date'].'\n';
                

                
            }
            $to="user <$user_email>";
            $subject = "Borrowed List";
            $headers = "From: <ftp@cieinventory.ga>" . "\r\n" ."Reply-To:$user_email ".
            "CC: cieonkmitl <cieonkmitl@gmail.com>";
            mail($to,$subject,$txt,$headers);

        $sql1 = " update tb_activity";
        $sql1 .= " set";
        $sql1 .= " act_type='b'";
        $sql1 .= " where";
        $sql1 .= " user_id='$idd'";
        $sql2 = " update tb_reserve";
        $sql2 .= " set";
        $sql2 .= " rs_flag='c'";
        $sql2 .= " where";
        $sql2 .= " user_id='$idd'";
        $cls_conn->write_base($sql1) == true;
        $cls_conn->write_base($sql2) == true;
        echo $cls_conn->goto_page(1, 'logout.php');




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