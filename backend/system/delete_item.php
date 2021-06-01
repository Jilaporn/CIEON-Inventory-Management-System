<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Delete Item</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    
                        <?php
                        if(isset($_GET['id']))
                        {
                            $id=$_GET['id'];
                            $type = $_GET['type'];

                          
                            $sql=" delete from tb_item_detail";
                            $sql.=" where";
                            $sql.=" item_detail_id='$id'";
                        
                            $sqlitem ="SELECT * from tb_cate_item where ith_cate_type  = '$type' ";
                            $re=$cls_conn->select_base($sqlitem);
                            while($row=mysqli_fetch_array($re)){
                                $idd = $row['ith_cate_type'];
                                $idm = $row['ith_amount'];
                                $ida = $row['ith_avalible'];
                            }


                            $sqlupamount = $idm - '1';
                            $sqlupavalible = $ida - '1';
                            $up = "UPDATE  tb_cate_item set ith_amount = '$sqlupamount', ith_avalible = '$sqlupavalible' where ith_cate_type = '$type' ";
                            $cls_conn->write_base($up);

                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('Delete Success');
                                echo $cls_conn->goto_page(1,'show_item.php');
                                // echo $sql;
                            }
                            else
                            {
                                 echo $cls_conn->show_message('Delete Unsuccess');
                                //  echo $sql;
                            }
                        }
                        
                        ?>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php');?>