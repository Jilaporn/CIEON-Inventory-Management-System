<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- get from template -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>View Item</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                         <!-- call from script -->
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width: 100%;" >
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Item Box Number</th> 
                                    <th>RFID Tag</th>
                                    <th>Item picture</th>
                                    <th>Category Type</th>
                                    <th>Locker Number</th>
                                    <th>Item Status</th>
                                    <th>Item Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
<head>
<style>

                                    .img{

                                     width:100px
                                    }
                                </style>
                             <head>
<!-- show information from database -->
                            <tbody>
                                <?php
                                $a='1';
                              $sql=" select * from tb_item_detail
                              ";
                             $result=$cls_conn->select_base($sql);
                             function show_item_sts($sts)
                             {
                                switch($sts){
                                    case 'a':
                                        return 'Available';
                                    case 'b':
                                        return 'Borrow';
                                    case 'r':
                                        return 'Return';
                                    case 'rs':
                                        return 'Reserve';
                                    case 'bk':
                                        return 'Broken';
                                    case 'l':
                                        return 'Lost';

                                }
                             }
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                                    <tr>
                                        <!-- <td>
                                           <?=$a++;?>
                                        </td> -->
                                        <td>
                                            <?=$row['itd_item_name'];?>
                                        </td>  
                                        <td>
                                            <?=$row['itd_boxno'];?>
                                        </td>  
                                        <td>
                                            <?=$row['rfid_tag'];?>
                                        </td>
                                        
                                         <td>
                                            <img src="../upload/<?=$row['itd_item_pic']?>" class="img" width="100%">
                                        </td> 
                                        
                                        <td>
                                            <?=$row['itd_cate_type'];?>
                                        </td>

                                        <td>
                                            <?=$row['locker_no'];?>
                                        </td>

                                        <td>
                                            <?=show_item_sts($row['itd_item_sts']);?>
                                        </td>

                                        <td>
                                            <?=$row['item_time'];?>
                                        </td>
                                          
                                       
                                         <!-- <img  src="../updload/<?=$row['admin_password']?>" way to upload picture from database>
                                            <img src="../upload/p1.jpg" width="32%">   way to upload picture from file
                                                              -->
                                        <td>
                                            <a href="update_item.php?item_detail_id=<?=$row['item_detail_id'];?>" onclick="return confirm('Do you want to edit?')"><img src="../image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_item.php?id=<?=$row['item_detail_id'];?>&type=<?=$row['itd_cate_type'];?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
                                        </td>
                                    </tr>
                                    <?php
                             }
                          ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

    </div>


    <?php include('footer.php');?>
