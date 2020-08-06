<div id="content-before-header">
    <div class="wrap">
        <div id="nav_menu-8" class="widget widget_nav_menu">
            <div class="widget-wrap">
                <div class="menu-main-menu-container">
                    <ul id="menu-main-menu" class="menu">
                       
                        <?php if(!isset($_SESSION['users'])): ?>

                        <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="login.php">Đăng nhập</a></li>
                        <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="register.php">Đăng ký</a></li>
                       
                        <?php else: ?>
                        <?php 
                            echo '<li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="member-information.php" style="">Xin chào '.$_SESSION['users']['name_user'].'</a></li>';
                            echo '<li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="';
                                echo url().'views/sing-out.php';
                            echo'">Đăng xuất</a></li>'
                        ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>