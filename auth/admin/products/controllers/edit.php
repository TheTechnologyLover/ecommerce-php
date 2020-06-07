<?php

    $output = "";
    $departments = Crud::read("SELECT * FROM departments");
    $product = new Product();

    if(isset($_GET["id"])){

        $id = sanitize($cryptor->decrypt($_GET['id']));
        $product = Product::search('id', $id);

        if($product === false){
            redirect(SERVER_ROOT . "pages/404.php");
        }

        $file = Upload::search('id', $product->fileid);

    }

    if(isset($_POST['submit'])){

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

                    if($product->update()){
                        redirect(AUTH_PATH . 'admin/products.php?edit=true');
                    }else{
                        redirect(AUTH_PATH . 'admin/products.php?edit=false');
                    }
                }
            }else{

                $output = displayAlert('Please select valid file type!', 'alert-danger');

            }
        }
    }