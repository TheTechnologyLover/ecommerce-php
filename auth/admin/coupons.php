<?php
    include ("../../configs/init.php");
    include ("./coupons/read.php");
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
                                                <h2 class="nk-block-title fw-normal">Coupons</h2>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                  
                                    <div class="nk-block mb-5">
                                        <?php echo $output; ?>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="code">Code</label>
                                                <input type="text" class="form-control" id="code" required name="code">
                                            </div>
                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <select class="form-control" id="type" name="type">
                                                  <option value='Percent'>Percent</option>
                                                  <option value='Rupees'>Rupees</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="value">Value</label>
                                                <input type="number" class="form-control" id="value" required name="value">
                                            </div>
                                            <div class="form-group">
                                                <label for="minCart">Minimum cart value in rupees</label>
                                                <input type="number" class="form-control" id="minCart" required name="minCart">
                                            </div>
                                            <input type="submit" name="submit" value="Add" class="btn btn-primary"/>
                                        </form> 
                                    </div><!-- .nk-block -->
                                
                                    <div class="nk-block">
                                        <div class="card card-bordered table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th><span class="">#</span></th>
                                                        <th>
                                                            Code
                                                        </th>
                                                        <th>
                                                            Type
                                                        </th>
                                                        <th>
                                                            Value
                                                        </th>
                                                        <th>
                                                            Min cart value
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    <?php echo displayRecord(
                                                        $results,
                                                        array("SrNo", "code", "type", "value", "mincart"),
                                                        array(
                                                            array(
                                                                "option"    =>      "Remove",
                                                                "path"      =>      "auth/admin/coupons/delete.php",
                                                                "class"     =>      "" 
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