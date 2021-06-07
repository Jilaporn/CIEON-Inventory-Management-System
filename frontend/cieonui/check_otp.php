<?php 
    session_start();error_reporting(E_ALL);
    include('../../backend/class_conn.php');
    $cls_conn=new class_conn();
    $date_now = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM tb_reserve WHERE rs_flag = 'o'";
    $result = $cls_conn->select_base($sql);
    while($row = mysqli_fetch_array($result))
    {
        $datedate = date ("Y-m-d H:i:s", strtotime("+24 hour", strtotime($row['rs_date']))); 
        //IF Reserve is more than 24 Hours
        if($datedate < $date_now)
        {
            $sql1 = "UPDATE tb_reserve SET rs_flag = 'c' WHERE rs_id = '".$row['rs_id']."'";
            $cls_conn->select_base($sql1);
            $sql2 = "DELETE FROM tb_activity WHERE user_id = '".$row['user_id']."' AND act_item_name = '".$row['rs_item_name']."'";
            $cls_conn->select_base($sql2);
            $sql3 = "SELECT * FROM tb_item_detail WHERE itd_item_sts = 'rs' AND itd_item_name = '".$row['rs_item_name']."'";
            $sql3 = mysqli_fetch_array($cls_conn->select_base($sql3));
            $sql4 = "UPDATE tb_cate_item SET ith_avalible = ith_avalible + '".$row['rs_amount']."' WHERE ith_cate_type = '".$sql3['itd_cate_type']."'";
            $cls_conn->select_base($sql4);
            $sql5 = "UPDATE tb_item_detail SET itd_item_sts = 'a' WHERE itd_item_sts = 'rs' AND itd_item_name = '".$row['rs_item_name']."' LIMIT ".$row['rs_amount']."";
            $cls_conn->select_base($sql5);
            $sql6 = "UPDATE tb_user SET user_limit = user_limit + '".$row['rs_amount']."' WHERE user_id = '".$row['user_id']."'";
            $cls_conn->select_base($sql6);

        }
    }
