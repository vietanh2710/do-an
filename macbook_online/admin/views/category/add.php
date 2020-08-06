<?php
  require_once("../../../autoload/autoload.php");
  
    if(isset($_SESSION['id_admin']) && isset($_SESSION['role_id']))
    {
      $id = $_SESSION['id_admin'] ;
      $role_id= $_SESSION['role_id'];
    }
      
    checkLogin($id,$role_id);
    $permission = explode(',', $_SESSION['permission']);
    if (!in_array('add-category', $permission) && !in_array('all', $permission)) {
        redirect_to('admin/views/errors.php');
    }
  /**
  * 
  */
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
                <h3>Thêm mới danh mục</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right ">
                <button type="button" class="btn btn-round btn-danger" onclick="history.go(-1); return false;" style="float: right;" >Trở lại</button>
                <a href="index.php" class="btn btn-round btn-success" style="float: right;">Danh sách </a>

            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm mới danh mục</h2>
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
                            <form name="category" class="category" id="category" method="post" action="../../controller/CateController.php?action=add">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Tên danh mục :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Tên danh mục" required="required" type="text">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Thứ tự hiển thị :</label>

                                        </td>
                                        <td>
                                            <input type="number" id="sort_order" name="sort_order" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Danh mục cha  :<span class="req">(*)</span></label>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" _autocheck="true" name="parent_id">
                                                    <option value="0">Đây là danh mục cha</option>
                                                    <?php
                                                    foreach ($parent as $key => $value) {
                                                        # code...
                                                        echo'<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Hiển thị
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
