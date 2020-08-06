<?php
  require_once("../../../autoload/autoload.php");
  
    if(isset($_SESSION['id_admin']) && isset($_SESSION['role_id']))
    {
      $id = $_SESSION['id_admin'] ;
      $role_id= $_SESSION['role_id'];
    }

    checkLogin($id,$role_id);
    $permission = explode(',', $_SESSION['permission']);
    if (!in_array('add-news', $permission) && !in_array('all', $permission)) {
        redirect_to('admin/views/errors.php');
    }
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Thêm mới</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
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
                        <h2>Thêm mới</h2>
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
                            <form name="news" class="news" id="news" method="post" action="../../controller/NewsController.php?action=add" enctype="multipart/form-data" >
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label for="param_name " class="formLeft magin-left-30">Tiêu đề :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input id="title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" placeholder="Title" type="text" required="required" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Mô tả :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <input id="icon" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="intro" placeholder="Intro" type="text" required="required" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Nội dung :<span class="req">(*)</span></label>
                                        </td>
                                        <td>
                                            <textarea class="editor form-control col-md-7 col-xs-12" id="param_content" name="content" rows="15" cols="30"></textarea>
                                            <div class="clear error" name="content_error"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="param_name" class="formLeft magin-left-30">Hình ảnh  :</label>
                                        </td>
                                        <td>
                                            <input type="file" class="image" id="image" name="image" >
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
<script type="text/javascript"> // de hien thi khung
    CKEDITOR.replace( 'param_content' );
</script>