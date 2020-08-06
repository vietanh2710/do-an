<?php
session_start();
	require_once("../../autoload/autoload.php");
	class User extends My_Model{
		public function __construct()
		{
			parent::__construct();
		}
        // lấy dữ liệu từ from
		public function login($data)
		{
            $error = array();
            $user = array();

            if(testInputString($data['email']))
            {
                $user['email'] = testInputString($data['email']);
            }
            else
            {
                $error[] ="email";
            }

            if(testInputString($data['pass']))
            {
                
                $user['password'] = md5(testInputString($data['pass']));
            }
            else
            {
                $error[] ="pass";
            }

            // kiểm tra các giá trị trên from có được nhập
            if(empty($error))
            {   
            	// Thực hiện lấy thông tin 
            	$where = "SELECT admin.*, roles.permission FROM `admin` INNER JOIN roles ON admin.role_id = roles.id WHERE email =  '".$user['email']."' AND password = '".$user['password']."' AND status = 1";
                
            	$data = parent::fetchsql('admin', $where);
            	if(empty($data))
            	{
            		$_SESSION['error_login'] ="Tài khoản không chính xác hoặc không được kích hoạt.";
            		rdr_url('../views/index.php');
                }
                
                // lưu giá trị người dùng vào session
                foreach ($data as $value)
                {
                    
                    $_SESSION['id_admin'] = $value['id'];
                    $_SESSION['name_admin'] = $value['name'];
                    $_SESSION['email_admin'] = $value['email'];
                    $_SESSION['role_id'] = $value['role_id'];
                    $_SESSION['image']    = $value['avata'];
                    $_SESSION['permission']    = $value['permission'];
                }

                redirect_to('admin/views/home/index.php');
            }

		}
        // thực hiện đăng xuất
		public function logout($id,$role_id)
		{
            if(isset($id) && isset($role_id))
            {
                unset($_SESSION['id_admin']);
                unset($_SESSION['name_admin']);
                unset($_SESSION['email_admin']);
                unset($_SESSION['role_id']);
                unset($_SESSION['image']);
                redirect_to('admin/views/');
            }else
            {
                redirect_to('admin/views/');
            }

		}


	}
    // khởi tạo đối tượng
	$users= new User();
    // kiểm tra hành động người dùng
	 switch($_REQUEST['action']){
	 	case 'login':
	 		# code...
	 		$login = $users->login($_REQUEST);
	 		
	 		break;
	 	case 'logout':
	 		# code...
                if(isset($_SESSION['id_admin']) && isset($_SESSION['role_id']))
                {
                  $id = $_SESSION['id_admin'] ;
                  $role_id= $_SESSION['role_id'];
                }
                $users->logout($id,$role_id);
	 		break;
	 }
?>