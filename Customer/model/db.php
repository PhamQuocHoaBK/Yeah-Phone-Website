 <?php
 class db
 {
 	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "assignment";
	private $conn;

	public function connect()
	{
		$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
	}

	public function close()
	{
		$this->conn->close();
	}

	public function select($from, $where)
	{
		$sql = "SELECT * FROM $from WHERE $where";
		$result = $this->conn->query($sql);
		return $result->num_rows;
	}

	public function select_another($from, $where, $username)
	{
		$count = 0;
		$sql = "SELECT * FROM $from WHERE $where";
		$result = $this->conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			if($row["tendangnhap"] != $username)
			{
				$count = $count + 1;
			}	
		}
		return $count;
	}

	public function select_item($from, $where)
	{
		$arr_info = [];
		$sql = "SELECT * FROM $from WHERE $where";
		$result = $this->conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			$arr_info = array("username" => $row["tendangnhap"], 
								"phone" => $row["sdt"], 
								"diachi" => $row["diachi"], 
								"mail" => $row["mail"], 
								"hinh" => $row["hinh"],
								"matkhau" => $row["matkhau"]);
			return $arr_info;	
		}
	}

	public function select_username($from, $where)
	{
		$sql = "SELECT * FROM $from WHERE $where";
		$result = $this->conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			return $row["tendangnhap"];	
		}
	}

	/*view ra comment*/
	public function select_cmt($from, $where)
	{
		$arr_cmt = [];
		$sql = "SELECT * FROM $from WHERE $where";
		$result = $this->conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			$arr_tmp = array("username" => $row["tendangnhap"], 
								"msp" => $row["msp"], 
								"cmt" => $row["cmt"], 
							    "time" => $row["time"]);
			array_push($arr_cmt, $arr_tmp);	
		}
		return $arr_cmt;
	}

	/*view ra gio hang theo username, chon trong bang product*/
	public function select_product($from, $where)
	{
		$arr_sp = [];
		$sql = "SELECT * FROM $from WHERE $where";
		$result = $this->conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			$arr_sp = array("msp" => $row["msp"],
							"tensp" => $row["tensp"],
							"gia" => $row["gia"], 
							"hinh" => $row["hinh"]);
			return $arr_sp;
		}
	}

	public function select_bill($from, $where)
	{
		$arr_bill = [];
		$sql = "SELECT * FROM $from WHERE $where";
		$result = $this->conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			$arr_tmp = array("tensp" => $row["tensp"],
							"gia" => $row["gia"], 
							"soluong" => $row["soluong"], 
							"trangthai" => $row["trangthai"]);
			array_push($arr_bill, $arr_tmp);
		}
		return $arr_bill;
	}

	/*lay msp theo username*/
	public function select_cart($from, $where)
	{
		$arr_sp = [];
		$sql = "SELECT msp FROM $from WHERE $where";
		$result = $this->conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			array_push($arr_sp, $row["msp"]);	
		}
		return $arr_sp;
	}
	/*lay so luong dat hang theo username*/

	public function select_sl($from, $where)
	{
		$arr_sl = [];
		$sql = "SELECT soluong FROM $from WHERE $where";
		$result = $this->conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			array_push($arr_sl, $row["soluong"]);	
		}
		return $arr_sl;
	}

	public function insert($into, $values)
	{
		$sql = "INSERT INTO $into VALUES $values";
		if ($this->conn->query($sql) === TRUE) 
		{
			$complete  = 'Add Data Successful!';
		} 
	}


	public function update($update, $set, $where)
	{
		$complete = "";
		$sql = "UPDATE $update SET $set WHERE $where";
		if ($this->conn->query($sql) === TRUE) 
		{
			$complete  = 'Update Data Successful!';
		}
		return $complete; 
	}

	public function uploadImage($table, $user, $img, $tmp_name)
	{
	    $img_upload_path = "../view/anh/" . $img;
	    $path = "./anh/" . $img;
	    move_uploaded_file($tmp_name, $img_upload_path);

	    $sql = "UPDATE $table SET hinh='$img' WHERE tendangnhap='$user' ";
	    if ($this->conn->query($sql) !== true) 
	    {
	        return "error";
	    }
	    else 
	    {
	    	return $path;
	    }
	}

	public function delete_sp($from, $where)
	{
		$complete = "";
		$sql = "DELETE FROM $from WHERE $where";
		if ($this->conn->query($sql) == TRUE) 
		{
  			$complete  = 'Delete Data Successful!';
		} 
		return $complete;
	}
 }

 ?>