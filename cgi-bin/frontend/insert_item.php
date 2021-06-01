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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lockerno">Item Name<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="itditemname" name="itd_item_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categorytype">Item Box Number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="itemboxnumber" name="itd_boxno" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itemid">RFID Tag<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="rfidtag" name="rfid_tag" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- code for get data from other database-->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Type</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="itd_cate_id" class="form-control col-md-7 col-xs-12" required="required">
                                    <option value=""></option>
                                    <?php

                                    $sql = " select * from tb_category";
                                    $result = $cls_conn->select_base($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                        <option value="<?= $row['item_id']; ?>">
                                            <?= $row['itd_cate_type']; ?>
                                        </option>


                                    <?php

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Locker Number</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="locker_id" class="form-control col-md-7 col-xs-12" required="required">
                                    <option value=""></option>
                                    <?php

                                    $sql = " select * from tb_locker";
                                    $result = $cls_conn->select_base($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                        <option value="<?= $row['locker_id']; ?>">
                                            <?= $row['locker_no']; ?>
                                        </option>


                                    <?php

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                </div>

                <!--     <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >RFID Tag</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="rfid_id" class="form-control col-md-7 col-xs-12" required="required">
                                                        <option value=""></option>
                                                        <?php

                                                        $sql = " SELECT * from tb_rfid where rfid_status = 'ready'";
                                                        $result = $cls_conn->select_base($sql);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>

                                                            <option value="<?= $row['rfid_id']; ?>">
                                                                <?= $row['rfid_tag']; ?>
                                                            </option>

                                                            
                                                        <?php

                                                        }
                                                        ?>
                                                    </select>
                                                </div> -->
                <!-- </div> -->





                <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rfidstatus">RFID status<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="rfidstatus" name="rfid_status" required="required" class="form-control col-md-7 col-xs-12" >
                            </div>
                        </div> -->


                <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itemqty">item qty<span class="required">:</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="itemqty" name="item_qty" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div> -->

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itempicture">Item picture<span class="required">:</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="itempicture" name="item_pic" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>


                <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itemstatus" type="itemstatus">item status<span class="required">:</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="itemstatus" name="item_status" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div> -->
            



            <!-- for submit button -->
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                    <a href="show_item.php" class="btn btn-danger">Cancel</a>
                    <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                </div>
            </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $itd_item_name = $_POST['itd_item_name'];
                // $item_detail= $_POST['item_detail'];
                // $item_qty = $_POST['item_qty'];
                $locker_no = $_POST['locker_no'];
                $item_id = $_POST['item_id'];
                $rfid_tag = $_POST['rfid_tag'];
                $itd_boxno = $_POST['itd_boxno'];
                $itd_cate_type = $_POST['itd_cate_type'];
                // $item_status= $_POST['item_status'];
                // for upload picture
                $itd_item_pic = "";
                if ($_FILES["itd_item_pic"]["name"] != "") {

                    $datetime = date("dmYHis");
                    $file_name = substr($_FILES['itd_item_pic']['name'], -4);
                    $item_pic = $datetime . '_pic' . $file_name;
                    move_uploaded_file($_FILES["itd_item_pic"]["tmp_name"], "../upload/" . $item_pic);
                }


                // values = recieve data from input
                // insert = insert to database table
                $sql = " insert into tb_item_header(itd_item_name,locker_no,item_id,rfid_tag,itd_boxno,item_status,itd_cate_type,itd_item_pic)";
                $sql .= " values ('$itd_item_name', '$locker_no','$item_id','$rfid_tag','$itd_boxno','$item_status','$itd_cate_type','$itd_item_pic')";


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
            ?>



        </div>
    </div>
</div>
</div>
</div>
<?php include('footer.php'); ?>