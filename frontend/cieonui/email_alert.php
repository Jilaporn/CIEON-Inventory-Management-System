<?php
    session_start();
    include('../../backend/class_conn.php');
    $cls_conn = new class_conn();
    $sql = "SELECT * FROM tb_activity WHERE is_notify = 0";
    $cls_conn -> select_base($sql);
    while($rowu=mysqli_fetch_array($resultu))
    {
        
    }



?>