<?php

    $output = '';

    if(isset($_POST['submit'])){

        $user = new User();

        $user->email = sanitize($_POST['email']);
        $user->firstname = sanitize($_POST['firstname']);
        $user->lastname = sanitize($_POST['lastname']);
        $user->password = md5(sanitize($_POST['password']));
        $conf_password = md5(sanitize($_POST['conf_password']));
        $user->mobileno = sanitize($_POST['mobileno']);

        if(!User::search("email", $user->email)){
            $output = displayAlert('Email is already registered', 'alert-danger');
        }else{
            if($user->password !== $conf_password){
                $output = displayAlert('Passwords do not match', 'alert-danger');
            }else{
    
                if($user->insert()){
                    $output =  displayAlert('User registered successfully!', 'alert-success');
                }else{
                    $output = displayAlert('Something went wrong', 'alert-danger');
                }
    
            }
    
        }

        
        

    }