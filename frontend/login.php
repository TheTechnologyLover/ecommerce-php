<?php

$output = '';

if(isset($_POST["submit"])){

    $username = sanitize($_POST["email"]);
    $password = md5(sanitize($_POST["password"]));

    $userFound = User::verify($username, $password);

    print_r($userFound);

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