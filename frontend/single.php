<?php

    include ("includes.php");

    if(isset($_GET['id'])){
        $id = sanitize($cryptor->decrypt($_GET['id']));

        $product = Crud::read("select * from products, cart where products.id = cart.productid and cart.userid = {$Session->user_id} and cart.productid = " . $id);

        if(sizeof($products) === 0){
            $product = Crud::read("select * from products where id = " . $id);
        }

    }