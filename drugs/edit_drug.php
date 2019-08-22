<?php
session_start();
if(!isset($_SESSION['app_user'])){
    header("Location: ../index.php");
}

$page = "drug";
require_once('../classes/drug.class.php');
require_once('../inc/header.php');
//header("Location: ../index.php");
$d_id = base64_decode($_GET['d_id']);
$obj = new MySQL();
$obj->Query("SELECT * FROM drugs WHERE id=$d_id");
$row = $obj->Row();
?>



<div class="card white-box" style="padding:20px  80px">
    <h3 class="lead">Edit Drug</h3>

    <div class="row">
        <form id="editDrug">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" value="<?php echo $row->generic_name?>" name="name" placeholder="Generic Name">
                    <div class="form-control-feedback">
                        <i class="icon-pen2 text-muted"></i>
                    </div>
                </div>
            </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" value="<?php echo $row->company?>" name="company" placeholder="Company name">
                <div class="form-control-feedback">
                    <i class="icon-store text-muted"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group has-feedback">
                <select name="type" id="" class="single-select">
                    <option value="" class="text-muted">Select type </option>
                    <option value="Syrup" <?php echo $row->type=='Syrup'? 'selected': ''?>>Syrup</option>
                    <option value="Capsule" <?php echo $row->type=='Capsule'? 'selected': ''?>>Capsule</option>
                    <option value="Powdered" <?php echo $row->type=='Powdered'? 'selected': ''?> >Powdered</option>
                </select>
                <div class="form-control-feedback">
                    <i class="icon-move text-muted"></i>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group has-feedback">
                <select name="category" id="" class="single-select">
                    <option value="" class="text-muted">Select Category</option>
                    <option value="Children" <?php echo $row->category=='Children'? 'selected': ''?>>Children</option>
                    <option value="Adults" <?php echo $row->category=='Adults'? 'selected': ''?>>Adults</option>
                </select>
                <div class="form-control-feedback">
                    <i class="icon-users4 text-muted"></i>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-6">
            <div class="form-group has-feedback">
                <input type="number" class="form-control" value="<?php echo $row->price; ?>" name="price" placeholder="Price">

                <div class="form-control-feedback">
                    <i class="icon-cash text-muted"></i>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group has-feedback">
                <select name="status" id="" class="single-select">
                    <option value="" class="text-muted">Select Status</option>

                    <option value="Active" <?php echo $row->status=='Active'? 'selected': ''?> >Active</option>
                    <option value="Inactive" <?php echo $row->status=='Inactive'? 'selected': ''?>>Inactive</option>
                </select>
                <div class="form-control-feedback">
                    <i class="icon-info22 text-muted"></i>
                </div>
            </div>
        </div>
        <input type="submit" value="Update" class="btn btn-info pull-right">
        <input type="hidden" name="action" value="editDrug">
        <input type="hidden" name="id" value="<?php echo $d_id?>">
    </div>


    </form>
</div>



<div class="white-box" id="list">
    <table id="myTable" class="stripe">
        <thead>
        <tr>
            <th>#</th>
            <th>Generic Name</th>
            <th>Company</th>
            <th>Type</th>
            <th>Category on</th>
            <th>Price(¢)</th>
            <th>Date Created</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody >

        <?php
        $obj = new Drug();
        echo $obj->listDrugs();
        ?>

        </tbody>
    </table>


</div>


<?php

require_once('../inc/footer.php');

?>


<script>

    $(document).on("submit","#editDrug",function(ev){
        ev.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url:"../controllers/drug_controller.php",
            type:"POST",
            data:data,
            success:function(text){
                if(text == 1){
                    makeToast("Drug Updated","green","success");
                    $("tbody").load("../controllers/drug_controller.php", {"action": "listDrugs"})
                }else if(text == 0){
                    makeToast("An error occured","red","error");
                }else {
                    makeToast("Please check internet connection ","red","error");
                }
            }
        })
    })
</script>