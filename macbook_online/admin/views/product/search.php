<?php 
require_once("../../../autoload/autoload.php");
if(isset($_SESSION['id_admin']) && isset($_SESSION['role_id']))
{
  $id = $_SESSION['id_admin'] ;
  $role_id= $_SESSION['role_id'];
}

checkLogin($id,$role_id);
$permission = explode(',', $_SESSION['permission']);
if (!in_array('edit-products', $permission) && !in_array('all', $permission)) {
    redirect_to('admin/views/errors.php');
}

class viewAdd
{
public $db;
    function __construct()
    {
        # code...
        $this->db = new My_Model();
    }
}
$viewcate = new viewAdd();


class ViewProduct extends My_Model{

public function __construct()
{
    parent::__construct();
}
// tìm kiếm tên sản phẩm
public function searchProduct($data)
{
    $key = $data['search'];
    $key = trim($key);
    $where = "name LIKE '%$key%' OR price LIKE '%$key%'";
    return $data = parent::fetchwhere('product',$where);
}    
}
$view_product = new ViewProduct();
if(empty($_REQUEST['price']))
{
$seach_product = $view_product ->searchProduct($_REQUEST);
}else{
$seach_product = $view_product ->seachPrice($_REQUEST);
}

?>


<div class="right_col" role="main">
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Quản lý sản phẩm</h3>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right ">
            <button type="button" class="btn btn-round btn-danger" onclick="history.go(-1); return false;" style="float: right;" >Trở lại</button>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form method="get" action="" class="list_filter form">
                                <table class="table table-bordered">
                                    <?php
                                    if(isset($_SESSION['success']))
                                    {
                                        success($_SESSION['success']);
                                        unset($_SESSION['success']);
                                    }
                                    ?>
                                    <thead>
                                    <tr>
                                        <th style="width: 3%">STT</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Sale</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Chỉnh sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $stt = 0 ?>
                                    <?php foreach($seach_product as $key => $value): ?>
                                     <form name="form" class="form" id="form" method="post" action="../../controller/ProductController.php?action=search&id=<?php echo $values['id']?>" enctype="multipart/form-data">
                                        
                                        <tr class="row_<?php echo $value['id']?>">
                                            <td class="center" style="width: 3%"><?php echo $stt = $stt +1 ?></td>
                                            <td class="center">  <img src="<?php echo !empty($value['thunbar']) ?  url().'upload/product/'.$value['thunbar'] : url() . 'admin/public/images/image_default.png'; ?>" class="img-thumbnail" alt="Cinque Terre" width="80" height="80">  </td>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo number_format($value['price'])?> d</td>
                                            <td><?php echo number_format($value['sale'])?> %</td>
                                            <td><?php echo $value['qty'] ?> </td>
                                            <td class="center">
                                                <?php if($value['status'] == 1): ?>
                                                    <?php echo '<i class="fa fa-fw fa-check" id = "icon_xanh"></i> '?>
                                                <?php else : ?>
                                                    <?php echo '<i class="fa fa-fw fa-close" id = "icon_red"></i>';?>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo date("Y-m-d", strtotime($value['created_at']))  ?> </td>
                                            <td class="center">
                                                <?php echo '<a href="index.php?action=edit&id='.$value['id'].'">' ;?>
                                                <i class="fa fa-edit" id = "icon_xanh" ></i>
                                                </a>
                                            </td>
                                            <td class="center">
                                                <a href ="../../controller/ProductController.php?action=delete&id=<?php echo $value['id'] ?>" class="verify_action" >
                                                    <i class="fa fa-trash-o" id = "icon_red" >
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- End Foreach -->
                                    </form>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>