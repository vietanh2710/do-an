<?php
session_start();
    require_once("../../autoload/autoload.php");

    class News {

        public $db;
        public function __construct(){
            $this->db = new My_Model();
        }

        // thêm tin tức 
        public function actionAdd($data,$file)
        {
            $error = array();

            $news = array();
            // lấy giá trị từ from
            if(testInputString($data['title']))
            {
                $news['title'] = testInputString($data['title']);
            }
            else
            {
                $error[] ="title";
            }


            if(testInputString($data['intro']))
            {
                $news['intro'] = testInputString($data['intro']);
            }
            else
            {
                $error[] ="intro";
            }

            if(!empty($data['content']))
            {
                $news['content'] = trim($data['content']);
            }
            else
            {
                $error[] ="content";
            }

            if(testInputString($data['status']))
            {
                $news['status'] = testInputString($data['status']);
            }
            else
            {
                $error[] ="status";
            }
             if ($file) {
                 // thực hiện upload hình ảnh
                $news['image_link'] =  uploadImage($file,'news','add');
             }else{
                $news['image_link'] =  ' ';
             }
             // kiểm tra giá trị nhập vào trên from
             if(empty($error)){

                if($this->db->insert('news',$news))
                {
                    $_SESSION['success'] = "Thêm mới thành công.";
                    rdr_url("../views/news/index.php");
                }
             }else{

                $_SESSION['error'] = "Bạn cần nhập các trường đánh đấu (*).";
                rdr_url("../views/news/add.php");
           }
        }
        // sửa tin tức
        public function actionEdit($data, $file)// Sửa news
        {
            $id = $data['id'];
            $error = array();
            $news = array();
            // lấy dữ liệu trên from
            if(testInputString($data['title']))
            {
                $news['title'] = testInputString($data['title']);
            }
            else
            {
                $error[] ="title";
            }


            if(testInputString($data['intro']))
            {
                $news['intro'] = testInputString($data['intro']);
            }
            else
            {
                $error[] ="intro";
            }

            if(!empty($data['content']))
            {
                $news['content'] = trim($data['content']);
            }
            else
            {
                $error[] ="content";
            }



            if(testInputString($data['status']))
            {
                $news['status'] = testInputString($data['status']);
            }
            else
            {
                $error[] ="status";
            }
             
            if (!empty($file['image']['name'])) {
                $news['image_link'] =  uploadImage($file,'news','edit');
            }

            // kiểm tra dữ liệu đã được nhập đầy đủ
             if(empty($error)){

                if($this->db->update('news', $news , array("id" => $id)))
                {
                    $_SESSION['success'] = "Chỉnh sửa thành công.";
                    rdr_url("../views/news/index.php");
                } else {
                    $_SESSION['error'] = "Bạn cần điền vào các trường có dấu (*).";
                    rdr_url("../views/news/add.php");
                 }
             }else{

                $_SESSION['error'] = "Bạn cần điền vào các trường có dấu (*).";
                rdr_url("../views/news/add.php");
           }


        }

        // xóa tin tức 
        public function deleteNew($data) //Xóa tin tức
        {
            // kiểm tra giá trị id có tồn tại hay không
            if (isset($_GET['id'])) {
                # code...
                $id = $_GET['id'];
                settype ($id, "int");
                $this->_del($id);
            }else{
                $_SESSION['error'] = "Tin tức không tồn tại";
                rdr_url("../views/news/index.php"); 
            }
            
        }

        public function deleteall($data) //Xóa nhiều news 1 lúc
        {
            $ids = $_POST['ids'];
            foreach ($ids as  $id) {
                # code...
                $this-> _del($id);
                }
        }
            

        public function _del($id, $rediect = true) //Hủy class
        {

            $data = $this->db->fetchid('news', $id);
            if(!$data)
            {
                
                $_SESSION['error'] = "Tin tức không tồn tại";
                if($rediect){
                    rdr_url("../views/news/index.php");
                }else{
                    return false;
                }
            }
                
            $this->db->delete('news', $id);

            $_SESSION['success'] = "Tin tức đã bị xóa.";
            rdr_url("../views/news/index.php"); 
           
        }


        // end class
    }

    // khởi tạo đối tượng
    $actionNews = new News();
    // kiểm tra hành động của người dùng
    switch($_REQUEST['action']){
        case 'add':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                   
                    $actionNews ->actionAdd($_REQUEST,$_FILES);
                    
                }
        break;
        case 'edit':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    
                    $actionNews ->actionEdit($_REQUEST,$_FILES);

                }  
            break;
        case 'delete':
                if($_SERVER['REQUEST_METHOD']=='GET')
                {
                    $actionNews ->deleteNew($_REQUEST);
                } 
            break;
       
    }

?>