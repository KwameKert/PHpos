<?php
session_start();
if(!isset($_SESSION['app_user'])){
    header("Location: ../index.php");
}

$page = "inventory";
require_once('../classes/inventory.class.php');
require_once('../inc/header.php');
//header("Location: ../index.php");

 $s_id = base64_decode($_GET['id']);
$obj = new MySQL();
$obj->Query("SELECT * FROM stockings WHERE status ='Active' AND id=$s_id");
$row = $obj->Row();

$drug_id = $row->drug_id;
$expiration = $row->expiration_date;
$unit = $row->unit;
$qty = $row->unit_qty;
?>



<div class="card white-box" >
    <h3 class="lead">Edit Stock</h3>

    <div class="row">
        <form id="editStock">
            <label for="" class="col-md-1">
                <h6 style="">Drug : </h6>
            </label>
            <div class="col-md-5" style="margin-left:-20px">
                <div class="form-group has-feedback">
                    <select name="drug_id" id="" class="single-select">
                        <option value="" class="text-muted"> select </option>
                        <?php
                        $obj = new MySQL();
                        $obj->Query("SELECT * FROM drugs WHERE status='Active'");
                        while(!$obj->EndOfSeek()){
                            $row = $obj->Row();
                            echo ($row->id ==$drug_id)? "<option value='$row->id' selected>$row->generic_name</option>":"<option value='$row->id'>$row->generic_name</option>";
                        }

                        ?>
                    </select>
                    <div class="form-control-feedback">
                        <i class="icon-pen2 text-muted"></i>
                    </div>
                </div>
            </div>

            <label for="" class="col-md-2 float-right" style="margin-left:20px">
                <h6 style="text-align:right">Expiration Date: </h6>
            </label>
            <div class="col-md-4" >
                <div class="form-group has-feedback">
                    <input type="date" name="exp_date" value="<?php echo $expiration; ?>"  placeholder="Expiration date"  class="form-control">
                    <div class="form-control-feedback">
                        <i class="icon-calendar text-muted"></i>
                    </div>
                </div>

            </div>

    </div>
    <div class="row">
        <label for="" class="col-md-1">
            <h6 style="">Unit : </h6>
        </label>
        <div class="col-md-5" style="margin-left:-20px">
            <div class="form-group has-feedback">
                <select name="unit" id="" class="single-select">
                    <option value="">select</option>
                    <?php
                    $obj = new MySQL();
                    $obj->Query("SELECT * FROM units WHERE status='Active'");
                    while(!$obj->EndOfSeek()){
                        $row = $obj->Row();
                        echo ($row->id == $unit)? "<option value='$row->id' selected>$row->unit_name</option>": "<option value='$row->id'>$row->unit_name</option>";

                    }

                    ?>
                    ?>
                </select>
                <div class="form-control-feedback">
                    <i class="icon-equalizer text-muted"></i>
                </div>
            </div>
        </div>


        <label for="" class="col-md-2 float-right" style="margin-left:20px">
            <h6 style="text-align:right">Quantity: </h6>
        </label>
        <div class="col-md-4">
            <div class="form-group has-feedback">
                <input type="number" name="qty" value="<?php echo $qty?>" class="form-control">
                <div class="form-control-feedback">
                    <i class="icon-drawer-in text-muted"></i>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        <input type="submit" value="Update" class="btn btn-info btn-xs pull-right">
        <input type="hidden" name="action" value="editStock">
        <input type="hidden" name="stock_id" value="<?php echo $s_id?>">


    </div>
</div>


</form>
</div>



<div class="white-box" id="list">
    <table class='stripe' id="myTable">
        <thead>
        <tr>
            <th>#</th>
            <th>Generic Name</th>
            <th>Unit</th>
            <th>Quantity left</th>
            <th>Expiration date</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody >

        <?php
        $obj = new Inventory();
        echo $obj->listStocks();
        ?>

        </tbody>
    </table>


</div>


<?php

require_once('../inc/footer.php');

?>


<script>

    $(document).on("submit","#editStock",function(ev){
        ev.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url:"../controllers/inventory_controller.php",
            type:"POST",
            data:data,
            success:function(text){
                if(text == 1){
                    makeToast("Stock Updated","green","success")
                    $("tbody").load("../controllers/inventory_controller.php", {"action": "listStock"})
                }else if(text == 0){
                    makeToast("An error occured","red","error");
                }else {
                    makeToast("Please check internet connection ","red","error");
                }
            }
        })
    })
</script>