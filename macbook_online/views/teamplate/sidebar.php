<?php
    require_once("../autoload/autoload.php");

    class Sidebar extends My_Model{
        public function __construct()
        {
            parent::__construct();
        }
        // Sản phẩm bán chạy
        public function showSellingProducts()
        {
            $where = ' 1 ORDER BY buyed DESC LIMIT 5 ';
            return $data = parent::fetchwhere('product', $where);
        }
        // sản phẩm hot
        public function showProductHighlights()
        {
            $where = 'hot = 1 ORDER BY created_at DESC LIMIT 5 ';
            return $data = parent::fetchwhere('product',$where);
        }
        // Hiển thị tin tức
        public function showNews()
        {
            $where = "1 ORDER BY id DESC LIMIT 0,5 ";
           return  $data = parent::fetchwhere('news',$where);
        }
    }

    $product = new Sidebar();
    $productSelling = $product -> showSellingProducts();
    $product_hig = $product -> showProductHighlights();
    $news = $product->showNews();
?>

<div id="sidebar" class="sidebar widget-area">
    <div id="caia-product-jquery-2" class="widget caia-product-jquery-widget">
        <div class="widget-wrap">
            <h4 class="widget-title widgettitle">Sản phẩm bán chạy</h4>
            <div class="main-posts">
                <div class="">
                    <ul>
                        <?php foreach($productSelling as $value): ?>
                        <li class="products type-products">
                            <a href="detail.php?id=<?php echo $value['id'] ?>" title="<?php echo $value['name'] ?>" class="alignleft">
                                <img width="150" height="150" src="../upload/product/<?php echo $value['thunbar'] ?> " class="attachment-thumbnail" alt="<?php echo $value['name'] ?>" title="<?php echo $value['name'] ?>" />
                            </a>
                            <h3 class="widget-item-title">
                                <a href="detail.php?id=<?php echo $value['id'] ?>" title="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></a>
                            </h3>
                            <div class="show-gia1">
                                <span class="price"><span> 
                                    <?php echo ($value['sale'] >0 )? (number_format(($value['price'] *(100 - $value['sale']))/100)): number_format($value['price'])  ?> đ
                            </div>
                            <div class="clear"></div>
                        </li>
                        <?php endforeach; ?>
                        <!--end post_class()-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div id="caia-post-list-3" class="widget caia-post-list-widget">
        <div class="widget-wrap">
            <h4 class="widget-title widgettitle">Sản phẩm hot</h4>
            <div class="main-posts">
                <?php foreach ($product_hig  as $key => $value): ?>
                <div class=" products type-products">
                    <a href="detail.php?id=<?php echo $value['id'] ?>" title="<?php echo $value['name'] ?>" class="alignleft">
                        <img width="150" height="150" src="../upload/product/<?php echo $value['thunbar'] ?> " class="attachment-thumbnail" alt="<?php echo $value['name'] ?>" title="<?php echo $value['name'] ?>" />
                    </a>
                    <h3 class="widget-item-title">
                        <a href="detail.php?id=<?php echo $value['id'] ?>" title="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></a>
                    </h3>
                    <div class="show-gia1">
                        <?php if($value['sale'] == 0): ?>
                            <p class="price">
                                <span><?php echo number_format($value['price'])  ?>đ</span>
                            </p>
                        <?php else : ?>
                            <p class="price">
                                <span>
                                    <?php 
                                        $price = ($value['price'] *(100 - $value['sale']))/100;
                                        echo number_format($price);
                                    ?>đ
                                </span>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php endforeach;?>
                <!--end post_class()-->
            </div>
        </div>
    </div>

    <div id="caia-post-list-2" class="widget caia-post-list-widget">
        <div class="widget-wrap">
            <h4 class="widget-title widgettitle">Tin tức</h4>
            <div class="main-posts">
                <?php foreach($news as $value): ?>
                <div class="category-tin-tuc">
                    <a href="<?php echo 'news.php?id='.$value['id']; ?>" title="<?php echo $value['title'] ?>" class="alignleft">
                        <img src="../upload/news/<?php echo $value['image_link'] ?> " class="attachment-thumbnail" alt="<?php echo $value['title'] ?>" title="<?php echo $value['title'] ?>">
                    </a>
                    <h3 class="widget-item-title">
                        <a href="<?php echo 'news.php?id='.$value['id']; ?>" title="<?php echo $value['title'] ?>">
                            <?php echo $value['title'] ?>
                        </a>
                    </h3>
                    <div class="clear"></div>
                </div>
            <?php endforeach; ?>
                <!--end post_class()-->
            </div>
            <p class="more-from-category"><a href="list_new.php" title="">Xem thêm...</a></p>
        </div>
    </div>
</div>