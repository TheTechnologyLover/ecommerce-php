<?php


    $output = '';

    if(isset($_POST['submit'])){
        
        $dept = new Department();
        $dept->title = sanitize($_POST['deptName']);

        if($dept->insert()){
            $output = displayAlert('Department saved successfully!', 'alert-success');
        }else{
            $output = displayAlert('Department not saved!', 'alert-danger');
        }

    }