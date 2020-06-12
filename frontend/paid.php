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

            $currentOrder = Order::search('transactionid', $order->transactionid, false);
            $query = "INSERT into order_items( orderid, productid, price, quantity, weight, title ) values ";

            for($i=0; $i<sizeof($_POST['products']); $i++){
                $query .= "( {$currentOrder->id}, {$_POST['products'][$i]}, {$_POST['price'][$i]}, {$_POST['quantity'][$i]}, {$_POST['weight'][$i]}, '{$_POST['title'][$i]}'),";
            }

            $query = substr($query, 0, strlen($query)-1);

            if( $database->query($query) ){
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

    

    