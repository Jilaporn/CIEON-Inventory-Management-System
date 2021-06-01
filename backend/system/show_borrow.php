<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- get from template -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>View borrow list</h2>
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
                                    <th>User Firstname</th>
                                    <th>User Surname</th>
                                    <th>RFID Tag</th>
                                    <th>Item Name</th>
                                    <th>Borrowed Date</th>
                                    <th>Return Date</th>
                                   
                                  
                                </tr>
                            </thead>

<!-- show information from database -->
                            <tbody>
                                <?php
                                $a='1';
                             $sql=" select * from tb_activity 
                             INNER JOIN tb_user on tb_user.user_id = tb_activity.user_id
                             where act_type = 'b' ";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                                    <tr>
                                       <td>
                                           <?=$a++;?>
                                        </td>
                                        <td>
                                            <?=$row['user_firstname'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_surname'];?>
                                        </td>
                                        <td>
                                            <?=$row['rfid_tag'];?>
                                        </td>
                                        <td>
                                            <?=$row['act_item_name'];?>
                                        </td>
                                        <td>
                                            <?=$row['act_date'];?>
                                        </td>
                                        <td>
                                            <?=$row['act_exp_date'];?>
                                        </td>
                                         <!-- <img  src="../updload/<?=$row['admin_password']?>" way to upload picture from database>
                                            <img src="../upload/p1.jpg" width="32%">   way to upload picture from file
                                                              -->

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
