<?php
    include('class_conn.php');
	$cls_conn=new class_conn;

	$sql=" select locker_no from tb_locker";
	$sql.=" where";
	$sql.=" locker_sts = 'o' or locker_sts = 'b' or locker_sts = 'bk' or locker_sts = 'r'";
	 
	$rs=$cls_conn->select_base($sql);
	$send = array();
	while($row=mysqli_fetch_array($rs))
	{
		 $ar=array();
		 $ar['locker_no'] =  $row["locker_no"];
		 
		 
		  array_push($send, $ar);
	}
	 echo json_encode($send);
	
   
?>