<?php
class Mekanik
{
	private $connection;

	function __construct($conn)
	{
		$this->mysqli = $conn;
	}
	public function tampil ($id = null){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tbl_mekanik";
		if($id != null){
			$sql = " WHERE id_mnk= $id";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}
		public function tambah($nama_mnk,$no_telephone,$alamat_mnk){
					$db = $this->mysqli->conn;
		$db->query("INSERT INTO tbl_mekanik VALUES ('','$nama_mnk','$no_telephone','$alamat_mnk')") or die ($db->error);
		}
	public function edit($sql){
		$db = $this->mysqli->conn;
		$db->query($sql) or die ($db->error);
			
	}
	public function hapus ($id){
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM tbl_mekanik WHERE id_mnk = '$id'") or die($db->error);
		}

		function __destruct(){
			$db = $this->mysqli->conn;
			$db->close();
		}
}
?>