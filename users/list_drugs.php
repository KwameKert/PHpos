<?php
session_start();
if(!isset($_SESSION['app_user'])){
    header("Location: ../index.php");
}

$page = "sales";
require_once('../classes/sale.class.php');
require_once('../classes/drug.class.php');
require_once('../inc/header.php');
//header("Location: ../index.php");

?>

<div class="row">

<div class="col-md-2 pull-left">
    <div class="sidebar-detached">
        <div class="sidebar sidebar-default sidebar-separate">
            <div class="sidebar-category">
                <div class="category-title">
                    <span>Categories</span>
                    <ul class="icons-list">
                        <li><a href="#" data-action="collapse" class=""></a></li>
                    </ul>
                </div>

                <div class="category-content no-padding" style="display: block;">
                    <ul class="navigation navigation-alt navigation-accordion">
                        <li class="navigation-header">Category </li>
                        <li><a href="#" class="legitRipple"><span class="badge badge-default">37</span> Children</a></li>
                        <li><a href="#" class="legitRipple"><span class="badge badge-default">58</span> Teenagers</a></li>
                        <li><a href="#" class="legitRipple"><span class="badge badge-default">39</span> Adults</a></li>
                        <li><a href="#" class="legitRipple"><span class="badge badge-default">39</span> Others</a></li>
                        <li class="navigation-header">Type</li>
                        <li><a href="#" class="legitRipple"><span class="badge badge-default">21</span> Powerdered</a></li>
                        <li><a href="#" class="legitRipple"><span class="badge badge-default">10</span> Capsules</a></li>
                        <li><a href="#" class="legitRipple"><span class="badge badge-default">26</span> Tablets</a></li>
                        <li><a href="#" class="legitRipple"><span class="badge badge-default">26</span> Syrup</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="col-md-10">

    <div class="card white-box " style="margin-left:100px">
        <div class="card-header">
            <div class="row">
              <h3>Point Of Sales</h3>

                <a href="#" class="btn" data-toggle="modal" data-target="#modal_default">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    <span class="badge badge-default"></span>
                    <span class="total_price">$0.00</span>
                </a>


                <div id="qty_wrapper" style="display: none">
                    <input type="text"  value='1' id="qty">
                    <button id="add_qty">Add</button>
                </div>


                <!-- Basic modal -->
                <div id="modal_default" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Drug Cart</h5>
                            </div>

                            <div class="modal-body">
                                <form id="form_checkout">

                              <div id="cart_details"></div>

                            </div>

                            <div class="modal-footer">
                                <div class="" align="right">
                                    <a href="" class="btn btn-success btn-xs checkout" >
                                        <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Check out
                                    </a>
                                    <a href="" class="btn btn-danger btn-xs clear" id="check_out_cart">
                                        <span class="glyphicon glyphicon-trash "></span>&nbsp;&nbsp;Clear
                                    </a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /basic modal -->


                <!-- Small modal -->
                <div id="modal_small" class="modal fade">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Select Drug quantity</h5>
                            </div>
                            <form id="addToCart" >
                            <div class="modal-body drugDetails" >

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                                <input type="submit" value="Add" class="btn btn-info btn-xs">
                            </div>
                        </div>
                        <input type="hidden" name="action" value="addToCart">
                        </form>
                    </div>
                </div>
                <!-- /small modal -->

            </div>

        </div>

        <div class="card-body">

            <table  id="myTable" class="stripe">
                <thead>
                <tr>
                    <th ><center>#</center></th>
                    <th><center>Generic Name</center></th>
                    <th ><center>Price</center></th>
                    <th ><center>Action</center></th>
                </tr>
                </thead>
                <tbody>

                <?php


                $obj = new Sale();
                echo $obj->listDrugs();
                ?>

                </tbody>
            </table>

        </div>




    </div>
</div>

</div>


<?php

require_once('../inc/footer.php');

?>
<script>


    $(document).on('ready',function(){

        load_cart_details();
        function load_cart_details()
        {
            $.ajax({
                url:"../controllers/sales_controller.php",
                data:{action:'show_cart'},
                method:"POST",
                dataType:"json",
                success:function(t){
                   // alert(t);
                    $('#cart_details').html(t.cart_details);
                    $('.total_price').text(t.total_price);
                    $('.badge').text(t.total_item);
                }

            })
        }

        $('.add').click(function(ev){
            ev.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url:'../controllers/sales_controller.php',
                type:'POST',
                data:{id:id,action:'getDrugDetails'},
                success:function(text){
                    $('.drugDetails').html(text);
                }
            })

        })

        $('#addToCart').submit(function(ev){
            ev.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url:'../controllers/sales_controller.php',
                type:'POST',
                data:data,
                success:function(text){
                    if(text == 1){
                        makeToast("Drug Added","green","success")
                        load_cart_details();
                        $('#modal_small').modal('toggle');
                    }
                }
            })
        })

        $('.clear').click(function(ev){
            ev.preventDefault();
            var action = 'clear';
            $.ajax({
                url:'../controllers/sales_controller.php',
                type:'POST',
                data:{action:action},
                success:function(text){
                    makeToast("Drug cart cleared","green","success")
                    load_cart_details();
                    $('#modal_default').modal('toggle');
                }
            })
        })


    })

    $(document).on('click','.remove',function(ev){
        var id = $(this).attr('id');
        var action = 'remove';

        load_cart_details();
        function load_cart_details()
        {
            $.ajax({
                url:"../controllers/sales_controller.php",
                data:{action:'show_cart'},
                method:"POST",
                dataType:"json",
                success:function(t){
                    // alert(t);
                    $('#cart_details').html(t.cart_details);
                    $('.total_price').text(t.total_price);
                    $('.badge').text(t.total_item);
                }

            })
        }
        if(confirm('Do you want to delete this drug? ')){
            $.ajax({
                url:'../controllers/sales_controller.php',
                type:'POST',
                data:{action:action,id:id},
                success:function(text){
                    load_cart_details();
                    makeToast("Drug cart cleared","red","danger")
                    $('#modal_default').modal('toggle');
                }
            })
        }

    });

    $(document).on('click','.checkout',function(ev){
        ev.preventDefault();
        var data = $('#form_checkout').serialize();

        function load_cart_details()
        {
            $.ajax({
                url:"../controllers/sales_controller.php",
                data:{action:'show_cart'},
                method:"POST",
                dataType:"json",
                success:function(t){
                    // alert(t);
                    $('#cart_details').html(t.cart_details);
                    $('.total_price').text(t.total_price);
                    $('.badge').text(t.total_item);
                }

            })
        }

        $.ajax({
            url:'../controllers/sales_controller.php',
            type:'POST',
            data:data,
            success:function(text) {
                if (text == 1) {
                    load_cart_details();
                    makeToast("Transaction Completed","green","success");
                    $('#modal_default').modal('toggle');

                }
            }
        })
    })

</script>
