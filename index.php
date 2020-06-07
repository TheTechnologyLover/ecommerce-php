<?php
    include ("./configs/init.php");
    include ("./frontend/index.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<?php get_header_frontend(); ?>
<body>
    <?php get_navbar_frontend($departments, $Session, $cartItems, $cartPrice); ?>

    <!-- Featured Section Begin -->
    <section class="featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php
                                foreach($departments as $row){
                                    ?><li data-filter=".<?php echo str_replace(' ', '_', $row['title']) ?>"><?php echo $row['title'] ?></li><?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">

                <?php

                    foreach($featuredProducts as $row){
                        ?>

                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $row['t2'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo SERVER_ROOT . 'uploads/' . $row['filename'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <?php 
                                    if($Session->is_signed_in()){
                                        
                                        ?>
                                        <li class='shopping-cart' data-product="<?php echo $row['id'] ?>" ><a><i class="fa fa-shopping-cart"></i></a></li>
                                        <?php
                                    }
                                ?>
                                
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?php echo $row['t1'] ?></a></h6>
                            <h5><?php echo $row['price'] ?></h5>
                        </div>
                    </div>
                </div>
                        <?php
                    }


                ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php echo STATIC_PATH ?>images/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php echo STATIC_PATH ?>images/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

   

    <!-- Footer Section Begin -->
    <?php get_footer_frontend(); ?>
    <!-- Footer Section End -->

    <?php get_script_frontend(); ?>



</body>
<script>


    jQuery(document).ready(function ($){

        let cartItems = <?php echo $cartItems ?>;
        let cartPrice = <?php echo $cartPrice ?>;

        $('.shopping-cart').click(function(){

            let productId = $(this).attr('data-product');
            
            const obj = {
                productId: productId,
                userId: <?php echo $userId ?>
            }; 

            $.post('api/cart.php', obj, function(data, status){
                
                if(status === 'success'){
                    data = JSON.parse(data);
                    cartItems = data['count'];
                    cartPrice = data['price'];
                    $('.shopping-cart-items').html(cartItems);
                    $('.shopping-cart-price').html(cartPrice);
                }

            });


        });

    });

</script>

</html>