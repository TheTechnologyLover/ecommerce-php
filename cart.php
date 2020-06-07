<?php
    include ("./configs/init.php");
    include ("./frontend/cart.php");
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
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="" method="post" id="cart-form">
                                <?php

                                    foreach($cartProducts as $row){
                                        ?>

                                <tr>
                                    <td class="shoping__cart__item">
                                        <img width="100" src="<?php echo SERVER_ROOT . 'uploads/' . $row['filename'] ?>" alt="">
                                        <h5><?php echo $row['title'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ₹<?php echo $row['price'] ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                        <input type="text" name="products[]" value="<?php echo $row['id'] ?>" style="display: none" />
                                            <div data-price="<?php echo $row['price'] ?>" data-product-id="<?php echo $row['id'] ?>" class="pro-qty">
                                                <input name="cartProducts[]" class='product-quantity' type="text" value="<?php echo $row['quantity'] ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td data-id='<?php echo $row['id'] ?>' class="shoping__cart__total">
                                        ₹<?php echo $row['price']*$row['quantity'] ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>

                                        <?php
                                    }

                                ?>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a class="primary-btn cart-btn cart-btn-right cart-submit-btn"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <?php echo $couponFalse ?>
                            <form action="" method="post">                                
                                <input type="text" name="total" value="<?php echo $total ?>" style="display: none"/>
                                <input type="text" value="<?php echo $code; ?>" name="coupon" placeholder="Enter your coupon code">
                                <input type="submit" value="APPLY COUPON"  name="submit" class="site-btn" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>₹<?php echo $total; ?></span></li>
                            <li>Total <span>₹<?php echo $subtotal; ?></span></li>
                            
                            
                        
                        </ul>
                        <a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php get_footer_frontend(); ?>
    <!-- Footer Section End -->

    <?php get_script_frontend(); ?>



</body>
<script>

    jQuery(document).ready(function($){

        $('.pro-qty').click(function(){
            
            let value = $(this).children('.product-quantity').val();
            let prod_id = $(this).attr('data-product-id');
            let price = $(this).attr('data-price');
            $("[data-id=" + prod_id +"]").html("₹"  + price * value);

        });

        $(".cart-submit-btn").click(function(){
            $("#cart-form").submit();
        });

    });

</script>
</html>