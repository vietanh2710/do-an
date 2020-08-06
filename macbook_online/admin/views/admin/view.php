<?php
  require_once("../../../autoload/autoload.php");

   if(isset($_SESSION['id_admin']) && isset($_SESSION['role_id']))
    {
      $id = $_SESSION['id_admin'] ;
      $role_id = $_SESSION['role_id'];
    }
      
   checkLogin($id,$role_id);

  class viewAdmin extends My_Model
  {

  }
  $db = new viewAdmin();
  $data = $db->fetchAll('admin');
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title" id ="load">
            <div class="title_left">
                <h3>Danh sách Admin </h3>
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
                        <h2>Admin list <small></small></h2>
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
                                            <th>Vai trò</th>
                                            <th>Hình ảnh</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Địa chỉ</th>
                                            <th>Ngày tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Chỉnh sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $stt = 0 ?>
                                        <?php foreach($data as $value): ?>
                                            <tr class="row_<?php echo $value['id']?>">
                                                <td class="center"><?php echo $stt = $stt +1 ?></td>
                                                <td>
                                                    <?php
                                                        $roleId = $value['role_id'];
                                                        $where = 'id = '. $roleId;
                                                        $roles = $db->fetchwhere('roles', $where);
                                                        echo $roles[0]['name'];
                                                    ?>
                                                </td>
                                                <td class="center">  
                                                    <img src="<?php echo url().'upload/admin/'.$value['avata']; ?>" class="img-thumbnail" alt="Cinque Terre" width="80" height="80">  </td>
                                                <td><?php echo $value['name'] ?></td>
                                                <td><?php echo $value['email'] ?> </td>
                                                <td><?php echo $value['phone'] ?> </td>
                                                <td><?php echo $value['address'] ?> </td>
                                                <td><?php echo date("Y-m-d", strtotime($value['updated_ad'])) ?> </td>
                                                <td class="center">
                                                    <?php if($value['status'] == 1): ?>
                                                        <?php echo '<i class="fa fa-fw fa-check" id = "icon_xanh"></i> '?>
                                                    <?php else : ?>
                                                        <?php echo '<i class="fa fa-fw fa-close" id = "icon_red"></i>';?>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="center">
                                                    <a href="<?php echo 'index.php?action=edit&id='.$value['id'] ?>">
                                                        <i class="fa fa-edit" id = "icon_xanh" >
                                                        </i>
                                                    </a>
                                                </td>
                                                <td class="center">
                                                    <a href ="../../controller/AdminController.php?action=delete&id=<?php echo $value['id'] ?>" class="verify_action" >
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