<?php
require_once("../../../autoload/autoload.php");

if(isset($_SESSION['id_admin']) && isset($_SESSION['role_id']))
{
    $id = $_SESSION['id_admin'] ;
    $role_id= $_SESSION['role_id'];
}

checkLogin($id,$role_id);
$permission = explode(',', $_SESSION['permission']);
if (!in_array('edit-user', $permission) && !in_array('all', $permission)) {
    redirect_to('admin/views/errors.php');
}

class actionEdit extends My_Model
{
}

$db = new actionEdit();
if(testInputInt($_GET['id']))
{
    $id = testInputInt($_GET['id']);

}else{
    redirect_to('index.php');
}
$user = $db->fetchwhere('user','id = '.$id);

if(empty($user))
{
    redirect_to('index.php');
}
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Chỉnh sửa</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
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
                        <h2>Chỉnh sửa</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-xs-12">
                            <?php
                            if (isset($_SESSION['error']))
                            {
                                warning($_SESSION['error']);
                                unset($_SESSION['error']);

                            }
                            ?>
                            <!-- end -->
                            <?php foreach($user as $value): ?>
                            <form name="form" class="form" id="form" method="post" action="<?php echo'../../controller/UsersController.php?action=edit&id='.$value['id'] ?>" enctype="multipart/form-data">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Họ và tên :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Họ tên" required="required" type="text" value="<?php echo isset($value['name'])? $value['name']:""  ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name " class="formLeft magin-left-30">Email :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input id="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email" placeholder="Email" required="required" type="email"  value="<?php echo isset($value['email'])? $value['email']:""  ?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Phone :</label>
                                        </td>
                                        <td>
                                            <input type="text" id="sort_order" name="phone" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" placeholder="016********"  value="<?php echo isset($value['phone'])? $value['phone']:""  ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for=address"  Left magin-left-30">Địa chỉ :</label>
                                        </td>
                                        <td>
                                            <input type="text" id="" name="address" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" placeholder="address"  value="<?php echo isset($value['address'])? $value['address']:""  ?>">
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-info ">Chỉnh sửa</button>
                                            <button type="reset" class="btn btn-default">Hủy</button>
                                        </td>
                                    </tr>
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