<?php
class Password
{
	private $connection;

	function __construct($conn)
	{
		$this->mysqli = $conn;
	}
	public function tampil ($id = null){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM users";
		if($id != null){
			$sql = " WHERE id = $id";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	public function tampilId($username){

		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM users  WHERE username = '$username'";
		// if($id != null){
		// 	$sql = " WHERE username = '$username'";
		// }
		$query = $db->query($sql) or die($db->error);
		return $query;
}
		public function ambek ($id = null){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM users";
		if($id != null){
			$sql = " WHERE id = $id";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	
	public function edit($sql){
		$db = $this->mysqli->conn;
		$db->query($sql) or die ($db->error);}
}	
?>