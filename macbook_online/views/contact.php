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
               <div class="wrap"><a href="index.php">Trang chủ</a><span class="label">   »   </span>Liên hệ</div>
            </div>
            <div id="inner">
                <div id="content-sidebar-wrap">
                   <!--  div menu-js -->
                        <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                    <!-- End div menu-js  -->
                        <div id="content" class="hfeed">
                            <div class="post-7 page type-page status-publish hentry entry">
                                <h1 class="entry-title">Liên hệ</h1>
                                <div class="entry-content">
                                    <p><span style="font-size: large;"><strong> <br>
                                        </strong></span>
                                    </p>
                                    <p><strong>Address 1: &nbsp;</strong> <a style="color: #000;" href="" target="_blank"> Hà Nội</a></p>
                                    <p><strong>Address 2: &nbsp;</strong> <a style="color: #000;" href="" target="_blank"> Nghệ An</a></p>
                                    <p><strong>Phone : 0969466833</strong></p>
                                    <p><strong>Email: phamvietanh2710@gmail.com</strong></p>
                                    <p><strong>Facebook: <a href="https://www.facebook.com/profile.php?id=100005540269264">https://www.facebook.com/profile.php?id=100005540269264</a></strong></p>
                                    <p><strong><br>
                                        </strong>
                                    </p>
                                    <p>&nbsp;</p>
                                    <hr>
                                </div>
                            </div>
                            <div id="product-seen"></div>
                        </div>
                            
                    <!-- div sidebar -->
                        <?php  require_once __DIR__."/teamplate/sidebar.php"; ?>
                   <!--  end  div sidebar -->
                </div>
            </div>
            <!--  div footer  -->
                 <?php  require_once __DIR__."/teamplate/footer.php"; ?>
            <!--  End div footer  -->
        </div>
    </body>
</html>
