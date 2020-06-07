<?php
    include ("./configs/init.php");
    include ("./frontend/shopping.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<?php get_header_frontend(); ?>

<body>
    
    <?php get_navbar_frontend($departments, $Session, $cartItems, $cartPrice); ?>

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-2">
                    
                </div>
                <div class="col-lg-10 col-md-8">                    
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span><?php echo sizeof($products) ?></span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            foreach($products as $row){
                                ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?php echo SERVER_ROOT . 'uploads/' . $row['filename'] ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <?php
                                            if($Session->is_signed_in()){
                                                ?>
                                                     <li class='shopping-cart' data-product="<?php echo $row['id'] ?>"><a><i class="fa fa-shopping-cart"></i></a></li>
                                                <?php
                                            }
                                        ?>
                                       
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?php echo $row['t1'] ?></a></h6>
                                    <h5>₹<?php echo $row['price'] ?></h5>
                                </div>
                            </div>
                        </div>
                                <?php
                            }
                        ?>
                
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <?php get_footer_frontend(); ?>

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