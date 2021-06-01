<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- get from template -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>View Teacher</h2>
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
                                    <!-- <th>Number</th> -->
                                    <th>Teacher Id</th>
                                    <th>Firstname</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Telephone Number</th>
                                    <th>Teacher Limit</th>
                                    <th>Status</th>
                                    <!-- <th>Password</th> -->

                                    
                                    
                                    
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

<!-- show information from database -->
                            <tbody>
                                <?php
                                $a='1';
                             $sql=" select * from tb_user where user_position = '1'";
                             $result=$cls_conn->select_base($sql);
                        function show_user_sts($sts)
                        {
                            switch($sts){
                                case 'p':
                                    return 'Penalty';
                                case 'n':
                                    return 'Normal';
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
                                            <?=$row['user_id'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_firstname'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_surname'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_email'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_tel'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_limit'];?>
                                        </td> 
                                        <td>
                                        <?=show_user_sts($row['user_sts']);?>
                                        </td>
                                        <!-- <td>
                                            <?=$row['user_password'];?>
                                        </td> -->
                                         <!-- <img  src="../updload/<?=$row['user_password']?>" way to upload picture from database>
                                            <img src="../upload/p1.jpg" width="32%">   way to upload picture from file
                                                              -->

                                        
                                        
                                        
                                        
                                        
                                        <td>
                                            <a href="update_teacher.php?id=<?=$row['user_id'];?>" onclick="return confirm('Do you want to edit?')"><img src="../image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_teacher.php?id=<?=$row['user_id'];?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
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
