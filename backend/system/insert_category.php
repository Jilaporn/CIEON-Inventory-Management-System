<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Category</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                    <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itemid">Item id<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="itemid" name="item_id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div> -->

                        <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Locker Number</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="locker_no" class="form-control col-md-7 col-xs-12" required="required">
                                                        <option value=""></option>
                                                        <?php

                                                        $sql = " select * from tb_locker";
                                                        $result = $cls_conn->select_base($sql);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>

                                                            <option value="<?= $row['locker_no']; ?>">
                                                                <?= $row['locker_no']; ?>
                                                            </option>

                                                            
                                                        <?php
                                                        
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ith_cate_type">Category type<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="categorytype" name="ith_cate_type" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ith_amount">Item amount<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="itemamount" name="ith_amount" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ith_avalible">Item avalible<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="itemavaliable" name="ith_avalible" required="required" class="form-control col-md-7 col-xs-12" >
                            </div>
                        </div>  -->

                      

<!-- count from item -->
<!--                         
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Item Category</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="category_id" class="form-control col-md-7 col-xs-12" required="required">
                                                        <option value=""></option>
 // code for get data from other database                                                       
                                                        <?php
                                                        $sql = " select * from tb_cate_item";
                                                        $result = $cls_conn->select_base($sql);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>

                                                            <option value="<?= $row['item_id']; ?>">
                                                                <?= $row['item_id']; ?>
                                                            </option>


                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                </div> -->
                                         
<!-- 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itemname">item name<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="itemname" name="item_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div> -->
<!-- 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itemdetail">item detail<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" id="itemdetial" name="item_detail" required="required" class="form-control col-md-7 col-xs-12" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rfidtag">RFID tag<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="rfidtag" name="rfid_tag" required="required" class="form-control col-md-7 col-xs-12" >
                            </div>
                        </div> -->
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

                    <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itempicture">item picture<span class="required">:</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="itempicture" name="item_pic" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div> -->

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
                        <a href="show_category.php" class="btn btn-danger">Cancel</a>
                        <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                    </div>
                </div>
                </form>
                
                <?php
                if (isset($_POST['submit'])) {
                    // $item_id = $_POST['item_id'];
                    $locker_no = $_POST['locker_no'];
                    $ith_cate_type = $_POST['ith_cate_type'];
                    $ith_amount = $_POST['ith_amount'];
                    $ith_avalible = $_POST['ith_avalible'];
                    // $category_pic= "";
                  //  if ($_FILES["category_pic"]["name"] != "") {

                     //   $datetime = date("dmYHis");
                      //  $file_name = substr($_FILES['category_pic']['name'], -4);
                      // $category_pic = $datetime . '_pic' . $file_name;
                      //  move_uploaded_file($_FILES["category_pic"]["tmp_name"], "../upload/" . $category_pic);
                    // }
                    // $item_name = $_POST['item_name'];
                    // $item_detail= $_POST['item_detail'];
                    // // $item_qty = $_POST['item_qty'];
                    // $category_id = $_POST['category_id'];
                    // $rfid_tag= $_POST['rfid_tag'];
                    // // $rfid_status= $_POST['rfid_status'];
                    // // for upload picture
                    // $item_pic= "";
                    // if ($_FILES["item_pic"]["name"] != "") {

                        // $datetime = date("dmYHis");
                        // $file_name = substr($_FILES['item_pic']['name'], -4);
                        // $item_pic = $datetime . '_pic' . $file_name;
                        // move_uploaded_file($_FILES["item_pic"]["tmp_name"], "../upload/" . $item_pic);
                    


// values = recieve data from input
// insert = insert to database table
                    $sql = " insert into tb_cate_item(locker_no,ith_cate_type,ith_amount,ith_avalible)";
                    $sql .= " values ('$locker_no','$ith_cate_type','0','0')";
                    

                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('Success');
                        echo $cls_conn->goto_page(1,'show_category.php');
                        
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