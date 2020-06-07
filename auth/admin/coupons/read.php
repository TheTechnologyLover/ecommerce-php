<?php

    
    $output = '';

    if(isset($_POST['submit'])){

        $coupon = new Coupon();
        $coupon->code = sanitize($_POST['code']);
        $coupon->type = sanitize($_POST['type']);
        $coupon->value = sanitize($_POST['value']);
        $coupon->mincart = sanitize($_POST['minCart']);

        if($coupon->insert()){
            $output = displayAlert('Coupon saved successfully!', 'alert-success');
        }else{
            $output = displayAlert('Coupon not saved!', 'alert-danger');
        }

    }

    $results = addSrNo(Crud::read("SELECT * FROM coupons"), true);
    $output = displayRedirectMessage($_GET, "delete", "Record edited successfully!", "Record not edited!", $output);