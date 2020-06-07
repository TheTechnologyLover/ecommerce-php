<?php

    $output = "";
    $departments = Crud::read("SELECT * FROM departments");

    if(isset($_POST['submit'])){

        $product = new Product();
        
        $date = new DateTime();
        if(isset($_FILES["image"])){
            if(authenticateFile($_FILES["image"]["type"])){
                $_FILES["image"]["name"] = $date->format("YmdHms").$_FILES["image"]["name"];
                $upload->set_file($_FILES["image"]);
                if($upload->save()){
                    $uploadId = Upload::search('filename', $upload->filename, false);
                    
                    $product->title = sanitize($_POST['productTitle']);
                    $product->weight = sanitize($_POST['productWeight']);
                    $product->price = sanitize($_POST['productPrice']);
                    $product->deptid = sanitize($_POST['department']);
                    $product->description = sanitize($_POST['desc']);
                    $product->fileid = $uploadId->id;

                    if($product->insert()){
                        $output = displayAlert('Product saved successfully!', 'alert-success');
                    }else{
                        $output = displayAlert('Product not saved!', 'alert-danger');
                    }
                }
            }else{

                $output = displayAlert('Please select valid file type!', 'alert-danger');

            }
        }
    }