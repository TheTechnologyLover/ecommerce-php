<?php

    include ("../../../configs/init.php");

    if(isset($_GET['id'])){

        $id = sanitize($cryptor->decrypt($_GET['id']));
        $order = Order::search('id', $id);
        $status = sanitize($_GET['status']);

        if($order === false){
            redirect(SERVER_ROOT . 'pages/404.php');
        }else{
            $order->status = $status;
            if($order->update()){
                redirect(AUTH_PATH . 'admin/orders.php?status=true');
            }else{
                redirect(AUTH_PATH . 'admin/orders.php?status=false');
            }
        }

    }