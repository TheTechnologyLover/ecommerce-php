<?php

    include ("../configs/init.php");

    if(isset($_GET['id'])){

        $id = sanitize($cryptor->decrypt($_GET['id']));
        $order = Order::search('id', $id);

        if($order === false){
            redirect(SERVER_ROOT . 'pages/404.php');
        }else{
            print_r($order);
        }

    }