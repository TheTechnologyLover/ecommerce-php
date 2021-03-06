<?php

    include ("../configs/init.php");


    if(isset($_POST['userId'])){
        if($_POST['userId'] !== -1){

            $database->query("DELETE from cart where userid = {$_POST['userId']} and productid = {$_POST['productId']}");

            $quantity = 1;
            if(isset($_POST['quantity'])){
                $quantity = sanitize($_POST['quantity']);
            }
            if($database->query("INSERT INTO cart values ({$_POST['userId']}, {$_POST['productId']}, {$quantity})")){
                
                $cartItems = Crud::read("SELECT count(productid) as c from cart where userid = $Session->user_id");
                $cartPrice = Crud::read("select sum(price*quantity) as s from products, cart where products.id = cart.productid and cart.userid = {$_POST['userId']}");
                echo json_encode(array(
                    "status"    =>     200,
                    "count"    =>  $cartItems[0]['c'],
                    "price"     =>  $cartPrice[0]['s']
                ));
            }else{
                echo json_encode(array(
                    "status"    =>     404,
                    "count"     =>  -1
                ));
            }

        }

    }