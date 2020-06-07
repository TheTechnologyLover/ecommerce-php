<?php

    $output = '';
    $option = '';
    $path = 'auth/admin/products/';

    if(isset($_GET['out_stock'])){
        $option = 'Mark as availabel';
        $path = $path . 'mark_available.php';
        $results = addSrNo(Crud::read("SELECT products.id, products.title as t1, departments.title as t2, price from products, departments WHERE products.deptid = departments.id AND products.out_stock = 1"), true);
    }else{
        $option = 'Out of Stock';
        $path = $path . 'out_stock.php';
        $results = addSrNo(Crud::read("SELECT products.id, products.title as t1, departments.title as t2, price from products, departments WHERE products.deptid = departments.id AND products.out_stock = -1"), true);
    }

    

    $output = displayRedirectMessage($_GET, "edit", "Record edited successfully!", "Record not edited!", $output);
    $output = displayRedirectMessage($_GET, "marked_out", "Record marked out of stock!", "Record not marked out of stock!", $output);
    $output = displayRedirectMessage($_GET, "marked_available", "Record marked availabel!", "Record not marked availabel!", $output);