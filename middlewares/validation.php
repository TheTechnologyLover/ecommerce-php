<?php

    
    $urlArray = explode("/", $_SERVER['REQUEST_URI']);

    
    if(sizeof($urlArray) !== 2){
        $currentDir = $urlArray[1];
        $currentDir = $currentDir == 'auth' ? $currentDir . "/" . $urlArray[2] : $currentDir;



        if($currentDir !== 'api' && !in_array($Session->role, ROUTE_SETTINGS[$currentDir])){

            // Die the script or redirect to 404 page
            redirect(SERVER_ROOT . "pages/404.php");

        }
    }
    


