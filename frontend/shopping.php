<?php

    include ("includes.php");

    
    
    if(isset($_GET['dept'])){
        $id = sanitize($_GET['dept']);
        $products = Crud::read("SELECT products.id, products.deptid, products.title as t1, REPLACE(departments.title, ' ', '_') as t2, products.price, uploads.filename FROM products, departments, uploads where products.deptid = departments.id and products.fileid = uploads.id and products.out_stock = -1 and departments.id = " . $id);
    }else{
        $products = Crud::read("SELECT products.id, products.deptid, products.title as t1, REPLACE(departments.title, ' ', '_') as t2, products.price, uploads.filename FROM products, departments, uploads where products.deptid = departments.id and products.fileid = uploads.id and products.out_stock = -1");
    }
