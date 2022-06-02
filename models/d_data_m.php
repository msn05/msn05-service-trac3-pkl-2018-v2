<?php
class Mobil
{
	private $connection;

	function __construct($conn)
	{
		$this->mysqli = $conn;
	}
	public function tampil ($id = null){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tbl_mobil";
		if($id != null){
			$sql = " WHERE id_mbl = $id";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}
	
	public function ambek ($id_mbl = null){
		$db = $this->mysqli->conn;
		$sql1 = "SELECT * FROM tbl_mobil WHERE id_mbl = $id_mbl";
		$query = $db->query($sql1) or die($db->error);
		return $query;
	}

	public function tambah($tanggal,$no_polisi,$brand,$tipe_mbl,$model_mbl,$harga,$tgl_masuk,$lokasi_mbl,$status){
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO tbl_mobil VALUES ('','$tanggal','$no_polisi','$brand','$tipe_mbl','$model_mbl','$harga','$tgl_masuk','$lokasi_mbl','$status')") or die ($db->error);
	}


	public function edit($sql){
		$db = $this->mysqli->conn;
		$db->query($sql) or die ($db->error);
			
	}
	public function hapus ($id){
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM tbl_mobil WHERE id_mbl = '$id'") or die($db->error);
		}

		public function count(){
			return $this->tampil()->num_rows;
		}

/*		function __destruct(){
			$db = $this->mysqli->conn;
			$db->close();
		}*/
}

?>