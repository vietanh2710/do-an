<?php
session_start();
require_once("../autoload/autoload.php");

if (!isset($_SESSION['users'])) {
    redirect_to('views/login.php');
}

class ShowData extends My_Model{
    public function __construct(){
        parent::__construct();
    }
    // hiển thị danh sách đơn hàng
    public function showTransaction($start,$display)
    {
        $datas = parent::fetchAllpaginaUser('transaction', $start, $display, $_SESSION['users']['email_user'] );
        foreach ($datas as $key => $value) {
            $where = 'transaction_id = '.$value['id'];
            $datas[$key]['product'] = parent::fetchwhere('ordere', $where);

        }
        return $datas;
    }
    // đếm số lượng đơn hàng
    public function countData() {
        $datas = parent::fetchwhere('transaction','email = "'.$_SESSION['users']['email_user'].'"');
        return count($datas);
    }
}

$show_data = new ShowData();

$display = 10; // số lượng đơn hàng trên 1 trang
$start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
$data_transaction =$show_data ->showTransaction($start,$display);
$num = $show_data->countData();
?>
<!DOCTYPE html >
<html  lang="vi" xml:lang="vi">
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
        <div class="wrap"><a href="index.php">Trang chủ</a><span class="label"> &gt; </span>Danh sách giao dịch</div>
    </div>
    <div id="inner">
        <div id="content-sidebar-wrap">
            <!--  div menu-js -->
            <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
            <!-- End div menu-js  -->
            <div id="content" class="hfeed">
                <div class="post-8939 page type-page status-publish hentry entry">
                    <h1 class="entry-title">Giao dịch</h1>
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
                        <form action="" method="post" id="shop-cart-form">
                            <table id="gsc-shopcart-table" width="100%" class="shop-cart-table" cellspacing="0" cellpadding="5">
                                <thead class="tr-heading">
                                <tr>
                                    <th>Mã giao dịch</th>
                                    <th>Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày tạo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($data_transaction)): ?>
                                    <?php foreach($data_transaction as $key =>$value): ?>

                                        <tr>
                                            <td align="center">
                                                <?php 
                                                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                                                    echo $value['id']. "" .substr(str_shuffle($permitted_chars),0,4) ;
                                                ?> 
                                            </td>
                                                <td>
                                                <?php foreach ($value['product'] as $key => $values): ?>
                                                    <img width="60" height="60" src="../upload/product/<?php echo $values['image']?>" class="attachment-thumbnail" >
                                                <?php endforeach; ?>
                                                </td>
                                                <td width="">
                                                <?php foreach ($value['product'] as $key => $values): ?>
                                                    <span style="font-weight: 700" class="product-name"><?php echo $values['name']?>,</span>
                                                 <?php endforeach; ?>
                                                </td>
                                          
                                            <td align="center"><span class="row-price"><?php echo number_format($value['amount']) ?> VNĐ</span></td>
                                            <td align="center"><span class="row-price"><?php echo substr($value['created_at'],0,10); ?></span></td>
                                        </tr
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="navigation">
                        <?php
                        $table ='transaction';
                        $link = 'list_order.php';
                        echo pagination($display,$table,$link,$num);
                        ?>
                    </div>
                </div>
                <div id="product-seen"></div>
            </div>
            <!-- div sidebar -->
            <?php  require_once __DIR__."/teamplate/sidebar-info-user.php"; ?>
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
        $update_transaction = $(".update-transaction");
        $update_transaction.click(function() {
            var id_transaction = $(this).attr('id_transaction');
            $.ajax({
                url:'',
                type:'get',
                async:true,
                dataType:'text',
                data:{'id_transaction':id_transaction },
                success:function(data)
                {
                    console.log(data);

                }
            });

        });
    });


</script>
