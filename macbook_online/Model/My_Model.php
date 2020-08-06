<?php
/** Hàm lấy data */
class My_Model
{
    public $conn;
    /*Hàm khởi tạo class: khi tạo class My_model sẽ tự chạy hàm này*/
    public function __construct()
    {
        $this->conn = mysqli_connect("localhost","root","","macbook_online") or die ();
        mysqli_set_charset($this->conn,"utf8");
    }

    /*
    Hàm select
    Dạng query
    insert into tênbảng(tên dữ liệu) values (dữ liệu)
    -------------      $table                  $data
    */
    public function insert($table, array $data)
    {
        //code
        $sql = "INSERT INTO {$table} "; //Phần đầu của câu query
        $columns = implode(',', array_keys($data)); 
        //implode(ký tự, chuỗi) (dùng để cắt chuỗi ) => kết quả trả về là mảng 
        //ví dụ có chuỗi $chuoi = "1,2,3"; implode(','.$chuoi)
        //ket qua là mảng phần tử [0]=1,[1]=2,[2]=3
        $values = "";
        $sql .= '(' . $columns . ')';//proved in Mysql admin when entering select*
        foreach($data as $field => $value) {
            if(is_string($value)) {
                $values .= "'". mysqli_real_escape_string($this->conn,$value) ."',";
            } else {
                $values .= mysqli_real_escape_string($this->conn,$value) . ',';
            }
        }
        $values = substr($values, 0, -1);
        $sql .= " VALUES (" . $values . ')';
        /*$sql = $sql . " VALUES (" . $values . ')'
        $sql = 5;
        $sql .= 5        => $sql = 55;
        $sql = $sql . 5  => $sql = 55;
        dấu '+' là cộng số ví dụ 5 + 5 = 10
        dấu '.' là cộng chuỗi ví dụ 5 . 5 = 55
        */
        // var_dump($sql);die;
        mysqli_query($this->conn, $sql) or die("Lỗi  query  insert ----" .mysqli_error($this->conn));
        return mysqli_insert_id($this->conn);
    }



    /**
     * [update description] update
     * @param  $table [description]
     * @param  array  $data  [description]
     * @param  array  $conditions  [description]
     * @return [type]        [description]
     */


    public function update($table, array $data, array $conditions)
    {
        $sql = "UPDATE {$table}";

        $set = " SET ";

        $where = " WHERE ";

        foreach($data as $field => $value) {
            if(is_string($value)) {
                $set .= $field .'='.'\''. mysqli_real_escape_string($this->conn, $this->xss_clean($value)) .'\',';
            } else {
                $set .= $field .'='. mysqli_real_escape_string($this->conn, $this->xss_clean($value)) . ',';
            }
        }

        $set = substr($set, 0, -1);


        foreach($conditions as $field => $value) {
            if(is_string($value)) {
                $where .= $field .'='.'\''. mysqli_real_escape_string($this->conn, $this->xss_clean($value)) .'\' AND ';
            } else {
                $where .= $field .'='. mysqli_real_escape_string($this->conn, $this->xss_clean($value)) . ' AND ';
            }
        }

        $where = substr($where, 0, -5);

        $sql .= $set . $where;
        mysqli_query($this->conn, $sql) or die( "Update query error -- " .mysqli_error());

        return mysqli_affected_rows($this->conn);
    }


    /**
     * [delete description] function delete
     * @param  $table      [description]
     * @param  array  $conditions [description]
     * @return integer             [description]
     */
    public function delete ($table ,  $id )
    {
        $sql = "DELETE FROM {$table} WHERE id = $id ";

        mysqli_query($this->conn,$sql) or die ("Query Error delete   --- " .mysqli_error($this->conn));
        return mysqli_affected_rows($this->conn);
    }


    /**
     * Đếm số bản ghi để phân trang nhé
     * @param  [type] $table [description]
     * @return [type] integer [description]
     */
    public function countTable($table) 
    {
        $sql = "SELECT id FROM  {$table}";
        $result = mysqli_query($this->conn, $sql) or die("Query Error countTable----" .mysqli_error($this->conn));
        $num = mysqli_num_rows($result);
        return $num;
    }


    /**
     * [fetch description]
     * @param  [type] $where [description]
     * @return array        [description]
     */
    public function fetch ($table ,$where)
    {
        $sql = "SELECT * FROM {$table} WHERE ";

        $sql .= $where;


        $result = mysqli_query($this->conn, $sql) or die("Query Error fetch" .mysqli_error($this->conn));
        return mysqli_fetch_assoc($result);
    }

    public function fetchwhere ($table ,$where)
    {


        $sql = "SELECT * FROM {$table} WHERE ";

        $sql .= $where;

        $result = mysqli_query($this->conn, $sql) or die("Query Error fetch" .mysqli_error($this->conn)); // execute tren my sql, tra ve object data
        $data = [];// khởi tạo mạng $data
        if( $result)// Kiểm tra kết quả $result trả về nếu rỗng thì không chạy hàm if này
        {
            while ($num = mysqli_fetch_assoc($result)) // đọc từng dòng dữ liệu trong object $result
            {
                $data[] = $num;// thêm từng dòng dữ liệu vào mảng $data
            }
        }
        return $data; //Kết quả trả về từ hàm fetchwhere
    }

    /**
     * [fetchAll description]
     * @param  $sql [description]
     * @return array      [description]
     */
    public function fetchAll($table)
    {
        $sql = "SELECT * FROM {$table} WHERE 1" ;
        $result = mysqli_query($this->conn,$sql) or die("Query Error fetchAll " .mysqli_error($this->conn));
        $data = [];
        if( $result)
        {
            while ($num = mysqli_fetch_assoc($result))
            {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function fetchAllpagina($table , $start,$pagi)//lấy dữ liệu giới hạn từ $start tới $pagi
    {
        $sql = "SELECT * FROM {$table} ";
        $sql .= " ORDER BY id DESC";
        $sql .= " LIMIT {$start} , {$pagi}";
        $result = mysqli_query($this->conn,$sql) or die("Query Error fetchAll " .mysqli_error($this->conn));
        $data = [];
        if( $result)
        {
            while ($num = mysqli_fetch_assoc($result))
            {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function fetchAllpaginaUser($table , $start, $pagi, $email)
    {
        $sql = "SELECT * FROM {$table} WHERE email = '".$email."'";
        $sql .= " LIMIT {$start} , {$pagi}";
        $result = mysqli_query($this->conn,$sql) or die("Query Error fetchAll " .mysqli_error($this->conn));
        $data = [];
        if( $result)
        {
            while ($num = mysqli_fetch_assoc($result))
            {
                $data[] = $num;
            }
        }
        return $data;
    }

    /**
     * @param $table
     * @param $string
     * @return array|null
     */

    public function is_exists_row($table,$string)
    {
        $sql = "SELECT id FROM {$table} WHERE ";
        $sql .= $string ;
        $sql .= " LIMIT 1";
        $result = mysqli_query($this->conn , $sql) or die ("Query Error is_exists_row - -- " .mysqli_error());
        return mysqli_fetch_assoc($result);
    }

    public  function fetchJone($table , $sql ,$page = 0,$total ,$pagi )
    {
        $result = mysqli_query($this->conn,$sql) or die("Query Error fetchJone ---- " .mysqli_error($this->conn));

        $sotrang = ceil($total / $pagi);
        $start = ($page - 1 ) * $pagi ;
        $sql .= " LIMIT $start,$pagi";

        $result = mysqli_query($this->conn , $sql);
        $data = [];
        $data = [ "page" => $sotrang];
        if( $result)
        {
            while ($num = mysqli_fetch_assoc($result))
            {
                $data[] = $num;
            }
        }
        return $data;
    }


    /* lấy product  hot */
    public  function fetchhot($table,$fild)
    {
        $sql = "SELECT * FROM {$table} WHERE status =1 ORDER BY $fild DESC LIMIT 0,10";
        $result = mysqli_query($this->conn,$sql) or die("Query Error sql " .mysqli_error($this->conn));
        $data = [];
        if( $result)
        {
            while ($num = mysqli_fetch_assoc($result))
            {
                $data[] = $num;
            }
        }
        return $data;
    }


    /*lay ra product co danh muc home */
    public function fetchsql($table , $sql )
    {
        $result = mysqli_query($this->conn,$sql) or die("Query Error sql " .mysqli_error($this->conn));
        $data = [];
        if( $result)
        {
            while ($num = mysqli_fetch_assoc($result))
            {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function fetchone($table , $sql)
    {
        $result = mysqli_query($this->conn,$sql) or die("Query Error sql " .mysqli_error($this->conn));
        return mysqli_fetch_assoc($result);
    }

    public function fetchid($table,$id) //lấy dự liệu theo $id
    {
        $sql = "SELECT * FROM {$table} where id = {$id}";
        $result = mysqli_query($this->conn, $sql) or die("Query Error " .mysqli_error($this->conn));
        $data =[];
        if ( $result) {
            # code...
            while ($row = mysqli_fetch_assoc($result)) {
                # code...
                $data[] = $row;
            }
        }

        return $data;
    }
	
	public function xss_clean($data)
	{
			$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
			$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
			$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
			$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

			$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

	
			$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
			$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
			$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

		
			$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
			$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
			$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

			
			$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

			do
			{
					
				$old_data = $data;
				$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
			}
			while ($old_data !== $data);

			
			return $data;
	}



}

?>