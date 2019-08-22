<?php

require_once('../classes/drug.class.php');

$drug = new Drug();
$action = filter_input(0,"action",513);


switch($action){
    case 'addDrug':
        echo $drug->addDrug($_POST);
        break;

    case 'listDrugs':
        echo $drug->listDrugs();
        break;


    case 'editDrug':
        echo $drug->editDrug($_POST);
        break;
}



