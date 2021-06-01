<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- get from template -->
        <div class="x_panel">
            <div class="x_title">
                <h2>View Activity</h2>
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
                            <th>Activity</th>
                            <th>Borrowed Date</th>
                            <th>Return Date</th>
                            <th>Broken detail</th>
                            <!-- <th>Act flag</th> -->
                            <th>Delete</th>

                        </tr>
                    </thead>

                    <!-- show information from database -->

                    <tbody>
                        <?php
                        $a = '1';
                        $sql = " SELECT * from tb_activity
                        inner join tb_user on tb_user.user_id = tb_activity.user_id
                        ";
                        $result = $cls_conn->select_base($sql);
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
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <?= $a++; ?>
                                </td>
                                <td>
                                    <?= $row['user_firstname']; ?>
                                </td>
                                <td>
                                    <?= $row['user_surname']; ?>
                                </td>
                                <td>
                                    <?= $row['rfid_tag']; ?>
                                </td>
                                <td>
                                    <?= $row['act_item_name']; ?>
                                </td>
                                <td>
                                    <?=show_item_sts($row['act_type']);?>
                                </td>
                                <td>
                                    <?= $row['act_date']; ?>
                                </td>
                                <td>
                                    <?= $row['act_exp_date']; ?>
                                </td>
                                <td>
                                    <?= $row['act_bk_detail']; ?>
                                </td>
                                <!-- <td>
                                    <?= $row['act_flag']; ?>
                                </td> -->

                                <!-- <img  src="../updload/<?= $row['user_password'] ?>" way to upload picture from database>
                                            <img src="../upload/p1.jpg" width="32%">   way to upload picture from file
                                                              -->
                                <td>
                                    <a href="delete_history.php?id=<?= $row['act_id']; ?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Copyright@https://forums.asp.net/t/2169978.aspx?How+to+set+End+date+should+be+greater+than+the+Start+date+jQuery+DatePickers+ , code select date-->
                <script>
                    $(function() {
                        var todaydt = new Date();
                        $("#txt_date_fr").datepicker({
                            autoclose: true,
                            dateFormat: "yy/mm/dd",
                            endDate: todaydt,
                            onSelect: function(date) {
                                //Get selected date 
                                var date2 = $('#txt_date_fr').datepicker('getDate');
                                //sets minDate to txt_date_to
                                $('#txt_date_to').datepicker('option', 'minDate', date2);
                            }
                        });
                        $('#txt_date_to').datepicker({
                            dateFormat: "yy/mm/dd",

                        });
                    });
                </script>

            </div>
            <a data-toggle="modal" data-target="#myModal" class='btn' style="background-color: red; color: white;">Clear History</a>
            <form method="POST">
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Select delete date</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-12 col-md-10">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstday">First Day<span class="required">:</span> </label>
                                    <input class="form-control" type="date" name="firstday" id='txt_date_fr'>
                                </div>
                            </div>
                            <br></br>
                            <div class="modal-body">
                                <div class="col-sm-12 col-md-10">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastday">Last Day<span class="required">:</span> </label>
                                    <input class="form-control" type="date" name="lastday" id="txt_date_to">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php if (isset($_POST['submit'])) {
    $firstday = $_POST['firstday'];
    $lastday = $_POST['lastday'];
    $sql = "DELETE FROM tb_activity where act_date <= '$lastday 00:00' and  act_date >= '$firstday 23:59' and act_flag = 'c' ";

    if ($cls_conn->write_base($sql) == true) {
        echo $cls_conn->show_message('Delete Success');
        // echo $cls_conn->goto_page(1, 'show_history.php');
         echo $sql;
    } else {
        echo $cls_conn->show_message('Delete Unsuccess');
        //  echo $sql;
    }
} ?>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php include('footer.php'); ?>