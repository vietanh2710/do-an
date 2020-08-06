<?php
session_start();
    require_once("../../autoload/autoload.php");

    class Order extends My_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        // xóa sản phẩm trong đơn hàng
        public function delete($data)
        {
            if (isset($_GET['id'])) {
                
                $id = $_GET['id'];
                settype ($id, "int");
                $this->_del($id);
            }else{
                $_SESSION['error'] = "Sản phẩm không tồn tại";
                rdr_url("../views/product/index.php"); 
            }
            
        }
        // xóa nhiều 
        public function deleteall($data)
        {
            $ids = $_POST['ids'];
            foreach ($ids as $id) {
                
                $this-> _del($id);
                }
        }

        // hàm thực hiện xóa sản phẩm
        public function _del($id,$rediect = true)
        {

            $data = parent::fetchid('ordere',$id);
            if(!$data)
            {
                
                $_SESSION['error'] = "Đơn hàng không tồn tại";
                if($rediect){
                    rdr_url("../views/order/index.php");
                }else{
                    return false;
                }
            }
                
            parent::delete('ordere',$id);

           

            $_SESSION['success'] = "Đơn hàng đã bị xóa.";
            rdr_url("../views/order/index.php"); 
           
        }
    }
// khởi tạo đối tượng
   $actionOrder = new Order();
    switch($_REQUEST['action']){
        case 'delete':
            if($_SERVER['REQUEST_METHOD']=='GET')
            {
                $actionOrder ->delete($_REQUEST);
            }
            break;
        default:
           rdr_url("../views/order/index.php"); 
            break;

    }


?>