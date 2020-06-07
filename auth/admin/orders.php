<?php

    include ("../../configs/init.php");
    include ("./orders/read.php");

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
                                                <h2 class="nk-block-title fw-normal">Orders</h2>
                                            </div>
                                            <div class="nk-block-head-content">
                                                <ul class="nk-block-tools gx-3">
                                                    <li><a href="<?php echo AUTH_PATH . 'admin/orders.php?past_order=1' ?>" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span><span class="d-none d-sm-inline-block">Past Orders</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                  
                                    <div class="nk-block">
                                        <?php echo $output; ?>
                                        <div class="card card-bordered table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th><span class="">#</span></th>
                                                        <th>
                                                            Order From
                                                        </th>
                                                        <th>
                                                            Date
                                                        </th>
                                                        <th>
                                                            Address
                                                        </th>
                                                        <th>
                                                            Phone Number
                                                        </th>
                                                        <th>
                                                            Total
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($results as $row){
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $row['SrNo'] ?></td>
                                                            <td><?php echo $row['name'] ?></td>
                                                            <td><?php echo $row['date'] ?></td>
                                                            <td><?php echo $row['address'] ?></td>
                                                            <td><?php echo $row['mobileno'] ?></td>
                                                            <td><?php echo $row['total'] ?></td>
                                                            <?php

                                                                if(!isset($_GET['past_order'])){
                                                                    if($row['status'] === "Processing"){
                                                                        ?>
                                                                        <td>
                                                                            <a href="<?php echo AUTH_PATH . 'admin/orders/status.php?status=Dispatched&&id=' . $cryptor->encrypt($row['id']) ?>">Mark as dispached</a>
                                                                            <br />
                                                                            <a href="<?php echo AUTH_PATH . 'admin/orders/details.php?id=' . $cryptor->encrypt($row['id']) ?>">Details</a>
                                                                        </td>
                                                                        <?php
                                                                    }else if($row['status'] === "Dispatched"){
                                                                        ?>
                                                                        <td><a href="<?php echo AUTH_PATH . 'admin/orders/status.php?status=Delivered&&id=' . $cryptor->encrypt($row['id']) ?>">Mark as delivered</a><br /><a href="<?php echo AUTH_PATH . 'admin/orders/details.php?id=' . $cryptor->encrypt($row['id']) ?>">Details</a></td>
                                                                        <?php
                                                                    }
                                                                }else{
                                                                    ?>
                                                                    <td>
                                                                    <a href="<?php echo AUTH_PATH . 'admin/orders/details.php?id=' . $cryptor->encrypt($row['id']) ?>">Details</a>
                                                                    </td>
                                                                    <?php
                                                                }

                                                                

                                                            ?>
                                                            
                                                        </tr>
                                                        

                                                            <?php
                                                        }
                                                    ?>
                                                    
                                        
                                                    
                                                </tbody>
                                            </table>
                                        </div><!-- .card -->
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