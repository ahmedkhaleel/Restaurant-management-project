@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" id="table-detail"></div>
        <div class="row justify-content-center">
         <div class="col-md-5">
             <botton class="btn btn-primary btn-block" id="btn-show-tables">View All Table</botton>
             <div id="select-table"></div>
             <div id="order-detail"></div>
         </div>
            <div class="col-md-7">
                <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach ($categories as $category)
                        <a class="nav-item nav-link" data-id="{{$category->id}}" data-toggle="tab">
                            {{$category->name}}
                        </a>
                        @endforeach
                </div>
                </nav>
                <div id="list-menu" class="row mt-2">

                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            //make table-detail hidden by.default
            $("#table-detail").hide();

            // show all tables when a clint on the button
            $("#btn-show-tables").click(function() {
                if ($("#table-detail").is(":hidden")){
                    $.get("/cashier/getTables", function(data){
                        $("#table-detail").html(data);
                        $("#table-detail").slideDown('fast');
                        $("#btn-show-tables").html('Hide Tables').removeClass('btn-primary').addClass('btn-danger');
                    });
                }else {
                    $("#table-detail").slideUp('fast');
                    $("#btn-show-tables").html('Show Tables').removeClass('btn-danger').addClass('btn-primary');
                }

            });

            //load menus by category
            $(".nav-link").click(function() {
                $.get("/cashier/getMenuByCategory/"+$(this).data("id"),function(data){
                    $("#list-menu").hide();
                    $("#list-menu").html(data);
                    $("#list-menu").fadeIn('fast');
                });
            });
            var SELECTED_TABLE_ID ="";
            var SELECTED_TABLE_NAME ="";
            //DETECT BUTTON TABLE ONCLICK TO SHOW TABLE DATA
            $("#table-detail").on("click",".btn-table",function(){
                 SELECTED_TABLE_ID = $(this).data("id");
                 SELECTED_TABLE_NAME = $(this).data("name");
                $("#select-table").html('<br><h3>Table : '+SELECTED_TABLE_NAME+'</h3><hr>');
                $.get("/cashier/getSaleDetailsByTable/"+SELECTED_TABLE_ID, function(data){
                    $("#order-detail").html(data);
                })
            });



            $("#list-menu").on("click",".btn-menu",function(){
                if (SELECTED_TABLE_ID == ""){
                    alert("you need select a table for the customer first");
                }else{
                    var menu_id = $(this).data("id");
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token" : $('meta[name="csrf-token"]').attr('content'),
                            "menu_id": menu_id,
                            "table_id": SELECTED_TABLE_ID,
                            "table_name": SELECTED_TABLE_NAME,
                            "quantity" : 1,
                        },
                        url: "/cashier/orderFood",
                        success:function(data){
                            $("#order-detail").html(data);
                        },
                    });
                }
            });

            $("#order-detail").on("click", ".btn-confirm-order", function(){
                var SaleID = $(this).data("id");
                $.ajax({
                    type : "POST",
                    data: {
                        "_token" : $('meta[name="csrf-token"]').attr('content'),
                        "sale_id" : SaleID,
                    },
                    url :"/cashier/confirmOrderStatus",
                    success:function(data){
                        $("#order-detail").html(data);
                    }
                })
            })


            $("#order-detail").on("click", ".btn-delete-saledetail",function() {
                var saledetailID = $(this).data("id");
                $.ajax({
                    type : "POST",
                    data : {
                        "_token" : $('meta[name="csrf-token"]').attr('content'),
                        "saleDetail_id" : saledetailID,
                    },
                    url :"/cashier/deleteSaleDetail",
                    success: function(data) {
                        $("#order-detail").html(data);
                    }
                })
            })
        });
    </script>
@endsection
