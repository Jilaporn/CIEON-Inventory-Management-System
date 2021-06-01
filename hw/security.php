<?php
include('class_conn.php');
$cls_conn=new class_conn;
if(isset($_GET['rfid_tag']))
{
	$rfid_tag=$_GET['rfid_tag'];

    

	$sql=" select itd_item_sts from tb_item_detail";
	$sql.=" where";
	$sql.=" rfid_tag = '$rfid_tag'";
	 
	$rs=$cls_conn->select_base($sql);
	$send = array();
	while($row=mysqli_fetch_array($rs))
	{
		 $ar=array();
		 $ar['itd_item_sts'] =  $row['itd_item_sts'];
		 
		 
		  array_push($send, $ar);
	}
	 echo json_encode($send);
		

	}


	

?>