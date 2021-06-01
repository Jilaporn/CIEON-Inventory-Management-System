<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Admin</h2>
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
                            $sqlu=" select * from tb_user";
                            $sqlu.=" where";
                            $sqlu.=" user_id='$id'";
                            $resultu=$cls_conn->select_base($sqlu);
                            // call array from database
                            while($rowu=mysqli_fetch_array($resultu))
                            {
                                $user_id=$rowu['user_id'];
                                $user_firstname=$rowu['user_firstname'];
                                $user_surname=$rowu['user_surname'];
                                $user_email=$rowu['user_email'];
                                $user_tel=$rowu['user_tel'];
                                // $user_password=$rowu['user_password']; 
                  
                            }
                        }
                        ?>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" onsubmit="return set_phone_number()" method="post">        
                        
                        

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_firstname">Edit Firstname<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_firstname" name="user_firstname"  value="<?=$user_firstname;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_surname">Edit Surname<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_surname" name="user_surname"  value="<?=$user_surname;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_email">Edit Email<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-5 col-xs-10" type="text" name="user_email" value="<?=$user_email;?>" placeholder=" Email" minlength="6" maxlength="20">
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phonenumber">Edit Phone Number<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="phone" class=" form-control col-md-7 col-xs-12" type="text" name="user_tel" value="<?=$user_tel?>" placeholder=" Telephone number" id="phone-form7-2y">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Password" type="Password">Password *Leave blank for unchange<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="Password"  minlength="6" maxlength="20" name="user_password" class="form-control col-md-7 col-xs-12">
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
                                    <a href="show_admin.php" class="btn btn-danger" >cancel</a>

                                    <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
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

                        if(isset($_POST['submit']))
                        {
                            // $user_id=$_POST['user_id'];
                            $user_firstname=$_POST['user_firstname'];
                            $user_surname=$_POST['user_surname'];
                            $user_email=$_POST['user_email'];
                            $user_tel=$_POST['user_tel'];
                            $user_password=$_POST['user_password']; 

                         
                            $sql=" update tb_user";
                            $sql.=" set";
                            // $sql.=" user_id='$user_id'";
                            $sql.=" user_firstname='$user_firstname'";
                            $sql.=" ,user_surname='$user_surname'";
                            $sql.=" ,user_email='$user_email'";
                            $sql.=" ,user_tel='$user_tel'";
                            if($_POST['user_password'])
                            {
                                $salt = generate_password();
                                $password = hash('sha256',$user_password.$salt);
                                $sql.=" ,user_password='$password'";
                                $sql.=" ,salt='$salt'";
                            }
                            // $sql.=" ,user_password='$user_password'";
                            // update where from database
                            $sql.=" where";
                            $sql.=" user_id='$user_id'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('Successfully edited the information');
                                echo $cls_conn->goto_page(1,'show_admin.php');
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
if(phoneInput.isValidNumber() == false)
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
<?php include('footer.php');?>