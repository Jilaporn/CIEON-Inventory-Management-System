<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- get from template -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>Category information</h2>
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
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Locker Number</th>
                                    <th>Category Type</th>
                                   <!-- <th>Category Detail</th> -->
                                    <th>Item Amount</th>
                                    <th>Item Avalible</th>
                                  
                                   
                                    <!-- <th>extend_no</th>
                                    <th>extend_returndate</th>
                                    <th>extend_day</th>
                                    <th>password</th> -->

                                    
                                    
                                    
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

<!-- show information from database -->
                            <tbody>
                                <?php
                                $a='1';
                             $sql=" select * from tb_cate_item";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                                    <tr>
                                         <td>
                                           <?=$a++;?>
                                        </td> 
                                        <!-- <td> 
                                            <?=$row['item_id'];?>
                                        </td> -->
                                        <td>
                                            <?=$row['locker_no'];?>
                                        </td>
                                        <td>
                                            <?=$row['ith_cate_type'];?>
                                        </td>
                                        <td>
                                            <?=$row['ith_amount'];?> 
                                        </td>
                                        <td>
                                            <?=$row['ith_avalible'];?>
                                        </td>
                                        
                                       <!-- <td>
                                            <img src="../upload/<?=$row['category_pic']?>" class="img" width="25%">
                                        </td> -->
                                        
                                        <td>
                                            <a href="update_category.php?id=<?=$row['item_id'];?>" onclick="return confirm('Do you want to edit?')"><img src="../image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_category.php?id=<?=$row['item_id'];?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
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
