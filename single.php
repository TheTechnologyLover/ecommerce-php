<?php
    include ("./configs/init.php");
    include ("./frontend/single.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<?php get_header_frontend(); ?>

<body>
    
    <?php get_navbar_frontend($departments, $Session, $cartItems, $cartPrice); ?>


    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?php echo STATIC_PATH?>img/images/product/details/product-details-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $product[0]['title'] ?></h3>
                        <div class="product__details__price">₹<?php echo $product[0]['price'] ?></div>
                        <ul>
                            <li><b>Weight</b> <span><?php echo $product[0]['weight'] ?> kg</span></li>
                        </ul>
                        <hr>
                        <p><?php echo $product[0][''] ?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">ADD TO CARD</a>
                        <ul>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

   

    <?php get_footer_frontend(); ?>

    <?php get_script_frontend(); ?>



</body>

</html>