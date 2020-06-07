<?php

    $departments = Crud::read("SELECT * FROM departments");

    $cartItems = 0;
    $cartPrice = 0;

    if($Session->is_signed_in()){
        $cart = Crud::read("SELECT count(productid) as c from cart where userid = $Session->user_id");
        $cartItems = $cart[0]['c'];
        $cart = Crud::read("select sum(price) as s from products, cart where products.id = cart.productid and cart.userid = $Session->user_id");
        $cartPrice = isset($cart[0]['s']) ? $cart[0]['s'] : 0;
    }

    

    $userId =  $Session->is_signed_in() === true ? $Session->user_id : -1;

  
    
