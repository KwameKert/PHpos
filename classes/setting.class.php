<?php

require_once('mysql.class.php');


class Setting extends MySQL
{
    public function __construct()
    {

        parent::__construct();
        @session_start();
    }



    public function listUnits(){
        $sql = "SELECT * FROM units WHERE status ='Active'";
        $this->Query($sql);
        $output ="";
        $i= 1;
        while(!$this->EndOfSeek()){
            $row = $this->Row();
            $output.=" <tr>
 <td>$i</td>
 <td>$row->unit_name</td>
 <td>$row->description</td>
 <td>$row->created_on</td>
 <td>Action</td>
 
</tr>";

$i++;        }
return $output;

    }

    public function addUnit($post){
        if(sizeof($post)>0){
            $values = Array();

            $values['unit_name'] = MySQL::SQLValue(filter_input(0,"name",513));
            $values['description'] = MySQL::SQLValue(filter_input(0,"description",513));
            $values['status'] = MySQL::SQLValue(filter_input(0,"status",513));
            $values['created_on'] = "now()";
            $values['created_by'] = MySQL::SQLValue($_SESSION['app_user']['id']);

           $sql = MySQL::BuildSQLInsert("units",$values);
            return $this->Query($sql)? 1:0;

        }else{
            return -1;
        }
    }





}