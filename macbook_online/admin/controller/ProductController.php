<?php
session_start();
    require_once("../../autoload/autoload.php");

    class Product extends My_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        // thêm mới sản phẩm
        public function actionAdd($data,$file)
        {
            $error = array();
            $product = array();
            // lấy giá trị từ form
            // kiểm tra giá trị nhập vào có tồn tại và gán vào mảng
            if(isset($data['name']) && !empty($data['name']))
            {
                $product['name'] = testInputString($data['name']);
            }
            else
            {
                $error[] ="name";
            }

            if(isset($data['title']) && !empty($data['title']))
            {
                $product['slug'] = testInputString($data['title']);
            }
            elseif(empty($data['title']))
            {
                $product['slug'] = safe_title(testInputString($data['name']));
            }

            if(isset($data['price']) && !empty($data['price']))
            {
                $product['price'] = testInputString($data['price']);
            }
            else
            {
                $error[] ="price";
            }


            if(isset($data['hot']) && !empty($data['hot']))
            {
                $product['hot'] = testInputString($data['hot']);
            }
            else
            {
                $product['hot'] = 0;
            }


            if(isset($data['sale']) && !empty($data['sale']))
            {
                $product['sale'] = testInputString($data['sale']);
            }
            else
            {
                $product['sale'] = 0;
            } 


            if(isset($data['qty']) && !empty($data['qty']))
            {
                $product['qty'] = testInputString($data['qty']);
            }
            else
            {
                $error[] ="qty";
            }

            if(isset($data['parent_id']) && !empty($data['parent_id']))
            {
                $product['category_id'] = testInputString($data['parent_id']);
            }
            else
            {
                $error[] ="parent_id";
            }


            if(isset($data['status']) && !empty($data['status']))
            {
                $product['status'] = testInputString($data['status']);
            }
            else
            {
                $error[] ="status";
            }

            if (!empty($_FILES['image']['name'])) {
                 
                $product['thunbar'] =  uploadImage($file,'product','add');
             }else{
                $product['thunbar'] =  '';
             }

            $product['content'] = isset($data['content']) ? $data['content'] : NULL;
            // kiểm tra các trường dữ liệu đã được nhập
           if (empty($error)) {
                // thêm mới sản phẩm
                parent::insert('product', $product);

                $_SESSION['success'] = "Thêm mới thành công";
                rdr_url("../views/product/index.php");
          
           }else{

                $_SESSION['error'] = "Bạn cần nhập vào các trường có dấu (*).";
                rdr_url("../views/product/add.php");
           }
        }
        // chỉnh sửa  sản phẩm
        public function actionEdit($data,$file)
        {
            $error = array();
            $product = array();
            // kiểm tra và lấy giá trị từ form nhập liệu
            if(isset($data['name']) && !empty($data['name']))
            {
                $product['name'] = testInputString($data['name']);
            }
            else
            {
                $error[] ="name";
            }

            if(isset($data['title']) && !empty($data['title']))
            {
                $product['slug'] = testInputString($data['title']);
            }
            elseif(empty($data['title']))
            {
                $product['slug'] = safe_title(testInputString($data['name']));
            }

            if(isset($data['price']) && !empty($data['price']))
            {
                $product['price'] = testInputString($data['price']);
            }
            else
            {
                $error[] ="price";
            }


            if(isset($data['hot']) && !empty($data['hot']))
            {
                $product['hot'] = testInputString($data['hot']);
            }
            else
            {
                $product['hot'] = 0;
            }


            if(isset($data['sale']) && !empty($data['sale']))
            {
                $product['sale'] = testInputString($data['sale']);
            }
            else
            {
                $product['sale'] = 0;
            }


            if(isset($data['qty']) && !empty($data['qty']))
            {
                $product['qty'] = testInputString($data['qty']);
            }
            else
            {
                $error[] ="qty";
            }

            if(isset($data['parent_id']) && !empty($data['parent_id']))
            {
                $product['category_id'] = testInputString($data['parent_id']);
            }
            else
            {
                $error[] ="parent_id";
            }


            if(isset($data['status']) && !empty($data['status']))
            {
                $product['status'] = testInputString($data['status']);
            }
            else
            {
                $error[] ="status";
            }

            $product['content'] = isset($data['content']) ? $data['content'] : NULL;
            
            if (!empty($file['image']['name'])) {
                 
                $product['thunbar'] =  uploadImage($file,'product','edit');
            }

            $id = $data['id'];
            // kiểm tra giá trị trên form đã nhập đầy đủ hay chưa
            if (empty($error)) 
            {
                
                // tiến hành update sản phẩm
                parent:: update('product',$product ,array("id" => $id));
                $_SESSION['success'] = "Chỉnh sửa thành công sản phẩm.";
                rdr_url("../views/product/index.php"); 
            }
            else
            {
                $_SESSION['error'] = "Bạn cần nhập vào các trường có dấu (*).";
                rdr_url("../views/product/index.php?action=edit&{$id}");
            }


        }
        // xóa sản phẩm
        public function deleteProduct($data)
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
        // Xóa sản phẩm theo id
        public function _del($id,$rediect = true)
        {

            $data = parent::fetchid('product',$id);
            if(!$data)
            {
                $_SESSION['error'] = "Sản phẩm không tồn tại";
                if($rediect){
                    rdr_url("../views/product/index.php");
                }else{
                    return false;
                }
            }
                
            parent::delete('product', $id);

            foreach ($data as $key => $value) {
                
                $link_img = url().'upload/product/'.$value['thunbar'];
            }
            if(file_exists($link_img))
            {
                unlink($link_img);
            }
            $_SESSION['success'] = "Sản phẩm đã bị xóa.";
            rdr_url("../views/product/index.php"); 
           
        }

    }
    // khởi tạo đối tượng
   $actionProduct = new Product();
    // kiểm tra hành động của người dùng
    switch($_REQUEST['action']){
        case 'add':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                   
                    $actionProduct ->actionAdd($_REQUEST,$_FILES);
                }
        break;
        case 'edit':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    
                    $actionProduct ->actionEdit($_REQUEST,$_FILES);
                }  
            break;
        case 'delete':
                if($_SERVER['REQUEST_METHOD']=='GET')
                {
                    $actionProduct ->deleteProduct($_REQUEST);
                } 
            break;
        default:
            break;

    }


?>