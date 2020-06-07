<?php

    include ("../../configs/init.php");

?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<?php echo get_header(); ?>

<body class="nk-body npc-subscription has-aside ui-clean ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <div class="nk-header nk-header-fixed is-light">
                    <?php get_navbar(); ?>
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">
                            <div class="nk-aside" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="lg" data-toggle-body="true">
                                
                                <?php get_sidebar(); ?>

                                <div class="nk-aside-close">
                                    <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
                                </div><!-- .nk-aside-close -->
                            </div><!-- .nk-aside -->
                            <div class="nk-content-body">
                                <div class="nk-content-wrap">
                                    <div class="nk-block">
                                        <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="card card-bordered card-full">
                                                    <div class="nk-wg1">
                                                        <div class="nk-wg1-block">
                                                            <div class="nk-wg1-text">
                                                                <h2 class="title">19</h2>
                                                                <p>Pending Orders</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-wg1-action">
                                                            <a href="html/subscription/subscriptions.html" class="link"><span>Manage Orders</span> <em class="icon ni ni-chevron-right"></em></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col -->
                                            <div class="col-md-6">
                                                <div class="card card-bordered card-full">
                                                    <div class="nk-wg1">
                                                        <div class="nk-wg1-block">
                                                            <div class="nk-wg1-text">
                                                                <h2 class="title">19</h2>
                                                                <p>Products</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-wg1-action">
                                                            <a href="html/subscription/subscriptions.html" class="link"><span>Manage Products</span> <em class="icon ni ni-chevron-right"></em></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col -->
                                            <div class="col-md-6">
                                                <div class="card card-bordered card-full">
                                                    <div class="nk-wg1">
                                                        <div class="nk-wg1-block">
                                                            <div class="nk-wg1-text">
                                                                <h2 class="title">19</h2>
                                                                <p>Out of stock products</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-wg1-action">
                                                            <a href="html/subscription/subscriptions.html" class="link"><span>Manage out of stock products</span> <em class="icon ni ni-chevron-right"></em></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col -->

                                            <div class="col-md-6">
                                                <div class="card card-bordered card-full">
                                                    <div class="nk-wg1">
                                                        <div class="nk-wg1-block">
                                                            <div class="nk-wg1-text">
                                                                <h2 class="title">5,000</h2>
                                                                <p>Total Sales Today</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-wg1-action">
                                                            <a href="html/subscription/subscriptions.html" class="link"><span>Manage orders</span> <em class="icon ni ni-chevron-right"></em></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col -->

                                            
                                        </div><!-- .row -->
                                    </div><!-- .nk-block -->
                                    
                                   
                                   
                                </div>
                                <!-- footer @s -->
                                <?php get_footer_2(); ?>
                                <!-- footer @e -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <?php echo get_footer(); ?>
</body>

</html>ml>