<?php
include('class_conn.php');
$cls_conn=new class_conn;
if(isset($_GET['rfid_tag']))
{
	$rfid_tag=$_GET['rfid_tag'];
	$locker_no=$_GET['locker_no'];
	$item_time=date('Y-m-d H:i:s');
    

	$sql=" update tb_item_detail SET itd_item_sts = 'bk' WHERE rfid_tag = $rfid_tag";
	$cls_conn->write_base($sql);

	$sql2 ="update tb_locker set locker_sts = 'c' where locker_no = $locker_no";
	$cls_conn->write_base($sql2);
	
	

}

?>