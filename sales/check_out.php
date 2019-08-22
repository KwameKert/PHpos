<?php
session_start();
if(!isset($_SESSION['app_user'])){
    header("Location: ../index.php");
}

$page = "sales";
require_once('../classes/sale.class.php');
require_once('../classes/drug.class.php');
require_once('../inc/header.php');
//header("Location: ../index.php");
$t_id = $_GET['t_id'];

$obj = new MySQL();
$obj->Query("SELECT total_price,t_id FROM transactions WHERE id='$t_id'");
$row = $obj->Row();
$total = $row->total_price;
$trans_id = $row->t_id;
 $sql ="SELECT transaction_id,drug_id,quantity,drug_sales.price,drugs.id as d_id, drugs.generic_name FROM drug_sales INNER JOIN drugs ON drugs.id = drug_sales.drug_id WHERE transaction_id='$trans_id'";

$obj->Query($sql);
//echo $obj->Error();

?>
<div class="row " style="margin-left:80px;width:50%">
    <div class="col-md-3 col-md-offset-5">

        <h2>Local Pharmacy</h2>
        <p><b>Id :</b> <?php echo $trans_id?></p>
        <p><b>Date : </b><?php echo date("Y-m-d h:i:sa") ?></p>
        <p><b>Store : </b> Dansoman</p>
        <p><b>Address :</b> Ebenezer Street</p>
        <p class="text-bold">Accra-North, 444</p>

        <div style="margin-left:20px;width:80%">
        <?php while(!$obj->EndOfSeek()){$row = $obj->Row(); ?>
            <p><?php echo $row->quantity ?>&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $row->generic_name ?></b>&nbsp;&nbsp;&nbsp;<span style="float:right">₵ <?php echo  $row->quantity*$row->price ?></span></p>

        <?php };?>
            <hr style="margin-right:0px;">
            <p style="padding-left:65px;float:right"><b>Total&nbsp;:&nbsp;&nbsp;</b>₵  <?php echo $total; ?></p>

        </div>
    </div>
    </div>


<?php

require_once('../inc/footer.php');

?>


<script>

    $(document).on('ready',function(){
        window.print()

    })
</script>
