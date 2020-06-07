<?php

    include ("../../../configs/init.php");

    if(isset($_GET['id'])){

        $id = sanitize($cryptor->decrypt($_GET['id']));
        $product = Product::search('id', $id);

        if($product === false){
            redirect(SERVER_ROOT . 'pages/404.php');
        }

        $product->out_stock = -1;

        if($product->update()){
            redirect(AUTH_PATH . 'admin/products.php?marked_available=true');
        }else{
            redirect(AUTH_PATH . 'admin/products.php?marked_available=false');
        }

    }