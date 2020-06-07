<?php

    function get_navbar(){

        ?>
        <div class="nk-header nk-header-fixed is-light">
            <div class="container-lg wide-xl">
                <div class="nk-header-wrap">
                    <div class="nk-header-brand">
                        <a href="<?php echo AUTH_PATH . 'admin/index.php' ?>" class="logo-link">
                            <img class="logo-light logo-img" src="<?php echo STATIC_PATH . 'images/logo.png' ?>" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="<?php echo STATIC_PATH . 'images/logo-dark.png' ?>" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                        </a>
                    </div><!-- .nk-header-brand -->
                    <div class="nk-header-tools">
                        <ul class="nk-quick-nav">
                            <li class="dropdown user-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <div class="user-toggle">
                                        <a href="<?php echo SERVER_ROOT . 'logout.php' ?>"><em class="icon ni ni-signout"></em><span> Sign out</span></a>
                                    </div>
                                </a>
                            </li><!-- .dropdown -->
                                   
                            <li class="d-lg-none">
                                <a href="#" class="toggle nk-quick-nav-icon mr-n1" data-target="sideNav"><em class="icon ni ni-menu"></em></a>
                            </li>
                        </ul><!-- .nk-quick-nav -->
                    </div><!-- .nk-header-tools -->
                </div><!-- .nk-header-wrap -->
            </div><!-- .container-fliud -->
        </div>

        <?php

    }
