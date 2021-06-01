<?php
include('class_conn.php');
$cls_conn=new class_conn;
if(isset($_GET['rfid_tag']))
{
	$rfid_tag=$_GET['rfid_tag'];

    

	$sql="SELECT itd_boxno,locker_no,item_id,itd_item_name,itd_item_pic,itd_item_sts FROM tb_item_detail WHERE rfid_tag = '$rfid_tag'";
	$resultu = $cls_conn->select_base($sql);
	//call array from database
	while ($row = mysqli_fetch_array($resultu)) {
		// var_dump($rowu);
		$itd_boxno = $row['itd_boxno'];
		$locker_no = $row['locker_no'];
		$item_id = $row['item_id'];
		$itd_item_name = $row['itd_item_name'];
		$itd_item_pic = $row['itd_item_pic'];
		$itd_item_sts = $row['itd_item_sts'];
		

		$sql1 = " UPDATE tb_activity SET rfid_tag = '$rfid_tag',act_boxno = '$itd_boxno',locker_no = '$locker_no',item_id = '$item_id',act_item_name = '$itd_item_name', act_pic = '$itd_item_pic' WHERE rfid_tag = '0' and act_type = '$itd_item_sts' and act_flag = 'o' LIMIT 1";
		$cls_conn->write_base($sql1);
	}
}
	  
	
	

?>