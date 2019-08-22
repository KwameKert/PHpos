<?php

require_once('../classes/inventory.class.php');

$inventory = new Inventory();
$action = filter_input(0,"action",513);


switch($action){

    case 'addStock':

       echo $inventory->addStock($_POST);
       break;


    case 'listStock':
        echo $inventory->listStocks();
        break;

    case 'editStock':
        echo $inventory->editStock($_POST);
        break;

}