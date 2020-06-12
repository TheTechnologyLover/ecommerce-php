<?php

    include ("includes.php");

    if(isset($_GET['id'])){
        $id = sanitize($cryptor->decrypt($_GET['id']));

        if($Session->is_signed_in()){
            $product = Crud::read("select products.id, products.title, price, description, uploads.filename, weight, quantity from products, cart, uploads where products.id = cart.productid and products.fileid = uploads.id and cart.userid = {$Session->user_id} and cart.productid = " . $id);

            if(gettype($product) === 'boolean' || sizeof($product) === 0){
                $product = Crud::read("select products.id, products.title, price, description, uploads.filename, weight from products, uploads where products.fileid = uploads.id and products.id = " . $id);
            }
        }else{
            $product = Crud::read("select products.id, products.title, price, description, uploads.filename, weight from products, uploads where products.fileid = uploads.id and products.id = " . $id);
        }

        

    }