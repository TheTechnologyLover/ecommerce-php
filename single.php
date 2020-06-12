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
                        <p><?php echo $product[0]['description'] ?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div data-price="<?php echo $product[0]['price'] ?>" data-product-id="<?php echo $product[0]['id'] ?>" class="pro-qty">

                                    <?php 
                                        
                                        if(isset($product[0]['quantity'])){
                                            ?>
                                            <input type="text" class='product-quantity' value="<?php echo $product[0]['quantity'] ?>">
                                            <?php
                                        }else{
                                            ?>
                                            <input type="text" class='product-quantity' value="1">
                                            <?php
                                        }

                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                        <button class="primary-btn cart-submit-btn">ADD TO CARD</button>
                        
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
    
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Alert</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Please log in first.
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a  href="login.php" class="btn btn-primary">Login</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="cartModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Alert</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Cart updated successfully
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
   

    <?php get_footer_frontend(); ?>

    <?php get_script_frontend(); ?>



</body>

<script>

    jQuery(document).ready(function($){

        let signed_in = <?php echo  $Session->is_signed_in() === true ? 'true' : 'false' ?>;
        let prod_id = $('.pro-qty').attr('data-product-id');
        let value = $('.pro-qty').children('.product-quantity').val();

        let cartItems = <?php echo $cartItems ?>;
        let cartPrice = <?php echo $cartPrice ?>;
        
        $('.pro-qty').click(function(){
            
            value = $(this).children('.product-quantity').val();
            prod_id = $(this).attr('data-product-id');
        });

        $(".cart-submit-btn").click(function(){
          
            if(prod_id !== null && value !== null){

                if(!signed_in){
                    $("#myModal").modal('show');
                    return;
                }

                const obj = {
                    productId: prod_id,
                    userId: <?php echo $Session->is_signed_in() === true ? $Session->user_id : -1 ?>,
                    quantity: value
                };

                $.post('api/cart.php', obj, function(data, status){
                
                    if(status === 'success'){
                        data = JSON.parse(data);
                        cartItems = data['count'];
                        cartPrice = data['price'];
                        $('.shopping-cart-items').html(cartItems);
                        $('.shopping-cart-price').html(cartPrice);

                        $("#cartModal").modal('show');


                    }

                });



            }

        });

    });

</script>

</html>