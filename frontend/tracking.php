<?php

    include ("includes.php");
    
    $output = '';
    

    if($Session->is_signed_in()){
        $results = Crud::read("select orders.id, orders.total, orders.date, orders.transactionid, orders.coupon, orders.saved, orders.status, products.title, order_items.quantity, order_items.price from orders, order_items, products where orders.id = order_items.orderid and order_items.productid = products.id and orders.userid = ". $Session->user_id . " order by orders.date desc, orders.id");
        
        if(sizeof($results) > 0){

            $groupedResults = groupByAggregate($results, 
                "id", 
                array("title", "price", "quantity"),
                array("id", "total", "transactionid", "coupon", "saved", "status")
            );

            

        }else{
            $groupedResults = array();
        }
    }
    
    $output = displayRedirectMessage($_GET, "order_status", "Order placed successfully!", "Order not placed!", $output);
    
