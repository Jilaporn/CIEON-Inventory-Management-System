<?php 
    
    $db_server = "localhost";
    $db_username = "keendemy_cieinventory";
    $db_password = "qwerty@123";
    $db_database = "keendemy_cieinventory";
    $con = mysqli_connect($db_server,$db_username,$db_password,$db_database);
    $date_now = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM tb_reserve WHERE rs_flag = 'o'";
    $result  = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result))
    {
        $datedate = date ("Y-m-d H:i:s", strtotime("+24 hour", strtotime($row['rs_date']))); 
        //IF Reserve is more than 24 Hours
        if($datedate < $date_now)
        {
            $sql1 = "UPDATE tb_reserve SET rs_flag = 'c' WHERE rs_id = '".$row['rs_id']."'";
            mysqli_query($con,$sql1);
            $sql2 = "DELETE FROM tb_activity WHERE user_id = '".$row['user_id']."' AND act_item_name = '".$row['rs_item_name']."'";
            mysqli_query($con,$sql2);
            $sql3 = "SELECT * FROM tb_item_detail WHERE itd_item_sts = 'rs' AND itd_item_name = '".$row['rs_item_name']."'";
            $sql3 = mysqli_fetch_array(mysqli_query($con,$sql3));
            $sql4 = "UPDATE tb_cate_item SET ith_avalible = ith_avalible + '".$row['rs_amount']."' WHERE ith_cate_type = '".$sql3['itd_cate_type']."'";
            mysqli_query($con,$sql4);
            $sql5 = "UPDATE tb_item_detail SET itd_item_sts = 'a' WHERE itd_item_sts = 'rs' AND itd_item_name = '".$row['rs_item_name']."' LIMIT ".$row['rs_amount']."";
            mysqli_query($con,$sql5);
            $sql6 = "UPDATE tb_user SET user_limit = user_limit + '".$row['rs_amount']."' WHERE user_id = '".$row['user_id']."'";
            mysqli_query($con,$sql6);

        }
    }
