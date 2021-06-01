<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Teacher Data </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sqlu = " select * from tb_user";
                        $sqlu .= " where";
                        $sqlu .= " user_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        // call array from database
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $user_id = $rowu['user_id'];
                            $user_firstname = $rowu['user_firstname'];
                            $user_surname = $rowu['user_surname'];
                            $user_email = $rowu['user_email'];
                            $user_tel = $rowu['user_tel'];
                            $user_limit = $rowu['user_limit'];
                            $user_sts = $rowu['user_sts'];
                            // $user_password=$rowu['user_password']; 
                        }
                    }
                    ?>

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <!-- <input type="hidden" name="user_id" value="<?= $user_id; ?>" />   -->

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_no">Edit Number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_no" name="user_no"  value="<?= $user_no; ?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div> -->

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_firstname">Edit Firstname<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_firstname" name="user_firstname" value="<?= $user_firstname; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_surname">Edit Surname<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_surname" name="user_surname" value="<?= $user_surname; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_email">Edit Email<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="user_email" name="user_email" value="<?= $user_email; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_tel">Edit Telephone Number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_tel" name="user_tel" value="<?= $user_tel; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phonenumber">Edit Teacher Limit<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="user_limit" type="text" name="user_limit" value="<?= $user_limit; ?>" required="required" class=" form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class=" form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="user_sts" class="form-control col-md-7 col-xs-12" required="required">
                                        <!--for insert data -->
                                        <option selected value="<?= $user_sts; ?>"><?= ($user_sts == 'n') ? 'Normal' : 'Penalty'; ?></option>
                                        <!-- // code for get data from other database -->


                                        <option value="p">Penalty</option>

                                        <option value="n">Normal</option>


                                        </option>



                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Password" type="Password">Password *Leave blank for unchange<span class="required">:</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="Password" minlength="6" maxlength="20" name="user_password" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!--                         
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_password">Edit password<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_password" name="user_password" value="<?= $user_password; ?>" required="required" class="form-control col-md-7 col-xs-12"> 
                            </div>
                        </div> -->

                            <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="artist_password">รหัสผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="artist_password" name="artist_password" value="<?= $artist_password; ?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
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
                                    <a href="show_teacher.php" class="btn btn-danger">cancel</a>

                                    <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                                </div>
                            </div>
                    </form>
                    <?php
                    function generate_password($length = 8)
                    {
                        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' .
                            '0123456789';

                        $str = '';
                        $max = strlen($chars) - 1;

                        for ($i = 0; $i < $length; $i++)
                            $str .= $chars[random_int(0, $max)];

                        return $str;
                    }
                    if (isset($_POST['submit'])) {
                        // $user_id = $_POST['user_id'];
                        $user_firstname = $_POST['user_firstname'];
                        $user_surname = $_POST['user_surname'];
                        // $user_email = $_POST['user_email'];
                        $user_tel = $_POST['user_tel'];
                        $user_limit = $_POST['user_limit'];
                        $user_sts = $_POST['user_sts'];
                        // $user_password=$_POST['user_password']; 



                        $sql = " update tb_user";
                        $sql .= " set";
                        // $sql .= " user_id='$user_id'";
                        $sql .= " user_firstname='$user_firstname'";
                        $sql .= " ,user_surname='$user_surname'";
                        $sql .= " ,user_email='$user_email'";
                        $sql .= " ,user_tel='$user_tel'";
                        $sql .= " ,user_limit='$user_limit'";
                        $sql .= " ,user_sts='$user_sts'";
                        // $sql.=" ,user_password='$user_password'";
                        // update where from database
                        $sql .= " where";
                        $sql .= " user_id='$user_id'";


                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('Successfully edited the information');
                            echo $cls_conn->goto_page(1, 'show_teacher.php');
                            // echo $sql;
                        } else {
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
<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "th",
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
<script>
    function set_phone_number() {
        if (phoneInput.isValidNumber() == false) {
            alert('Phone number is incorrect');
            return false
        } else {
            document.getElementById("phone").value = phoneInput.getNumber();
            return true;
        }
    }
</script>
<?php include('footer.php'); ?>