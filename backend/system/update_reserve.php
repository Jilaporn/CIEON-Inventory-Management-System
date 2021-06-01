<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit reserve</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id=$_GET['id'];
                            $sqlu=" select * from tb_reserve";
                            $sqlu.=" where";
                            $sqlu.=" reserve_id='$id'";
                            $resultu=$cls_conn->select_base($sqlu);
                            // call array from database
                            while($rowu=mysqli_fetch_array($resultu))
                            {
                                $reserve_id=$rowu['reserve_id'];
                                $reserve_no=$rowu['reserve_no'];
                                $reserve_datetime=$rowu['reserve_datetime'];
                                $otp_id=$rowu['otp_id'];
                                $reserve_status=$rowu['reserve_status']; 
                            }
                        }
                        ?>

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="reserve_id" value="<?=$reserve_id;?>" />    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reserve_no">Edit no<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="reserve_no" name="reserve_no"  value="<?=$reserve_no;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reserve_datetime">Edit datetime<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime" id="reserve_datetime" name="reserve_datetime" value="<?=$reserve_datetime;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                                                    <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12" >Edit category</label> -->
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="otp_id" class="form-control col-md-7 col-xs-12" required="required">
                                                        <option value=""></option>
                                                        <?php
// code for get data from other database
                                                        $sql = " select * from tb_otp";
                                                        $result = $cls_conn->select_base($sql);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>

                                                            <option value="<?= $row['otp_id']; ?>">
                                                                <?= $row['category_name']; ?>
                                                            </option>


                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reserve_status">Edit status<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="reserve_status" name="reserve_status" value="<?=$reserve_status;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="artist_status">รหัสผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="artist_status" name="artist_status" value="<?=$artist_status;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div> -->

                        <!-- <div class="item form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="artist_photo">อัพโหลดรูปภาพ
                                       <span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="file" name="artist_photo" id="artist_photo" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                   </div>
                               </div>  -->
                            
                            
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="submit" class="btn btn-success">save</button>
                                    <a href="show_reserve.php" class="btn btn-danger" >cancel</a>

                                    <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit']))
                        {
                            $reserve_no=$_POST['reserve_no'];
                            $reserve_datetime=$_POST['reserve_datetime'];
                            $otp_id=$_POST['otp_id'];
                            $reserve_status=$_POST['reserve_status']; 


                         
                            $sql=" update tb_reserve";
                            $sql.=" set";
                            $sql.=" reserve_no='$reserve_no'";
                            $sql.=" ,reserve_datetime='$reserve_datetime'";
                            $sql.=" ,otp_id='$otp_id'";
                            $sql.=" ,reserve_status='$reserve_status'";
                            // update where from database
                            $sql.=" where";
                            $sql.=" reserve_id='$reserve_id'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('Successfully edited the information');
                                echo $cls_conn->goto_page(1,'show_reserve.php');
                            // echo $sql;
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
<?php include('footer.php');?>