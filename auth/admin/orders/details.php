<?php
    include ("../../../configs/init.php");
    include ("./controllers/details.php");
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
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between-md g-4">
                                            <div class="nk-block-head-content">
                                                <h2 class="nk-block-title fw-normal">Order #<?php echo $id ?></h2>
                                                <p>Transection Id : <?php echo $result[0]['transactionid'] ?></p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="invoice">
                                            <div class="invoice-wrap">
                                                <div class="invoice-head">
                                                    <div class="invoice-contact">
                                                        <span class="overline-title">Order from</span>
                                                        <div class="invoice-contact-info">
                                                            <h4 class="title"><?php echo $result[0]['name'] ?></h4>
                                                            <ul class="list-plain">
                                                                <li><em class="icon ni ni-map-pin-fill"></em><span><?php echo $result[0]['address'] ?><br><?php echo $result[0]['landmark'] ?></span></li>
                                                                <li><em class="icon ni ni-call-fill"></em><span><?php echo $result[0]['mobileno'] ?></span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="invoice-desc">
                                                        <ul class="list-plain">
                                                            <li class="invoice-date"><span>Date</span>:<span><?php echo $result[0]['date'] ?></span></li>
                                                        </ul>
                                                    </div>
                                                </div><!-- .invoice-head -->
                                                <div class="invoice-bills">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product Id</th>
                                                                    <th>Title</th>
                                                                    <th>Weight (in KG)</th>
                                                                    <th>Price</th>
                                                                    <th>Qty</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    foreach($orders as $row){
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $row['productid'] ?></td>
                                                                            <td><?php echo $row['title'] ?></td>
                                                                            <td><?php echo $row['weight'] ?></td>
                                                                            <td><?php echo $row['price'] ?></td>
                                                                            <td><?php echo $row['quantity'] ?></td>
                                                                            <td><?php echo $row['price']*$row['quantity'] ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <?php

                                                                    if($result[0]['coupon'] != ''){
                                                                        ?>
                                                                        Coupon applied: <?php echo $result[0]['coupon']; ?> <br>
                                                                        Amount saved: <?php echo $result[0]['saved']; ?>        
                                                                        <?php
                                                                    }

                                                                ?>
                                                                <tr>
                                                                    <td colspan="3"></td>
                                                                    <td colspan="2">Subtotal</td>
                                                                    <td><?php echo $result[0]['total'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"></td>
                                                                    <td colspan="2">Amount Paid</td>
                                                                    <td><?php echo $result[0]['total'] ?></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div><!-- .invoice-bills -->
                                            </div><!-- .invoice-wrap -->
                                        </div><!-- .invoice -->
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

</html>