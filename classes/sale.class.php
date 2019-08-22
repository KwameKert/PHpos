<?php


require_once('mysql.class.php');

class Sale extends MySQL{
    public function __construct()
    {
        parent::__construct();
        @session_start();
    }


    public function listDrugs($str){

        $output ="";
         $sql = "SELECT
drugs.id,
drugs.generic_name,
drugs.price,
drugs.status
FROM drugs WHERE drugs.`status`='Active' AND drugs.`generic_name` LIKE '%$str%' ";

        if($this->Query($sql)) {
            $this->moveFirst();
            $i = 1;
            while (!$this->EndOfSeek()) {
                $row = $this->Row();
                $output .= "
            <tr>
            <td align='center'>$i</td>
            <td align='center'>$row->generic_name</td>
            <td align='center'>₵ $row->price</td>
            <td align='center'>
               <a href='javascript:void()' data-id='" . $row->id . "'  class='add' ><span class='label label-primary'><i class='icon-cart-add'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add</span></a>
            </td>
        </tr>
            ";
                $i++;
            }
            echo $output;
        }else{
            echo $output = "";
        }
    }


    public function showCart(){
        $total_item = 0;
        $total_price = 0;
        $output = "
            <div class='table-responsive' id='order_table'>
            <table class='table table-bordered table-striped'>
                <tr>
                <th width='40%'>Name</th>
                <th width='10%'> Price</th>
                <th width='20%'>Quantity</th>
                <th width='15%'>Total </th>
                <th width='5%'>Action </th>
</tr><tbody>";
        if(!empty($_SESSION['shopping_cart'])){

            foreach($_SESSION['shopping_cart'] as $keys=>$values){
                $output .="<tr>
                <td>".$values['drug_name']."</td>
                <td>₵".$values['drug_price']."</td>
                <td>".$values['drug_quantity']."</td>
                <td>".number_format($values['drug_price'] * $values['drug_quantity'],2)."</td>
                <td><a  href='javascript:void()' class='btn btn-danger btn-xs remove' id='".$values['drug_id']."'>Remove</a></td>
</tr>";
                $total_price = $total_price + ($values['drug_price'] * $values['drug_quantity']);
                $total_item = $total_item +1;
            }


            $output .= "
            <input type='hidden' name='total_item' value='$total_item'/>
            <input type='hidden' name='total_price' value='$total_price'/>
            <input type='hidden' name='action' value='checkout'/>
            <tr>
           <td colspan='3' align='right'>Total</td>
           <td align='right'>$".number_format($total_price
                ,2)."</td>
                <td></td></tr>";
        }else{
            $output .= "<td colspan='5' align='center'>Your cart is empty</td>";
        }

        $output .= '</tbody><table></div>';

        $data = array(
            'cart_details'=>$output,
            'total_price' =>'$'.$total_price,
            'total_item' => $total_item
        );

        echo json_encode($data);
    }


    public function getDrug($id){
        $sql = "SELECT
drugs.qty,
drugs.id,
drugs.generic_name,
drugs.company,
drugs.type,
drugs.category,
drugs.price
FROM
drugs WHERE id =$id AND qty != 0 AND STATUS = 'Active'";
        if(!$this->HasRecords($sql)){
            return $output = "<div class='modal-body' > 

<div class='alert alert-danger'><p class='lead text-center'>Sorry! You are out of stock</p></div>
</div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
                             
                            </div>";
        }
        $this->Query($sql);
        $row = $this->Row();
        $output = " <div class='modal-body' >                   
<p><b>Generic name: ".$row->generic_name."</b></p>
<p><b>Type :</b> ".$row->type."</p>
<p><b>Category : </b>".$row->category."</p>
<p><b>Price : ₵ </b>".$row->price."</p>
<p><b>Quantiy Left : </b>".$row->qty."</p>

<div class='row'>
        <div class='col-md-6'>
            <div class='form-group has-feedback'>
                <input type='number' class='form-control' name='qty' placeholder='Quantity'>
                <input type='hidden' class='form-control' name='price' value='".$row->price."'>
                <input type='hidden' class='form-control' name='name' value='".$row->generic_name."'>
                <input type='hidden' class='form-control' name='drug_id' value='".$row->id."'>

                <div class='form-control-feedback'>
                    <i class='icon-cash text-muted'></i>
                </div>
            </div>
        </div>
        </div>
        </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-link' data-dismiss='modal'>Cancel</button>
                                <input type='submit' value='Add' class='btn btn-info btn-xs'>
                            </div>
";
        return $output;
    }


    public function addDrug($post){
        $name= filter_input(0,"name",513);
        $qty= filter_input(0,"qty",257);
        $price= filter_input(0,"price",257);
        $drug_id= filter_input(0,"drug_id",257);


        if(isset($_SESSION['shopping_cart'])){
            $is_available = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                if($_SESSION["shopping_cart"][$keys]['drug_id'] == $_POST["drug_id"])
                {
                    $is_available++;
                    $_SESSION["shopping_cart"][$keys]['drug_quantity'] = $_SESSION["shopping_cart"][$keys]['drug_quantity'] + $qty;
                    echo 1;
                }
            }
            if($is_available == 0)
            {
                $item_array = array (
                    'drug_id' =>$drug_id,
                    'drug_name' => $name,
                    'drug_quantity' =>$qty,
                    'drug_price' =>$price
                );
                $_SESSION["shopping_cart"][] = $item_array;
                echo 1;
            }
        }else{
            $item_array = array (
                'drug_id' =>$drug_id,
                'drug_name' => $name,
                'drug_quantity' =>$qty,
                'drug_price' =>$price
            );
            $_SESSION['shopping_cart'][] = $item_array;
            echo 1;
        }
    }


    public function removeDrug($id){
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["drug_id"] == $id)
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo 1;
            }
        }
    }

    public function clearCart(){
        unset($_SESSION['shopping_cart']);
        echo 1;
    }

    public function transaction($t_id,$total_price,$no_drugs){
            $sql = "INSERT INTO transactions(t_id,total_item,total_price,created_on) VALUES('$t_id','$no_drugs','$total_price',now())";
                if($this->updateStock() != true){
                    return $this->updateStock();
                }
        $rs = $this->Query($sql);
         $tran_id = $this->GetLastInsertID();
        if($rs && $this->checkOut($t_id)){

            unset($_SESSION['shopping_cart']);
            return $tran_id;
        }
    }


    //updating quantity
    public function updateStock(){
        foreach($_SESSION['shopping_cart'] as $keys =>$values){
            $drug_id = $values['drug_id'];
            $qty = $values['drug_quantity'];
             $sql ="SELECT qty FROM drugs WHERE id ='$drug_id'";
            $this->Query($sql);
            $row = $this->Row();
            $d_qty = $row->qty;
            $res = $d_qty - $qty;
            if($res >= 0){
                $sql = "UPDATE drugs SET qty = qty - $qty WHERE id = $drug_id";
                $rs = $this->Query($sql);
            }else{
                echo  $rs = $values['drug_name']." quantity exceeds the your stock. Please restock";
                exit;
            }
        }

        return $rs;
    }

    public function checkOut($t_id){
        $sql = "INSERT INTO drug_sales (transaction_id,drug_id,quantity,price,created_on,created_by) VALUES";
        $user = $_SESSION['app_user']['id'];
        foreach($_SESSION["shopping_cart"] as $keys => $values){
            $drug_id = $values['drug_id'];
            $drug_quantity= $values['drug_quantity'];
            $drug_price = $values['drug_price'];
            $sql.="('$t_id','$drug_id','$drug_quantity','$drug_price',now(),'$user'),";
        }
        $sql = rtrim($sql,",");
        return $this->Query($sql);

    }











}