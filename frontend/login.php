<?php

$output = '';

if(isset($_POST["submit"])){

    $username = sanitize($_POST["email"]);
    $password = sanitize($_POST["password"]);

    $userFound = User::verify($username, $password);

    if($userFound){

        if($userFound['is_admin'] == -1){
            $Session->set_capability(USER);
            $Session->login($userFound);
            redirect(SERVER_ROOT);
        }else{
            
            $Session->set_capability(ADMIN);;
            $Session->login($userFound);
            redirect(SERVER_ROOT . "auth/admin/index.php");
        }

    }else{
        $output = displayAlert("Invalid login credentials", "alert-danger");
    }

}