<?php

    include ("includes.php");

    if(isset($_GET['id'])){
        $id = sanitize($cryptor->decrypt($_GET['id']));

        if($Session->is_signed_in()){
            $product = Crud::read("select * from products, cart where products.id = cart.productid and cart.userid = {$Session->user_id} and cart.productid = " . $id);

            if(gettype($product) === 'boolean' || sizeof($product) === 0){
                $product = Crud::read("select * from products where id = " . $id);
            }
        }else{
            $product = Crud::read("select * from products where id = " . $id);
        }

        

    }