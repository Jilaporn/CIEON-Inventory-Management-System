<!-- for plus and minus -->
<form method="post" class="row">
                                    <button type="submit"  name="minus" value='<?=$row['rs_item_name']?>' class="btn btn-primary display-4" >---</button>
                                    <button type="submit"  name="plus" value='<?=$row['rs_item_name']?>'class="btn btn-primary display-4">+</button>
                                    </form>
        <?php if(isset($_POST['minus'])){
        $minus = $_POST['minus'];
           $otp = $_GET['otp'];
           $idd= $_SESSION['user_id'];
           $sql = "SELECT
           tb_reserve.rs_id,
           tb_reserve.item_id,
           tb_reserve.rs_amount,
           tb_reserve.rs_date,
           tb_reserve.cate_type,
           tb_reserve.rs_flag,
           tb_reserve.user_id,
           tb_reserve.rs_pic,
           tb_reserve.rs_otp,
           tb_reserve.rs_item_name
           FROM
           tb_reserve
           where tb_reserve.rs_item_name = '$minus' and tb_reserve.rs_amount > '0'
           GROUP by tb_reserve.rs_item_name 
           ";
   // echo $sql;
   $result=$cls_conn->select_base($sql);
   while($row=mysqli_fetch_array($result)){
   $all = $row['rs_amount'];
   $rs_id = $row['rs_id'];
   }

   $sql1 = "SELECT * from tb_user where user_id = '$idd' ";
$result1=$cls_conn->select_base($sql1);
while($row=mysqli_fetch_array($result1)){
$user_limit = $row['user_limit'];
}
 
$sqll9 = "SELECT * from tb_cate_item where item_id = '$item_id'
";
$ree9 = $cls_conn->select_base($sqll9);
while ($row = mysqli_fetch_array($ree9)) {
$item_id = $row['item_id'];
$ith_avalible = $row['ith_avalible'];
}


if ($allamount + $num > $ith_avalible) {
    echo $cls_conn->show_message('Amount overdue');
} elseif ($num > $count) {
    echo $cls_conn->show_message('Overbooked');
} elseif (0 > $alllimit) {
    echo $cls_conn->show_message('Reseve over limit');
} else {





$userlimit = $user_limit + 1 ; 
   $updateuser = "UPDATE tb_user set user_limit = '$userlimit' where user_id = '$idd' ";
   $cls_conn->write_base($updateuser) == true;

    $upall =  $all - 1 ;
    
    $updaters = "UPDATE tb_reserve set rs_amount = '$upall' where rs_id = '$rs_id' ";
    $cls_conn->write_base($updaters) == true;
    echo $cls_conn->goto_page(1, '');

}
    }elseif(isset($_POST['plus'])){

        $minus = $_POST['minus'];
        $otp = $_GET['otp'];
        $idd= $_SESSION['user_id'];
        $sql = "SELECT
        tb_reserve.rs_id,
        tb_reserve.item_id,
        tb_reserve.rs_amount,
        tb_reserve.rs_date,
        tb_reserve.cate_type,
        tb_reserve.rs_flag,
        tb_reserve.user_id,
        tb_reserve.rs_pic,
        tb_reserve.rs_otp,
        tb_reserve.rs_item_name
        FROM
        tb_reserve
        where tb_reserve.rs_item_name = '$minus' and tb_reserve.rs_amount > '0'
        GROUP by tb_reserve.rs_item_name 
        ";
// echo $sql;
$result=$cls_conn->select_base($sql);
while($row=mysqli_fetch_array($result)){
$all = $row['rs_amount'];
$rs_id = $row['rs_id'];
}
 // echo $rs_id;
 //echo '1111';
 $upall =  $all + 1 ;
 // echo $upall;
 $updaters = "UPDATE tb_reserve set rs_amount = '$upall' where rs_id = '$rs_id' ";
 // $sql = " UPDATE tb_reserve set rs_otp = '$rndno' where user_id = '$idd' ";
 // echo $updaters ;
 $cls_conn->write_base($updaters) == true;
//  echo $cls_conn->goto_page(1, '');


        } ?> -->