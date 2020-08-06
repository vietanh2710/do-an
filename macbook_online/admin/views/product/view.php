<?php
require_once("../../../autoload/autoload.php");
if(isset($_SESSION['id_admin']) && isset($_SESSION['role_id']))
{
    $id = $_SESSION['id_admin'] ;
    $role_id= $_SESSION['role_id'];
}

checkLogin($id,$role_id);

class showData
{
    public $db;
    public  function __construct()
    {
        # code...
        $this->db = new My_Model();
    }
    public function show_list($start,$display)
    {
        $data = $this->db ->fetchAllpagina('product' , $start,$display);
        return $data;
    }
    public function countid()
    {
        $data = $this->db->countTable('product');
        return $data;
    }

    public function show_parent($table,$where)
    {
        $data = $this->db->fetchwhere($table,$where);
        return $data;
    }

}

$show_list_cate = new showData();

$display = 5;
$start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
$record = $show_list_cate ->countid();
$data =$show_list_cate ->show_list($start,$display);

?>
<div class="right_col" role="main">
    <div class="">
        <!-- <div id="code_widget-2" class="code-widget_search_form widget caia_code_widget">
            <div class="widget-wrap">
                <form role="search" method="get" id="searchform" action="search.php">
                    <div class="search-list-category">
                        <input type="text" value="" name="search" id="s" placeholder="Từ khóa tìm kiếm"/>
                        <input type="submit" id="searchsubmit" value="Search" />
                    </div>
                </form>
            </div>
        </div> -->
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý sản phẩm</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right ">
                <button type="button" class="btn btn-round btn-danger" onclick="history.go(-1); return false;" style="float: right;" >Trở lại</button>
                <a href="index.php?action=add" class="btn btn-round btn-primary" style="float: right;">Thêm mới </a>
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
                                            <th>Danh mục</th>
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
                                        <?php foreach($data as $value): ?>
                                            <tr class="row_<?php echo $value['id']?>">
                                                <td class="center" style="width: 3%"><?php echo $stt = $stt +1 ?></td>
                                                <td class="center">  
                                                    <img src="<?php echo !empty($value['thunbar']) ?  url().'upload/product/'.$value['thunbar'] : url() . 'admin/public/images/image_default.png'; ?>" class="img-thumbnail" alt="Cinque Terre" width="80" height="80">  
                                                </td>
                                                <td><?php echo $value['name'] ?></td>
                                                <td>
                                                    <?php
                                                    $where = 'id = '.$value["category_id"];
                                                    $parent_name = $show_list_cate-> show_parent('category',$where);
                                                    if(!empty($parent_name))
                                                    {
                                                        foreach ($parent_name as $key => $values) {
                                                            # code...
                                                            echo $values['name'];
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo number_format($value['price'])?> đ</td>
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
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <?php
                        $table ='product';
                        $link = 'index.php';
                        echo pagination($display,$table,$link,$record);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>