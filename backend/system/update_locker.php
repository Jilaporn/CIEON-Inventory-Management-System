<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Locker</h2>
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
                            $sqlu=" select * from tb_locker";
                            $sqlu.=" where";
                            $sqlu.=" locker_no='$id'";
                            $resultu=$cls_conn->select_base($sqlu);
                            // call array from database
                            while($rowu=mysqli_fetch_array($resultu))
                            {
                                $locker_no=$rowu['locker_no'];
                                $locker_name=$rowu['locker_name'];
                                $locker_sts=$rowu['locker_sts'];
                                // $category_type=$rowu['category_type'];
                                // $category_pic=$rowu['category_pic'];
                                // $admin_email=$rowu['admin_email'];
                                // $admin_tel=$rowu['admin_tel'];
                                // $admin_password=$rowu['admin_password']; 
                            }
                        }
                        ?>

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="locker_no" value="<?=$locker_no;?>" />   

                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="locker_no">Edit Locker Number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="locker_no" name="locker_no"  value="<?=$locker_no;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="locker_name">Edit Locker Name<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="locker_name" name="locker_name"  value="<?=$locker_name;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <!-- <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Edit Locker Status</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="locker_sts" class="form-control col-md-7 col-xs-12" required="required"> -->
                                                    <!--for insert data -->
                                                        <!-- <option value="<?=$locker_sts;?>"></option> -->
                                                       
<!-- // code for get data from other database -->
                                                       

                                                            <!-- <option value="c">Close</option>
                                                            
                                                            <option value="o">Open</option>
                                                            
 
                                                            </option>


                                                        
                                                    </select>
                                                </div>
                                                </div> -->

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_detail">Edit Category Detail<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="detail" id="category_detail" name="category_detail"  required="required" class="form-control col-md-7 col-xs-12"><?=$category_detail;?></textarea>
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_type">Edit Category Type<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="category_type" name="category_type" value="<?=$category_type;?>" required="required" class="form-control col-md-7 col-xs-12"></div>
                            </div> -->
                        

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
                                    <a href="show_locker.php" class="btn btn-danger" >cancel</a>

                                    <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit']))
                        {
                            $locker_no=$_POST['locker_no'];
                            $locker_name=$_POST['locker_name'];
                            // $locker_sts=$_POST['locker_sts'];
                    //         $category_pic= "";
                    // if ($_FILES["category_pic"]["name"] != "") {

                    //     $datetime = date("dmYHis");
                    //     $file_name = substr($_FILES['category_pic']['name'], -4);
                    //     $category_pic = $datetime . '_pic' . $file_name;
                    //     move_uploaded_file($_FILES["category_pic"]["tmp_name"], "../upload/" . $category_pic);
                    // }
                            // $admin_email=$_POST['admin_email'];
                            // $admin_tel=$_POST['admin_tel'];
                            // $admin_password=$_POST['admin_password']; 


                         
                            $sql=" update tb_locker";
                            $sql.=" set";
                            $sql.=" locker_no='$locker_no'";
                            $sql.=" ,locker_name='$locker_name'";
                            // $sql.=" ,locker_sts='$locker_sts'";
                            // $category_pic=$_POST['category_pic'];
                            // $sql.=" ,admin_email='$admin_email'";
                            // $sql.=" ,admin_tel='$admin_tel'";
                            // $sql.=" ,admin_password='$admin_password'";
                            // update where from database
                            $sql.=" where";
                            $sql.=" locker_no='$locker_no'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('Successfully edited the information');
                                echo $cls_conn->goto_page(1,'show_locker.php');
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