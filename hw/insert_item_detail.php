<?php
include('class_conn.php');
$cls_conn=new class_conn;
if(isset($_GET['rfid_tag']))
{
	$rfid_tag=$_GET['rfid_tag'];
	$locker_no=$_GET['locker_no'];
	$item_time=date('Y-m-d H:i:s');
	
	$sql=" insert into tb_item_detail(rfid_tag,item_time)";
	$sql.=" values('$rfid_tag','$item_time')";
	$cls_conn->write_base($sql);
	
	

}

?>