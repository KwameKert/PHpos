<?php
session_start();
if(!isset($_SESSION['app_user'])){
    header("Location: ../index.php");
}

$page = "inventory";
require_once('../classes/inventory.class.php');
require_once('../inc/header.php');
//header("Location: ../index.php");

?>



<div class="card white-box" >
    <h3 class="lead">Add Stock</h3>

    <div class="row">
        <form id="addStock">
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
                                echo "<option value='$row->id'>$row->generic_name</option>";
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
                    <input type="date" name="exp_date" placeholder="Expiration date"  class="form-control">
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
                <select name="unit" id="unit" class="single-select">
                    <option value="0">select</option>
                    <?php
                    $obj = new MySQL();
                    $obj->Query("SELECT * FROM units WHERE status='Active'");
                    while(!$obj->EndOfSeek()){
                        $row = $obj->Row();
                        echo "<option value='$row->id'>$row->unit_name</option>";

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
                <input type="number" name="qty" class="form-control">
                <div class="form-control-feedback">
                    <i class="icon-drawer-in text-muted"></i>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        <input type="submit" value="Stock" class="btn btn-primary btn-xs pull-right">
        <input type="hidden" name="action" value="addStock">


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

    $(document).on("submit","#addStock",function(ev){
        ev.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url:"../controllers/inventory_controller.php",
            type:"POST",
            data:data,
            success:function(text){
                if(text == 1){
                    makeToast("Stock Added","green","success")
                 
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