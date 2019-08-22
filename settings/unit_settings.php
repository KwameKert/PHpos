<?php
session_start();
if(!isset($_SESSION['app_user'])){
    header("Location: ../index.php");
}

$page = "setting";
require_once('../classes/setting.class.php');
require_once('../inc/header.php');
//header("Location: ../index.php");



?>

<div class="card white-box" style="padding:20px  80px">
    <h3 class="lead " style="margin-left:-10px">Add unit setting</h3>
    <form action="" id="addUnit">
        <div class="row">
            <div class="form-group has-feedback">
                <input type="text" class="form-control"  name="name" placeholder="Unit Name">
                <div class="form-control-feedback">
                    <i class="icon-pen2 text-muted"></i>
                </div>
            </div>
        </div>


<div class="row">
    <div class="form-group">
        <textarea name="description" id="" cols="10" rows="3" class="form-control">Description
        </textarea>
    </div>
</div>



    <div class="row">
        <div class="form-group has-feedback">
            <select name="status" id="" class="single-select">
                <option value="" class="text-muted">Select Status</option>

                <option value="Active" >Active</option>
                <option value="Inactive" >Inactive</option>
            </select>
            <div class="form-control-feedback">
                <i class="icon-info22 text-muted"></i>
            </div>
        </div>
    </div>
    <div class="row">
        <input type="submit" value="Add" class="btn btn-success pull-right">
        <input type="hidden" name="action" value="addUnit">

    </div>


</form>
<div class="row">
</div>
</div>

<div class="white-box" id="list">
    <table class='table datatable-basic'>
        <thead>
        <tr>
            <th>#</th>
            <th>Unit  Name</th>
            <th>Description</th>
            <th>Date Created</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody >

        <?php
        $obj = new Setting();
        echo $obj->listUnits();
        ?>

        </tbody>
    </table>


</div>






<?php

require_once('../inc/footer.php');

?>


<script>
    $(document).on('submit','#addUnit',function(ev){
        ev.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url:"../controllers/setting_controller.php",
            type:"POST",
            data:data,
            success:function(text){
                if(text == 1){
                    makeToast("Unit Added","green","success");
                    $("tbody").load("../controllers/setting_controller.php", {"action": "listUnit"})
                }else if(text == 0){
                    makeToast("An error occured","red","error");
                }else {
                    makeToast("Please check internet connection ","red","error");
                }
            }
        })
    })
</script>

