<?php

    include ("includes.php");

    $cartProducts = array();
    $total = 0;
    $subtotal = 0;
    $output = '';
    
    if($Session->is_signed_in()){
        $cartProducts = Crud::read("select products.id, products.title, products.weight, products.price, cart.quantity  from products, cart where products.id = cart.productid and cart.userid = $Session->user_id");
    
        $user = User::search('id', $Session->user_id);
        $productinfo = '';
        
        foreach($cartProducts  as $row){
            $total += $row['price']*$row['quantity'];
            $productinfo .= $row['title'] . ' ';
        }

        $subtotal = $total;
        
    
    }

    $couponFalse = '';
    $saved = 0;
    $code = '';
    $couponApplied = false;

    if(isset($_POST['submit'])){

        $code = sanitize($_POST['coupon']);
        $coupon = Coupon::search('code', $code, false);

        if($coupon === false){
            $code = '';
            $couponFalse = 'Coupon not applicable';
        }else{

            if($total > $coupon->mincart){

                $new_total = 0;
                if($coupon->type === "Rupees"){
                    $new_total = $total - $coupon->value;
                }else if($coupon->type === "Percent"){
                    $new_total = $total - $coupon->value*$total / 100;
                }

                $couponApplied = true;
                $saved = $total - $new_total;
                $subtotal = $new_total;
                $total = $new_total;

            }else{
                $couponFalse = 'Coupon not applicable';
                $code = '';
            }

        }

    }

    $output = displayRedirectMessage($_GET, "order_status", "Order placed successfully!", "Order not placed!", $output);
