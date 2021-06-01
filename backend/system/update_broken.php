<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit broken</h2>
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
                            $sqlu=" select * from tb_broken";
                            $sqlu.=" where";
                            $sqlu.=" broken_id='$id'";
                            $resultu=$cls_conn->select_base($sqlu);
                            // call array from database
                            while($rowu=mysqli_fetch_array($resultu))
                            {
                                $broken_id=$rowu['broken_id'];
                                $broken_no=$rowu['broken_no'];
                                $broken_datetime=$rowu['broken_datetime'];
                                // $otp_id=$rowu['otp_id'];
                                // $broken_status=$rowu['broken_status']; 
                            }
                        }
                        ?>

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="broken_id" value="<?=$broken_id;?>" />    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="broken_no">Edit no<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="broken_no" name="broken_no"  value="<?=$broken_no;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="broken_datetime">Edit datetime<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime" id="broken_datetime" name="broken_datetime" value="<?=$broken_datetime;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <!-- <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Edit category</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="otp_id" class="form-control col-md-7 col-xs-12" required="required">
                                                        <option value=""></option>
                                                        <?php
// code for get data from other database
                                                //         $sql = " select * from tb_otp";
                                                //         $result = $cls_conn->select_base($sql);
                                                //         while ($row = mysqli_fetch_array($result)) {
                                                //         ?>

                                                //             <option value="<?= $row['otp_id']; ?>">
                                                //                 <?= $row['category_name']; ?>
                                                //             </option>


                                                //         <?php
                                                //         }
                                                //         ?>
                                                //     </select>
                                                // </div>
                        
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="broken_status">Edit status<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="broken_status" name="broken_status" value="<?=$broken_status;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div> --> -->

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
                                    <a href="show_broken.php" class="btn btn-danger" >cancel</a>

                                    <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit']))
                        {
                            $broken_no=$_POST['broken_no'];
                            $broken_datetime=$_POST['broken_datetime'];
                            // $otp_id=$_POST['otp_id'];
                            // $broken_status=$_POST['broken_status']; 


                         
                            $sql=" update tb_broken";
                            $sql.=" set";
                            $sql.=" broken_no='$broken_no'";
                            $sql.=" ,broken_datetime='$broken_datetime'";
                            // $sql.=" ,otp_id='$otp_id'";
                            // $sql.=" ,broken_status='$broken_status'";
                            // update where from database
                            $sql.=" where";
                            $sql.=" broken_id='$broken_id'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('Successfully edited the information');
                                echo $cls_conn->goto_page(1,'show_broken.php');
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