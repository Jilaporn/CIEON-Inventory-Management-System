<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Admin</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" onsubmit="return set_phone_number()" method="post">

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adminnumber">Admin Number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="adminnumber" name="user_id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div> -->


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Firstname<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="firstname" name="user_firstname" required="required" class="form-control col-md-7 col-xs-12" minlength="1" maxlength="25">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Surname<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="surname" name="user_surname" required="required" class="form-control col-md-7 col-xs-12" minlength="1" maxlength="25">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phonenumber">Phone Number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="phone" class=" form-control col-md-7 col-xs-12" type="text" name="user_tel" value="<?=$user_tel?>" placeholder=" Telephone number" id="phone-form7-2y">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-10">
                                <input class="form-control col-md-5 col-xs-10" style="width:80%;" type="text" name="user_email" placeholder=" Email" minlength="6" maxlength="20">
                                <div class="input-group-append" style="padding-top:10px">
                                    <span class="input-group-text" id="basic-addon2">@kmitl.ac.th</span>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Password" type="Password">Password<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="Password"  minlength="6" maxlength="20" name="user_password" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        
                </div></div>

                            <!-- for submit button -->
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                                    <a href="show_admin.php" class="btn btn-danger">Cancel</a>
                                    <!-- <button type="reset" name="reset" class="btn btn-danger">??????????????????</button> -->
                                </div>
                            </div>
                    </form>
                    <?php
                    function generate_password($length = 8){
                        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                                  '0123456789';
                      
                        $str = '';
                        $max = strlen($chars) - 1;
                      
                        for ($i=0; $i < $length; $i++)
                          $str .= $chars[random_int(0, $max)];
                      
                        return $str;
                      }
                    if (isset($_POST['submit'])) {
                        $user_id = $_POST['user_id'];
                        $user_password = $_POST['user_password'];
                        $user_firstname = $_POST['user_firstname'];
                        $user_surname = $_POST['user_surname'];
                        $user_email = $_POST['user_email']."@kmitl.ac.th";
                        // $admin_position = $_POST['admin_position'];
                        $user_tel = $_POST['user_tel'];
                        $salt = generate_password();
                        $user_password = hash('sha256',$_POST['user_password'].$salt);


                        // values = recieve data from input
                        // insert = insert to database table
                        $sql = " insert into tb_user(user_id,user_password,user_firstname,user_surname,user_email,user_tel,user_position,user_limit,user_sts,salt)";
                        $sql .= " values ('$user_id','$user_password','$user_firstname','$user_surname','$user_email','$user_tel','0','0','n','$salt')";


                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('Success');
                            echo $cls_conn->goto_page(1, 'show_admin.php');
                        } else {
                            echo $cls_conn->show_message('Unsuccess');
                        }
                    }
                    ?>



                </div>
            </div>
        </div>
    </div>
    <script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
	initialCountry: "th",
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
 </script>
<script>
function set_phone_number(){
if(isNaN(document.getElementById("phone").value) == true)
{
	alert('Phone number is incorrect');
	return false
}
else
{
 document.getElementById("phone").value = phoneInput.getNumber();
 return true;
}
}
</script>
    <?php include('footer.php'); ?>