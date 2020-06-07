<?php

    include ("includes.php");

    $products = Crud::read("SELECT products.id, products.deptid, products.title as t1, REPLACE(departments.title, ' ', '_') as t2, products.price, uploads.filename FROM products, departments, uploads where products.deptid = departments.id and products.fileid = uploads.id and products.out_stock = -1");
    