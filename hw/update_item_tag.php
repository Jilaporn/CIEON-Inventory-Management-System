<?php
include('class_conn.php');
$cls_conn=new class_conn;
if(isset($_GET['rfid_tag']))
{
	$rfid_tag=$_GET['rfid_tag'];
	$locker_no=$_GET['locker_no'];
	$item_time=date('Y-m-d H:i:s');
    

	$sql=" UPDATE tb_item_detail SET rfid_tag = '$rfid_tag' WHERE rfid_tag = '0' AND rfid_tag != '$rfid_tag'  limit 1;";
	$cls_conn->write_base($sql);
	
	

}

?>