<?php session_start();?>
<?php include('../class_conn.php');?>
<?php $cls_conn=new class_conn;?>

<!DOCTYPE html>
<html lang="en">
 <?php
    if( !$_SESSION['is_admin'])
    {
        header('Location: /backend/login.php');
    }


?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cieoninventorymanagementsystem</title>
    <!-- Bootstrap -->
    <link href="../template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../template/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../template/build/css/custom.min.css" rel="stylesheet">
 
    <link rel="shortcut icon" type="images/x-icon" href="e04efe2b-11ea-46f7-b632-b2f1878232d7_200x200.png" /> 




</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;" align="center"><img src="../upload/cie icon.jpg"
                            width="px" height="100px" /><span></span> </div>
                    <div class="clearfix"></div>
                    <br><br>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix" style="margin-left:20px;">
                        <!-- <div class="profile_pic"> </div> -->

                        <div class="profile_info" style="text-align :center;"> <span>
                                <h2> Welcome Admin</h2>
                            </span>
                            <h2 style="text-align :center; font-size: 15px;"></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">

                            <ul class="nav side-menu">

<!-- list menu of user or admin -->
<!-- href=link to otherpage -->
                                <li> <a href="index.php" > Home</a></li>
                                
                                <li> <a href="description.php" > Description</a></li>

                                <li><a><i class="fa fa-user"></i>Admin<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_admin.php" ><i class="fa fa-plus"></i>Add Admin</a></li>
                                        <li><a href="show_admin.php" ><i class="fa fa-file-text"></i>View Admin</a></li>
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-user"></i>Teacher<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_teacher.php" ><i class="fa fa-plus"></i>Add Teacher</a></li>
                                        <li><a href="show_teacher.php"><i class="fa fa-file-text"></i>View Teacher</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i>Student<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_student.php" ><i class="fa fa-plus"></i>Add Student</a></li>
                                        <li><a href="show_student.php"><i class="fa fa-file-text"></i>View Student</a></li>
                                    </ul>
                                </li> 

                                <li><a><i class="fa fa-user"></i>Item<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_item.php" ><i class="fa fa-plus"></i>Add Item</a></li> 
                                        <li><a href="show_item.php"><i class="fa fa-file-text"></i>View Item</a></li>
                                    </ul>
                                </li>

                                <!-- <li><a><i class="fa fa-user"></i>RFID<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_rfid.php" ><i class="fa fa-plus"></i>Add RFID</a></li>
                                        <li><a href="show_rfid.php"><i class="fa fa-file-text"></i>View RFID</a></li>
                                    </ul>
                                </li> -->


                                <li><a><i class="fa fa-user"></i>Category<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_category.php" ><i class="fa fa-plus"></i>Add Category</a></li> 
                                        <li><a href="show_category.php"><i class="fa fa-file-text"></i>View Category</a></li>
                                    </ul>
                                    
                                <li><a><i class="fa fa-user"></i>Locker<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_locker.php" ><i class="fa fa-plus"></i>Add Locker</a></li>
                                        <li><a href="show_locker.php"><i class="fa fa-file-text"></i>View Locker</a></li>
                                    </ul>
                                </li>

                               <!-- <li><a><i class="fa fa-user"></i>OTP<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="show_otp.php"><i class="fa fa-file-text"></i>View OTP</a></li>
                                    </ul>
                                </li> -->
                               

                                <!-- <li><a><i class="fa fa-user"></i>RFID tag<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_tag.php" ><i class="fa fa-plus"></i>Add tag</a></li>
                                        <li><a href="show_tag.php"><i class="fa fa-file-text"></i>View tag</a></li>
                                    </ul>
                                </li> -->

                                <li><a><i class="fa fa-user"></i>History<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="show_history.php"><i class="fa fa-file-text"></i>View Activity List</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i>Borrow Report<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="show_borrow.php"><i class="fa fa-file-text"></i>View Activity List</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i>Return Report<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="show_return.php"><i class="fa fa-file-text"></i>View Activity List</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i>Lost Report<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="show_lost.php"><i class="fa fa-file-text"></i>View Activity List</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i>Extend Report<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="show_extend.php"><i class="fa fa-file-text"></i>View Activity List</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i>Broken Report<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="show_broken.php"><i class="fa fa-file-text"></i>View Activity List</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i>Penalty Report<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="show_penalty.php"><i class="fa fa-file-text"></i>View Activity List</a></li>
                                    </ul>
                                </li>

                                <!-- <li><a><i class="fa fa-user"></i>borrow<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_item.php" ><i class="fa fa-plus"></i>Add item</a></li>
                                        <li><a href="show_borrow.php"><i class="fa fa-file-text"></i>View borrow list</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i>return<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_item.php" ><i class="fa fa-plus"></i>Add item</a></li>
                                        <li><a href="show_return.php"><i class="fa fa-file-text"></i>View return list</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i>reserve<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_item.php" ><i class="fa fa-plus"></i>Add item</a></li>
                                        <li><a href="show_reserve.php"><i class="fa fa-file-text"></i>View reserve list</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i>broken<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_item.php" ><i class="fa fa-plus"></i>Add item</a></li>
                                        <li><a href="show_broken.php"><i class="fa fa-file-text"></i>View broken list</a></li>
                                    </ul>
                                </li>

                

                                <li><a><i class="fa fa-user"></i>lost<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_item.php" ><i class="fa fa-plus"></i>Add item</a></li>
                                        <li><a href="show_lost.php"><i class="fa fa-file-text"></i>View lost list</a></li>
                                    </ul>
                                </li> -->
                                


                                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>

                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                    <!-- /menu footer buttons -->
                    <!--  <div class="sidebar-footer hidden-small">
                                <a data-toggle="tooltip" data-placement="top" title="Settings"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a>
                                <a data-toggle="tooltip" data-placement="top" title="FullScreen"> <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> </a>
                                <a data-toggle="tooltip" data-placement="top" title="Lock"> <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> </a>
                                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a>
                            </div> -->
                    <!-- /menu footer buttons -->
                </div>
            </div>
            <!-- top navigation -->
            <!-- <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false"> <span class=" fa fa-angle-down"></span> </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">

                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>ออกจากระบบ</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> -->
            <!-- /top navigation -->
            <!-- page content -->