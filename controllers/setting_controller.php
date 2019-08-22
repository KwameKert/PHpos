<?php

require_once('../classes/setting.class.php');

$setting = new Setting();
$action = filter_input(0,"action",513);

switch($action){

    case 'addUnit':
        echo $setting->addUnit($_POST);
        break;

    case 'listUnits':
        echo $setting->listUnits();
        break;
}