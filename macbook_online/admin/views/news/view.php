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
    public $db; //Khởi tạo biến $db
   public  function __construct()
    {
      // this->db kế thừa $db
      $this->db = new My_Model(); //Khi khởi tạo nó sẽ được gán class My_Model
    }
    // lấy danh sách bài viết
    public function show_list($start,$display)
    {
      $data = $this->db ->fetchAllpagina('news' , $start,$display);
      return $data;
    }
    // đếm số bài viết
     public function countid()
     {
       $data = $this->db->countTable('news');
       return $data;
     }
    // hiển thị danh mục cha
     public function show_parent($table,$where)
     {
        $data = $this->db->fetchwhere($table,$where);
        return $data;
     }

  }

  $show_list_cate = new showData();

  $display = 2;
  $start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
  $record = $show_list_cate ->countid();
  $data =$show_list_cate ->show_list($start,$display);


?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Danh sách</h3>
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
                                            <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Mô tả</th>
                                            <th>Hình ảnh</th>
                                            <th>Ngày tạo</th>
                                            <th>Chỉnh sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $stt = 0 ?>
                                        <?php foreach($data as $value): ?>
                                            <tr class="row_<?php echo $value['id']?>">
                                                <td class="center"><?php echo $stt = $stt +1 ?></td>
                                                <td class="center"> <?php  echo $value['title'] ?></td>
                                                <td><?php echo $value['intro'] ?></td>
                                                <td class="center">  <img src="<?php echo url().'upload/news/'.$value['image_link']; ?>" class="img-thumbnail" alt="Cinque Terre" width="80" height="80">  </td>
                                                <td><?php echo date("Y-m-d", strtotime($value['created'])) ?> </td>
                                                <td class="center">
                                                    <?php echo '<a href="index.php?action=edit&id='.$value['id'].'">' ;?>
                                                    <i class="fa fa-edit" id = "icon_xanh" >
                                                    </i>
                                                    </a>
                                                </td>
                                                <td class="center">
                                                    <a href ="../../controller/NewsController.php?action=delete&id=<?php echo $value['id'] ?>" class="verify_action" >
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
                        $table ='news';
                        $link = 'index.php';
                        echo pagination($display,$table,$link,$record);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>