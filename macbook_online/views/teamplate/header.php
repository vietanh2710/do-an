<div id="header">
    <div class="wrap">
        <div id="title-area">
            <h1 id="title"><a href="index.php">MACBOOK - ONLINE</a></h1>
        </div>
        <div class="widget-area header-widget-area">
            <div id="code_widget-2" class="code-widget_search_form widget caia_code_widget">
                <div class="widget-wrap">
                    <form role="search" method="get" id="searchform" action="search.php">
                        <div class="search-list-category">
                            <input type="text" value="" name="search" id="s" placeholder="Từ khóa tìm kiếm"/>
                            <input type="submit" id="searchsubmit" value="Search" />
                        </div>
                    </form>
                </div>
            </div>
            <div id="shop-cart-4" class="widget gsc-shop-cart">
                <div class="widget-wrap">
                    <div class = "cart-wrap">
                        <!--hoangnm edit-->
                        <a href="../views/cart.php" title="View Cart">
                            <span id="num-incart-products">
                                <span class="num-products"><?php echo (isset($_SESSION['cart']))?count($_SESSION['cart']):0; ?></span>
                            </span>
                            <span class='checkout'>Cart</span>
                        </a>
                    </div>
                    <!-- end .wrap -->
                </div>
            </div>
            <div id="text-12" class="widget widget_text">
                <div class="widget-wrap">
                    <div class="textwidget">
                        <p id="button-product">DANH MỤC SẢN PHẨM</p>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="top_menu">
            <ul class="menus">
                <a href="index.php"><li class="level-1">Trang chủ</li></a>
                <a href="product.php?action=product"><li>Sản phẩm</li></a>
                <a href="list_new.php"><li>Tin tức</li></a>
                <a href="introduce.php"><li>Giới thiệu</li></a>
                <a href="contact.php"><li>Liên hệ</li></a>
                
            </ul>
        </div>

    </div>
</div>