<?php

require_once('mysql.class.php');


class Inventory extends MySQL
{
    public function __construct()
    {

        parent::__construct();
        @session_start();
    }


    public function addStock($post){
        if(sizeof($post)>0){
            $values = Array();
            $drug_id = filter_input(0,"drug_id",257);
            $qty  = filter_input(0,"qty",257);
            $values['drug_id'] = MySQL::SQLValue($drug_id);
            $values['expiration_date'] = MySQL::SQLValue(filter_input(0,"exp_date",513));
            $values['unit_qty'] = MySQL::SQLValue(filter_input(0,"qty",257));
            $values['unit'] = MySQL::SQLValue(filter_input(0,"unit",257));
            $values['created_on'] = "now()";
            $values['created_by'] = MySQL::SQLValue($_SESSION['app_user']['id']);
            $sql =  MySQL::BuildSQLInsert("stockings",$values);

            $rs = $this->Query($sql);

            if($rs){
                return $this->updateDrugQty($drug_id,$qty);
            }
           // return ($this->Query($sql) && $this->updateDrugQty($drug_id,$qty))? 1:0;
        }else{
            return -1;
        }
    }


     function updateDrugQty($drug_id,$qty){
        $sql = "UPDATE drugs SET qty = qty + $qty WHERE id='$drug_id'";
       return $this->Query($sql);
}

    public function editStock($post){
        if(sizeof($post)>0){
            $values = Array();
            $where = Array();
            $values['drug_id'] = MySQL::SQLValue(filter_input(0,"drug_id",257));
            $values['expiration_date'] = MySQL::SQLValue(filter_input(0,"exp_date",513));
            $values['unit_qty'] = MySQL::SQLValue(filter_input(0,"qty",257));
            $values['unit'] = MySQL::SQLValue(filter_input(0,"unit",257));
            $values['updated_on'] = "now()";
            $values['updated_by'] = MySQL::SQLValue($_SESSION['app_user']['id']);
            $where['id'] =  MySQL::SQLValue(filter_input(0,"stock_id",257));
            $sql =  MySQL::BuildSQLUpdate("stockings",$values,$where);
            return $this->Query($sql)? 1:0;
        }else{
            return -1;
        }
    }



    public function listStocks(){
        $this->Query("SELECT
drugs.generic_name,
stockings.expiration_date,
stockings.id,
stockings.status,
stockings.unit_qty,
units.unit_name
FROM
drugs
INNER JOIN stockings ON drugs.id = stockings.drug_id
INNER JOIN units ON units.id = stockings.unit
WHERE stockings.status='Active'");
        $i = 1;
        $output ="";

        while(!$this->EndOfSeek()){
            $row = $this->Row();

            $output .= "
            <tr>
            <td>$i</td>
            <td>$row->generic_name</td>
            <td>$row->unit_name</td>
            <td>$row->unit_qty</td>
              <td>".date('M d Y',strtotime($row->expiration_date))."</td>

            <td class=\"text-center\">
                <ul class=\"icons-list\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <i class=\"icon-menu9\"></i>
                        </a>
                        <ul class=\"dropdown-menu dropdown-menu-right\">
                            <li><a   href='edit_stock.php?&id=".base64_encode($row->id)."'><i class=\"icon-pencil5\"></i> Edit</a></li>
                            <li><a class='delete'  type='stock' data-id='".base64_encode($row->id)."'><i class='icon-bin2 delete '></i> Delete</a></li>
                        </ul>
                    </li>
                </ul>
            </td>
        </tr>
            ";
            $i++;
            echo $this->Error();
        }

        return $output;


    }
}