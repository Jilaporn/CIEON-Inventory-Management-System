<?php include('header.php'); ?>
<div class="right_col" role="main">
    <?php
    $sqlu = "SELECT
    Count(tb_item_detail.itd_item_name),
    tb_item_detail.itd_item_name
    FROM
    keendemy_cieinventory.tb_item_detail
    Group by tb_item_detail.itd_item_name
           ";
    $resultu = $cls_conn->select_base($sqlu);
    while ($rowu = mysqli_fetch_assoc($resultu)) {
    ?>
        <div class="alert alert-danger" role="alert">
            Item  <?= $rowu['itd_item_name']?> almost out of stock, please add stock<br>
        </div>
    <?php
    }
    ?>

</div>
<?php include('footer.php'); ?>