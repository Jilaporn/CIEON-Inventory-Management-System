<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Student</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="studentnumber">Student Number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="studentnumber" name="student_id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Firstname<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="firstname" name="student_firstname" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Surname<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="surname" name="student_surname" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                 

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">:</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="student_email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position<span class="required">:</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="student_position">
                                                                <option value="0">Admin</option>
                                                                <option value="1">Teacher</option>
                                                                <option value="2">Student</option>                                                        
                                                            </select>
                          
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephonenumber">Telephone Number<span class="required">:</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="telephonenumber" name="student_tel" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <!-- <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Edit status</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="student_status" class="form-control col-md-7 col-xs-12" required="required">
                                                    for insert data -->
                                                        <!-- <option value="<?=$student_status;?>"></option> -->
                                                       
<!-- // code for get data from other database -->
                                                       

                                                            <!-- <option value="<?=$penalty;?>"><?=$penalty;?></option> -->
                                                            
                                                            <!-- <option value="<?=$none;?>"><?=$none;?></option>
                                                            
                                                             <option value="<?=$reserve;?>"><?=$reserve;?></option>
                                                            
                                                            <option value="<?=$broken;?>"><?=$broken;?></option>
                                                            
                                                            <option value="<?=$lost;?>"><?=$lost;?></option>
                                                            
                                                            <option value="<?=$extend;?>"><?=$extend;?></option>
                                                           
                                                            <option value="<?=$borrow;?>"><?=$borrow;?></option> -->
 
                                                            <!-- </option>


                                                        
                                                    </select>
                                                </div>
                                                </div> --> 

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Password" type="Password">Password<span class="required">:</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="Password" name="student_password" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                </div>

<!-- for submit button -->
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                        <a href="show_student.php" class="btn btn-danger">Cancel</a>
                        <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                    </div>
                </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $student_id = $_POST['student_id'];
                    $student_firstname = $_POST['student_firstname'];
                    $student_surname= $_POST['student_surname'];
                    $student_email = $_POST['student_email'];
                    // $student_position = $_POST['student_position'];
                    $student_tel = $_POST['student_tel'];
                    // $student_status = $_POST['student_status'];
                    $student_password = $_POST['student_password'];



// values = recieve data from input
// insert = insert to database table
                    $sql = " insert into tb_user(user_id,user_password,user_firstname,user_surname,user_email,user_tel,user_position,user_act_amount,user_sts)";
                    $sql .= " values ('$student_id','$student_password','$student_firstname','$student_surname','$student_email','$student_tel','2','0','n')";


                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('Success');
                        echo $cls_conn->goto_page(1, 'show_student.php');
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