<?php

    include ("../configs/init.php");

    if($Session->is_signed_in()){

        $order = new Order();
        $dateObj = new DateTime();

        $order->userid = $Session->user_id;
        $order->date = $dateObj->format('Y/m/d H:i:s');
        $order->total = sanitize($_POST['total']);
        $order->address = sanitize($_POST['street']);
        $order->landmark = sanitize($_POST['apartment']);
        $order->pincode = sanitize($_POST['pincode']);
        $order->coupon = sanitize($_POST['coupon']);
        $order->saved = sanitize($_POST['saved']);
        $order->transactionid = sanitize($_POST['razorpay_payment_id']);
        $order->status = "Processing";

        if($order->insert()){

            $array = array();
            $currentOrder = Order::search('transactionid', $order->transactionid, false);
            for($i=0; $i<sizeof($_POST['products']); $i++){
                array_push(
                    $array, 
                    array(
                        $currentOrder->id, 
                        sanitize($_POST['products'][$i]),
                        sanitize($_POST['price'][$i]),
                        sanitize($_POST['quantity'][$i])
                    )
                );
            }

            if( Crud::multiCreate(
                array("orderid", "productid", "price", "quantity"),
                $array,
                "order_items",
                array()
            ) ){

                redirect(SERVER_ROOT . "tracking.php?order_status=true");
            }else{
                redirect(SERVER_ROOT . "checkout.php?order_status=false");
            }

        }else{
            redirect(SERVER_ROOT . "checkout.php?order_status=false");
        }

    }else{

        redirect(SERVER_ROOT . 'pages/404.php');

    }

?>

    

    