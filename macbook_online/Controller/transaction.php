<?php
session_start();
	require_once("../autoload/autoload.php");

	class Transation extends My_Model{
		public function __construct()
		{
			parent::__construct();
		}


		public function addInfo($data,$sesion)
		{
			// echo "<pre>";
			// print_r($sesion); die;
			$error = array();
			$info = array();

			if(testInputString($data['name']))
            {
                $info['name'] = testInputString($data['name']);
            }
            else
            {
                $error[] ="name";
                rdr_url('../views/payment.php');
                die;
            }


            if(testInputString($data['address']))
            {
                $info['address'] = testInputString($data['address']);
            }
            else
            {
                $error[] ="address";
            }

            if(testInputString($data['phone']))
            {
                $info['phone'] = testInputString($data['phone']);
            }
            else
            {
                $error[] ="phone";
            }


            if(testInputString($data['email']))
            {
                $info['email'] = testInputString($data['email']);
            }
            else
            {
                $error[] ="email";
            }

             if(testInputString($data['message']))
            {
                $info['message'] = testInputString($data['message']);
            }
            
           // trên này kiểm tra nếu thông tin nguoif dùng nhập đầy đủ 
            if(empty($error))
            {
				$sum = 0;
				// tính tổng tiền trong cart
            	foreach($sesion as $value)
            	{
            		$sum = $sum + $value['amount'];
            	}

            	$info['amount'] = $sum;
            	if(parent::insert('transaction',$info))
            	{
					// lưu thông tin giao dịch và ng dùng
            		$where = '1 ORDER BY id DESC LIMIT 0,1';
            		$transaction = parent::fetchwhere('transaction',$where);

            		foreach ($transaction as $key => $value) {
            			# code...
            			$transaction_id = $value['id'];
            		}

            		foreach ($sesion as $key => $value) {
            			# code...
            			$sesion[$key]['transaction_id'] = $transaction_id ;
            			}
            		
					// sau khi lưu thông tin giao dịch thành công 
					// thì lưu thông tin chi tiết giao dịch đó vào bảng order 
        			foreach ($sesion as $key => $value) {
						// thực hiện trừ ở đây
						// ở dây sau khi lưu vào bảng order thì sẽ truy vấn ở bảng sản phẩm
						// lấy ra số lượng trừ đi xong update lại vào bảng sản phẩm trừ cái số lượng mà nó đã đặt đó
						# code...
						//update qty product
							#code ...
						//
        				if(parent::insert('ordere',$value)){
        					
                            unset($value);
        				}

        			}
                    unset($sesion);
            		$_SESSION['success'] ="Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ liên hệ với bạn ngay khi có thể.";

                    unset($_SESSION['cart']);
            		rdr_url('../views/cart.php');

            	}
            	else
            	{
            		$_SESSION['error'] ="Xin lỗi. Đơn hàng của bạn chưa được đặt thành công";
            		rdr_url('../views/cart.php');

            	}

            }else{
            	$_SESSION['error_info'] = "Bạn cần nhập tất cả các trường được đánh dấu *.";
            	rdr_url('../views/payment.php');
            }

		}
	}

	$info = new Transation();
	if(isset($_SESSION['cart']))
	{
		// đây sẽ gọi đến hàm add Info này truyền cái thông tin ng dùng gửi lên và thông tin session cart
		$data = $info -> addInfo($_REQUEST,$_SESSION['cart']);
	}else
	{
		rdr_url('../index.php');
		
	}
	
 ?>

