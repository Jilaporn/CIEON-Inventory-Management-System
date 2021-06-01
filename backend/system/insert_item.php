<?php include('header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Item</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itd_item_name">Item Name<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" required="required" id="itditemname" name="itd_item_name" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categorytype">Item Box Number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="itemboxnumber" name="itd_boxno" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itemid">RFID Tag<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="rfidtag" name="rfid_tag"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div> -->

                        <!-- code for get data from other database-->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Type </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="itd_cate_type" class="form-control col-md-7 col-xs-12" required="required">
                                    <option value=""></option>
                                    <?php

                                    $sql = " select * from tb_cate_item";
                                    $result = $cls_conn->select_base($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                        <option value="<?= $row['item_id']; ?>">
                                            <?= $row['ith_cate_type']; ?>
                                        </option>

                                    <?php

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Locker Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="locker_no" class="form-control col-md-7 col-xs-12" required="required">
                                    <option value=""></option>
                                    <?php

                                    $sql = " select * from tb_locker";
                                    $result = $cls_conn->select_base($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                        <option value="<?= $row['locker_no']; ?>">
                                            <?= $row['locker_name']; ?>
                                        </option>

                                    <?php

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itempicture">Item picture<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="itd_item_pic" name="itd_item_pic" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                        </div>

                        <!-- for submit button -->
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-default">Save</button>
                                <!-- <a data-toggle="modal" data-target="#myModal" type="submit" name="submit" class="btn btn-success">Save</a> -->

                                <a type="reset" name="reset" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                        <!-- <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">

                                                 Modal content
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Please scan RFID Tag</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-sm-12 col-md-10">
                                                            <input class="form-control" type="text" name="rfid_tag" placeholder="RFID Tag">
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-sm-12 col-md-10">
                                                            <input class="form-control" type="text" name="itd_boxno" placeholder="Item Box Number">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="submit" class="btn btn-default">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        $itd_item_name = $_POST['itd_item_name'];
                        $locker_no = $_POST['locker_no'];
                        // $item_id = $_POST['item_id'];
                        // $rfid_tag = $_POST['rfid_tag'];
                        $itd_boxno = $_POST['itd_boxno'];
                        $itd_cate_type = $_POST['itd_cate_type'];

                        $sqlboxno = "SELECT * from tb_item_detail where itd_boxno  = '$itd_boxno'";
                        $result = mysqli_fetch_array($cls_conn->select_base($sqlboxno));
                        if ($result['itd_boxno']) {
                            echo $cls_conn->show_message('Item box number cannot repeated');
                            return;
                        } else {

                            // for upload picture
                            $itd_item_pic = "";
                            if ($_FILES["itd_item_pic"]["name"] != "") {

                                $datetime = date("dmYHis");
                                $file_name = substr($_FILES['itd_item_pic']['name'], -4);
                                $itd_item_pic = $datetime . '_pic' . $file_name;
                                move_uploaded_file($_FILES["itd_item_pic"]["tmp_name"], "../upload/" . $itd_item_pic);
                            }

                            $sqlitem = "SELECT * from tb_cate_item where item_id  = '$itd_cate_type' ";
                            $re = $cls_conn->select_base($sqlitem);
                            while ($row = mysqli_fetch_array($re)) {
                                $idd = $row['ith_cate_type'];
                                $idm = $row['ith_amount'];
                                $ida = $row['ith_avalible'];
                            }


                            // values = recieve data from input
                            // insert = insert to database table
                            $sql = " insert into tb_item_detail(itd_item_name,locker_no,rfid_tag,item_id,itd_boxno,itd_item_sts,itd_cate_type,itd_item_pic)";
                            $sql .= " values ('$itd_item_name','$locker_no','0','$itd_cate_type','$itd_boxno','a','$idd','$itd_item_pic')";

                            $sqlupamount = $idm + '1';
                            $sqlupavalible = $ida + '1';
                            $up = "UPDATE  tb_cate_item set ith_amount = '$sqlupamount', ith_avalible = '$sqlupavalible' where item_id = '$itd_cate_type' ";
                            $cls_conn->write_base($up);


                            // $sql1=" update tb_rfid";
                            // $sql1.=" set";
                            // $sql1.=" rfid_status='use'";
                            // // update where from database
                            // $sql1.=" where";
                            // $sql1.=" rfid_id='$rfid_id'";
                            // $cls_conn->write_base($sql1) == true;

                            if ($cls_conn->write_base($sql) == true) {
                                echo $cls_conn->show_message('Success');
                                echo $cls_conn->goto_page(1, 'show_item.php');
                            } else {
                                echo $cls_conn->show_message('Unsuccess');
                            }
                        }
                    }
                    ?>



                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>