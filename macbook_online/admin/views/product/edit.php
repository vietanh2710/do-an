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

  class viewAdd extends My_Model
  {
  }
  $db = new viewAdd();

  if(testInputInt($_GET['id']))
  {
    $id = testInputInt($_GET['id']); 

    $where = "id = ".$id;
    $data = $db->fetchwhere ('product',$where);

    if (empty($data)) {
      # code...
      $_SESSION['error'] = "Sản phẩm không tồn tại (*).";
    }
  }
  else
  {
    
    echo "<script> window.location = 'index.php'; </script>";
  }

    $datas = $db->fetchwhere('category','parent_id = 0');

    foreach ( $datas as $key => $value)
    {

      $where = 'parent_id  = '. $value['id'] ;
      $datas[$key]['category'] = $db->fetchwhere('category',$where);
    }


?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Product</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right ">
                <button type="button" class="btn btn-round btn-danger" onclick="history.go(-1); return false;" style="float: right;" >Trở lại</button>
                <a href="index.php" class="btn btn-round btn-success" style="float: right;">Danh sách</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Chỉnh sửa</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
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
                            <?php //pre($data) ?>
                            <?php  foreach ( $data as $values ): ?>
                            <form name="form" class="form" id="form" method="post" action="../../controller/ProductController.php?action=edit&id=<?php echo $values['id']?>" enctype="multipart/form-data">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Tên sản phẩm :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" value="<?php echo $values['name'] ?>" required="required" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name " class="formLeft magin-left-30">Tiêu đề :</label>
                                        </td>
                                        <td>
                                            <input id="title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" value="<?php echo $values['slug'] ?>"   type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Giá  : <span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="price" value="<?php echo $values['price'] ?>"  required="required"  type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Sale  : <span class="req"></span></label>
                                        </td>
                                        <td>
                                            <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sale" value="<?php echo $values['sale'] ?>"  required="required"  type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Số lượng : <span class="req">(*)</span></label>
                                        <td>
                                            <input type="number" id="qty" name="qty" value="<?php echo $values['qty'] ?>" required="required" min="0" placeholder=" " class="form-control col-md-7 col-xs-12">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">
                                                Sản phẩm hot :
                                        </td>
                                        <td>
                                            <input type="radio" name="hot" id="optionsRadios2" value="1" <?php echo $values['hot'] == 1 ? 'checked' : '' ?>> Hot
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Danh mục cha :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control parsley-error" _autocheck="true" name="parent_id" required="required">
                                                    <option value=""></option>
                                                    <?php
                                                    foreach ($datas as $key => $value) {
                                                        # code...
                                                        if(!empty($value['category']))
                                                        {
                                                            ?>
                                                            <optgroup label="<?php echo $value['name']?>">
                                                                <?php foreach ($value['category'] as $sub ): ?>
                                                                    <option value="<?php echo $sub['id'] ?>" <?php  echo ($sub['id'] == $values['category_id']) ? 'selected':""; ?>  >
                                                                        <?php echo $sub['name'] ?>
                                                                    </option>
                                                                <?php endforeach;?>
                                                            </optgroup>
                                                            <?php
                                                        }else {
                                                            ?>
                                                            <option id="heard"  value=" <?php echo $value['id']  ?>" <?php echo ($value['id'] == $values['category_id']) ? 'selected' :""; ?> > <?php echo $value['name'] ?> </option>;
                                                            <?php
                                                        }

                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="message">Nội dung :</label>
                                        </td>
                                        <td>
                                            <textarea id="content"  class="form-control" name="content" ><?php echo $values['content'] ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Hình ảnh  :</label>
                                        </td>
                                        <td>
                                            <input type="file" class="image" id="image" name="image" value="<?php  echo $values['thunbar'] ;?>  " >
                                            <img src="<?php echo url().'upload/product/'.$values['thunbar']; ?>" class="img-thumbnail" alt="Cinque Terre" width="80" height="80">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Trạng thái
                                                :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input type="radio" name="status" id="optionsRadios2" value="1" <?php echo ($values['status'] == 1)?'checked="checked"':''; ?> > Hiển thị
                                            <input type="radio" name="status" id="optionsRadios1" value="0" <?php echo ($values['status'] == 0 )?'checked="checked"':''; ?>> Ẩn
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-info ">Chỉnh sửa</button>
                                            <button type="reset" class="btn btn-default">Hủy</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
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