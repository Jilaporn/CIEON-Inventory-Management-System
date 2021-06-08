<?php session_start(); ?>
<?php include('../../backend/class_conn.php'); ?>
<?php $cls_conn = new class_conn(); ?>
<?php

    if(!$_SESSION['user_id'] && ($_SERVER['REQUEST_URI'] != '/frontend/cieonui/index.php'))
    {
        header('Location: /backend/login.php');
    }

    include('check_otp.php');
?>
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
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        .img-12 {
            width: 50%;
        }
    </style>


</head>

<?php
echo $_SESSION['student'];
echo $_SESSION['teacher'];
$_SESSION['user_id'];
$idd = $_SESSION['user_id'];


if (isset($_SESSION['user_id'])) {
    $sqlu = " SELECT * from tb_user where user_id = '$idd' ";
    $resultu = $cls_conn->select_base($sqlu);
    // call array from database
    while ($rowu = mysqli_fetch_array($resultu)) {
        $user_id = $rowu['user_id'];
        $user_firstname = $rowu['user_firstname'];
        $user_no = $rowu['user_no'];
        $user_surname = $rowu['user_surname'];
        $user_email = $rowu['user_email'];
        $user_tel = $rowu['user_tel'];
        $user_status = $rowu['user_sts'];
        $user_position = $rowu['user_position'];
        $user_password = $rowu['user_password'];
        $user_limit=$rowu['user_limit'];
    }
    $date = date('Y-m-d');
    $sql = "SELECT * from tb_activity where tb_activity.user_id = '$user_id' and tb_activity.act_exp_date < '$date' and tb_activity.rfid_tag != '0' and tb_activity.act_type ='b' and tb_activity.act_flag != 'c' ";
    $re = $cls_conn->select_base($sql);
    $rea = $cls_conn->select_numrows($sql);
    while ($re = mysqli_fetch_array($re)){

     }
     if($rea > 0 & $user_status == 'n' ){
         $up="UPDATE tb_user set user_sts ='p'  where user_id = '$user_id' ";
         $cls_conn->select_base($up);
         echo $cls_conn->goto_page(0,'index.php');
     }
     
}
if (isset($_SESSION['student'])) {

?>

    <section class="menu cid-s48OLK6784" once="menu" id="menu1-h">

        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
            <div class="container">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="index.php">
                            <img src="assets/images/cieon-121x121.png" alt="Mobirise" style="height: 3.8rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="index.php">CIEON Inventory Management </a></span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <?php if ($user_status == 'p') { ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="lost.php">Lost</a></li>
                            <!-- <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="logout.php" > -->
                            <!-- <span class=" mobi-mbri-login mbr-iconfont mbr-iconfont-btn"></span></a></li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">List of Overdue date Item</a>
                                <div class="dropdown-menu">
                                    <?php $date = date('Y-m-d');
                                    $sql = "SELECT * from tb_activity where tb_activity.user_id = '$user_id' and tb_activity.act_exp_date < '$date' and tb_activity.rfid_tag != '0' and tb_activity.act_type ='b' and tb_activity.act_flag != 'c' ";
                                    $re = $cls_conn->select_base($sql);
                                    while ($row = mysqli_fetch_array($re)) {
                                        $act_date = $row['act_date'];
                                        $act_exp_date = $row['act_exp_date'];
                                    ?>
                                        <a class="text-black dropdown-item text-primary display-4" aria-expanded="false"><?= $row['act_item_name'] ?> box no:<?= $row['act_boxno'] ?></a>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><?= $user_firstname ?></a>
                                <div class="dropdown-menu">
                                
                                    <a class="text-black dropdown-item text-primary display-4" href="index.php?p=1">Profile</a>
                                    <a class="text-black dropdown-item text-primary display-4" href="logout.php" aria-expanded="false">Logout</a>
                                </div>
                            </li>

                            
                            <!-- <li class="nav-item"><a  data-toggle="modal" data-target="#myModal" class="nav-link link text-black text-primary display-4" >
                    <span class="fas fa-shopping-cart"></span></a></li> -->


                        <?php } else { ?>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">Features</a>
                                <div class="dropdown-menu">
                                    <a class="nav-link link text-black text-primary display-4" href="reserve.php">Reserve</a>
                                    <a class="nav-link link text-black text-primary display-4" href="extend.php">Extend</a>
                                    <a class="nav-link link text-black text-primary display-4" href="lost.php">Lost</a>
                                </div>
                            </li>
                                    <!-- <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="logout.php" > -->
                                    <!-- <span class=" mobi-mbri-login mbr-iconfont mbr-iconfont-btn"></span></a></li> -->

                                    <li class="nav-item dropdown">
                                        <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><?= $user_firstname ?></a>
                                        <div class="dropdown-menu">
                                            <a class="text-black dropdown-item text-primary display-4" href="profile.php">Profile</a>
                                            <a class="text-black dropdown-item text-primary display-4" href="logout.php" aria-expanded="false">Logout</a>
                                        </div>
                                    </li>
                                    

                                    <!-- <li class="nav-item"><a  data-toggle="modal" data-target="#myModal" class="nav-link link text-black text-primary display-4" >
                    <span class="fas fa-shopping-cart"></span></a></li> -->
                                </ul>
                            </div>
                            <!-- <li class="nav-item"><a  data-toggle="modal" data-target="#myModal" class="nav-link link text-black text-primary display-4" >
                    <span class="fas fa-shopping-cart"></span></a></li> -->

                            <!-- <li class="nav-item"><a  data-toggle="modal" data-target="#myModal" class="nav-link link text-black text-primary display-4" >
                    <span class=" mobi-mbri-login mbr-iconfont mbr-iconfont-btn"></span></a></li>
                    </ul>    -->


                        <?php } ?>

                    </div>
        </nav>

    </section>
    <!-- model -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Order list</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <?php
                    $idd = $_SESSION['user_id'];
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
        where  tb_reserve.user_id = '$idd'
        GROUP by tb_reserve.rs_item_name 
        ";
                    // echo $sql;
                    $result = $cls_conn->select_base($sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $all = $row['sum(tb_reserve.rs_amount)'];

                    ?>

                        <img src="../../backend/upload/<?= $row['rs_pic'] ?>" class="img-12"> <?= $row['rs_item_name'] ?> <?= $all ?>
                    <?php }
                    ?>
                    <!-- <p>Some text in the modal.</p> -->
                </div>
                <div class="modal-footer">
                    <a href="conclude.php" class="btn btn-default">Reserve</a>
                    <a href="index.php" class="btn btn-default">Back</a>
                </div>
            </div>

        </div>
    </div>
    <!-- model -->
<?php

} elseif ($_SESSION['teacher']) {
    
?>

    <section class="menu cid-s48OLK6784" once="menu" id="menu1-h">
        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
            <div class="container">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="https://mobiri.se">
                            <img src="assets/images/cieon-121x121.png" alt="Mobirise" style="height: 3.8rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="index.php">CIEON Inventory Management </a></span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if ($user_status == 'p') { ?>
                        <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="lost.php">Lost</a></li>
                            <!-- <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="logout.php" > -->
                            <!-- <span class=" mobi-mbri-login mbr-iconfont mbr-iconfont-btn"></span></a></li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">List of Overdue date Item</a>
                                <div class="dropdown-menu">
                                    <?php $date = date('Y-m-d');
                                    $sql = "SELECT * from tb_activity where tb_activity.user_id = '$user_id' and tb_activity.act_exp_date < '$date' and tb_activity.rfid_tag != '0' and tb_activity.act_type ='b' and tb_activity.act_flag != 'c' ";
                                    $re = $cls_conn->select_base($sql);
                                    while ($row = mysqli_fetch_array($re)) {
                                        $act_date = $row['act_date'];
                                        $act_exp_date = $row['act_exp_date'];
                                    ?>
                                        <a class="text-black dropdown-item text-primary display-4" aria-expanded="false"><?= $row['act_item_name'] ?> box no:<?= $row['act_boxno'] ?></a>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><?= $user_firstname ?></a>
                                <div class="dropdown-menu">
                                    <a class="text-black dropdown-item text-primary display-4" href="index.php?p=1">Profile</a>
                                    <a class="text-black dropdown-item text-primary display-4" href="logout.php" aria-expanded="false">Logout</a>
                                </div>
                            </li>
                            
                            <!-- <li class="nav-item"><a  data-toggle="modal" data-target="#myModal" class="nav-link link text-black text-primary display-4" >
                    <span class="fas fa-shopping-cart"></span></a></li> -->
                        </ul>

                    <?php } else { ?>
                        <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">Features</a>
                                <div class="dropdown-menu">
                                    <a class="nav-link link text-black text-primary display-4" href="reserve.php">Reserve</a>
                                    <a class="nav-link link text-black text-primary display-4" href="extend.php">Extend</a>
                                    <a class="nav-link link text-black text-primary display-4" href="lost.php">Lost</a>
                                </div>
                            </li>
                            <!-- <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="logout.php" > -->
                            <!-- <span class=" mobi-mbri-login mbr-iconfont mbr-iconfont-btn"></span></a></li> -->

                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><?= $user_firstname ?></a>
                                <div class="dropdown-menu">
                                    <a class="text-black dropdown-item text-primary display-4" href="profile.php">Profile</a>
                                    <a class="text-black dropdown-item text-primary display-4" href="logout.php" aria-expanded="false">Logout</a>
                                </div>
                            </li>

                            <!-- <li class="nav-item"><a  data-toggle="modal" data-target="#myModal" class="nav-link link text-black text-primary display-4" >
                    <span class="fas fa-shopping-cart"></span></a></li> -->
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </section>

    <!-- model -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Reserve list</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <?php
                    $idd = $_SESSION['user_id'];
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
        where  tb_reserve.user_id = '$idd' and tb_reserve.rs_flag ='o'
        GROUP by tb_reserve.rs_item_name 
        ";
                    // echo $sql;
                    $result = $cls_conn->select_base($sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $all = $row['sum(tb_reserve.rs_amount)'];

                    ?>

                        <img src="../../backend/upload/<?= $row['rs_pic'] ?>" class="img-12"> <?= $row['rs_item_name'] ?> <?= $all ?>
                    <?php }
                    ?>
                    <!-- <p>Some text in the modal.</p> -->
                </div>
                <div class="modal-footer">
                    <a href="conclude.php" class="btn btn-default">Reserve</a>
                    <a href="index.php" class="btn btn-default">Back</a>
                </div>
            </div>

        </div>
    </div>
    <!-- model -->
    </div>
<?php } else { ?>
    <section class="menu cid-s48OLK6784" once="menu" id="menu1-h">

        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
            <div class="container">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="index.php">
                            <img src="assets/images/cieon-121x121.png" alt="Mobirise" style="height: 3.8rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="../../backend/login.php">CIEON Inventory Management </a></span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">Features</a>
                                <div class="dropdown-menu">
                                    <a class="nav-link link text-black text-primary display-4" href="../../backend/login.php">Reserve</a>
                                    <a class="nav-link link text-black text-primary display-4" href="../../backend/login.php">Extend</a>
                                    <a class="nav-link link text-black text-primary display-4" href="../../backend/login.php">Lost</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                        <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">Login</a>
                            <div class="dropdown-menu">
                            <a class="text-black dropdown-item text-primary display-4" href="../../backend/login.php">Login</a>
                            <a class="text-black dropdown-item text-primary display-4" href="../../backend/register.php?po=t" aria-expanded="false">Register Teacher</a>
                                <a class="text-black dropdown-item text-primary display-4" href="../../backend/register.php?po=s" aria-expanded="false">Register Student</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php }
?>