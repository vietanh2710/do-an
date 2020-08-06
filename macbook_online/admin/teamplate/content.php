<?php 
	require_once("../../../autoload/autoload.php");

	class ShowData extends My_Model{
		public function __construct(){
			parent::__construct();
		}
        // hiển thị danh sách đơn hàng
		public function showTransaction($start,$display)
	    {
          $data = parent::fetchAllpagina('transaction' , $start,$display);
	      return $data;
        }
        // đếm số lượng đơn hàng đã xử lý
	    public function countid()
	    {
	       $data = parent::countTable('transaction');
	       return $data;
	    }
        // đếm số lượng đơn hàng chưa xử lý
	    public function countPending()
	    {
	    	return $data = parent::fetchwhere('transaction','active = 0');
	    }
        // đếm số lượng sản phẩm
	    public function countProduct()
	    {
	    	$data = parent::countTable('product');
	       	return $data;
	    }
        // đếm số lượng tin tức
	    public function countNews()
	    {
	    	$data = parent::countTable('news');
	       	return $data;
	    }

        // đếm số lượng đơn hàng đã thanh toán
	    public function productPay()
	    {
	    	$data = parent::fetchwhere('transaction','active = 1');
	    	$num = 0;
	    	foreach ($data as $key => $value) {
	    		# code...
	    		$num = $num + $value['amount'];
	    	}
	    	return $num;
	    }
        // đếm số sản phẩm đang xử lý
	    public function productPending()
	    {
	    	$data = parent::fetchwhere('transaction','active = 0');
	    	$num = 0;
	    	foreach ($data as $key => $value) {
	    		# code...
	    		$num = $num + $value['amount'];
	    	}
	    	return $num;
	    }
	}

	$show_data = new ShowData();

	$display = 6;
	$start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
	$record = $show_data ->countid();
	$data_transaction =$show_data ->showTransaction($start,$display);
	$data_pending = $show_data ->countPending();
    // lấy tổng số lượng sản phẩm
	$num_product = $show_data->countProduct();
    // lấy tổng số lượng tin tức
	$num_news = $show_data->countNews();
    // tổng đơn hàng đã thanh toán
	$num_pay = $show_data->productPay();
    // tổng đơn hàng đang xử lý
	$num_pending = $show_data->productPending();
?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12 ">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Thống kê dữ liệu giao dịch</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content br">
                    <div class="widget_summary">
                        <div class="col-md-6">Tổng số giao dịch</div>
                        <div class="col-md-6"><b class="text-danger"><?php echo $record; ?></b></div>
                    </div>
                </div>
                <div class="x_content br">
                    <div class="widget_summary">
                        <div class="col-md-6">Đang chờ xử lý</div>
                        <div class="col-md-6"><b class="text-danger"><?php echo count($data_pending); ?> </b></div>
                    </div>
                </div>
                <div class="x_content br">
                    <div class="widget_summary">
                        <div class="col-md-6">Giao dịch được xử lý</div>
                        <div class="col-md-6"><b class="text-danger"> <?php echo $record - count($data_pending) ;   ?> </b></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===========================end================== -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Dữ liệu</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content br">
                    <div class="widget_summary">
                        <div class="col-md-6">Tổng số sản phẩm</div>
                        <div class="col-md-6"><b class="text-danger"><?php echo $num_product; ?></b></div>
                    </div>
                </div>
                <div class="x_content br">
                    <div class="widget_summary">
                        <div class="col-md-6">Tổng số bài viết</div>
                        <div class="col-md-6"><b class="text-danger"><?php echo $num_news; ?> </b></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===========================end================== -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Doanh thu</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content br">
                    <div class="widget_summary">
                        <div class="col-md-6">Đã thanh toán</div>
                        <div class="col-md-6"><b class="text-danger"><?php echo number_format($num_pay); ?> vnd</b></div>
                    </div>
                </div>
                <div class="x_content br">
                    <div class="widget_summary">
                        <div class="col-md-6">Đang được xử lý</div>
                        <div class="col-md-6"><b class="text-danger"><?php echo number_format($num_pending);?> vnd</b></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===========================end================== -->
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Danh sách giao dịch</h2>
                <div class="clearfix"></div>
            </div>
            <?php
                if (isset($_SESSION['error']))
                {
                    warning($_SESSION['error']);
                    unset($_SESSION['error']);

                }
            ?>
            <div class="x_content">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên </th>
                        <th>Email </th>
                        <th>Địa chỉ </th>
                        <th>Phone </th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th colspan="2" class="text-center">Hành động</th>
                    </tr>
                    </thead>
                    <?php foreach($data_transaction as $value): ?>
                        <tbody>
                        <tr>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['address'] ?></td>
                            <td><?php echo $value['phone'] ?></td>
                            <td><?php echo number_format($value['amount']) ?>đ</td>
                            <td class="text-center">
                                <?php if($value['active'] == 1): ?>
                                    <a href="<?php echo '../../controller/Active.php?action=unpaid&id='.$value['id'] ;?>" class="btn btn-xs btn-info active-info " data-active="31">Đã thanh toán</a>
                                <?php elseif($value['active'] == 0): ?>
                                    <a href="<?php echo '../../controller/Active.php?action=pay&id='.$value['id'] ;?>" class="btn btn-xs btn-default active-info" data-active="32">Đang xử lý</a>
                                <?php else: ?>
                                    Hủy
                                <?php endif; ?>
                            </td>
                            <td><?php echo $value['created_at'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-xs btn-danger btn-delete-action verify_action" href="<?php echo '../../controller/Active.php?action=delete&id='.$value['id'] ;?>"><i class="fa fa-trash-o"></i></a>
                                <a class="btn btn-xs btn-success" target="_blank" href="../home/view_order.php?id=<?php echo $value['id'] ?>"><i class="fa fa-fw fa-street-view" title=""></i></a>
                            </td>
                        </tr>
                        </tbody>
                    <?php endforeach ;?>
                </table>
            </div>
            <?php
            $table ='product';
            $link = 'index.php';
            echo pagination($display,$table,$link,$record);
            ?>
        </div>
    </div>
</div>