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

if($_POST['password'])
{
    $salt = generate_password();
    $password = hash('sha256',$_POST['password'].$salt);
    echo 'Your salt is '.$salt;
    echo '<br>';
    echo 'Your password is '.$password;
}



?>
<form method="POST" action="password.gen.php">
    <input type="text" name="password">
</form>