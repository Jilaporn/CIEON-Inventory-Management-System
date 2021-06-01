<?php
    include('../class_conn.php');
	$cls_conn=new class_conn;
	

	
	$sql=" select locker_no from tb_locker";
	$sql.=" where";
	$sql.=" locker_sts='o'";
	 
	$rs=$cls_conn->select_base($sql);
	$send = array();

	while($row=mysqli_fetch_array($rs))
	{
		$manual=array();
		 $manual['locker_no'] =  $row["locker_no"];
		 
		 
		  array_push($send, $manual);
	}
	 echo json_encode($send);
	
   
?>