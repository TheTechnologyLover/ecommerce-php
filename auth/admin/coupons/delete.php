<?php

    include ("../../../configs/init.php");

    if(isset($_GET['id'])){
        $id = sanitize($cryptor->decrypt($_GET['id']));
        $coupon = Coupon::search('id', $id);

        if($coupon === false){
            redirect(SERVER_ROOT . 'pages/404.php');
        }


        if($coupon->delete()){
            redirect(AUTH_PATH . 'admin/coupons.php?delete=true');
        }else{
            redirect(AUTH_PATH . 'admin/coupons.php?delete=false');
        }

    }