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



<div class="white-box" id="list">
    <h3>Stock List</h3>

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
