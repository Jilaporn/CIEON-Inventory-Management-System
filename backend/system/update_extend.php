<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit extend</h2>
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
                            $sqlu=" select * from tb_extend";
                            $sqlu.=" where";
                            $sqlu.=" extend_id='$id'";
                            $resultu=$cls_conn->select_base($sqlu);
                            // call array from database
                            while($rowu=mysqli_fetch_array($resultu))
                            {
                                $extend_id=$rowu['extend_id'];
                                $extend_no=$rowu['extend_no'];
                                $extend_returndate=$rowu['extend_returndate'];
                                $extend_day=$rowu['extend_day'];
                                $borrow_id=$rowu['borrow_id'];
                                $product_id=$rowu['product_id'];
                                $teacher_id=$rowu['teacher_id']; 
                                $extend_status=$rowu['extend_status']; 
                                $extend_datetime=$rowu['extend_datetime']; 
                            }
                        }
                        ?>

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="extend_id" value="<?=$extend_id;?>" />    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="extend_no">Edit number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="extend_no" name="extend_no"  value="<?=$extend_no;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="extend_returndate" name="extend_returndate"  value="<?=$extend_returndate;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="extend_day" name="extend_day"  value="<?=$extend_day;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                                                    <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12" >Edit category</label> -->
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="borrow_id" class="form-control col-md-7 col-xs-12" required="required">
                                                        <option value=""></option>
                                                        <?php
// code for get data from other database
                                                        $sql = " select * from tb_category";
                                                        $result = $cls_conn->select_base($sql);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>

                                                            <option value="<?= $row['borrow_id']; ?>">
                                                                <?= $row['category_name']; ?>
                                                            </option>


                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="extend_name">Edit extendname<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="extend_name" name="extend_name"  value="<?=$extend_name;?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="borrow_id">Edit extenddetail<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="detail" id="borrow_id" name="borrow_id" value="<?=$borrow_id;?>" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_id">Edit quantity<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="product_id" name="product_id" value="<?=$product_id;?>" required="required" class="form-control col-md-7 col-xs-12"> 
                            </div>
                        </div>
                        
                        <div class="item form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="teacher_id"> upload picture
                                       <span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="file" name="teacher_id" id="teacher_id" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                   </div>
                               </div>  

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="artist_password">รหัสผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="artist_password" name="artist_password" value="<?=$artist_password;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
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
                                    <a href="show_extend.php" class="btn btn-danger" >cancel</a>

                                    <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit']))
                        {
                            $extend_no=$_POST['extend_no'];
                            $extend_datetime=$_POST['extend_datetime'];
                            $extend_name=$_POST['extend_name'];
                            $borrow_id=$_POST['borrow_id'];
                            $product_id=$_POST['product_id'];
                            $teacher_id=$_POST['teacher_id']; 
                            $extend_status=$_POST['extend_status']; 
                            $extend_date=$_POST['extend_date']; 



                         
                            $sql=" update tb_extend";
                            $sql.=" set";
                            $sql.=" extend_no='$extend_no'";
                            $sql.=" ,extend_datetime='$extend_datetime'";
                            $sql.=" ,borrow_id='$borrow_id'";
                            $sql.=" ,product_id='$product_id'";
                            $sql.=" ,teacher_id='$teacher_id'";
                            $sql.=" ,extend_status='$extend_status'";
                            $sql.=" ,extend_date='$extend_date'";
                            // update where from database
                            $sql.=" where";
                            $sql.=" extend_id='$extend_id'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('Successfully edited the information');
                                echo $cls_conn->goto_page(1,'show_item.php');
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