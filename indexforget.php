
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>ธนาคารโรงเรียน</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="backend/vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="backend/vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="backend/vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="backend/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="backend/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="backend/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="backend/vendors/images/login-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">ลืมรหัสผ่าน</h2>
                        </div>
                        <form method="POST">

                            <div class="input-group custom">
                                <input type="email" class="form-control form-control-lg" name="email" placeholder="อีเมล">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="tel" class="form-control form-control-lg" name="tel" placeholder="เบอร์โทร">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <!-- <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox"> -->
                                        <!-- <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">จดจำไว้</label> -->
                                    <!-- </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password"><a href="indexforget.php">ลืมรหัสผ่าน</a></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0"> -->
                                        <!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
                                        <button type="summit" name="submit" class="btn btn-primary btn-lg btn-block">เข้าสู่ระบบ</button>
                                    </div>
                                    <!-- <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">หรือ</div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="register.php">ลงทะเบียนเข้าสู่ระบบ</a>
                                    </div> -->
                                </div>
                            </div>
                        </form>
                        <?php
                if(isset($_POST['submit']))
                {
                    $user_email = $_POST['email'];
                    $tel = $_POST['tel'];
                    // echo $username;
                    // echo $password;
                    // $sql12="select * from tb_contactadmin where contactadmin_email = '$user_email' ";
                    // $re=$cls_conn->select_base($sql12);
                    // while($row=mysqli_fetch_array($re)){
                    //     $user_password= $row['admin_password'];
                    // }

                    $message = urlencode("otp number");
                    $to="$user_email";
                    $subject = "รายการที่ยืม";
                    $txt = "รายการ ";
                    $headers = "From: cieonkmitl@gmail.com" . "\r\n" .
                    "CC: divyasundarsahu@gmail.com";
                    mail($to,$subject,$txt,$headers);

                        echo $txt ;
                        echo $cls_conn->show_message('Success');
                        // echo $cls_conn->goto_page(1,'index.php');
                        // echo $sql;
                    }

							
                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="backend/vendors/scripts/core.js"></script>
    <script src="backend/vendors/scripts/script.min.js"></script>
    <script src="backend/vendors/scripts/process.js"></script>
    <script src="backend/vendors/scripts/layout-settings.js"></script>
</body>

</html>