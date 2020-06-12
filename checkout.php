<?php

    include ("./configs/init.php");
    include ("./frontend/checkout.php");

?>
<!DOCTYPE html>
<html lang="zxx">

<?php get_header_frontend(); ?>
<style>
      .razorpay-payment-button {
        color: #ffffff !important;
        background-color: #7266ba;
        border-color: #7266ba;
        font-size: 14px;
        padding: 10px;
      }
</style>
<body>
    
    <?php get_navbar_frontend($departments, $Session, $cartItems, $cartPrice); ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo STATIC_PATH ?>images/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <?php 

        if($Session->is_signed_in()){
            ?>

            <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <?php echo $output; ?>
                <form action="" method="post"> 
                    <h5>Discount Codes</h5>
                    <?php echo $couponFalse; ?>                  
                    <input type="text" name="total" value="<?php echo $total ?>" style="display: none"/>
                    <input type="text" value="<?php echo $code; ?>" name="coupon" placeholder="Enter your coupon code">
                    <input type="submit" value="APPLY COUPON"  name="submit" class="site-btn" />
                </form>
                <form action="./frontend/paid.php" method="post">
                
                <script
                                    src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="<?php echo RAZORPAY_KEY; ?>"
                                    data-amount="<?php echo $total*100; ?>"
                                    data-buttontext="Place order"
                                    data-name="Theme name"
                                    data-description="Test Txn with RazorPay"
                                    data-image="<?php echo STATIC_PATH ?>images/img/logo.png"
                                    data-prefill.name="Dhairyasheel"
                                    data-prefill.email="<?php echo $user->email ?>"
                                    data-prefill.contact="<?php echo $user->mobileno ?>"
                                    data-theme.color="#F37254"
                                ></script>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input disabled name="firstname" value="<?php echo $user->firstname ?>" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input disabled name="lastname" value="<?php echo $user->lastname ?>" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input name="street" required type="text"  placeholder="Street Address" class="checkout__input__add">
                                <input name="apartment" required type="text" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input name="pincode" type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input name="mobileno" value="<?php echo $user->mobileno ?>" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input disabled name="email" value="<?php echo $user->email ?>" type="email">
                                    </div>
                                </div>
                            </div> 
                            <input type="text" value="<?php echo $code; ?>" name="coupon" style="display: none">
                           
                        </div>
                        <div class="col-lg-4 col-md-6">
                            
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>

                                    <?php 
                                    
                                        foreach($cartProducts as $row){
                                            ?>
                                            <input type="hidden" name="products[]" value="<?php echo $row['id'] ?>" />
                                            <input type="hidden" name="price[]" value="<?php echo $row['price'] ?>" />
                                            <input type="hidden" name="quantity[]" value="<?php echo $row['quantity'] ?>" />
                                            <input type="hidden" name="weight[]" value="<?php echo $row['weight'] ?>" />
                                            <input type="hidden" name="title[]" value="<?php echo $row['title'] ?>" />
                                            <li><?php echo $row['title'] ?><span>₹<?php echo $row['price']*$row['quantity'] ?></span></li>
                                            <?php
                                        }
                                    
                                    ?>

                                </ul>
                                <?php

                                if($couponApplied){
                                    ?>

                                        <li>Coupon applied: <?php echo $code; ?>. You saved <span>₹<?php echo $saved; ?></span></li>

                                        <?php
                                    }

                                ?>
                                <input type="text" name="productinfo" style="display: none" value="<?php echo $productinfo; ?>" />
                                <input type="text" name="saved" style="display: none" value="<?php echo $saved; ?>" />
                                <div class="checkout__order__subtotal">Subtotal <span>₹<?php echo $subtotal ?></span></div>
                                <input type="text" name="total" style="display: none" value="<?php echo $total; ?>" />
                                <div class="checkout__order__total">Total <span>₹<?php echo $total; ?></span></div>
                                <input type="text" name="subtotal" style="display: none" value="<?php echo $subtotal; ?>"  />
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

            <?php
        }else{
            ?>

            <p>Please login</p>
            <?php
        }


    ?>

    

    <!-- Footer Section Begin -->
    <?php get_footer_frontend(); ?>
    <!-- Footer Section End -->

    <?php get_script_frontend(); ?>



</body>

</html>