<?php

    include ("includes.php");
    
    $products = Crud::read("SELECT products.id, products.deptid, products.title as t1, REPLACE(departments.title, ' ', '_') as t2, products.price, uploads.filename FROM products, departments, uploads where products.deptid = departments.id and products.fileid = uploads.id and products.out_stock = -1");
    $featuredProducts = array();
    $productsCategoryCount = array();
    $count = 0;

    foreach($departments as $row){
        $productsCategoryCount[$row['id']] = 0;
    }
   
    foreach( $products as $row ){

        if($count == sizeof($productsCategoryCount)){
            break;
        }

        if($productsCategoryCount[$row['deptid']] < 2){
            array_push($featuredProducts, $row);
            $productsCategoryCount[$row['deptid']]++;
        }else{
            $count++;
        }

    }
