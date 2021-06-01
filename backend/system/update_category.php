<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Category</h2>
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
                            $sqlu=" select * from tb_cate_item";
                            $sqlu.=" where";
                            $sqlu.=" item_id='$id'";
                            $resultu=$cls_conn->select_base($sqlu);
                            // call array from database
                            while($rowu=mysqli_fetch_array($resultu))
                            {
                                $item_id=$rowu['item_id'];
                                $locker_no=$rowu['locker_no'];
                                $ith_cate_type=$rowu['ith_cate_type'];
                               
                                // $admin_email=$rowu['admin_email'];
                                // $admin_tel=$rowu['admin_tel'];
                                // $admin_password=$rowu['admin_password']; 
                            }
                        }
                        ?>

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="category_id" value="<?=$category_id;?>" />    
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_id">Edit Item ID<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="item_id" name="item_id"  value="<?=$item_id;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div> -->

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_type">Edit Category Type<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="ith_cate_type" name="ith_cate_type" value="<?=$ith_cate_type;?>" required="required" class="form-control col-md-7 col-xs-12"></div>
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

                        <!-- <div class="item form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="category_pic"> Upload picture<span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="file" name="category_pic" id="category_pic" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                   </div>
                               </div>  

                        </div> -->




                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_email">Edit email<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="flie" id="admin_email" name="admin_email" value="<?=$admin_email;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div> -->
<!-- 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_tel">Edit telephone number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_tel" name="admin_tel" value="<?=$admin_tel;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_pas">Edit password<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_password" name="admin_password" value="<?=$admin_password;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div> -->

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
                                    <a href="show_category.php" class="btn btn-danger" >cancel</a>

                                    <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit']))
                        {
                            $item_id=$_POST['item_id'];
                            $locker_no=$_POST['locker_no'];
                            $category_type=$_POST['ith_cate_type'];
                            
                    
                            // $admin_email=$_POST['admin_email'];
                            // $admin_tel=$_POST['admin_tel'];
                            // $admin_password=$_POST['admin_password']; 


                         
                            $sql=" update tb_cate_item";
                            $sql.=" set";
                            $sql.=" locker_no='$locker_no'";
                            $sql.=" ,ith_cate_type='$category_type'";
                            
                            // $category_pic=$_POST['category_pic'];
                            // $sql.=" ,admin_email='$admin_email'";
                            // $sql.=" ,admin_tel='$admin_tel'";
                            // $sql.=" ,admin_password='$admin_password'";
                            // update where from database
                            $sql.=" where";
                            $sql.=" item_id='$item_id'";
                            $sql1="SELECT * from tb_item_detial where item_id ='$item_id'";  
                            $cls_conn->write_base($sql1);       
                            $sql2="UPDATE tb_item_detail set itd_cate_type ='$category_type' where item_id ='$item_id'";                   
                            $cls_conn->write_base($sql2);
                            
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('Successfully edited the information');
                                echo $cls_conn->goto_page(1,'show_category.php');
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