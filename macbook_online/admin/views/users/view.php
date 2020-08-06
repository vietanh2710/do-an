<?php
require_once("../../../autoload/autoload.php");

if(isset($_SESSION['id_admin']) && isset($_SESSION['role_id']))
{
    $id = $_SESSION['id_admin'] ;
    $role_id= $_SESSION['role_id'];
}

checkLogin($id,$role_id);

class viewAdmin extends My_Model
{

}
$db = new viewAdmin();
$data = $db->fetchAll('user');
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title" id ="load">
            <div class="title_left">
                <h3>Danh sách </h3>
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
                                        <!-- end -->
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Địa chỉ</th>
                                            <th>Chỉnh sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $stt = 0 ?>
                                        <?php foreach($data as $value): ?>
                                            <tr class="row_<?php echo $value['id']?>">
                                                <td class="center"><?php echo $stt = $stt +1 ?></td>
                                                <td><?php echo $value['name'] ?></td>
                                                <td><?php echo $value['email'] ?> </td>
                                                <td><?php echo $value['phone'] ?> </td>
                                                <td><?php echo $value['address'] ?> </td>
                                                <td class="center">
                                                    <a href="<?php echo 'index.php?action=edit&id='.$value['id'] ?>">
                                                        <i class="fa fa-edit" id = "icon_xanh" >
                                                        </i>
                                                    </a>
                                                </td>
                                                <td class="center">
                                                    <a href ="../../controller/UsersController.php?action=delete&id=<?php echo $value['id'] ?>" class="verify_action" >
                                                        <i class="fa fa-trash-o" id = "icon_red"  >
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    <div class="list_actions itemActions">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>