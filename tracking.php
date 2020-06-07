<?php
    include ("./configs/init.php");
    include ("./frontend/tracking.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<?php get_header_frontend(); ?>
<body>
   
    <?php get_navbar_frontend($departments, $Session, $cartItems, $cartPrice); ?>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo STATIC_PATH ?>images/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Track Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <?php

        if($Session->is_signed_in()){
            ?>
            <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $output; ?>
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(sizeof($groupedResults) > 0){

                                        foreach($groupedResults as $rows){
                                         
                                            ?>

                                <tr>
                                    <td style="text-align: left;">
                                        <?php
                                            foreach($rows['title'] as $row){
                                                ?>
                                                <h5><?php echo $row; ?></h5>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                    <?php
                                            foreach($rows['price'] as $row){
                                                ?>
                                                ₹<?php echo $row; ?><br/>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $sum = 0;
                                            foreach($rows['quantity'] as $row){
                                                $sum += $row;
                                            }
                                            echo $sum;
                                        ?>

                                    </td>
                                    <td>
                                        <?php echo $rows['total']; ?>
                                        <?php
                                            if($rows['coupon'] != ''){
                                                ?>
                                                <br/>Coupon applied: <?php echo $rows['coupon'] ?>
                                                <br/>You saved: <?php echo $rows['saved'] ?>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                    <?php echo $rows['status']; ?>
                                    </td>

                                    <?php

                                        if($rows['status'] !== 'Delivered'){
                                            ?>
                                            <td>
                                                <span><a class="btn btn-danger" href="./frontend/cancel.php?id=<?php echo $cryptor->encrypt($rows['id']) ?>">Cancel</a></span>
                                            </td>
                                            <?php
                                        }

                                    ?>
                                    
                                </tr>
                                            <?php
                                        }

                                    }else{
                                        ?>
                                        No orders available.
                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- Shoping Cart Section End -->
            <?php
        }else{
            ?>
            Please login first.
            <?php
        }

    ?>

    

    <!-- Footer Section Begin -->
    <?php get_footer_frontend(); ?>
    <!-- Footer Section End -->

    <?php get_script_frontend(); ?>



</body>

</html>