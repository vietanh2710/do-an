<?php
    require_once __DIR__.("/../libraries/function.php");
    require_once __DIR__.("/../Model/My_Model.php");

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/corephp/admin/");
    define("IP",$_SERVER['REMOTE_ADDR']);

    $permissions = [
        'all' => 'Toàn quyền',
        'home' => 'Trang chủ',
        'list-order' => 'Danh sách đơn hàng',
        'delete-order' => 'Xóa đơn hàng',
        'list-category' => 'Danh sách danh mục',
        'add-category' => 'Thêm danh mục',
        'edit-category' => 'Chỉnh sửa danh mục',
        'delete-category' => 'Xóa danh mục',
        'list-products' => 'Danh sách sản phẩm',
        'add-products' => 'Thêm sản phẩm',
        'edit-products' => 'Chỉnh sửa sản phẩm',
        'delte-products' => 'Xóa sản phẩm',
        'list-admin' => 'Danh sách admin',
        'add-admin' => 'Thêm admin',
        'edit-admin' => 'Chỉnh sửa admin',
        'delete-admin' => 'Xóa admin',
        'list-user' => 'Danh sách người dùng',
        'edit-user' => 'Chỉnh sửa người dùng',
        'delete-user' => 'Xóa người dùng',
        'list-news' => 'Danh sách tin tức',
        'add-news' => 'Thêm mới tin tức',
        'edit-news' => 'Chỉnh sửa tin tức',
        'delete-news' => 'Xóa tin tức',
        'list-permission' => 'Danh sách vai trò',
        'add-permission' => 'Thêm vai trò',
        'edit-permission' => 'Chỉnh sửa vai trò',
        'delete-permission' => 'Xóa vai trò',
    ]
?>