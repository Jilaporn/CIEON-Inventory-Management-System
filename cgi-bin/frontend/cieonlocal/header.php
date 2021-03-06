<?php session_start(); ?>
<?php include('../../backend/class_conn.php'); ?>
<?php $cls_conn = new class_conn(); ?>
<?php
if (!$_SESSION['user_id'] && ($_SERVER['REQUEST_URI'] != '/frontend/cieonlocal/index.php')) {
    header('Location: /frontend/cieonlocal/login.php');
}


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
    ] <style>
        .pro29 {
            /* width: 100%; */
            height: auto;
        }

        mark {
            border-radius: 40%;
            background-color: red;
            color: white;
            font-size: 12px;
        }
    </style>


</head>

<?php
echo $_SESSION['student'];
echo $_SESSION['teacher'];
$_SESSION['user_id'];
$idd = $_SESSION['user_id'];


if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['student'];
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
        $user_limit = $rowu['user_limit'];
    }
}

$sqlm="SELECT 
count(tb_activity.act_item_name),
tb_activity.act_type,
tb_activity.act_flag,
tb_activity.rfid_tag,
tb_activity.user_id
 from tb_activity 
where  tb_activity.user_id = '$idd' and tb_activity.act_type ='b' and tb_activity.act_flag ='o' and tb_activity.rfid_tag = '0'   ";
$re =$cls_conn->select_base($sqlm);
while($row = mysqli_fetch_array($re)){
    $allreserve = $row['count(tb_activity.act_item_name)'];
}

if ($_SESSION['student']) {
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
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="index.php">CIEON Inventory Management</a></span>
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
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php?p=1">Borrow</a></li>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="return.php">Return</a></li>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="broken.php">Broken</a></li>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php?p=1">Enter OTP</a></li>

                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><?= $user_firstname ?></a>
                                <div class="dropdown-menu">
                                    <a class="text-black dropdown-item text-primary display-4" href="index.php?p=1">Profile</a>
                                    <a class="text-black dropdown-item text-primary display-4" href="logout.php" aria-expanded="false">Logout</a>
                                </div>
                            </li>
                            <li class="nav-item"><a data-toggle="modal" data-target="#myModal" class="nav-link link text-black text-primary display-4">
                                    <span class="mobi-mbri mobi-mbri-cart-add mbr-iconfont mbr-iconfont-btn"></span><mark><?=$allreserve?></mark></span></a></li>
                        </ul>
                    </div>

                <?php } else { ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">Features</a>
                                <div class="dropdown-menu">
                                    <a class="nav-link link text-black text-primary display-4" href="login.php">Borrow</a>
                                    <a class="nav-link link text-black text-primary display-4" href="login.php">Return</a>
                                    <a class="nav-link link text-black text-primary display-4" href="login.php">Broken</a>
                                    <a class="nav-link link text-black text-primary display-4" href="login.php">Enter OTP</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><?= $user_firstname ?></a>
                                <div class="dropdown-menu">
                                    <a class="text-black dropdown-item text-primary display-4" href="profile.php">Profile</a>
                                    <a class="text-black dropdown-item text-primary display-4" href="logout.php" aria-expanded="false">Logout</a>
                                </div>
                            </li>
                            <li class="nav-item"><a data-toggle="modal" data-target="#myModal" class="nav-link link text-black text-primary display-4">
                                    <span class="mobi-mbri mobi-mbri-cart-add mbr-iconfont mbr-iconfont-btn"></span><mark><?=$allreserve?></mark></span></a></li>
                        </ul>
                    </div>

                <?php } ?>
            </div>
        </nav>

    </section>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content pro29">
                <div class="modal-header">
                    <h4 class="modal-title">Borrow list</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body row mt-4">

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
          
        where  tb_activity.user_id = '$idd' and tb_activity.act_type ='b' and tb_activity.act_flag ='o' and tb_activity.rfid_tag = '0' 
        GROUP by tb_activity.act_item_name
        ";
                    // echo $sql;
                    $result = $cls_conn->select_base($sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $all = $row['count(tb_activity.act_item_name)'];

                    ?>

                        <div class="col-md-4 ">
                            <div class="item-wrapper">
                                <div class="item-img">
                                    <img src="../../backend/upload/<?= $row['act_pic'] ?>" alt="">
                                </div>
                                <div class="item-content">
                                    <h5 class="item-title mbr-fonts-style display-7"><strong>Name: <?= $row['act_item_name'] ?></strong></h5>
                                    <h5 class="item-title mbr-fonts-style display-7"><strong>Amount: <?= $all ?></strong></h5>
                                </div>
                                <div class="mbr-section-btn item-footer mt-2">
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <!-- <p>Some text in the modal.</p> -->
                </div>
                <div class="modal-footer">
                    <a href="conclude.php" class="btn btn-default">Borrow</a>
                    <a href="borrow.php" class="btn btn-default">Cancel</a>
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
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="index.php">CIEON Inventory Management</a></span>
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
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php?p=1">Borrow</a></li>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="return.php">Return</a></li>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="broken.php">Broken</a></li>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php?p=1">Enter OTP</a></li>

                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">fff</a>
                                <div class="dropdown-menu">
                                    <a class="text-black dropdown-item text-primary display-4" href="index.php?p=1">Profile</a>
                                    <a class="text-black dropdown-item text-primary display-4" href="logout.php" aria-expanded="false">Logout</a>
                                </div>
                            </li>
                            <li class="nav-item"><a data-toggle="modal" data-target="#myModal" class="nav-link link text-black text-primary display-4">
                                    <span class="mobi-mbri mobi-mbri-cart-add mbr-iconfont mbr-iconfont-btn"></span></a></li>
                        </ul>
                </div>
            <?php } else { ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                        <li class="nav-item dropdown">
                            <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">Features</a>
                            <div class="dropdown-menu">
                                <a class="nav-link link text-black text-primary display-4" href="borrow.php">Borrow</a>
                                <a class="nav-link link text-black text-primary display-4" href="return.php">Return</a>
                                <a class="nav-link link text-black text-primary display-4" href="broken.php">Broken</a>
                                <a class="nav-link link text-black text-primary display-4" href="otp.php">Enter OTP</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><?= $user_firstname ?></a>
                            <div class="dropdown-menu">
                                <a class="text-black dropdown-item text-primary display-4" href="profile.php">Profile</a>
                                <a class="text-black dropdown-item text-primary display-4" href="logout.php" aria-expanded="false">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item"><a data-toggle="modal" data-target="#myModal" class="nav-link link text-black text-primary display-4">
                                <span class="mobi-mbri mobi-mbri-cart-add mbr-iconfont mbr-iconfont-btn"></span></a></li>
                    </ul>
                </div>

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
                    <h4 class="modal-title">Borrow list</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body row mt-4">

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
          
        where  tb_activity.user_id = '$idd' and tb_activity.act_type ='b' and tb_activity.act_flag ='o' and tb_activity.rfid_tag = '0'
        GROUP by tb_activity.act_item_name
        ";
                    // echo $sql;
                    $result = $cls_conn->select_base($sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $all = $row['count(tb_activity.act_item_name)'];

                    ?>


                        <div class="col-md-4 ">
                            <div class="item-wrapper">
                                <div class="item-img">
                                    <img src="../../backend/upload/<?= $row['act_pic'] ?>" alt="">
                                </div>
                                <div class="item-content">
                                    <h5 class="item-title mbr-fonts-style display-7"><strong>Name: <?= $row['act_item_name'] ?></strong></h5>
                                    <h5 class="item-title mbr-fonts-style display-7"><strong>Amount: <?= $all ?></strong></h5>
                                </div>
                                <div class="mbr-section-btn item-footer mt-2">
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <!-- <p>Some text in the modal.</p> -->
                </div>
                <div class="modal-footer">
                    <a href="conclude.php" class="btn btn-default">Borrow</a>
                    <a href="index.php" class="btn btn-default">Cancel</a>
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
                        <a href="https://mobiri.se">
                            <img src="assets/images/cieon-121x121.png" alt="Mobirise" style="height: 3.8rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="login.php">CIEON Inventory Management</a></span>
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
                                <a class="nav-link link text-black text-primary display-4" href="login.php">Borrow</a>
                                <a class="nav-link link text-black text-primary display-4" href="login.php">Return</a>
                                <a class="nav-link link text-black text-primary display-4" href="login.php">Broken</a>
                                <a class="nav-link link text-black text-primary display-4" href="login.php">Enter OTP</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mobi-mbri mobi-mbri-login mbr-iconfont mbr-iconfont-btn"></span>
                                Login</a>
                            <div class="dropdown-menu"><a class="text-black dropdown-item text-primary display-4" href="login.php">Login</a>
                                <a class="text-black dropdown-item text-primary display-4" href="register.php" aria-expanded="false">Register</a>
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"></a>
                                <a class="text-black dropdown-item text-primary display-4" href="../../backend/register.php?po=t" aria-expanded="false">Register Teacher</a>
                                <a class="text-black dropdown-item text-primary display-4" href="../../backend/register.php?po=s" aria-expanded="false">Register Student</a>
                            </div>
                        </li>
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