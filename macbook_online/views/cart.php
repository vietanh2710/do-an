<?php 
session_start();
?>
<!DOCTYPE html >
<html  lang="vi" xml:lang="vi">
    <?php require_once __DIR__."/../autoload/autoload.php"; ?>
    <?php  require_once __DIR__."/teamplate/head.php"; ?>
    <body class="single single-products postid-193659 header-image content-sidebar">
        <div id="wrap">
            <!-- div content-before-header -->
                <?php  require_once __DIR__."/teamplate/content-before-header.php"; ?>
            <!--  End content-before-header -->
            
            <!--  div header -->
                <?php  require_once __DIR__."/teamplate/header.php"; ?>
            <!-- End div header -->
            <div class="breadcrumb">
               <div class="wrap"><a href="index.php">Trang chủ</a><span class="label">   »   </span>Giỏ hàng</div>
            </div>
            <div id="inner">
                <div id="content-sidebar-wrap">
                   <!--  div menu-js -->
                        <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                    <!-- End div menu-js  -->
                        <div id="content" class="hfeed">
                            <div class="post-8939 page type-page status-publish hentry entry">
                                <h1 class="entry-title">Giỏ hàng của bạn</h1>
                                <div class="entry-content">
                                        <?php 
                                            if(isset($_SESSION['success'])){

                                                echo '<div class="message error" style="color: #06a829; font-size: 18px;">'.$_SESSION['success'].'</div>';
                                                unset($_SESSION['success']);

                                            } elseif(isset($_SESSION['error'])){
                                                echo '<div class="message error" style="color: red; font-size: 18px;">'.$_SESSION['error'].'</div>';
                                                unset($_SESSION['error']);

                                            }
                                        ?>
                                    <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                                    <form action="" method="post" id="shop-cart-form">
                                        <table id="gsc-shopcart-table" width="100%" class="shop-cart-table" cellspacing="0" cellpadding="5">
                                            <thead class="tr-heading">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Hình Ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $stt = 0 ;?>
                                                <?php foreach($_SESSION['cart'] as $key =>$value): ?>
                                                    <tr>
                                                        <td align="center"><?php echo $stt = $stt + 1 ;?> </td>
                                                        <td width="">
                                                            <img width="100" height="100" src="../upload/product/<?php echo $value['image']?>" class="attachment-thumbnail" >
                                                        </td>
                                                        <td>
                                                            <span class="product-name">
                                                                <a href="detail.php?id=<?php echo $value['product_id']?>" title="<?php echo $value['name']?>"><?php echo $value['name']?></a>
                                                            </span><br>
                                                        <td align="center"> 
                                                        <span class="row-price">
                                                            <input type="number" id = 'qty_<?php echo $value['product_id'] ?>' value="<?php echo $value['qty'] ?>" style="width: 50px;height: 25px;text-align: center;" min="1" required onchange="checkNumber($(this))">
                                                        </span>
                                                        </td>
                                                        <td align="center"><span class="row-price"><?php echo number_format($value['price']) ?> đ</span></td>
                                                        <td align="center"><span class="row-price"><?php echo number_format($value['amount']) ?> đ</span></td>
                                                        <td align="center"><a href="../Controller/add_cart.php?action=delete-cart&id=<?php echo $key ?>" class="remove-product" data-id="193725">Xóa</a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <?php elseif (!isset($_SESSION['success'])) : ?>
                                            <div class="message error" style="color: #06a829; font-size: 18px;">Bạn không có sản phẩm nào trong giỏ hàng của bạn</div>
                                        <?php endif; ?>

                                        <div class="cart-summary">
                                            <div class="cart-total">
                                                <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                                                <p class="num-product">
                                                    <?php
                                                        if(isset($_SESSION['cart']))
                                                        {
                                                            $qty = 0;
                                                            foreach ($_SESSION['cart'] as $key => $value) {
                                                                # code...
                                                                $qty = $qty + $value['qty'];
                                                            }
                                                        }
                                                    ?>
                                                    <?php if (intval($qty) > 0): ?>
                                                    <span class="current">Số lượng : <?= $qty ?></span>
                                                    <span class="num-products"></span>
                                                    <?php endif; ?>
                                                </p>
                                                <p class="total-price">
                                                    <?php
                                                        $sum = 0;
                                                        if(isset($_SESSION['cart']))
                                                        {
                                                            foreach($_SESSION['cart'] as $val)
                                                            {
                                                                $sum = $sum + $val['amount'];
                                                            }
                                                            number_format($sum);
                                                        }
                                                    ?>
                                                    <?php if (intval($qty) > 0): ?>
                                                    <span class="total-price">Tổng tiền: </span>
                                                    <span class="total-pricce"><?= number_format($sum) ?> đ</span>
                                                    <?php endif; ?>
                                                </p>
                                                <?php endif; ?>
                                                <a class="button checkout" href="payment.php" title="Order">Đặt hàng</a>

                                            </div>
                                            <div class="clear"></div>

                                            <div class="gsc-action"><a class="continue-shopping" href="index.php" title="Continue shopping">Tiếp tục mua sắm</a></div>
                                            <div class="clear"></div>
                                        </div>
                                    </form>
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

<script type="text/javascript">
    $(function(){
        $update_cart = $(".update-cart");
        $update_cart.click(function() {
            key = $(this).attr('data-cart');
            action = 'update_cart';
            qty = $('#qty_'+key).val();
            $.ajax({
                url:'http://localhost/macbook_online/Controller/add_cart.php',
                type:'get',
                async:true,
                dataType:'text',
                data:{'key':key , 'action':action,'qty':qty},
                success:function(data)
                {
                }
            });
            
        });
    });

    function checkNumber(that) {
        var value = that.val();
        if (value < 0) {
            alert('The number of products allowed is not less than 1.')
            that.val(1);
        }
    }
</script>
