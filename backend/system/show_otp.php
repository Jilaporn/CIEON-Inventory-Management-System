<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- get from template -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>View OTP</h2>
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
                                    <th>OTP Number</th>
                                    <th>OTP Date</th>

                                    
                                    
                                    
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

<!-- show information from database -->
                            <tbody>
                                <?php
                                $a='1';
                             $sql=" select * from tb_otp";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                                    <tr>
                                       <td>
                                           <?=$a++;?>
                                        </td>
                                        <td>
                                            <?=$row['otp_datetime'];?>
                                        </td>
                                        <td>
                                            <?=$row['otp_reserve'];?>
                                        </td>
                                         <!-- <img  src="../updload/<?=$row['user_password']?>" way to upload picture from database>
                                            <img src="../upload/p1.jpg" width="32%">   way to upload picture from file
                                                              -->

                                        
                                        
                                        
                                        
                                        
                                        <!-- <td>
                                            <a href="update_otp.php?id=<?=$row['otp_id'];?>" onclick="return confirm('Do you want to edit?')"><img src="../image/edit.png" /></a>
                                        </td> -->
                                        <td>
                                            <a href="delete_otp.php?id=<?=$row['otp_id'];?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
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
