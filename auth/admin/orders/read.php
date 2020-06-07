<?php

    $output = '';

    if(isset($_GET['past_order'])){

        $results = addSrNo(Crud::read("select orders.id, concat(user.firstname, ' ', user.lastname) as name, orders.date, orders.total, orders.address, user.mobileno, orders.status from orders, user where orders.userid = user.id and orders.status = 'Delivered'"), true);

    }else{
        $results = addSrNo(Crud::read("select orders.id, concat(user.firstname, ' ', user.lastname) as name, orders.date, orders.total, orders.address, user.mobileno, orders.status from orders, user where orders.userid = user.id and orders.status != 'Delivered'"), true);
    }

    

    $output = displayRedirectMessage($_GET, "status", "Order status updated!", "Order status not updated!", $output);