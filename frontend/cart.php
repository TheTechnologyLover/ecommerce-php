<?php


    if(isset($_POST['cartProducts'])){
        
        if($Session->is_signed_in()){

            $query = "UPDATE cart set quantity = case";

            for($i = 0; $i<sizeof($_POST['cartProducts']); $i++){
                $query .= " WHEN userid = $Session->user_id and productid = {$_POST['products'][$i]} then {$_POST['cartProducts'][$i]}";
            }

            $query .= " END";

            $database->query($query);

            $query = "DELETE from cart where userid = $Session->user_id and quantity = 0";
            $database->query($query);
        }

    }

    include ("includes.php");



    $cartProducts = array();
    $total = 0;
    $subtotal = 0;
    
    if($Session->is_signed_in()){
        $cartProducts = Crud::read("select products.id, products.title, products.price, uploads.filename, cart.quantity  from products, cart, uploads where products.id = cart.productid and products.fileid = uploads.id and cart.userid = $Session->user_id");
    
        foreach($cartProducts  as $row){
            $total += $row['price']*$row['quantity'];
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
                    $new_total = $total - $coupon->value*$total;
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

