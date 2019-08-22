<?php
session_start();
if(!isset($_SESSION['app_user'])){
    header("Location: ../index.php");
}

$page = "drug";
require_once('../classes/drug.class.php');
require_once('../inc/header.php');
//header("Location: ../index.php");

?>



<div class="card white-box" style="padding:20px  80px">
<h3 class="lead">Add Drug</h3>

    <div class="row">
        <form id="addDrug">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="name" placeholder="Generic Name">
                    <div class="form-control-feedback">
                        <i class="icon-pen2 text-muted"></i>
                    </div>
                </div>
            </div>

        </div>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="company" placeholder="Company name">
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
                    <option value="Syrup">Syrup</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Capsule">Capsule</option>
                    <option value="Powdered">Powdered</option>
                    <option value="Other">Other</option>
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
                    <option value="Children">Children</option>
                    <option value="Teenagers">Teenagers</option>
                    <option value="Adults">Adults</option>
                    <option value="Other">Other</option>
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
                <input type="number" class="form-control" name="price" placeholder="Price">

                <div class="form-control-feedback">
                    <i class="icon-cash text-muted"></i>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group has-feedback">
                <select name="status" id="" class="single-select">
                    <option value="" class="text-muted">Select Status</option>

                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <div class="form-control-feedback">
                    <i class="icon-info22 text-muted"></i>
                </div>
            </div>
        </div>
        <input type="submit" value="Add" class="btn btn-primary pull-right">
        <input type="hidden" name="action" value="addDrug">

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

    $(document).on("submit","#addDrug",function(ev){
        ev.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url:"../controllers/drug_controller.php",
            type:"POST",
            data:data,
            success:function(text){
                if(text == 1){
                    makeToast("Drug Added","green","success")
                    $('#addDrug')[0].reset();
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