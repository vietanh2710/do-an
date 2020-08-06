<?php 
session_start();
    require_once("../../autoload/autoload.php");
    class Active extends My_Model{
    	public function __construct()
    	{
    		parent::__construct();
    	}
        
        // hàm thực hiện chức năng xác thực thanh toán
    	public function actionPay($data)
    	{

            $ids = validate_id($data['id']);

            $data = parent::fetchwhere('ordere','transaction_id = '.$ids);

            foreach($data as $val )
            {
                $id = $val['product_id'];

                $product = parent::fetchwhere('product' ,'id ='.$id);

                foreach($product as $value)
                {
                    $qty = $value['qty'] - $val['qty'];
                }


                $data = array('qty' =>$qty);
                $where = array('id' =>$id);
                if(parent::update('product',$data,$where))
                {

                }

            }

            $datas = array('active'=>1);
            $where = array('id' =>$ids);
            if(parent::update('transaction',$datas,$where)){

            }else
            {

            }
    		
    		redirect_to('admin/views/home/');
    	}
        // xử lý chức năng hủy thanh toán
    	public function actionUnpaid($data)
    	{

            $ids = validate_id($data['id']);

            $data = parent::fetchwhere('ordere','transaction_id = '.$ids);
            foreach($data as $val )
            {
                $id = $val['product_id'];

                $product = parent::fetchwhere('product' ,'id ='.$id);

                foreach($product as $value)
                {
                    $qty = $value['qty'] + 1;
                }


                $data = array('qty' =>$qty);
                $where = array('id' =>$id);
                if(parent::update('product',$data,$where))
                {

                }


            }
            $datas = array('active'=>0);
            $where = array('id' =>$ids);
            parent::update('transaction',$datas,$where);
    		redirect_to('admin/views/home/');
    	}


        // xóa thông tin giao dịch
        public function delete($data)
        {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                settype ($id, "int");
                $dataOrdere = parent::fetchwhere('ordere' ,'transaction_id ='.$id);
                if (!empty($dataOrdere)) {

                    $_SESSION['error'] = "Bạn cần xóa sản phẩm trong bản phần order trước khi xóa giao dịch";
                    redirect_to('admin/views/home/');
                    die;
                }
                $this->_del($id);
            }else{
                $_SESSION['error'] = "Giao dịch không tồn tại";
                redirect_to('admin/views/home/');
            }

        }

      
           
        public function _del($id,$rediect = true)
        {

            $data = parent::fetchid('transaction',$id);
            if(!empty($data))
            {
                parent::delete('transaction',$id);
                $_SESSION['success'] = "Giao dịch đã được xóa.";
                redirect_to('admin/views/home/');
                
            }
            else
            {
                $_SESSION['error'] = "Giao dịch không không tồn tại";
                redirect_to('admin/views/home/');
                
            }
        }

    }



	$actives = new Active();
    // kiểm tra hành động của người dùng để thực hiện các hành động tương ứng
	switch ($_REQUEST['action']) { //lưu dữ liệu
		case 'pay':
			# code...
			$pay = $actives -> actionPay($_REQUEST);
			break;
		case 'unpaid':
			# code...
			$unpaid = $actives -> actionUnpaid($_REQUEST);
			break;

		case 'delete':
			# code...
			$delete = $actives ->delete($_REQUEST);
			break;
		
		default:
			# code...
			break;
	}
?>
