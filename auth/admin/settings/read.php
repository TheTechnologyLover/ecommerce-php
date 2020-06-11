<?php


    $user = User::search('id', $Session->user_id);
    $output = '';

    if(isset($_POST['submit'])){
        $user->password = md5(sanitize($_POST['password']));

        if($user->update()){
            $output = displayAlert("Password updated!", "alert-success");
        }else{
            $output = displayAlert("Something went wrong!", "alert-danger");
        }

    }