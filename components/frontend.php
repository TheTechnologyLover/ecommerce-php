<?php


    function get_header_frontend(){
        ?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo STATIC_PATH ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH ?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH ?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH ?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH ?>css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH ?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH ?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH ?>css/style.css" type="text/css">
</head>




        <?php
    }


    function get_navbar_frontend($departments, $Session, $cartItems, $cartPrice){
      
        ?>

<!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?php echo SERVER_ROOT ?>"><img src="<?php echo STATIC_PATH ?>images/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span><?php echo $cartItems; ?></span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>₹<?php echo $cartPrice; ?></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="<?php echo STATIC_PATH ?>images/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
            <?php
                                
                                if($Session->is_signed_in()){
                                    ?><a href="logout.php"><i class="fa fa-user"></i><?php echo $Session->name ?></a><?php
                                }else{
                                    ?><a href="login.php"><i class="fa fa-user"></i> Login</a><?php
                                }
                            
                            ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="<?php echo SERVER_ROOT ?>">Home</a></li>
                <li><a href="<?php echo SERVER_ROOT . 'shopping.php' ?>">Shop</a></li>
                <li><a href="<?php echo SERVER_ROOT . 'tracking.php' ?>">Tracking</a></li>
                <li><a href="<?php echo SERVER_ROOT . 'contact.php' ?>">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@thetechnolover.com</li>
                <li>Free Shipping for all Order of ₹99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header mb-5">
        <div class="header__top mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@thetechnolover.com</li>
                                <li>Free Shipping for all Order of Rs 99</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                <?php
                                
                                    if($Session->is_signed_in()){
                                        ?><a href="logout.php"><i class="fa fa-user"></i><?php echo $Session->name ?></a><?php
                                    }else{
                                        ?><a href="login.php"><i class="fa fa-user"></i> Login</a><?php
                                    }
                                
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?php echo SERVER_ROOT ?>"><img src="<?php echo STATIC_PATH ?>images/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="<?php echo SERVER_ROOT ?>">Home</a></li>
                            <li><a href="<?php echo SERVER_ROOT . 'tracking.php' ?>">Track Orders</a></li>
                            <li><a href="<?php echo SERVER_ROOT . 'contact.php' ?>">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="cart.php"><i class="fa fa-shopping-bag"></i> <span class='shopping-cart-items'><?php echo $cartItems ?></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span class='shopping-cart-price'>₹<?php echo $cartPrice ?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="shopping.php">All departments</a></li>
                            <?php

                                foreach($departments as $key){
                                    ?><li><a href="shopping.php?dept=<?php echo $key['id'] ?>"><?php echo $key['title'] ?></a></li><?php
                                }
                            
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <?php

                        if($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '/index.php'){
                            ?>
                            <div class="hero__item set-bg" data-setbg="<?php echo STATIC_PATH ?>images/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                            <?php
                        };

                    ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

        <?php
    }


    function get_footer_frontend(){
        ?>

    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="<?php echo STATIC_PATH ?>images/img/logo.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p class="text-center">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


        <?php
    }

    function get_script_frontend(){
        ?>

        <!-- Js Plugins -->
    <script src="<?php echo STATIC_PATH ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo STATIC_PATH ?>js/bootstrap.min.js"></script>
    <script src="<?php echo STATIC_PATH ?>js/jquery.nice-select.min.js"></script>
    <script src="<?php echo STATIC_PATH ?>js/jquery-ui.min.js"></script>
    <script src="<?php echo STATIC_PATH ?>js/jquery.slicknav.js"></script>
    <script src="<?php echo STATIC_PATH ?>js/mixitup.min.js"></script>
    <script src="<?php echo STATIC_PATH ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo STATIC_PATH ?>js/main.js"></script>
        <?php
    }