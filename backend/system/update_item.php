<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Item </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    <?php
                    if (isset($_GET['item_detail_id'])) {
                        $id = $_GET['item_detail_id'];
                        $sqlu = "select * from tb_item_detail where item_detail_id ='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        //call array from database
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            // var_dump($rowu);
                            $rfid_tag = $rowu['rfid_tag'];
                            $locker_no = $rowu['locker_no'];
                            $locker_name = $rowu['locker_name'];
                            // $rfid_tag=$rowu['rfid_tag'];
                            $itd_item_sts = $rowu['itd_item_sts'];
                            // $rfid_status=$rowu['rfid_status'];
                            // $rfid_id=$rowu['rfid_id']; 
                            // $item_date = $rowu['item_date'];
                            $itd_item_name = $rowu['itd_item_name'];
                            $itd_item_pic = $rowu['itd_item_pic'];
                            $itd_boxno = $rowu['itd_boxno'];
                            $item_id = $rowu['item_id'];
                            // $ith_cate_type = $rowu['ith_cate_type'];
                            $item_detail_id = $rowu['item_detail_id'];
                            // if ($itd_item_sts == 'a'){
                            // $available = 'available';
                        }
                    }
                    ?>

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="item_id" value="<?= $item_id; ?>" />
                        <input type="hidden" name="item_detail_id" value="<?= $item_detail_id; ?>" />

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itd_item_name">Edit itemname<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="itd_item_name" name="itd_item_name" value="<?= $itd_item_name; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itd_boxno">Edit Box number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="itd_boxno" name="itd_boxno" value="<?= $itd_boxno; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Tag Number :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="rfid_tag" value="<?= $rfid_tag;?>" class="form-control col-md-7 col-xs-12" required="required">
                                
                                <!-- for insert data
                                <option value="<?= $rfid_id; ?>"><?= $rfid_tag; ?></option>
                                <?php
                                // code for get data from other database
                                $sql = " select * from tb_item_detail where $rfid_tag != rfid_tag ";
                                $result = $cls_conn->select_base($sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>

                                    <option value="<?= $row['rfid_tag']; ?>">
                                        <?= $row['rfid_tag']; ?>
                                    </option>

                                <?php
                                }
                                ?> -->
        
                            </div>
                        </div>

                        <!-- upload picture -->
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itd_item_pic"> Upload picture
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="itd_item_pic" id="itd_item_pic" value="<?= $itd_item_pic;?>" class="form-control col-md-7 col-xs-12">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Category :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="item_id" class="form-control col-md-7 col-xs-12" required="required">
                                    <!--for insert data -->
                                   
                                    <?php
                                    // code for get data from other database
                                    $sql = " select * from tb_cate_item where $item_id != item_id ";
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Locker :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="locker_no" value="<?= $locker_no; ?>" class="form-control col-md-7 col-xs-12" required="required">
                                    <!--for insert data -->
                                    <?php
                                    // code for get data from other database
                                    $sql = " select * from tb_locker ";
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit item status:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="itd_item_sts" class="form-control col-md-7 col-xs-12" required="required">
                                    <!-- <!-for insert data -->

                                    <option value="<?= $itd_item_sts; ?>"><?= $itd_item_sts; ?></option>

                                    <!-- // code for get data from other database -->

                                    <option value="a">available</option>

                                    <option value="b">borrow</option>

                                    <option value="r">return</option>

                                    <option value="rs">reserve</option>

                                    <option value="bk">broken</option>

                                    <option value="l">lost</option>

                                    <!-- <option value="<?= $extend; ?>"><?= $extend; ?></option> -->

                                    </option>



                                </select>
                            </div>
                        </div>

                        <!-- 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_detail">Edit itemdetail<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="detail" id="item_detail" name="item_detail"  required="required" class="form-control col-md-7 col-xs-12"><?= $item_detail; ?></textarea>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rfid_tag">Edit RFID tag<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="detail" id="rfid_tag" name="rfid_tag"  required="required" class="form-control col-md-7 col-xs-12"value="<?= $rfid_tag; ?>">
                            </div>
                        </div> -->


                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_qty">Edit quantity<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="item_qty" name="item_qty" value="<?= $item_qty; ?>" required="required" class="form-control col-md-7 col-xs-12"> 
                            </div>
                        </div> -->

                </div>

                <br>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-success">save</button>
                        <a href="show_item.php" class="btn btn-danger">cancel</a>

                        <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                    </div>
                </div>
                </form>
                
                <?php
                if (isset($_POST['submit'])) {
                    $rfid_tag = $_POST['rfid_tag'];
                    $locker_no = $_POST['locker_no'];
                    // $locker_name = $_POST['locker_name'];
                    $itd_item_stss = $_POST['itd_item_sts'];
                    // $item_date = $_POST['item_date'];
                    $itd_item_name = $_POST['itd_item_name'];
                    $itd_item_pic = $_POST['itd_item_pic'];
                    $itd_boxno = $_POST['itd_boxno'];
                    $item_id = $_POST['item_id'];
                    // $ith_cate_type = $_POST['ith_cate_type'];
                    $item_detail_id = $_POST['item_detail_id'];

                    $sql = " update tb_item_detail";
                    $sql .= " set";
                    $sql .= " item_id='$item_id'";
                    $sql .= " ,locker_no='$locker_no'";
                    $sql .= " ,rfid_tag='$rfid_tag'";
                    $sql .= " ,itd_boxno='$itd_boxno'";
                    // $sql .= " ,ith_cate_type='$ith_cate_type'";
                    // $sql .= " ,item_date='$item_date'";
                    //$sql .= " ,locker_name='$locker_name'";
                    $sql .= " ,itd_item_sts='$itd_item_stss'"; 
                    $sql .= " ,itd_item_name='$itd_item_name'";
                    //itd_item_sts  = old, itd_item_stss = new
                        if($itd_item_stss != 'a' && $itd_item_sts == 'a' )
                        {
                            $up22 = "UPDATE tb_cate_item SET ith_avalible = ith_avalible - '1' WHERE item_id = '$item_id';";
                            $cls_conn->write_base($up22);
                        }
                        elseif ($itd_item_stss == 'a' && $itd_item_sts != 'a')
                        {
                            //echo $rowu['itd_item_sts'];
                            $up22 = "UPDATE tb_cate_item SET ith_avalible = ith_avalible + '1' WHERE item_id = '$item_id';";
                            $cls_conn->write_base($up22);
                        }
                        // echo $up22; 

                        if(!file_exists($_FILES['myfile']['tmp_name']) || !is_uploaded_file($_FILES['myfile']['tmp_name'])) {
                           
                        }
                        else
                        {
                            $itd_item_pic = "";
                            if ($_FILES["itd_item_pic"]["name"] != "") {

                                $datetime = date("dmYHis");
                                $file_name = substr($_FILES['itd_item_pic']['name'], -4);
                                $itd_item_pic = $datetime . '_pic' . $file_name;
                                move_uploaded_file($_FILES["itd_item_pic"]["tmp_name"], "../upload/" .$itd_item_pic);
                                $sql .= " ,itd_item_pic='$itd_item_pic'";
                            }
                        }
                        
                    // update where from database
                    $sql .= " where";
                    $sql .= " item_detail_id='$item_detail_id'";


                    if ($cls_conn->write_base($sql) == true) 
                    {
                        echo $cls_conn->show_message('Successfully edited the information');
                        //echo $sql;
                        echo $cls_conn->goto_page(1, 'show_item.php');
                        //echo $sql;
                    } 
                    else 
                    {
                        echo $cls_conn->show_message('Failed to edit information');
                        echo $sql;
                    }
                }
                ?>



            </div>
        </div>
    </div>
</div>
</div>
<?php include('footer.php'); ?>