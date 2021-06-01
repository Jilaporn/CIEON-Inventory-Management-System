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


    <title>reserve</title>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .bt {
            color: black;
        }

        .btt {
            color: blue;

        }

        .button2 {
            background-color: #008CBA;
        }

        /* Blue */

        .button {
            background-color: #008CBA;
            /* Green */
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-left: 245px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <section class="engine"><a href="https://mobirise.info/f">simple web maker</a></section>
    <section class="features6 cid-spwRXGf7j6" id="features7-1u">
        <div class="container">
            <div class="card-wrapper">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-5">
                        <div class="image-wrapper">
                            <img src="assets/images/reserve.jpg" alt="Mobirise">
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="text-box">
                            <h5 class="mbr-title mbr-fonts-style display-2">
                                <strong>Reserve</strong>
                            </h5>
                            <p class="mbr-text mbr-fonts-style display-7">User can reserve the items through online. After user choose the items and submit the information. User will receive OTP via E-mail and fill that OTP on the panel in front of the locker to take the items inside the locker.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tabs content18 cid-spwRBF7Cbv" id="tabs1-1t">
        <!-- category on page -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h3 class="mbr-section-title mb-0 mbr-fonts-style display-2">
                        <strong>Categories</strong>
                    </h3>

                </div>
            </div>
            <form method="POST">
                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-md-8">
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item first mbr-fonts-style"><button type="submit" value="all" name="all" class="nav-link   display-7"> All</button></li>
                            <?php
                            $a = '1';
                            $sql = " SELECT
                             tb_cate_item.ith_cate_type
                             FROM
                             tb_cate_item                                                                                 
                             GROUP BY  tb_cate_item.ith_cate_type ";
                            $result = $cls_conn->select_base($sql);
                            while ($row = mysqli_fetch_array($result)) {   ?>
                                <li class="nav-item first mbr-fonts-style">
                                    <button type="submit" value="<?= $row['ith_cate_type']; ?>" name="submit" class="nav-link bt  display-7"> <?= $row['ith_cate_type']; ?></button>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </form>
            <?php if (isset($_POST['submit'])) {
                $type = $_POST['submit'];
                // echo $type; 
            }
            ?>
        </div>
        </div>
    </section>
    <!-- end category on page -->
    <section class="features3 cid-spwLAFqE33" id="features3-16">


        <div class="container">
            <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search for items..">
            <br>
            <div class="mbr-section-head">
                <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">Items</h4>

            </div>
            <div class="row mt-4" id="myItems">

                <?php
                // echo $type;
                // item on page
                if (isset($_POST['submit'])) {
                    // echo $type;
                    $a = '1';
                    $sql = "SELECT *,COUNT(itd_item_name) FROM `tb_item_detail` WHERE itd_cate_type = '".$type."' AND itd_item_sts = 'a' GROUP BY itd_item_name,itd_item_sts";
                   /*  $sql = " SELECT
                             tb_cate_item.item_id,
                             tb_cate_item.locker_no,
                             tb_cate_item.ith_cate_type,
                             tb_cate_item.ith_amount,
                             tb_cate_item.ith_avalible,
                             tb_cate_item.ith_date,
                             tb_item_detail.rfid_tag,
                             tb_item_detail.locker_no,
                             tb_item_detail.item_id,
                             tb_item_detail.itd_cate_type,
                             tb_item_detail.itd_item_name,
                             tb_item_detail.itd_item_pic,
                             tb_item_detail.itd_item_sts,
                             tb_item_detail.itd_boxno
                             FROM
                             tb_item_detail
                             INNER JOIN tb_cate_item ON tb_item_detail.item_id = tb_cate_item.item_id
                             where  tb_item_detail.itd_cate_type = '$type' and  tb_cate_item.ith_avalible > '0'
                             Group by tb_item_detail.itd_item_name                                                 
                             "; */
                    //  echo $type;
                } elseif (isset($_POST['all'])) {
                    $a = '1';
                    $sql = "SELECT *,COUNT(itd_item_name) FROM `tb_item_detail` WHERE itd_item_sts = 'a' GROUP BY itd_item_name,itd_item_sts";

                    /* $sql = " SELECT
                                tb_cate_item.item_id,
                                tb_cate_item.locker_no,
                                tb_cate_item.ith_cate_type,
                                tb_cate_item.ith_amount,
                                tb_cate_item.ith_avalible,
                                tb_cate_item.ith_date,
                                tb_item_detail.rfid_tag,
                                tb_item_detail.locker_no,
                                tb_item_detail.item_id,
                                tb_item_detail.itd_cate_type,
                                tb_item_detail.itd_item_name,
                                tb_item_detail.itd_item_pic,
                                tb_item_detail.itd_item_sts,
                                tb_item_detail.itd_boxno
                                FROM
                                tb_item_detail
                                INNER JOIN tb_cate_item ON tb_item_detail.item_id = tb_cate_item.item_id
                                where tb_cate_item.ith_avalible > '0'
                                
                                                               
                                Group by tb_item_detail.itd_item_name
                                                    
                                "; */
                } else {
                    $a = '1';
                    $sql = "SELECT *,COUNT(itd_item_name) FROM `tb_item_detail` WHERE itd_item_sts = 'a' GROUP BY itd_item_name,itd_item_sts";

                    /* $sql = " SELECT
                                tb_cate_item.item_id,
                                tb_cate_item.locker_no,
                                tb_cate_item.ith_cate_type,
                                tb_cate_item.ith_amount,
                                tb_cate_item.ith_avalible,
                                tb_cate_item.ith_date,
                                tb_item_detail.rfid_tag,
                                tb_item_detail.locker_no,
                                tb_item_detail.itd_cate_type,
                                tb_item_detail.itd_item_name,
                                tb_item_detail.itd_item_pic,
                                tb_item_detail.itd_item_sts,
                                tb_item_detail.itd_boxno
                                FROM
                                tb_item_detail
                                INNER JOIN tb_cate_item ON tb_item_detail.item_id = tb_cate_item.item_id
                                where tb_cate_item.ith_avalible > '0'
                                                            
                                Group by tb_item_detail.itd_item_name
                                  "; */
                }

                $result = $cls_conn->select_base($sql);
                while ($row = mysqli_fetch_array($result)) {
                    $product_qty = $row['ith_avalible'];



                ?>
                    <div class="item features-image сol-12 col-md-6 col-lg-4">
                        <div class="item-wrapper">
                            <div class="item-img">
                                <a href="info.php?id=<?= $row['itd_item_name'] ?>"><img src="../../backend/upload/<?= $row['itd_item_pic'] ?>" alt=""></a>
                            </div>
                            <div class="item-content">
                                <h5 class="item-title mbr-fonts-style display-7"><strong>Name: <?= $row['itd_item_name'] ?></strong></h5>
                                <!-- <p class="mbr-text mbr-fonts-style mt-3 display-7">Detail: <?= $row['category_detail'] ?></p> -->
                                <!-- <h5 class="item-title mbr-fonts-style display-7"><strong>Amount: <?= $product_qty ?></strong></h5> -->
                            </div>
                            <div class="mbr-section-btn item-footer mt-2">
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
    </section>
    <script>
        function myFunction() {
            var input, filter, cards, cardContainer, h5, title, i;
            input = document.getElementById("myFilter");
            filter = input.value.toUpperCase();
            cardContainer = document.getElementById("myItems");
            cards = cardContainer.getElementsByClassName("item");
            for (i = 0; i < cards.length; i++) {
                title = cards[i].querySelector(".item-content h5.item-title");
                if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>
    <!-- end item on page -->
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
    <script src="assets/dropdown/js/nav-dropdown.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/mbr-tabs/mbr-tabs.js"></script>
    <script src="assets/theme/js/script.js"></script>
</body>

</html>