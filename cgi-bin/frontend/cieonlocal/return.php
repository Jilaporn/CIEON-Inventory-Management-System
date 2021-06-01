<?php session_start(); ?>
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

    <title>Return</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>

<body>
    <?php include('headernocart.php'); ?>
    <section class="engine"><a href="https://mobirise.info/d">web maker</a></section>
    <section class="features15 cid-spwNsx934l" id="features16-1h">
        <div class="container">
            <div class="content-wrapper">
                <div class="row align-items-center">
                    <div class="col-12 col-lg">
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style display-2"><strong>Return</strong></h6>
                            <p class="mbr-text mbr-fonts-style mb-4 display-4">
                                The user can return the borrowed item(s) by this feature. The processes are choosing the items that the user would like to return then clicking the submit button.</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="image-wrapper">
                            <img src="assets1/images/return.jpg" alt="Mobirise">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content6 cid-spwNB2vPqI" id="content6-1k">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <hr class="line">
                    <p class="mbr-text align-center mbr-fonts-style my-4 display-5">
                        <em>Borrow Items List(Return)</em>
                    </p>
                    <hr class="line">
                </div>
            </div>
        </div>
    </section>
    <section class="features8 cid-spwNxYQxed" xmlns="http://www.w3.org/1999/html" id="features9-1i">
        <div class="container">
            <?php
            $idd = $_SESSION['user_id'];
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
        where  tb_activity.user_id = '$idd' and tb_activity.act_type ='b' and tb_activity.act_flag != 'c'
        GROUP by tb_activity.rfid_tag
        ";
            // echo $sql;
            $result = $cls_conn->select_base($sql);
            while ($row = mysqli_fetch_array($result)) {
                $all = $row['count(tb_activity.act_item_name)'];
                $act_date = $row['act_date'];

                $datedate = date("Y-m-d", strtotime("+7 day", strtotime($act_date)));

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
                                                <strong><?= $row['act_item_name'] ?></strong>
                                            </h6>
                                            <p class="mbr-text mbr-fonts-style display-7"> RFID Tag: <?= $row['rfid_tag'] ?></p>
                                            <p class="mbr-text mbr-fonts-style display-7"> Box Number: <?= $row['act_boxno'] ?></p>
                                            <p class="mbr-text mbr-fonts-style display-7"> Return Date: <?= $row['act_exp_date'] ?></p>
                                            <p class="mbr-text mbr-fonts-style display-7"> Locker No: <?= $row['locker_no'] ?></p>
                                        </div>
                                        <div class="col-12 col-md">
                                            <div class="card-box">
                                                <div class="row">
                                                    <div class="col-md">
                                                        <a data-toggle="modal" data-target="#myModal<?= $row['rfid_tag'] ?>" style="margin-left: 5% ;" class="btn btn-primary display-4">Return</a>
                                                    </div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" style="height: 100%;" id="myModal<?= $row['rfid_tag'] ?>" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <form method="post">
                                    <input type="hidden" name="act_exp_date" value="<?= $row['act_exp_date'] ?>">
                                    <input type="hidden" name="tag" value="<?= $row['rfid_tag'] ?>">
                                    <input type="hidden" name="locker" value="<?= $row['locker_no'] ?>">
                                    <input type="hidden" name="item" value="<?= $row['item_id'] ?>">
                                    <input type="hidden" name="pic" value="<?= $row['act_pic'] ?>">
                                    <input type="hidden" name="item_name" value="<?= $row['act_item_name'] ?>">
                                    <input type="hidden" name="boxno" value="<?= $row['act_boxno'] ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Do you want to proceed?</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <button type='submit' name='submit' class="btn btn-default">Yes</button>
                                            <button type='submit' name='submit' value="out" class="btn btn-default">No</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php  } ?>

                        </div>


                        <?php
                        if (isset($_POST['submit'])) {
                            $tag = $_POST['tag'];
                            $locker = $_POST['locker'];
                            $item = $_POST['item'];
                            $pic = $_POST['pic'];
                            $item_name = $_POST['item_name'];
                            $boxno = $_POST['boxno'];
                            $act_exp_date = $_POST['act_exp_date'];
                            $sts = $_POST['user_sts'];
                         
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
                                $sts = $row['user_sts'];
                            }
                            $limitt = $limit + 1;
                            $d = date("Y-m-d");
                            if ($act_exp_date < $d) {

                                $sql1 = " update tb_activity";
                                $sql1 .= " set";
                                $sql1 .= " act_flag='c'";
                                $sql1 .= " where";
                                $sql1 .= " rfid_tag='$tag' and act_type='b'";

                                $sql2 = " update tb_user";
                                $sql2 .= " set";
                                $sql2 .= " user_limit='$limitt'";
                                $sql2 .= " ,user_sts='p'";
                                $sql2 .= " where";
                                $sql2 .= " user_id = '$idd'";

                                $sql3 = " update tb_locker";
                                $sql3 .= " set";
                                $sql3 .= " locker_sts='r'";
                                $sql3 .= " where";
                                $sql3 .= " locker_no = '6'";

                                $sql12 = "SELECT * from tb_cate_item  where item_id=  '$item' ";
                                $result1 = $cls_conn->select_base($sql12);
                                while ($roww = mysqli_fetch_array($result1)) {
                                    // $ith_amount = $roww['ith_avalible'];
                                }
                                // $ith_amountup = $ith_amount + 1;

                                // $sql23 = " update tb_cate_item";
                                // $sql23 .= " set";
                                // $sql23 .= " ith_avalible='$ith_amountup'";
                                // $sql23 .= " where";
                                // $sql23 .= " item_id = '$item'";
                                // echo 

                                $sql4 = " insert into tb_activity(user_id,rfid_tag,locker_no,item_id,act_type,user_sts,act_exp_date,act_flag,act_pic,act_boxno,act_item_name)";
                                $sql4 .= " values ('$idd','$tag','$locker','$item','r','p','-','o','$pic','$boxno','$item_name')";

                                // $cls_conn->write_base($sql23) == true;
                                $cls_conn->write_base($sql1) == true;
                                $cls_conn->write_base($sql2) == true;
                                $cls_conn->write_base($sql3) == true;
                                $cls_conn->write_base($sql4) == true;
                            } else {

                                $sql1 = " update tb_activity";
                                $sql1 .= " set";
                                $sql1 .= " act_flag='c'";
                                $sql1 .= " where";
                                $sql1 .= " rfid_tag='$tag' and act_type='b'";

                                $sql12 = "SELECT * from tb_cate_item  where item_id=  '$item' ";
                                $result1 = $cls_conn->select_base($sql12);
                                while ($roww = mysqli_fetch_array($result1)) {
                                    $ith_amount = $roww['ith_avalible'];
                                }
                                // $ith_amountup = $ith_amount + 1;

                                // $sql23 = " update tb_cate_item";
                                // $sql23 .= " set";
                                // $sql23 .= " ith_avalible='$ith_amountup'";
                                // $sql23 .= " where";
                                // $sql23 .= " item_id = '$item'";

                                $sql2 = " update tb_user";
                                $sql2 .= " set";
                                $sql2 .= " user_limit='$limitt'";
                                $sql2 .= " where";
                                $sql2 .= " user_id = '$idd'";

                                $sql3 = " update tb_locker";
                                $sql3 .= " set";
                                $sql3 .= " locker_sts='r'";
                                $sql3 .= " where";
                                $sql3 .= " locker_no = '6'";

                                $sql4 = " insert into tb_activity(user_id,rfid_tag,locker_no,item_id,act_type,user_sts,act_exp_date,act_flag,act_pic,act_boxno,act_item_name)";
                                $sql4 .= " values ('$idd','$tag','$locker','$item','r','$sts','-','o','$pic','$boxno','$item_name')";

                                // $cls_conn->write_base($sql23) == true;
                                $cls_conn->write_base($sql1) == true;
                                $cls_conn->write_base($sql2) == true;
                                $cls_conn->write_base($sql3) == true;
                                $cls_conn->write_base($sql4) == true;
                            }
                            echo $cls_conn->show_message('Success');
                            if ($_POST['submit'] == 'out') {
                                echo $cls_conn->goto_page(1, 'logout.php');
                            } else {
                                echo $cls_conn->goto_page(1, 'return.php');
                            }
                        }
                        ?>
    </section>

    <section class="content11 cid-spwNySWLqS" id="content11-1j">
        <!-- <form method="post">

    <div  class="container row">
    <button type="submit" style="margin-left: 60% ;" name="submit" class="btn btn-primary display-4" >Submit</button>
    <a class="btn btn-primary display-4" style="margin-left: 2% ;" href="borrow.php">Cancel</a></div>
    </div>
  
</form> -->
        <!-- <?php
                //     if(isset($_POST['submit'])){

                //         $rndno=rand(100000, 999999);//OTP generate
                // $message = urlencode("otp number.".$rndno);
                // $to=$_POST['email'];
                // $subject = "OTP";
                // $txt = "OTP: ".$rndno."";
                // $headers = "From: otp@studentstutorial.com" . "\r\n" .
                // "CC: divyasundarsahu@gmail.com";
                // mail($to,$subject,$txt,$headers);
                // if(isset($_POST['submitt']))
                // {
                // $_SESSION['otp']=$rndno;
                // // echo $rndno;
                // }

                //         $sql = " insert into tb_otp(user_id,otp_no)";
                //         $sql .= " values ('$idd','$rndno')";

                //         if ($cls_conn->write_base($sql) == true) {
                //             echo $cls_conn->show_message('Success');


                //             echo $cls_conn->goto_page(1, 'logout.php');
                //             // echo $sql;
                //         } else {
                //             echo $cls_conn->show_message('Unsuccess');
                //         }
                //     }
                //     
                ?> -->
    </section>

    <section class="footer3 cid-s48P1Icc8J" once="footers" id="footer3-1g">





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
    <script src="assets/dropdown/js/nav-dropdown.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/theme/js/script.js"></script>



</body>

</html>