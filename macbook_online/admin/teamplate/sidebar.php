<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><span class="logo-lg"><b>Macbook</b> Admin</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <!-- <div class="profile clearfix">
            <div class="profile_pic">
                <img src="../../../upload/admin/<?php echo (isset($_SESSION['image']))?$_SESSION['image']:"" ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome <?php echo (isset($_SESSION['name_admin']))?$_SESSION['name_admin']:"" ?> </span>
                <h2></h2>
            </div>
        </div> -->
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a class="" href="../home"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li><a href="../order"><i class="fa fa-anchor"></i>Đơn hàng</a></li>
                    <li><a href="../category"><i class="fa fa-anchor"></i>Danh mục</a></li>
                    <li><a href="../product"><i class="fa fa-truck"></i>Sản phẩm</a></li>
                    <li>
                        <a><i class="fa fa-users"></i></i>Quản lý tài khoản<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="../admin">Quản trị</a></li>
                            <li><a href="../users">Người dùng</a></li>
                        </ul>
                    </li>
                    <li><a href="../news"><i class="fa fa-bar-chart"></i> Tin tức </a></li>
                    <li><a href="../roles"><i class="fa fa-fw fa-lock"></i>Vai trò</a></li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
        <!-- /menu footer buttons -->
    </div>
</div>