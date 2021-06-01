<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit return</h2>
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
                            $sqlu=" select * from tb_return";
                            $sqlu.=" where";
                            $sqlu.=" return_id='$id'";
                            $resultu=$cls_conn->select_base($sqlu);
                            // call array from database
                            while($rowu=mysqli_fetch_array($resultu))
                            {
                                $return_id=$rowu['return_id'];
                                $return_no=$rowu['return_no'];
                                $return_datetime=$rowu['return_datetime'];
                                // $return_return=$rowu['return_return'];
                                $return_status=$rowu['return_status']; 
                            }
                        }
                        ?>

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="return_id" value="<?=$return_id;?>" />    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="return_no">Edit no<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="return_no" name="return_no"  value="<?=$return_no;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="return_datetime">Edit datetime<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime" id="return_datetime" name="return_datetime" value="<?=$return_datetime;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="return_return">Edit returnephone number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="return_return" name="return_return" value="<?=$return_return;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div> -->
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="return_status">Edit status<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="return_status" name="return_status" value="<?=$return_status;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
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
                                    <a href="show_return.php" class="btn btn-danger" >cancel</a>

                                    <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit']))
                        {
                            $return_no=$_POST['return_no'];
                            $return_datetime=$_POST['return_datetime'];
                            // $return_return=$_POST['return_return'];
                            $return_status=$_POST['return_status']; 


                         
                            $sql=" update tb_return";
                            $sql.=" set";
                            $sql.=" return_no='$return_no'";
                            $sql.=" ,return_datetime='$return_datetime'";
                            // $sql.=" ,return_return='$return_return'";
                            $sql.=" ,return_status='$return_status'";
                            // update where from database
                            $sql.=" where";
                            $sql.=" return_id='$return_id'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('Successfully edited the information');
                                echo $cls_conn->goto_page(1,'show_return.php');
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