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

<div class="white-box" id="list">
    <h3>Drug List</h3>
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



