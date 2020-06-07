<?php

  
    function get_sidebar(){

        ?>

                                <div class="nk-sidebar-menu" data-simplebar>
                                    <!-- Menu -->
                                    <ul class="nk-menu">
                                        <li class="nk-menu-heading">
                                            <h6 class="overline-title">Menu</h6>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo AUTH_PATH . 'admin/index.php' ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                                <span class="nk-menu-text">Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo AUTH_PATH . 'admin/orders.php' ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-file-text"></em></span>
                                                <span class="nk-menu-text">Orders</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo AUTH_PATH . 'admin/departments.php' ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-report-profit"></em></span>
                                                <span class="nk-menu-text">Departments</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo AUTH_PATH . 'admin/coupons.php' ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-download-cloud"></em></span>
                                                <span class="nk-menu-text">Coupons</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo AUTH_PATH . 'admin/products.php' ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-download-cloud"></em></span>
                                                <span class="nk-menu-text">Products</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo AUTH_PATH . 'admin/settings.php' ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                                <span class="nk-menu-text">Account Setting</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <!-- Menu -->
                                    
                                </div><!-- .nk-sidebar-menu -->

        <?php

    }
