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


    <title>Borrow</title>
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
    <link rel="stylesheet" href="//studentstutorial.com/div/d.css">
    <style>
        .bt {
            color: black;
        }
    </style>


</head>

<body>

    <?php include('header.php'); ?>
    <section class="engine"><a href="https://mobirise.info/f">simple web maker</a></section>
    <section class="features6 cid-spwRXGf7j6" id="features7-1u">
        <!---->

        <?php
        if (isset($_GET["id"])) {
            $id = $_GET['id'];

            $sql = " SELECT
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
           count(tb_item_detail.itd_item_name),
            tb_item_detail.itd_item_name,
            tb_item_detail.itd_item_pic,
            tb_item_detail.itd_item_sts,
            tb_item_detail.itd_boxno
            FROM
            tb_cate_item
            INNER JOIN tb_item_detail ON tb_cate_item.item_id = tb_item_detail.item_id AND tb_cate_item.ith_cate_type = tb_item_detail.itd_cate_type
            where tb_item_detail.itd_item_name = '$id'  and  tb_item_detail.itd_item_sts = 'a'
    ";
        }
        $result = $cls_conn->select_base($sql);
        while ($row = mysqli_fetch_array($result)) {
            $item_pic = $row['itd_item_pic'];
            $item_name = $row['itd_item_name'];
            $item_type = $row['itd_cate_type'];
            $rfid_tag = $row['rfid_tag'];
            $locker_no = $row['locker_no'];
            $item_id = $row['item_id'];
            $cate_type = $row['cate_type'];
            $count = $row['count(tb_item_detail.itd_item_name)'];
            $avamount =$row['ith_avalible'];
            // echo $row['count(tb_item_detail.itd_item_name)'];
        }

        ?>

        <div class="container">
            <div class="card-wrapper">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-5">
                        <div class="image-wrapper">
                            <img src="../../backend/upload/<?= $item_pic ?>" alt="Mobirise">
                        </div>
                    </div>
                    <form method="post">
                        <div class="col-12 col-lg">
                            <div class="text-box">
                                <h5 class="mbr-title mbr-fonts-style display-2">
                                    <strong><?= $item_name ?></strong>
                                </h5><br>
                                <p class="mbr-text mbr-fonts-style display-7">Type:&nbsp;<?= $item_type ?></p>
                                <!-- <p class="mbr-text mbr-fonts-style display-7">Tag Number:&nbsp;<?= $rfid_tag ?></p> -->
                                <p class="mbr-text mbr-fonts-style display-7">Locker Number:&nbsp;<?= $locker_no ?></p>
                                <p class="mbr-text mbr-fonts-style display-7">Amount in Stock:&nbsp;<?= $count ?></p>
                                <form method="POST">
                                    <input type="hidden" name="category_id" value="<?= $category_id ?>" class="form-control">
                                    <select type="number" name="num" value="0" max="<?= $position_limit ?>" min="1" class="form-control" mobile>
                                        <?
                                            for($i=1;$i<=$count;$i++)
                                            {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }

                                        ?>
                                    </select>
                                    <br>
                                    <button type="submit" name="submitt" value="submit" class="w3-btn w3-green w3-round">Borrow</button>
                                </form>
                                <br>
                            </div>
                        </div>
                    </form>
                    <!-- insert item to cart -->
                    <?php
                    if (isset($_POST['submitt'])) {
                        $category_id = $_POST['category_id'];
                        $num = $_POST['num'];
                        $user = $_SESSION['user_id'];

                        session_start();

                        $sqll7 = "SELECT * from tb_user where user_id ='$user' ";
                        $ree = $cls_conn->select_base($sqll7);
                        while ($row = mysqli_fetch_array($ree)) {
                            $email = $row['user_email'];
                            $phone = $row['user_tel'];
                            $name = $row['user_firstname'];
                        }


                        $sqll9 = "SELECT * from tb_cate_item where item_id = '$item_id'
                            ";
                        $ree9 = $cls_conn->select_base($sqll9);
                        while ($row = mysqli_fetch_array($ree9)) {
                            $item_id = $row['item_id'];
                            $ith_avalible = $row['ith_avalible'];
                        }
                        ;
                        $seuser = "SELECT * from tb_user 
                             where user_id ='$idd'";
                        $reuser = $cls_conn->select_base($seuser);
                        while ($row = mysqli_fetch_array($reuser)) {
                            $limit = $row['user_limit'];
                            $day = $row['user_br_day'];
                        }
                        // echo $limit;
                        $alllimit =  $limit - $num;
                        // echo $alllimit ;
                        if ($allamount + $num > $ith_avalible) {
                            echo $cls_conn->show_message('Amount overdue');
                        } elseif ($num > $count) {
                            echo $cls_conn->show_message('Overbooked');
                        } elseif (0 > $alllimit) {
                            echo $cls_conn->show_message('Borrow limit amount has been reached');
                        } else {

                            
                           
                            $allavalible = $ith_avalible - $num;

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


                            $datedatee = date ("Y/m/d/ H:i:s");
                            
                            $datedate = date ("Y-m-d", strtotime("+$day day", strtotime($datedatee))); 

                            $a = 1;
                            while($a<= $num){
                            $sqlactivity2 = " insert into tb_activity(user_id,locker_no,item_id,act_type,user_sts,act_exp_date,act_flag,act_pic,act_item_name,rfid_tag)";
                            $sqlactivity2 .= " values ('$idd','$locker_no','$item_id','b','n','$datedate','o','$item_pic','$item_name','0')";
                            $cls_conn->write_base($sqlactivity2) == true;
                            $a++;
                            }

                            $sql2 = "SELECT * from tb_cate_item where item_id = $item_id ";
                            $result = $cls_conn->select_base($sql2);
                            while ($row = mysqli_fetch_array($result)) {
                                $ith_avalible = $row['ith_avalible'];
                            }
                            $minus = $ith_avalible - $num;

                            $get_item_limit = "SELECT * FROM tb_item_detail WHERE itd_item_name = '".$item_name."' AND itd_item_sts = 'a'";
                            $get_item_limit = mysqli_fetch_assoc($cls_conn->select_base($get_item_limit));
                            if($get_item_limit['item_detail_id'])
                            {
                                $update_reserve = "UPDATE tb_item_detail SET itd_item_sts = 'rs' WHERE  itd_item_name = '".$item_name."' AND itd_item_sts ='a' LIMIT ".$num.";";
                                $cls_conn->select_base($update_reserve);
                            }
                            else
                            {
                                echo $cls_conn->show_message('Sorry! Item you want to reserve is now run out!');
                            }



                            if ($cls_conn->write_base($sqlactivity1) == true) {
                                echo $cls_conn->show_message('Success');
                                // echo  $sqlactivity1;
                                // echo  $sqlactivity2;

                                echo $cls_conn->goto_page(1, 'borrow.php');
                                // echo $sql;
                            } else {
                                echo $cls_conn->show_message('Unsuccess');
                            }
                        }
                    }
                    ?>
                    <!-- end of insert itme to cart -->
                </div>
            </div>
        </div>

        <!-- item on lower part -->
    </section>
    <section class="features3 cid-spwLAFqE33" id="features3-16">
        <div class="container">
            <div class="mbr-section-head">
                <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">Items<?php  
                // echo $sqlactivity1;
                // echo  $sqlactivity1; 
                ?></h4>
            </div>
            <div class="row mt-4">

                <?php
                // echo $item_name;
                $sql = " SELECT
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
 tb_cate_item
 INNER JOIN tb_item_detail ON tb_cate_item.item_id = tb_item_detail.item_id AND tb_cate_item.ith_cate_type = tb_item_detail.itd_cate_type
 where tb_item_detail.itd_item_name != '$item_name' and  tb_item_detail.itd_cate_type = '$item_type' 
 GROUP by tb_item_detail.itd_item_name";
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
                <?php } ?>


            </div>
        </div>
    </section>
    <section class="tabs content18 cid-spwRBF7Cbv" id="tabs1-1t">




        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h3 class="mbr-section-title mb-0 mbr-fonts-style display-2">


                </div>
            </div>




        </div>
        </div>
    </section>

    <section class="features3 cid-spwLAFqE33" id="features3-16">


        <div class="container">
            <div class="mbr-section-head">


            </div>
            <div class="row mt-4">
            </div>
        </div>
    </section>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">

    </script>


</body>

</html>