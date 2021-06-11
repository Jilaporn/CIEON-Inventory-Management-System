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


    <title>Conclude List</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body>
    <?php include('header.php'); ?>


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
                        <em>Borrow Items List</em>
                    </p>
                    <hr class="line">
                </div>
            </div>
        </div>
    </section>

    <section class="features8 cid-spwNxYQxed" xmlns="http://www.w3.org/1999/html" id="features9-1i">


        <section class="features8 cid-spwNxYQxed" xmlns="http://www.w3.org/1999/html" id="features9-1i">
            <form method="POST" style="margin-left: 75%;">
                <button onclick="return confirm('Do you want to delete all items?')" type="submit" name="deleteall2" value="<?= $row['act_id'] ?>" class="btn  display-4">
                    <img src="outline_delete_forever_black_24dp.png" width="20%">

                </button>
                <a>Delete all items</a>
                <br>
                <br>
            </form>


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
                        where  tb_activity.user_id = '$idd'and tb_activity.act_type ='b' and tb_activity.act_flag ='o' and tb_activity.rfid_tag = '0'
                        GROUP by tb_activity.act_item_name 
                        ";
                // echo $sql;
                $result = $cls_conn->select_base($sql);
                while ($row = mysqli_fetch_array($result)) {
                    $all = $row['count(tb_activity.act_item_name)'];
                    $act_date = $row['act_date'];
                    $item_id = $row['item_id'];
                    $item_name = $row['act_item_name'];
                    // $datedate = date("Y-m-d", strtotime("+7 day", strtotime($act_date)));
                    $act_exp_date = $row['act_exp_date'];
                    $lockerno = $row['locker_no'];
                    if (isset($_POST['deleteall2'])) {
                        //echo 'ddd';
                        $cat = "UPDATE tb_cate_item set ith_avalible = ith_avalible +'$all' where item_id ='$item_id' ";
                        $cls_conn->write_base($cat);

                        $sql223 = "UPDATE tb_item_detail SET itd_item_sts = 'a' WHERE itd_item_sts = 'rs' AND itd_item_name = '" . $item_name . "'";
                        $cls_conn->write_base($sql223);

                        //echo $sql223;
                        // echo 'ddd';

                    }
                    // if (isset($_POST['submit'])) {

                    //     // echo $item_id;

                    //     $sql1 = "SELECT * from tb_cate_item  where item_id= '$item_id' ";
                    //     $result1 = $cls_conn->select_base($sql1);
                    //     while ($roww = mysqli_fetch_array($result1)) {
                    //         $ith_amount = $roww['ith_avalible'];
                    //         $upitem = $ith_amount - $all ;
                    //     $sqlupit = "UPDATE tb_cate_item set ith_avalible = '$upitem' where item_id= '$item_id'  ";
                    //     $cls_conn->write_base($sqlupit)==true;

                    //     }


                    //     // echo $row['ith_avalible'];

                    //     // $sql = "UPDATE tb_cate_item set  ";

                    // }

                ?>


                    <div class="card">
                        <div class="card-wrapper">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-4">
                                    <div class="image-wrapper">
                                        <img src="../../backend/upload/<?= $row['act_pic'] ?>" alt="">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="card-title mbr-fonts-style display-5">
                                                <strong><?= $row['act_item_name'] ?></strong>
                                            </h6>
                                            <p class="mbr-text mbr-fonts-style display-7"> Return before: <?= $act_exp_date ?></p>
                                            <p class="mbr-text mbr-fonts-style display-8" style="color: red"> *Item must be returned in seven days after it is borrowed.</p>
                                            <p class="mbr-text mbr-fonts-style display-7"> locker no: <?= $lockerno ?></p>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="price mbr-fonts-style display-2">Amount: <?= $all ?></p>
                                            <form method="post">
                                                <div class="row">

                                                    <button type="submit" name="delete" style="margin-left: 1%;" value="<?= $row['act_id'] ?>" class="btn btn-primary display-4">---</button>
                                                    <button type="submit" name="create" style="margin-left: 1%;" value="<?= $row['act_id'] ?>" class="btn btn-primary display-4">+</button>
                                                    <button onclick="return confirm('Do you want to delete this item?')" type="submit" style="margin-left: 1%;" name="deleteall" value="<?= $row['act_id'] ?>" class="btn btn-primary display-4">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>&nbspDelete item
                                                    </button>
                                                    <input type="hidden" name="item_id" value="<?= $item_id ?>">
                                                    <input type="hidden" name="item_name" value="<?= $row['act_item_name'] ?>">
                                                    <input type="hidden" name="all" value="<?= $all ?>">
                                                    <input type="hidden" name="pic" value="<?= $row['act_pic'] ?>">
                                                    <input type="hidden" name="cate_type" value="<?= $row['cate_type'] ?>">
                                                    <input type="hidden" name="lockerno" value="<?= $row['locker_no'] ?>">
                                                    <!-- <input type="text" name="locker_no" value="<?= $lockerno ?>"> -->
                                                    <!-- <div class="mbr-section-btn"><a href="https://mobiri.se" class="btn btn-primary display-4"><span class="mobi-mbri mobi-mbri-plus mbr-iconfont mbr-iconfont-btn"></span>0</a></div> -->
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['submit'])) {
                        $no = $_POST['locker_no'];
                        // echo $no;

                        $up = "UPDATE tb_locker set locker_sts ='b' where locker_no = '$lockerno' and locker_sts ='c' ";
                        // echo $up;
                        $cls_conn->write_base($up);
                    }
                    ?>
                <?php  } ?>
            </div>
            </div>
            <?php if (isset($_POST['deleteall2'])) {

                $select = "SELECT *,count(tb_activity.act_item_name)
                            from tb_activity 
                            where  tb_activity.user_id = '$idd' AND rfid_tag = '0' and act_flag ='o' ";
                $re = $cls_conn->select_base($select);
                while ($row = mysqli_fetch_array($re)) {
                    $sumitem = $row['count(tb_activity.act_item_name)'];
                }
                // echo $sumitem;
                // echo 'ddd';
                $sql = "DELETE from tb_activity where user_id ='$idd' and act_type ='b' and rfid_tag ='0' ";
                $update = "UPDATE tb_user set user_limit = user_limit + '$sumitem'  where user_id='$idd' ";
                $cls_conn->write_base($sql);
                $cls_conn->write_base($update);
                echo $cls_conn->goto_page(0, 'conclude.php');
            } ?>
            </div>
        </section>
        <?php
        // echo $_SESSION['student'];
        // echo $_SESSION['teacher'];
        if (isset($_POST['deleteall'])) {
            $rs_id = $_POST['delete'];
            $item_id = $_POST['item_id'];
            $item_name = $_POST['item_name'];
            $rs_amount = $_POST['all'];
            // echo $rs_id; 
            if ($_SESSION['student']) {
                $sql = "DELETE from tb_activity where user_id = '$idd' and act_type ='b' and act_item_name ='$item_name' and act_flag ='o'  ";
                $cls_conn->write_base($sql);
                // echo 'ddddd';
                $sql22 = "UPDATE tb_item_detail SET itd_item_sts = 'a' WHERE itd_item_sts = 'rs' AND itd_item_name = '$item_name' ";
                $sql23 = "UPDATE tb_cate_item SET ith_avalible = ith_avalible + '$rs_amount' WHERE item_id = '$item_id' ";
                $sql4 = "UPDATE tb_user SET user_limit = user_limit + '$rs_amount' WHERE user_id = '$idd' and user_limit < 10 ";
                $cls_conn->write_base($sql22);
                $cls_conn->write_base($sql23);
                $cls_conn->write_base($sql4);
                echo $cls_conn->goto_page(0, 'conclude.php');
            } elseif ($_SESSION['teacher']) {
                $sql = "DELETE from tb_activity where user_id = '$idd' and act_type ='b' and act_item_name ='$item_name' and act_flag ='o'  ";
                $cls_conn->write_base($sql);
                // echo 'ddddd';
                $sql22 = "UPDATE tb_item_detail SET itd_item_sts = 'a' WHERE itd_item_sts = 'rs' AND itd_item_name = '$item_name' ";
                $sql23 = "UPDATE tb_cate_item SET ith_avalible = ith_avalible + '$rs_amount' WHERE item_id = '$item_id' ";
                $sql4 = "UPDATE tb_user SET user_limit = user_limit + '$rs_amount' WHERE user_id = '$idd' and user_limit < 20 ";
                $cls_conn->write_base($sql21);
                $cls_conn->write_base($sql22);
                $cls_conn->write_base($sql23);
                $cls_conn->write_base($sql4);
                echo $cls_conn->goto_page(0, 'conclude.php');
            }
        } elseif (isset($_POST['delete'])) {
            $act_id = $_POST['delete'];
            $item_id = $_POST['item_id'];
            $item_name = $_POST['item_name'];
            if ($_POST['all'] <= 1) {
            } else {
                // echo $rs_id; 
                if ($_SESSION['student']) {
                    $sql = "DELETE from tb_activity where act_id ='$act_id' ";
                    $cls_conn->write_base($sql);
                    $sql22 = "UPDATE tb_item_detail SET itd_item_sts = 'a' WHERE itd_item_sts = 'rs' AND itd_item_name = '" . $item_name . "' LIMIT 1";
                    $sql23 = "UPDATE tb_cate_item SET ith_avalible = ith_avalible + '1' WHERE item_id = '" . $item_id . "';";
                    $sql4 = "UPDATE tb_user SET user_limit = user_limit + '1' WHERE user_id = '$idd' and user_limit <'10' LIMIT 1";
                    $cls_conn->write_base($sql22);
                    $cls_conn->write_base($sql23);
                    $cls_conn->write_base($sql4);
                    echo $cls_conn->goto_page(0, 'conclude.php');
                } elseif ($_SESSION['teacher']) {
                    $sql = "DELETE from tb_activity where where act_id ='$act_id' ";
                    $cls_conn->write_base($sql);
                    $sql22 = "UPDATE tb_item_detail SET itd_item_sts = 'a' WHERE itd_item_sts = 'rs' AND itd_item_name = '" . $item_name . "' LIMIT 1";
                    $sql23 = "UPDATE tb_cate_item SET ith_avalible = ith_avalible + '1' WHERE item_id = '" . $item_id . "';";
                    $sql4 = "UPDATE tb_user SET user_limit = user_limit + '1' WHERE user_id = '$idd' and user_limit <'20' LIMIT 1";
                    $cls_conn->write_base($sql22);
                    $cls_conn->write_base($sql23);
                    $cls_conn->write_base($sql4);
                    echo $cls_conn->goto_page(0, 'conclude.php');
                }
            }
        } elseif (isset($_POST['create'])) {
            $rs_id = $_POST['delete'];
            $item_id = $_POST['item_id'];
            $item_name = $_POST['item_name'];
            $rs_amount = $_POST['rs_amount'];
            $pic = $_POST['pic'];
            $cate_type = $_POST['cate_type'];
            $lockerno = $_POST['lockerno'];

            $sqll9 = "SELECT * from tb_cate_item where item_id = '$item_id'
        ";
            $ree9 = $cls_conn->select_base($sqll9);
            while ($row = mysqli_fetch_array($ree9)) {
                $item_id = $row['item_id'];
                $ith_avalible = $row['ith_avalible'];
            }
                // echo $ith_avalible;
                // echo $ith_amount;
            ;
            $seuser = "SELECT * from tb_user 
         where user_id ='$idd'";
            $reuser = $cls_conn->select_base($seuser);
            while ($row = mysqli_fetch_array($reuser)) {
                $limit = $row['user_limit'];
            }
            // echo $limit;
            $alllimit =  $limit - 1;
            $allavalible = $ith_avalible - 1;
            // echo $alllimit ;
            if (1 > $ith_avalible) {
                echo $cls_conn->show_message('Unfortunately, the following item that you borrow are now out-of-stock.');
            } elseif (1 > $all) {
                echo $cls_conn->show_message('Unfortunately, the following item that you borrow are now out-of-stock.');
            } elseif (0 > $alllimit) {
                echo $cls_conn->show_message('Borrow limit amount has been reached');
            } else {



                $get_item_limit = "SELECT * FROM tb_item_detail WHERE itd_item_name = '" . $item_name . "' AND itd_item_sts = 'a'";

                $get_item_limit = mysqli_fetch_assoc($cls_conn->select_base($get_item_limit));
                // echo $get_item_limit['item_detail_id'];

                if ($get_item_limit['item_detail_id']) {
                    $sql1 = " update tb_user";
                    $sql1 .= " set";
                    $sql1 .= " user_limit='$alllimit'";
                    $sql1 .= " where";
                    $sql1 .= " user_id='$idd'";
                    $cls_conn->write_base($sql1) == true;


                    $sql12 = " update tb_cate_item";
                    $sql12 .= " set";
                    $sql12 .= " ith_avalible='$allavalible'";
                    $sql12 .= " where";
                    $sql12 .= " item_id='$item_id'";
                    $cls_conn->write_base($sql12) == true;

                    $datedatee = date("Y/m/d/ H:i:s");

                    $datedate = date("Y-m-d", strtotime("+7 day", strtotime($datedatee)));

                    $a = 1;
                    while ($a <= 1) {
                        $sqlactivity2 = " insert into tb_activity(user_id,locker_no,item_id,act_type,user_sts,act_exp_date,act_flag,act_pic,act_item_name,rfid_tag)";
                        $sqlactivity2 .= " values ('$idd','$lockerno','$item_id','b','n','$datedate','o','$pic','$item_name','0')";
                        $cls_conn->write_base($sqlactivity2) == true;
                        $a++;
                    }

                    $update_reserve = "UPDATE tb_item_detail SET itd_item_sts = 'rs' WHERE itd_item_sts = 'a' AND itd_item_name = '" . $item_name . "' LIMIT " . 1 . ";";
                    $cls_conn->select_base($update_reserve);


                    $sql2 = "SELECT * from tb_cate_item where item_id = $item_id ";
                    $result = $cls_conn->select_base($sql2);
                    while ($row = mysqli_fetch_array($result)) {
                        $ith_avalible = $row['ith_avalible'];
                    }
                    $minus = $ith_avalible - $num;
                    if ($cls_conn->write_base($sql) == true) {


                        echo $cls_conn->goto_page(0, 'conclude.php');
                        // echo $sql;
                    } else {
                        echo $cls_conn->show_message('Unsuccess');
                    }
                } else {
                    echo $cls_conn->show_message('Unfortunately, the following item that you borrow are now out-of-stock.');
                }
            }
        }

        ?>
        <section class="content11 cid-spwNySWLqS" id="content11-1j">
            <form method="post">

                <div class="container row">

                    <button type="submit" style="margin-left: 31% ; width: 50%; " name="submit" class="btn btn-primary display-4">Borrow</button>
                </div><br>

                <div class="container row">

                    <a style="margin-left: 31% ; width: 50%; " class="btn btn-primary display-4" href='borrow.php'>Back</a>

                </div><br>

                <!-- <div  class="container row">
    <a class="btn btn-primary display-4" style="margin-left: 31% ; width: 50% ;" href="reserve.php">Cancel</a></div>
    </div> -->

            </form>
            <?php
            if (isset($_POST['submit'])) {
                $txt = "";
                $list_item = [];
                $sql78 = "SELECT * FROM `tb_activity` WHERE user_id = '$idd' AND act_type = 'b' AND act_flag = 'o'";
                $ree = $cls_conn->select_base($sql78);
                while ($sql = mysqli_fetch_array($ree)) {
                    $act_id = $sql['act_id'];
                    $itemid = $sql['item_id'];
                    $itemname = $sql['act_item_name'];
                    if ($sql78['act_id']) {
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
                        
                        where  tb_activity.user_id = '$idd'and tb_activity.act_type ='b' and tb_activity.act_flag ='o' and tb_activity.rfid_tag = '0' and tb_activity.act_id ='$act_id'
                        ";
                        // echo $sql.'<br>';
                        $result = $cls_conn->select_base($sql);
                        
                        while ($row = mysqli_fetch_array($result)) {
                            
                        
                            $txt .= "\nLists :" . $row['act_item_name'] . "\nAmount :" . $row['count(tb_activity.act_item_name)'] . "\nReturn date:" . $row['act_exp_date'];
                            
                        }
                        // echo $txt.'<br>';
                    }
                    $sql1 = " update tb_item_detail";
                    $sql1 .= " set";
                    $sql1 .= " itd_item_sts='a'";
                    $sql1 .= " where";
                    $sql1 .= " item_id = '$itemid' and itd_item_sts = 'rs' and itd_item_name='$itemname' limit 1";
                    $cls_conn->select_base($sql1);
                    // echo $sql1.'<br>';
                }
                //end loop
                $to = "user <$user_email>";
                $subject = "Borrowed List";
                $headers = "From: <cieonkmitl@gmail.com>" . "\r\n" . "Reply-To:$user_email " .
                    "CC: cieonkmitl <cieonkmitl@gmail.com>";
                mail($to, $subject, $txt, $headers);
                if ($cls_conn->write_base($sql) == true) {

                    
                    echo $cls_conn->show_message('Success');

                    echo $cls_conn->goto_page(1, 'logout.php');
                    // echo $sql;
                } 
                else 
                {
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