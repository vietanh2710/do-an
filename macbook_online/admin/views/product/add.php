<?php
  require_once("../../../autoload/autoload.php");
    if(isset($_SESSION['id_admin']) && isset($_SESSION['role_id']))
    {
      $id = $_SESSION['id_admin'] ;
      $role_id= $_SESSION['role_id'];
    }

    checkLogin($id,$role_id);
    $permission = explode(',', $_SESSION['permission']);
    if (!in_array('add-products', $permission) && !in_array('all', $permission)) {
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

    function showOption()
    {

      $data = $this->db->fetchwhere('category','parent_id = 0');

      foreach ( $data as $key => $value)
      {

        $where = 'parent_id  = '. $value['id'] ;
        $data[$key]['category'] = $this->db->fetchwhere('category',$where);
      }
      return $data;
    }
  }
  $viewcate = new viewAdd();
  $parent = $viewcate->showOption();
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Thêm mới</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right ">
                <button type="button" class="btn btn-round btn-danger" onclick="history.go(-1); return false;" style="float: right;" >Trở về</button>
                <a href="index.php" class="btn btn-round btn-success" style="float: right;">Danh sách </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm mới</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                            <form name="form" class="form" id="form" method="post" action="../../controller/ProductController.php?action=add" enctype="multipart/form-data">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Tên sản phẩm :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Name" required="required" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name " class="formLeft magin-left-30">Tiêu đề :</label>
                                        </td>
                                        <td>
                                            <input id="title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" placeholder="Title"  type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Giá : <span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="price" placeholder="Price" required="required"  type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Sale : <span class="req"></span></label>
                                        </td>
                                        <td>
                                            <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sale" placeholder="Sale" required="required"  type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Số lượng : <span class="req">(*)</span></label>
                                        <td>
                                            <input type="number" id="qty" name="qty" required="required" min="0" placeholder=" " class="form-control col-md-7 col-xs-12">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">
                                                Sản phẩm hot :
                                        </td>
                                        <td>
                                            <input type="radio" name="hot" id="optionsRadios2" value="1" > Hot
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Danh mục :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control parsley-error" _autocheck="true" name="parent_id" required="required">
                                                    <option value=""></option>
                                                    <?php
                                                    foreach ($parent as $key => $value) {
                                                        # code...
                                                        if(!empty($value['category']))
                                                        {
                                                            ?>
                                                            <optgroup label="<?php echo $value['name']?>">
                                                                <?php foreach ($value['category'] as $sub ): ?>
                                                                    <option value="<?php echo $sub['id'] ?>" >
                                                                        <?php echo $sub['name'] ?>
                                                                    </option>
                                                                <?php endforeach;?>
                                                            </optgroup>
                                                            <?php
                                                        }else
                                                        {
                                                            echo'<option id="heard"  value="'.$value['id'].'">'.$value['name'].'</option>';
                                                        }

                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="message"> Nội dung  :</label>
                                        </td>
                                        <td>
                                            <textarea id="content"  class="form-control" name="content" style="width: 80% !important;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30"> Hình ảnh : <span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input type="file" class="image" id="image" name="image" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Trạng thái
                                                :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input type="radio" name="status" id="optionsRadios2" value="1" checked="checked"> Hiển thị
                                            <input type="radio" name="status" id="optionsRadios1" value="0"> Ẩn
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-info ">Thêm mới</button>
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
