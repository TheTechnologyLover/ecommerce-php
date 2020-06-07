<?php


    $dept = new Department();

    if(isset($_GET['id'])){
        $id = sanitize($cryptor->decrypt($_GET['id']));
        $dept = Department::search('id', $id);
        if($dept === false){
            redirect(SERVER_ROOT . "pages/404.php");
        }
    }

    if(isset($_POST['submit'])){
        
        $dept->title = sanitize($_POST['deptName']);

        if($dept->update()){
            redirect(AUTH_PATH . 'admin/departments.php?edit=true'); 
        }else{
            redirect(AUTH_PATH . 'admin/departments.php?edit=false');
        }

    }