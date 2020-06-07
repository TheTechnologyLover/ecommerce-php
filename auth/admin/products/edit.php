<?php
    include ("../../../configs/init.php");
    include ("./controllers/edit.php");
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
                    <?php  get_navbar(); ?>
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
                                                <h2 class="nk-block-title fw-normal">Add Product</h2>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                  
                                    <div class="nk-block">
                                        <?php echo $output;  ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="deptName">Product Title</label>
                                                <input type="text" class="form-control" value="<?php echo $product->title ?>" id="productTitle" required name="productTitle">
                                            </div>
                                            <div class="form-group">
                                                <label for="deptName">Product Weight (in Kg)</label>
                                                <input type="text" class="form-control" value="<?php echo $product->weight ?>" id="productWeight" required name="productWeight">
                                            </div>
                                            <div class="form-group">
                                                <label for="deptName">Price</label>
                                                <input type="number" class="form-control" value="<?php echo $product->price ?>" id="productPrice" required name="productPrice">
                                            </div>
                                            <div class="form-group">
                                                <label for="department">Department</label>
                                                <select class="form-control" id="department" name="department">
                                                    <?php echo displaySelect(
                                                        $departments,
                                                        "title",
                                                        "id",
                                                        $product->deptid
                                                    );

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="desc">Description</label>
                                                <textarea class="form-control" id="desc" name="desc" required><?php echo $product->description ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <input type="file" name="image" required>
                                            </div>
                                            
                                            <div>
                                                <p>Uploaded file</p>
                                                <img style="width: 150px;" src="<?php echo SERVER_ROOT . 'uploads/' .  $file->filename ?>"  />
                                            </div>

                                            <input type="submit" value="Add" name="submit" class="btn btn-primary mt-4" />
                                          </form>                                          
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