<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit RFID</h2>
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
                            $sqlu=" select * from tb_rfid";
                            $sqlu.=" where";
                            $sqlu.=" rfid_id='$id'";
                            $resultu=$cls_conn->select_base($sqlu);
                            // call array from database
                            while($rowu=mysqli_fetch_array($resultu))
                            {
                                $rfid_id=$rowu['rfid_id'];
                                $rfid_tag=$rowu['rfid_tag'];
                                $rfid_status=$rowu['rfid_status'];
                            }
                        }
                        ?>

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="rfid_id" value="<?=$rfid_id;?>" />    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rfid_tag">Edit Tag Number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="rfid_tag" name="rfid_tag"  value="<?=$rfid_tag;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>


                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rfid_datetime">Edit datetime<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime" id="rfid_datetime" name="rfid_datetime" value="<?=$rfid_datetime;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rfid_return">Edit returnephone number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="rfid_return" name="rfid_return" value="<?=$rfid_return;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div> -->
                        
                                                <?php 
                                                $rfid_status;

                                                $rfid_status != $borrow =  'borrow';
                                                $return =  'return';
                                                $reserve =  'reserve';
                                                $broken =  'broken';
                                                $lost = 'lost';
                                                $extend =  'extend';
                                                $broken =  'broken';
                                                $ready =  'ready';
                                                ?> 

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Edit Rfid Status:</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="rfid_status" class="form-control col-md-7 col-xs-12" required="required">
                                                    <!-- for insert data   -->
                                                        <option value="<?=$rfid_status;?>"></option> 
                                                       
 <!-- // code for get data from other database  -->
                                                       

                                                            <option value="<?=$ready;?>"><?=$ready;?></option>

                                                            <option value="<?=$borrow;?>"><?=$borrow;?></option>
                                                            
                                                            <option value="<?=$return;?>"><?=$return;?></option>
                                                            
                                                            <option value="<?=$reserve;?>"><?=$reserve;?></option>
                                                            
                                                            <option value="<?=$broken;?>"><?=$broken;?></option>
                                                            
                                                            <option value="<?=$lost;?>"><?=$lost;?></option>
                                                            
                                                            <option value="<?=$extend;?>"><?=$extend;?></option>
                                                           
 
                                                            </option>


                                                        
                                                    </select>
                                                </div> 
                                                </div>  

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="artist_status">รหัสผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="artist_status" name="artist_status" value="<?=$artist_status;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>  -->

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
                                    <a href="show_rfid.php" class="btn btn-danger" >cancel</a>

                                    <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit']))
                        {
                            $rfid_tag=$_POST['rfid_tag'];
                            // $rfid_datetime=$_POST['rfid_datetime'];
                            $rfid_status=$_POST['rfid_status']; 


                         
                            $sql=" update tb_rfid";
                            $sql.=" set";
                            $sql.=" rfid_tag='$rfid_tag'";
                            $sql.=" ,rfid_status='$rfid_status'";
                            // update where from database
                            $sql.=" where";
                            $sql.=" rfid_id='$rfid_id'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('Successfully edited the information');
                                echo $cls_conn->goto_page(1,'show_rfid.php');
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