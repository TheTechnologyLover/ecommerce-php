<?php

    if(isset($_GET['id'])){

        $id = sanitize($cryptor->decrypt($_GET['id']));
        
        $result = Crud::read("select orders.id, concat(user.firstname, ' ', user.lastname) as name, orders.address, orders.landmark, orders.date, orders.total, orders.coupon, orders.saved, orders.transactionid, user.mobileno from orders, user where orders.userid = user.id and orders.id = " . $id);
        $orders = Crud::read("select * from order_items, products where order_items.productid = products.id and order_items.orderid = " . $id);
        if(sizeof($result) === 0){
            redirect(SERVER_ROOT . 'pages/404.php');
        }

    }