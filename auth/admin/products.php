<?php
    include ("../../configs/init.php");
    include ("./products/read.php");
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
                                                <h2 class="nk-block-title fw-normal">Products</h2>
                                            </div>
                                            <div class="nk-block-head-content">
                                                <ul class="nk-block-tools gx-3">
                                                    <li><a href="<?php echo AUTH_PATH . 'admin/products/add.php' ?>" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span><span class="d-none d-sm-inline-block">Add new</span></a></li>
                                                    <li><a href="<?php echo AUTH_PATH . 'admin/products.php?out_stock=1' ?>" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span><span class="d-none d-sm-inline-block">Out of Stock Products</span></a></li>
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
                                                            Title
                                                        </th>
                                                        <th>
                                                            Departments
                                                        </th>
                                                        <th>
                                                            Price
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    <?php echo displayRecord(
                                                        $results, 
                                                        array("SrNo", "t1", "t2", "price"),
                                                        array(
                                                            array(
                                                                "option"    =>  "Edit</br>",
                                                                "path"      =>  "auth/admin/products/edit.php",
                                                                "class"     =>  ""
                                                            ),
                                                            array(
                                                                "option"    =>   $option,
                                                                "path"      =>  $path,
                                                                "class"     =>  ""
                                                            )
                                                        )
                                                    );


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