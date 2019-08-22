<?php

require_once('mysql.class.php');


class Drug extends MySQL
{
    public function __construct()
    {

        parent::__construct();
        @session_start();
    }

    public function addDrug($post){
        if(sizeof($post)>0){
            $values = Array();

                $values['generic_name'] = MySQL::SQLValue(filter_input(0,"name",513));
                $values['company'] = MySQL::SQLValue(filter_input(0,"company",513));
                $values['type'] = MySQL::SQLValue(filter_input(0,"type",513));
                $values['category'] = MySQL::SQLValue(filter_input(0,"category",513));
                $values['price'] = MySQL::SQLValue(filter_input(0,"price",257));
                $values['status'] = MySQL::SQLValue(filter_input(0,"status",513));
                $values['created_by'] = MySQL::SQLValue($_SESSION['app_user']['id']);
                $values['created_on'] = "now()";

                $sql = MySQL::BuildSQLInsert("drugs",$values);
                echo $this->Error();
                return $this->Query($sql)? 1:0;
        }else{
            return -1;
        }
    }



    public function editDrug($post){
        if(sizeof($post)>0){
            $values = Array();
            $where = Array();
            $values['generic_name'] = MySQL::SQLValue(filter_input(0,"name",513));
            $values['company'] = MySQL::SQLValue(filter_input(0,"company",513));
            $values['type'] = MySQL::SQLValue(filter_input(0,"type",513));
            $values['category'] = MySQL::SQLValue(filter_input(0,"category",513));
            $values['price'] = MySQL::SQLValue(filter_input(0,"price",257));
            $values['status'] = MySQL::SQLValue(filter_input(0,"status",513));
            $values['updated_by'] = MySQL::SQLValue($_SESSION['app_user']['id']);
            $values['updated_on'] = "now()";
            $where['id'] = MySQL::SQLValue(filter_input(0,"id",257));
            $sql = MySQL::BuildSQLUpdate("drugs",$values,$where);
            echo $this->Error();
            return $this->Query($sql)? 1:0;
        }else{
            return -1;
        }
    }


    public function listDrugs(){
        $this->Query("SELECT * FROM drugs WHERE status='Active'");
        $i = 1;
        $output ="";

        while(!$this->EndOfSeek()){
            $row = $this->Row();

            $output .= "
            <tr>
            <td>$i</td>
            <td>$row->generic_name</td>
            <td>$row->company</td>
            <td>$row->type</td>
            <td>$row->category</td>
            <td>$row->price</td>
              <td>".date('M d Y',strtotime($row->created_on))."</td>
            <td class=\"text-center\">
                <ul class=\"icons-list\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <i class=\"icon-menu9\"></i>
                        </a>
                        <ul class=\"dropdown-menu dropdown-menu-right\">
                            <li><a   href='edit_drug.php?&d_id=".base64_encode($row->id)."'><i class=\"icon-pencil5\"></i> Edit</a></li>
                            <li><a class='delete'  type='drug' data-id='".base64_encode($row->id)."'><i class='icon-bin2 delete '></i> Delete</a></li>
                        </ul>
                    </li>
                </ul>
            </td>
        </tr>
            ";
            $i++;
        }

        return $output;


    }







}