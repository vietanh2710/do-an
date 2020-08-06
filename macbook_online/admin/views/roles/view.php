<?php
require_once("../../../autoload/autoload.php");

if(isset($_SESSION['id_admin']) && isset($_SESSION['role_id']))
{
    $id = $_SESSION['id_admin'] ;
    $role_id= $_SESSION['role_id'];
}

checkLogin($id,$role_id);

/**
 *
 */
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
        $data = $this->db ->fetchAllpagina('roles' , $start,$display);
        return $data;
    }
    public function countid()
    {
        $data = $this->db->countTable('roles');
        return $data;
    }

}

    $showListRoles = new showData();
    $display = 10;
    $start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
    $record = $showListRoles->countid();
    $datas = $showListRoles->show_list($start,$display);
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Vai trò</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right ">
                <button type="button" class="btn btn-round btn-danger" onclick="history.go(-1); return false;" style="float: right;" >Trở lại</button>
                <a href="index.php?action=add" class="btn btn-round btn-primary" style="float: right;">Thêm mới</a>
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
                                        if(isset($_SESSION['error']))
                                        {
                                            warning($_SESSION['error']);
                                            unset($_SESSION['error']);
                                        }
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên vai trò</th>
                                                <th>Mô tả</th>
                                                <th>Quyền</th>
                                                <th>Chỉnh sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datas as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $data['name'] ?></td>
                                                    <td><?= $data['description'] ?></td>
                                                    <td>
                                                        <?php
                                                            $perm = explode (',', $data['permission']);
                                                           foreach ($perm as $key => $val) {
                                                               echo isset($permissions[$val]) ? $permissions[$val].', ' : '';
                                                           }
                                                        ?>
                                                    </td>
                                                    <td class="center">
                                                        <a href="<?php echo 'index.php?action=edit&id='. $data['id'] ?>">
                                                            <i class="fa fa-edit" id = "icon_xanh" >
                                                            </i>
                                                        </a>
                                                    </td>
                                                    <td class="center">
                                                        <a href ="../../controller/RoleController.php?action=delete&id=<?php echo $data['id'] ?>" class="verify_action" >
                                                            <i class="fa fa-trash-o" id="icon_red"  ></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <?php
                        $table ='roles';
                        $link = 'index.php';
                        echo pagination($display,$table,$link,$record);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>