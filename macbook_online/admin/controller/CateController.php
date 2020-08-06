<?php
session_start();
	require_once("../../autoload/autoload.php");
	class Cate
	{
		public $db;
		public function __construct()
		{
			$this->db = new My_Model();

		}
		// thêm mới danh mục
		public function actionAdd($data)
		{

			$error = array();
			$category = array();
			// lấy giá trị người dùng nhập từ form
			// gọi đến func trong lib 
			if(testInputString($data['name']))
			{
				$category['name'] = testInputString($data['name']);
			}
			else
			{
				$error[] ="name";
			}

			if(testInputString($data['title']))
			{
				$category['title'] = safe_title(testInputString($data['title']));
			}
			else
			{
				$category['title'] = safe_title(testInputString($data['name']));
			}

			if(testInputString($data['sort_order']))
			{
				$category['sort_order'] = testInputString($data['sort_order']);
			}
			else
			{
				$error[] ="sort_order";
			}
			
			$category['parent_id'] = $data['parent_id'];
			$category['status'] = $data['status'];
			
			// hàm get_date() lấy ngày tháng hiện tại
			$category['created_at'] = get_date();

			// kiểm tra giá trị nhập vào
			if (empty($error)) {
				
				// kiểm tra giá trị danh mục đã tồn tại hay chưa
				$data_cate = $this->db->fetchwhere("category","name = '".$category['name']."' ");

				if (empty($data_cate)) 
				{
				
					# thêm mới dữ liệu
					$this->db->insert('category',$category);
					$_SESSION['success'] = "Thêm mới thành công.";
					rdr_url("../views/category/index.php");

				}
				else
				{
					$_SESSION['error'] = "Danh mục đã tồn tại (*).";
					rdr_url("../views/category/index.php?action=add");
				}	
			}
			else
			{
				$_SESSION['error'] = " Bạn cần nhập tất cả các trường được đánh dấu (*).";
				rdr_url("../views/category/index.php?action=add");
			}
		}

		// hàm thực hiện chứ năng chỉnh sửa

		public function actionEdit($data)
		{

			$error = array();
			$category = array();
			$id = $data['id'];
			// lấy giá trị từ form
			if(testInputString($data['name']))
			{
				$category['name'] = testInputString($data['name']);
			}
			else
			{
				$error[] ="name";
			}

			if(testInputString($data['sort_order']))
			{
				$category['sort_order'] = testInputString($data['sort_order']);
			}
			else
			{
				$error[] ="sort_order";
			}
			$category['parent_id'] = $data['parent_id'];
			$category['status'] = $data['status'];
			$category['created_at'] = get_date();

			// kiểm tra dữ các trườn yêu cầu nhập trên from có được nhập hay không
			if (empty($error)) 
			{
				
				// thực hiện chỉnh sửa danh mục
				$this->db->update('category',$category,array("id" => $id));
				$_SESSION['success'] = "Chỉnh sửa thành công danh mục";
				rdr_url("../views/category/index.php");	
			}
			else
			{
				$_SESSION['error'] = "Bạn cần nhập tất cả các trường được đánh dấu (*).";
				rdr_url("../views/category/index.php?action=edit&{$id}");
			}
		}

		// xóa danh mục
		public function deleteCate($data)
		{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				settype ($id, "int");
				$this->_del($id);
			}else{
				$_SESSION['error'] = "Danh mục không tồn tại";
				rdr_url("../views/category/index.php");	
			}
			
		}
		// xóa danh mục
		public function _del($id,$rediect = true)
		{
			$where = 'parent_id = '.$id;
			$data = $this->db->fetchwhere('category',$where);
			
			if(empty($data))
			{
				$this->db->delete('category',$id);
				$_SESSION['success'] = "Danh mục đã bị xóa.";
				rdr_url("../views/category/index.php");	
				
			}
			else
			{
				$_SESSION['error'] = "Một thể loại con tồn tại mà không thể xóa. Bạn cần xóa các danh mục con và sản phẩm khỏi danh mục trước";
				rdr_url("../views/category/index.php");	
			}
		}


	}
	// khởi tạo đối tượng
	$actionCate = new Cate();
	// kiểm tra các hành động người dùng thực hiện
	switch($_REQUEST['action']){
		case 'add':
      		if($_SERVER['REQUEST_METHOD']=='POST')
				{
					$actionCate ->actionAdd($_REQUEST);
				}
        break;
	    case 'edit':
	    	if($_SERVER['REQUEST_METHOD']=='POST')
				{
					$actionCate ->actionEdit($_REQUEST);
				}  
	        break;
	    case 'delete':
	        	if($_SERVER['REQUEST_METHOD']=='GET')
				{
					$actionCate ->deleteCate($_REQUEST);
				} 
	        break;
	    default:
	       
	        break;

	}
		
 ?>