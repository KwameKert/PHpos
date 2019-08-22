<?php

require_once('../classes/sale.class.php');

$sale = new Sale();
$action = $_POST['action'];
$id = filter_input(0,"id",257);
$drug = filter_input(0,"search",513);


switch($action){
    case 'showCat':
        echo $sale->showCategories();
        break;
    case 'show_cart':
        //echo "Curtis here";
        echo $sale->showCart();
        break;

    case 'listDrugs':

        echo $sale->listDrugs($drug);
        break;

    case 'getDrugDetails':
        echo $sale->getDrug($id);
        break;

    case 'addToCart':
        echo $sale->addDrug($_POST);
        break;

    case 'remove':
        echo $sale->removeDrug($id);
        break;

    case 'clear':
        echo $sale->clearCart();
        break;

    case 'checkout':
        $t_id  = uniqid('ph_');
        $total_price = filter_input(0,"total_price",257);
        $total_item = filter_input(0,"total_item",257);
        echo $sale->transaction($t_id,$total_price,$total_item);
        break;
}