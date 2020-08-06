<?php 
session_start();
?>
<!DOCTYPE html >
<html  lang="vi" xml:lang="vi">
    <?php require_once __DIR__."/../autoload/autoload.php"; ?>
    <?php  require_once __DIR__."/teamplate/head.php"; ?>
    <body class="single single-products postid-193659 header-image content-sidebar">
        <div id="wrap">
            <!-- div  content-before-header -->
                <?php  require_once __DIR__."/teamplate/content-before-header.php"; ?>
            <!--  End content-before-header -->
            
            <!--  div header -->
                <?php  require_once __DIR__."/teamplate/header.php"; ?>
            <!-- End div header -->
             <div class="breadcrumb">
               <div class="wrap"><a href="index.php">Trang chủ</a><span class="label">  »  </span>Giới thiệu</div>
            </div>
            <div id="inner">
                <div id="content-sidebar-wrap">
                   <!--  div menu-js -->
                        <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                    <!-- End div menu-js  -->
                    <div id="content" class="hfeed">
                        <div class="post-4 page type-page status-publish hentry entry">
                            <h1 class="entry-title">Macbook Online</h1>
                            <div style="float: left; width: 800px; padding: 10px;">
                               <h1 class="static-headers"><a href="#"></a></h1>
                               <div class="text-form">
                                  <h2><span style="color:#ff0000;"><strong>Welcome to Macbook Online</strong></span></h2>    
                               </div>
                            </div>
                        </div>
                        <strong>
                            <div id="product-seen"></div>
                        </strong>
                    </div>
                            
                <!-- div sidebar -->
                    <?php  require_once __DIR__."/teamplate/sidebar.php"; ?>
                <!--  end  div sidebar -->
            </div>
            <!--  div footer  -->
                 <?php  require_once __DIR__."/teamplate/footer.php"; ?>
            <!--  End div footer  -->
        </div>
    </body>
</html>
