<?php
    include ("../../configs/init.php");
    include ("./settings/read.php");
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
                                                <h2 class="nk-block-title fw-normal">Account Settings</h2>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                  
                                    <div class="nk-block">
                                        <form action="" method="post">
                                            <?php echo $output; ?>
                                            <div class="form-group">
                                                <label for="oldPassword">Old Password</label>
                                                <input value="<?php echo $user->password ?>" disabled name="old_password" type="password" class="form-control" id="oldPassword" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="newPassword">New Password</label>
                                                <input  name="password" type="password" class="form-control" id="newPassword" required>
                                            </div>

                                            <input type="submit" value="Save" name="submit" class="btn btn-primary" />
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